@extends('layouts.layouts_main')

@section('container')

<section class="section">
    <div class="section-header">
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <h1>Form Add Peminjaman</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/peminjamanList">{{ $title }}</a></div>
            <div class="breadcrumb-item">Form Add Booking</div>
        </div>
    </div>

    <div class="section-body">
        <form action="/rental" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        {{-- <div class="form-group col-md-8">
                            <label for="gedung_id">Nama Gedung</label>
                            <select name="gedung_id" id="gedung_id"class="form-control @error('gedung_id') is-invalid @enderror">
                                <option hidden>Pilih Gedung</option>
                            @foreach ($buildings as $building)
                                <option value="{{ $building->id }}">{{ $building->buildingname }}</option>
                            @endforeach
                            </select>
                            @error('gedung_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div> --}}
                        <div class="form-group col-md-8">
                            <label for="fieldId">Nama Bidang Pelayanan</label>
                            <select name="fieldId" id="fieldID"class="form-control @error('fieldId') is-invalid @enderror">
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
                        {{-- <div class="form-group col-md-8">
                            <label for="room_id">Nama Ruangan</label>
                            <select name="room_id" id="room_id" class="form-control @error('room_id') is-invalid @enderror">
                            </select>
                            @error('room_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div> --}}
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
                        {{-- <div class="form-group col-md-8">
                            <label for="jenis_pinjaman">Jenis Pinjaman</label>
                            <select name="jenis_pinjaman" id="jenis" class="form-control @error('jenis_pinjaman') is-invalid @enderror" onChange="myNewFunction(this);">
                                <option hidden>Pilih Jenis Pinjaman</option>
                                <option value="Jangka Pendek" @if (old('jenis_pinjaman')=="Jangka Pendek" ) {{ 'selected' }} @endif>Jangka Pendek
                                </option>
                                <option value="Jangka Panjang" @if (old('jenis_pinjaman')=="Jangka Panjang" ) {{ 'selected' }} @endif>Jangka Panjang
                                </option>
                            </select>
                            @error('jenis_pinjaman')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div> --}}
                        <div class="form-group col-md-8">
                            <label for="serviceType">Jenis Pelayanan</label>
                            <select name="serviceType" id="serviceType" class="form-control @error('serviceType') is-invalid @enderror" onChange="myNewFunction(this);">
                                <option hidden>Pilih Jenis Pinjaman</option>
                                <option value="Jangka Pendek" @if (old('serviceType')=="Jangka Pendek" ) {{ 'selected' }} @endif>Jangka Pendek
                                </option>
                                <option value="Jangka Panjang" @if (old('serviceType')=="Jangka Panjang" ) {{ 'selected' }} @endif>Jangka Panjang
                                </option>
                            </select>
                            @error('serviceType')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        {{-- <div class="form-group col-md-8" id="waktu">
                            <label for="jangka">Jangka Waktu</label>
                            <select name="jangka" class="form-control @error('jangka') is-invalid @enderror">
                                <option hidden>Pilih Jangka Waktu</option>
                                <option value="bulan">Bulan</option>
                                <option value="tahun">Tahun</option>
                            </select>
                            @error('jangka')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div> --}}
                        {{-- <div class="form-group col-md-8" id="jumlah">
                            <label for="jumlah">Jumlah Bulan/Tahun</label>
                            <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                name="jumlah" id="jumlah" placeholder="Keterangan Peminjaman" value="{{ old('jumlah') }}">
                            @error('jumlah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div> --}}
                        {{-- <div class="form-group col-md-8" id="tgl_awal">
                            <label for="tgl_awal_pinjam">Tanggal Awal Pinjam</label>
                            <input type="datetime-local" class="form-control @error('tgl_awal_pinjam') is-invalid @enderror"
                                name="tgl_awal_pinjam" id="tgl_awal_pinjam" placeholder="00-00-0000" value="{{ old('tgl_awal_pinjam') }}">
                            @error('tgl_awal_pinjam')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8" id="tgl_akhir">
                            <label for="tgl_akhir_pinjam">Tanggal Akhir Pinjam</label>
                            <input type="datetime-local" class="form-control @error('tgl_akhir_pinjam') is-invalid @enderror" 
                                name="tgl_akhir_pinjam" id="tgl_akhir_pinjam" placeholder="00-00-0000" value="{{ old('tgl_akhir_pinjam') }}">
                            @error('tgl_akhir_pinjam')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div> --}}
                        <div class="form-group col-md-8" id="tgl_awal">
                            <label for="startDate">Tanggal Awal Pinjam</label>
                            <input type="datetime-local" class="form-control @error('startDate') is-invalid @enderror"
                                name="startDate" id="startDate" placeholder="00-00-0000" value="{{ old('startDate') }}">
                            @error('startDate')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8" id="tgl_akhir">
                            <label for="endDate">Tanggal Akhir Pinjam</label>
                            <input type="datetime-local" class="form-control @error('endDate') is-invalid @enderror" 
                                name="endDate" id="endDate" placeholder="00-00-0000" value="{{ old('endDate') }}">
                            @error('endDate')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        {{-- <div class="form-group col-md-8">
                            <label for="description">Tujuan Peminjaman</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                name="description" id="description" placeholder="Keterangan Peminjaman" value="{{ old('description') }}"
                                required>
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div> --}}
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
                        // $('#nama_ruangan').append('<option hidden>Pilih Ruangan</option>'); 
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
        var start = document.getElementById("startDate");
        var end = document.getElementById("endDate");
        // var waktu = document.getElementById("waktu");
        // var jumlah = document.getElementById("jumlah");
        awal.style.display = 'none'
        akhir.style.display = 'none'
        // waktu.style.display = 'none'
        // jumlah.style.display = 'none'

        function myNewFunction(sel) {
        var a = sel.options[sel.selectedIndex].text;
            if(a == "Jangka Pendek"){
                awal.style.display = ''
                akhir.style.display = ''
                // waktu.style.display = 'none'
                // jumlah.style.display = 'none'
            }
            else {
                awal.style.display = 'none'
                akhir.style.display = 'none'
                // waktu.style.display = ''
                // jumlah.style.display = ''
            }
        }
    </script>

</section>


@endsection