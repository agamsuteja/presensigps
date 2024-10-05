@extends('layouts.presensi')
@section('content')
<style>
    .logout{
        position: absolute;
        color: #ff8100;
        font-size: 30px;
        text-decoration: none;
        right: 3px;
    }

    .logout:hover{
        color: #0f0f0f;
    }

    
    .circle-card {
    position: relative;
    width: 70px;
    height: 70px;
    margin: 20px auto;
    background-color: #f0f0f0;
    border-radius: 50%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow untuk efek elegan */
    transition: transform 0.3s ease; /* Animasi saat hover */
    padding: 1px;
    }

    .circle-card:hover {
        transform: scale(1.1); /* Perbesar saat hover */
    }

    .icon {
        font-size: 40px; /* Ukuran icon yang lebih besar */
        color: #219ebc; /* Warna icon */
        line-height: 80px; /* Agar icon berada di tengah */
    }

    .label {
        font-size: 0.75rem;
        margin-top: 5px;
        color: #333;
    }

    .badge-custom {
        position: absolute;
        top: -10px; /* Jarak badge dari atas */
        right: -10px; /* Jarak badge dari kanan */
        font-size: 0.75rem;
        border-radius: 50%;
        padding: 5px 10px;
        background-color: #ff5722; /* Warna latar belakang badge */
        color: white; /* Warna teks badge */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Efek bayangan pada badge */
    }

    @media (max-width: 768px) {
        .circle-card {
        width: 70px;
        height: 70px;
        }

        .icon {
            font-size: 30px;
        }

        .badge-custom {
            font-size: 0.65rem;
        }
    }

    @media (max-width: 480px) {
        .circle-card {
            width: 60px;
            height: 60px;
        }

        .icon {
            font-size: 25px;
        }

        .badge-custom {
            font-size: 0.6rem;
        }
    }


    /* Card pada halaman sudah/belum absen */
    .presence-card {
        background-color: #f4f4f4;
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        transition: box-shadow 0.3s ease;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .presence-card:hover {
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .card-body {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    /* Content Layout */
    .presencecontent {
        display: flex;
        align-items: center;
    }

    .iconpresence {
        /* background-color: #ff9800;
        color: white; */
        border-radius: 50%;
        padding: 10px;
        margin-right: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .iconpresence ion-icon {
        font-size: 24px;
    }

    /* Image Styling */
    .imaged {
        width: 64px;
        height: 64px;
        object-fit: cover;
        border-radius: 50%;
    }

    /* Text Styling */
    .presencetitle {
        font-size: 22px;
        font-weight: bold;
        margin: 4;
        color: #333;
        font-family: "Figtree", sans-serif; /* Tambahkan font-family di sini */
    }

    .presencedetail span {
        color: #0f0f0f;
        font-size: 15px;
        font-weight: normal;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .col-6 {
            flex: 0 0 100%;
            max-width: 100%;
            margin-bottom: 8px;
        }
    }

    #rekappresensi {
    margin-bottom: 100px; /* Menambahkan jarak antara rekap presensi dan elemen di bawahnya */
    }

    .circle-card {
    position: relative;
    width: 50px; /* Ukuran lingkaran yang lebih besar */
    height: 50px;
    margin: -8px auto;
    background-color: #f0f0f0;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Efek bayangan */
    transition: transform 0.3s ease;
    }

    h3 {
        font-size: 14px;
        font-weight: bold;
        font-family: "Figtree", sans-serif; /* Tambahkan font-family di sini */
    }

    .icon {
        font-size: 36px;
        color: #ff9800; /* Warna ikon */
    }

    /*untuk user*/
    #user-detail {
        display: flex;
        align-items: center;
        gap: 40px;
        background-color: #e1e1e1;
        padding: 26px;
        border-radius: 31px;
        box-shadow: 0 200px 200px #ff8100;
    }

    .avatar {
        flex-shrink: 0;
    }

    #user-detail .avatar img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 0px solid #ff8100;
        box-shadow: 0 1px 11px #ff8100;
    }
    #user-info h2 {
        font-size: 24px;
        font-weight: bold;
        font-family: "Figtree", sans-serif; /* Tambahkan font-family di sini */
    }

    #user-info #user-role {
        font-size: 18px;
        color: #777;
        margin-bottom: 10px;
        display: block;
    }

    #user-info #user-nik {
        font-size: 16px;
        color: #555;
        font-weight: 500;
    }


    .nav-tabs .nav-item .nav-link {
    display: flex;
    align-items: center;
    padding: 10px 15px;
    font-size: 16px;
    font-weight: bold;
    color: #333; /* Warna teks */
    background-color: #f8f9fa; /* Warna background tombol */
    border-radius: 8px; /* Membuat sudut tombol melengkung */
    transition: background-color 0.3s ease, color 0.3s ease;
    }

    .nav-tabs .nav-item .nav-link:hover {
        background-color: #ff8100; /* Warna saat hover */
        color: #fff;
    }

    .nav-tabs .nav-item .nav-link svg {
        margin-right: 8px; /* Jarak antara ikon dan teks */
        color: #0f0f0f; /* Warna ikon */
        transition: color 0.3s ease;
    }

    .nav-tabs .nav-item .nav-link:hover svg {
        color: #fff; /* Ubah warna ikon saat hover */
    }

    .leaderboard {
    margin-top: 20px; /* Atur jarak leaderboard dengan elemen lain */
    }

    .presence-card .card-body {
    padding: 17px; /* Padding hanya untuk card presensi */
    }


