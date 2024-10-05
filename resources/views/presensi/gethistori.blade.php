
@if ($histori->isEmpty())
    <div class="alert alert-danger">
        <p>Data Belum Ada</p>
    </div>
@endif
<style>
    .historicontent{
        display: flex;
    }

    .datapresensi{
        margin-left: 10px;
        
    }
</style>
@foreach ($histori as $d)
        @if ($d->status=="h")
                        <div class="card mb-1">
                            <div class="card-body">
                                <div class="historicontent">
                                    <div class="iconpresensi">
                                        <ion-icon name="finger-print-outline" style="font-size:48px; color: #900606;"></ion-icon>
                                    </div>
                                    <div class="datapresensi">
                                        <h3 style="line-height: 3px;">{{ $d->nama_jam_kerja }}</h3> 
                                        <h4 style="margin:0px !important">{{ date("d-m-Y", strtotime($d->tgl_presensi)) }}</h4>
                                        
                                        <span>
                                            {!! $d->jam_in != null ? date("H:i", strtotime($d->jam_in)) : '<span class="text-danger">Belum Scan Masuk</span>' !!}
                                        </span>
                                        
                                        <span>
                                            {!! $d->jam_out != null ? "-". date("H:i", strtotime($d->jam_out)) : '<span class="text-danger">-Belum Scan Pulang</span>' !!}
                                        </span>
                                        <br>
                                        
                                        @php
                                            $jam_in = $d->jam_in ? date("H:i", strtotime($d->jam_in)) : null;
                                            $jam_masuk = date("H:i", strtotime($d->jam_masuk));
                                            $jadwal_jam_masuk = $d->tgl_presensi . " " . $jam_masuk;
                                            $jam_presensi = $d->tgl_presensi . " " . $jam_in;
                                            
                                            // Cek apakah ada keterlambatan
                                            $terlambat = ($jam_in && $jam_in > $jam_masuk) ? hitungjamterlambat($jadwal_jam_masuk, $jam_presensi) : '00:00';
                                            // $terlambatdesimal = ($jam_in && $jam_in > $jam_masuk) ? hitungjamterlambatdesimal($jadwal_jam_masuk, $jam_presensi) : '00:00';
                                        @endphp
                                        
                                        <span>
                                            @if ($terlambat == '00:00')
                                                <span style="color: chartreuse">Tepat Waktu</span>
                                            @else
                                                <span class="text-danger">Terlambat {{ $terlambat }} </span>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @elseif ($d->status=="i")
                        <div class="card mb-1">
                            <div class="card-body">
                                <div class="historicontent">
                                    <div class="iconpresensi">
                                        <ion-icon name="document-outline" style="font-size:48px; color: #900606;"></ion-icon>
                                    </div>
                                    <div class="datapresensi">
                                        <h3 style="line-height: 3px;">IZIN - {{ $d->kode_izin}}</h3> 
                                        <h4 style="margin:0px !important">{{ date("d-m-Y", strtotime($d->tgl_presensi)) }}</h4>
                                        <span>
                                            {{ $d->keterangan}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @elseif ($d->status=="s")
                        <div class="card mb-1">
                            <div class="card-body">
                                <div class="historicontent">
                                    <div class="iconpresensi">
                                        <ion-icon name="medkit-outline" style="font-size:48px; color: #900606;"></ion-icon>
                                    </div>
                                    <div class="datapresensi">
                                        <h3 style="line-height: 3px;">SAKIT - {{ $d->kode_izin}}</h3> 
                                        <h4 style="margin:0px !important">{{ date("d-m-Y", strtotime($d->tgl_presensi)) }}</h4>
                                        <span>
                                            {{ $d->keterangan}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @elseif ($d->status=="c")
                        <div class="card mb-1">
                            <div class="card-body">
                                <div class="historicontent">
                                    <div class="iconpresensi">
                                        <ion-icon name="happy-outline" style="font-size:48px; color: #900606;"></ion-icon>
                                    </div>
                                    <div class="datapresensi">
                                        <h3 style="line-height: 3px;">CUTI - {{ $d->kode_izin}}</h3> 
                                        <h4 style="margin:0px !important">{{ date("d-m-Y", strtotime($d->tgl_presensi)) }}</h4>
                                        <span class="badge bg-primary">
                                            {{ $d->nama_cuti}}
                                        </span>
                                        <br>
                                        <span>
                                            {{ $d->keterangan}}
                                        </span>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
            @endif
@endforeach
