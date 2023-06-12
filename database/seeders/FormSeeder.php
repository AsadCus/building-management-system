<?php

namespace Database\Seeders;

use App\Models\Form;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $forms = [
            [
                'maintenance_id' => '1',
                'title' => 'Pengecekan Judul',
                'subtitle' => 'Subtitle Form Judul',
                'placeholder' => '',
                'hint' => '',
                'is_mandatory' => true,
                'type' => 'header',
                'additional_value' => 'info',
                'status' => 'active',
            ],
            [
                'maintenance_id' => '1',
                'title' => 'Device',
                'subtitle' => 'Subtitle Device',
                'placeholder' => 'Masukan Device',
                'hint' => 'Pengecekan Device',
                'is_mandatory' => true,
                'type' => 'text',
                'additional_value' => '',
                'status' => 'active',
            ],
            [
                'maintenance_id' => '1',
                'title' => 'Checkbox indikator',
                'subtitle' => 'Subtitle Checkbox indikator',
                'placeholder' => 'Masukan Checkbox indikator',
                'hint' => 'Pengecekan Checkbox indikator',
                'is_mandatory' => true,
                'type' => 'checkbox',
                'additional_value' => 'indikator satu<>indikator dua<>indikator tiga',
                'status' => 'active',
            ],
            [
                'maintenance_id' => '1',
                'title' => 'Pengisian Form Sub Judul',
                'subtitle' => 'Subtitle Form Sub Judul',
                'placeholder' => '1. Jakarta 1\n2. Jakarta 2\n4. Jakarta 4\n4. Jakarta 4\n',
                'hint' => 'Harap pilih sesuai informasi berikut',
                'is_mandatory' => true,
                'type' => 'subheader',
                'additional_value' => 'warn',
                'status' => 'active',
            ],
            [
                'maintenance_id' => '1',
                'title' => 'Tanggal',
                'subtitle' => 'Subtitle Tanggal',
                'placeholder' => 'Masukan Tanggal',
                'hint' => 'Pengecekan Tanggal',
                'is_mandatory' => true,
                'type' => 'datetime',
                'additional_value' => '',
                'status' => 'active',
            ],
            [
                'maintenance_id' => '1',
                'title' => 'Select',
                'subtitle' => 'Subtitle Select',
                'placeholder' => 'Masukan Select',
                'hint' => 'Pengecekan Select',
                'is_mandatory' => true,
                'type' => 'select',
                'additional_value' => 'pilihan satu<>pilihan dua<>pilihan tiga',
                'status' => 'active',
            ],
            [
                'maintenance_id' => '1',
                'title' => 'Catatan',
                'subtitle' => 'Subtitle Catatan',
                'placeholder' => 'Masukan Catatan',
                'hint' => 'Catatan Barang',
                'is_mandatory' => false,
                'type' => 'text',
                'additional_value' => '',
                'status' => 'active',
            ],
            [
                'maintenance_id' => '1',
                'title' => 'Url',
                'subtitle' => 'Subtitle Url',
                'placeholder' => 'Masukan Url',
                'hint' => 'Pengecekan Url',
                'is_mandatory' => true,
                'type' => 'url',
                'additional_value' => '',
                'status' => 'active',
            ],
            [
                'maintenance_id' => '1',
                'title' => 'File',
                'subtitle' => 'Subtitle file',
                'placeholder' => 'Masukan file',
                'hint' => 'Pengecekan file',
                'is_mandatory' => true,
                'type' => 'file',
                'additional_value' => '',
                'status' => 'active',
            ],
            [
                'maintenance_id' => '2',
                'title' => 'Pengecekan Judul 2',
                'subtitle' => 'Subtitle Form Judul 2',
                'placeholder' => '',
                'hint' => '',
                'is_mandatory' => true,
                'type' => 'header',
                'additional_value' => 'info',
                'status' => 'active',
            ],
            [
                'maintenance_id' => '3',
                'title' => 'Pengecekan Judul 3',
                'subtitle' => 'Subtitle Form Judul 3',
                'placeholder' => '',
                'hint' => '',
                'is_mandatory' => true,
                'type' => 'header',
                'additional_value' => 'info',
                'status' => 'active',
            ],
            [
                'maintenance_id' => '4',
                'title' => 'Pengecekan Judul 4',
                'subtitle' => 'Subtitle Form Judul 4',
                'placeholder' => '',
                'hint' => '',
                'is_mandatory' => true,
                'type' => 'header',
                'additional_value' => 'info',
                'status' => 'active',
            ],
            [
                'maintenance_id' => '5',
                'title' => 'Pengecekan Judul 5',
                'subtitle' => 'Subtitle Form Judul 5',
                'placeholder' => '',
                'hint' => '',
                'is_mandatory' => true,
                'type' => 'header',
                'additional_value' => 'info',
                'status' => 'active',
            ],
            [
                'maintenance_id' => '6',
                'title' => 'Pengecekan Judul 6',
                'subtitle' => 'Subtitle Form Judul 6',
                'placeholder' => '',
                'hint' => '',
                'is_mandatory' => true,
                'type' => 'header',
                'additional_value' => 'info',
                'status' => 'active',
            ],
            [
                'maintenance_id' => '7',
                'title' => 'Pengecekan Judul 7',
                'subtitle' => 'Subtitle Form Judul 7',
                'placeholder' => '',
                'hint' => '',
                'is_mandatory' => true,
                'type' => 'header',
                'additional_value' => 'info',
                'status' => 'active',
            ],
        ];

        foreach ($forms as $key => $value) {
            Form::create($value);
        }
    }
}
