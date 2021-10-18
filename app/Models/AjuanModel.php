<?php

namespace App\Models;

use CodeIgniter\Model;

class AjuanModel extends Model
{
    // ...
    protected $table = 'ajuan';
    protected $primaryKey = 'ajuanid';
    protected $useAutoIncrement = false;
    protected $useTimestamps = true;

    protected $allowedFields = ['ajuanid', 'cuti_mulai', 'cuti_akhir', 'userid', 'nama_pegawai', 'jabatan', 'keterangan', 'status'];
}
