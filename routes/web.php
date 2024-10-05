<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\KonfigurasiController;
use App\Http\Controllers\IzinabsenController;
use App\Http\Controllers\IzinsakitController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\IzincutiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HariliburController;
use App\Models\karyawan;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['guest:karyawan'])->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    })->name('login');
    Route::post('/proseslogin', [AuthController::class, 'proseslogin']);
});


Route::middleware(['guest:user'])->group(function () {
    Route::get('/panel', function () {
        return view('auth.loginadmin');
    })->name('loginadmin');
    Route::post('/prosesloginadmin', [AuthController::class, 'prosesloginadmin']);
});




 

Route::middleware(['auth:karyawan'])->group(function () {

    Route::get('/dashboard',[DashboardController::class,'index']);  
    Route::get('/proseslogout', [AuthController::class, 'proseslogout']);

    //presensi
    Route::get('/presensi/create', [PresensiController::class,'create']);
    Route::post('/presensi/store', [PresensiController::class,'store']);


    //editprofile
    Route::get('/editprofile', [PresensiController::class, 'editprofile']);
    Route::Post('/presensi/{nik}/updateprofile' ,[PresensiController::class, 'updateprofile']);

    //histori
    Route::get('/presensi/histori', [PresensiController::class, 'histori']);
    Route::post('/gethistori', [PresensiController::class, 'gethistori']);

    //izin
    Route::get('/presensi/izin', [PresensiController::class, 'izin']);
    Route::get('/presensi/buatizin', [PresensiController::class, 'buatizin']);
    Route::post('/presensi/storeizin', [PresensiController::class, 'storeizin']);
    Route::post('/presensi/cekpengajuanizin', [PresensiController::class, 'cekpengajuanizin']);

     // pengajuan Izin
    Route::get('/izinabsen', [IzinabsenController::class, 'create']);
    //  Route::post('/izinabsen/store', [IzinabsenController::class, 'store']);
    Route::post('/izinabsen/store', [IzinabsenController::class, 'store']);
    Route::get('/izinabsen/{kode_absen}/edit', [IzinabsenController::class, 'edit']);
    Route::post('/izinabsen/{kode_absen}/update', [IzinabsenController::class,'update']);

     // izin sakit
    Route::get('/izinsakit', [IzinsakitController::class, 'create']);
    Route::Post('/izinsakit/store', [IzinsakitController::class, 'store']);
    Route::get('/izinsakit/{kode_absen}/edit', [IzinsakitController::class, 'edit']);
    Route::post('/izinsakit/{kode_absen}/update', [IzinsakitController::class,'update']);

    // izin cuti
    Route::get('/izincuti', [IzincutiController::class, 'create']);
    Route::Post('/izincuti/store', [IzincutiController::class, 'store']);
    Route::get('/izincuti/{kode_absen}/edit', [IzincutiController::class, 'edit']);
    Route::post('/izincuti/{kode_absen}/update', [IzincutiController::class,'update']);
    Route::Post('/izincuti/getmaxcuti', [IzincutiController::class, 'getmaxcuti']);


    Route::get('/izin/{kode_izin}/showact', [PresensiController::class, 'showact']);
    Route::get('/izin/{kode_izin}/delete', [PresensiController::class, 'deleteizin']);
    

     

});

//Route yang bisa di akses oleh administrator dan admin departemen
Route::group(['middleware' => ['role:administrator|admin departemen,user']], function (){
    //dashboard 
    Route::get('/proseslogoutadmin', [AuthController::class, 'proseslogoutadmin']);
    Route::get('/panel/dashboardadmin', [DashboardController::class, 'dashboardadmin']);
    //karyawan
    Route::get('/karyawan', [KaryawanController::class, 'index']);
    //set jam kerja
    Route::get('/konfigurasi/{nik}/setjamkerja', [KonfigurasiController::class, 'setjamkerja']);
    Route::post('/konfigurasi/storesetjamkerja', [KonfigurasiController::class, 'storesetjamkerja']);
    Route::post('/konfigurasi/updatesetjamkerja', [KonfigurasiController::class, 'updatesetjamkerja']);

    //presensi
    Route::get('/presensi/monitoring', [PresensiController::class, 'monitoring']);
    Route::post('/getpresensi', [PresensiController::class, 'getpresensi']);
    Route::post('/tampilkanpeta', [PresensiController::class, 'tampilkanpeta']);
    Route::get('/presensi/laporan', [PresensiController::class, 'laporan']);
    Route::post('/presensi/cetaklaporan', [PresensiController::class, 'cetaklaporan']);
    Route::get('/presensi/rekap', [PresensiController::class, 'rekap']);
    Route::post('/presensi/cetakrekap', [PresensiController::class, 'cetakrekap']);
    Route::get('/presensi/izinsakit', [PresensiController::class, 'izinsakit']);
    Route::post('/presensi/approveizinsakit', [PresensiController::class, 'approveizinsakit']);
    Route::get('/presensi/{kode_izin}/batalkanizinsakit', [PresensiController::class, 'batalkanizinsakit']);

});


