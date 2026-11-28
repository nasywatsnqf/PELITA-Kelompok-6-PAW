<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\BuktiDigital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BuktiDigitalController extends Controller
{
    // Upload bukti digital
    public function store(Request $request, Laporan $laporan)
    {
        $request->validate([
            'bukti' => 'required|array|min:1',
            'bukti.*' => 'file|mimes:jpg,jpeg,png,pdf,mp3,wav,mp4,mov|max:102400',
        ]);

        foreach ($request->file('bukti') as $file) {

            $path = $file->store(
                'bukti-digital/' . $laporan->id,
                'local'
            );

            $laporan->buktiDigitals()->create([
                'nama_file' => $file->getClientOriginalName(),
                'path_file' => $path,
                'mime_type' => $file->getMimeType(),
                'ukuran_file' => $file->getSize(),
            ]);
        }

        return back()->with('success', 'Bukti digital berhasil diunggah.');
    }

    // Menghapus bukti digital
    public function destroy(BuktiDigital $buktiDigital)
    {
        Storage::disk('local')->delete($buktiDigital->path_file);

        $buktiDigital->delete();

        return back()->with('success', 'Bukti digital berhasil dihapus.');
    }
}
