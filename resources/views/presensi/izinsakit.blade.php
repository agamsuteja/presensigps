@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
    <div class="row g-2 align-items-center">
        <div class="col">
        <!-- Page pre-title -->
        <h2 class="page-title">
            Data Izin / Sakit
        </h2>
        </div>
        <!-- Page title actions -->
    </div>
    </div>
</div>
<style>
        .custom-btn {
        padding: 5px 10px; /* Atur padding sesuai kebutuhan */
        font-size: 1.5rem; /* Atur ukuran teks jika diperlukan */
    }

    .custom-btn svg {
        width: 32px; /* Atur ukuran ikon sesuai kebutuhan */
        height: 32px; /* Atur ukuran ikon sesuai kebutuhan */
    }

</style>
<div class="page-body">
    <div class="container xl">
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
        <div class="row">
            <div class="col-12">
                <form action="/presensi/izinsakit" method="GET" autocomplete="off">
                    <div class="row">
                        <div class="col-6">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-month"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M7 14h.013" /><path d="M10.01 14h.005" /><path d="M13.01 14h.005" /><path d="M16.015 14h.005" /><path d="M13.015 17h.005" /><path d="M7.01 17h.005" /><path d="M10.01 17h.005" /></svg>
                                </span>
                                <input type="text" value="{{ Request('dari') }}" id="dari" class="form-control" name="dari" placeholder="Dari">
                              </div>
                        </div>
                        <div class="col-6">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-month"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M7 14h.013" /><path d="M10.01 14h.005" /><path d="M13.01 14h.005" /><path d="M16.015 14h.005" /><path d="M13.015 17h.005" /><path d="M7.01 17h.005" /><path d="M10.01 17h.005" /></svg>
                                </span>
                                <input type="text" value="{{ Request('sampai') }}" id="sampai" class="form-control" name="sampai" placeholder="Sampai">
                              </div>
                        </div>
                        <div class="col-3">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-barcode"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7v-1a2 2 0 0 1 2 -2h2" /><path d="M4 17v1a2 2 0 0 0 2 2h2" /><path d="M16 4h2a2 2 0 0 1 2 2v1" /><path d="M16 20h2a2 2 0 0 0 2 -2v-1" /><path d="M5 11h1v2h-1z" /><path d="M10 11l0 2" /><path d="M14 11h1v2h-1z" /><path d="M19 11l0 2" /></svg>
                                </span>
                                <input type="text" value="{{Request('nik')}}" id="nik" class="form-control" name="nik" placeholder="Nik">
                              </div>
                        </div>
                        <div class="col-3">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user-hexagon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 13a3 3 0 1 0 0 -6a3 3 0 0 0 0 6z" /><path d="M6.201 18.744a4 4 0 0 1 3.799 -2.744h4a4 4 0 0 1 3.798 2.741" /><path d="M19.875 6.27c.7 .398 1.13 1.143 1.125 1.948v7.284c0 .809 -.443 1.555 -1.158 1.948l-6.75 4.27a2.269 2.269 0 0 1 -2.184 0l-6.75 -4.27a2.225 2.225 0 0 1 -1.158 -1.948v-7.285c0 -.809 .443 -1.554 1.158 -1.947l6.75 -3.98a2.33 2.33 0 0 1 2.25 0l6.75 3.98h-.033z" /></svg>
                                </span>
                                <input type="text" value="{{Request('nama_lengkap')}}" id="nama_lengkap" class="form-control" name="nama_lengkap" placeholder="Nama Karyawan">
                              </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <select name="status_approved" id="status_approved" class="form-select">
                                    <option value="">Pilih Status</option>
                                    <option value="1">DISETUJUI</option>
                                    <option value="2">DITOLAK</option>
                                    <option value="0">MENUNGGU PERSETUJUAN</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <button class="btn btn-sl btn-primary" type="submit">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                                    CARI DATA</button>
                            </div>
                        </div>
                    </div>
                   
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Izin</th>
                            <th>Tanggal</th>
                            <th>Nik</th>
                            <th>Nama Karyawan</th>
                            <th>Jabatan</th>
                            <th>Status</th>
                            <th>
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-paperclip"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 7l-6.5 6.5a1.5 1.5 0 0 0 3 3l6.5 -6.5a3 3 0 0 0 -6 -6l-6.5 6.5a4.5 4.5 0 0 0 9 9l6.5 -6.5" /></svg>
                            </th>
                            <th>Keterangan</th>
                            <th>Status Approve</th>
                            <th>Aksi</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($izinsakit as $d)
                            @php
                                $path = Storage::url('uploads/sid/' . $d->doc_sid);
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->kode_izin }}</td>
                                <td>
                                    {{ date('d-m-Y',strtotime($d->tgl_izin_dari)) }} s/d  {{ date('d-m-Y',strtotime($d->tgl_izin_sampai)) }}
                                </td>
                                <td>{{ $d->nik }}</td>
                                <td>{{ $d->nama_lengkap }}</td>
                                <td>{{ $d->jabatan }}</td>
                                <td>{{ $d->status == "i" ? "izin" : "sakit"}}</td>
                                <td>
                                    <a href="{{url($path)}}" target="_blank">
                                        {{$d->doc_sid}}
                                       
                                    </a>
                                </td>
                                <td>{{ $d->keterangan }}</td>
                                <td>
                                    @if ($d->status_approved==1)
                                        <span class="badge bg-success">DISETUJUI</span>
                                        @elseif ($d->status_approved==2)
                                        <span class="badge bg-danger">DITOLAK</span>
                                        @else
                                        <span class="badge bg-warning">MENUNGGU PERSETUJUAN</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($d->status_approved==0)
                                    <a href="#" class="btn btn-primary custom-btn approve"  kode_izin="{{ $d->kode_izin }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-check">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M5 12l5 5l10 -10"/>
                                        </svg>
                                    </a>
                                    
                                    @else
                                        <a href="/presensi/{{ $d->kode_izin }}/batalkanizinsakit" class="btn btn-sm btn-danger">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-letter-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M10 8l4 8" /><path d="M10 16l4 -8" /></svg>
                                            Batalkan
                                        </a>
                                    @endif
                                   
                                </td> 
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$izinsakit->links('vendor.pagination.bootstrap-5')}}
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modal-izinSakit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Izin/Sakit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           <form action="/presensi/approveizinsakit" method="POST">
            @csrf
            <input type="hidden" id="kode_izin_form" name="kode_izin_form">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <select name="status_approved" id="status_approved" class="form-select">
                            <option value="1">DISETUJUI</option>
                            <option value="2">DITOLAK</option>
                        </select>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <button class="btn btn-primary w-100" type="submit">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-send"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14l11 -11" /><path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" /></svg>
                                    Kirim
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           </form>
        </div>
      </div>
    </div>
</div>

@endsection

@push('mysript')
    <script>
        $(function(){
            $(".approve").click(function(e){
                e.preventDefault();
                var kode_izin = $(this).attr("kode_izin");
                $("#kode_izin_form").val(kode_izin);
                $("#modal-izinSakit").modal("show");
            });

            $("#dari,#sampai").datepicker({ 
                autoclose: true, 
                todayHighlight: true,
                format: 'yyyy-mm-dd',
            });


        });
    </script>
    
@endpush