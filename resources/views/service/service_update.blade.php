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

        <form action="/services/{{ $data->id }}" method="POST">
            @method('put')
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <input type="hidden" name="id" value="{{ $data['id'] }}">
                        <div class="form-group col-md-6">
                            <label for="serviceName">Nama Ruangan</label>
                            <input type="text" class="form-control @error('serviceName') is-invalid @enderror"
                                name="serviceName" id="serviceName" placeholder="Nama Pelayanan" value="{{ old('serviceName', $data->service_name) }}"
                                required autofocus>
                            @error('serviceName')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="serviceTypeId">Jenis Pelayanan</label>
                            <select class="form-control @error('serviceTypeId') is-invalid @enderror" 
                            name="serviceTypeId" id="serviceTypeId" value="{{ old('serviceTypeId') }}"
                            required>
                            @foreach($serviceTypes as $serviceType)
                                <option value="{{ $serviceType->id }}">{{ $serviceType->service_type_name }}</option>
                                @endforeach
                              </select>
                              @error('serviceTypeId')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fieldId">Bidang Pelayanan</label>
                            <select class="form-control @error('fieldId') is-invalid @enderror" 
                            name="fieldId" id="fieldId" value="{{ old('fieldId') }}"
                            required autofocus>
                            @foreach($fields as $field)
                                <option value="{{ $field->id }}">{{ $field->field_name }}</option>
                                @endforeach
                              </select>
                              @error('fieldId')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="serviceDescription">Keterangan</label>
                            <input type="text" class="form-control @error('serviceDescription') is-invalid @enderror"
                                name="serviceDescription" id="serviceDescription" placeholder="Keterangan" value="{{ old('serviceDescription', $data->service_description) }}"
                                required>
                            @error('serviceDescription')
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