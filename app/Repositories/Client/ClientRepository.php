<?php namespace App\Repositories\Client;

use App\Models\Client;
use App\Models\ClientFile;
use App\Models\ClientMessage;
use App\Models\ClientRules;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class ClientRepository extends BaseRepository implements ClientRepositoryInterface
{
    protected $model;
    protected ClientRules $client_rules;
    protected ClientFile $client_files;

    public function __construct(Client $model, ClientRules $client_rules, ClientFile $client_files)
    {
        parent::__construct($model);
        $this->client_rules = $client_rules;
        $this->client_files = $client_files;
    }

    public function getDataTable(){
        $list = $this->model->latest()->get();
        return Datatables::of($list)
            ->addColumn('actions', function ($row) {
                return view('admin.client.actions', ['row' => $row]);
            })
            ->editColumn('created_at', function ($row){
                $date = Carbon::parse($row->created_at)->format('Y-m-d');
                $now = Carbon::now()->format('Y-m-d');
                $diffForHumans = Carbon::createFromFormat('Y-m-d', $date)->diffForHumans();

                if($date >= $now){
                    return '<span>'.$date.'</span>';
                } else {
                    return '<span>'.$date.'</span><div class="form-text mt-0">'.$diffForHumans.'</div>';
                }
            })
            ->rawColumns(['actions', 'created_at'])
            ->make(true);
    }

    public function getUserRodo($client, $attributes = null): object
    {
        return $this->client_rules->where('client_id', $client->id)
            ->when(isset($attributes['status']), function($query) use ($attributes) {
                $query->where('status', $attributes['status']);
            })
            ->get();
    }

    public function getUserFiles($client): object
    {
        return $this->client_files->where('client_id', $client->id)
            ->when($user_id = auth()->id(), function($query) use ($user_id) {
                $query->where("user_id", $user_id);
            })
            ->get(['id', 'user_id', 'name', 'description', 'file', 'mime', 'size', 'created_at', 'updated_at']);
    }

    public function createClient($attributes, $property = null, $status = 0)
    {
        if (isset($attributes['cookie']) && is_array($attributes['cookie'])) {
            $utm_array = array_filter($attributes->cookie());
            unset($utm_array['XSRF-TOKEN'], $utm_array['laravel_session']);
        }

        $client = $this->model->updateOrCreate(
            ['mail' => $attributes['form_email']],
            [
                'phone' => $attributes['form_phone'] ?? NULL,
                'name' => $attributes['form_name'],
                'status' => $status,
                'updated_at' => now()
            ]
        );

        if(isset($attributes['form_message']) && $client->id){

            //$source = strtok($attributes->headers->get('referer'), '?');

            $msg = ClientMessage::create([
                'client_id' => $client->id,
                'message' => $attributes['form_message'],
                'ip' => $attributes->ip(),
                'source' => $attributes['page'],
            ]);

            $msg->save();
        }

        return $client;
    }
}