//Route yang hanya bisa dibuka oleh administrator
Route::group(['middleware' => ['role:administrator,user']], function (){
    // Route::get('/proseslogoutadmin', [AuthController::class, 'proseslogoutadmin']);
    // Route::get('/panel/dashboardadmin', [DashboardController::class, 'dashboardadmin']);

    // karyawan
   
    Route::post('/karyawan/store', [KaryawanController::class, 'store']);
    Route::post('/karyawan/edit', [KaryawanController::class, 'edit']);
    Route::post('/karyawan/{nik}/update', [KaryawanController::class, 'update']);
    Route::get('/karyawan/{nik}/resetpassword', [KaryawanController::class, 'resetpassword']);
    Route::delete('/karyawan/{nik}/delete', [KaryawanController::class, 'delete'])->name('karyawan.delete');
    Route::get('/karyawan/{nik}/lockandunlocklocation', [KaryawanController::class, 'lockandunlocklocation']);

    //departemen
    Route::get('/departemen', [DepartemenController::class, 'index'])->middleware('permission:view-departemen,user'); 
    Route::post('/departemen/store', [DepartemenController::class, 'store']);
    Route::post('/departemen/edit', [DepartemenController::class, 'edit']);
    Route::post('/departemen/{kode_dept}/update', [DepartemenController::class, 'update']);
    // Route::post('/departemen/{kode_dept}/delete', [DepartemenController::class, 'delete']);
    Route::delete('/departemen/{kode_dept}/delete', [DepartemenController::class, 'delete'])->name('departemen.delete');

    //presensi
    
   
    
    
    //konfigurasi lokasi kantor 
   
    Route::get('/konfigurasi/lokasikantor', [KonfigurasiController::class, 'lokasikantor']);
    Route::post('/konfigurasi/updatelokasikantor', [KonfigurasiController::class, 'updatelokasikantor']);
    

    // jam kerja

    Route::get('/konfigurasi/jamkerja', [KonfigurasiController::class, 'jamkerja']);
    Route::post('/konfigurasi/storejamkerja', [KonfigurasiController::class, 'storejamkerja']);
    Route::post('/konfigurasi/editjamkerja', [KonfigurasiController::class, 'editjamkerja']);
    Route::delete('/konfigurasi/{kode_jam_kerja}/delete', [KonfigurasiController::class, 'delete'])->name('konfigurasi.delete');
    Route::post('/konfigurasi/updatejamkerja', [KonfigurasiController::class, 'updatejamkerja']);
   

    //user
    Route::get('/konfigurasi/users', [UserController::class, 'index']);
    Route::post('/konfigurasi/users/store', [UserController::class,'store']);
    Route::post('/konfigurasi/users/edit', [UserController::class, 'edit']);
    Route::post('/konfigurasi/users/{id_user}/update', [UserController::class, 'update']);
    Route::delete('/konfigurasi/users/{id_user}/delete', [UserController::class, 'delete']);


     //hari libur 
    Route::get('/konfigurasi/harilibur', [HariliburController::class, 'index']);
    Route::get('/konfigurasi/harilibur/create', [HariliburController::class, 'create']);
    Route::post('/konfigurasi/harilibur/edit', [HariliburController::class,'edit']);
    Route::post('/konfigurasi/harilibur/{kode_libur}/update', [HariliburController::class,'update']);
    Route::post('/konfigurasi/harilibur/store', [HariliburController::class,'store']);
    Route::delete('/konfigurasi/harilibur/{kode_libur}/delete', [HariliburController::class, 'delete']);
    Route::get('/konfigurasi/harilibur/{kode_libur}/setkaryawanlibur', [HariliburController::class,'setkaryawanlibur']);
    Route::get('/konfigurasi/harilibur/{kode_libur}/setlistkaryawanlibur', [HariliburController::class,'setlistkaryawanlibur']);
    Route::get('/konfigurasi/harilibur/{kode_libur}/getsetlistkaryawanlibur', [HariliburController::class,'getsetlistkaryawanlibur']);
    Route::post('/konfigurasi/harilibur/{kode_libur}/storekaryawanlibur', [HariliburController::class,'storekaryawanlibur']);
    Route::post('/konfigurasi/harilibur/{kode_libur}/removekaryawanlibur', [HariliburController::class,'removekaryawanlibur']);
    Route::get('/konfigurasi/harilibur/{kode_libur}/getkaryawanlibur', [HariliburController::class,'getkaryawanlibur']);

    

    // cuti

    Route::get('/cuti', [CutiController::class, 'index']);
    Route::post('/cuti/store', [CutiController::class, 'store']);
    Route::post('/cuti/edit', [CutiController::class, 'edit']);
    Route::post('/cuti/{kode_cuti}/update', [CutiController::class, 'update']);
    Route::delete('/cuti/{kode_cuti}/delete', [CutiController::class, 'delete'])->name('cuti.delete');
   

   

    
});

Route::get('/createrolepermission',function(){

    try {
        Role::create(['name' => 'admin departemen']);
        // Permission::create(['name' => 'view-karyawan']);
        // Permission::create(['name' => 'view-departemen']);
        echo "Success";
    } catch (\Exception $e) {
        echo "Error";
    }

   
});
 

Route::get('/give-user-role', function(){
    try {
        $user = User::findorfail(1);
        $user->assignRole('administrator');
        echo "Success";
    } catch (\Exception $e) {
        echo "Error";
    }
});

Route::get('/give-role-permission', function(){
    try {
        $role = Role::findorfail(1);
        $role->givePermissionTo('view-departemen');
        echo "Success";
    } catch (\Exception $e) {
        echo "Error";
    }
});