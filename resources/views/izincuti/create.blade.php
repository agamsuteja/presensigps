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

    #keterangan{
        height: 8rem !important;
    }

    

   
</style>


  <!-- App Header -->
  <div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
        <div class="pageTitle">Form Izin Cuti</div>
        <div class="right"></div>
    </div>
<!-- * App Header -->
@endsection

@section('content')
<div class="row" style="margin-top:70px">
    <div class="col">
        <form method="POST" action="/izincuti/store" id="frmIzin">
            @csrf
            <div class="row">
                <div class="col">
                    <input type="text" id="tgl_izin_dari" autocomplete="off" name="tgl_izin_dari" class="form-control datepicker" placeholder="Dari Tangal">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <input type="text" id="tgl_izin_sampai" autocomplete="off" name="tgl_izin_sampai" class="form-control datepicker" placeholder="Sampai Tangal">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <input type="hidden" id="jml_hari" name="jml_hari" class="form-control" placeholder="Jumlah Hari" readonly>
                    <p id="Info_jml_hari"></p>
                </div>
            </div>

            <div class="row">
                <div class="col">
                   <select name="kode_cuti" id="kode_cuti" class="form-control selecmaterialize">
                    <option value="">Pilih Kategori Cuti</option>
                    @foreach ($mastercuti as $c)
                        <option value="{{ $c->kode_cuti }}">{{ $c->nama_cuti}}</option>
                    @endforeach
                   </select>
                    <div class="form-group">
                     <input type="hidden" id="max_cuti" name="max_cuti" class="form-control" placeholder="Maksimal Cuti" readonly>
                     <p id="Info_max_cuti"></p>
                    </div>
                </div>
            </div>
               
            <div class="row">
                <div class="col">
                    <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan">
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

        function loadjumlahhari(){
            var dari = $("#tgl_izin_dari").val();
            var sampai = $("#tgl_izin_sampai").val();
            var date1 = new Date(dari);
            var date2 = new Date(sampai);
            
            var Difference_In_Time = date2.getTime() - date1.getTime();

            var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

            if(dari == "" || sampai == "") {
                var jmlhari = 0;
            }else{
                var jmlhari = Difference_In_Days + 1;
            }

            $("#jml_hari").val(jmlhari);
            $("#Info_jml_hari").html("<b>Jumlah Hari Cuti Yang Diambil Adalah :" + jmlhari + " Hari</b>");
        }

        $("#tgl_izin_dari,#tgl_izin_sampai").change(function(e) {
            loadjumlahhari();
        });


        // $("#tgl_izin").change(function(e) {
        //     var tgl_izin = $(this).val();
        //     $.ajax({
        //         type:'POST',
        //         url:'/presensi/cekpengajuanizin',
        //         data:{
        //             _token:"{{ csrf_token() }}",
        //             tgl_izin: tgl_izin,
        //         },
        //         change:false,
        //         success:function(respond){
        //             if (respond ==1){
        //                 Swal.fire({
        //                 title: 'Waduh!',
        //                 text: 'Anda Sudah Mengajukan Izin/Sakit Hari Ini',
        //                 icon: 'warning',
        //                 }).then((result) => {
        //                     $("#tgl_izin").val("");
        //                 });
        //             }
        //         }

        //     })
        // });

        $("#frmIzin").submit(function(){
            var tgl_izin_dari = $("#tgl_izin_dari").val();
            var tgl_izin_sampai = $("#tgl_izin_sampai").val();
            var jml_hari = $("#jml_hari").val();
            var max_cuti = $("#max_cuti").val();
            var keterangan = $("#keterangan").val();
            var kode_cuti = $("#kode_cuti").val();
            if(tgl_izin_dari == "" || tgl_izin_sampai == ""){
                Swal.fire({
                    title: 'Waduh!',
                    text: 'Tanggal harus di pilih',
                    icon: 'warning',
                    
                    });
                return false;
            }else if(kode_cuti == ""){
                Swal.fire({
                    title: 'Waduh!',
                    text: 'Kategori Cuti harus di isi',
                    icon: 'warning',
                    
                    });
                return false;
            }else if(keterangan == ""){
                Swal.fire({
                    title: 'Waduh!',
                    text: 'Keterangan harus di isi',
                    icon: 'warning',
                    
                    });
                return false;
            }else if (parseInt(jml_hari) > parseInt(max_cuti)) {
                Swal.fire({
                    title: 'Waduh!',
                    text: 'Jumlah Pengajuan Cuti, Melebihi Sisa Cuti Anda Pada Tahun ini, Sejumlah ' + max_cuti + " Hari",
                    icon: 'warning',
                    
                });
                return false;        
            }
            
        });

        $("#kode_cuti").change(function(e){
            var kode_cuti = $(this).val();
            var tgl_izin_dari = $("#tgl_izin_dari").val();

            if(tgl_izin_dari ==""){
                Swal.fire({
                    title: 'Waduh!',
                    text: 'Silahkan Isi Tanggal Cuti Terlebih Dahulu',
                    icon: 'warning',
                    
                    });
                    $("#kode_cuti").val("");
            }else{
                $.ajax({
                    url:'/izincuti/getmaxcuti',
                    type:'POST',
                    data:{
                        _token:"{{ csrf_token() }}",
                        kode_cuti : kode_cuti,
                        tgl_izin_dari : tgl_izin_dari
                    },

                    cache: false,
                    success:function(respond) {
                        $("#max_cuti").val(respond);
                        $("#Info_max_cuti").html("<b>Sisa Cuti Tahunan Anda Sebanyak :" + respond + " Hari</b>");

                    }
                });
            }
            
        });
    });

    </script>
@endpush