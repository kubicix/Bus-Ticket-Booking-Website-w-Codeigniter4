<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'TcKimlik';
    protected $allowedFields = ['TcKimlik', 'AdiSoyadi', 'CepTelefon', 'EMail', 'Gun', 'Ay', 'Yil', 'Il', 'Cinsiyeti', 'is_admin'];
}
