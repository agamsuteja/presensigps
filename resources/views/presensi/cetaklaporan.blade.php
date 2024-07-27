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
    <?php
    // function selisih($jam_masuk, $jam_keluar)
    //     {
    //         list($h, $m, $s) = explode(":", $jam_masuk);
    //         $dtAwal = mktime($h, $m, $s, "1", "1", "1");
    //         list($h, $m, $s) = explode(":", $jam_keluar);
    //         $dtAkhir = mktime($h, $m, $s, "1", "1", "1");
    //         $dtSelisih = $dtAkhir - $dtAwal;
    //         $totalmenit = $dtSelisih / 60;
    //         $jam = explode(".", $totalmenit / 60);
    //         $sisamenit = ($totalmenit / 60) - $jam[0];
    //         $sisamenit2 = $sisamenit * 60;
    //         $jml_jam = $jam[0];
    //         return $jml_jam . ":" . round($sisamenit2);
    //     }

    function selisih($jam_masuk, $jam_keluar)
    {
        list($h_masuk, $m_masuk, $s_masuk) = explode(":", $jam_masuk);
        $dtAwal = mktime($h_masuk, $m_masuk, $s_masuk, "1", "1", "1");

        list($h_keluar, $m_keluar, $s_keluar) = explode(":", $jam_keluar);
        $dtAkhir = mktime($h_keluar, $m_keluar, $s_keluar, "1", "1", "1");

        $dtSelisih = $dtAkhir - $dtAwal;
        $totalMenit = $dtSelisih / 60;
        $jam = floor($totalMenit / 60);
        $menit = $totalMenit % 60;

        return $jam . ' jam ' . round($menit) . ' menit';
    }

    ?>
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
            <th>Jam in</th>
            <th>Foto In</th>
            <th>Jam Out</th>
            <th>Foto Out</th>
            <th>Keterangan</th>
            <th>Jumlah Jam Kerja</th>
        </tr>
            @foreach ($presensi as $d)
            @php
            $path_in = Storage::url('uploads/absensi/'.$d->foto_in);
            $path_out = Storage::url('uploads/absensi/'.$d->foto_out);
            $jamterlambat = selisih('08:00:00',$d->jam_in);
            @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ date("d-m-Y", strtotime($d->tgl_presensi)) }}</td>
                <td>{{$d->jam_in}}</td>
                <td><img src="{{ url($path_in) }}" alt=""></td>
                <td>{{$d->jam_out != null ? $d-> jam_out : 'BELUM ABSEN'}}</td>
                <td>
                    @if ($d->jam_out != null )
                    <img src="{{ url($path_out) }}" alt=""></td>
                    @else
                    no foto
                    @endif
                   
                {{-- <td>
                    @if ($d->jam_in > '08:00')
                        Terlambat {{ $jamterlambat }}
                    @else
                        Tepat Waktu
                    @endif
                </td> --}}

                <td>
                    @if ($d->jam_in > '08:00:00')
                        <span class="terlambat">Terlambat {{ $jamterlambat }}</span>
                    @else
                        <span class="tepat-waktu">Tepat Waktu</span>
                    @endif
                </td>

                <td>
                        @if ($d->jam_out != null)
                        @php
                            $jmljamkerja = selisih($d->jam_in,$d->jam_out);

                        @endphp
                        @else
                        @php
                            $jmljamkerja = 0; 
                        @endphp
                        @endif
                        {{ $jmljamkerja}}
                </td>
               
            </tr>
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