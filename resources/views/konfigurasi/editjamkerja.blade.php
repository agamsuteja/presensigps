<form action="/konfigurasi/updatejamkerja" method="POST" id="frmJKedit" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  
                  class="icon icon-tabler icons-tabler-outline icon-tabler-barcode"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7v-1a2 2 0 0 1 2 -2h2" /><path d="M4 17v1a2 2 0 0 0 2 2h2" /><path d="M16 4h2a2 2 0 0 1 2 2v1" /><path d="M16 20h2a2 2 0 0 0 2 -2v-1" /><path d="M5 11h1v2h-1z" /><path d="M10 11l0 2" /><path d="M14 11h1v2h-1z" /><path d="M19 11l0 2" /></svg>
                </span>
                <input type="text" value="{{ $jam_kerja->kode_jam_kerja }}" name="kode_jam_kerja" id="kode_jam_kerja" class="form-control"  placeholder="Kode Jam Kerja">
              </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-list"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l11 0" /><path d="M9 12l11 0" /><path d="M9 18l11 0" /><path d="M5 6l0 .01" /><path d="M5 12l0 .01" /><path d="M5 18l0 .01" /></svg>
                </span>
                <input type="text" value="{{ $jam_kerja->nama_jam_kerja }}" id="nama_jam_kerja" class="form-control" name="nama_jam_kerja" placeholder="Nama Jam Kerja">
              </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-clock-hour-4"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 12l3 2" /><path d="M12 7v5" /></svg>
                </span>
                <input type="text" value="{{ $jam_kerja->awal_jam_masuk }}" id="awal_jam_masuk" class="form-control" name="awal_jam_masuk" placeholder="Awal Jam Masuk">
              </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-clock-hour-4"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 12l3 2" /><path d="M12 7v5" /></svg>
                </span>
                <input type="text" value="{{ $jam_kerja->jam_masuk }}" id="jam_masuk" class="form-control" name="jam_masuk" placeholder="Jam Masuk">
              </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-clock-hour-4"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 12l3 2" /><path d="M12 7v5" /></svg>
                </span>
                <input type="text" value="{{ $jam_kerja->akhir_jam_masuk }}" id="akhir_jam_masuk" class="form-control" name="akhir_jam_masuk" placeholder="Akhir Jam Masuk">
              </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-clock-hour-4"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 12l3 2" /><path d="M12 7v5" /></svg>
                </span>
                <input type="text" value="{{ $jam_kerja->jam_pulang }}" id="jam_pulang" class="form-control" name="jam_pulang" placeholder="Jam Pulang">
              </div>
        </div>
    </div>
    <div class="row">
      <div class="col-12">
          <div class="input-icon mb-3">
              <span class="input-icon-addon">
                <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-clock-hour-4"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 12l3 2" /><path d="M12 7v5" /></svg>
              </span>
              <input type="text" value="{{ $jam_kerja->total_jam }}" id="total_jam" class="form-control" name="total_jam" placeholder="Total Jam">
            </div>
      </div>
  </div>
    <div class="row">
      <div class="col-12">
          <div class="form-group">
              <select name="lintashari" id="lintashari" class="form-select">
                  <option value="">Lintas Hari</option>
                  <option value="1">Ya</option>
                  <option value="0">TIDAK</option>
              </select>
          </div>
      </div>
    </div>
    <div class="row mt-2">
        <div class="col-12">
            <div class="form-group">
                <button class="btn btn-primary w-100">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                    Update</button>
            </div>
        </div>
    </div>
</form>


    <script>
      $("#awal_jam_masuk, #jam_masuk, #akhir_jam_masuk, #jam_pulang").mask("00:00");
      $("#frmJKedit").submit(function(){
            var kode_jam_kerja = $("#kode_jam_kerja").val();
            var nama_jam_kerja = $("#nama_jam_kerja").val();
            var awal_jam_masuk = $("#awal_jam_masuk").val();
            var jam_masuk = $("#jam_masuk").val();
            var akhir_jam_masuk = $("#akhir_jam_masuk").val();
            var jam_pulang = $("#jam_pulang").val();
            var total_jam = $("#total_jam").val();
            var lintashari = $("#lintashari").val();

            if(kode_jam_kerja == ""){
                Swal.fire({
                    title: 'Warning!',
                    text: 'Kode Jam Kerja Harus Diisi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    $("#kode_jam_kerja").focus();
                });
                return false;
            } else if(nama_jam_kerja == "") {
                Swal.fire({
                    title: 'Warning!',
                    text: 'Nama Jam Kerja Harus Diisi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    $("#nama_jam_kerja").focus();
                });
                return false;
            } else if(awal_jam_masuk == "") {
                Swal.fire({
                    title: 'Warning!',
                    text: 'Awal Jam Masuk Harus Diisi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    $("#awal_jam_masuk").focus();
                });
                return false;
            } else if(jam_masuk == "") {
                Swal.fire({
                    title: 'Warning!',
                    text: 'Jam Masuk Harus Diisi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    $("#jam_masuk").focus();
                });
                return false;
            } else if(akhir_jam_masuk == "") {
                Swal.fire({
                    title: 'Warning!',
                    text: 'Akhir Jam Masuk Harus Diisi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    $("#akhir_jam_masuk").focus();
                });
                return false;
            } else if(jam_pulang == "") {
                Swal.fire({
                    title: 'Warning!',
                    text: 'Jam Pulang Harus Diisi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    $("#jam_pulang").focus();
                });
                return false;
            }else if(total_jam == "") {
                Swal.fire({
                    title: 'Warning!',
                    text: 'Total Jam Harus Diisi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    $("#total_jam").focus();
                });
                return false;
            }else if(lintashari == "") {
                Swal.fire({
                    title: 'Warning!',
                    text: 'Lintas Hari Harus Dipilih',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    $("#lintashari").focus();
                });
                return false;
            }
        });
    </script>
