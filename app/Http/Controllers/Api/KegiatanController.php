<?php

namespace App\Http\Controllers\Api;

use App\Anggaran;
use App\Bidang;
use App\Http\Controllers\Controller;
use App\Kegiatan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KegiatanController extends Controller
{
    //
    public function index()
    {
        $kegiatan = Kegiatan::with(['bidang'])
            ->orderByRaw('created_at DESC')
            ->get();
        // dd($kegiatan);
        foreach ($kegiatan as $item) {

            $item->date = Carbon::createFromDate($item->created_at)->format('d-m-Y H:i:s');
        }

        if ($kegiatan)
            return ResponseFormatter::success($kegiatan, 'Data kegiatan Berhasil Di ambil');
        else
            return ResponseFormatter::error('error', 'Data Kegiatan Kosong', 404);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $kegiatan = Kegiatan::create($data);

        if ($kegiatan)
            return ResponseFormatter::success($kegiatan, 'Berhasil Menambah Kegiatan');
    }
    public function show($id)
    {
        $kegiatan = DB::table('anggaran')
            ->where('kegiatan_id', $id)
            ->get();
        if ($kegiatan)
            return ResponseFormatter::success($kegiatan, 'Berhasil Menambah Kegiatan');
    }

    public function delete($id)
    {
        $kegiatan = Kegiatan::find($id);

        if (!$kegiatan)
            return ResponseFormatter::error('error', 'Data Tidak Ditemukan', 404);

        $kegiatan->delete();

        if ($kegiatan)
            return ResponseFormatter::success($kegiatan, 'Berhasil Menghapus Kegiatan');

        else
            return ResponseFormatter::error($kegiatan, 'Gagal Menghapus Kegiatan', 404);
    }
}
