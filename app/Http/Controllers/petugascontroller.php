<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class petugascontroller extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(compact('token'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_petugas' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'notelp' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:petugas',
            'password' => 'required|string|min:5|confirmed',
            'level' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = User::create([
            'nama_petugas' => $request->get('nama_petugas'),
            'alamat' => $request->get('alamat'),
            'notelp' => $request->get('notelp'),
            'level' => $request->get('level'),
            'username' => $request->get('username'),
            'password' => Hash::make($request->get('password')),
        ]);
        $token = JWTAuth::fromUser($user);
        return response()->json(compact('user','token'),201);
    }

    public function update($id_petugas, Request $request)
    {
        $validator=Validator::make($request->all(),
        [
            'nama_petugas'=>'required',
            'alamat'=>'required',
            'notelp'=>'required',
            'username'=>'required',
            'password'=>'required',
        ]  
    );
    if($validator->fails()){
        return Response()->json($validator->errors());
    }
    $ubah=User::where('id_petugas',$id_petugas)->update([
        'nama_petugas'=>$request->nama_petugas,
        'alamat'=>$request->alamat,
        'notelp'=>$request->notelp,
        'username'=>$request->username,
        'password'=>$request->password,
    ]);
    if($ubah){
        $data['message'] = 'Petugas berhasil diubah!!!';
        return response()->json($data);
    } else {
        $data['message'] = 'Petugas gagal diubah!!!';
        return response()->json($data);
    }
    }

    public function destroy($id_petugas)
    {
        $hapus=User::where('id_petugas',$id_petugas)->delete();
        if($hapus){
            $data['message'] = 'Data berhasil dihapus!';
            return response()->json($data);
        } else {
            $data['message'] = 'Data gagal dihapus!';
            return response()->json($data);
        }
    }

    public function getAuthenticatedUser()
    {
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }
        return response()->json(compact('user'));
    }
}
