<form action="/konfigurasi/harilibur/store" method="POST" id="frmcreateHarilibur">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-barcode"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7v-1a2 2 0 0 1 2 -2h2" /><path d="M4 17v1a2 2 0 0 0 2 2h2" /><path d="M16 4h2a2 2 0 0 1 2 2v1" /><path d="M16 20h2a2 2 0 0 0 2 -2v-1" /><path d="M5 11h1v2h-1z" /><path d="M10 11l0 2" /><path d="M14 11h1v2h-1z" /><path d="M19 11l0 2" /></svg>
                </span>
                <input type="text" value="" id="kode_libur" class="form-control" placeholder="Auto" name="kode_libur" disabled>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-month"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M7 14h.013" /><path d="M10.01 14h.005" /><path d="M13.01 14h.005" /><path d="M16.015 14h.005" /><path d="M13.015 17h.005" /><path d="M7.01 17h.005" /><path d="M10.01 17h.005" /></svg>
                </span>
                <input type="text" value="" id="tanggal_libur" class="form-control" placeholder="Tanggal Libur" name="tanggal_libur" autocomplete="off">
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <div class="form-group">
                <select name="kode_dept" id="kode_dept" class="form-select">
                    <option value="">Pilih Group</option>
                    @foreach ($departemen as $d)
                        <option value="{{ $d->kode_dept }}">{{ strtoupper($d->nama_dept) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-notes"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 3m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" /><path d="M9 7l6 0" /><path d="M9 11l6 0" /><path d="M9 15l4 0" /></svg>
                </span>
                <input type="text" value="" id="keterangan" class="form-control" placeholder="Keterangan" name="keterangan" autocomplete="off">
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12">
            <div class="form-group">
                <button class="btn btn-primary w-100">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                    Simpan</button>
            </div>
        </div>
    </div>
</form>


    <script>
        $(function() {
            $("#tanggal_libur").datepicker({ 
                autoclose: true, 
                todayHighlight: true,
                format: 'yyyy-mm-dd',
            });

            $("#frmcreateHarilibur").submit(function(e){
                var tanggal_libur = $("#tanggal_libur").val();
                var kode_dept = $("#kode_dept").val();
                var keterangan = $("#keterangan").val();

                if(tanggal_libur == ""){
                Swal.fire({
                    title: 'Warning!',
                    text: 'Tanggal Harus Diisi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    $("#tanggal_libur").focus();
                });
                return false;
                } else if(kode_dept == "") {
                    Swal.fire({
                        title: 'Warning!',
                        text: 'Group Harus Dipilih',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        $("#kode_dept").focus();
                    });
                    return false;
                } else if(keterangan == "") {
                    Swal.fire({
                        title: 'Warning!',
                        text: 'Keterangan Harus Diisi',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        $("#keterangan").focus();
                    });
                    return false;
                } 
            })
        });
    </script>
