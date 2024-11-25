<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Response;


class UserController extends Controller
{
    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validated(); // Dados validados

        // Cria o usuário no banco de dados
        $user = User::create([
            'name' => $validatedData['name'],
            'ra' => $validatedData['ra'],
            'password' => Hash::make($validatedData['password']), // Hash na senha
            'type' => $validatedData['type'],
        ]);

        // Retorna uma resposta de sucesso
        return response()->json([
            'message' => 'Usuário cadastrado com sucesso!',
            'user' => $user,
        ], 201);
    }


    public function login(LoginRequest $request)
    {
        // Buscar o usuário pelo RA
        $user = User::where('ra', $request->input('ra'))->first();

        // Verificar se o usuário existe
        if (!$user) {
            return response()->json([
                'message' => 'Usuário não encontrado.'
            ], 404);
        }

        // Verificar se a senha está correta
        if (!Hash::check($request->input('password'), $user->password)) {
            return response()->json([
                'message' => 'Credenciais inválidas.'
            ], 401);
        }
        // Gerar o token JWT para o usuário
        $token = JWTAuth::fromUser($user);

        // Retornar o token e informações do usuário
        return response()->json([
            'token' => $token,
            'user' => [
                'name' => $user->name,
                'ra' => $user->ra,
                'type' => $user->type,
            ],
        ]);
    }
    public function getUsers(){
        $users = User::all();
        return response()->json($users, Response::HTTP_OK);
    }

    public function getUserById($id){
        $user = User::find($id);
        if(!$user){
            return response()->json(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json($user, Response::HTTP_OK);
    }

    public function update(UpdateUserRequest $updateUserRequest, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
        }
        $user->update($updateUserRequest->validated());
        return response()->json($user, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
        }
        $user->delete();
        return response()->json(['message' => 'User deleted successfully'], Response::HTTP_NO_CONTENT);
    }
}
