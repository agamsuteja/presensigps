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
        font-size: 10px;
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
<body class="A4 landscape">
    <?php
    if (!function_exists('selisih')) {
        function selisih($jam_masuk, $jam_keluar)
        {
            list($h, $m, $s) = explode(":", $jam_masuk);
            $dtAwal = mktime($h, $m, $s, "1", "1", "1");
            list($h, $m, $s) = explode(":", $jam_keluar);
            $dtAkhir = mktime($h, $m, $s, "1", "1", "1");
            $dtSelisih = $dtAkhir - $dtAwal;
            $totalmenit = $dtSelisih / 60;
            $jam = explode(".", $totalmenit / 60);
            $sisamenit = ($totalmenit / 60) - $jam[0];
            $sisamenit2 = $sisamenit * 60;
            $jml_jam = $jam[0];
            return $jml_jam . ":" . round($sisamenit2);
        }
    }

    // function selisih($jam_masuk, $jam_keluar)
    // {
    //     list($h_masuk, $m_masuk, $s_masuk) = explode(":", $jam_masuk);
    //     $dtAwal = mktime($h_masuk, $m_masuk, $s_masuk, "1", "1", "1");

    //     list($h_keluar, $m_keluar, $s_keluar) = explode(":", $jam_keluar);
    //     $dtAkhir = mktime($h_keluar, $m_keluar, $s_keluar, "1", "1", "1");

    //     $dtSelisih = $dtAkhir - $dtAwal;
    //     $totalMenit = $dtSelisih / 60;
    //     $jam = floor($totalMenit / 60);
    //     $menit = $totalMenit % 60;

    //     return $jam . ' jam ' . round($menit) . ' menit';
    // }

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
                        LAPORAN PRESENSI KARYAWAN <br>
                        PERIODE {{ strtoupper( $namabulan[$bulan])}} {{$tahun}}<br>
                        GBI EL SHADDAI PONTIANAK
                    </h3>
                </div>
            </td>
        </tr>
    </table>
   
    <table class="tabelpresensi">
        <tr>
            <th rowspan="2">Nik</th>
            <th rowspan="2">Nama Karyawan</th>
            <th colspan="31">Tanggal</th>
            <th rowspan="2 ">TH</th>
            <th rowspan="2 ">TT</th>
        </tr>
        <tr>
            <?php
                for ($i=1; $i <=31; $i++) { 
            ?>
                <th>{{ $i }}</th>
            <?php
            }
            ?>
            
        </tr>
            @foreach ($rekap as $d)
                <tr>
                    <td>{{ $d->nik }}</td>
                    <td>{{ $d->nama_lengkap }}</td>
            
                    <?php
                    $totalhadir = 0;
                    $totalterlambat = 0;
                    for ($i = 1; $i <= 31; $i++) {
                        $tgl = "tgl_" . $i;
                        $hadir = !empty($d->$tgl) ? explode("-", $d->$tgl) : ['', ''];
            
                        // Cek apakah ada waktu hadir
                        if (!empty($hadir[0]) && !empty($hadir[1])) {
                            $totalhadir++;
            
                            // Cek keterlambatan
                            if ($hadir[0] > "08:00:00") {
                                $totalterlambat++;
                            }
                        }
                    ?>
                        <td>
                            <span style="color: {{ $hadir[0] > "08:00:00" ? "red" : "" }}">
                                {{ $hadir[0] }}
                            </span><br>
                            <span style="color: {{ $hadir[1] < "16:00:00" ? "red" : "" }}">
                                {{ $hadir[1] }}
                            </span><br>
                        </td>
                    <?php
                    }
                    ?>
                    <td>{{ $totalhadir }}</td>
                    <td>{{ $totalterlambat }}</td>
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