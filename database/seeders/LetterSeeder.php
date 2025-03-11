<?php

namespace Database\Seeders;

use App\Models\Letter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $letters = [
            // Incoming letters
            [
                'letter_number' => 'IN/2024/001',
                'letter_date' => '2024-01-05',
                'type' => 'incoming',
                'subject' => 'Undangan Rapat Koordinasi',
                'sender' => 'Kementerian Pendidikan',
                'recepient' => 'Direktur PT ABC',
                'description' => 'Undangan rapat koordinasi program pendidikan tahun 2024',
                'created_by' => 3,
            ],
            [
                'letter_number' => 'IN/2024/002',
                'letter_date' => '2024-01-12',
                'type' => 'incoming',
                'subject' => 'Permohonan Kerjasama',
                'sender' => 'PT XYZ Indonesia',
                'recepient' => 'Bagian Humas PT ABC',
                'description' => 'Pengajuan proposal kerjasama dalam bidang teknologi informasi',
                'created_by' => 4,
            ],
            [
                'letter_number' => 'IN/2024/003',
                'letter_date' => '2024-01-20',
                'type' => 'incoming',
                'subject' => 'Konfirmasi Pembayaran',
                'sender' => 'Bank Mandiri',
                'recepient' => 'Bagian Keuangan PT ABC',
                'description' => 'Konfirmasi pembayaran tagihan bulan Januari 2024',
                'created_by' => 5,
            ],
            [
                'letter_number' => 'IN/2024/004',
                'letter_date' => '2024-02-03',
                'type' => 'incoming',
                'subject' => 'Permintaan Informasi Produk',
                'sender' => 'CV Maju Bersama',
                'recepient' => 'Bagian Penjualan PT ABC',
                'description' => 'Permintaan katalog dan daftar harga produk terbaru',
                'created_by' => 6,
            ],
            [
                'letter_number' => 'IN/2024/005',
                'letter_date' => '2024-02-15',
                'type' => 'incoming',
                'subject' => 'Pemberitahuan Audit Tahunan',
                'sender' => 'Kantor Akuntan Publik',
                'recepient' => 'Direktur Keuangan PT ABC',
                'description' => 'Jadwal pelaksanaan audit laporan keuangan tahun 2023',
                'created_by' => 7,
            ],
            [
                'letter_number' => 'IN/2024/006',
                'letter_date' => '2024-02-25',
                'type' => 'incoming',
                'subject' => 'Undangan Pameran Dagang',
                'sender' => 'KADIN Indonesia',
                'recepient' => 'Bagian Marketing PT ABC',
                'description' => 'Undangan partisipasi dalam pameran dagang nasional 2024',
                'created_by' => 8,
            ],
            [
                'letter_number' => 'IN/2024/007',
                'letter_date' => '2024-03-02',
                'type' => 'incoming',
                'subject' => 'Pengiriman Sampel Produk',
                'sender' => 'PT Distributor Prima',
                'recepient' => 'Bagian Pengembangan PT ABC',
                'description' => 'Pengiriman sampel bahan baku untuk diuji',
                'created_by' => 9,
            ],
            [
                'letter_number' => 'IN/2024/008',
                'letter_date' => '2024-03-10',
                'type' => 'incoming',
                'subject' => 'Keluhan Pelanggan',
                'sender' => 'CV Sejahtera Abadi',
                'recepient' => 'Bagian Customer Service PT ABC',
                'description' => 'Laporan kendala penggunaan produk seri X500',
                'created_by' => 10,
            ],
            [
                'letter_number' => 'IN/2024/009',
                'letter_date' => '2024-03-15',
                'type' => 'incoming',
                'subject' => 'Penawaran Kerjasama Media',
                'sender' => 'Majalah Bisnis Indonesia',
                'recepient' => 'Bagian Humas PT ABC',
                'description' => 'Penawaran paket publikasi dan iklan selama 6 bulan',
                'created_by' => 3,
            ],
            [
                'letter_number' => 'IN/2024/010',
                'letter_date' => '2024-03-22',
                'type' => 'incoming',
                'subject' => 'Undangan Seminar Industri',
                'sender' => 'Asosiasi Pengusaha Indonesia',
                'recepient' => 'Direktur PT ABC',
                'description' => 'Undangan sebagai pembicara dalam seminar industri nasional',
                'created_by' => 4,
            ],
            
            // Outgoing letters
            [
                'letter_number' => 'OUT/2024/001',
                'letter_date' => '2024-01-08',
                'type' => 'outgoing',
                'subject' => 'Balasan Undangan Rapat',
                'sender' => 'Direktur PT ABC',
                'recepient' => 'Kementerian Pendidikan',
                'description' => 'Konfirmasi kehadiran dalam rapat koordinasi',
                'created_by' => 1,
            ],
            [
                'letter_number' => 'OUT/2024/002',
                'letter_date' => '2024-01-18',
                'type' => 'outgoing',
                'subject' => 'Tanggapan Permohonan Kerjasama',
                'sender' => 'Bagian Humas PT ABC',
                'recepient' => 'PT XYZ Indonesia',
                'description' => 'Penerimaan proposal kerjasama dan jadwal pertemuan',
                'created_by' => 2,
            ],
            [
                'letter_number' => 'OUT/2024/003',
                'letter_date' => '2024-01-25',
                'type' => 'outgoing',
                'subject' => 'Pengajuan Kredit Usaha',
                'sender' => 'Direktur Keuangan PT ABC',
                'recepient' => 'Bank BCA',
                'description' => 'Pengajuan kredit untuk ekspansi usaha tahun 2024',
                'created_by' => 1,
            ],
            [
                'letter_number' => 'OUT/2024/004',
                'letter_date' => '2024-02-05',
                'type' => 'outgoing',
                'subject' => 'Penawaran Produk Baru',
                'sender' => 'Bagian Penjualan PT ABC',
                'recepient' => 'CV Maju Bersama',
                'description' => 'Penawaran produk terbaru dengan diskon khusus',
                'created_by' => 2,
            ],
            [
                'letter_number' => 'OUT/2024/005',
                'letter_date' => '2024-02-18',
                'type' => 'outgoing',
                'subject' => 'Konfirmasi Jadwal Audit',
                'sender' => 'Direktur Keuangan PT ABC',
                'recepient' => 'Kantor Akuntan Publik',
                'description' => 'Persetujuan jadwal audit dan persiapan dokumen',
                'created_by' => 1,
            ],
            [
                'letter_number' => 'OUT/2024/006',
                'letter_date' => '2024-02-28',
                'type' => 'outgoing',
                'subject' => 'Konfirmasi Keikutsertaan Pameran',
                'sender' => 'Bagian Marketing PT ABC',
                'recepient' => 'KADIN Indonesia',
                'description' => 'Konfirmasi partisipasi dan permintaan informasi booth',
                'created_by' => 2,
            ],
            [
                'letter_number' => 'OUT/2024/007',
                'letter_date' => '2024-03-05',
                'type' => 'outgoing',
                'subject' => 'Hasil Pengujian Sampel',
                'sender' => 'Bagian Pengembangan PT ABC',
                'recepient' => 'PT Distributor Prima',
                'description' => 'Laporan hasil pengujian dan rekomendasi',
                'created_by' => 1,
            ],
            [
                'letter_number' => 'OUT/2024/008',
                'letter_date' => '2024-03-12',
                'type' => 'outgoing',
                'subject' => 'Tanggapan Keluhan Pelanggan',
                'sender' => 'Bagian Customer Service PT ABC',
                'recepient' => 'CV Sejahtera Abadi',
                'description' => 'Solusi untuk kendala produk seri X500 dan penawaran servis',
                'created_by' => 2,
            ],
            [
                'letter_number' => 'OUT/2024/009',
                'letter_date' => '2024-03-18',
                'type' => 'outgoing',
                'subject' => 'Persetujuan Kerjasama Media',
                'sender' => 'Bagian Humas PT ABC',
                'recepient' => 'Majalah Bisnis Indonesia',
                'description' => 'Persetujuan paket publikasi selama 3 bulan pertama',
                'created_by' => 1,
            ],
            [
                'letter_number' => 'OUT/2024/010',
                'letter_date' => '2024-03-25',
                'type' => 'outgoing',
                'subject' => 'Konfirmasi Seminar Industri',
                'sender' => 'Direktur PT ABC',
                'recepient' => 'Asosiasi Pengusaha Indonesia',
                'description' => 'Konfirmasi kehadiran dan materi presentasi',
                'created_by' => 2,
            ],
        ];
        
        foreach ($letters as $letterData) {
            $letter = new Letter();
            $letter->letter_number = $letterData['letter_number'];
            $letter->letter_date = $letterData['letter_date'];
            $letter->type = $letterData['type'];
            $letter->subject = $letterData['subject'];
            $letter->sender = $letterData['sender'];
            $letter->recepient = $letterData['recepient'];
            $letter->description = $letterData['description'];
            $letter->letter_link = 'https://drive.google.com/file/d/1WP-0ecY13r-bww_bQMMoL9lcBC6R0DVm/view?usp=sharing';
            $letter->created_by = $letterData['created_by'];
            $letter->save();
        }
    }
}
