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

    <style>
        .fab-button .dropdown-menu {
            display: none; /* Initially hide the dropdown */
            position: absolute;
            bottom: 60px; /* Adjust according to your needs */
            right: 0;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            z-index: 2000;
        }
        
        .fab-button .dropdown-menu.show {
            display: block; /* Show the dropdown when toggled */
        }

        .historicontent{
            display: flex;
            gap: 3px;

        }

        .datapresensi{
            margin-left: 10px;
            
        }

        .status{
            position: absolute;
            right: 5px;
        }
    </style>



    
        
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
                <form method="GET" action="/presensi/izin">
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <select name="bulan" id="bulan" class="form-control selecmaterialize">
                                    <option value="">Bulan</option>
                                    {{-- @for ($i = 1; $i| <= 12; $i++)
                                        <option value="{{ $i }}">{{ $namabulan[$i]}}</option>
                                    @endfor --}}
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option {{Request('bulan') == $i ? 'selected' : ''}} value="{{ $i }}">{{ $namabulan[$i] }}</option>
                                    @endfor

                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <select name="tahun" id="tahun" class="form-control selecmaterialize">
                                    <option value="">Tahun</option>
                                    @php
                                    $tahun_awal = 2022;
                                    $tahun_sekarang = date("Y");
                                    for ($t = $tahun_awal; $t <= $tahun_sekarang; $t++) {
                                        if (Request('tahun')==$t) {
                                            $selected = 'selected';
                                        }else{
                                            $selected = '';
                                        }
                                        echo "<option  $selected  value='$t'>$t</option>";
                                    }
                                @endphp
                                
                                            
                                </select>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-primary w-100">Cari Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    
    <div class="row" style="position:fixed; top:10; left:10; right:0; width:100%; margin:auto; overflow-y:auto; height:430px;">
        <div class="col">
            @foreach ($dataizin as $d)
            @php
                if ($d->status == "i" ) {
                    $status = "Izin";
                }elseif ($d->status == "s") {
                    $status = "Sakit";
                }elseif ($d->status == "c") {
                    $status = "Cuti";
                }else {
                    $status = "Tidak Ditemukan";
                }
            @endphp
                <div class="card mt-1 card_izin" kode_izin="{{ $d->kode_izin }}" status_approved="{{ $d->status_approved}}" data-toggle="modal" data-target="#actionSheetIconed">
                    <div class="card-body">
                        <div class="historicontent">
                            <div class="iconpresensi">
                                @if ($d->status=="i")
                                <ion-icon name="newspaper-outline" style="font-size:48px; color: #219ebc;"></ion-icon>
                                @elseif ($d->status=="s")
                                <ion-icon name="medkit-outline" style="font-size:48px; color: #219ebc;"></ion-icon>
                                @elseif ($d->status=="c")
                                <ion-icon name="calendar-outline" style="font-size:48px; color: #219ebc;"></ion-icon>
                                @endif
                                
                               
                            </div>
                            <div class="datapresensi">
                                <h3 style="line-height: 3px;">{{ date("d-m-Y",strtotime($d->tgl_izin_dari)) }} ({{ $status}})</h3>
                                <small>{{ date("d-m-Y",strtotime($d->tgl_izin_dari)) }} s/d {{ date("d-m-Y",strtotime($d->tgl_izin_sampai)) }}</small> 
                                <br>
                                <small>{{$d->keterangan}}</small>
                                <p>
                                    @if ($d->status=="c")
                                    <span class="badge" style="background-color: #219ebc; color: rgb(255, 255, 255);">{{ $d->nama_cuti }}</span>
                                    <br>
                                    @endif
                                    @if (!empty($d->doc_sid))
                                    <span style="color: #219ebc">
                                        <ion-icon name="attach-outline" style="font-size:25px"></ion-icon> Lihat SID
                                    </span>
                                    @endif
                                </p>
                            </div>
                           
                                <div class="status">
                                    @if ($d->status_approved == "0")
                                    <span class="badge bg-warning">Menunggu</span>
                                    @elseif ($d->status_approved == "1")
                                    <span class="badge bg-success">Disetujui</span>
                                    @elseif ($d->status_approved == "2")
                                    <span class="badge bg-danger">Ditolak</span>
                                    @endif
                                    <p style="margin-top:5px font-weight:bold">{{ hitunghari($d->tgl_izin_dari,$d->tgl_izin_sampai)}} Hari</p>
                                </div>
                        </div>  
                    </div>
                </div>
              
            @endforeach
        </div>
    </div>

    <div class="fab-button animate bottom-right dropdown" style="position: fixed; bottom: 250px; right: 20px; z-index: 1000;">
        <a href="#" class="fab bg-dark" data-toggle="dropdown">
            <ion-icon name="add-outline" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item bg-dark" href="/izinabsen">
                <ion-icon name="document-outline" role="img" class="md hydrated" aria-label="image outline"></ion-icon>
                <p>Izin Absen</p>
            </a>
            <a class="dropdown-item bg-dark" href="/izinsakit">
                <ion-icon name="medkit-outline" role="img" class="md hydrated" aria-label="videocam outline"></ion-icon>
                <p>Sakit</p>
            </a>
            <a class="dropdown-item bg-dark" href="/izincuti">
                <ion-icon name="document-outline" role="img" class="md hydrated" aria-label="videocam outline"></ion-icon>
                <p>Cuti</p>
            </a>
        </div>
    </div>
</div>

<div class="modal fade action-sheet" id="actionSheetIconed" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Aksi</h5>
            </div>
            <div class="modal-body" id="showact">
                 
             
            </div>
        </div>
    </div>
</div>
  
<div class="modal fade dialogbox" id="deleteConfirm" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Yakin Dihapus ?</h5>
            </div>
            <div class="modal-body">
                Data Pengajuan Izin Akan dihapus
            </div>
            <div class="modal-footer">
                <div class="btn-inline">
                    <a href="#" class="btn btn-text-secondary" data-dismiss="modal">Batalkan</a>
                    <a href="" class="btn btn-text-primary" id="hapuspengajuan">Hapus</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('myscript')
    <script>

        $(function(){
            $(".card_izin").click(function(e){
                var kode_izin = $(this).attr("kode_izin");
                var status_approved = $(this).attr("status_approved");

                if(status_approved == 1){
                    Swal.fire({
                        title: 'Waduh!',
                        text: 'Data Sudah Disetujui, Tidak Dapat Di Ubah!',
                        icon: 'error'
                    });
                } else {
                    // Memuat konten di dalam modal
                    $("#showact").load('/izin/' + kode_izin + '/showact', function() {
                        // Setelah konten dimuat, tampilkan modal
                        $('#actionSheetIconed').modal('show');
                    });
                }
            });
        });

        // $(function(){
        //     $(".card_izin").click(function(e){
        //         var kode_izin = $(this).attr("kode_izin");
        //         var status_approved = $(this).attr("status_approved");

        //         if(status_approved==1){
        //             Swal.fire({
        //             title: 'Waduh!',
        //             text: 'Data Sudah Disetujui, Tidak Dapat Di Ubah !'
        //             icon: 'error',
                    
        //             })
        //         }else{
        //             $("#showact").load('/izin/'+kode_izin+'/showact');
        //         }
              
        //     });
        // });
    </script>
@endpush

