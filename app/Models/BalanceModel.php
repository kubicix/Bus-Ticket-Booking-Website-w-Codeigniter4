<?php

namespace App\Models;

use CodeIgniter\Model;

class BalanceModel extends Model
{
    protected $table = 'balances';
    protected $primaryKey = 'TcKimlik';
    protected $allowedFields = ['TcKimlik', 'TotalBalance'];
}
