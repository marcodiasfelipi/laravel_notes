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
        
        //verifica existência do username.
        $user = User::where('username', $username)
                        ->where('deleted_at', NULL)
                        ->first();
        
        if(!$user){
            return redirect()
                   ->back()
                   ->withInput()
                   ->with('loginError', 'Usuário ou senha incorretos.');
        }

        if(!password_verify($password, $user->password)){
            return redirect()
                   ->back()
                   ->withInput()
                   ->with('loginError', 'Senha incorreta.');
        }

        $user->last_login = date('Y-m-d H:i:s');
        $user->save();

        session([
            'user' => [
                'id' => $user->id,
                'username'=> $user->username
            ]
        ]);

        //REDIRECIONAR PARA HOME
        return redirect()->to('/login');

    }
    public function logout(){
        session()->forget('user');
        return redirect()->to('/login');
    }
}
