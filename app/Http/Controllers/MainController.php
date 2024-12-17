<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Services\Operations;
use Illuminate\Http\Request;


class MainController extends Controller
{
    public function index()
    {
        //CARREGA NOTAS DO USUÁRIO
        $id = session('user.id');
        $notes = User::find($id)
                    ->notes()
                    ->whereNull('deleted_at')
                    ->get()
                    ->toArray();
        //MOSTRA HOME
        return view('home', ['notes' => $notes]);
    }

    public function newNote()
    {
        return view('new_note');
    }


    // public function page2($value){
    //     return view('page2', ['v' => $value]);
    //     //dentro da view, nome da variavel neste caso é v
    // }

    // public function page3($value){
    //     return view('page3', ['v' => $value]);
    //     //dentro da view, nome da variavel neste caso é v
    // }

    

}
