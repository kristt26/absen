<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsenModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'absen';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['karyawan_id', 'tanggal', 'datang', 'pulang', 'keterangan'];
    
}
