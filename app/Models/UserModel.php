<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'customer';
    protected $allowedFields = ['username', 'password', 'jenis_kelamin', 'tanggal_lahir', 'telepon', 'email', 'alamat'];
}
