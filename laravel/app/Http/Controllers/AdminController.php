<?php



namespace App\Http\Controllers;

use App\AdminJurusan;
use App\DataLain;
use App\Http\Requests\LupaPasswordRequest;
use App\Mail\AdminMail;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Foundation\Bus\DispatchesJobs;

use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Routing\Controller as BaseController;

use App\User;

use App\Struktur;

use App\Home;

use App\Tim;

use App\Dokumen;
use App\Dosen;
use App\Evaluasi;
use Illuminate\Support\Facades\Auth;

use App\Materi;

use App\Sk;

use App\Internasional;

use App\Nasional;

use App\Ppepp;

use App\Pelaksanaan;

use App\Evaluasip;
use App\Exports\DosenExport;
use App\Exports\ProdiExport;
use App\Exports\RespondenExport;
use App\Exports\TKExport;
use App\Imports\AdminJurusanImport;
use App\Imports\DosenImport;
use App\Imports\MataKuliahImport;
use App\Imports\RuanganImport;
use App\Http\Requests\GantiPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Instrumen;
use App\JenisMataKuliah;
use App\MataKuliah;
use App\Pengendalian;

use App\Peningkatan;
use App\ProgramStudi;
use App\Responden;
use App\Ruangan;
use App\Services\Kuesioner1;
use App\Services\Kuesioner2;
use App\Services\Kuesioner3;
use App\Services\Kuesioner4;
use App\Services\Kuesioner5;
use App\Services\Saran;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends BaseController

