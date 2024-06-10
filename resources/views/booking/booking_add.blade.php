@extends('layouts.layouts_main')

@section('container')

<section class="section">
    <div class="section-header">
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <h1>Form Booking</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/peminjamanList">{{ $title }}</a></div>
            <div class="breadcrumb-item">Form Booking</div>
        </div>
    </div>

    <div class="section-body">
        <form action="/booking" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="fieldId">Nama Bidang Pelayanan</label>
                            <select name="fieldId" id="fieldId"class="form-control @error('fieldId') is-invalid @enderror">
                                <option hidden>Pilih Bidang Pelayanan</option>
                            @foreach ($fields as $field)
                                <option value="{{ $field->id }}">{{ $field->field_name }}</option>
                            @endforeach
                            </select>
                            @error('fieldId')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="serviceId">Nama Pelayanan</label>
                            <select name="serviceId" id="serviceId" class="form-control @error('serviceId') is-invalid @enderror">
                            </select>
                            @error('serviceId')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8" id="tgl_awal">
                            <label for="bookDate">Tanggal Booking</label>
                            <input type="datetime-local" class="form-control @error('bookDate') is-invalid @enderror"
                                name="bookDate" id="bookDate" placeholder="00-00-0000" value="{{ old('bookDate') }}">
                            @error('bookDate')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="description">Tujuan Booking</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                name="description" id="description" placeholder="Keterangan Booking" value="{{ old('description') }}"
                                required>
                            @error('description')
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
    <script>
        $(document).ready(function() {
        $('#fieldId').on('change', function() {
           var categoryID = $(this).val();
           if(categoryID) {
               $.ajax({
                   url: '/getService/'+categoryID,
                   type: "GET",
                   data : {"_token":"{{ csrf_token() }}"},
                   dataType: "json",
                   success:function(data)
                   {
                     if(data){
                        $('#serviceId').empty();
                        $.each(data, function(key, service){
                            $('select[name="serviceId"]').append('<option value="'+ service.id +'">' + service.service_name+ '</option>');
                        });
                    }else{
                        $('#serviceId').empty();
                    }
                 }
               });
           }else{
             $('#serviceId').empty();
           }
        });
        });
    </script>
    <script>
        var type = document.getElementById("serviceType");
        var start = document.getElementById("bookDate");
    </script>

</section>


@endsection