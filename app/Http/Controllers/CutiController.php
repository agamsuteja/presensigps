<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;


class CutiController extends Controller
{
    public function index()
    {
        // Simpan hasil query ke dalam variabel $cuti
        $cuti = DB::table('master_cuti')->orderBy('kode_cuti', 'asc')->get();

        // Lalu kirim variabel $cuti ke view
        return view('cuti.index', compact('cuti'));
    }

    public function store(Request $request)
    {
        $kode_cuti = $request->kode_cuti;
        $nama_cuti = $request->nama_cuti;
        $jml_hari = $request->jml_hari;

        $cekcuti = DB::table('master_cuti')->where('kode_cuti',$kode_cuti)->count();
        if($cekcuti > 0){
            return Redirect::back()->with(['warning' => 'Data Kode Cuti Sudah Ada']);
        }

        try {
            DB::table('master_cuti')->insert([
                'kode_cuti' => $kode_cuti,
                'nama_cuti' => $nama_cuti,
                'jml_hari' => $jml_hari
            ]);
            return Redirect::back()->with(['success'=> 'Data Berhasil Disimpan']);
            
        } catch (\Exception $e) {
            return Redirect::back()->with(['warning'=> 'Data Gagal Disimpan']);
        }
    }


    public function edit(Request $request)
    {
        $kode_cuti = $request->kode_cuti;
        $cuti = DB::table('master_cuti')->where('kode_cuti', $kode_cuti)->first();
        return view('cuti.edit', compact('cuti'));
    }


    public function update($kode_cuti, Request $request)
    {
        $nama_cuti = $request->nama_cuti;
        $jml_hari = $request->jml_hari;
        $data = [
            'nama_cuti' => $nama_cuti,
            'jml_hari' => $jml_hari
        ];

        $update = DB::table('master_cuti')->where('kode_cuti', $kode_cuti)->update($data);
        if ($update){
            return Redirect::back()->with(['success' => 'Data Berhasil Di Update']);
        }else{
            return Redirect::back()->with(['warning' => 'Data Gagal Di Update']);
        }
    }

    public function delete($kode_cuti)
    {
        $hapus = DB::table('master_cuti')->where('kode_cuti', $kode_cuti)->delete(); 
        if($hapus){
            return Redirect::back()->with(['success'=>'Data Berhasil Dihapus']);
        }else{
            return Redirect::back()->with(['warning'=>'Data gagal Dihapus']);
        }
       
    }
}
   
