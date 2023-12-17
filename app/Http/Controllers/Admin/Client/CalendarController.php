<?php

namespace App\Http\Controllers\Admin\Crm\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\EventsRequest;
use App\Http\Requests\Api\PostEventRequest;
use App\Models\Client;
use App\Models\Event;
use App\Repositories\Calendar\EventRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

// CMS

class CalendarController extends Controller
{
    private $repository;

    public function __construct(EventRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Client $client)
    {
        return view('admin.crm.client.calendar.index', [
            'client' => $client
        ]);
    }

    public function show(EventsRequest $request, Client $client)
    {
        return $this->repository->getClientEvents($request, $client);
    }

    public function create(Request $request, Client $client)
    {
        if (request()->ajax()) {
            $date = Carbon::parse($request->get('date'));
            return view('admin.crm.modal.calendar-user-event', [
                'date' => $date->format('Y-m-d'),
                'time' =>  $date->format('H:i'),
                'allday' => $request->allDay,
                'client_id' => $client->id
            ])->render();
        }
    }

    public function edit(Event $event)
    {
        if (request()->ajax()) {
            return view('admin.crm.modal.calendar-user-event-edit', [
                'event' => $event->load('client')
            ])->render();
        }
    }

    public function update(PostEventRequest $request, Event $event)
    {
        if (request()->ajax()) {
            $this->repository->update($request->validated(), $event);
            return response()->json(['success' => true]);
        }
    }

}
