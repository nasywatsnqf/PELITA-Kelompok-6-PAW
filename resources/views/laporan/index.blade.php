
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Laporan - PELITA</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 24px;
            font-family: Arial, sans-serif;
            color: #702536;
            background: #fff;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 30px 26px 26px;
            border: 1px solid #e8e8e8;
            border-radius: 15px;
            box-shadow: 0 1px 3px #00000008;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        h3 {
            margin: 0 0 5px;
            font-size: 18px;
        }

        .subtitle {
            margin: 0;
            color: #c66b7b;
            font-size: 13px;
        }

        .encryption {
            padding: 10px 14px;
            background: #fff1df;
            border: 1px solid #ffe3c1;
            border-radius: 8px;
            color: #8b4b35;
            font-size: 12px;
            font-weight: bold;
            white-space: nowrap;
        }

        .success {
            padding: 12px;
            margin-bottom: 15px;
            background: #eaf5ef;
            color: #286b48;
            border-radius: 7px;
            font-size: 13px;
        }

        .table-wrapper {
            overflow-x: auto;
            border: 1px solid #eadfe2;
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        th {
            padding: 15px 12px;
            background: #fbf1f4;
            color: #87404e;
            font-size: 11px;
            text-align: left;
            text-transform: uppercase;
        }

        td {
            padding: 15px 12px;
            border-top: 1px solid #eee8ea;
            font-size: 12px;
            vertical-align: middle;
        }

        .ticket {
            font-weight: bold;
            white-space: nowrap;
        }

        .category {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .date {
            color: #c66b7b;
            font-size: 11px;
        }

        .pathway {
            color: #bd6273;
            line-height: 1.5;
        }

        .status {
            display: inline-block;
            padding: 8px 12px;
            border-radius: 20px;
            background: #dcece7;
            color: #426b60;
            font-size: 11px;
            font-weight: bold;
        }

        .status.draft {
            background: #fff0d9;
            color: #94652b;
        }

        .status.sent {
            background: #dcece7;
            color: #426b60;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn {
            display: inline-block;
            padding: 8px 10px;
            border: 1px solid #d9d5e8;
            border-radius: 5px;
            background: #fff;
            color: #702536;
            font-size: 11px;
            text-decoration: none;
            cursor: pointer;
            white-space: nowrap;
        }

        .btn.primary {
            background: #eeeefe;
            border-color: #eeeefe;
        }

        .btn.delete {
            border: none;
            color: #c52222;
            background: transparent;
        }

        .empty {
            padding: 35px;
            text-align: center;
            color: #a56b77;
        }

        @media (max-width: 650px) {
            body {
                padding: 12px;
            }

            .container {
                padding: 20px 14px;
            }

            .header {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
<div class="container">

    <div class="header">
        <div>
            <h3>Riwayat Laporan Kasus Tersimpan</h3>
            <p class="subtitle">
                Semua catatan laporan yang telah Anda buat di brankas terenkripsi pribadi.
                Anda dapat menambah bukti atau menarik laporan sewaktu-waktu.
            </p>
        </div>

        <div class="encryption">
            ♙ Verifikasi Kunci Enkripsi
        </div>
    </div>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Kode Tiket / ID Anonim</th>
                    <th>Kategori & Tanggal Kejadian</th>
                    <th>Preferensi Alur</th>
                    <th>Status Perlindungan</th>
                    <th>Tindakan Kontrol</th>
                </tr>
            </thead>

            <tbody>
                @forelse($laporans as $laporan)
                    <tr>
                        <td class="ticket">
                            #{{ $laporan->kode_tiket }}
                        </td>

                        <td>
                            <div class="category">
                                {{ is_array($laporan->kategori_insiden)
                                    ? implode(', ', $laporan->kategori_insiden)
                                    : $laporan->kategori_insiden }}
                            </div>

                            <div class="date">
                                Dilaporkan:
                                {{ $laporan->created_at->format('d M Y') }}
                            </div>
                        </td>

                        <td class="pathway">
                            @switch($laporan->preferensi_tindak_lanjut)
                                @case('arsip_pribadi')
                                    Arsip Pribadi Terenkripsi
                                    @break
                                @case('satgas_ppks')
                                    Satgas PPKS Kampus
                                    @break
                                @case('lbh')
                                    LBH & Lembaga Bantuan Hukum
                                    @break
                                @default
                                    {{ $laporan->preferensi_tindak_lanjut }}
                            @endswitch
                        </td>

                        <td>
                            <span class="status {{ $laporan->status === 'draft' ? 'draft' : 'sent' }}">
                                {{ $laporan->status === 'draft'
                                    ? '● Draf Tersimpan'
                                    : '● Sedang Diproses' }}
                            </span>
                        </td>

                        <td>
                            <div class="actions">
                                <button class="btn primary" type="button"
                                    
<form action="{{ route('bukti.store', $laporan->id) }}"
      method="POST"
      enctype="multipart/form-data">
    @csrf

    <label class="btn primary">
        + Bukti Baru
        <input
            type="file"
            name="bukti[]"
            multiple
            accept=".jpg,.jpeg,.png,.pdf,.mp3,.wav,.mp4,.mov"
            required
            onchange="this.form.submit()"
            style="display: none;"
        >
        </label>

                                <button class="btn" type="button"
                                    onclick="alert('Fitur melengkapi laporan akan kita buat pada tahap berikutnya.')">
                                    Lengkapi
                                </button>

                                <button class="btn delete" type="button"
                                    onclick="alert('Fitur penarikan laporan akan kita buat pada tahap berikutnya.')">
                                    Tarik / Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="empty">
                            Belum ada laporan tersimpan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
</body>
</html>

