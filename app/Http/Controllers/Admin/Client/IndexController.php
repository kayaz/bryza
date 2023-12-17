<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;

// CMS
use App\Repositories\Client\ClientRepository;
use App\Models\Client;

class IndexController extends Controller
{

    private $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    function index()
    {
        return view('admin.client.index');
    }

    public function show(Client $client)
    {
        return view('admin.client.show.index', [
            'client' => $client
        ]);
    }

    public function datatable()
    {
        return $this->repository->getDataTable();
    }
}
