<?php

namespace App\Http\Controllers;

use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('serviceType.serviceType_list', [
            'title' => 'Data Jenis Pelayanan',
            'serviceTypes' => ServiceType::paginate(10)->withQueryString()
            ])->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('serviceType.serviceType_add', [
            'title'     => 'Tambah Jenis Pelayanan',
            'mainTitle' => 'Jenis Pelayanan',
            'roomtypes' => ServiceType::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $serviceType = new ServiceType();
        $serviceType->service_type_name = $request->input('serviceTypeName');
        $serviceType->service_type_description = $request->input('serviceTypeDescription');
        $serviceType->save();
        return redirect('/serviceType')->with('statusAdd', 'Added data sucessfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('serviceType.serviceType_update', [
            'title' => 'Update Jenis Pelayanan',
            'mainTitle' => 'Jenis Pelayanan',
            'data' => ServiceType::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = ServiceType::find($request -> id);
        $data->service_type_name = $request->serviceTypeName;
        $data->service_type_description = $request->serviceTypeDescription;
        $data->save();
        return redirect('/serviceType')->with('statusUpdate', 'Update data sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ServiceType::find($id);
        $data->delete();
        // return redirect('/roomtype')->with('statusDelete', 'Delete data sucessfully !');
        return response()->json([
            'success' => true
        ]);
    }
}
