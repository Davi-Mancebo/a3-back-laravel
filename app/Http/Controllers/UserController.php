<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Response;
use Illuminate\Support\Str;


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
    \Log::info('Login Attempt:', ['ra' => $request->input('ra')]);

    // Buscar o usuário pelo RA
    $user = User::where('ra', $request->input('ra'))->first();

    if (!$user || !Hash::check($request->input('password'), $user->password)) {
        return response()->json([
            'message' => 'Credenciais inválidas.'
        ], 401);
    }

    // Gerar um token para a sessão
    $token = Str::random(60);

    // Opcional: Salvar o token no banco (ou em cache/sessão)
    $user->remember_token = $token;
    $user->save();

    \Log::info('Login Success:', ['ra' => $user->ra]);

    return response()->json([
        'token' => $token,
        'user' => [
            'name' => $user->name,
            'ra' => $user->ra,
            'type' => $user->type,
        ],
    ]);
}

}
