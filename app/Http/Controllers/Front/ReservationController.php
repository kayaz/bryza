<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;

use App\Mail\ChatSend;
use App\Mail\ReservationSend;
use App\Models\Page;
use App\Models\RodoRules;
use App\Models\RodoSettings;
use App\Notifications\ReservationNotification;
use App\Repositories\Client\ClientRepository;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;

use App\Models\Recipient;


class ReservationController extends Controller
{
    private ClientRepository $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }


    function index(){
        $page = Page::find(7);

        return view("front.reservation.index")->with([
            'page' => $page,
            'obligation' => RodoSettings::find(1),
            'rules' => RodoRules::orderBy('sort')->whereActive(1)->get(),
        ]);
    }

    function form(ContactFormRequest $request, Recipient $recipient)
    {

        $recipient->notify(new ReservationNotification($request));

        try {
            $client = $this->repository->createClient($request);
            Mail::to(settings()->get("page_email"))->send(new ReservationSend($request, $client));

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
            dd($exception);
        }

        return redirect()->back()->with(
            'success',
            'Twoja wiadomość została wysłana. W najbliższym czasie skontaktujemy się z Państwem celem omówienia szczegółów!'
        );
    }
}
