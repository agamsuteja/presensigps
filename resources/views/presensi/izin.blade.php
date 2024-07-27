@extends('layouts.presensi')
@section('header')
  <!-- App Header -->
  <div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
        <div class="pageTitle">Data Izin/Sakit</div>
        <div class="right"></div>
    </div>
<!-- * App Header -->
@endsection

@section('content')
<div class="container" style="margin-top:70px">
    @php
        $messagesuccess = Session::get('success');
        $messageerror = Session::get('error');
    @endphp
    @if ($messagesuccess)
        <div class="alert alert-success">
            {{ $messagesuccess }}
        </div>
    @endif
    @if ($messageerror)
        <div class="alert alert-danger">
            {{ $messageerror }}
        </div>
    @endif

    <div class="row">
        <div class="col">
            @foreach ($dataizin as $d)
                <ul class="listview image-listview">
                    <li>
                        <div class="item">
                            <div class="in">
                                <div>
                                    <b>{{ date("d-m-Y", strtotime($d->tgl_izin)) }} ({{ $d->status == "s" ? "Sakit" : "Izin" }})</b><br>
                                    <small class="text-muted">{{ $d->keterangan }}</small>
                                </div>
                                @if ($d->status_approved == 0)
                                    <span class="badge bg-warning">Menunggu</span>
                                @elseif ($d->status_approved == 1)
                                    <span class="badge bg-success">Disetujui</span>
                                @elseif ($d->status_approved == 2)
                                    <span class="badge bg-danger">Ditolak</span>
                                @endif
                            </div>
                        </div>
                    </li>
                </ul>
            @endforeach
        </div>
    </div>

   
    
    <div class="fab-button" style="position: fixed; bottom: 110px; right: 20px; z-index: 1000;">
        <a href="/presensi/buatizin"  style="display: flex; align-items: center; justify-content: center;">
            <ion-icon name="add-outline" style="font-size: 50px;"></ion-icon>
        </a>
    </div>
</div>
@endsection

      