@extends('layouts.layouts_main')

@section('container')

<section class="section">
    <div class="section-header">
        <h1>List Bidang Pelayanan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/jenisruanganList">{{ $title }}</a></div>
            <div class="breadcrumb-item">List Bidang Pelayanan</div>
        </div>
      </div>
    </section>
    <div class="section-body">
        {{-- <h2 class="section-title">List Gedung</h2> --}}

      @if (session('statusDelete'))
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
            <button type="button" class="close" data-dismiss="alert">
                <span>x</span>
            </button>
            <strong>{{ session('statusDelete') }}</strong>
            </div>
        </div>
          {{-- <h6 class="alert alert-danger alert-dismissible">{{ session('statusDelete') }}</h6> --}}
      @endif

      @if (session('statusAdd'))
      <div class="alert alert-primary alert-dismissible show fade">
          <div class="alert-body">
            <button type="button" class="close" data-dismiss="alert">
                <span>x</span>
            </button>
            <strong>{{ session('statusAdd') }}</strong>
          </div>
      </div>
          {{-- <h6 class="alert alert-primary alert-dismissible">{{ session('statusAdd') }}</h6> --}}
      @endif

      @if (session('statusUpdate'))
        <div class="alert alert-warning alert-dismissible show fade">
            <div class="alert-body">
            <button type="button" class="close" data-dismiss="alert">
                <span>x</span>
            </button>
            <strong>{{ session('statusUpdate') }}</strong>
            </div>
        </div>
          {{-- <h6 class="alert alert-warning">{{ session('statusUpdate') }}</h6> --}}
      @endif

      <div class="row">
          <div class="col-12">
              <div class="card">
                  @can('superadmin')
                  <div class="card-header">
                      <a href="/field/create" class="btn btn-primary">
                        Tambah Bidang Pelayanan
                    </a>
                </div>
                @endcan
                  <div class="card-body p-0">
                      <div class="table-responsive">
                          <table class="table table-striped table-md">
                              <tr>
                                  <th>No</th>
                                  <th>Nama Bidang Pelayanan</th>
                                  <th>Keterangan</th>
                                  @can('superadmin')
                                  <th>Aksi</th>
                                  @endcan
                              </tr>
                              @foreach ($fields as $field )
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $field->field_name }}</td>
                                    <td>{{ $field->field_description }}</td>
                                    <td>
                                        @can('superadmin')
                                        <a href="/field/{{ $field->id }}/edit" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                        <a href=# class="btn btn-danger field-delete" data-id="{{ $field->id }}"><i class="fas fa-trash"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                          </table>
                      </div>
                  </div>
                  <div class="d-flex justify-content-center">{{ $fields->links() }} </div>
              </div>
          </div>
      </div>
  </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
        
    <script>
        $('.field-delete').click( function(){
        var dataID = $(this).attr('data-id');
        Swal.fire({
            title: 'Konfirmasi Penghapusan',
            text: 'Yakin akan menghapus?',
            showCancelButton: true,
            cancelButtonText: 'Tidak',
            confirmButtonText: 'Ya',
            icon: 'warning',
            })
            .then((result) => {
                if(result.isConfirmed){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "DELETE",
                        url: "/field/"+dataID+"",
                        success: function(response){
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Berhasil dihapus',
                                showConfirmButton: false,
                                timer: 1000
                            }).then(function(){
                                location.reload()
                            },2000)
                        }
                    })
                }
            })
        })

    </script>

</section>

@endsection
