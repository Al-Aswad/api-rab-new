<?php

namespace App\Http\Controllers\Api;

use App\Bidang;
use App\Http\Controllers\Controller;
use App\Http\Requests\BidangRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BidangController extends Controller
{
    public function index()
    {

        $bidang = DB::table('bidang')
            ->orderByRaw('created_at DESC')
            ->get();

        if ($bidang)
            return ResponseFormatter::success($bidang, 'Data Produk Berhasil Di ambil');
        else
            return ResponseFormatter::error('error', 'Data Bidang Kosong', 404);
    }

    public function store(BidangRequest $request)
    {
        // dd($request->all());
        $data = $request->all();
        $bidang = Bidang::create($data);

        if ($bidang)
            return ResponseFormatter::success($bidang, 'Berhasil Menabah Bidang');
    }

    public function delete($id)
    {
        $bidang = Bidang::find($id);
        $bidang->delete();

        if ($bidang)
            return ResponseFormatter::success($bidang, 'Berhasil Menghapus Bidang');
    }
}
