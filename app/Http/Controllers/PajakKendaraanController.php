<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class PajakKendaraanController extends Controller
{
    public function index(Request $request)
    {
        $query = Kendaraan::query();

        if ($request->jenis_kendaraan) {
            $query->where('jenis_kendaraan', $request->jenis_kendaraan);
        }

        if ($request->status_pembayaran === 'terbayar') {
            $query->whereNotNull('tgl_pembayaran');
        } elseif ($request->status_pembayaran === 'belum_bayar') {
            $query->whereNull('tgl_pembayaran');
        }

        $data = $query->get();

        return response()->json([
            'data' => $data,
            'totalData' => $data->count(),
            'message' => 'Success Get List Pajak Kendaraan'
        ]);
    }

    public function rekap()
    {
        $terbayar = Kendaraan::whereNotNull('tgl_pembayaran')->sum('nominal_pajak');
        $tunggakan = Kendaraan::whereNull('tgl_pembayaran')->sum('nominal_pajak');

        return response()->json([
            'data' => [
                'terbayar' => $terbayar,
                'tunggakan' => $tunggakan,
            ],
            'message' => 'Success Get Rekap Pajak Kendaraan'
        ]);
    }
}
