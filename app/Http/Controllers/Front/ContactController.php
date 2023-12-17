<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;

// CMS
use App\Repositories\Client\ClientRepository;
use App\Notifications\ContactNotification;
use App\Http\Requests\ContactFormRequest;

use App\Models\RodoSettings;
use App\Models\Recipient;
use App\Models\RodoRules;
use App\Models\Page;

use App\Mail\ChatSend;

class ContactController extends Controller
{
    private ClientRepository $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    function index(){
        $page = Page::find(6);

        return view("front.contact.index")->with([
            'page' => $page,
            'obligation' => RodoSettings::find(1),
            'rules' => RodoRules::orderBy('sort')->whereActive(1)->get(),
            ]);
    }

    function form(ContactFormRequest $request, Recipient $recipient)
    {

        $recipient->notify(new ContactNotification($request));

        try {
            $client = $this->repository->createClient($request);
            Mail::to(settings()->get("page_email"))->send(new ChatSend($request, $client));

            if( count(Mail::failures()) == 0 ) {
                $cookie_name = 'dp_';
                foreach ($_COOKIE as $name => $value) {
                    if (stripos($name, $cookie_name) === 0) {
                        Cookie::queue(
                            Cookie::forget($name)
                        );
                    }
                }
            }
        } catch (\Throwable $exception) {
            //dd($exception);
        }


        return redirect()->back()->with(
            'success',
            'Twoja wiadomość została wysłana. W najbliższym czasie skontaktujemy się z Państwem celem omówienia szczegółów!'
        );
    }
}
