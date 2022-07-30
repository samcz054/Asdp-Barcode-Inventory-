<?php

namespace App\Exports;

use App\HistoryPengembalian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DataPengembalianExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
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
        return HistoryPengembalian::all();
    }

    public function map($logPengembalian): array
    {
        return [
            $logPengembalian->id,
            $logPengembalian->waktu,
            $logPengembalian->tanggal_dipinjam,
            $logPengembalian->nama_peminjam,
            $logPengembalian->stock->barang->nama_barang,
            $logPengembalian->stock->nomor_seri,
            $logPengembalian->stock->kode_barang,
        ];
    }
}
