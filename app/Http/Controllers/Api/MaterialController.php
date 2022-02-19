<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Material;

class MaterialController extends Controller
{
    public function index()
    {
        $material = DB::table('material')
            ->orderByRaw('created_at DESC')
            ->get();

        if ($material)
            return ResponseFormatter::success($material, 'Data Material Berhasil Di ambil');
        else
            return ResponseFormatter::error('error', 'Data material Kosong', 404);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        $material = Material::create($data);

        if ($material)
            return ResponseFormatter::success($material, 'Berhasil Menabah Material');
    }

    public function delete($id)
    {
        $material = Material::find($id);
        $material->delete();

        if ($material)
            return ResponseFormatter::success($material, 'Berhasil Menghapus Material');
    }
}
