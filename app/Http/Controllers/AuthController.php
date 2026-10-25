<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AuthController extends Controller
{
    public function login(){
        //Exibe o formulário de login
        return view('login');
    }

    public function loginSubmit(Request $request){
        // echo 'login submit';
        //dd($request->all());
        //dd($request->input('text_username'));
        $request->validate(
            [
                'text_username' => 'required|min:3',
                'text_password' => 'required|min:6',
            ],
            [
                'text_username.required' => 'O campo e-mail é obrigatório.',
                'text_username.email' => 'O campo de e-mail deve conter um endereço válido.',
                'text_username.min' => 'O campo e-mail deve ter no mínimo 3 caracteres',

                'text_password.required' => 'O campo password é obrigatório.',
                'text_password.min' => 'O campo password deve ter no mínimo 6 caracteres',

            ]
        );
        // Se passar na validação, segue o fluxo!!!
        $username = $request->input('text_username');
        $password = $request->input('text_password');

        //echo "Bem vindo usuário: " . $username . "<BR>";
        //echo "Senha: " . $password;

        // try {
        //     DB::connection()->getPdo();
        //     echo "Conexão feita com sucesso!";
        // } catch(\Exception $e){
        //     echo "A conexão falhou: " . $e->getMessage();
        // }
        //$user = new User();
        //$user->listarUsuarios();
        //User::listarUsuarios();
        $user = User::where('username',$username)
                    ->whereNull('deleted_at')
                    ->first();
        // echo '<pre>';
        // print_r($user->toArray());
        if(!$user){
            return redirect()->back()
                    ->withInput()
                    ->with('login_error','Username ou password incorretos!');
        } else {
            if(!password_verify($password,$user->password)){
                return redirect()->back()
                        ->withInput()
                        ->with('login_error','Username ou password incorretos!');
            }
        }
        
        $user->last_login = date('Y-m-d H:i:s');
        $user->save(); //Persistir no BD
        session([
            'user' => [
                'id' => $user->id,
                'username' => $user->username,
            ]
        ]);
        // $dadosUsuario = session('user');
        // dd($dadosUsuario);

       return redirect('/');

    }

    public function create(){
        return 'Criando usuario';
    }

    public function logout(){
        //Realiza o logout do usuário
        //echo 'logout';
        //Remover os dados do usuário da sessão
        session()->forget('user');
       // $dadosUsuario = session('user');
       // dd($dadosUsuario);
       //Redirecionar para a tela de login
       return redirect()->route('login');
    }
}
