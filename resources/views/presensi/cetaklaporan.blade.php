<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>A4</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>
    @page { 
        size: A4;
    }

    h3 {
        font-size: 27px;
    }

    .tabeldatakaryawan {
        margin-top: 40px;
    }

    .tabeldatakaryawan td {
        padding: 7px;
    }

    .tabelpresensi {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }

    .tabelpresensi th, 
    .tabelpresensi td {
        border: 1px solid #100f0f;
        padding: 8px;
    }

    .tabelpresensi th {
        background-color: #c3c1c1;
    }

    .tabelpresensi td {
        padding: 5px;
    }

    .tabelpresensi img {
        max-width: 60px;  /* Atur lebar maksimum gambar */
        max-height: 60px; /* Atur tinggi maksimum gambar */
        height: auto;      /* Jaga rasio gambar */
        width: auto;       /* Jaga rasio gambar */
    }
    

  </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4">
    
  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm">

    <!-- Write HTML just like a web page -->
    <table style="width: 100%">
        <tr>
            <td style="width: 30px">
                <img src="{{ asset('assets/img/esc10.png') }}" alt="">
            </td>
            <td>
                <div style="text-align: center;">
                    <h3 id="title">
                        LAPORAN PRESENSI STAFF <br>
                        PERIODE {{ strtoupper( $namabulan[$bulan])}} {{$tahun}}<br>
                        GBI EL SHADDAI PONTIANAK
                    </h3>
                </div>
            </td>
        </tr>
    </table>
    <table class="tabeldatakaryawan">
        <tr>
            <td rowspan="7">
                @php
                    $path = Storage::url('uploads/karyawan/'.$karyawan->foto);
                @endphp
                <img src="{{ url($path) }}" alt="" style="max-width: 250px; height: 200;">
            </td>
        </tr>
        <tr>
            <td>Nik</td>
            <td>:</td>
            <td>{{ $karyawan->nik }}</td>
        </tr>
        <tr>
            <td>Nama Karyawan</td>
            <td>:</td>
            <td>{{ $karyawan->nama_lengkap }}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td>{{ $karyawan->jabatan }}</td>
        </tr>
        <tr>
            <td>Nama Karyawan</td>
            <td>:</td>
            <td>{{ $karyawan->nama_lengkap }}</td>
        </tr>
        <tr>
            <td>Departemen</td>
            <td>:</td>
            <td>{{ $karyawan->nama_dept }}</td>
        </tr>
        <tr>
            <td>No Handphone</td>
            <td>:</td>
            <td>{{ $karyawan->no_hp }}</td>
        </tr>
    </table>
    <table class="tabelpresensi">
        <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Jam Masuk</th>
            <th>Foto Masuk</th>
            <th>Jam Pulang</th>
            <th>Foto Pulang</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>Jumlah Jam Kerja</th>
        </tr>
        @foreach ($presensi as $d)
            @if ($d->status == "h")
                <tr>
                    @php
                        $path_in = Storage::url('uploads/absensi/' . $d->foto_in);
                        $path_out = Storage::url('uploads/absensi/' . $d->foto_out);
                        $jamterlambat = hitungjamkerja($d->jam_masuk, $d->jam_in);
                    @endphp
                    <td>{{ $loop->iteration }}</td>
                    <td style="font-size: 11px">{{ date("d-m-Y", strtotime($d->tgl_presensi)) }}</td>
                    <td style="font-size: 15px">{{$d->jam_in}}</td>
                    <td><img src="{{ url($path_in) }}" alt="" class="foto"></td>
                    <td style="font-size: 15px">{{$d->jam_out != null ? $d->jam_out : 'BELUM ABSEN'}}</td>
                    <td>
                        @if ($d->jam_out != null )
                            <img src="{{ url($path_out) }}" alt="" class="foto">
                        @else
                            no foto
                        @endif
                    </td>
                    <td style="text-align: center">{{ $d->status }}</td>
                    <td>
                        @if ($d->jam_in > $d->jam_masuk)
                            Terlambat {{ $jamterlambat }}
                        @else
                            Tepat Waktu
                        @endif
                    </td>
                    <td style="text-align: center">
                        @if ($d->jam_out != null)
                            @php
                                $tgl_masuk = $d->tgl_presensi;
                                $tgl_pulang = $d->lintashari == 1 ? date('Y-m-d',strtotime('+1 days',strtotime($d->tgl_presensi))) : $tgl_masuk;
                                $jam_masuk = $tgl_masuk.' '.$d->jam_in; 
                                $jam_pulang = $tgl_pulang.' '.$d->jam_out; 
                                
                                $jmljamkerja = hitungjamkerja($jam_masuk, $jam_pulang);
                            @endphp       
                        @else
                            @php
                                $jmljamkerja = 0;
                            @endphp
                        @endif
                            {{ $jmljamkerja }}
                    </td>
                </tr>
            @else
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td style="font-size: 12px">{{ date("d-m-Y", strtotime($d->tgl_presensi)) }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{ $d->keterangan}}</td>
                    <td style="text-align: center">{{ $d->status}}</td>
                    <td></td>
                </tr>
            @endif
        @endforeach
        
    
    </table>

    {{--tanda tangan
    {{-- <table width="100%">
        <tr>
            <td style="text-align-last: right; height:300px">
                <u>Ps.David Rian Wilando</u><br>
                <i><b>Group Head Office</b></i>
            </td>
        </tr> --}}
    </table>
  </section>

</body>

</html>