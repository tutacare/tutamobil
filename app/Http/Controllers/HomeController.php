<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\City, App\Merek;
use App\SpesifikasiMobilBaru, App\Dimensi;
use App\SlotMobilBaru, App\SosialMedia;
use App\Gallery, App\Mesin;
use App\Transmisi, App\Kaki;
use App\FeatureInteriorExterior, App\FeatureKeamananKelengkapan;
use App\Post, App\PriceMobilBaru;
use TutaComp, Redirect, DB;
use App\Models\MobilBekas, App\Category;
use App\Models\FeatureInteriorText, App\Models\KeamananText;


class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city = SlotMobilBaru::select('city_id')->orderBy('city_id', 'asc')->distinct()->get();
        $sosmed = SosialMedia::find(1);
        $post = Post::orderBy('id', 'desc')->take(4)->get();
        $newcar = TutaComp::slotMobilBaru();
        $mobil_bekas = MobilBekas::where('status', 'publish')->get();
        //SlotMobilBaru::all();
        //return $newcar;
        return view('beranda.beranda', compact('city', 'post', 'newcar', 'mobil_bekas', 'sosmed'));
    }

    public function spesifikasiMobilBaru(Request $request)
    {
      //$slot = TutaComp::getSpecMobilBaru($request->city, $request->merek, $request->design, $request->tipe);
      $city = City::where('id', $request->city)->first();
      $mobil_baru = TutaComp::getSlugMobilBaru($request->merek, $request->design, $request->tipe);
      return Redirect::to('mobil-baru/' . $city->slug . '/'. $mobil_baru);
    }

    public function spesifikasiMobilBaruCredit(Request $request)
    {
      //$slot = TutaComp::getSpecMobilBaru($request->city, $request->merek, $request->design, $request->tipe);
      $city = City::where('id', $request->city)->first();
      $mobil_baru = TutaComp::getSlugMobilBaru($request->merek, $request->design, $request->tipe);
      return Redirect::to('mobil-baru/' . $city->slug . '/'. $mobil_baru . '#credit');
    }

    public function getSpecMobilBaru($city,$slug)
    {
        $city_slug = City::where('slug', $city)->first();
        $mobil_baru = SpesifikasiMobilBaru::where('slug', $slug)->first();
        $spec = SlotMobilBaru::where('city_id', $city_slug->id)->where('merek_id', $mobil_baru->merek->id)->first();
        //$mobil_baru = SpesifikasiMobilBaru::where('slug', $slug)->first();
        $price = PriceMobilBaru::where('city_id', $city_slug->id)->where('merek_id', $mobil_baru->merek_id)
                    ->where('design_id', $mobil_baru->design_id)->where('tipe_id', $mobil_baru->tipe_id)->first();
        $dimensi = Dimensi::where('spesifikasi_mobil_baru_id', $mobil_baru->id)->first();
        $mesin = Mesin::where('spesifikasi_mobil_baru_id', $mobil_baru->id)->first();
        $transmisi = Transmisi::where('spesifikasi_mobil_baru_id', $mobil_baru->id)->first();
        $gallery = Gallery::where('spesifikasi_mobil_baru_id', $mobil_baru->id)->get();
        $kaki = Kaki::where('spesifikasi_mobil_baru_id', $mobil_baru->id)->first();
        $interior_exterior = FeatureInteriorExterior::where('spesifikasi_mobil_baru_id', $mobil_baru->id)->get();
        $interior_text = FeatureInteriorText::where('spesifikasi_mobil_baru_id', $mobil_baru->id)->get();
        $keamanan_kelengkapan = FeatureKeamananKelengkapan::where('spesifikasi_mobil_baru_id', $mobil_baru->id)->get();
        $keamanan_text = KeamananText::where('spesifikasi_mobil_baru_id', $mobil_baru->id)->get();
        $city = SlotMobilBaru::select('city_id')->orderBy('city_id', 'asc')->distinct()->get();
        $sosmed = SosialMedia::find(1);
        //credit simulation formula
        if(!isset($price->harga))
        {
        $harga = 0;
        } else {
          $harga = $price->harga;
        }
        $dp = ($harga * 25) / 100;
        $pokok_hutang = $harga - $dp;
        //$bea_asuransi_1tahun = 0;//($price->harga * 2.9) / 100;
        //$bea_polish_1tahun = 150000;
        $bea_tjh = 100000; $bea_admin = 2500000; $bea_profisi = 0;
        //dp
        $dp_1tahun = $dp + $bea_tjh + $bea_admin + $bea_profisi + 150000;
        $dp_2tahun = $dp + $bea_tjh + $bea_admin + $bea_profisi + 250000;
        $dp_3tahun = $dp + $bea_tjh + $bea_admin + $bea_profisi + 350000;
        $dp_4tahun = $dp + $bea_tjh + $bea_admin + $bea_profisi + 450000;
        $dp_5tahun = $dp + $bea_tjh + $bea_admin + $bea_profisi + 550000;
        //bunga dan asuransi dan angsuran 1 tahun
        $bunga_1tahun = ($pokok_hutang * 8) / 100;
        $asuransi_1tahun = ($harga * 2.9) / 100;
        $angsuran_1tahunf1 = ($pokok_hutang + $asuransi_1tahun) + $bunga_1tahun; //* 8) / 100;
        $angsuran_1tahun = $angsuran_1tahunf1 / 12;
        //bunga dan asuransi dan angsuran 2 tahun
        $bunga_2tahun = ($pokok_hutang * (8.5 * 2)) / 100;
        $asuransi_2tahun = ($harga * 5.7) / 100;
        $angsuran_2tahunf2 = ($pokok_hutang + $asuransi_2tahun) + $bunga_2tahun; //* 8.5) / 100;
        //($pokok_hutang + $bunga_2tahun + $asuransi_2tahun) / 24;
        $angsuran_2tahun = $angsuran_2tahunf2 / 24;
        //bunga dan asuransi dan angsuran 3 tahun
        $bunga_3tahun = ($pokok_hutang * (9 * 3)) / 100;
        $asuransi_3tahun = ($harga * 8.7) / 100;
        $angsuran_3tahunf3 = ($pokok_hutang + $asuransi_3tahun) + $bunga_3tahun; //* 9) / 100;
        //($pokok_hutang + $bunga_3tahun + $asuransi_3tahun) / 36;
        $angsuran_3tahun = $angsuran_3tahunf3 / 36;
        //bunga dan asuransi dan angsuran 4 tahun
        $bunga_4tahun = ($pokok_hutang * (10 * 4)) / 100;
        $asuransi_4tahun = ($harga * 11) / 100;
        $angsuran_4tahunf4 = ($pokok_hutang + $asuransi_4tahun) + $bunga_4tahun; //* 10) / 100;
        //($pokok_hutang + $bunga_4tahun + $asuransi_4tahun) / 48;
        $angsuran_4tahun = $angsuran_4tahunf4 / 48;
        //bunga dan asuransi dan angsuran 4 tahun
        $bunga_5tahun = ($pokok_hutang * (11 * 5)) / 100;
        $asuransi_5tahun = ($harga * 14) / 100;
        $angsuran_5tahunf5 = ($pokok_hutang + $asuransi_5tahun) + $bunga_5tahun; //* 11) / 100;
        //($pokok_hutang + $bunga_5tahun + $asuransi_5tahun) / 60;
        $angsuran_5tahun = $angsuran_5tahunf5 / 60;
        return view('beranda.spec-detail', compact(
        'spec', 'dimensi', 'gallery', 'mesin', 'transmisi', 'kaki', 'interior_exterior', 'interior_text', 'keamanan_kelengkapan', 'keamanan_text',
        'city', 'mobil_baru', 'price', 'sosmed', 'tahi',
        'dp', 'dp_1tahun', 'dp_2tahun', 'dp_3tahun', 'dp_4tahun', 'dp_5tahun',
        'angsuran_1tahun', 'angsuran_2tahun', 'angsuran_3tahun', 'angsuran_4tahun', 'angsuran_5tahun'
      ));
    }

    public function creditSimulation($hargamobil, $inputdp)
    {
      //credit simulation formula
      //$dp = ((isset($price->harga) ? $price->harga : 0) * 25) / 100;
      $dp = $inputdp;
      $pokok_hutang = $hargamobil - $inputdp;
      $bea_tjh = 100000; $bea_admin = 2500000; $bea_profisi = 0;
      //dp
      $dp_1tahun = $dp + $bea_tjh + $bea_admin + $bea_profisi + 150000;
      $dp_2tahun = $dp + $bea_tjh + $bea_admin + $bea_profisi + 250000;
      $dp_3tahun = $dp + $bea_tjh + $bea_admin + $bea_profisi + 350000;
      $dp_4tahun = $dp + $bea_tjh + $bea_admin + $bea_profisi + 450000;
      $dp_5tahun = $dp + $bea_tjh + $bea_admin + $bea_profisi + 550000;
      //bunga dan asuransi dan angsuran 1 tahun
      $bunga_1tahun = ($pokok_hutang * 8) / 100;
      $asuransi_1tahun = ($hargamobil * 2.9) / 100;
      $angsuran_1tahunf1 = ($pokok_hutang + $asuransi_1tahun) + $bunga_1tahun; //* 8) / 100;
      $angsuran_1tahun = $angsuran_1tahunf1 / 12;
      //bunga dan asuransi dan angsuran 2 tahun
      $bunga_2tahun = ($pokok_hutang * (8.5 * 2)) / 100;
      $asuransi_2tahun = ($hargamobil * 5.7) / 100;
      $angsuran_2tahunf2 = ($pokok_hutang + $asuransi_2tahun) + $bunga_2tahun; //* 8.5) / 100;
      //($pokok_hutang + $bunga_2tahun + $asuransi_2tahun) / 24;
      $angsuran_2tahun = $angsuran_2tahunf2 / 24;
      //bunga dan asuransi dan angsuran 3 tahun
      $bunga_3tahun = ($pokok_hutang * (9 * 3)) / 100;
      $asuransi_3tahun = ($hargamobil * 8.7) / 100;
      $angsuran_3tahunf3 = ($pokok_hutang + $asuransi_3tahun) + $bunga_3tahun; //* 9) / 100;
      //($pokok_hutang + $bunga_3tahun + $asuransi_3tahun) / 36;
      $angsuran_3tahun = $angsuran_3tahunf3 / 36;
      //bunga dan asuransi dan angsuran 4 tahun
      $bunga_4tahun = ($pokok_hutang * (10 * 4)) / 100;
      $asuransi_4tahun = ($hargamobil * 11) / 100;
      $angsuran_4tahunf4 = ($pokok_hutang + $asuransi_4tahun) + $bunga_4tahun; //* 10) / 100;
      //($pokok_hutang + $bunga_4tahun + $asuransi_4tahun) / 48;
      $angsuran_4tahun = $angsuran_4tahunf4 / 48;
      //bunga dan asuransi dan angsuran 4 tahun
      $bunga_5tahun = ($pokok_hutang * (11 * 5)) / 100;
      $asuransi_5tahun = ($hargamobil * 14) / 100;
      $angsuran_5tahunf5 = ($pokok_hutang + $asuransi_5tahun) + $bunga_5tahun; //* 11) / 100;
      //($pokok_hutang + $bunga_5tahun + $asuransi_5tahun) / 60;
      $angsuran_5tahun = $angsuran_5tahunf5 / 60;
      return view('widgets.credit-simulation', compact('dp_1tahun', 'dp_2tahun', 'dp_3tahun', 'dp_4tahun', 'dp_5tahun',
      'angsuran_1tahun', 'angsuran_2tahun', 'angsuran_3tahun', 'angsuran_4tahun', 'angsuran_5tahun'));
    }

    public function homeSimulasiKredit()
    {
      $city = SlotMobilBaru::select('city_id')->orderBy('city_id', 'asc')->distinct()->get();
      $sosmed = SosialMedia::find(1);
      return view('beranda.simulation-credit.index', compact('sosmed', 'city'));
    }

    public function detailMobilBekas($slug)
    {
      $mobil_bekas = MobilBekas::where('status', 'publish')->where('slug', $slug)->first();
      $sosmed = SosialMedia::find(1);
      return view('beranda.detail.mobil-bekas.index', compact('mobil_bekas', 'sosmed'));
    }

    public function news()
    {
      $news = Post::where('post_status', 'publish')->orderBy('id', 'desc')->get();
      $sosmed = SosialMedia::find(1);
      $category = Category::orderBy('category', 'asc')->get();
      return view('beranda.detail.news.all', compact('news', 'sosmed', 'category'));
    }

    public function detailNews($slug)
    {
      $news = Post::where('post_status', 'publish')->where('post_slug', $slug)->first();
      $sosmed = SosialMedia::find(1);
      $berita_baru = Post::orderBy('id', 'desc')->take(10)->get();
      $category = Category::orderBy('category', 'asc')->get();
      return view('beranda.detail.news.index', compact('news', 'sosmed', 'berita_baru', 'category'));
    }

    public function searchNews(Request $request)
    {
      if($request->has('q'))
      {
        $key = $request->q;
        $key_array = preg_split('/\s+/', $key);
        $search = Post::where(function ($q) use ($key_array) {
          foreach ($key_array as $value) {
            $q->orWhere('post_title', 'LIKE', '%'. $value .'%')
            ->orWhere('post_content', 'LIKE', '%'. $value .'%');
          }
        })->where('post_status','publish')->paginate(10);

        $sosmed = SosialMedia::find(1);
        $category = Category::orderBy('category', 'asc')->get();

        return view('beranda.news.search', array_merge([
          'news' => $search,
          'page' => 'search',
          'query_search' => $key,
        ], compact('sosmed', 'category')));
      }
      else
      {
        return Redirect::to('/news');
      }
    }

    public function categoryNews($slug)
    {
      $category_id = Category::where('slug', $slug)->first();
      $news = Post::where('post_status', 'publish')->where('category_id', $category_id->id)->orderBy('id', 'desc')->get();
      $sosmed = SosialMedia::find(1);
      $category = Category::orderBy('category', 'asc')->get();
      return view('beranda.news.category', compact('news', 'sosmed', 'category'));
    }

    public function mobilBaru()
    {
      $sosmed = SosialMedia::find(1);
      $city = SlotMobilBaru::select('city_id')->orderBy('city_id', 'asc')->distinct()->get();
      $newcar = TutaComp::slotMobilBaru();
      return view('beranda.mobil-baru.index', compact('sosmed', 'city', 'newcar'));
    }

}
