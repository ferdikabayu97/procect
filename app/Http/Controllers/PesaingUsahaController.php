<?php

namespace App\Http\Controllers;
use App\User_id;
use Illuminate\Support\Facades\DB as DB;
use Illuminate\Http\Request;
use App\UMKM;
use App\Data_kode_lokasi;

class PesaingUsahaController extends Controller
{
    public function __construct()
    {
        //
    }

    private function _is_valid_token($token)
    {
        return User_id::where('token', $token)->exists();
    }

    private function _data_rekomendasi($kec,$kel,$ju)
    {
        $val = UMKM::where('kecamatan', $kec)->where('kelurahan',$kel)->where('jenis_usaha', 'like', '%'.$ju.'%')->get();
        return $val;
        //GATAU CARA MAININ HASIL UMKM:: NYA MAS:( PENGENNYA DITAMBAH JUGA SAMA DATA UMKM::where('kecamatan', $kecamatan)->whereNULL('kelurahan')->where('jenis_usaha', 'like', '%'.$ju.'%')->get();
    }

    public function index(Request $request)
    {
        $kecamatan = $request->kecamatan;
        $kelurahan = $request->kelurahan;
        $api_key = $request->token;
        $jenisusaha = $request->jenisusaha;
 
        $is_valid = $this->_is_valid_token($api_key);


       $res = array();
    $res['status'] = 200;
    $res['data'] = $this->_data_rekomendasi($kecamatan,$kelurahan,$jenisusaha);
       echo json_encode($res);
}
}
