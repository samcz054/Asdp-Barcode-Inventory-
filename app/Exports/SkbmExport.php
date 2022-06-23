<?php

namespace App\Exports;

use App\SkbM;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SkbmExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'No',
            'peminta',
            'Alamat Tujuan',
            'No Telp',
            'Tanggal Surat',
        ];
    }
    public function collection()
    {
        return SkbM::with('karyawan')->get();
    }
    public function map($skbmm): array
    {
        return [
            $skbmm->id,
            $skbmm->karyawan->nama_karyawan,
            $skbmm->alamat_tujuan,
            $skbmm->no_telp,
            $skbmm->tanggal_surat,
        ];
    }
}
