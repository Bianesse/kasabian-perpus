<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kasabian_book;

class KasabianBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kasabian_book::insert([
            [
                'kasabianJudul' => 'The Alchemist',
                'kasabianPenulis' => 'Paulo Coelho',
                'kasabianPenerbit' => 'Harper Collins',
                'kasabianTahunTerbit' => 2015,
                'kasabianDeskripsi' => 'An Andalusian shepherd boy named Santiago dreams of a treasure while in a ruined church. He consults a Gypsy fortune-teller about the meaning of the recurring dream. The woman interprets it as a prophecy, telling the boy that he will discover a treasure at the Egyptian pyramids.',
                'stock' => 10
            ],
            [
                'kasabianJudul' => 'A Place Called Perfect',
                'kasabianPenulis' => 'Hellena Duggan',
                'kasabianPenerbit' => 'Bhuana Ilmu Populer',
                'kasabianTahunTerbit' => 2022,
                'kasabianDeskripsi' => 'Violet never wanted to move to Perfect. Who wants to live in a town where everyone has to wear glasses to stop them going blind? And who wants to be tidy and perfectly behaved all the time? Violet quickly discovers there\'s something weird going on - her mam is acting strange and her dad has disappeared.',
                'stock' => 5
            ],
            [
                'kasabianJudul' => 'The Trouble With Perfect',
                'kasabianPenulis' => 'Hellena Duggan',
                'kasabianPenerbit' => 'Bhuana Ilmu Populer',
                'kasabianTahunTerbit' => 2022,
                'kasabianDeskripsi' => 'Hal aneh terjadi di Kota Perfect yang seharusnya aman sentosa—barang-barang dicuri, bahkan anak-anak pun menghilang. Semua orang menuduh bahwa Boy-lah pelakunya. Violet, sahabat Boy, tentu tidak percaya begitu saja. Namun, banyak saksi mata menyaksikan saat Boy beraksi. Meski sempat kesal kepada Boy, akhirnya Violet pun berusaha mengungkap kebenaran di baliknya. Ia harus menyibak rahasia tentang masa lalu, juga menghadapi monster mengerikan. Town sedang dalam masalah. Dan semua tergantung pada Violet.',
                'stock' => 5
            ],
            [
                'kasabianJudul' => 'The Battle For Perfect',
                'kasabianPenulis' => 'Hellena Duggan',
                'kasabianPenerbit' => 'Bhuana Ilmu Populer',
                'kasabianTahunTerbit' => 2022,
                'kasabianDeskripsi' => 'Violet menemukan pesan aneh. Ia curiga Tom-lah pengirimnya. Namun, apa maksud dari saudara kembar Boy itu? Keadaan Perfect juga semakin gawat karena lima ilmuwan menghilang entah ke mana. Perfect juga akan diambil alih oleh segerombolan zombi. Violet dan Boy berusaha mengungkap itu semua demi Kota Perfect. Namun, sanggupkah mereka? Terlebih lagi, mampukah mereka menyelamatkan diri mereka sendiri? Ini adalah pertaruhan hidup dan mati!',
                'stock' => 5
            ],
            [
                'kasabianJudul' => 'Sebuah Seni untuk Bersikap Bodo Amat',
                'kasabianPenulis' => 'Mark Manson',
                'kasabianPenerbit' => 'Gramedia',
                'kasabianTahunTerbit' => 2022,
                'kasabianDeskripsi' => 'Manson melontarkan argumen bahwa manusia tak sempurna dan terbatas. Begini tulisnya, "tidak semua orang bisa menjadi luar biasa-ada para pemenang dan pecundang di masyarakat, dan beberapa di antaranya tidak adil dan bukan akibat kesalahan Anda." Manson mengajak kita untuk mengerti batasan-batasan diri dan menerimanya-baginya, ini adalah sumber kekuatan yang paling nyata. Tepat saat kita mampu mengakrabi ketakutan, kegagalan, dan ketidakpastian-tepat saat kita berhenti melarikan diri dan mengelak, dan mulai menghadapi kenyataan-kenyataan yang menyakitkan-saat itulah kita bisa mulai menemukan keberanian dan kepercayaan diri yang selama ini kita cari dengan sekuat tenaga.',
                'stock' => 11
            ],
            [
                'kasabianJudul' => 'Sabtu Bersama Bapak',
                'kasabianPenulis' => 'Adhitya Mulya',
                'kasabianPenerbit' => 'Kawah Media',
                'kasabianTahunTerbit' => 2016,
                'kasabianDeskripsi' => 'Ini adalah sebuah cerita. Tentang seorang pemuda yang belajar mencari cinta. Tentang seorang pria yang belajar menjadi bapak dan suami yang baik. Tentang seorang ibu yang membesarkan mereka dengan penuh kasih. Dan…, tentang seorang bapak yang meninggalkan pesan dan berjanji selalu ada bersama mereka.',
                'stock' => 0
            ],
            [
                'kasabianJudul' => 'Atomic Habits',
                'kasabianPenulis' => 'James Clear',
                'kasabianPenerbit' => 'Gramedia',
                'kasabianTahunTerbit' => 2025,
                'kasabianDeskripsi' => 'Orang mengira ketika ingin mengubah hidup, Anda perlu memikirkan hal-hal besar. Namun, pakar kebiasaan terkenal kelas dunia James Clear menemukan cara lain. Ia tahu bahwa perubahan nyata berasal dari efek gabungan ratusan keputusan kecil—dari melakukan dua push-up sehari, bangun lima menit lebih awal, sampai menahan sebentar hasrat untuk menelepon.',
                'stock' => 0
            ]
        ]);
        
    }
}
