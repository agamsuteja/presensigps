@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <h2 class="page-title">
            Data Hari Libur
          </h2>
        </div>
        <!-- Page title actions -->
      </div>
    </div>
</div>
  <div class="page-body">
    <div class="container xl">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                @if (Session::get('success'))
                                    <div class="alert alert-success">
                                        
                                        {{Session::get('success')}}
                                        
                                    </div>
                                @endif

                                @if (Session::get('warning'))
                                    <div class="alert alert-warning">
                                    
                                        {{Session::get('warning')}}
                                        
                                    </div>
                                @endif
                            </div>
                        </div>
                        @role('administrator','user')
                        <div class="row">
                            <div class="col-12">
                                <a href="#" class="btn btn-primary" id="btnHarilibur">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                    Tambah Data</a>
                            </div>
                        </div>
                        @endrole
                        <br>
                        <div class="row">
                            <div class="col-12">
                                {{-- <form action="/karyawan" method="GET">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control" placeholder="Nama Karyawan" value="{{ request()->nama_karyawan }}">
                                            </div>
                                        </div>
                                        
                                        <div class="col-2">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"/>
                                                        <path d="M21 21l-6 -6"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form> --}}
                            </div>
                        </div>
                        <br>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Libur</th>
                                    <th>Tanggal Libur</th>
                                    <th>Group</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($harilibur as $d)
                                   <tr>
                                    <td>{{$loop->iteration + $harilibur->firstItem() - 1 }}</td>
                                    <td>{{$d->kode_libur}}</td>
                                    <td>{{date('d-m-Y',strtotime($d->tanggal_libur))}}</td>
                                    <td>{{$d->kode_dept}}</td>
                                    <td>{{$d->keterangan}}</td>
                                    <td>
                                        <div class="btn group">
                                            <a href="#" class="edit" kode_libur="{{$d->kode_libur}}">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                            </a>
                                        </div>

                                        <div class="btn group">
                                            <a href="/konfigurasi/harilibur/{{ $d->kode_libur }}/setkaryawanlibur" class="">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-cog"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 21h-6a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v5" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M19.001 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M19.001 15.5v1.5" /><path d="M19.001 21v1.5" /><path d="M22.032 17.25l-1.299 .75" /><path d="M17.27 20l-1.3 .75" /><path d="M15.97 17.25l1.3 .75" /><path d="M20.733 20l1.3 .75" /></svg>
                                            </a>
                                        </div>

                                        <div class="btn group">     
                                            <form action="/konfigurasi/harilibur/{{$d->kode_libur}}/delete" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm delete-confirm">
                                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <path d="M4 7l16 0" />
                                                        <path d="M10 11l0 6" />
                                                        <path d="M14 11l0 6" />
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                   </tr>
                               @endforeach
                            </tbody>
                        </table>
                        {{-- {{$karyawan->links('vendor.pagination.bootstrap-5')}} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modal-createlibur" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Input Data Libur</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="loadcreatelibur">
           
        </div>
      </div>
    </div>
  </div>
  <div class="modal modal-blur fade" id="modal-editlibur" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Data Hari Libur</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="loadeditlibur">
           
        </div>
      </div>
    </div>
  </div>
  
@endsection
@push('mysript')
    <script>
        $(function(){
            // Menampilkan modal input libur
            $("#btnHarilibur").click(function(){
                $("#modal-createlibur").modal("show");
                $("#loadcreatelibur").load('/konfigurasi/harilibur/create')
            });

            // Menampilkan modal edit karyawan
            $(".edit").click(function(){
                var kode_libur = $(this).attr('kode_libur');
                $.ajax({
                    type: 'POST',
                    url:'/konfigurasi/harilibur/edit',
                    cache: false,
                    data: {
                        _token: "{{ csrf_token() }}",
                        kode_libur: kode_libur
                    },
                    success: function(respond){
                        $("#loadeditlibur").html(respond);
                    },
                });

                    $("#modal-editlibur").modal("show");
            });

            $(".delete-confirm").click(function(e){
                var form = $(this).closest('form');
                e.preventDefault();
                Swal.fire({
                    title: "Apakah Anda Yakin Data Akan Di Hapus",
                    text: "Jika YA Maka Data Akan Terhapus Permanen",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire({
                        title: "Deleted!",
                        text: "Data Berhasil Di Hapus",
                        icon: "success"
                        });
                    }
                    });
            });
        });

    </script>
@endpush