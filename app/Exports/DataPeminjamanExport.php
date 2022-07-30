<?php

namespace App\Exports;

use App\HistoryPeminjaman;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DataPeminjamanExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array{
        return [
            'No',
            'Waktu',
            'Tanggal',
            'Nama Peminjam',
            'Nama barang',
            'Nomor Seri',
            'Kode Barang',
        ];
    }

    public function collection()
    {
        return HistoryPeminjaman::with('stock')->get();
    }

    public function map($logPeminjaman): array
    {
        return [
            $logPeminjaman->id,
            $logPeminjaman->waktu,
            $logPeminjaman->tanggal_dipinjam,
            $logPeminjaman->nama_peminjam,
            $logPeminjaman->stock->barang->nama_barang,
            $logPeminjaman->stock->nomor_seri,
            $logPeminjaman->stock->kode_barang,
        ];
    }
}
