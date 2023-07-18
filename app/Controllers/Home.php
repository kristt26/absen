<?php

namespace App\Controllers;

use App\Models\AbsenModel;
use App\Models\KaryawanModel;

class Home extends BaseController
{
    public function index()
    {
        $kar = new KaryawanModel();
        $abs = new AbsenModel();
        $data['karyawan'] = $kar->countAllResults();
        $data['absen'] = $abs->where(['tanggal >='=>date("Y-m-d"), 'tanggal <='=>date("Y-m-d")])->countAllResults();
        $data['title'] = "Home";

        return view('home', $data);
    }
}
