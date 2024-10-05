@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">
            Dashboard 
          </div>
          <h2 class="page-title">
            Presensi {{ date('d-m-Y', strtotime(date('Y-m-d')))}}
          </h2>
        </div>
        <!-- Page title actions -->
      </div>
    </div>
  </div>
  <div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-success text-white icon-circle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-fingerprint">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M18.9 7a8 8 0 0 1 1.1 5v1a6 6 0 0 0 .8 3"></path>
                                        <path d="M8 11a4 4 0 0 1 8 0v1a10 10 0 0 0 2 6"></path>
                                        <path d="M12 11v2a14 14 0 0 0 2.5 8"></path>
                                        <path d="M8 15a18 18 0 0 0 1.8 6"></path>
                                        <path d="M4.9 19a22 22 0 0 1 -.9 -7v-1a8 8 0 0 1 12 -6.95"></path>
                                    </svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="text-lg font-weight-bold">
                                    {{$rekappresensi->jmlhadir}}
                                </div>
                                <div class="text-secondary">
                                    Karyawan Hadir
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card Karyawan Izin -->
            <div class="col-md-6 col-xl-3">
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-info text-white icon-circle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-clipboard">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                                        <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                                    </svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="text-lg font-weight-bold">
                                    {{ $rekappresensi->jmlizin }}
                                </div>
                                <div class="text-secondary">
                                    Karyawan Izin
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card Karyawan Sakit -->
            <div class="col-md-6 col-xl-3">
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-warning text-white icon-circle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-report-medical">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                                        <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                                        <path d="M10 14l4 0"></path>
                                        <path d="M12 12l0 4"></path>
                                    </svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="text-lg font-weight-bold">
                                    {{ $rekappresensi->jmlsakit }}
                                </div>
                                <div class="text-secondary">
                                    Karyawan Sakit
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card Karyawan Cuti -->
            <div class="col-md-6 col-xl-3">
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-danger text-white icon-circle">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-backpack"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 18v-6a6 6 0 0 1 6 -6h2a6 6 0 0 1 6 6v6a3 3 0 0 1 -3 3h-8a3 3 0 0 1 -3 -3z" /><path d="M10 6v-1a2 2 0 1 1 4 0v1" /><path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" /><path d="M11 10h2" /></svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="text-lg font-weight-bold">
                                    {{ $rekappresensi->jmlcuti }}
                                </div>
                                <div class="text-secondary">
                                    Karyawan Cuti
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p>
                <!-- Card Karyawan terlambat -->
            <div class="col-md-6 col-xl-3">
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-danger text-white icon-circle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-alarm">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                        <path d="M12 10l0 3l2 0"></path>
                                        <path d="M7 4l-2.75 2"></path>
                                        <path d="M17 4l2.75 2"></path>
                                    </svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="text-lg font-weight-bold">
                                    {{ $rekappresensi->jmlterlambat }}
                                </div>
                                <div class="text-secondary">
                                    Karyawan Terlambat
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </p>
            
        </div>        
    </div>
  </div>
<style>
    .card-stats {
    border: none;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
}

.card-stats:hover {
    transform: translateY(-5px);
}

.icon-circle {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-right: 10px;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
}

.text-lg {
    font-size: 1.5rem;
    font-weight: bold;
    color: #333;
}

.text-secondary {
    color: #666;
    font-size: 0.9rem;
}

@media (max-width: 768px) {
    .icon-circle {
        width: 40px;
        height: 40px;
    }

    .text-lg {
        font-size: 1.2rem;
    }
}

@media (max-width: 576px) {
    .icon-circle {
        width: 35px;
        height: 35px;
    }

    .text-lg {
        font-size: 1rem;
    }
}

</style>
@endsection