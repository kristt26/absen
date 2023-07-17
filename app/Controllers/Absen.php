<?php

namespace App\Controllers;

use App\Models\AbsenModel;
use App\Models\KaryawanModel;
use CodeIgniter\Database\Exceptions\DatabaseException;

class Absen extends BaseController
{
    public function index()
    {
        return view('absen');
    }

    public function read()
    {
        $kar= new KaryawanModel();
        $data = $kar->findAll();
        return $this->respond($data);
    }

    public function post()
    {
        $conn = \Config\Database::connect();
        $data = $this->request->getJSON();
        $aben= new AbsenModel();
        $itemAbsen = $aben->where(['tanggal'=>date('Y-m-d'), 'karyawan_id'=>$data->karyawan_id])->first();
        try {
            $conn->transException(true)->transStart();
            if(isset($data->status)){
                if($data->status=='datang'){
                    if(is_null($itemAbsen)){
                        $item = [
                            'karyawan_id'=>$data->karyawan_id,
                            'tanggal'=>date('Y-m-d'),
                            'datang'=> date("h:i:s"),
                            'keterangan'=>"H"
                        ];
                        $aben->insert($item);
                        $conn->transComplete();
                        return $this->respondCreated(true);
                    }else{
                        throw new DatabaseException("Anda telah absen datang", 1);
                    }
                }else{
                    if(is_null($itemAbsen)){
                        throw new DatabaseException("Anda belum absen datang", 1);
                    }else{
                        if(is_null($itemAbsen->pulang)){
                            $aben->update($itemAbsen->id, ['pulang'=>date("h:i:s")]);
                            $conn->transComplete();
                            return $this->respondUpdated(true);
                        }else{
                            throw new DatabaseException("Anda sudah absen pulang", 1);
                        }
                    }
                }
            }else{
                throw new DatabaseException("Pilih status absen", 1);
            }
        } catch (DatabaseException $e) {
            return $this->fail($e->getMessage());
        }
        
    }
}
