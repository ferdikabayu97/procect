<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User_id;
use Illuminate\Support\Facades\DB as DB;

class GantiPasswordController extends Controller
{
    public function __construct()
    {
        //
    }
    private function _is_valid_token($token)
    {
        return User_id::where('token', $token)->exists();
    }
    private function _is_valid_password($pass,$username)
    {
        return User_id::where('id_user', $username)->where('password', $pass)->exists();
    }
    private function _ganti_password($newpass,$username)
    {
        User_id::where('id_user', $username)->update(['password' => $newpass]);
        return array('status' => 200, 'msg' => 'Password berhasil diganti');
    }
    public function index(Request $request)
    {
        $token = $request->token;
        $username = $request->username;
        $newpass = $request->newpass;
        $oldpass = $request->oldpass;
        $is_valid = false;
       $is_valid = $this->_is_valid_token($token);
       if(!$is_valid){
        return array('status' => 301, 'msg' => 'Input gagal, silahkan periksa nilai input anda');
        }
        $valid_pass = false;
        $valid_pass = $this->_is_valid_password($oldpass,$username);

        if(!$valid_pass){
            return array('status' => 302, 'msg' => 'Password Lama Tidak Valid, silahkan periksa kembali');
            }
        if($valid_pass){
            $res = $this->_ganti_password($newpass,$username);
        }

        echo json_encode($res);
    }
}
