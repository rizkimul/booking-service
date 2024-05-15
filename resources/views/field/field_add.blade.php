@extends('layouts.layouts_main')
@section('container')
<section class="section">
    <div class="section-header">
        <h1>{{ $title }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/userList">{{ $mainTitle }}</a></div>
            <div class="breadcrumb-item">{{ $title }}</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">{{ $title }}</h2>

        <form action="/field" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="buildingname">Nama Bidang Pelayanan</label>
                            <input type="text" class="form-control @error('buildingname') is-invalid @enderror"
                                name="fieldName" id="fieldName" placeholder="Nama Bidang Pelayanan" value="{{ old('fieldName') }}"
                                required autofocus>
                            @error('fieldName')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="buildingdescription">Keterangan</label>
                            <input type="text" class="form-control @error('fieldDescription') is-invalid @enderror"
                                name="fieldDescription" id="fieldDescription" placeholder="Keterangan" value="{{ old('fieldDescription') }}"
                                required>
                            @error('fieldDescription')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Submit</button>
                <a href="/field" class="btn btn-danger">Cancel</a>
            </div>
        </form>

    </div>
    @endsection