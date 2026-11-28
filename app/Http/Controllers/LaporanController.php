<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LaporanController extends Controller
{
     // Menampilkan riwayat laporan
    public function index()
    {
        $laporans = Laporan::latest()->get();

        return view('laporan.index', compact('laporans'));
    }

    // Menampilkan formulir laporan
    public function create()
    {
        return view('laporan.create');
    }

    // Menyimpan laporan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_insiden' => 'required|array|min:1',
            'tanggal_kejadian' => 'nullable|date',
            'lokasi' => 'nullable|string|max:1000',
            'pihak_terlibat' => 'nullable|string|max:1000',
            'kronologi' => 'required|string',
            'preferensi_tindak_lanjut' => 'required|in:arsip_pribadi,satgas_ppks,lbh',
            'aksi' => 'required|in:draf,kirim',
        ]);

        $laporan = Laporan::create([
            'user_id' => auth()->id(),
            'kode_tiket' => 'PLT-' . now()->format('Ymd') . '-' . Str::upper(Str::random(6)),
            'kategori_insiden' => $validated['kategori_insiden'],
            'tanggal_kejadian' => $validated['tanggal_kejadian'] ?? null,
            'lokasi' => $validated['lokasi'] ?? null,
            'pihak_terlibat' => $validated['pihak_terlibat'] ?? null,
            'kronologi' => $validated['kronologi'],
            'preferensi_tindak_lanjut' => $validated['preferensi_tindak_lanjut'],
            'status' => $validated['aksi'] === 'draf'
                ? 'draft'
                : 'terkirim',
        ]);

        return redirect()
            ->route('laporan.index')
            ->with('success', 'Laporan berhasil dikirim. Kode tiket: '.$laporan->kode_tiket);
    }
}
