@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <h2 class="page-title">
            Setting Jam Kerja
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
                <table class="table">
                    <tr>
                        <th>NIK</th>
                        <td>{{ $karyawan->nik}}</td>
                    </tr>
                    <tr>
                        <th>Nama Karyawan</th>
                        <td>{{ $karyawan->nama_lengkap}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <form action="/konfigurasi/updatesetjamkerja" method="POST">
                    @csrf
                    <input type="hidden" name="nik" value="{{ $karyawan->nik }}">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Hari</th>
                                <th>Jam Kerja</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($setjamkerja as $s )
                            <tr>
                                <td>
                                    {{ $s->hari }}
                                    <input type="hidden" name="hari[]" value=" {{ $s->hari }}" id="">
                                </td>
                                <td>
                                    <select name="kode_jam_kerja[]" id="kode_jam_kerja" class="form-select">
                                    <option value="">Pilih Jam Kerja</option>
                                    @foreach ($jamkerja as $d)
                                        <option {{ $d->kode_jam_kerja==$s->kode_jam_kerja ? 'selected' : ''}} value="{{ $d->kode_jam_kerja }}">{{ $d->nama_jam_kerja}}</option>
                                    @endforeach
                                    </select>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    <button class="btn btn-primary w-100">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-rotate"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.95 11a8 8 0 1 0 -.5 4m.5 5v-5h-5" /></svg>
                        Update
                    </button>
                </form>
            </div>
            <div class="col-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="6">Master Jam Kerja</th>
                        </tr>
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Awal</th>
                            <th>Jam Masuk</th>
                            <th>Akhir Jam Masuk</th>
                            <th>Jam Pulang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jamkerja as $d )
                            <tr>
                                <td>{{ $d->kode_jam_kerja}}</td>
                                <td>{{ $d->nama_jam_kerja}}</td>
                                <td>{{ $d->awal_jam_masuk}}</td>
                                <td>{{ $d->jam_masuk}}</td>
                                <td>{{ $d->akhir_jam_masuk}}</td>
                                <td>{{ $d->jam_pulang}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
@endsection