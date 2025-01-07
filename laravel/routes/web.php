<?php

use App\AdminJurusan;
use App\DataLain;
use App\Dosen;
use App\Exports\RespondenExport;
use App\Http\Requests\TestingRequest;
use App\Instrumen;
use App\JenisMataKuliah;
use App\Mail\AdminMail;
use App\MataKuliah;
use App\ProgramStudi;
use App\Responden;
use App\Ruangan;
use App\Services\Kuesioner1;
use App\Services\Kuesioner2;
use App\Services\Kuesioner3;
use App\Services\Kuesioner4;
use App\Services\Kuesioner5;
use App\Services\RespondenService;
use App\Services\Saran;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

*/

//

//Route::get('reset_password', function(){

//user_username::where('user_username','admin')->update(['password'=>\Hash::make('123Upm')]);

//});



//Route Guest

Route::get('/', 'ViewController@home');

//Route Guest Profil

Route::get('/tentang', 'ViewController@tentang');

Route::get('/visi-misi', 'ViewController@visimisi');

Route::get('/pernyataan-kebijakan', 'ViewController@kebijakan');

Route::get('/status-kedudukan', 'ViewController@kedudukan');

Route::get('/struktur-organisasi', 'ViewController@struktur');

//Route Guest Layanan

Route::get('/pelatihan', 'ViewController@pelatihan');

Route::get('/auditor', 'ViewController@auditor');

Route::get('/portofolio', 'ViewController@portofolio');



//Route Guest Download

Route::get('/dokumen', 'ViewController@dokumen');

Route::get('/evaluasi', 'ViewController@evaluasi');

Route::get('/materi', 'ViewController@materi');

Route::get('/sk', 'ViewController@sk');



//Route Guest Akreditasi

Route::get('/akreditasi-nasional', 'ViewController@nasional');

Route::get('/akreditasi-internasional', 'ViewController@internasional');



//Route Guest Peraturan

Route::get('/peraturan', 'ViewController@peraturan');

Route::get('/peraturan-uu', 'ViewController@uu');





//Route Admin

Route::get('/admin-login', 'AdminController@loginpage');
Route::get('/kuesioner-login', 'AdminController@kuesioner_login');

Route::get('/admin-lupa-password', 'AdminController@lupa_password');
Route::post('/admin-lupa-passwordss', 'AdminController@lupa_passwordss');

Route::get('/admin-ganti-password-{id}', 'AdminController@ganti_password_lupa');

Route::get('/admin-logout', 'AdminController@logout');

Route::get('/admin-ganti-password', 'AdminController@ganti_password');

Route::post('/admin-ganti-password', 'AdminController@ganti_password_post');

Route::post('/admin-login', 'AdminController@login');
Route::post('/kuesioner-login', 'AdminController@kuesioner_login_post');

Route::get('/admin-dashboard', 'AdminController@dashboard');



//Route Admin Home

Route::get('/admin-home', 'AdminController@home');

Route::post('/admin-update-home', 'AdminController@update_home');



Route::get('/admin-penetapan', 'AdminController@penetapan');

Route::post('/admin-update-penetapan', 'AdminController@update_penetapan');

Route::get('/admin-hapus-penetapan', 'AdminController@hapus_penetapan');



Route::get('/admin-pelaksanaan', 'AdminController@pelaksanaan');

Route::post('/admin-update-pelaksanaan', 'AdminController@update_pelaksanaan');

Route::get('/admin-hapus-pelaksanaan', 'AdminController@hapus_pelaksanaan');



Route::get('/admin-evaluasip', 'AdminController@evaluasip');

Route::post('/admin-update-evaluasip', 'AdminController@update_evaluasip');

Route::get('/admin-hapus-evaluasip', 'AdminController@hapus_evaluasip');



Route::get('/admin-pengendalian', 'AdminController@pengendalian');

Route::post('/admin-update-pengendalian', 'AdminController@update_pengendalian');

Route::get('/admin-hapus-pengendalian', 'AdminController@hapus_pengendalian');



Route::get('/admin-peningkatan', 'AdminController@peningkatan');

Route::post('/admin-update-peningkatan', 'AdminController@update_peningkatan');

Route::get('/admin-hapus-peningkatan', 'AdminController@hapus_peningkatan');





//Route Admin Profil

Route::get('/admin-profil-tim', 'AdminController@tim');

Route::post('/admin-update-tim', 'AdminController@update_tim');



Route::get('/admin-profil-visimisi', 'AdminController@visimisi');

Route::post('/admin-update-visimisi', 'AdminController@update_visimisi');



Route::get('/admin-profil-kebijakan', 'AdminController@kebijakan');

Route::post('/admin-update-kebijakan', 'AdminController@update_kebijakan');



Route::get('/admin-profil-kedudukan', 'AdminController@kedudukan');

