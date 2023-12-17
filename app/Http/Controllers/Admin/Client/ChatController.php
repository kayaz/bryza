<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;

//CMS
use App\Models\ClientMessage;
use App\Models\Client;


class ChatController extends Controller
{
    public function show(Client $client)
    {
        return view('admin.client.chat.index', [
            'client' => $client,
            'chat' => ClientMessage::where('client_id', '=', $client->id)->where('user_id', '=', 0)->with('answers')->latest()->get()
        ]);
    }
}
