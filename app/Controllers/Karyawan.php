<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KaryawanModel;
use App\Models\UserModel;

class Karyawan extends BaseController
{
    
    public function index()
    {
        $karyawan = new KaryawanModel();
        $data['title'] = "Daftar Karyawan";
        $data['data'] = $karyawan->select('karyawan.*, user.username')->join('user', 'user.id=karyawan.user_id', 'LEFT')->findAll();
        return view('karyawan/index', $data);
    }
    public function create()
    {
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules(['nama' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if($isDataValid){
            $karyawan = new KaryawanModel();
            $user = new UserModel();
            $conn = \Config\Database::connect();
            try {
                $conn->transBegin();
                $user->insert(['username'=>$this->request->getPost('username'), 'password'=>password_hash('user123', PASSWORD_DEFAULT)]);
                $user_id = $user->getInsertID();
                $cek = $karyawan->insert([
                    "nama" => $this->request->getPost('nama'),
                    "gender" => $this->request->getPost('gender'),
                    "tempat_lahir" => $this->request->getPost('tempat_lahir'),
                    "Tanggal_lahir" => $this->request->getPost('tanggal_lahir'),
                    "hp" => $this->request->getPost('hp'),
                    "alamat" => $this->request->getPost('alamat'),
                    "user_id" => $user_id,
                ]);
                if($conn->transStatus()){
                    $conn->transCommit();
                    session()->setFlashdata('pesan', 'success,Data Berhasil Simpan');
                    return redirect()->to(base_url('karyawan'));
                }else{
                    throw new \Exception("Data Gagal simpan", 1);
                    
                }
            } catch (\Throwable $th) {
                $conn->transRollback();
                session()->setFlashdata('pesan', 'error,'.$th->getMessage());
            }
            
        }
        // tampilkan form create
        return view('karyawan/tambah');
    }

    public function update($id) {
        $karyawan = new KaryawanModel();
        $data['data'] = $karyawan->where('id', $id)->first();
        
        // lakukan validasi data artikel
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data vlid, maka simpan ke database
        if($isDataValid){
            $karyawan->update($id, [
                "nama" => $this->request->getPost('nama'),
                "tempat_lahir" => $this->request->getPost('tempat_lahir'),
                "Tanggal_lahir" => $this->request->getPost('tanggal_lahir'),
                "hp" => $this->request->getPost('hp'),
                "alamat" => $this->request->getPost('alamat')
            ]);
            return redirect()->to(base_url('karyawan'));
        }

        // tampilkan form edit
        return view('karyawan/ubah', $data);
    }

    public function delete($id) {
        $karyawan = new KaryawanModel();
        $karyawan->delete($id);
        return redirect()->to(base_url('karyawan'));
    }
}
