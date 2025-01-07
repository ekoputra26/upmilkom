<?php

use App\AdminJurusan;
use App\DataLain;
use App\Dosen;
use App\Instrumen;
use App\JenisMataKuliah;
use App\MataKuliah;
use App\ProgramStudi;
use App\Responden;
use App\Ruangan;
use App\SelectOption;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Instrumen::insert([
            ['bagian' => 1, 'nomor' => 1, 'instrumen' => "Mahasiswa diberitahukan Rencana pembelajaran semester (RPS) di awal perkuliahan oleh dosen pengampuh mata kuliah", 'jenis' => "skala"],
            ['bagian' => 1, 'nomor' => 2, 'instrumen' => "Mahasiswa mendapatkan materi perkuliahan sesuai dengan RPS yang di berikan dosen", 'jenis' => "skala"],
            ['bagian' => 1, 'nomor' => 3, 'instrumen' => "Mahasiswa mengerti terhadap materi perkuliahan yang disampaikan oleh dosen", 'jenis' => "skala"],
            ['bagian' => 1, 'nomor' => 4, 'instrumen' => "Mahasiswa diberikan tugas dan dibahas dalam perkuliahan", 'jenis' => "skala"],
            ['bagian' => 1, 'nomor' => 5, 'instrumen' => "Mahasiswa terlibat aktif dalam proses pembelajaran", 'jenis' => "skala"],
            ['bagian' => 1, 'nomor' => 6, 'instrumen' => "Mahasiswa termotivasi untuk berfikir kritis, inisiatif dan mandiri dalam proses pembelajaran", 'jenis' => "skala"],
            ['bagian' => 1, 'nomor' => 7, 'instrumen' => "Mahasiswa mendapatkan pengetahuan dan atau keterampilan umum/keterampilan khusus setiap kali pertemuan dalam perkuliahan", 'jenis' => "skala"],
            ['bagian' => 1, 'nomor' => 8, 'instrumen' => "Mahasiswa lebih mudah mengerti dalam perkuliahan offline di bandingkan dengan perkuliahan online", 'jenis' => "skala"],
            ['bagian' => 2, 'nomor' => 1, 'instrumen' => "Berapa kali full pertemuan dosen mengajar baik offline dan online (sudah termasuk UTS dan UAS)", 'jenis' => "select"],
            ['bagian' => 2, 'nomor' => 2, 'instrumen' => "Berapa kali pertemuan dosen dengan mahasiswa secara offline (sudah termasuk UTS dan UAS)", 'jenis' => "select"],
            ['bagian' => 2, 'nomor' => 3, 'instrumen' => "Berapa kali pertemuan dosen berbasis e-learning (sudah termasuk UTS dan UAS)", 'jenis' => "select"],
            ['bagian' => 3, 'nomor' => 1, 'instrumen' => "Dosen memberikan umpan balik dan kesempatan untuk mempertanyakan hasil penilaian kepada mahasiswa", 'jenis' => "skala"],
            ['bagian' => 3, 'nomor' => 2, 'instrumen' => "Dosen memberikan soal ujian sesuai dengan Rencana pembelajaran semester (RPS)", 'jenis' => "skala"],
            ['bagian' => 3, 'nomor' => 3, 'instrumen' => "Dosen transparan dalam memberikan nilai akhir perkuliahan ke mahasiswa", 'jenis' => "skala"],
            ['bagian' => 3, 'nomor' => 4, 'instrumen' => "Dosen memberikan Nilai Nilai Akhir mahasiswa tepat waktu", 'jenis' => "skala"],
            ['bagian' => 4, 'nomor' => 1, 'instrumen' => "Tenaga administrasi mempunyai kemampuan melayani administrasi kemahasiswaan  yang sangat memuaskan", 'jenis' => 'skala'],
            ['bagian' => 4, 'nomor' => 2, 'instrumen' => "Kualitas layanan tenaga administrasi untuk memfasilitasi mahasiswa dalam proses perkuliahan sangat memuaskan", 'jenis' => 'skala'],
            ['bagian' => 4, 'nomor' => 3, 'instrumen' => "Tenaga administrasi santun dalam memberikan pelayanan", 'jenis' => 'skala'],
            ['bagian' => 5, 'nomor' => 1, 'instrumen' => "Perkuliahan dilengkapi sarana dan prasarana perkuliahan teori dan praktikum yang mencukupi (papan tulis/tv, LCD, spidol, penghapus, kursi, terminal listrik)", 'jenis' => "skala"],
            ['bagian' => 5, 'nomor' => 2, 'instrumen' => "Perkuliahan dilengkapi dengan wifi internet yang memadai", 'jenis' => "skala"],
            ['bagian' => 5, 'nomor' => 3, 'instrumen' => "Perkuliahan dilengkapi dengan AC yang memadai", 'jenis' => "skala"],
            ['bagian' => 5, 'nomor' => 4, 'instrumen' => "Kebersihan di dalam kelas", 'jenis' => "skala"]
        ]);

        Dosen::insert([
            ['nama' => 'ABDURAHMAN, S. KOM., M. HAN.'],
            ['nama' => 'ADE IRIANI SAFITRI, M.KOM.'],
            ['nama' => 'ADI HERMANSYAH, M.T.'],
            ['nama' => 'ADITYA PUTRA PERDANA PRASETYO, M.T.'],
            ['nama' => 'AHMAD FALI OKLILAS, M.T.'],
            ['nama' => 'AHMAD HERYANTO, M.T.'],
            ['nama' => 'AHMAD RIFAI.,ST,M.T'],
            ['nama' => 'AHMAD ZARKASI, M.T.'],
            ['nama' => 'AKBARI, S.PD,.M.PD'],
            ['nama' => 'AKHIAR WISTA ARUM, M.KOM.'],
            ['nama' => 'AKHMAD RIZQI TURAMA, S.PD., M.A.'],
            ['nama' => 'ALFARISSI, M.COMP.SC.'],
            ['nama' => 'ALI BARDADI, S.SI., M.KOM.'],
            ['nama' => 'ALIP DIAN PRATAMA, M.H.'],
            ['nama' => 'ALLSELA MEIRIZA, S.KOM., M.T.'],
            ['nama' => 'ALVI SYAHRINI UTAMI, M.KOM.'],
            ['nama' => 'ANGGINA PRIMANITA, M.IT., PH.D.'],
            ['nama' => 'ANGGUN ISLAMI, M.KOM.'],
            ['nama' => 'ANNA DWI MARJUSALINAH, M.KOM.'],
            ['nama' => 'ANNISA DARMAWAHYUNI, M.KOM.'],
            ['nama' => 'APRIANSYAH PUTRA, S.KOM.,M.KOM'],
            ['nama' => 'ARDI SAPUTRA, S.PD., M.SI'],
            ['nama' => 'ARDINA ARIANAI, M. KOM.'],
            ['nama' => 'ARI WEDHASMARA, M.TI., PH.D'],
            ['nama' => 'BAYU WIJAYA PUTRA, S.KOM., M.KOM'],
            ['nama' => 'DANNY MATTHEW SAPUTRA, M.SC.'],
            ['nama' => 'DEA LESTARI, M.PD.'],
            ['nama' => 'DEDENG, S.H, M.H.'],
            ['nama' => 'DEDY KURNIAWAN, S.SI.,M.SC'],
            ['nama' => 'DERIS STIAWAN, PH.D.'],
            ['nama' => 'DESTY RODIAH, M.T.'],
            ['nama' => 'DEWI SARTIKA, S.KOM., M.KOM.'],
            ['nama' => 'DIAN PALUPI RINI, M.KOM., PH.D.'],
            ['nama' => 'DINDA LESTARINI, S.SI., M.T.'],
            ['nama' => 'DINNA YUNIKA HARDIYANTI, S.SI., M.T.'],
            ['nama' => 'DOSEN MPK'],
            ['nama' => 'DR. A. AMINUDDIN BAMA, M.SI.'],
            ['nama' => 'DR. ABDIANSAH, S.KOM., M.CS.'],
            ['nama' => 'DR. AHMAD ZARKASI, M.T.'],
            ['nama' => 'DR. ALI IBRAHIM,S.KOM., M.T.'],
            ['nama' => 'DR. DARMAWIJOYO, M.SI'],
            ['nama' => 'DR. DEDI IRWANTO, M.HUM'],
            ['nama' => 'DR. DIDI SUHENDI, S.PD., M.HUM.'],
            ['nama' => 'DR. ERMATITA, M.KOM.'],
            ['nama' => 'DR. FATHONI, MMSI.'],
            ['nama' => 'DR. FIRDAUS, M.KOM.'],
            ['nama' => 'DR. FITRI MAYA PUSPITA'],
            ['nama' => 'DR. IR BAMBANG TUTUKO, M.T.'],
            ['nama' => 'DR. IR. SUKEMI, M.T.'],
            ['nama' => 'DR. IWAN PAHENDRA ANTO SAPUTRA, S.T., M.T'],
            ['nama' => 'DR. LENI MARLINA, M. SI.'],
            ['nama' => 'DR. MARYATI MUSTOFA, M. SI.'],
            ['nama' => 'DR. MUHAMMAD FACHRURROZI, M.T.'],
            ['nama' => 'DR. NURHASAN, S.AG., M.AG.'],
            ['nama' => 'DR. ROSSI PASSARELLA, M.ENG.'],
            ['nama' => 'DR. YULI ANDRIANI, M.SI.'],
            ['nama' => 'DRA. SRI UTAMI, M.HUM.'],
            ['nama' => 'DRA. YULIA DJAHIR, M.M.'],
            ['nama' => 'DRS. ANSORI, M.SI. MPK'],
            ['nama' => 'DRS. NANDANG HERYANA, M.PD.'],
            ['nama' => 'DWI ROSA INDAH, ST., M.T'],
            ['nama' => 'EKA PUTRI, M.PD. MPK'],
            ['nama' => 'ENDANG LESTARI RUSKAN, M.T.'],
            ['nama' => 'ENDANG SWITRI, M. PD. I.'],
            ['nama' => 'FIRDAUS, M.KOM. '],
            ['nama' => 'GABRIEL EKO PUTRA HARTONO CAHYADI, M.KOM.'],
            ['nama' => 'GHITA ATHALINA, B.ENG., M.ENG.'],
            ['nama' => 'HADIPURNAWAN SATRIA, M.SC., PH.D.'],
            ['nama' => 'HARDINI NOVIANTI, M.T.'],
            ['nama' => 'HASNAN AFIF, M.KOM.'],
            ['nama' => 'HASNAN AFIF, S.KOM., M.KOM.'],
            ['nama' => 'HELEN SUSANTI, S.PD., M.A.'],
            ['nama' => 'HUDA UBAYA, M.T.'],
            ['nama' => 'HUSNUL FATIHAH, M.PD.'],
            ['nama' => 'IIN SEPRINA, M.KOM.'],
            ['nama' => 'IMAN SALADIN B. AZHAR, S.KOM., M.SI.'],
            ['nama' => 'IR. MUHAMMAD IHSAN JAMBAK, M.SC., M.M.'],
            ['nama' => 'IRMEILYANA, M.SI.'],
            ['nama' => 'JULIAN SUPARDI, S.PD., M.T., PH.D.'],
            ['nama' => 'JUNIA KURNIATI, M.KOM.'],
            ['nama' => 'KANDA JANUAR MIRASWAN, S.KOM., M.T.'],
            ['nama' => 'KEMAHYANTO EXAUDI, M.T.'],
            ['nama' => 'KEN DITHA TANIA, S.KOM.,M.KOM., PH.D.'],
            ['nama' => 'M. ALI BUCHARI, M.T.'],
            ['nama' => 'M. HUSNI SYAHBANI, M.T.'],
            ['nama' => 'M. RUDI SANJAYA, S.KOM. M.KOM'],
            ['nama' => 'MARIYANI, M.PD.'],
            ['nama' => 'MASTURA DIANA MARIESKA, M.T.'],
            ['nama' => 'MELLY ARISKA, M.SC.'],
            ['nama' => 'MGS. AFRIYAN FIRDAUS, M.IT.'],
            ['nama' => 'MIRA AFRINA, S.E.,M.SC, PH.D.'],
            ['nama' => 'MPK'],
            ['nama' => 'MUHAMMAD ALI BUCHARI, S.KOM., M.T.'],
            ['nama' => 'MUHAMMAD FUADI, M. PD. I.'],
            ['nama' => 'MUHAMMAD NAUFAL RACHMATULLAH,  M.T.'],
            ['nama' => 'MUHAMMAD NAUFAL RACHMATULLAH, M.T'],
            ['nama' => 'MUHAMMAD QURHANUL RIZQIE, M.T., PH.D'],
            ['nama' => 'MUHAMMAD QURHANUL RIZQIE, S.KOM, M.T., PH.D.'],
            ['nama' => 'MUKHLIS FEBRIADY, M.KOM.'],
            ['nama' => 'MUSLIM NUGRAHA, M.H.'],
            ['nama' => 'NABILA RIZKY OKTADINI, S.S.I., M.T'],
            ['nama' => 'NARETHA KAWADHA PASEMAH GUMAY, M.T. '],
            ['nama' => 'NOVI YUSLIANI, M.T.'],
            ['nama' => 'NUR BUANA, S.AG., M.PD.I'],
            ['nama' => 'NURUL AFIFAH, S.KOM., M.KOM'],
            ['nama' => 'NURUL AFIFAH, S.KOM., M.KOM.'],
            ['nama' => 'NYIMAS DEWI MURNILA SAPUTRI, M.S.M.'],
            ['nama' => 'OSVARI ARSALAN, M.T.'],
            ['nama' => 'PACU PUTRA, B.CS., M.CS.'],
            ['nama' => 'PROF. DERIS SETIAWAN, M.T., PH.D., IPU., ASEAN., ENG., CPENT.'],
            ['nama' => 'PROF. DR. ERWIN, S.SI., M.SI.'],
            ['nama' => 'PROF. DR. IR. BAMBANG TUTUKO, M.T.'],
            ['nama' => 'PROF. DR. IR. SITI NURMAINI, M.T.'],
            ['nama' => 'PROF. YUSUF HARTONO, M.SC., PH.D.'],
            ['nama' => 'PURWITA SARI, S.SI., M.KOM.'],
            ['nama' => 'PUSPA DIANTI, M. PD.'],
            ['nama' => 'PUTRI EKA SEVTIYUNI, S.SI., M.T.'],
            ['nama' => 'RAHMAT FADLI ISNANTO, S.SI., M.SC.'],
            ['nama' => 'RAHMAT IZWAN HEROZA, M.T.'],
            ['nama' => 'RENDYANSYAH, M.T'],
            ['nama' => 'RESTI RIES TUTI, M.PD.'],
            ['nama' => 'RICY FIRNANDO, M.KOM.'],
            ['nama' => 'RIFKIE PRIMARTHA, M.T.'],
            ['nama' => 'RISA MARTA YATI, M.HUM.'],
            ['nama' => 'RISMA ANITA PURIANI, S.PD., M.PD.'],
            ['nama' => 'RIZKA DHINI KURNIA, M.SC., PH.D'],
            ['nama' => 'RIZKI KURNIATI, S.KOM., M.T.'],
            ['nama' => 'ROSSI PASSARELLA, M.ENG.'],
            ['nama' => 'RUSDI EFENDI, M.KOM.'],
            ['nama' => 'SAMARYANTA SEMBIRING, M.T.'],
            ['nama' => 'SAMSURYADI, M.KOM., PH.D'],
            ['nama' => 'SARIFA PUTRI RAFLESIA, M.T.'],
            ['nama' => 'SARMAYANTA SEMBIRING, S.SI., M.T.'],
            ['nama' => 'SRI TURATMIYAH, S. H., M. HUM. '],
            ['nama' => 'SUPIYAH, M. PD.'],
            ['nama' => 'SUTARNO, M.T.'],
            ['nama' => 'WILLY, M.KOM'],
            ['nama' => 'WINDA KURNIA SARI, S.SI., M.KOM.'],
            ['nama' => 'YADI UTAMA, S.KOM.,M.KOM'],
            ['nama' => 'YENNI LIDYAWATI, M. PD'],
            ['nama' => 'YOPPY SAZAKI, M.T.'],
            ['nama' => 'YUDI PRATAMA, M.PD. '],
            ['nama' => 'YUNITA, M.CS.'],
            ['nama' => 'ZAQQI YAMANI, M.KOM.(PRAKTISI)']
        ]);

        MataKuliah::insert([
            ['nama_mk' => 'Agama'],
            ['nama_mk' => 'Akuntansi Biaya'],
            ['nama_mk' => 'Akuntansi Keuangan Lanjut'],
            ['nama_mk' => 'Algoritma dan Struktur Data Lanjut'],
            ['nama_mk' => 'Aljabar Linear'],
            ['nama_mk' => 'Analisa Big Data'],
            ['nama_mk' => 'Analisa dan Perancangan Sistem Informasi II'],
            ['nama_mk' => 'Analisis Algoritma'],
            ['nama_mk' => 'Analisis dan Perancangan Berorientasi Objek'],
            ['nama_mk' => 'Analisis dan Perancangan Sistem Terstruktur'],
            ['nama_mk' => 'Arsitektur Perusahaan'],
            ['nama_mk' => 'Audit Sistem Informasi'],
            ['nama_mk' => 'Augmented Reality / Virtual Reality'],
            ['nama_mk' => 'Bahasa Indonesia'],
            ['nama_mk' => 'Basis Data'],
            ['nama_mk' => 'Basis Data II'],
            ['nama_mk' => 'Computer Vision'],
            ['nama_mk' => 'Dasar Manajemen'],
            ['nama_mk' => 'Data Mining'],
            ['nama_mk' => 'Data Mining Lanjut'],
            ['nama_mk' => 'Data Warehouse'],
            ['nama_mk' => 'Desain Web'],
            ['nama_mk' => 'e-Commerce'],
            ['nama_mk' => 'e-Government'],
            ['nama_mk' => 'Elektronika Dasar'],
            ['nama_mk' => 'Etika Profesi'],
            ['nama_mk' => 'Fisika'],
            ['nama_mk' => 'Gudang Data (Data Warehouse)'],
            ['nama_mk' => 'Ilmu Komunikasi'],
            ['nama_mk' => 'Internet of Things'],
            ['nama_mk' => 'Jaringan Komputer'],
            ['nama_mk' => 'Jaringan Syaraf Tiruan'],
            ['nama_mk' => 'Kalkulus 1'],
            ['nama_mk' => 'Kalkulus 2'],
            ['nama_mk' => 'Kapita Selekta'],
            ['nama_mk' => 'Karya Ilmia dan Publikasi'],
            ['nama_mk' => 'Keamanan Cyber'],
            ['nama_mk' => 'Keamanan Jaringan Komputer '],
            ['nama_mk' => 'Keamanan Komputer'],
            ['nama_mk' => 'Kecerdasan Artifisial'],
            ['nama_mk' => 'Kecerdasan Bisnis'],
            ['nama_mk' => 'Kecerdasan Buatan'],
            ['nama_mk' => 'Kecerdasan Komputasional'],
            ['nama_mk' => 'Kerja Praktik'],
            ['nama_mk' => 'Kewarganegaraan'],
            ['nama_mk' => 'Kewirausahaan'],
            ['nama_mk' => 'Kewirausahaan Berbasis Teknologi'],
            ['nama_mk' => 'Komputasi Bergerak '],
            ['nama_mk' => 'Komputer dan Masyarakat'],
            ['nama_mk' => 'Konsep Sistem Informasi'],
            ['nama_mk' => 'Kuliah Kerja Nyata (KKN)'],
            ['nama_mk' => 'Literasi Digital'],
            ['nama_mk' => 'Manajemen Hubungan Pelanggan (CRM)'],
            ['nama_mk' => 'Manajemen Jaringan'],
            ['nama_mk' => 'Manajemen Keamanan Informasi'],
            ['nama_mk' => 'Manajemen Kearsipan'],
            ['nama_mk' => 'Manajemen Pengetahuan (Knowledge Management)'],
            ['nama_mk' => 'Manajemen Proses Bisnis'],
            ['nama_mk' => 'Manajemen Proyek Sistem Informasi'],
            ['nama_mk' => 'Manajemen Rantai Suplai (SCM)'],
            ['nama_mk' => 'Manajemen Sistem Informasi'],
            ['nama_mk' => 'Manajemen Strategis'],
            ['nama_mk' => 'Manajemen Teknologi Informasi'],
            ['nama_mk' => 'Matematika Diskrit'],
            ['nama_mk' => 'Metodologi Penelitian (Research Methodology)'],
            ['nama_mk' => 'Multimedia'],
            ['nama_mk' => 'Organisasi dan Arsitektur Komputer'],
            ['nama_mk' => 'Pancasila '],
            ['nama_mk' => 'Pemodelan dan Simulasi'],
            ['nama_mk' => 'Pemrograman Bergerak '],
            ['nama_mk' => 'Pemrograman Berorientasi Objek'],
            ['nama_mk' => 'Pemrograman Berorientasi Objek Lanjut'],
            ['nama_mk' => 'Pemrograman Game '],
            ['nama_mk' => 'Pemrograman Internet'],
            ['nama_mk' => 'Pemrograman Komputer'],
            ['nama_mk' => 'Pemrograman Komputer Lanjut'],
            ['nama_mk' => 'Pemrograman Visual'],
            ['nama_mk' => 'Pemrograman Web'],
            ['nama_mk' => 'Pemrograman Web II'],
            ['nama_mk' => 'Pemrosesan Bahasa Alami'],
            ['nama_mk' => 'Penambangan Data'],
            ['nama_mk' => 'Pendidikan Kewarganegaraan'],
            ['nama_mk' => 'Pengantar Algoritma dan Struktur data'],
            ['nama_mk' => 'Pengantar Ekonomi'],
            ['nama_mk' => 'Pengantar Teknik Komputer'],
            ['nama_mk' => 'Pengantar Teknologi Informasi'],
            ['nama_mk' => 'Pengantar Telekomunikasi'],
            ['nama_mk' => 'Pengantar User Experience (UX)'],
            ['nama_mk' => 'Pengelolaan Layanan Teknologi Informasi'],
            ['nama_mk' => 'Pengembangan Perangkat Lunak Berorientasi Objek'],
            ['nama_mk' => 'Pengolahan Citra'],
            ['nama_mk' => 'Perancangan (User Experience)UX'],
            ['nama_mk' => 'Perencanaan Strategi Sistem Informasi'],
            ['nama_mk' => 'Perencanaan Sumber Daya Perusahaan'],
            ['nama_mk' => 'Praktikum Akuntansi Biaya'],
            ['nama_mk' => 'Praktikum Akuntansi Keuangan Lanjut'],
            ['nama_mk' => 'Praktikum Analisa dan Perancangan Sistem Informasi II'],
            ['nama_mk' => 'Praktikum Analisis dan Perancangan Berorientasi Obyek'],
            ['nama_mk' => 'Praktikum Analisis dan Perancangan Sistem Terstruktur'],
            ['nama_mk' => 'Praktikum Animasi Komputer'],
            ['nama_mk' => 'Praktikum Aplikasi Komputer Akuntansi 1 (Zahir Accounting)'],
            ['nama_mk' => 'Praktikum Basis Data'],
            ['nama_mk' => 'Praktikum Basis Data II'],
            ['nama_mk' => 'Praktikum Database Administration'],
            ['nama_mk' => 'Praktikum Desain Web'],
            ['nama_mk' => 'Praktikum Elektronika Dasar'],
            ['nama_mk' => 'Praktikum Jaringan Komputer '],
            ['nama_mk' => 'Praktikum Keamanan Jaringan Komputer '],
            ['nama_mk' => 'Praktikum Multimedia I'],
            ['nama_mk' => 'Praktikum Paket Program Aplikasi II'],
            ['nama_mk' => 'Praktikum Pemrograman Bergerak'],
            ['nama_mk' => 'Praktikum Pemrograman Komputer'],
            ['nama_mk' => 'Praktikum Pemrograman Komputer Lanjut'],
            ['nama_mk' => 'Praktikum Pemrograman Visual'],
            ['nama_mk' => 'Praktikum Pemrograman Web I'],
            ['nama_mk' => 'Praktikum Pemrograman Web II'],
            ['nama_mk' => 'Praktikum Pengembangan Perangkat Lunak Berorientasi Objek'],
            ['nama_mk' => 'Praktikum Perpajakan'],
            ['nama_mk' => 'Praktikum Rangkaian Digital '],
            ['nama_mk' => 'Praktikum Rangkaian Listrik'],
            ['nama_mk' => 'Praktikum Sistem Operasi'],
            ['nama_mk' => 'Praktikum Statistika dan Probabilitas'],
            ['nama_mk' => 'Praktikum Struktur Data'],
            ['nama_mk' => 'Praktikum Web programming II'],
            ['nama_mk' => 'Probabilitas dan Statistika'],
            ['nama_mk' => 'Psikologi Pengguna'],
            ['nama_mk' => 'Rangkaian Digital '],
            ['nama_mk' => 'Rangkaian Listrik '],
            ['nama_mk' => 'Rekayasa Perangkat Lunak'],
            ['nama_mk' => 'Rekayasa Perangkat Lunak Lanjut'],
            ['nama_mk' => 'Robotika '],
            ['nama_mk' => 'Sistem Informasi Manajemen'],
            ['nama_mk' => 'Sistem Informasi Perbankan'],
            ['nama_mk' => 'Sistem Informasi Rumah Sakit'],
            ['nama_mk' => 'Sistem Informasi Sumber Daya Manusia'],
            ['nama_mk' => 'Sistem Konkarensi dan Distribusi'],
            ['nama_mk' => 'Sistem Operasi'],
            ['nama_mk' => 'Sistem Pakar'],
            ['nama_mk' => 'Sistem Pendukung Keputusan'],
            ['nama_mk' => 'Skripsi'],
            ['nama_mk' => 'Statistika'],
            ['nama_mk' => 'Statistika dan Probabilitas'],
            ['nama_mk' => 'Statistika Lanjut'],
            ['nama_mk' => 'Strategi Pengembangan Produk'],
            ['nama_mk' => 'Struktur Data'],
            ['nama_mk' => 'Struktur Diskrit I'],
            ['nama_mk' => 'Teknik Simulasi '],
            ['nama_mk' => 'Temu Kembali Informasi'],
            ['nama_mk' => 'Teori Bahasa dan Otomata'],
            ['nama_mk' => 'Tren Teknologi Informasi'],
            ['nama_mk' => 'Visualisasi Data'],
            ['nama_mk' => 'Web Sesmantik Ontologi'],
        ]);

        SelectOption::insert([
            ['idinstrumen' => 9, 'no_option' => 1, 'option' => '0 pertemuan'],
            ['idinstrumen' => 9, 'no_option' => 2, 'option' => '1 pertemuan'],
            ['idinstrumen' => 9, 'no_option' => 3, 'option' => '2 pertemuan'],
            ['idinstrumen' => 9, 'no_option' => 4, 'option' => '3 pertemuan'],
            ['idinstrumen' => 9, 'no_option' => 5, 'option' => '4 pertemuan'],
            ['idinstrumen' => 9, 'no_option' => 6, 'option' => '5 pertemuan'],
            ['idinstrumen' => 9, 'no_option' => 7, 'option' => '6 pertemuan'],
            ['idinstrumen' => 9, 'no_option' => 8, 'option' => '7 pertemuan'],
            ['idinstrumen' => 9, 'no_option' => 9, 'option' => '8 pertemuan'],
            ['idinstrumen' => 9, 'no_option' => 10, 'option' => '9 pertemuan'],
            ['idinstrumen' => 9, 'no_option' => 11, 'option' => '10 pertemuan'],
            ['idinstrumen' => 9, 'no_option' => 12, 'option' => '11 pertemuan'],
            ['idinstrumen' => 9, 'no_option' => 13, 'option' => '12 pertemuan'],
            ['idinstrumen' => 9, 'no_option' => 14, 'option' => '13 pertemuan'],
            ['idinstrumen' => 9, 'no_option' => 15, 'option' => '14 pertemuan'],
            ['idinstrumen' => 9, 'no_option' => 16, 'option' => '15 pertemuan'],
            ['idinstrumen' => 9, 'no_option' => 17, 'option' => '16 pertemuan'],
            ['idinstrumen' => 10, 'no_option' => 1, 'option' => '0 pertemuan'],
            ['idinstrumen' => 10, 'no_option' => 2, 'option' => '1 pertemuan'],
            ['idinstrumen' => 10, 'no_option' => 3, 'option' => '2 pertemuan'],
            ['idinstrumen' => 10, 'no_option' => 4, 'option' => '3 pertemuan'],
            ['idinstrumen' => 10, 'no_option' => 5, 'option' => '4 pertemuan'],
            ['idinstrumen' => 10, 'no_option' => 6, 'option' => '5 pertemuan'],
            ['idinstrumen' => 10, 'no_option' => 7, 'option' => '6 pertemuan'],
            ['idinstrumen' => 10, 'no_option' => 8, 'option' => '7 pertemuan'],
            ['idinstrumen' => 10, 'no_option' => 9, 'option' => '8 pertemuan'],
            ['idinstrumen' => 10, 'no_option' => 10, 'option' => '9 pertemuan'],
            ['idinstrumen' => 10, 'no_option' => 11, 'option' => '10 pertemuan'],
            ['idinstrumen' => 10, 'no_option' => 12, 'option' => '11 pertemuan'],
            ['idinstrumen' => 10, 'no_option' => 13, 'option' => '12 pertemuan'],
            ['idinstrumen' => 10, 'no_option' => 14, 'option' => '13 pertemuan'],
            ['idinstrumen' => 10, 'no_option' => 15, 'option' => '14 pertemuan'],
            ['idinstrumen' => 10, 'no_option' => 16, 'option' => '15 pertemuan'],
            ['idinstrumen' => 10, 'no_option' => 17, 'option' => '16 pertemuan'],
            ['idinstrumen' => 11, 'no_option' => 1, 'option' => '0 pertemuan'],
            ['idinstrumen' => 11, 'no_option' => 2, 'option' => '1 pertemuan'],
            ['idinstrumen' => 11, 'no_option' => 3, 'option' => '2 pertemuan'],
            ['idinstrumen' => 11, 'no_option' => 4, 'option' => '3 pertemuan'],
            ['idinstrumen' => 11, 'no_option' => 5, 'option' => '4 pertemuan'],
            ['idinstrumen' => 11, 'no_option' => 6, 'option' => '5 pertemuan'],
            ['idinstrumen' => 11, 'no_option' => 7, 'option' => '6 pertemuan'],
            ['idinstrumen' => 11, 'no_option' => 8, 'option' => '7 pertemuan'],
            ['idinstrumen' => 11, 'no_option' => 9, 'option' => '8 pertemuan'],
            ['idinstrumen' => 11, 'no_option' => 10, 'option' => '9 pertemuan'],
            ['idinstrumen' => 11, 'no_option' => 11, 'option' => '10 pertemuan'],
            ['idinstrumen' => 11, 'no_option' => 12, 'option' => '11 pertemuan'],
            ['idinstrumen' => 11, 'no_option' => 13, 'option' => '12 pertemuan'],
            ['idinstrumen' => 11, 'no_option' => 14, 'option' => '13 pertemuan'],
            ['idinstrumen' => 11, 'no_option' => 15, 'option' => '14 pertemuan'],
            ['idinstrumen' => 11, 'no_option' => 16, 'option' => '15 pertemuan'],
            ['idinstrumen' => 11, 'no_option' => 17, 'option' => '16 pertemuan'],
        ]);

        DataLain::create([
            'attribute' => 'jumlah_responden',
            'value' => '0'
        ]);

        DataLain::create([
            'attribute' => 'semester',
            'value' => 'GENAP'
        ]);

        DataLain::create([
            'attribute' => 'tahun_ajaran_1',
            'value' => '2023'
        ]);

        DataLain::create([
            'attribute' => 'tahun_ajaran_2',
            'value' => '2024'
        ]);

        DataLain::create([
            'attribute' => 'deskripsi_kuesioner',
            'value' => '<ol>
            <li>Angket digunakan untuk evaluasi perkuliahan dosen oleh mahasiswa Fakultas Ilmu Komputer Unsri.</li>
            <li>Sesuai dengan yang Saudara ketahui, berilah penilaian dengan jujur, objektif, dan penuh dengan tanggung
                jawab terhadap DOSEN saudara. Identitas responden dirahasiakan.</li>
            <li>Hasil angket ini akan sangat membantu dalam rangka perbaikan proses perkuliahan dimasa yang akan datang
                di Fakultas Ilmu Komputer Universitas Sriwijaya, dan tidak akan berpengaruh terhadap status Saudara
                sebagai mahasiswa.</li>
        </ol>

        <h5>Petunjuk Pengisian:</h5>
        <ol class="mb-0 pb-0">
            <li>Sebelum mengisi kuesioner silahkan di lihat kurikulum masing-masing program studi, apakah mata kuliah
                berbasis projek, studi kasus atau berbasis teori.</li>
            <li>Berikan tanda centang (√) pada salah satu alternatif jawaban (STS, TS, N, TS, SS) yang tersedia. </li>
        </ol>
        <p class="m-0 p-0">Keterangan: STS = Sangat Tidak Setuju, TS = Tidak Setuju, N= Netral, S = Setuju, SS = Sangat
            Setuju</p>'
        ]);

        DataLain::create([
            'attribute' => 'kode_ganti_password',
            'value' => '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000'
        ]);

        JenisMataKuliah::insert([['jenis' => 'Berbasis Proyek'], ['jenis' => 'Berbasis Studi Kasus'], ['jenis' => 'Berbasis Teori']]);

        ProgramStudi::insert([
            ['kode' => 'SIREG', 'nama' => 'Sistem Informasi', 'kelas' => 'Reguler', 'jenjang' => 'S1', 'lokasi' => 'Indralaya'],
            ['kode' => 'SIBIL', 'nama' => 'Sistem Informasi', 'kelas' => 'Bilingual', 'jenjang' => 'S1', 'lokasi' => 'Palembang'],
            ['kode' => 'SIPROF', 'nama' => 'Sistem Informasi', 'kelas' => 'Profesional', 'jenjang' => 'S1', 'lokasi' => 'Palembang'],
            ['kode' => 'TIREG', 'nama' => 'Teknik Informatika', 'kelas' => 'Reguler', 'jenjang' => 'S1', 'lokasi' => 'Indralaya'],
            ['kode' => 'TIBIL', 'nama' => 'Teknik Informatika', 'kelas' => 'Bilingual', 'jenjang' => 'S1', 'lokasi' => 'Palembang'],
            ['kode' => 'SKREG', 'nama' => 'Sistem Komputer', 'kelas' => 'Reguler', 'jenjang' => 'S1', 'lokasi' => 'Indralaya'],
            ['kode' => 'SKBIL', 'nama' => 'Sistem Komputer', 'kelas' => 'Unggulan', 'jenjang' => 'S1', 'lokasi' => 'Palembang'],
            ['kode' => 'MI', 'nama' => 'Manajemen Informatika', 'kelas' => 'Reguler', 'jenjang' => 'D3', 'lokasi' => 'Palembang'],
            ['kode' => 'KA', 'nama' => 'Komputerisasi Akuntansi', 'kelas' => 'Reguler', 'jenjang' => 'D3', 'lokasi' => 'Palembang'],
            ['kode' => 'TK', 'nama' => 'Teknik Komputer', 'kelas' => 'Reguler', 'jenjang' => 'D3', 'lokasi' => 'Palembang']
        ]);

        Ruangan::insert([
            ['nama' => 'A.1.1', 'lokasi' => 'Indralaya'],
            ['nama' => 'A.1.2', 'lokasi' => 'Indralaya'],
            ['nama' => 'A.1.3', 'lokasi' => 'Indralaya'],
            ['nama' => 'A.1.4', 'lokasi' => 'Indralaya'],
            ['nama' => 'A.1.5', 'lokasi' => 'Indralaya'],
            ['nama' => 'A.1.6', 'lokasi' => 'Indralaya'],
            ['nama' => 'A.2.1', 'lokasi' => 'Indralaya'],
            ['nama' => 'A.2.2', 'lokasi' => 'Indralaya'],
            ['nama' => 'A.2.3', 'lokasi' => 'Indralaya'],
            ['nama' => 'A.2.4', 'lokasi' => 'Indralaya'],
            ['nama' => 'A.2.5', 'lokasi' => 'Indralaya'],
            ['nama' => 'A.3.1', 'lokasi' => 'Indralaya'],
            ['nama' => 'A.3.2', 'lokasi' => 'Indralaya'],
            ['nama' => 'A.3.3-4', 'lokasi' => 'Indralaya'],
            ['nama' => 'A.3.5-6', 'lokasi' => 'Indralaya'],
            ['nama' => 'A.3.7', 'lokasi' => 'Indralaya'],
            ['nama' => 'B.2.1', 'lokasi' => 'Indralaya'],
            ['nama' => 'B.2.7', 'lokasi' => 'Indralaya'],
            ['nama' => 'B.3.3-5', 'lokasi' => 'Indralaya'],
            ['nama' => 'C.1.5', 'lokasi' => 'Indralaya'],
            ['nama' => 'C.2.2', 'lokasi' => 'Indralaya'],
            ['nama' => 'C.3.4', 'lokasi' => 'Indralaya'],
            ['nama' => 'D.1.1', 'lokasi' => 'Indralaya'],
            ['nama' => 'D.1.2', 'lokasi' => 'Indralaya'],
            ['nama' => 'D.1.3', 'lokasi' => 'Indralaya'],
            ['nama' => 'D.1.4', 'lokasi' => 'Indralaya'],
            ['nama' => 'D.2.1', 'lokasi' => 'Indralaya'],
            ['nama' => 'D.2.2', 'lokasi' => 'Indralaya'],
            ['nama' => 'D.2.3', 'lokasi' => 'Indralaya'],
            ['nama' => 'D.2.4', 'lokasi' => 'Indralaya'],
            ['nama' => 'D.3.1', 'lokasi' => 'Indralaya'],
            ['nama' => 'D.3.2', 'lokasi' => 'Indralaya'],
            ['nama' => 'D.3.3', 'lokasi' => 'Indralaya'],
            ['nama' => 'D.3.4', 'lokasi' => 'Indralaya'],
            ['nama' => 'F.1.1', 'lokasi' => 'Indralaya'],
            ['nama' => 'F.2.1', 'lokasi' => 'Indralaya'],
            ['nama' => 'F.2.2', 'lokasi' => 'Indralaya'],
            ['nama' => 'GD.1.1', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.1.2', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.1.3', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.1.3A', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.2.1', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.2.1.1', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.2.1.2', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.2.1.3', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.2.1.4', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.2.1.5', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.2.2', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.2.3', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.2.4', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.2.5', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.3.1', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.3.2', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.3.3', 'lokasi' => 'Palembang'],
            ['nama' => 'GD 3.4', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.3.4', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.3.5', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.3.6', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.3.7', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.3.8', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.3.9', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.3.10', 'lokasi' => 'Palembang'],
            ['nama' => 'Lab. G.P. 3', 'lokasi' => 'Palembang'],
            ['nama' => 'G.D.4.1', 'lokasi' => 'Palembang'],
            ['nama' => 'G.D.4.2', 'lokasi' => 'Palembang'],
            ['nama' => 'G.D.4.3', 'lokasi' => 'Palembang'],
            ['nama' => 'G.D.4.4', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.4.5', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.4.6', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.4.7', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.4.8', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.4.9', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.4.10', 'lokasi' => 'Palembang'],
            ['nama' => 'Lab. G.P. 4', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.5.1', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.5.2', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.5.3', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.5.4', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.5.4', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.5.5', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.5.6', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.5.7', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.5.8', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.5.9', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.5.10', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.6.1', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.6.2', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.6.3', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.6.4', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.6.5', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.6.6', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.6.7', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.6.8', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.6.9', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.6.10', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.7.1', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.7.2', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.7.3', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.7.4', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.7.5', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.8.1', 'lokasi' => 'Palembang'],
            ['nama' => 'GD.8.2', 'lokasi' => 'Palembang'],
            ['nama' => 'DK.1.1', 'lokasi' => 'Palembang'],
            ['nama' => 'DK.1.2', 'lokasi' => 'Palembang'],
            ['nama' => 'DK.1.3', 'lokasi' => 'Palembang'],
            ['nama' => 'DK.1.4', 'lokasi' => 'Palembang'],
            ['nama' => 'DK.2.1', 'lokasi' => 'Palembang'],
            ['nama' => 'DK.2.2', 'lokasi' => 'Palembang'],
            ['nama' => 'DK.2.3', 'lokasi' => 'Palembang'],
            ['nama' => 'DK.2.4', 'lokasi' => 'Palembang'],
            ['nama' => 'DK.2.5', 'lokasi' => 'Palembang'],
            ['nama' => 'DK.2.5A', 'lokasi' => 'Palembang'],
            ['nama' => 'DK.2.5.1', 'lokasi' => 'Palembang'],
            ['nama' => 'DK.2.5.1A', 'lokasi' => 'Palembang'],
            ['nama' => 'DK.2.5.2', 'lokasi' => 'Palembang'],
            ['nama' => 'DK.2.5.2', 'lokasi' => 'Palembang'],
            ['nama' => 'DK.2.5.2', 'lokasi' => 'Palembang'],
            ['nama' => 'DK.2.5.2', 'lokasi' => 'Palembang'],
            ['nama' => 'DK.2.5.3', 'lokasi' => 'Palembang'],
            ['nama' => 'DK.2.5.3A', 'lokasi' => 'Palembang'],
            ['nama' => 'DK.2.5.4', 'lokasi' => 'Palembang'],
            ['nama' => 'DK.3.1', 'lokasi' => 'Palembang'],
            ['nama' => 'DK.3.2', 'lokasi' => 'Palembang'],
            ['nama' => 'DK.3.3', 'lokasi' => 'Palembang'],
            ['nama' => 'DK.3.4', 'lokasi' => 'Palembang'],
            ['nama' => 'DK.3.4A', 'lokasi' => 'Palembang'],
            ['nama' => 'DK.3.5', 'lokasi' => 'Palembang'],
            ['nama' => 'DK.3.5.1', 'lokasi' => 'Palembang'],
            ['nama' => 'DK.3.5.2', 'lokasi' => 'Palembang'],
            ['nama' => 'DK.3.5.3', 'lokasi' => 'Palembang'],
            ['nama' => 'DK.4.1', 'lokasi' => 'Palembang'],
            ['nama' => 'CL.1.1', 'lokasi' => 'Palembang'],
            ['nama' => 'CL.1.2', 'lokasi' => 'Palembang'],
            ['nama' => 'CL.1.3', 'lokasi' => 'Palembang'],
            ['nama' => 'CL.1.4', 'lokasi' => 'Palembang'],
            ['nama' => 'CL.1.5', 'lokasi' => 'Palembang'],
            ['nama' => 'CL.2.1', 'lokasi' => 'Palembang'],
            ['nama' => 'CL.2.2', 'lokasi' => 'Palembang'],
            ['nama' => 'CL.2.3', 'lokasi' => 'Palembang'],
            ['nama' => 'CL.2.4', 'lokasi' => 'Palembang'],
            ['nama' => 'CL.3.1', 'lokasi' => 'Palembang'],
            ['nama' => 'CL.3.2', 'lokasi' => 'Palembang'],
            ['nama' => 'CL.3.3', 'lokasi' => 'Palembang'],
            ['nama' => 'CL.3.4', 'lokasi' => 'Palembang'],
            ['nama' => 'CL.4.1', 'lokasi' => 'Palembang'],
            ['nama' => 'CL.4.2', 'lokasi' => 'Palembang'],
            ['nama' => 'CL.4.3', 'lokasi' => 'Palembang'],
            ['nama' => 'CL.4.4', 'lokasi' => 'Palembang'],
            ['nama' => 'CL.5.1', 'lokasi' => 'Palembang'],
            ['nama' => 'CL.5.2', 'lokasi' => 'Palembang'],
            ['nama' => 'CL.5.3', 'lokasi' => 'Palembang'],
        ]);

        AdminJurusan::insert([
            ['nama' => 'Rifka Handayani, S.E'],
            ['nama' => 'Ayu'],
            ['nama' => 'Rika'],
            ['nama' => 'Septi Widiastuti'],
            ['nama' => 'Yopi'],
            ['nama' => 'Sari Nuzulastri'],
            ['nama' => 'Paula'],
            ['nama' => 'Truyandi Fadesa']
        ]);

        $jumlahInstrumen1 = Instrumen::where('bagian', 1)->count();
        $jumlahInstrumen2 = Instrumen::where('bagian', 2)->count();
        $jumlahInstrumen3 = Instrumen::where('bagian', 3)->count();
        $jumlahInstrumen4 = Instrumen::where('bagian', 4)->count();
        $jumlahInstrumen5 = Instrumen::where('bagian', 5)->count();

        $programStudiData = ['si', 'ti', 'sk', 'tk', 'mi', 'ka'];
        $hariData = ['senin', 'selasa', 'rabu', 'kamis', 'jumat'];
        $mataKuliahData = MataKuliah::all()->pluck('nama_mk')->toArray();
        $jenisMKData = ['proyek', 'studi_kasus', 'teori'];
        $dosenData = Dosen::all()->pluck('nama')->toArray();
        $dosenData2 = $dosenData;
        array_push($dosenData2, '-');

        // for ($k = 1; $k <= 100; $k++) {
        //     $nomorResponden = $k;
        //     DataLain::where('attribute', 'jumlah_responden')->first()->update(['value' => $nomorResponden]);

        //     Responden::insert([
        //         ['respondent_number' => $nomorResponden, 'attribute' => 'program_studi', 'value' => $faker->randomElement(ProgramStudi::all()->pluck('kode')->toArray())],
        //         ['respondent_number' => $nomorResponden, 'attribute' => 'semester', 'value' => $faker->numberBetween(1, 14)],
        //         ['respondent_number' => $nomorResponden, 'attribute' => 'nim', 'value' => $faker->randomNumber(9, true)],
        //         ['respondent_number' => $nomorResponden, 'attribute' => 'tanggal', 'value' => $faker->dateTimeBetween('-1 week', 'now')],
        //         // ['respondent_number' => $nomorResponden, 'attribute' => 'kelas', 'value' => $faker->randomElement(['indralaya', 'bukit'])],
        //         ['respondent_number' => $nomorResponden, 'attribute' => 'hari', 'value' => $faker->randomElement($hariData)],
        //         ['respondent_number' => $nomorResponden, 'attribute' => 'nama_mk', 'value' => $faker->randomElement($mataKuliahData)],
        //         ['respondent_number' => $nomorResponden, 'attribute' => 'jenis_mk', 'value' => $faker->randomElement(JenisMataKuliah::all()->pluck('jenis')->toArray())],
        //         ['respondent_number' => $nomorResponden, 'attribute' => 'dosen1', 'value' => $faker->randomElement($dosenData)],
        //         ['respondent_number' => $nomorResponden, 'attribute' => 'dosen2', 'value' => $faker->randomElement($dosenData2)],
        //         ['respondent_number' => $nomorResponden, 'attribute' => 'ruangan', 'value' => $faker->randomElement(Ruangan::all()->pluck('nama')->toArray())]
        //     ]);

        //     for ($i = 1; $i <= $jumlahInstrumen1; $i++) {
        //         Responden::create([
        //             'respondent_number' => $nomorResponden,
        //             'attribute' => 'b1' . $i,
        //             'value' => $faker->numberBetween(1, 5)
        //         ]);
        //     }

        //     $offline = $faker->numberBetween(0, 16);
        //     $online = 20;
        //     do {
        //         $online = $faker->numberBetween(0, 16);
        //     } while (($offline + $online) > 16);

        //     Responden::create([
        //         'respondent_number' => $nomorResponden,
        //         'attribute' => 'b21',
        //         'value' => $online + $offline
        //     ]);

        //     Responden::create([
        //         'respondent_number' => $nomorResponden,
        //         'attribute' => 'b22',
        //         'value' => $offline
        //     ]);

        //     Responden::create([
        //         'respondent_number' => $nomorResponden,
        //         'attribute' => 'b23',
        //         'value' => $online
        //     ]);

        //     for ($i = 1; $i <= $jumlahInstrumen3; $i++) {
        //         Responden::create([
        //             'respondent_number' => $nomorResponden,
        //             'attribute' => 'b3' . $i,
        //             'value' => $faker->numberBetween(1, 5)
        //         ]);
        //     }

        //     Responden::create([
        //         'respondent_number' => $nomorResponden,
        //         'attribute' => 'namaAdmin',
        //         'value' => $faker->randomElement([
        //             'rifka_handayani',
        //             'ayu',
        //             'rika',
        //             'septi',
        //             'yopi',
        //             'sari',
        //             'paula',
        //             'truyandi'
        //         ])
        //     ]);

        //     for ($i = 1; $i <= $jumlahInstrumen4; $i++) {
        //         Responden::create([
        //             'respondent_number' => $nomorResponden,
        //             'attribute' => 'b4' . $i,
        //             'value' => $faker->numberBetween(1, 5)
        //         ]);
        //     }

        //     for ($i = 1; $i <= $jumlahInstrumen5; $i++) {
        //         Responden::create([
        //             'respondent_number' => $nomorResponden,
        //             'attribute' => 'b5' . $i,
        //             'value' => $faker->numberBetween(1, 5)
        //         ]);
        //     }

        //     Responden::create([
        //         'respondent_number' => $nomorResponden,
        //         'attribute' => 'saranDosen',
        //         'value' => $faker->sentence()
        //     ]);

        //     Responden::create([
        //         'respondent_number' => $nomorResponden,
        //         'attribute' => 'saranTenagaKependidikan',
        //         'value' => $faker->sentence()
        //     ]);

        //     Responden::create([
        //         'respondent_number' => $nomorResponden,
        //         'attribute' => 'saranProgramStudi',
        //         'value' => $faker->sentence()
        //     ]);
        // }
    }
}
