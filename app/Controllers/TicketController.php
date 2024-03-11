<?php

namespace App\Controllers;

use App\Models\TicketModel;
use App\Models\SefersModel;

class TicketController extends BaseController
{
    public function index()
    {
        
        
        return view('biletSorgu');
    }
    public function queryTicket()
    {
        $tcno = $this->request->getPost('tcno');
        $ticketModel = new TicketModel();
        $sefersModel = new SefersModel();

        // Fetch tickets that are bought
        $boughtTicketsQuery = $ticketModel->where('tcno', $tcno)
                                           ->where('is_bought', 1)
                                           ->orderBy('ticket_date', 'DESC');

        $tickets = $boughtTicketsQuery->findAll();

        // Fetch sefer details and merge with ticket details
        foreach ($tickets as $key => $ticket) {
            $sefer = $sefersModel->where('otobus_plaka', $ticket['otobus_plaka'])
                                  ->where('sefer_tarih', $ticket['kalkis_tarih'])
                                  ->first();

            if ($sefer) {
                // Add sefer details to the ticket array
                $tickets[$key]['kalkis_yeri'] = $sefer['kalkis_yeri'];
                $tickets[$key]['varis_yeri'] = $sefer['varis_yeri'];
                $tickets[$key]['sefer_fiyat'] = $sefer['sefer_fiyat'];
            } else {
                // Remove tickets that do not have a corresponding sefer
                unset($tickets[$key]);
            }
        }

        return view('biletSorgu', ['tickets' => $tickets]);
    }
}