Route::post('/admin-update-kedudukan', 'AdminController@update_kedudukan');



Route::get('/admin-profil-struktur', 'AdminController@struktur');

Route::post('/admin-tambah-struktur', 'AdminController@tambah_struktur');

Route::post('/admin-edit-struktur', 'AdminController@edit_struktur');

Route::get('/admin-hapus-struktur', 'AdminController@hapus_struktur');





//Route Admin Layanan

Route::get('/admin-layanan-pelatihan', 'AdminController@pelatihan');

Route::post('/admin-update-pelatihan', 'AdminController@update_pelatihan');



Route::get('/admin-layanan-auditor', 'AdminController@auditor');

Route::post('/admin-update-auditor', 'AdminController@update_auditor');



Route::get('/admin-layanan-portofolio', 'AdminController@portofolio');

Route::post('/admin-update-portofolio', 'AdminController@update_portofolio');





//Route Admin Download

Route::get('/admin-download-dokumen', 'AdminController@dokumen');

Route::post('/admin-tambah-dokumen', 'AdminController@tambah_dokumen');

Route::get('/admin-hapus-dokumen', 'AdminController@hapus_dokumen');



Route::get('/admin-download-evaluasi', 'AdminController@evaluasi');

Route::post('/admin-tambah-evaluasi', 'AdminController@tambah_evaluasi');

Route::get('/admin-hapus-evaluasi', 'AdminController@hapus_evaluasi');



Route::get('/admin-download-materi', 'AdminController@materi');

Route::post('/admin-tambah-materi', 'AdminController@tambah_materi');

Route::get('/admin-hapus-materi', 'AdminController@hapus_materi');



Route::get('/admin-download-sk', 'AdminController@sk');

Route::post('/admin-tambah-sk', 'AdminController@tambah_sk');

Route::get('/admin-hapus-sk', 'AdminController@hapus_sk');





//Route Admin Akreditasi

Route::get('/admin-akreditasi-nasional', 'AdminController@nasional');

Route::post('/admin-tambah-nasional', 'AdminController@tambah_nasional');

Route::get('/admin-hapus-nasional', 'AdminController@hapus_nasional');



Route::get('/admin-akreditasi-internasional', 'AdminController@internasional');

Route::post('/admin-tambah-internasional', 'AdminController@tambah_internasional');

Route::get('/admin-hapus-internasional', 'AdminController@hapus_internasional');





//Route Admin Peraturan

Route::get('/admin-peraturan-internal', 'AdminController@internal');

Route::post('/admin-update-internal', 'AdminController@update_internal');



Route::get('/admin-peraturan-uu', 'AdminController@uu');

Route::post('/admin-update-uu', 'AdminController@update_uu');

// Route Kuesioner

Route::get('/kuesioner', function () {
  if (Carbon::parse(DataLain::where('attribute', 'tanggal_tutup')->first()->value)->lessThanOrEqualTo(Carbon::now())) {
    return redirect('/tutup');
  } else {
    return view('kuesioner/kuesioner', [
      'instrumens' => Instrumen::all(),
      'dosens' => Dosen::all(),
      'mata_kuliahs' => MataKuliah::all(),
      'semester' => DataLain::find(2)->value,
      'tahun_ajaran_1' => DataLain::find(3)->value,
      'tahun_ajaran_2' => DataLain::find(4)->value,
      'deskripsi' => DataLain::find(5)->value,
      'jenisMataKuliah' => JenisMataKuliah::all()->pluck('jenis'),
      'ruangans' => Ruangan::all(),
      'programStudis' => ProgramStudi::all()->pluck('nama')->unique(),
      'kelas' => ProgramStudi::all(),
      'namaAdmins' => AdminJurusan::all()->pluck('nama')
    ]);
  }
});

Route::get('/selesai', function () {
  return view('kuesioner.selesai', [
    'semester' => DataLain::find(2)->value,
    'tahun_ajaran_1' => DataLain::find(3)->value,
    'tahun_ajaran_2' => DataLain::find(4)->value
  ]);
});

Route::get('/tutup', function () {
  return view('kuesioner.tutup', [
    'semester' => DataLain::find(2)->value,
    'tahun_ajaran_1' => DataLain::find(3)->value,
    'tahun_ajaran_2' => DataLain::find(4)->value
  ]);
});



Route::post('/responden', 'RespondenController@store');

// Route Admin Kuesioner

Route::get('/admin-kuesioner', 'AdminController@kuesioner')->middleware('check_pin');
Route::get('/admin-kuesioner1', 'AdminController@kuesioner1')->middleware('check_pin');
Route::get('/admin-kuesioner2', 'AdminController@kuesioner2')->middleware('check_pin');
Route::get('/admin-kuesioner3', 'AdminController@kuesioner3')->middleware('check_pin');
Route::get('/admin-kuesioner4', 'AdminController@kuesioner4')->middleware('check_pin');
Route::get('/admin-kuesioner5', 'AdminController@kuesioner5')->middleware('check_pin');
Route::get('/admin-edit-data-kuesioner', 'AdminController@edit_data_kuesioner')->middleware('check_pin');
Route::get('/admin-download-data-kuesioner', 'AdminController@download_data_kuesioner')->middleware('check_pin');

