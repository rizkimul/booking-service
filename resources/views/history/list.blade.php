@extends('layouts.layouts_main')

@section("container")
<section class="section">
    <div class="section-header">
        <h1>Riwayat Booking</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/#">{{ $title }}</a></div>
            <div class="breadcrumb-item">Riwayat Booking</div>
        </div>
    </div>

    <div class="section-body">

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
                    <div class="card-header">
                        <a href="/books/create" class="btn btn-primary">
                            Booking Pelayanan
                        </a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-md text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Pelayanan</th>
                                    {{-- <th>Nama Peminjam</th> --}}
                                    <th>Tanggal Booking</th>
                                    <th>Status</th>
                                    <th>Ket Booking</th>
                                </tr>
                                @foreach ($rents as $rent)
                                <tr>
                                    <td>{{ $rents->firstItem() + $loop->index }}</td>
                                    <td>{{ $rent->service->service_name }}</td>
                                    <td>{{ $rent->book_date }}</td>
                                    @if ($rent->status == 'Accept')
                                    <td class="badge badge-success mt-2">{{ $rent->status }}</td>
                                    @elseif($rent->status == 'Reject')
                                    <td class="badge badge-danger mt-2">{{ $rent->status }}</td>
                                    @elseif($rent->status == 'Pending')
                                    <td class="badge badge-warning mt-2">{{ $rent->status }}</td>
                                    @endif
                                    <td>{{ $rent->keterangan }}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">{{ $rents->links() }}</div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection