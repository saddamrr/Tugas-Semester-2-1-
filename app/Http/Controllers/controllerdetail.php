<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailPeminjaman;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class controllerdetail extends Controller
{
    public function store(Request $req){
        $validator=Validator::make($req->all(),[
            'id_pinjam'=>'required',
            'id_buku'=>'required',
            'qty'=>'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $simpan=DetailPeminjaman::create([
            'id_pinjam'=>$req->id_pinjam,
            'id_buku'=>$req->id_buku,
            'qty'=>$req->qty
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

    public function destroy($id_detail){
        $hapus=DetailPeminjaman::where('id_detail', $id_detail)->delete();
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

    public function update($id_detail, Request $req){
        $validator=Validator::make($req->all(),[
            'id_pinjam' => 'required',
            'id_buku' => 'required',
            'qty' => 'required'
        ]);
        if($validator->fails()){
          return Response()->json($validator->errors());
        }
        $ubah=DetailPeminjaman::where('id_detail',$id_detail)->update([
            'id_pinjam' => $req->id_pinjam,
            'id_buku' => $req->id_buku,
            'qty' => $req->qty
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
}