Route::get('/admin-edit-data-waktu', 'AdminController@edit_waktu')->middleware('check_pin');
Route::post('/admin-edit-data-waktu', 'AdminController@edit_waktu_post')->middleware('check_pin');

Route::get('/admin-edit-data-deskripsi', 'AdminController@edit_deskripsi')->middleware('check_pin');
Route::post('/admin-edit-data-deskripsi', 'AdminController@edit_deskripsi_post')->middleware('check_pin');

Route::get('/admin-edit-data-mata-kuliah', 'AdminController@edit_mata_kuliah')->middleware('check_pin');
Route::get('/admin-import-data-mata-kuliah', 'AdminController@import_mata_kuliah')->middleware('check_pin');
Route::get('/admin-edit-data-mata-kuliah-{id}', 'AdminController@edit_mata_kuliah_id')->middleware('check_pin');
Route::get('/admin-new-data-mata-kuliah', 'AdminController@new_mata_kuliah')->middleware('check_pin');
Route::post('/admin-edit-data-mata-kuliah', 'AdminController@edit_mata_kuliah_post')->middleware('check_pin');
Route::post('/admin-new-data-mata-kuliah', 'AdminController@new_mata_kuliah_post')->middleware('check_pin');
Route::post('/admin-import-data-mata-kuliah', 'AdminController@import_mata_kuliah_post')->middleware('check_pin');

Route::get('/admin-edit-data-jenis-mata-kuliah', 'AdminController@edit_jenis_mata_kuliah')->middleware('check_pin');
Route::get('/admin-edit-data-jenis-mata-kuliah-{id}', 'AdminController@edit_jenis_mata_kuliah_id')->middleware('check_pin');
Route::post('/admin-edit-data-jenis-mata-kuliah', 'AdminController@edit_jenis_mata_kuliah_post')->middleware('check_pin');
Route::get('/admin-new-data-jenis-mata-kuliah', 'AdminController@new_jenis_mata_kuliah')->middleware('check_pin');
Route::post('/admin-new-data-jenis-mata-kuliah', 'AdminController@new_jenis_mata_kuliah_post')->middleware('check_pin');

Route::get('/admin-edit-data-dosen', 'AdminController@edit_dosen')->middleware('check_pin');
Route::get('/admin-edit-data-dosen-{id}', 'AdminController@edit_dosen_id')->middleware('check_pin');
Route::get('/admin-import-data-dosen', 'AdminController@import_dosen')->middleware('check_pin');
Route::get('/admin-new-data-dosen', 'AdminController@new_dosen')->middleware('check_pin');
Route::post('/admin-edit-data-dosen', 'AdminController@edit_dosen_post')->middleware('check_pin');
Route::post('/admin-new-data-dosen', 'AdminController@new_dosen_post')->middleware('check_pin');
Route::post('/admin-import-data-dosen', 'AdminController@import_dosen_post')->middleware('check_pin');

Route::get('/admin-edit-data-instrumen', 'AdminController@edit_instrumen')->middleware('check_pin');
Route::get('/admin-edit-data-instrumen-{id}', 'AdminController@edit_instrumen_id')->middleware('check_pin');
Route::post('/admin-edit-data-instrumen', 'AdminController@edit_instrumen_post')->middleware('check_pin');

Route::get('/admin-edit-data-ruangan', 'AdminController@edit_ruangan')->middleware('check_pin');
Route::get('/admin-edit-data-ruangan-{id}', 'AdminController@edit_ruangan_id')->middleware('check_pin');
Route::get('/admin-new-data-ruangan', 'AdminController@new_ruangan')->middleware('check_pin');
Route::post('/admin-edit-data-ruangan', 'AdminController@edit_ruangan_post')->middleware('check_pin');
Route::post('/admin-new-data-ruangan', 'AdminController@new_ruangan_post')->middleware('check_pin');
Route::get('/admin-disable-data-ruangan-{id}', 'AdminController@disable_ruangan')->middleware('check_pin');
Route::get('/admin-import-data-ruangan', 'AdminController@import_ruangan')->middleware('check_pin');
Route::post('/admin-import-data-ruangan', 'AdminController@import_ruangan_post')->middleware('check_pin');

