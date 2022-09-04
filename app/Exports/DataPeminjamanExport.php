<?php

namespace App\Exports;


use App\LogTransaksi;
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
            'Jabatan',
            'Divisi',
            'Nama barang',
            'Model / Type Barang',
            'Nomor Seri',
            'Kode Barang',
        ];
    }

    public function collection()
    {
        return LogTransaksi::with('stock','pegawai')->get();
    }

    public function map($logPeminjaman): array
    {
        return [
            $logPeminjaman->id,
            $logPeminjaman->waktu,
            $logPeminjaman->tanggal_dipinjam,
            $logPeminjaman->pegawai->nama_lengkap,
            $logPeminjaman->pegawai->jabatan,
            $logPeminjaman->pegawai->divisi,
            $logPeminjaman->stock->barang->nama_barang,
            $logPeminjaman->stock->barang->model,
            $logPeminjaman->stock->nomor_seri,
            $logPeminjaman->stock->kode_barang,
        ];
    }
}
