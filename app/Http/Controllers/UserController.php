<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
        public function create()
        {
            $users = User::all();
            return view('users.create', compact('users'));   
        }
            public function store(Request $request)
            {
                $request->validate([
                    'username' => 'required',
                    'password' => 'required',
                    'NamaLengkap' => 'required',
                    'alamat' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'peran' => 'required'
                
                ]);
            
                User::create([
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'NamaLengkap' => $request->NamaLengkap,
                    'Alamat' => $request->alamat,
                    'email' => $request->email,
                    'peran' => $request->peran,
                ]);
                return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.'); 
            }
            public function edit($id)
            {
                $users = User::findOrFail($id);
                return view('users.edit', compact('users'));
                
            }
            public function profil()
{
    $user = Auth::user();
    return view('users.profil', compact('user'));
}

            public function update(Request $request, $id)
            {
                $request->validate([
                   'peran' => 'required' 
                    
                ]);
                $users = User::findOrFail($id);
                $users->peran = $request->peran;
                $users->save();

                return redirect()->route('users.index')->with('success', 'Peran berhasil diperbarui');
            }    
            }