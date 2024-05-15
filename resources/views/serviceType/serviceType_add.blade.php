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

        <form action="/serviceType" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="serviceTypeName">Nama Jenis Ruangan</label>
                            <input type="text" class="form-control @error('serviceTypeName') is-invalid @enderror"
                                name="serviceTypeName" id="serviceTypeName" placeholder="Nama Jenis Pelayanan" value="{{ old('serviceTypeName') }}"
                                required autofocus>
                            @error('serviceTypeName')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="serviceTypeDescription">Keterangan</label>
                            <input type="text" class="form-control @error('roomtypedescription') is-invalid @enderror"
                                name="serviceTypeDescription" id="serviceTypeDescription" placeholder="Keterangan" value="{{ old('serviceTypeDescription') }}"
                                required>
                            @error('serviceTypeDescription')
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
            </div>
        </form>

    </div>
    @endsection