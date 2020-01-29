<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Anggota;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class anggotacontroller extends Controller
{
    public function index()
    {
        $dt_anggota=Anggota::get();
        return response()->json($dt_anggota);
    }

    public function store(Request $req){
        $validator=Validator::make($req->all(),[
          'nama_anggota' => 'required',
          'alamat' => 'required',
          'notelp' => 'required',
        ]);
        if($validator->fails()){
          return Response()->json($validator->errors());
        }
  
        $simpan=Anggota::create([
          'nama_anggota' => $req->nama_anggota,
          'alamat' => $req->alamat,
          'notelp' => $req->notelp,
        ]);
        if($simpan){
            $data['status']=1;
            $data['message'] = 'Data berhasil ditambahkan!';
            return response()->json($data);
        } else {
            $data['status']=0;
            $data ['message']= 'Data gagal ditambahkan!';
            return response()->json($data);
        }
      }

      public function update($id_anggota, Request $req) {
        $validator=Validator::make($req->all(),[
            'nama_anggota' => 'required',
            'alamat' => 'required',
            'notelp' => 'required',
        ]);
        if($validator->fails()){
          return Response()->json($validator->errors());
        }
        $ubah=Anggota::where('id_anggota',$id_anggota)->update([
            'nama_anggota' => $req->nama_anggota,
            'alamat' => $req->alamat,
            'notelp' => $req->notelp,
        ]);
        if($ubah){
            $data['status']=1;
            $data['message'] = 'Data berhasil diubah!';
            return response()->json($data);
        } else {
            $data['status']=0;
            $data ['message']= 'Data gagal diubah!';
            return response()->json($data);
        }
      }
      public function destroy($id_anggota){
        $hapus=Anggota::where('id_anggota',$id_anggota)->delete();
        if($hapus){
            $data['message'] = 'Data berhasil dihapus!';
            return response()->json($data);
        } else {
            $data['message'] = 'Data gagal dihapus!';
            return response()->json($data);
        }
    }
}
