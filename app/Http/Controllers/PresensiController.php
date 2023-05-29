<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function showByJadwalId($jadwalId)
    {
        $presensi = Presensi::where('jadwal_id', $jadwalId)->get();

        return view('presensi.index', compact('presensi'));
    }

    public function store(Request $jadwalId)
    {
        $presensi = Presensi::where(['jadwal_id' => $jadwalId, 'user_id' => user()->id]);

        if ($presensi) {
            $tgl = strtotime(now());
            $tgl = date('d-m-Y', $tgl);

            $tglPresensi = strtotime($presensi->created_at);
            $tglPresensi = date('d-m-y', $tglPresensi);

            if ($tgl == $tglPresensi) {
                return redirect('presensi.index')->with(['message' => 'Anda sudah melakukan presensi']);
            }
        }

        $jadwal = Jadwal::find($jadwalId);

        if (! $jadwal->buka) {
            return redirect('presensi.index')->with(['message' => 'Presensi telah ditutup']);
        }

        $presensi = Presensi::create([
            'jadwal_id' => $jadwalId,
            'user_id' => user()->id,
        ]);

        return redirect('presensi.index')->with(['success' => 'Berhasil melakukan presensi']);
    }
}
