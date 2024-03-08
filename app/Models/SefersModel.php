<?php

namespace App\Models;

use CodeIgniter\Model;

class SefersModel extends Model
{
    protected $table = 'seferler';
    protected $primaryKey = 'sefer_id';
    protected $allowedFields = ['kalkis_yeri', 'varis_yeri', 'otobus_plaka', 'sefer_tarih', 'sefer_fiyat'];
}
