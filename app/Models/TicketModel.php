<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketModel extends Model
{
    protected $table = 'tickets';
    protected $primaryKey = 'ticket_id';
    protected $allowedFields = ['kalkis_tarih', 'tcno', 'cinsiyet', 'otobus_plaka', 'koltuk_no', 'is_bought', 'ticket_date', 'reservation_expiry_date', 'pnr_code'];
}
