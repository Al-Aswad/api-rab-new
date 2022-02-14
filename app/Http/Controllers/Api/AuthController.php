<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
    }
    public function register(Request $request)
    {
        $dataRegistrasi = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
            'role' => ['required'],
        ]);

        $dataRegistrasi['password'] = Hash::make($request->password);

        $user = User::create($dataRegistrasi);

        if ($user)
            return ResponseFormatter::success($dataRegistrasi, 'Berhasil Melakukan Registrasi');
    }

    public function login(Request $request)
    {
        $dataLogin = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($dataLogin)) {

            $userAuth = User::where('name', $request['name'])->first();

            $userlogin = ([
                'username' => $userAuth['name'],
                'role' => $userAuth['role'],
            ]);
            return ResponseFormatter::success($userlogin, 'Login Berhasil !');
        }

        return ResponseFormatter::success($dataLogin, 'Login Gagal !');
    }
    public function get_user()
    {
        $user = User::all();
        if ($user)
            return ResponseFormatter::success($user, 'Data User Berhasil di ambil');
        else
            return ResponseFormatter::error('error', 'Data User Kosong', 404);
    }

    // public function create_user(Request $request)
    // {
    //     dd($request->all());
    // }
    public function reset_password($id)
    {
        // dd($id);
        $data = [
            'password' =>  Hash::make('user')
        ];

        DB::table('users')->where('id', $id)
            ->update($data);

        return ResponseFormatter::success($data, 'Berhasil Update Password !!!');
    }
    public function hapus_user($id)
    {
        User::where('id', $id)->delete();
        return ResponseFormatter::success($id, 'Berhasil menghapus User  !!!');
    }
    public function create_user(Request $request)
    {
        $data = $request->all();
        // $dataRegistrasi = $request->validate([
        //     'name' => ['required'],
        //     'password' => ['required'],
        //     'role' => ['required'],
        // ]);

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        if ($user)
            return ResponseFormatter::success($data, 'Berhasil Melakukan Registrasi');
    }
};
