<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Throwable;
use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('welcome', [
            'users' => $users
        ]);
    }
    public function Usersimport(Request $request){
        try{
            Excel::import(new UserImport, $request->file('arquivo_importacao'));
            return redirect()->back()->with('success', 'Deu tudo certo!!!');
            
        }catch(Throwable $e){
            dd($e);
            return redirect()->back()->with('error', $e->getMessage());
        }
        
    }
}
