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
    
    body.A4.landscape .sheet {
        width: 357mm !important;
        height: auto !important;
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
                <th colspan="{{ $jmlhari }}">Bulan {{ $namabulan[$bulan] }} {{ $tahun }}</th>
                <th rowspan="2">H</th>
                <th rowspan="2">I</th>
                <th rowspan="2">S</th>
                <th rowspan="2">C</th>
                <th rowspan="2">A</th>
            </tr>
            <tr>
                @foreach ($rangetanggal as $d )
                @if ($d != NULL)
                <th>{{ date("d", strtotime($d)) }}</th>
                @endif
                @endforeach
            </tr>

            @foreach ($rekap as $r)
            <tr>
                <td>{{ $r->nik }}</td>
                <td>{{ $r->nama_lengkap }}</td>

                <?php
                $jml_hadir = 0;
                $jml_izin = 0;
                $jml_sakit = 0;
                $jml_cuti = 0;
                $jml_alpa = 0;
                $color = "";
                for ($i = 1; $i <= $jmlhari; $i++) {
                    $tgl = "tgl_" . $i;
                    $tgl_presensi = $rangetanggal[$i-1];
                    //cari karyawan libur
                    $search_items = [
                        'nik' => $r->nik,
                        'tanggal_libur' => $tgl_presensi,
                    ];
                    $ceklibur = cekkaryawanlibur($datalibur, $search_items);
                    $datapresensi = explode("|", $r->$tgl);
                    if ($r->$tgl != NULL) {
                        $status = $datapresensi[2];
                    } else {
                        $status = "";
                    }

                    $cekhariminggu = gethari(date('D',strtotime($tgl_presensi)));
                    // $cekharisenin = gethari(date('D',strtotime($tgl_presensi)));
                    if ($status == "h") {
                        $jml_hadir += 1;
                        $color = "#c8a97c";
                    }

                    if ($status == "i") {
                        $jml_izin += 1;
                        $color = "yellow";
                    }

                    if ($status == "s") {
                        $jml_sakit += 1;
                        $color = "#cb5e5e";
                    }

                    if ($status == "c") {
                        $jml_cuti += 1;
                        $color = "#c6b8a8";
                    }

                    if (empty($status) && empty($ceklibur) && $cekhariminggu != 'Minggu') {
                        $jml_alpa += 1;
                        $color = "red";
                    }

                    if (!empty($ceklibur)) {
                        $color = "#ff8100";
                    }

                    if ($cekhariminggu == "Minggu") {
                        $color = "green";
                    }

                    // if ($cekharisenin == "Senin") {
                    //     $color = "green";
                    // }

                    


                ?>
                <td style="background-color: {{ $color }}">
                    
                    {{ $status }}
                    {{-- @if (!empty($ceklibur))
                        {{ $ceklibur[0]['keterangan'] }}
                    @endif --}}
                    {{-- {{ $cekhariminggu }}
                    {{ $cekharisenin }} --}}
                </td>
                    
                <?php } ?>

                <!-- Tampilkan jumlah Hadir, Izin, Sakit, Alpa -->
                <td>{{ !empty($jml_hadir) ? $jml_hadir : 0 }}</td>
                <td>{{ !empty($jml_izin) ? $jml_izin : 0 }}</td>
                <td>{{ !empty($jml_sakit) ? $jml_sakit : 0 }}</td>
                <td>{{ !empty($jml_cuti) ? $jml_cuti : 0 }}</td>
                <td>{{ !empty($jml_alpa) ? $jml_alpa : 0 }}</td>
            </tr>
            @endforeach
        </table>
        <h4>Keterangan Libur:</h4>
        <ol>
            @foreach ($harilibur as $d )
                <li>{{date('d-m-Y',strtotime($d->tanggal_libur)) }} - {{$d->keterangan}}</li>
            @endforeach
        </ol>
    </section>

</body>

</html>