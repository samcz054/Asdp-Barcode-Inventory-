<?php

namespace App\Exports;

use App\Sppbj;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SppbjExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'No Surat',
            'Tanggal Surat',
            'Nama Pengadaan',
            'Nama Peminta',
        ];
    }

    public function collection()
    {
        return Sppbj::with('tanda1')->get();
    }


    public function map($data_sppbj): array
    {
        return [
            $data_sppbj->nomor_surat,
            $data_sppbj->tanggal_surat,
            $data_sppbj->nama_pengadaan,
            $data_sppbj->tanda1->nama_karyawan,

        ];
    }
}
