@extends('layouts.presensi')
@section('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
<style>
    .datepicker-modal{
        max-height: 470px !important;
    }

    .datepicker-date-display{
        background-color: #3e94b0
    }
</style>

<style>
    .custom-btn {
        background-color: #080909; /* Ganti dengan warna yang Anda inginkan */
        color: #e1e1e1; /* Ganti dengan warna teks yang Anda inginkan */
    }

    

   
</style>


  <!-- App Header -->
  <div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
        <div class="pageTitle">Form Izin</div>
        <div class="right"></div>
    </div>
<!-- * App Header -->
@endsection

@section('content')
<div class="row" style="margin-top:70px">
    <div class="col">
        <form method="POST" action="/presensi/storeizin" id="frmIzin">
            @csrf
            <div class="row">
                <div class="col">
                    <input type="text" id="tgl_izin" name="tgl_izin" class="form-control datepicker" placeholder="Tangal">
                </div>
            </div>
                <div class="form-group">
                    <select name="status" id="status" class="form-control">
                        <option value="">IZIN / SAKIT</option>
                        <option value="i">IZIN</option>
                        <option value="s">SAKIT</option>
                    </select>
                </div>
            <div class="row">
                <div class="col">
                        <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control">keterangan</textarea>
                </div>
            </div>
            <div class="form-group">
                <button class="btn custom-btn w-100">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('myscript')
    <script>
                var currYear = (new Date()).getFullYear();

    $(document).ready(function() {
        $(".datepicker").datepicker({
           
            format: "yyyy/mm/dd"    
        });

        $("#tgl_izin").change(function(e) {
            var tgl_izin = $(this).val();
            $.ajax({
                type:'POST',
                url:'/presensi/cekpengajuanizin',
                data:{
                    _token:"{{ csrf_token() }}",
                    tgl_izin: tgl_izin,
                },
                change:false,
                success:function(respond){
                    if (respond ==1){
                        Swal.fire({
                        title: 'Waduh!',
                        text: 'Anda Sudah Mengajukan Izin/Sakit Hari Ini',
                        icon: 'warning',
                        }).then((result) => {
                            $("#tgl_izin").val("");
                        });
                    }
                }

            })
        });

        $("#frmIzin").submit(function(){
            var tgl_izin = $("#tgl_izin").val();
            var status = $("#status").val();
            var keterangan = $("#keterangan").val();
            if(tgl_izin == ""){
                Swal.fire({
                    title: 'Waduh!',
                    text: 'Tanggal harus di pilih',
                    icon: 'warning',
                    
                    })
                return false;
            }else if(status == ""){
                Swal.fire({
                    title: 'Waduh!',
                    text: 'Status harus di pilih',
                    icon: 'warning',
                    
                    })
                return false;
            }else if(keterangan == ""){
                Swal.fire({
                    title: 'Waduh!',
                    text: 'Keterangan harus di isi',
                    icon: 'warning',
                    
                    })
                return false;
            }    
            
        });
    });

    </script>
@endpush