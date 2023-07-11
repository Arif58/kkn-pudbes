<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalculationController extends Controller
{
    public function index()
    {
        return view('kalori.akg');
    }
    
    public function calculate(Request $request)
    {
        // Ambil nilai TB, BB, usia, jenis kelamin, dan tingkat aktivitas dari input form
        $tb = $request->input('tb');
        $bb = $request->input('bb');
        $usia = $request->input('usia');
        $jenisKelamin = $request->input('jenis_kelamin');
        $tingkatAktivitas = $request->input('tingkat_aktivitas');

        // Lakukan kalkulasi AKG berdasarkan rumus
        if ($jenisKelamin === 'pria') {
            $akg = 66 + (13.7 * $bb) + (5 * $tb) - (6.8 * $usia);
        } else {
            $akg = 655 + (9.6 * $bb) + (1.8 * $tb) - (4.7 * $usia);
        }
        $akg *= $tingkatAktivitas;

        // Kembalikan hasil kalkulasi ke tampilan
        return view('kalori.akg', compact('akg'));
    }

}