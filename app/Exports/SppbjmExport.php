<?php

namespace App\Exports;

use App\SppbjM;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SppbjmExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'No',
            'Nomor Surat',
            'Tanggal Surat',
            'Nama Pengadaan',
            'Nama Peminta',
        ];
    }
    public function collection()
    {
        return SppbjM::with('tanda1')->get();
    }
    public function map($data_sppbjmm): array
    {
        return [
            $data_sppbjmm->id,
            $data_sppbjmm->nomor_surat,
            $data_sppbjmm->tanggal_surat,
            $data_sppbjmm->nama_pengadaan,
            $data_sppbjmm->tanda1->nama_karyawan,
        ];
    }
}
