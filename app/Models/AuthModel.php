<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'users';

    protected $allowedFields = ['AdiSoyadi', 'EMail', 'TcKimlik', 'CepTelefon', 'Gun', 'Ay', 'Yil', 'Il', 'Sifre', 'Cinsiyeti'];

    public function registerUser($userData)
    {
        $query = $this->db->table($this->table)->insert($userData);
        return $query ? true : false;
    }

    public function checkEmailExists($email)
    {
        return $this->db->table($this->table)->where('EMail', $email)->countAllResults() > 0;
    }

    public function loginUser($phone, $password)
    {
        return $this->db->table($this->table)->where('CepTelefon', $phone)->where('Sifre', $password)->get()->getRowArray();
    }
}