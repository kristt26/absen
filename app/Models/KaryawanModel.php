<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'karyawan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    // protected $allowedFields    = ['nama', 'gender', 'tempat_lahir', 'tanggal_lahir', 'hp', 'alamat', 'user_id'];
    protected $allowedFields    = ['nama', 'gender', 'tempat_lahir', 'tanggal_lahir', 'hp', 'alamat'];
    
}
