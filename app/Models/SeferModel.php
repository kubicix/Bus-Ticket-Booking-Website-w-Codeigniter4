<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\SeferModel;

class SeferlerModel extends Model
{
    protected $table = 'seferler'; // Kullandığınız veritabanı tablosunun adını buraya yazın


    // Kalkış ve varış noktalarına göre seferleri getir
    public function getSeferler($kalkisNoktasi, $varisNoktasi)
    {
        return $this->where('kalkis_yeri', $kalkisNoktasi)
                    ->where('varis_yeri', $varisNoktasi)
                    ->findAll();
    }

}
