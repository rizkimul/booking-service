<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function read()
    {
        $data = Rental::where('status', 'Accept')->get()->groupBy(function($data){
            return Carbon::parse($data->start)->translatedFormat('F');
        });

        $ruangan = Rental::where('status', 'Accept')->with('room')->get()->groupBy([function($ruangan){
            return $ruangan->room->roomname;
        }, 
        function($ruangan){
            return Carbon::parse($ruangan->start)->translatedFormat('Y');
        }]);

        $user = Rental::where('status', 'Accept')->with('user')->get()->groupBy(function($user){
            return $user->user->instansi;
        });

        $months=[];
        $monthCount=[];
        foreach($data as $month => $values){
            $months[]=$month;
            $monthCount[]=count($values);
        }

        $labelNama=[];
        $jumlah=[];
        $namaBulan=[];
        $hitung=[];
        foreach($ruangan as $nama => $nilai){
            $labelNama[]=$nama;
            $jumlah[]=$nilai;
            foreach($nilai as $i => $j){
                $namaBulan[] = $i;
                $hitung[] = count($j);
            };
        }

        $namaUser=[];
        $jumlahPinjam=[];
        foreach($user as $userName => $value){
            $namaUser[]=$userName;
            $jumlahPinjam[]=count($value);
        }

        return view('laporan.laporan', [
            'title' => 'Laporan',
            'rents' => Rental::with(['building', 'room'])->paginate(5),
            'bulan' => $months,
            'jumlahBulan' => $monthCount,
            'ruangan' => $labelNama,
            'ruanganBulan' => $namaBulan,
            'jumlahRuangan' => $hitung,
            'user' => $namaUser,
            'jumlahPinjam' => $jumlahPinjam,
            
        ]);
    }

    public function print()
    {
        $rent = Rental::all();
        $pdf = PDF::loadView('print-pdf', $rent);
        return $pdf->download('data.pdf');
    }
}
