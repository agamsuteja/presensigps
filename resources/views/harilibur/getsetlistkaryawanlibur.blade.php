@foreach ($karyawan as $d)
    <tr>
        <td>{{ $loop->iteration}}</td>
        <td>{{ $d->nik}}</td>
        <td>{{ $d->nama_lengkap}}</td>
        <td>{{ $d->jabatan}}</td>
        <td>
            @if (!empty($d->ceknik))
                <a href="#" class="btn btn-danger btn-sm removekaryawan" nik="{{$d->nik}}">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
                </a>
            @else
                <a href="#" class="btn btn-primary btn-sm tambahkaryawan" nik="{{$d->nik}}">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                </a>
            @endif
          
        </td>
    </tr>
@endforeach


<script>
    $(function(){
        function loadsetlistkaryawanlibur(){
            var kode_libur = "{{ $kode_libur }}";
            $("#loadsetlistkaryawanlibur").load('/konfigurasi/harilibur/'+ kode_libur + '/getsetlistkaryawanlibur');
        }


        function loadkaryawanlibur(){
            var kode_libur = "{{ $kode_libur }}";
            $("#loadkaryawanlibur").load('/konfigurasi/harilibur/'+ kode_libur + '/getkaryawanlibur');
        }

        $(".tambahkaryawan").click(function(e){
            var kode_libur = "{{ $kode_libur}}";
            var nik = $(this).attr('nik');

            $.ajax({
                type:'POST',
                url: '/konfigurasi/harilibur/' + kode_libur + '/storekaryawanlibur', // masukkan kode_libur ke dalam URL
                data: {
                    _token: "{{ csrf_token() }}",
                    kode_libur: kode_libur,
                    nik : nik
                },
                cache:false,
                success: function(respond) {
                    if(respond=='0'){
                        Swal.fire({
                        title: 'Berhasil!',
                        text: 'Data Berhasil Di Simpan',
                        icon: 'success',
                        confirmButtonText: 'OK'
                        })
                        
                        loadsetlistkaryawanlibur();
                        loadkaryawanlibur();
                    }else if(respond=='1'){
                        Swal.fire({
                        title: 'Warning!',
                        text: 'Data Sudah Ada',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                        })
                    }else{
                        Swal.fire({
                        title: 'Error!',
                        text: 'Data Gagal Di Simpan',
                        icon: 'error',
                        confirmButtonText: 'OK'
                        })
                    }
                }
            });
        });

        $(".removekaryawan").click(function(e){
            var kode_libur = "{{ $kode_libur}}";
            var nik = $(this).attr('nik');

            $.ajax({
                type:'POST',
                url: '/konfigurasi/harilibur/' + kode_libur + '/removekaryawanlibur', // masukkan kode_libur ke dalam URL
                data: {
                    _token: "{{ csrf_token() }}",
                    kode_libur: kode_libur,
                    nik : nik
                },
                cache:false,
                success: function(respond) {
                    if(respond=='0'){
                        Swal.fire({
                        title: 'Berhasil!',
                        text: 'Data Berhasil Di Hapus',
                        icon: 'success',
                        confirmButtonText: 'OK'
                        })
                        
                        loadsetlistkaryawanlibur();
                    }else if(respond=='1'){
                        Swal.fire({
                        title: 'Warning!',
                        text: 'Data Sudah Ada',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                        })
                    }else{
                        Swal.fire({
                        title: 'Error!',
                        text: 'Data Gagal Di Simpan',
                        icon: 'error',
                        confirmButtonText: 'OK'
                        })
                    }
                }
            });
        });
    });
</script>