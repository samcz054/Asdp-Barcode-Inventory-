<?php

namespace App\Exports;

use App\Karyawan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KaryawanExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function headings(): array
    {
        return [
            'No',
            'Nama Karyawan',
            'Nomor Induk Kepegawaian',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Usia',
            'Status Keluarga',
            'Tanggal Masuk Kerja',
            'Masa Kerja',
            'No. Sk',
            'Jabatan',
            'Tanggal dipilih Jabatan',
            'Masa Jabatan',
            'Pendidikan',
            'Jurusan',
            'Nomor Induk Kependudukan',
            'No. BPJS Ketenagakerjaan',
            'No. BPJS Kesehatan',
            'No. NPWP',
        ];
    }
    public function collection()
    {
        return Karyawan::with('jabatan')->get();
    }

    public function map($data_karyawan): array
    {
        return [
            $data_karyawan->id,
            $data_karyawan->nama_karyawan,
            $data_karyawan->nik,
            $data_karyawan->tempat_lahir,
            $data_karyawan->tanggal_lahir,
            $data_karyawan->usia,
            $data_karyawan->status_keluarga,
            $data_karyawan->tanggal_masuk_kerja,
            $data_karyawan->masa_kerja,
            $data_karyawan->sk,
            $data_karyawan->jabatan->nama_jabatan,
            $data_karyawan->tanggal_pilih_jabatan,
            $data_karyawan->masa_jabatan,
            $data_karyawan->pendidikan,
            $data_karyawan->jurusan,
            $data_karyawan->nik_ktp,
            $data_karyawan->no_bpjs_ketenagakerjaan,
            $data_karyawan->no_bpjs_kesehatan,
            $data_karyawan->no_npwp,

        ];
    }
}