Route::get('/admin-edit-data-prodi', 'AdminController@edit_prodi')->middleware('check_pin');
Route::get('/admin-new-data-prodi', 'AdminController@new_prodi')->middleware('check_pin');
Route::post('/admin-new-data-prodi', 'AdminController@new_prodi_post')->middleware('check_pin');
Route::get('/admin-edit-data-prodi-{id}', 'AdminController@edit_prodi_id')->middleware('check_pin');
Route::post('/admin-edit-data-prodi', 'AdminController@edit_prodi_post')->middleware('check_pin');
Route::get('/admin-lihat-data-kelas-{id}', 'AdminController@lihat_kelas')->middleware('check_pin');
Route::get('/admin-edit-data-kelas-{id}', 'AdminController@edit_kelas')->middleware('check_pin');
Route::get('/admin-new-data-kelas-{id}', 'AdminController@new_kelas')->middleware('check_pin');
Route::post('/admin-edit-data-kelas', 'AdminController@edit_kelas_post')->middleware('check_pin');
Route::post('/admin-new-data-kelas', 'AdminController@new_kelas_post')->middleware('check_pin');

Route::get('/admin-lihat-saran', 'AdminController@lihat_saran')->middleware('check_pin');
Route::get('/admin-control-panel', 'AdminController@control_panel')->middleware('check_pin');
Route::post('/admin-set-tanggal', 'AdminController@set_tanggal')->middleware('check_pin');
Route::post('/admin-toggle-tanggal', 'AdminController@toggle_tanggal')->middleware('check_pin');


Route::get('admin-hapus-data-dosen-{id}', function (Dosen $id) {

  Dosen::find($id)->first()->delete();
  return redirect()->back();
})->middleware('check_pin');

Route::get('admin-hapus-data-ruangan-{id}', function (Ruangan $id) {
  Ruangan::find($id)->first()->delete();
  return redirect()->back();
})->middleware('check_pin');

Route::get('admin-hapus-data-kelas-{id}', function (ProgramStudi $id) {
  ProgramStudi::find($id)->first()->delete();
  return redirect()->back();
})->middleware('check_pin');

Route::get('admin-hapus-data-mata-kuliah-{id}', function (MataKuliah $id) {
  MataKuliah::find($id)->first()->delete();
  return redirect()->back();
})->middleware('check_pin');

Route::get('admin-hapus-data-prodi-{id}', function (ProgramStudi $id) {
  ProgramStudi::find($id)->first()->delete();
  return redirect()->back();
})->middleware('check_pin');

Route::get('admin-hapus-data-jenis-mata-kuliah-{id}', function (JenisMataKuliah $id) {
  JenisMataKuliah::find($id)->first()->delete();
  return redirect()->back();
})->middleware('check_pin');

Route::get('admin-hapus-saran-dosen-{id}', function (int $id) {
  Responden::where('respondent_number', $id)->where('attribute', 'saranDosen')->first()->delete();
  return redirect()->back();
})->middleware('check_pin');

Route::get('admin-hapus-saran-tk-{id}', function (int $id) {
  Responden::where('respondent_number', $id)->where('attribute', 'saranTenagaKependidikan')->first()->delete();
  return redirect()->back();
})->middleware('check_pin');

Route::get('admin-hapus-saran-prodi-{id}', function (int $id) {
  Responden::where('respondent_number', $id)->where('attribute', 'saranProgramStudi')->first()->delete();
  return redirect()->back();
})->middleware('check_pin');

Route::get('/admin-edit-data-admin', 'AdminController@edit_admin')->middleware('check_pin');
Route::get('/admin-edit-data-admin-{id}', 'AdminController@edit_admin_id')->middleware('check_pin');
Route::get('/admin-new-data-admin', 'AdminController@new_admin')->middleware('check_pin');
Route::post('/admin-edit-data-admin', 'AdminController@edit_admin_post')->middleware('check_pin');
Route::post('/admin-new-data-admin', 'AdminController@new_admin_post')->middleware('check_pin');
Route::get('admin-hapus-data-admin-{id}', function (AdminJurusan $id) {

  AdminJurusan::find($id)->first()->delete();
  return redirect()->back();
})->middleware('check_pin');

Route::post('/admin-download-dosen', 'AdminController@download_dosen')->middleware('check_pin');
Route::post('/admin-download-tk', 'AdminController@download_tk')->middleware('check_pin');
Route::post('/admin-download-prodi', 'AdminController@download_prodi')->middleware('check_pin');
Route::post('/admin-download-responden', 'AdminController@download_responden')->middleware('check_pin');
Route::get('/admin-lihat-data-responden', 'AdminController@lihat_data_responden')->middleware('check_pin');


// Route::post('/admin-update-internal', 'AdminController@update_internal');

Route::get('/testing', function () {
  // return Excel::download(new RespondenExport, 'saran.xlsx');
});

Route::post('/testing', function (Request $request) {
  dd('aaa');
  // dd(Carbon::parse($request->tanggalKuesioner)->greaterThan(DataLain::where('attribute', 'tanggal_tutup')->first()->value));
});
