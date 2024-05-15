<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('field.field_list', [
            'title' => 'Data Bidang Pelayanan',
            'fields' => Field::paginate(10)->withQueryString()
            ])->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('field.field_add', [
            'title'     => 'Tambah Bidang Pelayanan',
            'mainTitle' => 'Bidang Pelayanan'
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
        $field = new Field();
        $field->field_name = $request->input('fieldName');
        $field->field_description = $request->input('fieldDescription');
        $field->save();
        return redirect('/field')->with('statusAdd', 'Added data sucessfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function show(Field $field)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('field.field_update', [
            'title' => 'Update Bidang Pelayanan',
            'mainTitle' => 'Bidang Pelayanan',
            'data' => Field::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = Field::find($request -> id);
        $data->field_name = $request->fieldName;
        $data->field_description = $request->fieldDescription;
        $data->save();
        return redirect('/field')->with('statusUpdate', 'Update data sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Field::find($id);
        $data->delete();
        // return redirect()->back()->with('statusDelete', 'Delete data sucessfully !');
        return response()->json(
            [
              'success' => true
            ]);
    }
}
