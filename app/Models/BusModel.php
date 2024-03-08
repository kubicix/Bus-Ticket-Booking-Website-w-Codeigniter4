<?php

namespace App\Models;

use CodeIgniter\Model;

class BusModel extends Model
{
    protected $table = 'buses';
    protected $primaryKey = 'otobus_id';

    // BusModel sınıfına özgü silme fonksiyonu
    public function deleteBus($id)
    {
        return $this->delete($id);
    }
}
