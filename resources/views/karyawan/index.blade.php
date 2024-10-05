@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <h2 class="page-title">
            Data Karyawan
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
                                <a href="#" class="btn btn-primary" id="btnTambahkaryawan">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                    Tambah Data</a>
                            </div>
                        </div>
                        @endrole
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <form action="/karyawan" method="GET">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control" placeholder="Nama Karyawan" value="{{ request()->nama_karyawan }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <select name="kode_dept" id="kode_dept" class="form-select">
                                                    <option value="">Group</option>
                                                    @foreach ($departemen as $d)
                                                        <option value="{{ $d->kode_dept }}" {{ request()->kode_dept == $d->kode_dept ? 'selected' : '' }}>
                                                            {{ $d->nama_dept }}
                                                        </option>
                                                    @endforeach
                                                </select>
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
                                </form>
                                
                            </div>
                        </div>
                        <br>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nik</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jabatan</th>
                                    <th>No Handphone</th>
                                    <th>foto</th>
                                    <th>Group</th>
                                    <th>Location</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($karyawan as $d )
                                @php
                                    $path = Storage::url('uploads/karyawan/'.$d->foto);
                                @endphp
                                <tr>
                                    <td>{{$loop->iteration + $karyawan->firstItem()-1}}</td>
                                    <td>{{$d->nik}}</td>
                                    <td>{{$d->nama_lengkap}}</td>
                                    <td>{{$d->jabatan}}</td>
                                    <td>{{$d->no_hp}}</td>
                                    <td>
                                        @if (empty($d->foto))
                                        <img src="{{asset('assets/img/avatar.png')}}" class="avatar" alt="">
                                        @else
                                        <img src="{{url($path)}}" class="avatar" alt="">
                                        @endif
                                       
                                    </td>
                                    <td>{{$d->nama_dept}}</td>
                                    <td class="text-center">
                                        @if ($d->status_location==1)
                                            <a href="/karyawan/{{ $d->nik }}/lockandunlocklocation">
                                                <span class="badge bg-danger bg-sm">
                                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-lock"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" /><path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" /><path d="M8 11v-4a4 4 0 1 1 8 0v4" /></svg>
                                                </span>
                                            </a>
                                        @else
                                            <a href="/karyawan/{{ $d->nik }}/lockandunlocklocation">
                                                <span class="badge bg-success bg-sm">
                                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-lock-open"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 11m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" /><path d="M12 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M8 11v-5a4 4 0 0 1 8 0" /></svg>
                                                </span>
                                            </a>
                                        @endif
                                    </td>
                                    
                                    <td>
                                        @role('administrator','user')
                                        <div class="btn group">
                                            <a href="#" class="edit" nik="{{$d->nik}}">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                            </a>
                                        </div>
                                        @endrole

                                        <div class="btn group">
                                            <a href="/konfigurasi/{{ $d->nik }}/setjamkerja" class="">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-settings-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.875 6.27a2.225 2.225 0 0 1 1.125 1.948v7.284c0 .809 -.443 1.555 -1.158 1.948l-6.75 4.27a2.269 2.269 0 0 1 -2.184 0l-6.75 -4.27a2.225 2.225 0 0 1 -1.158 -1.948v-7.285c0 -.809 .443 -1.554 1.158 -1.947l6.75 -3.98a2.33 2.33 0 0 1 2.25 0l6.75 3.98h-.033z" /><path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /></svg>
                                            </a>
                                        </div>

                                        @role('administrator','user')
                                        <div class="btn group">
                                            <a href="/karyawan/{{ Crypt::encrypt($d->nik)}}/resetpassword" class="">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-key"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14.52 2c1.029 0 2.015 .409 2.742 1.136l3.602 3.602a3.877 3.877 0 0 1 0 5.483l-2.643 2.643a3.88 3.88 0 0 1 -4.941 .452l-.105 -.078l-5.882 5.883a3 3 0 0 1 -1.68 .843l-.22 .027l-.221 .009h-1.172c-1.014 0 -1.867 -.759 -1.991 -1.823l-.009 -.177v-1.172c0 -.704 .248 -1.386 .73 -1.96l.149 -.161l.414 -.414a1 1 0 0 1 .707 -.293h1v-1a1 1 0 0 1 .883 -.993l.117 -.007h1v-1a1 1 0 0 1 .206 -.608l.087 -.1l1.468 -1.469l-.076 -.103a3.9 3.9 0 0 1 -.678 -1.963l-.007 -.236c0 -1.029 .409 -2.015 1.136 -2.742l2.643 -2.643a3.88 3.88 0 0 1 2.741 -1.136m.495 5h-.02a2 2 0 1 0 0 4h.02a2 2 0 1 0 0 -4" /></svg>
                                                
                                            </a>
                                        </div>
                                        @endrole
                                        
                                        @role('administrator','user')
                                        <div class="btn group">     
                                           
                                            <form action="{{ route('karyawan.delete', $d->nik) }}" method="POST">
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
                                        @endrole
                                       
                                    </td>
        
                                </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                        {{$karyawan->links('vendor.pagination.bootstrap-5')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modal-inputkaryawan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data Karyawan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/karyawan/store" method="POST" id="frmKaryawan" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="input-icon mb-3">
                            <span class="input-icon-addon">
                              <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  
                              class="icon icon-tabler icons-tabler-outline icon-tabler-barcode"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7v-1a2 2 0 0 1 2 -2h2" /><path d="M4 17v1a2 2 0 0 0 2 2h2" /><path d="M16 4h2a2 2 0 0 1 2 2v1" /><path d="M16 20h2a2 2 0 0 0 2 -2v-1" /><path d="M5 11h1v2h-1z" /><path d="M10 11l0 2" /><path d="M14 11h1v2h-1z" /><path d="M19 11l0 2" /></svg>
                            </span>
                            <input type="text" maxlength="5" value="" id="nik" class="form-control" name="nik" placeholder="NIK">
                          </div>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-12">
                        <div class="input-icon mb-3">
                            <span class="input-icon-addon">
                              <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M16 19h6" /><path d="M19 16v6" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4" /></svg>
                            </span>
                            <input type="text" value="" id="nama_lengkap" class="form-control" name="nama_lengkap" placeholder="Nama Karyawan">
                          </div>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-12">
                        <div class="input-icon mb-3">
                            <span class="input-icon-addon">
                              <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-briefcase-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 9a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9z" /><path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2" /></svg>
                            </span>
                            <input type="text" value="" id="jabatan" class="form-control" name="jabatan" placeholder="Jabatan">
                          </div>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-12">
                        <div class="input-icon mb-3">
                            <span class="input-icon-addon">
                              <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-phone"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" /></svg>
                            </span>
                            <input type="text" value="" id="no_hp" class="form-control" name="no_hp" placeholder="No Handphone">
                          </div>
                    </div>
                 </div>
                    <div class="row mt-12">
                        <div class="col-12">
                            <div class="form-label">Upload Foto</div>
                                <input type="file" name="foto" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <select name="kode_dept" id="kode_dept" class="form-select">
                                <option value="">Group</option>
                                @foreach ($departemen as $d)
                                    <option value="{{ $d->kode_dept }}" {{ request()->kode_dept == $d->kode_dept ? 'selected' : '' }}>
                                        {{ $d->nama_dept }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="form-group">
                                <button class="btn btn-primary w-100">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                    Simpan</button>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
      </div>
    </div>
  </div>

{{--modal edit--}}
  <div class="modal modal-blur fade" id="modal-editkaryawan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Data Karyawan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="loadeditform">
           
        </div>
      </div>
    </div>
  </div>
  
@endsection

@push('mysript')
<script>
    $(function(){
        // Menampilkan modal input karyawan
        $("#btnTambahkaryawan").click(function(){
            $("#modal-inputkaryawan").modal("show");
        });

        // Menampilkan modal edit karyawan
        $(".edit").click(function(){
            var nik = $(this).attr('nik');
            $.ajax({
                type: 'POST',
                url:'/karyawan/edit',
                cache: false,
                data: {
                    _token: "{{ csrf_token() }}",
                    nik: nik
                },
                success: function(respond){
                    $("#loadeditform").html(respond);
                    $("#modal-editkaryawan").modal("show");
                },
                error: function(xhr){
                    console.error(xhr.responseText); // Untuk debugging
                }
            });
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

        // Validasi form karyawan
        $("#frmKaryawan").submit(function(){
            var nik = $("#nik").val();
            var nama_lengkap = $("#nama_lengkap").val();
            var jabatan = $("#jabatan").val();
            var no_hp = $("#no_hp").val();
            var kode_dept = $("#kode_dept").val();

            if(nik == ""){
                Swal.fire({
                    title: 'Warning!',
                    text: 'Nik Harus Diisi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    $("#nik").focus();
                });
                return false;
            } else if(nama_lengkap == "") {
                Swal.fire({
                    title: 'Warning!',
                    text: 'Nama Harus Diisi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    $("#nama_lengkap").focus();
                });
                return false;
            } else if(jabatan == "") {
                Swal.fire({
                    title: 'Warning!',
                    text: 'Jabatan Harus Diisi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    $("#jabatan").focus();
                });
                return false;
            } else if(no_hp == "") {
                Swal.fire({
                    title: 'Warning!',
                    text: 'No Handphone Harus Diisi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    $("#no_hp").focus();
                });
                return false;
            } 
        });
    });
</script>
@endpush