<?php

namespace Database\Seeders;

use App\Models\Panduan;
use Illuminate\Database\Seeder;

class PanduanSeeder extends Seeder
{
    public function run(): void
    {
        Panduan::create([
            'panduan_title' => 'Membersihkan Ruang Kelas',
            'panduan_content' => 'Persiapan: Sebelum memulai pembersihan, pastikan Anda menggunakan sarung tangan dan masker untuk melindungi diri dari kuman dan alergen yang mungkin ada di ruang kelas. Siapkan peralatan pembersih seperti sapu, pengelap debu, lap bersih, ember, sabun pembersih, dan desinfektan.
                                Pengelolaan Sampah: Mulailah dengan mengosongkan dan mengelola sampah yang ada di ruang kelas. Gunakan kantong sampah yang kuat dan tahan bocor, serta pastikan untuk membuangnya ke tempat sampah yang sesuai setelah selesai.
                                Penyapu dan Pengelap Debu: Bersihkan lantai dari debu, serpihan, atau kotoran dengan menggunakan penyapu atau pengelap debu. Pastikan untuk mencapai sudut-sudut ruangan dan bawah meja dengan teliti.
                                Permukaan dan Permukaan Keras: Bersihkan meja, kursi, dan permukaan keras lainnya dengan lap yang telah dibasahi dengan sabun pembersih atau pembersih serbaguna. Perhatikan noda atau kotoran yang terlihat dan hapus dengan lembut. Pastikan untuk membersihkan permukaan papan tulis dan melengkapi dengan tulisan baru jika perlu.
                                Jendela dan Kaca: Bersihkan jendela dan kaca dengan cairan pembersih kaca dan lap yang bersih. Pastikan untuk menghilangkan noda, sidik jari, atau debu yang mungkin ada pada permukaan kaca.
                                Papan Tulis dan Peralatan: Bersihkan papan tulis dengan pembersih papan tulis dan kain khusus untuk papan tulis. Periksa dan bersihkan pula peralatan seperti penghapus, spidol, dan alat tulis lainnya agar siap digunakan kembali.
                                Desinfeksi: Setelah membersihkan permukaan, gunakan desinfektan untuk membunuh bakteri dan kuman yang mungkin masih tersisa. Fokuskan pada area yang sering disentuh, seperti pegangan pintu, sakelar lampu, atau permukaan meja.',
            'panduan_image' => '/assets/images/random-panduan/1.png',
            'role_id' => 2,
        ]);
        Panduan::create([
            'panduan_title' => 'Membersihkan Kaca Tower A dan B',
            'panduan_content' => 'Keselamatan: Keselamatan adalah prioritas utama saat melakukan pembersihan kaca gedung. Pastikan Anda memiliki pelatihan yang memadai dalam penggunaan peralatan keamanan, seperti harnes pengaman atau sistem pengaman lainnya. Selalu gunakan perlindungan diri seperti helm, sarung tangan, sepatu keselamatan, dan pengaman mata.
                                Perencanaan Akses: Tentukan metode akses yang aman dan efisien untuk mencapai permukaan kaca gedung. Hal ini dapat melibatkan penggunaan tangga, gondola, jaring pengaman, atau sistem derek dan kabel yang sesuai. Pastikan sistem akses tersebut telah diperiksa dan dipasang dengan benar sebelum memulai pembersihan.
                                Peralatan Pembersih: Gunakan peralatan pembersih yang tepat untuk membersihkan kaca gedung. Pilihlah alat yang dirancang khusus untuk membersihkan kaca, seperti kain mikrofiber, spons, dan wiper kaca. Pastikan peralatan tersebut dalam kondisi baik dan bersih sebelum digunakan untuk menghindari goresan pada kaca.
                                Cairan Pembersih: Gunakan cairan pembersih yang sesuai untuk membersihkan kaca gedung. Pilihlah pembersih kaca yang tidak meninggalkan noda atau residu pada permukaan kaca. Hindari penggunaan bahan kimia yang keras atau abrasif yang dapat merusak atau memudarkan kaca.
                                Pembersihan Rutin: Lakukan pembersihan kaca gedung secara rutin untuk menjaga kebersihan dan kejernihan permukaan kaca. Jadwalkan pembersihan yang teratur tergantung pada lingkungan sekitar, seperti polusi udara, kelembaban, atau paparan debu yang tinggi. Jika ada noda atau kotoran yang sulit dihilangkan, gunakan teknik pembersihan yang lebih intensif, seperti penggunaan sabun atau pengikis khusus.
                                Pemeriksaan Kaca: Selain membersihkan kaca, lakukan pemeriksaan rutin terhadap kondisi kaca gedung. Perhatikan adanya retak, pecah, atau kerusakan lain pada kaca. Jika ditemukan kerusakan, segera lakukan tindakan perbaikan atau penggantian yang diperlukan untuk menjaga integritas dan keamanan kaca gedung.
                                Lingkungan Sekitar: Perhatikan lingkungan sekitar saat melakukan pembersihan kaca gedung. Pastikan tidak ada bahan atau objek yang jatuh dan membahayakan pengguna atau pengguna lainnya di area di bawah.',
            'panduan_image' => '/assets/images/random-panduan/14.png',
            'role_id' => 3,
        ]);
        Panduan::create([
            'panduan_title' => 'Membersihkan Ruang UKS',
            'panduan_content' => 'Kebersihan dan Sanitasi: Kebersihan ruang UKS harus dijaga dengan baik. Lakukan pembersihan rutin untuk menghilangkan debu, kotoran, dan bakteri. Pastikan juga tersedia sarana cuci tangan yang memadai dengan air bersih dan sabun, serta tissue atau handuk kertas.
                                Inventarisasi dan Pengelolaan Obat: Pastikan ada inventaris yang baik untuk obat-obatan dan alat medis di ruang UKS. Periksa tanggal kadaluwarsa obat-obatan secara berkala dan pastikan penyimpanan yang tepat sesuai dengan instruksi produsen. Selain itu, buat sistem pengelolaan obat yang teratur dan dokumentasikan pemakaian obat dengan baik.
                                Pemeliharaan Alat Kesehatan: Periksa dan perawatan rutin pada alat kesehatan seperti stetoskop, tensimeter, termometer, dan alat-alat lain yang digunakan di ruang UKS. Pastikan alat-alat tersebut berfungsi dengan baik dan steril. Gantilah baterai atau komponen yang rusak sesuai kebutuhan.
                                Keamanan dan Keselamatan: Pastikan ruang UKS aman dan nyaman bagi pengguna. Perhatikan faktor keamanan, seperti memastikan ada pemadam kebakaran yang tersedia dan mudah diakses, serta menghindari penggunaan kabel listrik yang terlalu panjang dan tidak rapi. Pertimbangkan juga keamanan dan kerahasiaan data pasien atau informasi medis yang tersimpan di ruang UKS.',
            'panduan_image' => '/assets/images/random-panduan/12.png',
            'role_id' => 2,
        ]);
        Panduan::create([
            'panduan_title' => 'Membersihkan Energizing Room',
            'panduan_content' => 'Kebersihan dan Sanitasi: Pembersihan dan sanitasi rutin sangat penting untuk menjaga kebersihan ruang gym dan permainan. Bersihkan dan disinfeksi peralatan, lantai, permukaan, dan area umum secara teratur. Pastikan ada sarana cuci tangan yang mudah diakses, serta menyediakan tisu atau disinfektan untuk membersihkan peralatan setelah digunakan.
                                Pemeliharaan Peralatan: Periksa dan lakukan pemeliharaan rutin pada peralatan gym dan permainan, seperti treadmill, elliptical, atau alat olahraga lainnya. Pastikan peralatan dalam kondisi baik, termasuk memeriksa keausan atau kerusakan pada bagian yang rentan seperti tali karet atau bantalan. Perbaiki atau gantilah peralatan yang rusak untuk menjaga keamanan dan kenyamanan pengguna.
                                Periksa dan pastikan lantai tidak licin, peralatan diposisikan dengan aman, dan terdapat tanda peringatan atau instruksi yang jelas untuk penggunaan peralatan. Selain itu, perhatikan juga ventilasi yang memadai dan temperatur yang nyaman untuk mencegah kelelahan atau kepanasan berlebih saat berolahraga.
                                Pemisahan Ruang dan Perlengkapan: Jika Energizing Room memiliki area yang berbeda, pastikan ada pemisahan yang jelas antara keduanya. Simpan peralatan gym dan permainan dengan rapi dan terorganisir agar tidak bercampur dan memudahkan pengguna dalam menemukan dan menggunakan peralatan yang tepat.',
            'panduan_image' => '/assets/images/random-panduan/5.png',
            'role_id' => 2,
        ]);
        Panduan::create([
            'panduan_title' => 'Membersihkan Toilet BLI',
            'panduan_content' => 'Persiapan: Sebelum memulai pembersihan, pastikan Anda menggunakan perlengkapan pelindung diri seperti sarung tangan dan masker untuk melindungi diri dari bakteri dan kuman yang mungkin ada di toilet. Sediakan juga peralatan pembersih seperti sikat toilet, lap bersih, sabun pembersih, desinfektan, dan sikat pembersih umum.
                                Kebersihan Umum: Mulailah dengan membersihkan area sekitar toilet. Bersihkan wastafel, meja, dan permukaan lainnya dengan menggunakan lap yang telah dibasahi dengan sabun pembersih atau pembersih serbaguna. Pastikan untuk menghapus noda atau kotoran yang terlihat.
                                Kamar Mandi: Fokuskan perhatian pada pembersihan toilet itu sendiri. Oleskan pembersih toilet atau desinfektan di dalam dan di luar toilet. Gunakan sikat toilet untuk membersihkan permukaan dalam toilet, termasuk dinding dalam dan dasar toilet. Perhatikan juga bagian bawah toilet yang sering terabaikan.
                                Kerak dan Noda: Jika ada kerak atau noda yang sulit dihilangkan, gunakan pembersih toilet khusus atau gunakan campuran cuka dan air untuk membantu melarutkannya. Biarkan larutan tersebut bekerja selama beberapa waktu sebelum digosok menggunakan sikat toilet.
                                Bakteri dan Kuman: Setelah membersihkan permukaan toilet, pastikan untuk menggunakan desinfektan untuk membunuh bakteri dan kuman yang mungkin masih tersisa. Fokuskan pada area seperti tombol flush, gagang pintu, dan permukaan yang sering disentuh oleh tangan.
                                Lantai: Bersihkan lantai toilet dengan menggunakan sapu atau penyedot debu untuk menghilangkan debu dan kotoran. Gunakan larutan pembersih atau deterjen yang sesuai untuk membersihkan lantai secara menyeluruh. Pastikan untuk mengeringkan lantai agar tidak licin dan menghindari kecelakaan.
                                Ventilasi: Pastikan ventilasi di dalam toilet berfungsi dengan baik. Bersihkan lubang ventilasi dan kipas agar tidak terhambat oleh debu atau kotoran. Ventilasi yang baik akan membantu mengurangi kelembaban dan menghilangkan bau tidak sedap.
                                Penyimpanan Bahan Pembersih: Setelah selesai membersihkan toilet, simpan bahan pembersih dengan aman di tempat yang terpisah dari makanan atau bahan kimia lainnya. Pastikan untuk mengikuti petunjuk penyimpanan yang tertera pada label produk.',
            'panduan_image' => '/assets/images/random-panduan/7.png',
            'role_id' => 2,
        ]);
        Panduan::create([
            'panduan_title' => 'Pemeliharaan AC BLI',
            'panduan_content' => 'Pembersihan dan Penggantian Filter Udara: Filter udara pada AC perlu dibersihkan atau diganti secara berkala. Filter yang kotor akan menghambat aliran udara dan menyebabkan penurunan efisiensi AC. Membersihkan atau mengganti filter secara teratur akan meningkatkan kualitas udara dalam ruangan dan meningkatkan kinerja AC.
                                Pembersihan Kondensor dan Evaporator: Kondensor dan evaporator adalah komponen penting dalam sistem AC. Mereka cenderung mengumpulkan kotoran, debu, atau kerak seiring waktu. Pembersihan rutin pada kondensor dan evaporator akan membantu menjaga kinerja AC dan mencegah masalah seperti penurunan pendinginan atau kebocoran.            
                                Periksa Kabel dan Konektor: Pastikan kabel listrik dan konektor pada AC dalam kondisi baik. Periksa apakah ada kerusakan fisik atau kabel yang terkelupas. Kabel yang rusak dapat menyebabkan masalah seperti gangguan listrik atau bahkan kebakaran. Pastikan juga semua konektor terhubung dengan baik.            
                                Periksa Suhu dan Tekanan Refrigeran: Refrigeran adalah zat pendingin dalam AC. Pastikan suhu dan tekanan refrigeran sesuai dengan rekomendasi pabrik. Jika suhu atau tekanan tidak normal, bisa menjadi indikasi adanya kebocoran atau masalah lain dalam sistem. Dalam hal ini, diperlukan bantuan teknisi profesional untuk memperbaikinya.
                                Periksa Fan dan Motor: Periksa kipas dan motor pada unit AC. Pastikan kipas berputar dengan baik dan tidak ada kerusakan pada motor. Motor yang rusak dapat menyebabkan masalah seperti overheat atau kegagalan unit AC.
                                Periksa Sistem Drainase: Pastikan saluran pembuangan air (drainase) pada AC tidak tersumbat. Jika saluran pembuangan tersumbat, air bisa berakumulasi dan menyebabkan kebocoran atau kerusakan pada unit.',
            'panduan_image' => '/assets/images/random-panduan/3.png',
            'role_id' => 5,
        ]);
        Panduan::create([
            'panduan_title' => 'Pemeliharaan Rooftop BLI',
            'panduan_content' => 'Irigasi dan Drainase: Pastikan tanaman rooftop mendapatkan pasokan air yang cukup, tetapi juga memperhatikan drainase yang baik. Sistem irigasi yang efisien dan pemantauan terhadap drainase yang tepat dapat membantu mencegah genangan air yang berlebihan dan kekurangan air pada tanaman.
                                Pemilihan Tanaman yang Tepat: Pilihlah tanaman yang cocok untuk tumbuh di kondisi atap seperti eksposur sinar matahari, angin, dan jenis tanah yang tersedia. Tanaman yang tahan terhadap kondisi cuaca yang ekstrem, memiliki akar yang dangkal, dan toleran terhadap kekeringan biasanya menjadi pilihan yang baik untuk tanaman rooftop.
                                Pemupukan: Berikan pupuk secara teratur untuk memastikan tanaman rooftop mendapatkan nutrisi yang cukup. Pilihlah pupuk organik atau pupuk yang sesuai dengan kebutuhan tanaman. Perhatikan dosis dan jadwal pemupukan yang tepat agar tanaman tumbuh dengan baik.
                                Pembersihan dan Perawatan Rutin: Lengkapi pemeliharaan dengan membersihkan daun kering, sisa-sisa tanaman, atau limbah lainnya secara teratur. Periksa juga apakah ada hama atau penyakit yang menyerang tanaman rooftop dan lakukan langkah-langkah perlindungan yang diperlukan.
                                Pemangkasan: Lakukan pemangkasan pada tanaman rooftop untuk menjaga bentuknya, mendorong pertumbuhan yang sehat, dan mencegah kepadatan yang berlebihan. Pemangkasan juga membantu meningkatkan sirkulasi udara di sekitar tanaman.
                                Inspeksi Struktur dan Keamanan: Periksa secara berkala struktur atap, sistem penahan tanaman, dan keamanan keseluruhan tanaman rooftop. Pastikan tidak ada kerusakan atau kebocoran yang dapat mempengaruhi integritas bangunan dan keselamatan pengguna.
                                Pemantauan Cuaca dan Kondisi Lingkungan: Perhatikan perubahan cuaca, kelembaban udara, dan kondisi lingkungan sekitar. Hal ini akan membantu Anda mengambil tindakan pencegahan atau perlindungan yang diperlukan, seperti perlindungan dari angin kencang atau perubahan suhu yang ekstrem.',
            'panduan_image' => '/assets/images/random-panduan/16.png',
            'role_id' => 4,
        ]);
    }
}