</style>

    <!-- App Capsule -->
    <div id="appCapsule">
        <div class="section" id="user-section">
            <a href="/proseslogout" class="logout">
                <ion-icon name="log-out-outline"></ion-icon>
            </a>
            {{-- <div id="user-detail">
                <div class="avatar">
                    @if (!empty(Auth::guard('karyawan')->user()->foto))
                    @php
                        $path = Storage::url('uploads/karyawan/'.Auth::guard('karyawan')->user()->foto);
                    @endphp
                     <img src="{{url($path)}}" alt="avatar" class="imaged w64" style="height: 60px">
                    @else
                    <img src="assets/img/sample/avatar/avatar1.jpg" alt="avatar" class="imaged w64 rounded">
                    @endif
                    
                </div>
                <div id="user-info">
                    <h2 id="user-name">{{ Auth::guard('karyawan')->user()->nama_lengkap }}</h2>
                    <span id="user-role">{{ Auth::guard('karyawan')->user()->jabatan }}</span>
                    <span>
                        <h3 id="user-name">NIK : {{ Auth::guard('karyawan')->user()->nik }}</h3> 
                    </span>
                </div>
            </div> --}}
            <div id="user-detail">
                <div class="avatar">
                    @if (!empty(Auth::guard('karyawan')->user()->foto))
                    @php
                        $path = Storage::url('uploads/karyawan/'.Auth::guard('karyawan')->user()->foto);
                    @endphp
                    <img src="{{ url($path) }}" alt="avatar" class="imaged">
                    @else
                    <img src="assets/img/sample/avatar/avatar1.jpg" alt="avatar" class="imaged">
                    @endif
                </div>
                <div id="user-info">
                    <h2 id="user-name">{{ Auth::guard('karyawan')->user()->nama_lengkap }}</h2>
                    <span id="user-role">{{ Auth::guard('karyawan')->user()->jabatan }}</span>
                    <span id="user-nik">NIK : {{ Auth::guard('karyawan')->user()->nik }}</span>
                </div>
            </div>
        </div>
        {{-- <h3 style="font-size: 12px; font-weight:500;">Rekap Presensi Bulan {{ $namabulan[$bulanini]}} Tahun {{ $tahunini}} </h3> --}}
        
        <div class="section mt-2" id="presence-section">
            
            <div class="todaypresence">
                <div class="row">
                    <!-- Card Masuk -->
                    <div class="col-6">
                        <div class="card presence-card">
                            <div class="card-body">
                                <div class="presencecontent">
                                    <div class="iconpresence">
                                        @if ($presensihariini != null)
                                            @php
                                                $path = Storage::url('uploads/absensi/'.$presensihariini->foto_in);
                                            @endphp
                                            <img src="{{ url($path) }}" alt="Foto Masuk" class="imaged w64">
                                        @else
                                            <ion-icon name="camera"></ion-icon>
                                        @endif
                                    </div>
                                    <div class="presencedetail">
                                        <h4 class="presencetitle">Masuk</h4>
                                        <span>{{ $presensihariini != null ? $presensihariini->jam_in : 'Belum Absen' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <!-- Card Pulang -->
                    <div class="col-6">
                        <div class="card presence-card">
                            <div class="card-body">
                                <div class="presencecontent">
                                    <div class="iconpresence">
                                        @if ($presensihariini != null && $presensihariini->jam_out != null)
                                            @php
                                                $path = Storage::url('uploads/absensi/'.$presensihariini->foto_out);
                                            @endphp
                                            <img src="{{ url($path) }}" alt="Foto Pulang" class="imaged w64">
                                        @else
                                            <ion-icon name="camera"></ion-icon>
                                        @endif
                                    </div>
                                    <div class="presencedetail">
                                        <h4 class="presencetitle">Pulang</h4>
                                        <span>{{ $presensihariini != null && $presensihariini->jam_out != null ? $presensihariini->jam_out : 'Belum Absen' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

            <div id="rekappresensi">
                <div class="row text-center">
                    <div class="col-2 offset-1">
                        <div class="circle-card">
                            <span class="badge bg-danger badge-custom">{{ $rekappresensi->jmlhadir }}</span>
                            <ion-icon name="hand-left-outline" class="icon"></ion-icon>
                            
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="circle-card">
                            <span class="badge bg-danger badge-custom">{{ $rekappresensi->jmlizin }}</span>
                            <ion-icon name="newspaper-outline" class="icon"></ion-icon>
                           
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="circle-card">
                            <span class="badge bg-danger badge-custom">{{ $rekappresensi->jmlsakit }}</span>
                            <ion-icon name="medkit-outline" class="icon"></ion-icon>
                            
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="circle-card">
                            <span class="badge bg-danger badge-custom">{{ $rekappresensi->jmlcuti }}</span>
                            <ion-icon name="briefcase-outline" class="icon"></ion-icon>
                            
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="circle-card">
                            <span class="badge bg-danger badge-custom">{{ $rekappresensi->jmlterlambat }}</span>
                            <ion-icon name="alarm-outline" class="icon"></ion-icon>
                            
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            
            
            <div class="presencetab mt-2">
                <div class="tab-pane fade show active" id="pilled" role="tabpanel">
                    <ul class="nav nav-tabs style1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                                <!-- Icon SVG atau bisa juga gunakan icon dari FontAwesome -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-trophy">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M8 21l8 0" />
                                    <path d="M12 17l0 4" />
                                    <path d="M7 4l10 0" />
                                    <path d="M17 4a3 3 0 0 1 0 6a5 5 0 0 1 -10 0a3 3 0 0 1 0 -6" />
                                    <path d="M6 10l1 2l1.5 -1.5" />
                                    <path d="M18 10l-1 2l-1.5 -1.5" />
                                </svg>
                                Leaderboard
                            </a>
                        </li>
                    </ul>
                </div>
                
                <div class="tab-content mt-2" style="margin-bottom:100px;">
                    <div class="tab-pane fade show active" id="home" role="tabpanel">
                        <!--
                        <ul class="listview image-listview">
                            @foreach ($historibulanini as $d )
                            @php
                                $path = Storage::url('uploads/absensi/' .$d->foto_in);
                            @endphp
    
                            @endforeach
                           
                            
                        </ul>
                        -->
                        <style>
                            .historicontent{
                                display: flex;
                            }

                            .datapresensi{
                                margin-left: 10px;
                                
                            }
                        </style>

                   
                    
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel">
                        <ul class="listview image-listview">
                            @foreach ($leaderboard as $d)
                            <li>
                                <div class="item">
                                    <img src="assets/img/sample/avatar/avatar1.jpg" alt="image" class="image">
                                    <div class="in">
                                        <div>
                                            <b>{{ $d->nama_lengkap}}</b>
                                            <br>
                                            <small class="text-muted"> {{ $d->jabatan}}</small>
                                        </div>
                                        <span class="badge {{ $d->jam_in < "08:00" ? "bg-success" : "bg-danger" }}">
                                            {{ $d->jam_in}}
                                        </span>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                          

                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- * App Capsule -->

@endsection