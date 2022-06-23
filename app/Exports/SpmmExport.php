<?php

namespace App\Exports;

use App\SpmM;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SpmmExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'No',
            'No Surat',
            'Tanggal Surat',
            'Divisi',
            'Tahun Anggaran',
            'Jenis Tranksaksi',
            'Permohonan Dana',
        ];
    }
    public function collection()
    {
        return SpmM::with('divisi')->get();
    }
    public function map($data_spmm_m): array
    {
        return [
            $data_spmm_m->id,
            $data_spmm_m->nomor_surat_spm,
            $data_spmm_m->tanggal_surat,
            $data_spmm_m->divisi->nama_divisi,
            $data_spmm_m->tahun_anggaran,
            $data_spmm_m->jenis_transaksi,
            $data_spmm_m->permohonan_dana,

        ];
    }
}
