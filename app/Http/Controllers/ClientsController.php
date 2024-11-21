<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Clients;
use Illuminate\Http\Response;

class ClientsController extends Controller
{
    public function getClients() {
        $clients = Clients::all();
        return response()->json($clients, Response::HTTP_OK);
    }

    public function getClientById($clientId)
    {
        $client = Clients::find($clientId);
        if(!$client) {
            return response()->json(['message' => 'Client not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json($client, Response::HTTP_OK);
    }

    public function create(StoreClientRequest $request)
    {
        $client = Clients::create($request->validated());
        return response()->json($client, Response::HTTP_CREATED);
    }

    public function update(UpdateClientRequest $updateClientRequest, $id)
    {
        // Encontrar o cliente pelo ID
        $client = Clients::find($id);

        // Se o cliente não existir
        if (!$client) {
            return response()->json(['message' => 'Client not found'], Response::HTTP_NOT_FOUND);
        }

        // Atualizar o cliente com os dados validados
        $client->update($updateClientRequest->validated());

        // Retornar o cliente atualizado
        return response()->json($client, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        // Encontrar o cliente
        $client = Clients::find($id);

        // Se o cliente não existir
        if (!$client) {
            return response()->json(['message' => 'Client not found'], Response::HTTP_NOT_FOUND);
        }

        // Excluir o cliente
        $client->delete();

        // Retornar resposta de sucesso
        return response()->json(['message' => 'Client deleted successfully'], Response::HTTP_NO_CONTENT);
    }
}
