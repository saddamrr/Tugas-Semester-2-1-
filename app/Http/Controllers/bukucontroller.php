<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Buku;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class bukucontroller extends Controller
{
    public function index()
    {
        $dt_buku=Buku::get();
        return response()->json($dt_buku);
    }

    public function store(Request $req){
        $validator=Validator::make($req->all(),[
          'judul' => 'required',
          'penerbit' => 'required',
          'pengarang' => 'required',
          'foto'=>'required',
        ]);
        if($validator->fails()){
          return Response()->json($validator->errors());
        }
  
        $simpan=Buku::create([
          'judul' => $req->judul,
          'penerbit' => $req->penerbit,
          'pengarang' => $req->pengarang,
          'foto' => $req->foto,
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

      public function update($id_buku, Request $req) {
        $validator=Validator::make($req->all(),[
            'judul' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',
            'foto' => 'required',
        ]);
        if($validator->fails()){
          return Response()->json($validator->errors());
        }
        $ubah=Buku::where('id_buku', $id_buku)->update([
            'judul' => $req->judul,
            'penerbit' => $req->penerbit,
            'pengarang' => $req->pengarang,
            'foto' => $req->foto,
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
      public function destroy($id_buku){
        $hapus=Buku::where('id_buku',$id_buku)->delete();
        if($hapus){
            $data['message'] = 'Data berhasil dihapus!';
            return response()->json($data);
        } else {
            $data['message'] = 'Data gagal dihapus!';
            return response()->json($data);
        }
    }
}
