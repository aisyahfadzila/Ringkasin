<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'total_page' => 336,
                'publication_year' => 1960,
                'isbn' => '978-0061120084',
                'category_id' => 3,
                'description' => '"To Kill a Mockingbird" adalah sebuah novel klasik yang ditulis oleh Harper Lee. Novel ini pertama kali diterbitkan pada tahun 1960. Cerita berfokus pada Jean Louise "Scout" Finch, seorang anak perempuan yang tinggal di kota fiktif Maycomb, Alabama, selama era Depresi Besar.
                Plotnya terutama berkisah tentang kasus hukum kontroversial di mana seorang pria kulit hitam bernama Tom Robinson dituduh memperkosa seorang wanita kulit putih. Atticus Finch, ayah Scout, adalah seorang pengacara yang bertekad membela Tom Robinson dengan penuh integritas, meskipun sikap rasial dan prasangka di komunitas Maycomb sangat kuat.
                Melalui mata Scout yang masih kecil, pembaca menyaksikan kisah perjuangan melawan ketidakadilan dan diskriminasi rasial. Novel ini menggambarkan dampak rasisme dan intoleransi dalam masyarakat Amerika Selatan pada masa itu.
                "To Kill a Mockingbird" memenangkan Penghargaan Pulitzer untuk Fiksi pada tahun 1961 dan menjadi salah satu karya sastra yang sangat dihargai. Buku ini juga menjadi dasar bagi film dengan judul yang sama yang dirilis pada tahun 1962. Karya ini terkenal karena menggambarkan tema-tema universal tentang keadilan, moralitas, dan hak asasi manusia.',
                'cover' => 'tokillamockingbird.jpg'
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'total_page' => 328,
                'publication_year' => 1949,
                'isbn' => '978-0451524935',
                'category_id' => 7,
                'description' => '"1984" adalah novel klasik karya George Orwell yang diterbitkan pada tahun 1949. Cerita ini berfokus pada Winston Smith, seorang pegawai pemerintah di Oceania yang mulai meragukan otoritas Partai yang otoriter. Dalam dunia yang diawasi ketat oleh Partai, termasuk oleh tokoh "Big Brother," novel ini menggambarkan perjuangan Winston untuk mempertahankan pikiran dan kebebasannya dalam tengah kendali total dan manipulasi bahasa oleh pemerintah. "1984" menyoroti tema-tema seperti kekuasaan, kontrol informasi, dan ancaman terhadap kebebasan individu.',
                'cover' => '1984.jpg'
            ],
            [
                'title' => 'The History of Western Philosophy',
                'author' => 'Bertrand Russel',
                'total_page' => 1500,
                'publication_year' => 1949,
                'isbn' => '978-0451524935',
                'category_id' => 12,
                'description' => 'The History of Western Philosophy" surveys major thinkers from antiquity to 20th century',
                'cover' => 'thehistoryofweternphilosophy.jpg'
            ]
        ];

        DB::table('books')->insert($books);
    }

}
