<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Building;
use App\Models\Field;
use App\Models\Rental;
use App\Models\Room;
use App\Models\User;
use App\Notifications\RentNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $data = Booking::where('status', 'Accept')->get()->groupBy(function($data){
            return Carbon::parse($data->book_date)->format('M');
        });
        $service = Booking::where('status', 'Accept')->with('service')->get()->groupBy(function($service){
            return $service->service->service_name;
        });
        $user = Booking::where('status', 'Accept')->with('user')->get()->groupBy(function($user){
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
        foreach($service as $nama => $nilai){
            $labelNama[]=$nama;
            $jumlah[]=count($nilai);
        }

        $namaUser=[];
        $jumlahPinjam=[];
        foreach($user as $userName => $value){
            $namaUser[]=$userName;
            $jumlahPinjam[]=count($value);
        }
        $tanggal = Booking::select('book_date', 'description')->where('status', 'Accept')->get();
        
        return view('dashboard.dashboard', [
            'title' => 'Dashboard',
            'user' => User::count(),
            'field' => Field::count(),
            'services' => Booking::count(),
            'booking' => Booking::where('status', 'accept')->count(),
            'data' => $data,
            'months' => $months,
            'monthCount' => $monthCount,
            'service' => $service,
            'nama' => $labelNama,
            'jumlah' => $jumlah,
            'pengguna' => $user,
            'namaUser' => $namaUser,
            'jumlahPinjam' => $jumlahPinjam,
            'tanggal' => $tanggal
        ]);
        // return view('dashboard.calendar', [
        //     'title' => 'Dashboard'
        // ]);
    }

    public function create(Request $request){
        if($request->ajax()){
            $tanggal = Booking::whereDate('start', '2024-06-26')->whereDate('end', '2024-06-26')->get(['id', 'status', 'book_date']);
            return response()->json($tanggal);
        }
    }
}
