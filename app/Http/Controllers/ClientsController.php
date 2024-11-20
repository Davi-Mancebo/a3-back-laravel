<?php

namespace App\Http\Controllers;

use App\Models\clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function getClients() {
        $clients = Clients::all();
        return response()->json($clients);
    }

    public function getClientById($clientId)
    {
        $client = Clients::find($clientId);
        return response()->json($client);
    }
}
