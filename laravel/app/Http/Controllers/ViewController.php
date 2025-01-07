<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Auth;
use App\Home;
use App\Tim;
use App\Struktur;
use App\Dokumen;
use App\Evaluasi;
use App\Materi;
use App\Internasional;
use App\Nasional;
use App\Sk;
use App\Ppepp;
use App\Pelaksanaan;
use App\Evaluasip;
use App\Pengendalian;
use App\Peningkatan;


class ViewController extends BaseController
{
    public function home()
    {	
      	$data['home'] = Home::first();
      
      	$data['a1'] = Ppepp::get();
      	$data['b1'] = Pelaksanaan::get();
      	$data['c1'] = Evaluasip::get();
      	$data['d1'] = Pengendalian::get();
      	$data['e1'] = Peningkatan::get();
      
    	return view('guest.home',$data);
    }
  
  	public function tentang()
    {	
      	$data['tim'] = Tim::first();
    	return view('guest.tentang',$data);
    }
  
  	public function visimisi()
    {	
      	$data['tim'] = Tim::where('profil_tim_id', 2)->first();
    	return view('guest.visimisi',$data);
    }
  
  	public function kebijakan()
    {	
      	$data['tim'] = Tim::where('profil_tim_id', 3)->first();
    	return view('guest.kebijakan',$data);
    }
  
  	public function kedudukan()
    {	
      	$data['tim'] = Tim::where('profil_tim_id', 4)->first();
    	return view('guest.kedudukan',$data);
    }
  
  	public function struktur()
    {	
      	$data['struktur'] = Struktur::get();
    	return view('guest.struktur',$data);
    }
  
  	public function pelatihan()
    {	
      	$data['tim'] = Tim::where('profil_tim_id', 5)->first();
    	return view('guest.pelatihan',$data);
    }
  
  	public function auditor()
    {	
      	$data['tim'] = Tim::where('profil_tim_id', 6)->first();
    	return view('guest.auditor',$data);
    }
  
  	public function portofolio()
    {	
      	$data['tim'] = Tim::where('profil_tim_id', 7)->first();
    	return view('guest.portofolio',$data);
    }
  
  	public function dokumen()
    {	
      	$data['judul'] = "DOKUMEN MUTU";
      	$data['download'] = Dokumen::get();
    	return view('guest.download',$data);
    }
  
  	public function evaluasi()
    {	
      	$data['judul'] = "EVALUASI";
      	$data['download'] = Evaluasi::get();
    	return view('guest.download',$data);
    }
  
  	public function materi()
    {	
      	$data['judul'] = "MATERI";
      	$data['download'] = Materi::get();
    	return view('guest.download',$data);
    }
  
  	public function sk()
    {	
      	$data['judul'] = "SK";
      	$data['download'] = Sk::get();
    	return view('guest.download',$data);
    }
  
  	public function nasional()
    {	
      	$data['download'] = Nasional::get();
    	return view('guest.nasional',$data);
    }
  
  	public function internasional()
    {	
      	$data['download'] = Internasional::get();
    	return view('guest.internasional',$data);
    }
  
  	public function peraturan()
    {	
      	$data['tim'] = Tim::where('profil_tim_id', 8)->first();
    	return view('guest.peraturan',$data);
    }
  
  	public function uu()
    {	
      	$data['tim'] = Tim::where('profil_tim_id', 9)->first();
    	return view('guest.uu',$data);
    }

}

