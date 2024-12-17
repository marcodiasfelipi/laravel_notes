<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }
    public function loginSubmit(Request $request){
        //validação de formulário
        $request->validate(
            //REGRAS
            [
                'text_username' => 'required|email',
                'text_password' => 'required|min:6|max:16'
            ],
            //MENSAGENS CASO NÃO SEJA CUMPRIDO
            [
                'text_username.required' => 'O usuário é obrigatório.',
                'text_username.email' => 'Usuário deve ser um email válido.',
                'text_password.required' => 'A senha é obrigatória.',
                'text_password.min' => 'A senha deve ter pelo menos :min caracteres.',
                'text_password.max' => 'A senha deve ter no máximo :max caracteres.'
            ]
        );
        $username = $request->input('text_username');
        $password = $request->input('text_password');
        
        //testar conexão do banco de dados
        // try{
        //     DB::connection()->getPdo();
        //     echo 'Connection is OK!';
        // } catch (\PDOException $e){
        //     echo 'Connection is failed!';
        // }

        $user = User::where('username', $username)
                        ->where('deleted_at', NULL)
                        ->first();
        echo '<pre>';
    }
    public function logout(){

    }
}
