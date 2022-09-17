<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SimpananAnggota;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFSimpananAnggotaController extends Controller
{
    public function PDFsimpananAnggota()
    {
        $simpananAnggota = SimpananAnggota::where('produk_id', 1)->get();

        $data = [
            'title' => 'Data Simpanan Anggota',
            'date' => date('m/d/Y'),
            'simpananAnggota' => $simpananAnggota
        ];

        $pdf = PDF::loadView('admin.simpanan-sukarela.pdf', $data);

        return $pdf->download('simpanan-anggota.pdf');
    }
}
