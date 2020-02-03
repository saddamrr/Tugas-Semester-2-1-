<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjaman;
use App\DetailPeminjaman;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class peminjamancontroller extends Controller
{
    public function store(Request $req){
        $validator=Validator::make($req->all(),[
            'id_anggota'=>'required',
            'id_petugas'=>'required',
            'tgl'=>'required',
            'deadline'=>'required',
            'denda'=>'required'
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $simpan=Peminjaman::create([
            'id_anggota'=>$req->id_anggota,
            'id_petugas'=>$req->id_petugas,
            'tgl'=>$req->tgl,
            'deadline'=>$req->deadline,
            'denda'=>$req->denda
        ]);
        if($simpan){
            $data['status']= 'Berhasil';
            $data['message']= 'Data berhasil ditambahkan!';
            return response()->json($data);
        } else {
            $data['status']= 'Gagal';
            $data['message']= 'Data batal ditambahkan!';
            return response()->json($data);
        }
    }

    public function update($id_peminjaman, Request $req){
        $validator=Validator::make($req->all(),[
            'id_anggota' => 'required',
            'id_petugas' => 'required',
            'tgl' => 'required',
            'deadline'=>'required',
            'denda'=>'required'
        ]);
        if($validator->fails()){
          return Response()->json($validator->errors());
        }
        $ubah=Peminjaman::where('id_peminjaman',$id_peminjaman)->update([
            'id_anggota' => $req->id_anggota,
            'id_petugas' => $req->id_petugas,
            'tgl' => $req->tgl,
            'deadline'=>$req->deadline,
            'denda'=>$req->denda
        ]);
        if($ubah){
            $data['status']='Berhasil';
            $data['message'] = 'Data berhasil diubah!!!';
            return response()->json($data);
        } else {
            $data['status']='Gagal';
            $data ['message']= 'Data gagal diubah!!';
            return response()->json($data);
        }
    }

    public function destroy($id_peminjaman){
        $hapus=Peminjaman::where('id_peminjaman', $id_peminjaman)->delete();
        if ($hapus) {
            $data['status']='Berhasil';
            $data['message'] = 'Data berhasil dihapus!';
            return response()->json($data);
        } else {
            $data['status']='Gagal';
            $data['message']= 'Data gagal dihapus!';
            return response()->json($data);
        }
    }

    public function show($id_peminjaman){
        $pinjam = Peminjaman::join('anggota','anggota.id_anggota', 'peminjaman.id_anggota')
        ->where('id_peminjaman', $id_peminjaman)->first();

        $detail=DetailPeminjaman::where('id_pinjam', $id_peminjaman)->get();

        $array['data']['id_anggota']=$pinjam->id_anggota;
        $array['data']['nama_anggota']=$pinjam->nama_anggota;
        $array['data']['id_petugas']=$pinjam->id_petugas;
        $array['data']['tanggal_pinjam']=$pinjam->tgl;
        $array['data']['tanggal_kembali']=$pinjam->deadline;
        $array['data']['data_buku']=$detail;
        return response()->json($array);
    }
}
