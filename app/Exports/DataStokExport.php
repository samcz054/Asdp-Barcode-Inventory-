<?php

namespace App\Exports;

use App\HistoryStockBaru;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DataStokExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array{
        return [
            'No',
            'Waktu',
            'Tanggal',
            'Nama barang',
            'Nomor Seri',
            'Kode Barang',
        ];
    }
    public function collection()
    {
        return HistoryStockBaru::with('barang')->get();
    }

    public function map($logStock): array
    {
        return [
            $logStock->id,
            $logStock->waktu,
            $logStock->tanggal_ditambahkan,
            $logStock->barang->nama_barang,
            $logStock->nomor_seri,
            $logStock->kode_barang,
        ];
    }
}
