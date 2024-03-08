<?php

namespace App\Models;

use CodeIgniter\Model;

class BusModel extends Model
{
    protected $table = 'buses';
    protected $primaryKey = 'otobus_id';
    protected $allowedFields = ['otobus_id', 'otobus_plaka', 'otobus_marka', 'otobus_model', 'yolcu_kapasite', 'koltuk_sayisi'];

    // BusModel sınıfına özgü silme fonksiyonu
    public function deleteBus($id)
    {
        return $this->delete($id);
    }
}
