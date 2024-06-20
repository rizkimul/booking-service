<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Service;
use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('service.service_list', [
            'title' => 'Data Pelayanan',
            'services' => Service::with(['field','serviceType'])->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service.service_add', [
            'title'     => 'Tambah Pelayanan',
            'mainTitle' => 'Pelayanan',
            'services' => Service::all(),
            'fields'=> Field::all(),
            'serviceTypes'=> ServiceType::all()
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
        $service = new Service();
        $service->service_name = $request->input('serviceName');
        $service->service_type_id = $request->input('serviceTypeId');
        $service->field_id = $request->input('fieldId');
        $service->service_description = $request->input('serviceDescription');
        $service->save();
        return redirect('/services')->with('statusAdd', 'Added data sucessfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('service.service_update', [
            'title' => 'Update Pelayanan',
            'mainTitle' => 'Pelayanan',
            'data' => Service::find($id),
            'fields'=> Field::all(),
            'serviceTypes'=> ServiceType::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = Service::find($request -> id);
        $data->service_name = $request->serviceName;
        $data->service_type_id = $request->serviceTypeId;
        $data->field_id = $request->fieldId;
        $data->service_description = $request->serviceDescription;
        $data->save();
        return redirect('/services')->with('statusUpdate', 'Update data sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Service::find($id);
        $data->delete();
        // return redirect()->back()->with('statusDelete', 'Delete data sucessfully !');
        return response()->json([
            'success' => true
        ]);
    }
}
