<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Carbon\Carbon;
use App\Models\Rental;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use DateTime;
use Symfony\Component\HttpFoundation\Session\Session;

class LaporanController extends Controller
{
    public function read()
    {
        $bulan = Booking::where('status', 'Accept')->get()->groupBy(function($bulan){
            return Carbon::parse($bulan->start)->translatedFormat('F');
        });
        $bulanNum = Booking::where('status', 'Accept')->get()->groupBy(function($bulan){
            return Carbon::parse($bulan->start)->translatedFormat('m');
        });
        $getMonths=[];
        foreach($bulan as $i => $j){
            $getMonths[]=$i;
        }
        $getMonthNum=[];
        foreach($bulanNum as $i => $j){
            $getMonthNum[]=$i;
        }

        $year = Booking::where('status', 'Accept')->get()->groupBy(function($year){
            return Carbon::parse($year->start)->translatedFormat('Y');
        });
        $getYears=[];
        foreach($year as $i => $j){
            $getYears[]=$i;
        }


        return view('laporan.laporan', [
            'title' => 'Laporan',
            'rents' => Booking::with(['field', 'service'])->paginate(5),
            'getMonths' => $getMonths,
            'getMonthsNum' => $getMonthNum,
            'getYears' => $getYears
            
        ]);
    }

    public function print(Request $request)
    {

        $hari = $request->input('hari');
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        // dd($bulan);
        // dd($hari);
        // dd($tahun);

        if ($tahun == "Pilih Tahun" && $bulan == "Pilih Bulan") {

            $jumahRental = Booking::where('status', 'Accept')->whereDate('book_date', $hari)->count();
            $getdate = Carbon::parse($hari)->translatedFormat('d F Y');
    
            $ruanganRental = Booking::where('status', 'Accept')->whereDate('book_date', $hari)->with('service')->get()->groupBy(function($ruanganRental){
                return $ruanganRental->service->service_name;
            });
    
            $userRental = Booking::where('status', 'Accept')->whereDate('book_date', $hari)->with('user')->get()->groupBy(function($userRental){
                return $userRental->user->instansi;
            });
    
            $namaUser=[];
            $jumlahPinjam=[];
            foreach($userRental as $userName => $value){
                $namaUser[]=$userName;
                $jumlahPinjam[]=count($value);
            }
    
            $namaRuangan=[];
            $jumlahRuangan=[];
            foreach($ruanganRental as $roomName => $value){
                $namaRuangan[]=$roomName;
                $jumlahRuangan[]=count($value);
            }
            
        }

        elseif(empty($hari) && $bulan == "Pilih Bulan"){

            $jumahRental = Booking::where('status', 'Accept')->whereYear('book_date', $tahun)->count();
            $getdate = $tahun;
    
            $ruanganRental = Booking::where('status', 'Accept')->whereYear('book_date', $tahun)->with('service')->get()->groupBy(function($ruanganRental){
                return $ruanganRental->service->service_name;
            });
    
            $userRental = Booking::where('status', 'Accept')->whereYear('book_date', $tahun)->with('user')->get()->groupBy(function($userRental){
                return $userRental->user->instansi;
            });
    
            $namaUser=[];
            $jumlahPinjam=[];
            foreach($userRental as $userName => $value){
                $namaUser[]=$userName;
                $jumlahPinjam[]=count($value);
            }
    
            $namaRuangan=[];
            $jumlahRuangan=[];
            foreach($ruanganRental as $roomName => $value){
                $namaRuangan[]=$roomName;
                $jumlahRuangan[]=count($value);
            }
        }

        elseif(empty($hari)){

            $jumahRental = Booking::where('status', 'Accept')->whereMonth('book_date', $bulan)->whereYear('start', $tahun)->count();
            $getdate = Carbon::createFromFormat('!m', $bulan)->translatedFormat('F ').$tahun;
    
            $ruanganRental = Booking::where('status', 'Accept')->whereMonth('book_date', $bulan)->whereYear('start', $tahun)->with('service')->get()->groupBy(function($ruanganRental){
                return $ruanganRental->service->service_name;
            });
    
            $userRental = Booking::where('status', 'Accept')->whereMonth('book_date', $bulan)->whereYear('start', $tahun)->with('user')->get()->groupBy(function($userRental){
                return $userRental->user->instansi;
            });
    
            $namaUser=[];
            $jumlahPinjam=[];
            foreach($userRental as $userName => $value){
                $namaUser[]=$userName;
                $jumlahPinjam[]=count($value);
            }
    
            $namaRuangan=[];
            $jumlahRuangan=[];
            foreach($ruanganRental as $roomName => $value){
                $namaRuangan[]=$roomName;
                $jumlahRuangan[]=count($value);
            }
        }
        $pdf = PDF::loadView('laporan.print-pdf', [
            'jumahrentalbulan' => $jumahRental,
            'user' => $namaUser,
            'jumlahpinjam' => $jumlahPinjam,
            'ruangan' => $namaRuangan,
            'jumlahruangan' => $jumlahRuangan,
            'getdate' => $getdate
        ]);
        $path = public_path('pdf/');
        $fileName =  'data.pdf' ;
        $pdf->save($path . '/' . $fileName);
        $pdf = public_path('pdf/'.$fileName);
        
        return response()->download($pdf);
    }
}
