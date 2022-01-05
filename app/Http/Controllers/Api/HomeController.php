<?php

namespace App\Http\Controllers\Api;

use App\Bidang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        // $bidang = DB::table('bidang')
        // ->get();
        // dd($bidang);

        $bidang = Bidang::all();

        if ($bidang)
            return ResponseFormatter::success($bidang, 'Data Produk Berhasil Di ambil');
        else
            return ResponseFormatter::error('error', 'Data Bidang Kosong', 404);
    }
}