{

  private $kuesioner1, $kuesioner2, $kuesioner3, $kuesioner4, $kuesioner5, $saran;
  public function __construct(Kuesioner1 $kuesioner1, Kuesioner2 $kuesioner2, Kuesioner3 $kuesioner3, Kuesioner4 $kuesioner4, Kuesioner5 $kuesioner5, Saran $saran)
  {
    $this->kuesioner1 = $kuesioner1;
    $this->kuesioner2 = $kuesioner2;
    $this->kuesioner3 = $kuesioner3;
    $this->kuesioner4 = $kuesioner4;
    $this->kuesioner5 = $kuesioner5;
    $this->saran = $saran;
  }

  public function dashboard(Request $request)

  {

    if ($request->session()->has('id_user')) {

      return view('admin.dashboard');
    } else {

      return view('admin.login');
    }
  }



  public function loginpage(Request $request)

  {

    if ($request->session()->has('id_user')) {

      return view('admin.dashboard');
    } else {

      return view('admin.login');
    }
  }

  public function lupa_password(Request $request)
  {
    DataLain::where('attribute', 'kode_ganti_password')->first()->update(['value' => Str::random(40)]);
    $kode = DataLain::where('attribute', 'kode_ganti_password')->first()->value;
    Mail::to("endangjurusan@gmail.com")->send(new AdminMail($kode));

    return view('admin.lupa_password');
  }

  public function ganti_password_lupa(Request $request, string $kode)
  {
    if ($kode === DataLain::where('attribute', 'kode_ganti_password')->first()->value) {
      Auth::loginUsingId(User::all()->first()->user_id);
      $request->session()->put('id_user', 'admin');

      return view('admin.ganti_lupa_password');
    } else {
      return redirect('/admin-login');
    }
  }

  public function lupa_passwordss(LupaPasswordRequest $request)
  {

    User::all()->first()->update(['password' => Hash::make($request->password_baru)]);
    return redirect('admin-login')->with(['message' => 'Password berhasil diubah']);
  }



  public function login(LoginRequest $request)

  {


    if (!Auth::attempt(['user_username' => $request->username, 'password' => $request->password])) {

      return redirect()->back();
    } else {

      $user_id = Auth::user()->user_id;

      $request->session()->put('id_user', $request->username);

      return redirect('/admin-dashboard');
    }
  }

  public function logout(Request $request)

  {

    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
  }

  public function ganti_password(Request $request)

  {

    if ($request->session()->has('id_user')) {

      return view('admin.ganti_password');
    } else {

      return view('admin.login');
    }
  }

  public function ganti_password_post(GantiPasswordRequest $request)
  {

    if (!Hash::check($request->password_lama, User::all()->first()->password)) {
      return redirect('admin-ganti-password')
        ->with(['message' => 'Password lama salah'])
        ->withInput();
    } else {
      User::all()->first()->update(['password' => Hash::make($request->password_baru)]);
      return redirect('admin-login')->with(['message' => 'Password berhasil diubah']);
    }
  }



  public function home(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $data['home'] = Home::first();



      return view('admin.home', $data);
    } else {

      return view('admin.login');
    }
  }



  public function tim(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $data['tim'] = Tim::first();



      return view('admin.tim', $data);
    } else {

      return view('admin.login');
    }
  }



  public function visimisi(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $data['tim'] = Tim::where('profil_tim_id', 2)->first();



      return view('admin.visimisi', $data);
    } else {

      return view('admin.login');
    }
  }



  public function kebijakan(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $data['tim'] = Tim::where('profil_tim_id', 3)->first();



      return view('admin.kebijakan', $data);
    } else {

      return view('admin.login');
    }
  }



  public function kedudukan(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $data['tim'] = Tim::where('profil_tim_id', 4)->first();



      return view('admin.kedudukan', $data);
    } else {

      return view('admin.login');
    }
  }



  public function struktur(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $data['struktur'] = Struktur::get();



      return view('admin.struktur', $data);
    } else {

      return view('admin.login');
    }
  }



  public function pelatihan(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $data['tim'] = Tim::where('profil_tim_id', 5)->first();



      return view('admin.pelatihan', $data);
    } else {

      return view('admin.login');
    }
  }



  public function auditor(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $data['tim'] = Tim::where('profil_tim_id', 6)->first();



      return view('admin.auditor', $data);
    } else {

      return view('admin.login');
    }
  }



  public function portofolio(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $data['tim'] = Tim::where('profil_tim_id', 7)->first();



      return view('admin.portofolio', $data);
    } else {

      return view('admin.login');
    }
  }



  public function dokumen(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $data['download'] = Dokumen::get();



      return view('admin.dokumen', $data);
    } else {

      return view('admin.login');
    }
  }



  public function evaluasi(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $data['download'] = Evaluasi::get();



      return view('admin.evaluasi', $data);
    } else {

      return view('admin.login');
    }
  }



  public function materi(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $data['download'] = Materi::get();



      return view('admin.materi', $data);
    } else {

      return view('admin.login');
    }
  }



  public function nasional(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $data['akreditasi'] = Nasional::get();



      return view('admin.akrenas', $data);
    } else {

      return view('admin.login');
    }
  }



  public function internasional(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $data['akreditasi'] = Internasional::get();



      return view('admin.akreint', $data);
    } else {

      return view('admin.login');
    }
  }



  public function sk(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $data['download'] = Sk::get();



      return view('admin.sk', $data);
    } else {

      return view('admin.login');
    }
  }



  public function internal(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $data['tim'] = Tim::where('profil_tim_id', 8)->first();



      return view('admin.internal', $data);
    } else {

      return view('admin.login');
    }
  }



  public function uu(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $data['tim'] = Tim::where('profil_tim_id', 9)->first();



      return view('admin.uu', $data);
    } else {

      return view('admin.login');
    }
  }



  public function penetapan(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $data['tim'] = Ppepp::get();



      return view('admin.penetapan', $data);
    } else {

      return view('admin.login');
    }
  }



  public function pelaksanaan(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $data['tim'] = Pelaksanaan::get();



      return view('admin.pelaksanaan', $data);
    } else {

      return view('admin.login');
    }
  }



  public function evaluasip(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $data['tim'] = Evaluasip::get();



      return view('admin.evaluasip', $data);
    } else {

      return view('admin.login');
    }
  }



  public function pengendalian(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $data['tim'] = Pengendalian::get();



      return view('admin.pengendalian', $data);
    } else {

      return view('admin.login');
    }
  }



  public function peningkatan(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $data['tim'] = Peningkatan::get();



      return view('admin.peningkatan', $data);
    } else {

      return view('admin.login');
    }
  }



  public function update_home(Request $request)

  {

    if ($request->session()->has('id_user')) {





      if ($files = $request->file('profile_picture')) {

        $files = $request->file('profile_picture');

        // Rename image

        $imagename = time() . '.' . $files->guessExtension();

        $files->move('fileku', $imagename);
      } else {

        $imagename = $request->filesaatini;
      }



      $home = Home::where('home_id', '1')->update(

        [
          'home_tentang_kami' => $request->tentang_kami,

          'home_deskripsi_download' => $request->deskripsi_download,

          'home_deskripsi_dokumen' => $request->download_dokumen,

          'home_deskripsi_materi' => $request->download_materi,

          'home_deskripsi_evaluasi' => $request->download_evaluasi,

          'home_deskripsi_sk' => $request->download_sk,

          'home_akreditasi_tahun' => $request->akreditasi_tahun,

          'home_akreditasi_sk' => $imagename,

          'home_deskripsi_kontak' => $request->deskripsi_kontak

        ]
      );



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function update_tim(Request $request)

  {

    if ($request->session()->has('id_user')) {





      if ($files = $request->file('profile_picture')) {

        $files = $request->file('profile_picture');

        // Rename image

        $imagename = time() . '.' . $files->guessExtension();

        $files->move('fileku', $imagename);
      } else {

        $imagename = $request->filesaatini;
      }

      $tim = Tim::where('profil_tim_id', '1')->update(

        [
          'profil_tim_judul' => $request->tim_judul,

          'profil_tim_foto' => $imagename,

          'profil_tim_text' => $request->tim_text

        ]
      );



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function update_visimisi(Request $request)

  {

    if ($request->session()->has('id_user')) {





      if ($files = $request->file('profile_picture')) {

        $files = $request->file('profile_picture');

        // Rename image

        $imagename = time() . '.' . $files->guessExtension();

        $files->move('fileku', $imagename);
      } else {

        $imagename = $request->filesaatini;
      }



      $tim = Tim::where('profil_tim_id', '2')->update(

        [
          'profil_tim_judul' => $request->tim_judul,

          'profil_tim_foto' => $imagename,

          'profil_tim_text' => $request->tim_text

        ]
      );



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function update_kebijakan(Request $request)

  {

    if ($request->session()->has('id_user')) {





      if ($files = $request->file('profile_picture')) {

        $files = $request->file('profile_picture');

        // Rename image

        $imagename = time() . '.' . $files->guessExtension();

        $files->move('fileku', $imagename);
      } else {

        $imagename = $request->filesaatini;
      }



      $tim = Tim::where('profil_tim_id', '3')->update(

        [
          'profil_tim_judul' => $request->tim_judul,

          'profil_tim_foto' => $imagename,

          'profil_tim_text' => $request->tim_text

        ]
      );



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function update_kedudukan(Request $request)

  {

    if ($request->session()->has('id_user')) {





      if ($files = $request->file('profile_picture')) {

        $files = $request->file('profile_picture');

        // Rename image

        $imagename = time() . '.' . $files->guessExtension();

        $files->move('fileku', $imagename);
      } else {

        $imagename = $request->filesaatini;
      }



      $tim = Tim::where('profil_tim_id', '4')->update(

        [
          'profil_tim_judul' => $request->tim_judul,

          'profil_tim_foto' => $imagename,

          'profil_tim_text' => $request->tim_text

        ]
      );



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function tambah_struktur(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $struktur = new Struktur;

      $struktur->struktur_nama = $request->struktur_nama;

      $struktur->struktur_nik = $request->struktur_nik;

      $struktur->struktur_jabatan = $request->struktur_jabatan;

      $struktur->save();



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function edit_struktur(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $id = $request->struktur_id;

      $tim = Struktur::where('struktur_id', $id)->update(

        [
          'struktur_nama' => $request->struktur_nama,

          'struktur_nik' => $request->struktur_nik,

          'struktur_jabatan' => $request->struktur_jabatan

        ]
      );



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function hapus_struktur(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $id = $_GET['id'];

      $tim = Struktur::where('struktur_id', $id)->delete();



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function update_pelatihan(Request $request)

  {

    if ($request->session()->has('id_user')) {





      if ($files = $request->file('profile_picture')) {

        $files = $request->file('profile_picture');

        // Rename image

        $imagename = time() . '.' . $files->guessExtension();

        $files->move('fileku', $imagename);
      } else {

        $imagename = $request->filesaatini;
      }



      $tim = Tim::where('profil_tim_id', '5')->update(

        [
          'profil_tim_judul' => $request->tim_judul,

          'profil_tim_foto' => $imagename,

          'profil_tim_text' => $request->tim_text

        ]
      );



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function update_auditor(Request $request)

  {

    if ($request->session()->has('id_user')) {





      if ($files = $request->file('profile_picture')) {

        $files = $request->file('profile_picture');

        // Rename image

        $imagename = time() . '.' . $files->guessExtension();

        $files->move('fileku', $imagename);
      } else {

        $imagename = $request->filesaatini;
      }



      $tim = Tim::where('profil_tim_id', '6')->update(

        [
          'profil_tim_judul' => $request->tim_judul,

          'profil_tim_foto' => $imagename,

          'profil_tim_text' => $request->tim_text

        ]
      );



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function update_portofolio(Request $request)

  {

    if ($request->session()->has('id_user')) {





      if ($files = $request->file('profile_picture')) {

        $files = $request->file('profile_picture');

        // Rename image

        $imagename = time() . '.' . $files->guessExtension();

        $files->move('fileku', $imagename);
      } else {

        $imagename = $request->filesaatini;
      }



      $tim = Tim::where('profil_tim_id', '7')->update(

        [
          'profil_tim_judul' => $request->tim_judul,

          'profil_tim_foto' => $imagename,

          'profil_tim_text' => $request->tim_text

        ]
      );



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function tambah_dokumen(Request $request)

  {

    if ($request->session()->has('id_user')) {



      if ($files = $request->file('profile_picture')) {

        $files = $request->file('profile_picture');

        // Rename image

        $imagename = time() . '.' . $files->guessExtension();

        $files->move('fileku', $imagename);
      }



      $dokumen = new Dokumen;

      $dokumen->mutu_nama = $request->mutu_nama;

      $dokumen->mutu_file = $imagename;

      $dokumen->save();



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function hapus_dokumen(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $id = $_GET['id'];

      $tim = Dokumen::where('mutu_id', $id)->delete();



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function tambah_evaluasi(Request $request)

  {

    if ($request->session()->has('id_user')) {



      if ($files = $request->file('profile_picture')) {

        $files = $request->file('profile_picture');

        // Rename image

        $imagename = time() . '.' . $files->guessExtension();

        $files->move('fileku', $imagename);
      }



      $dokumen = new Evaluasi;

      $dokumen->mutu_nama = $request->mutu_nama;

      $dokumen->mutu_file = $imagename;

      $dokumen->save();



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function hapus_evaluasi(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $id = $_GET['id'];

      $tim = Evaluasi::where('mutu_id', $id)->delete();



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function tambah_materi(Request $request)

  {

    if ($request->session()->has('id_user')) {



      if ($files = $request->file('profile_picture')) {

        $files = $request->file('profile_picture');

        // Rename image

        $imagename = time() . '.' . $files->guessExtension();

        $files->move('fileku', $imagename);
      }



      $dokumen = new Materi;

      $dokumen->mutu_nama = $request->mutu_nama;

      $dokumen->mutu_file = $imagename;

      $dokumen->save();



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function hapus_materi(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $id = $_GET['id'];

      $tim = Materi::where('mutu_id', $id)->delete();



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function tambah_sk(Request $request)

  {

    if ($request->session()->has('id_user')) {



      if ($files = $request->file('profile_picture')) {

        $files = $request->file('profile_picture');

        // Rename image

        $imagename = time() . '.' . $files->guessExtension();

        $files->move('fileku', $imagename);
      }



      $dokumen = new Sk;

      $dokumen->mutu_nama = $request->mutu_nama;

      $dokumen->mutu_file = $imagename;

      $dokumen->save();



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function hapus_sk(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $id = $_GET['id'];

      $tim = Sk::where('mutu_id', $id)->delete();



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function tambah_nasional(Request $request)

  {

    if ($request->session()->has('id_user')) {



      if ($files = $request->file('profile_picture')) {

        $files = $request->file('profile_picture');

        // Rename image

        $imagename = time() . '.' . $files->guessExtension();

        $files->move('fileku', $imagename);
      }





      $dokumen = new Nasional;

      $dokumen->akreditasi_studi = $request->akreditasi_studi;

      $dokumen->akreditasi_program = $request->akreditasi_program;

      $dokumen->akreditasi_akreditasi = $request->akreditasi_akreditasi;

      $dokumen->akreditasi_sk = $request->akreditasi_sk;

      $dokumen->sertifikat = $imagename;

      $dokumen->akreditasi_mulai = $request->akreditasi_mulai;

      $dokumen->akreditasi_sampai = $request->akreditasi_sampai;

      $dokumen->save();



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function hapus_nasional(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $id = $_GET['id'];

      $tim = Nasional::where('akreditasi_id', $id)->delete();



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function tambah_internasional(Request $request)

  {

    if ($request->session()->has('id_user')) {



      if ($files = $request->file('profile_picture')) {

        $files = $request->file('profile_picture');

        // Rename image

        $imagename = time() . '.' . $files->guessExtension();

        $files->move('fileku', $imagename);
      }



      $dokumen = new Internasional;

      $dokumen->akreditasi_thn = $request->akreditasi_thn;

      $dokumen->akreditasi_studi = $request->akreditasi_studi;

      $dokumen->akreditasi_program = $request->akreditasi_program;

      $dokumen->akreditasi_akreditasi = $request->akreditasi_akreditasi;

      $dokumen->akreditasi_sk = $imagename;

      $dokumen->save();



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function hapus_internasional(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $id = $_GET['id'];

      $tim = Internasional::where('akreditasi_id', $id)->delete();



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function update_internal(Request $request)

  {

    if ($request->session()->has('id_user')) {





      if ($files = $request->file('profile_picture')) {

        $files = $request->file('profile_picture');

        // Rename image

        $imagename = time() . '.' . $files->guessExtension();

        $files->move('fileku', $imagename);
      } else {

        $imagename = $request->filesaatini;
      }



      $tim = Tim::where('profil_tim_id', '8')->update(

        [
          'profil_tim_judul' => $request->tim_judul,

          'profil_tim_foto' => $imagename,

          'profil_tim_text' => $request->tim_text

        ]
      );



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function update_uu(Request $request)

  {

    if ($request->session()->has('id_user')) {





      if ($files = $request->file('profile_picture')) {

        $files = $request->file('profile_picture');

        // Rename image

        $imagename = time() . '.' . $files->guessExtension();

        $files->move('fileku', $imagename);
      } else {

        $imagename = $request->filesaatini;
      }



      $tim = Tim::where('profil_tim_id', '9')->update(

        [
          'profil_tim_judul' => $request->tim_judul,

          'profil_tim_foto' => $imagename,

          'profil_tim_text' => $request->tim_text

        ]
      );



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function update_penetapan(Request $request)

  {

    if ($request->session()->has('id_user')) {





      if ($files = $request->file('profile_picture')) {

        $files = $request->file('profile_picture');

        // Rename image

        $imagename = time() . '.' . $files->guessExtension();

        $files->move('fileku', $imagename);
      }



      $dokumen = new Ppepp;

      $dokumen->profil_tim_judul = $request->tim_judul;

      $dokumen->profil_tim_foto = $imagename;

      $dokumen->profil_tim_text = $request->tim_text;

      $dokumen->link = $request->link;

      $dokumen->save();



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function hapus_penetapan(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $id = $_GET['id'];

      $tim = Ppepp::where('profil_tim_id', $id)->delete();



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function update_pelaksanaan(Request $request)

  {

    if ($request->session()->has('id_user')) {





      if ($files = $request->file('profile_picture')) {

        $files = $request->file('profile_picture');

        // Rename image

        $imagename = time() . '.' . $files->guessExtension();

        $files->move('fileku', $imagename);
      }



      $dokumen = new Pelaksanaan;

      $dokumen->profil_tim_judul = $request->tim_judul;

      $dokumen->profil_tim_foto = $imagename;

      $dokumen->profil_tim_text = $request->tim_text;

      $dokumen->link = $request->link;

      $dokumen->save();



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function hapus_pelaksanaan(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $id = $_GET['id'];

      $tim = Pelaksanaan::where('profil_tim_id', $id)->delete();



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function update_evaluasip(Request $request)

  {

    if ($request->session()->has('id_user')) {


      if ($files = $request->file('profile_picture')) {

        $files = $request->file('profile_picture');

        // Rename image

        $imagename = time() . '.' . $files->guessExtension();

        $files->move('fileku', $imagename);
      }



      $dokumen = new Evaluasip;

      $dokumen->profil_tim_judul = $request->tim_judul;

      $dokumen->profil_tim_foto = $imagename;

      $dokumen->profil_tim_text = $request->tim_text;

      $dokumen->link = $request->link;

      $dokumen->save();



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function hapus_evaluasip(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $id = $_GET['id'];

      $tim = Evaluasip::where('profil_tim_id', $id)->delete();



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function update_pengendalian(Request $request)

  {

    if ($request->session()->has('id_user')) {





      if ($files = $request->file('profile_picture')) {

        $files = $request->file('profile_picture');

        // Rename image

        $imagename = time() . '.' . $files->guessExtension();

        $files->move('fileku', $imagename);
      }



      $dokumen = new Pengendalian;

      $dokumen->profil_tim_judul = $request->tim_judul;

      $dokumen->profil_tim_foto = $imagename;

      $dokumen->profil_tim_text = $request->tim_text;

      $dokumen->link = $request->link;

      $dokumen->save();



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function hapus_pengendalian(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $id = $_GET['id'];

      $tim = Pengendalian::where('profil_tim_id', $id)->delete();



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function update_peningkatan(Request $request)

  {

    if ($request->session()->has('id_user')) {





      if ($files = $request->file('profile_picture')) {

        $files = $request->file('profile_picture');

        // Rename image

        $imagename = time() . '.' . $files->guessExtension();

        $files->move('fileku', $imagename);
      }



      $dokumen = new Peningkatan;

      $dokumen->profil_tim_judul = $request->tim_judul;

      $dokumen->profil_tim_foto = $imagename;

      $dokumen->profil_tim_text = $request->tim_text;

      $dokumen->link = $request->link;

      $dokumen->save();



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }



  public function hapus_peningkatan(Request $request)

  {

    if ($request->session()->has('id_user')) {



      $id = $_GET['id'];

      $tim = Peningkatan::where('profil_tim_id', $id)->delete();



      return redirect()->back();
    } else {

      return view('admin.login');
    }
  }

  public function kuesioner(Request $request)
  {
    if ($request->session()->has('id_user')) {

      $prodiAll = ProgramStudi::all();
      $uniqueProdis = ProgramStudi::all()->pluck('nama')->unique()->values()->toArray();

      $prodis = [];

      for ($i = 0; $i < count($uniqueProdis); $i++) {
        $prodis[$i] = array($uniqueProdis[$i], 0);
      }

      for ($i = 0; $i < count($uniqueProdis); $i++) {
        $prodis[$i][1] = Responden::where('value', $prodis[$i][0])->count();
      }

      return view('admin.kuesioner.kuesioner', [
        'title' => 'Dashboard',
        'jumlahResponden' => DataLain::where('id', '1')->first()->value,
        'respondens' => $prodis
      ]);
    } else {

      return view('admin.login');
    }
  }

  public function kuesioner1(Request $request)
  {
    if ($request->session()->has('id_user')) {
      $hasilProdi = $this->kuesioner1->getHasilProdi();
      $hasilDosen = $this->kuesioner1->getHasilDosen();

      $nilaiProdi = $hasilProdi->toArray();
      $nilaiFasilkom = 0;
      for ($i = 0; $i < count($nilaiProdi); $i++) {
        $nilai = 0;
        for ($j = 1; $j <= count($nilaiProdi[$i]['nilai']); $j++) {
          $nilai = $nilai + $nilaiProdi[$i]['nilai'][$j];
        }
        $nilaiProdi[$i]['nilai'] = number_format($nilai / count($nilaiProdi[$i]['nilai']), 2, '.', ',');
        $nilaiFasilkom = $nilaiFasilkom + $nilaiProdi[$i]['nilai'];
      }
      $nilaiFasilkom = number_format($nilaiFasilkom / count($nilaiProdi), 2, '.', ',');

      return view('admin.kuesioner.kuesioner1', [
        'title' => 'Data Kuesioner Bagian 1',
        'hasilProdi' => $hasilProdi,
        'hasilDosen' => $hasilDosen,
        'nilaiProdi' => $nilaiProdi,
        'nilaiFasilkom' => $nilaiFasilkom
      ]);
    } else {
      return view('admin.login');
    }
  }

  public function kuesioner2(Request $request)
  {
    if ($request->session()->has('id_user')) {
      $hasilProdi = $this->kuesioner2->getHasilProdi();
      $hasilMK = $this->kuesioner2->getHasilMK();

      $nilaiProdi = $hasilProdi->toArray();
      $nilaiFasilkom = [0.0, 0.0, 0.0];

      for ($i = 0; $i < count($nilaiProdi); $i++) {
        for ($j = 1; $j <= count($nilaiProdi[$i]['pertemuan']); $j++) {
          $nilaiFasilkom[$j - 1] = $nilaiFasilkom[$j - 1] + $nilaiProdi[$i]['pertemuan'][$j];
        }
      }
      for ($i = 0; $i < count($nilaiFasilkom); $i++) {
        if (count($nilaiProdi) != 0) {
          $nilaiFasilkom[$i] = $nilaiFasilkom[$i] / count($nilaiProdi);
        }
      }

      return view('admin.kuesioner.kuesioner2', [
        'title' => 'Data Kuesioner Bagian 2',
        'hasilProdi' => $hasilProdi,
        'hasilMK' => $hasilMK,
        'nilaiProdi' => $nilaiProdi,
        'nilaiFasilkom' => $nilaiFasilkom
      ]);
    } else {

      return view('admin.login');
    }
  }

  public function kuesioner3(Request $request)
  {
    if ($request->session()->has('id_user')) {
      $hasilProdi = $this->kuesioner3->getHasilProdi();
      $hasilDosen = $this->kuesioner3->getHasilDosen();

      $nilaiProdi = $hasilProdi->toArray();
      $nilaiFasilkom = 0;
      for ($i = 0; $i < count($nilaiProdi); $i++) {
        $nilai = 0;
        for ($j = 1; $j <= count($nilaiProdi[$i]['nilai']); $j++) {
          $nilai = $nilai + $nilaiProdi[$i]['nilai'][$j];
        }
        $nilaiProdi[$i]['nilai'] = number_format($nilai / count($nilaiProdi[$i]['nilai']), 2, '.', ',');
        $nilaiFasilkom = $nilaiFasilkom + $nilaiProdi[$i]['nilai'];
      }
      $nilaiFasilkom = number_format($nilaiFasilkom / count($nilaiProdi), 2, '.', ',');

      return view('admin.kuesioner.kuesioner3', [
        'title' => 'Data Kuesioner Bagian 3',
        'hasilProdi' => $hasilProdi,
        'hasilDosen' => $hasilDosen,
        'nilaiProdi' => $nilaiProdi,
        'nilaiFasilkom' => $nilaiFasilkom
      ]);
    } else {

      return view('admin.login');
    }
  }

  public function kuesioner4(Request $request)
  {
    if ($request->session()->has('id_user')) {

      $hasilProdi = $this->kuesioner4->getHasilProdi();
      $hasilAdmin = $this->kuesioner4->getHasilAdmin();

      $nilaiProdi = $hasilProdi->toArray();
      $nilaiFasilkom = 0;
      for ($i = 0; $i < count($nilaiProdi); $i++) {
        $nilai = 0;
        for ($j = 1; $j <= count($nilaiProdi[$i]['nilai']); $j++) {
          $nilai = $nilai + $nilaiProdi[$i]['nilai'][$j];
        }
        $nilaiProdi[$i]['nilai'] = number_format($nilai / count($nilaiProdi[$i]['nilai']), 2, '.', ',');
        $nilaiFasilkom = $nilaiFasilkom + $nilaiProdi[$i]['nilai'];
      }
      $nilaiFasilkom = number_format($nilaiFasilkom / count($nilaiProdi), 2, '.', ',');

      return view('admin.kuesioner.kuesioner4', [
        'title' => 'Data Kuesioner Bagian 4',
        'hasilProdi' => $hasilProdi,
        'hasilAdmin' => $hasilAdmin,
        'nilaiProdi' => $nilaiProdi,
        'nilaiFasilkom' => $nilaiFasilkom
      ]);
    } else {

      return view('admin.login');
    }
  }

  public function kuesioner5(Request $request)
  {
    if ($request->session()->has('id_user')) {

      $hasilFasilkom = $this->kuesioner5->getHasilFasilkom();
      $hasilRuangan = $this->kuesioner5->getHasilRuangan();

      $nilaiFasilkom = 0;
      for ($i = 0; $i < count($hasilFasilkom); $i++) {
        $nilaiFasilkom = $nilaiFasilkom + $hasilFasilkom[$i];
      }
      $nilaiFasilkom = number_format($nilaiFasilkom / count($hasilFasilkom), 2, '.', ',');

      return view('admin.kuesioner.kuesioner5', [
        'title' => 'Data Kuesioner Bagian 5',
        'hasilFasilkom' => $hasilFasilkom,
        'hasilRuangan' => $hasilRuangan,
        'nilaiFasilkom' => $nilaiFasilkom
      ]);
    } else {

      return view('admin.login');
    }
  }

  public function edit_data_kuesioner(Request $request)
  {
    if ($request->session()->has('id_user')) {

      return view('admin.kuesioner.edit_data_kuesioner');
    } else {
      return view('admin.login');
    }
  }

  public function download_data_kuesioner(Request $request)
  {
    if ($request->session()->has('id_user')) {

      return view('admin.kuesioner.download_data_kuesioner');
    } else {
      return view('admin.login');
    }
  }

  public function edit_waktu(Request $request)
  {
    if ($request->session()->has('id_user')) {

      return view('admin.kuesioner.waktu_kuesioner', [
        'semester' => DataLain::find(2)->value,
        'tahun_ajaran_1' => DataLain::find(3)->value,
        'tahun_ajaran_2' => DataLain::find(4)->value
      ]);
    } else {
      return view('admin.login');
    }
  }

  public function edit_waktu_post(Request $request)
  {
    if ($request->session()->has('id_user')) {

      $semester = DataLain::find(2);
      $tahun_ajaran_1 = DataLain::find(3);
      $tahun_ajaran_2 = DataLain::find(4);

      $semester->value = $request->semester;
      $semester->save();

      $tahun_ajaran_1->value = $request->tahun1;
      $tahun_ajaran_1->save();

      $tahun_ajaran_2->value = $request->tahun2;
      $tahun_ajaran_2->save();

      return redirect('/admin-edit-data-kuesioner')->with('message', 'Data waktu telah berhasil disimpan!');
    } else {
      return view('admin.login');
    }
  }

  public function edit_deskripsi(Request $request)
  {
    if ($request->session()->has('id_user')) {

      return view('admin.kuesioner.deskripsi_kuesioner', [
        'deskripsi' => DataLain::find(5)->value
      ]);
    } else {
      return view('admin.login');
    }
  }

  public function edit_deskripsi_post(Request $request)
  {
    if ($request->session()->has('id_user')) {

      $deskripsi = DataLain::find(5);

      $deskripsi->value = $request->deskripsi;
      $deskripsi->save();

      return redirect('/admin-edit-data-kuesioner')->with('message', 'Data deskripsi telah berhasil disimpan!');
    } else {
      return view('admin.login');
    }
  }


  public function edit_mata_kuliah(Request $request)
  {
    if ($request->session()->has('id_user')) {

      return view('admin.kuesioner.mata_kuliah_kuesioner', [
        'mataKuliah' => MataKuliah::all()
      ]);
    } else {
      return view('admin.login');
    }
  }

  public function import_mata_kuliah(Request $request)
  {
    if ($request->session()->has('id_user')) {

      return view('admin.kuesioner.import_mata_kuliah_kuesioner');
    } else {
      return view('admin.login');
    }
  }

  public function import_mata_kuliah_post(Request $request)
  {
    if ($request->session()->has('id_user')) {

    Excel::import(new MataKuliahImport, request()->file('uploading'));

    return redirect('/admin-import-data-mata-kuliah')->with('message', 'Data telah berhasil di-import!');

    } else {
      return view('admin.login');
    }
  }

  public function edit_mata_kuliah_id(Request $request, MataKuliah $id)
  {
    if ($request->session()->has('id_user')) {

      return view('admin.kuesioner.mata_kuliah_id_kuesioner', [
        'mk' => MataKuliah::find($id)->first()
      ]);
    } else {
      return view('admin.login');
    }
  }

  public function edit_mata_kuliah_post(Request $request)
  {
    if ($request->session()->has('id_user')) {

      $mk = MataKuliah::find($request->mkId)->first();
      $mk->nama_mk = $request->nama_mk;
      $mk->sks = $request->sks;
      $mk->semester = $request->semester;
      $mk->kurikulum = $request->kurikulum;
      $mk->save();

      return redirect('/admin-edit-data-kuesioner')->with('message', 'Data mata kuliah telah berhasil disimpan!');
    } else {
      return view('admin.login');
    }
  }

  public function new_mata_kuliah(Request $request)
  {
    if ($request->session()->has('id_user')) {

      return view('admin.kuesioner.mata_kuliah_new_kuesioner');
    } else {
      return view('admin.login');
    }
  }

  public function new_mata_kuliah_post(Request $request)
  {
    if ($request->session()->has('id_user')) {

      if ($request->kdmk && $request->nama_mk && $request->sks && $request->semester && $request->kurikulum) {
        $mk = new MataKuliah();
        $mk->nama_mk = $request->nama_mk;
        $mk->sks = $request->sks;
        $mk->semester = $request->semester;
        $mk->kurikulum = $request->kurikulum;
        $mk->save();

        return redirect('/admin-edit-data-kuesioner')->with('message', 'Data mata kuliah telah berhasil disimpan!');
      } else {
        return redirect()->back()->with('error', 'isi seluruh kolom');
      }
    } else {
      return view('admin.login');
    }
  }

  public function edit_jenis_mata_kuliah(Request $request)
  {
    if ($request->session()->has('id_user')) {

      return view('admin.kuesioner.jenis_mata_kuliah_kuesioner', [
        'jenisMK' => JenisMataKuliah::all()
      ]);
    } else {
      return view('admin.login');
    }
  }

  public function edit_jenis_mata_kuliah_id(Request $request, JenisMataKuliah $id)
  {
    if ($request->session()->has('id_user')) {

      return view('admin.kuesioner.jenis_mata_kuliah_id_kuesioner', [
        'jenisMK' => JenisMataKuliah::find($id)->first()
      ]);
    } else {
      return view('admin.login');
    }
  }

  public function edit_jenis_mata_kuliah_post(Request $request)
  {
    if ($request->session()->has('id_user')) {

      $jenisMK = JenisMataKuliah::find($request->jenisMKId)->first();
      $jenisMK->jenis = $request->jenis;
      $jenisMK->save();

      return redirect('/admin-edit-data-kuesioner')->with('message', 'Data jenis mata kuliah telah berhasil disimpan!');
    } else {
      return view('admin.login');
    }
  }

  public function new_jenis_mata_kuliah(Request $request)
  {
    if ($request->session()->has('id_user')) {

      return view('admin.kuesioner.jenis_mata_kuliah_new_kuesioner');
    } else {
      return view('admin.login');
    }
  }

  public function new_jenis_mata_kuliah_post(Request $request)
  {
    if ($request->session()->has('id_user')) {

      if ($request->jenis) {
        $jmk = new JenisMataKuliah();
        $jmk->jenis = $request->jenis;
        $jmk->save();

        return redirect('/admin-edit-data-kuesioner')->with('message', 'Data mata kuliah telah berhasil disimpan!');
      } else {
        return redirect()->back()->with('error', 'isi seluruh kolom');
      }
    } else {
      return view('admin.login');
    }
  }

  public function edit_dosen(Request $request)
  {
    if ($request->session()->has('id_user')) {

      return view('admin.kuesioner.dosen_kuesioner', [
        'dosens' => Dosen::all()
      ]);
    } else {
      return view('admin.login');
    }
  }

  public function edit_dosen_id(Request $request, Dosen $id)
  {
    if ($request->session()->has('id_user')) {

      return view('admin.kuesioner.dosen_id_kuesioner', [
        'dosen' => Dosen::find($id)->first()
      ]);
    } else {
      return view('admin.login');
    }
  }

  public function edit_dosen_post(Request $request)
  {
    if ($request->session()->has('id_user')) {

      $dosen = Dosen::find($request->dosenId)->first();
      $dosen->nip = $request->nip;
      $dosen->nama = $request->nama;
      $dosen->prodi = $request->prodi;
      $dosen->jenis_kelamin = $request->jenis_kelamin;
      $dosen->save();

      return redirect('/admin-edit-data-kuesioner')->with('message', 'Data dosen telah berhasil disimpan!');
    } else {
      return view('admin.login');
    }
  }

  public function new_dosen(Request $request)
  {
    if ($request->session()->has('id_user')) {

      return view('admin.kuesioner.dosen_new_kuesioner');
    } else {
      return view('admin.login');
    }
  }

  public function new_dosen_post(Request $request)
  {
    if ($request->session()->has('id_user')) {

      if ($request->nip && $request->nama && $request->prodi && $request->jenis_kelamin) {
        $dosen = new Dosen();
        $dosen->nip = $request->nip;
        $dosen->nama = $request->nama;
        $dosen->prodi = $request->prodi;
        $dosen->jenis_kelamin = $request->jenis_kelamin;
        $dosen->save();

        return redirect('/admin-edit-data-kuesioner')->with('message', 'Data dosen telah berhasil disimpan!');
      } else {
        return redirect()->back()->with('error', 'isi seluruh kolom');
      }
    } else {
      return view('admin.login');
    }
  }

  public function import_dosen(Request $request)
  {
    if ($request->session()->has('id_user')) {

      return view('admin.kuesioner.import_dosen_kuesioner');
    } else {
      return view('admin.login');
    }
  }

  public function import_dosen_post(Request $request)
  {
    if ($request->session()->has('id_user')) {

    Excel::import(new DosenImport, request()->file('uploading'));

    return redirect('/admin-import-data-dosen')->with('message', 'Data telah berhasil di-import!');

    } else {
      return view('admin.login');
    }
  }

  public function edit_instrumen(Request $request)
  {
    if ($request->session()->has('id_user')) {

      return view('admin.kuesioner.instrumen_kuesioner', [
        'instrumens' => Instrumen::all()
      ]);
    } else {
      return view('admin.login');
    }
  }

  public function edit_instrumen_id(Request $request, Instrumen $id)
  {
    if ($request->session()->has('id_user')) {


      return view('admin.kuesioner.instrumen_id_kuesioner', [
        'instrumen' => Instrumen::where('id', $id->id)->first()
      ]);
    } else {
      return view('admin.login');
    }
  }

  public function edit_instrumen_post(Request $request)
  {
    if ($request->session()->has('id_user')) {

      $instrumen = Instrumen::find($request->instrumenId)->first();
      $instrumen->instrumen = $request->instrumen;
      $instrumen->save();

      return redirect('/admin-edit-data-kuesioner')->with('message', 'Data instrumen telah berhasil disimpan!');
    } else {
      return view('admin.login');
    }
  }

  public function edit_ruangan(Request $request)
  {
    if ($request->session()->has('id_user')) {

      return view('admin.kuesioner.ruangan_kuesioner', [
        'ruangans' => Ruangan::all()
      ]);
    } else {
      return view('admin.login');
    }
  }

  public function edit_ruangan_id(Request $request, Ruangan $id)
  {
    if ($request->session()->has('id_user')) {

      return view('admin.kuesioner.ruangan_id_kuesioner', [
        'ruangan' => Ruangan::find($id)->first()
      ]);
    } else {
      return view('admin.login');
    }
  }

  public function edit_ruangan_post(Request $request)
  {
    if ($request->session()->has('id_user')) {

      $ruangan = Ruangan::find($request->ruanganId)->first();
      $ruangan->nama = $request->nama;
      $ruangan->lokasi = $request->lokasi;
      $ruangan->save();

      return redirect('/admin-edit-data-kuesioner')->with('message', 'Data ruangan telah berhasil disimpan!');
    } else {
      return view('admin.login');
    }
  }

  public function new_ruangan(Request $request)
  {
    if ($request->session()->has('id_user')) {

      return view('admin.kuesioner.ruangan_new_kuesioner');
    } else {
      return view('admin.login');
    }
  }

  public function new_ruangan_post(Request $request)
  {
    if ($request->session()->has('id_user')) {

      if ($request->nama && $request->lokasi) {
        $ruangan = new Ruangan();
        $ruangan->nama = $request->nama;
        $ruangan->lokasi = $request->lokasi;
        $ruangan->save();

        return redirect('/admin-edit-data-kuesioner')->with('message', 'Data ruangan telah berhasil disimpan!');
      } else {
        return redirect()->back()->with('error', 'isi seluruh kolom');
      }
    } else {
      return view('admin.login');
    }
  }

  public function import_ruangan(Request $request)
  {
    if ($request->session()->has('id_user')) {

      return view('admin.kuesioner.import_ruangan_kuesioner');
    } else {
      return view('admin.login');
    }
  }

  public function import_ruangan_post(Request $request)
  {
    if ($request->session()->has('id_user')) {

    Excel::import(new RuanganImport, request()->file('uploading'));

    return redirect('/admin-import-data-ruangan')->with('message', 'Data telah berhasil di-import!');

    } else {
      return view('admin.login');
    }
  }

  public function disable_ruangan(Request $request, Ruangan $id)
  {
    if ($request->session()->has('id_user')) {
      $value = Ruangan::where('id', $id->id)->first()->disabled;
      $output = 0;
      if ($value === 0) {
        $output = 1;
      } else {
        $output = 0;
      }

      Ruangan::where('id', $id->id)->first()->update([
        'disabled' => $output
      ]);

      return redirect()->back();
    } else {
      return view('admin.login');
    }
  }

  public function edit_prodi(Request $request)
  {
    if ($request->session()->has('id_user')) {
      $programStudi = ProgramStudi::all()->pluck('nama')->unique()->values()->toArray();

      $prodis = [];

      for ($i = 0; $i < ProgramStudi::all()->pluck('nama')->unique()->count(); $i++) {
        $prodis[$i] = array($programStudi[$i], ProgramStudi::where('nama', $programStudi[$i])->count(), ProgramStudi::where('nama', $programStudi[$i])->first()->jenjang, ProgramStudi::where('nama', $programStudi[$i])->first()->id);
      }

      return view('admin.kuesioner.prodi_kuesioner', [
        'prodis' => $prodis
      ]);
    } else {
      return view('admin.login');
    }
  }

  public function lihat_kelas(Request $request, ProgramStudi $id)
  {
    if ($request->session()->has('id_user')) {
      $prodis = ProgramStudi::where('nama', ProgramStudi::find($id)->first()->nama)->get();

      return view('admin.kuesioner.kelas_kuesioner', [
        'prodis' => $prodis
      ]);
    } else {
      return view('admin.login');
    }
  }

  public function edit_kelas(Request $request, ProgramStudi $id)
  {
    if ($request->session()->has('id_user')) {

      $prodi = ProgramStudi::where('id', $id->id)->first();

      return view('admin.kuesioner.kelas_id_kuesioner', [
        'prodi' => $prodi
      ]);
    } else {
      return view('admin.login');
    }
  }

  public function edit_kelas_post(Request $request)
  {
    if ($request->session()->has('id_user')) {

      $prodi = ProgramStudi::where('id', $request->prodiId)->first();

      $prodi->kode = $request->kode;
      $prodi->kelas = $request->kelas;
      $prodi->lokasi = $request->lokasi;
      $prodi->save();

      return redirect('/admin-edit-data-kuesioner')->with('message', 'Data kelas telah berhasil disimpan!');
    } else {
      return view('admin.login');
    }
  }

  public function new_kelas(Request $request, ProgramStudi $id)
  {
    if ($request->session()->has('id_user')) {

      return view('admin.kuesioner.kelas_new_kuesioner', [
        'prodi' => ProgramStudi::where('id', $id->id)->first()
      ]);
    } else {
      return view('admin.login');
    }
  }

  public function new_kelas_post(Request $request)
  {
    if ($request->session()->has('id_user')) {

      if ($request->kode && $request->lokasi && $request->kelas) {
        $kelas = new ProgramStudi();
        $kelas->kode = $request->kode;
        $kelas->nama = $request->nama;
        $kelas->kelas = $request->kelas;
        $kelas->lokasi = $request->lokasi;
        $kelas->jenjang = $request->jenjang;
        $kelas->save();

        return redirect('/admin-edit-data-kuesioner')->with('message', 'Data ruangan telah berhasil disimpan!');
      } else {
        return redirect()->back()->with('error', 'isi seluruh kolom');
      }
    } else {
      return view('admin.login');
    }
  }

  public function edit_prodi_id(Request $request, ProgramStudi $id)
  {
    if ($request->session()->has('id_user')) {

      return view('admin.kuesioner.prodi_id_kuesioner', [
        'prodi' => ProgramStudi::find($id)->first()
      ]);
    } else {
      return view('admin.login');
    }
  }

  public function edit_prodi_post(Request $request)
  {
    if ($request->session()->has('id_user')) {

      $prodi = ProgramStudi::where('nama', ProgramStudi::where('id', $request->prodiId)->first()->nama)->update([
        'nama' => $request->nama,
        'jenjang' => $request->jenjang
      ]);


      return redirect('/admin-edit-data-kuesioner')->with('message', 'Data program studi telah berhasil disimpan!');
    } else {
      return view('admin.login');
    }
  }

  public function new_prodi(Request $request)
  {
    if ($request->session()->has('id_user')) {

      return view('admin.kuesioner.prodi_new_kuesioner');
    } else {
      return view('admin.login');
    }
  }

  public function new_prodi_post(Request $request)
  {
    if ($request->session()->has('id_user')) {

      if ($request->kode && $request->lokasi && $request->kelas && $request->jenjang && $request->nama) {
        $kelas = new ProgramStudi();
        $kelas->kode = $request->kode;
        $kelas->nama = $request->nama;
        $kelas->kelas = $request->kelas;
        $kelas->lokasi = $request->lokasi;
        $kelas->jenjang = $request->jenjang;
        $kelas->save();

        return redirect('/admin-edit-data-kuesioner')->with('message', 'Data program studi telah berhasil disimpan!');
      } else {
        return redirect()->back()->with('error', 'isi seluruh kolom');
      }
    } else {
      return view('admin.login');
    }
  }

  public function edit_admin(Request $request)
  {
    if ($request->session()->has('id_user')) {

      return view('admin.kuesioner.admin_kuesioner', [
        'admins' => AdminJurusan::all()
      ]);
    } else {
      return view('admin.login');
    }
  }

  public function edit_admin_id(Request $request, AdminJurusan $id)
  {
    if ($request->session()->has('id_user')) {

      return view('admin.kuesioner.admin_id_kuesioner', [
        'admin' => AdminJurusan::find($id)->first()
      ]);
    } else {
      return view('admin.login');
    }
  }

  public function edit_admin_post(Request $request)
  {
    if ($request->session()->has('id_user')) {

      $admin = AdminJurusan::where('id', $request->adminId)->first();
      $admin->nama = $request->nama;
      $admin->save();

      return redirect('/admin-edit-data-kuesioner')->with('message', 'Data admin telah berhasil disimpan!');
    } else {
      return view('admin.login');
    }
  }

  public function new_admin(Request $request)
  {
    if ($request->session()->has('id_user')) {

      return view('admin.kuesioner.dosen_new_kuesioner');
    } else {
      return view('admin.login');
    }
  }

  public function new_admin_post(Request $request)
  {
    if ($request->session()->has('id_user')) {

      if ($request->nama) {
        $admin = new AdminJurusan();
        $admin->nama = $request->nama;
        $admin->save();

        return redirect('/admin-edit-data-kuesioner')->with('message', 'Data Admin telah berhasil disimpan!');
      } else {
        return redirect()->back()->with('error', 'isi seluruh kolom');
      }
    } else {
      return view('admin.login');
    }
  }

  public function lihat_saran(Request $request)
  {
    if ($request->session()->has('id_user')) {
      $saranDosen = $this->saran->getSaranDosen();
      $saranTK = $this->saran->getSaranTenagaKependidikan();
      $saranProdi = $this->saran->getSaranProgramStudi();

      return view('admin.kuesioner.saran', [
        'saranDosen' => $saranDosen,
        'saranTK' => $saranTK,
        'saranProdi' => $saranProdi
      ]);
    } else {
      return view('admin.login');
    }
  }

  public function control_panel(Request $request)
  {
    if ($request->session()->has('id_user')) {
      $tanggalTest = Carbon::parse(DataLain::where('attribute', 'tanggal_tutup')->first()->value)->lessThanOrEqualTo(Carbon::now());

      return view('admin.kuesioner.control_panel', [
        'tanggal' => DataLain::where('attribute', 'tanggal_tutup')->first()->value,
        'tanggalTest' => $tanggalTest
      ]);
    } else {
      return view('admin.login');
    }
  }

  public function set_tanggal(Request $request)
  {
    if ($request->session()->has('id_user')) {
      // dd(DataLain::where('attribute', 'tanggal_tutup')->first());
      DataLain::where('attribute', 'tanggal_tutup')->first()->update(['value' => $request->tanggalKuesioner]);

      return redirect('admin-control-panel')->with(['message' => 'Tanggal penutupan kuesioner berhasil diubah']);
    } else {
      return view('admin.login');
    }
  }

  public function toggle_tanggal(Request $request)
  {
    if ($request->session()->has('id_user')) {
      if (Carbon::parse(DataLain::where('attribute', 'tanggal_tutup')->first()->value)->lessThanOrEqualTo(Carbon::now())) {
        DataLain::where('attribute', 'tanggal_tutup')->first()->update(['value' => Carbon::now()->addDay(30)->format('Y-m-d')]);
        return redirect('admin-control-panel')->with(['message' => 'Kuesioner berhasil dibuka selama satu bulan']);
      } else {
        DataLain::where('attribute', 'tanggal_tutup')->first()->update(['value' => Carbon::now()->format('Y-m-d')]);
        return redirect('admin-control-panel')->with(['message' => 'Kuesioner berhasil ditutup']);
      }
    } else {
      return view('admin.login');
    }
  }

  public function download_dosen(Request $request)
  {

    if ($request->session()->has('id_user')) {


      return Excel::download(new DosenExport, 'dosen.xlsx');
    } else {
      return view('admin.login');
    }
  }

  public function download_tk(Request $request)
  {
    if ($request->session()->has('id_user')) {


      return Excel::download(new TKExport, 'tenaga_kependidikan.xlsx');
    } else {
      return view('admin.login');
    }
  }

  public function download_prodi(Request $request)
  {
    if ($request->session()->has('id_user')) {


      return Excel::download(new ProdiExport, 'prodi.xlsx');
    } else {
      return view('admin.login');
    }
  }

  public function download_responden(Request $request)
  {
    if ($request->session()->has('id_user')) {


      return Excel::download(new RespondenExport, 'responden.xlsx');
    } else {
      return view('admin.login');
    }
  }

  public function lihat_data_responden(Request $request)
  {
    if ($request->session()->has('id_user')) {
      $respondens = Responden::all();
      $respondenn = new Collection;
      $instrumen1 = Instrumen::all()->where('bagian', 1);
      $instrumen2 = Instrumen::all()->where('bagian', 2);
      $instrumen3 = Instrumen::all()->where('bagian', 3);
      $instrumen4 = Instrumen::all()->where('bagian', 4);
      $instrumen5 = Instrumen::all()->where('bagian', 5);
      $respondent_number = -1;
      $program_studi = '-';
      $semester = '-';
      $nim = '-';
      $tanggal = '-';
      $kelas = '-';
      $hari = '-';
      $nama_mk = '-';
      $jenis_mk = '-';
      $dosen1 = '-';
      $dosen2 = '-';
      $ruangan = '-';
      $namaAdmin = '-';
      $saranDosen = '-';
      $saranTenagaKependidikan = '-';
      $saranProgramStudi = '-';
      $b1 = [];
      $b2 = [];
      $b3 = [];
      $b4 = [];
      $b5 = [];

      foreach ($respondens as $responden) {
        if ($responden->respondent_number === $respondent_number && $responden->attribute === 'semester') {
          $semester = $responden->value;
        }
        if ($responden->respondent_number === $respondent_number && $responden->attribute === 'nim') {
          $nim = $responden->value;
        }
        if ($responden->respondent_number === $respondent_number && $responden->attribute === 'tanggal') {
          $tanggal = $responden->value;
        }
        if ($responden->respondent_number === $respondent_number && $responden->attribute === 'kelas') {
          $kelas = $responden->value;
        }
        if ($responden->respondent_number === $respondent_number && $responden->attribute === 'hari') {
          $hari = $responden->value;
        }
        if ($responden->respondent_number === $respondent_number && $responden->attribute === 'nama_mk') {
          $nama_mk = $responden->value;
        }
        if ($responden->respondent_number === $respondent_number && $responden->attribute === 'jenis_mk') {
          $jenis_mk = $responden->value;
        }
        if ($responden->respondent_number === $respondent_number && $responden->attribute === 'dosen1') {
          $dosen1 = $responden->value;
        }
        if ($responden->respondent_number === $respondent_number && $responden->attribute === 'dosen2') {
          $dosen2 = $responden->value;
        }
        if ($responden->respondent_number === $respondent_number && $responden->attribute === 'ruangan') {
          $ruangan = $responden->value;
        }
        if ($responden->respondent_number === $respondent_number && $responden->attribute === 'namaAdmin') {
          $namaAdmin = $responden->value;
        }
        if ($responden->respondent_number === $respondent_number && $responden->attribute === 'saranDosen') {
          $saranDosen = $responden->value;
        }
        if ($responden->respondent_number === $respondent_number && $responden->attribute === 'saranTenagaKependidikan') {
          $saranTenagaKependidikan = $responden->value;
        }
        if ($responden->respondent_number === $respondent_number && $responden->attribute === 'saranProgramStudi') {
          $saranProgramStudi = $responden->value;
        }
        if ($responden->respondent_number === $respondent_number) {
          for ($i = 1; $i <= count($instrumen1); $i++) {
            if ($responden->attribute === ('b1' . ($i))) {
              $b1[$i - 1] =  $responden->value;
            }
          }
          for ($i = 1; $i <= count($instrumen2); $i++) {
            if ($responden->attribute === ('b2' . ($i))) {
              $b2[$i - 1] =  $responden->value;
            }
          }
          for ($i = 1; $i <= count($instrumen3); $i++) {
            if ($responden->attribute === ('b3' . ($i))) {
              $b3[$i - 1] =  $responden->value;
            }
          }
          for ($i = 1; $i <= count($instrumen4); $i++) {
            if ($responden->attribute === ('b4' . ($i))) {
              $b4[$i - 1] =  $responden->value;
            }
          }
          for ($i = 1; $i <= count($instrumen5); $i++) {
            if ($responden->attribute === ('b5' . ($i))) {
              $b5[$i - 1] =  $responden->value;
            }
          }
        }
        if ($responden->attribute === 'program_studi') {
          if ($respondent_number == -1) {
            $respondent_number = $responden->respondent_number;
            $program_studi = $responden->value;
          } else {
            if (count($b1) != count($instrumen1)) {
              for ($i = 1; $i <= count($instrumen1); $i++) {
                if (!isset($b1[$i - 1])) {
                  $b1[$i - 1] =  "-";
                }
              }
            }
            if (count($b2) != count($instrumen2)) {
              for ($i = 1; $i <= count($instrumen2); $i++) {
                if (!isset($b2[$i - 1])) {
                  $b2[$i - 1] =  "-";
                }
              }
            }
            if (count($b3) != count($instrumen3)) {
              for ($i = 1; $i <= count($instrumen3); $i++) {
                if (!isset($b3[$i - 1])) {
                  $b3[$i - 1] =  "-";
                }
              }
            }
            if (count($b4) != count($instrumen4)) {
              for ($i = 1; $i <= count($instrumen4); $i++) {
                if (!isset($b4[$i - 1])) {
                  $b4[$i - 1] =  "-";
                }
              }
            }
            if (count($b5) != count($instrumen5)) {
              for ($i = 1; $i <= count($instrumen5); $i++) {
                if (!isset($b5[$i - 1])) {
                  $b5[$i - 1] =  "-";
                }
              }
            }
            $respondenn->push([
              'program_studi' => $program_studi,
              'semester' => $semester,
              'nim' => $nim,
              'tanggal' => $tanggal,
              'kelas' => $kelas,
              'hari' => $hari,
              'nama_mk' => $nama_mk,
              'jenis_mk' => $jenis_mk,
              'dosen1' => $dosen1,
              'dosen2' => $dosen2,
              'ruangan' => $ruangan,
              'b1' => $b1,
              'b2' => $b2,
              'b3' => $b3,
              'namaAdmin' => $namaAdmin,
              'b4' => $b4,
              'b5' => $b5,
              'saranDosen' => $saranDosen,
              'saranTenagaKependidikan' => $saranTenagaKependidikan,
              'saranProgramStudi' => $saranProgramStudi,
            ]);
            $program_studi = '-';
            $semester = '-';
            $nim = '-';
            $tanggal = '-';
            $kelas = '-';
            $hari = '-';
            $nama_mk = '-';
            $jenis_mk = '-';
            $dosen1 = '-';
            $dosen2 = '-';
            $ruangan = '-';
            $namaAdmin = '-';
            $saranDosen = '-';
            $saranTenagaKependidikan = '-';
            $saranProgramStudi = '-';
            $b1 = [];
            $b2 = [];
            $b3 = [];
            $b4 = [];
            $b5 = [];

            $respondent_number = $responden->respondent_number;
            $program_studi = $responden->value;
          }
        }
      }

      $hasilDosen = $this->kuesioner1->getHasilDosen();

      // foreach ($respondenn as $r) {
      //   foreach ($hasilDosen as $h) {
      //     if (
      //       $r['dosen1'] == $h['dosen1'] &&
      //       $r['dosen2'] == $h['dosen2'] &&
      //       $r['program_studi'] == $h['program_studi'] &&
      //       $r['nama_mk'] == $h['nama_mk']
      //     ) {
      //       // dd($r);
      //       // $r->push('nilaiDosen', $h['rataNilai']);
      //       $r['fjkasfnsaf'] = 'fadsgsad';
      //       // dd($r);
      //     }
      //   }
      // }
      // dd($respondenn);

      return view(
        'admin.kuesioner.lihat_data_responden',
        [
          'responden' => $respondenn,
          'nilaiDosen' => $hasilDosen
        ]
      );
    } else {
      return view('admin.login');
    }
  }

  public function kuesioner_login(Request $request)
  {
    if ($request->session()->has('id_user')) {
      if ($request->session()->has('kuesioner_login')) {
        return redirect('/admin-kuesioner');
      } else {
        return view('admin.kuesioner.pin_kuesioner');
      }
    } else {
      return view('admin.login');
    }
  }

  public function kuesioner_login_post(Request $request)
  {
    if ($request->session()->has('id_user')) {
      if ($request->pin === "232323") {
        $request->session()->put('kuesioner_login', 'ada');
        return redirect('/admin-kuesioner');
      } else {
        return redirect()->back()->with(['message' => 'Pin salah']);
      }
    } else {
      return view('admin.login');
    }
  }
}
