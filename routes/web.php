<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KokiController;
use App\Http\Controllers\ManajerKaryawanController;
use App\Http\Controllers\ManajerMenuController;
use App\Http\Controllers\ManajerMejaController;
use App\Http\Controllers\PelayanController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;

// ─── Shared photo serving (any authenticated user) ────────────────────────────

Route::middleware('auth')->group(function () {
    Route::get('photo/karyawan/{photoname}', [PhotoController::class, 'karyawan'])->name('photo.karyawan');
    Route::get('photo/menu/{photoname}',     [PhotoController::class, 'menu'])->name('photo.menu');
});

// ─── Authentication ───────────────────────────────────────────────────────────

// Meja (table) login — default landing page
Route::get('/',       [AuthController::class, 'showMejaLoginForm'])->name('meja.login');
Route::post('/login', [AuthController::class, 'mejaLogin'])->name('meja.login.submit');

// Staff login — only accessible by typing the URL directly
Route::middleware('guest')->group(function () {
    Route::get('auth/login',  [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('auth/login', [AuthController::class, 'login'])->name('login.submit');
});

Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('logout',  [CustomerController::class, 'logout'])->name('customer.logout');

// ─── Customer (Meja) ──────────────────────────────────────────────────────────

Route::middleware(['auth', 'role:Meja'])->group(function () {
    Route::get('/home',            [CustomerController::class, 'index'])->name('customer.home');
    Route::get('menu/{kategori}',  [CustomerController::class, 'indexByCat'])->name('menu.kategori');
    Route::get('tutorial',         [CustomerController::class, 'showTutorial'])->name('customer.tutorial');
    Route::get('listpesanan',      [CustomerController::class, 'getMyPesanan'])->name('customer.pesanan');
    Route::get('pembayaran',       [CustomerController::class, 'getMyPayment'])->name('customer.pembayaran');
    Route::get('kredit',           [CustomerController::class, 'kredit'])->name('customer.kredit');
    Route::get('debit',            [CustomerController::class, 'debit'])->name('customer.debit');
    Route::get('ulasanmenu/{id}',  [CustomerController::class, 'ulasanMenu'])->name('customer.ulasanmenu');

    Route::post('addpemesanan',  [CustomerController::class, 'addPemesanan'])->name('addpemesanan');
    Route::post('hapuspesanan',  [CustomerController::class, 'cancelPemesanan'])->name('hapuspesanan');
    Route::post('addpemanggilan',[CustomerController::class, 'addPemanggilan'])->name('addpemanggilan');
    Route::post('bayar',         [CustomerController::class, 'bayar'])->name('bayar');
    Route::post('simpanulasan',  [CustomerController::class, 'saveUlasan'])->name('simpanulasan');
});

// ─── Shared profile routes (all staff roles) ──────────────────────────────────

Route::middleware(['auth', 'role:Manajer,Koki,Pelayan'])->group(function () {
    Route::get('editprofil',        [ProfilController::class, 'edit'])->name('profil.edit');
    Route::put('editprofiluser',    [ProfilController::class, 'update'])->name('editprofiluser');
    Route::put('editkodeloginkoki', [ProfilController::class, 'updatePassword'])->name('editkodeloginkoki');
});

// ─── Koki ─────────────────────────────────────────────────────────────────────

Route::middleware(['auth', 'role:Koki,Pelayan,Manajer'])->group(function () {
    Route::get('daftarpesanan',              [KokiController::class, 'index'])->name('koki.pesanan');
    Route::get('changestatus/{status}/{id}', [KokiController::class, 'changeStatus'])->name('koki.changestatus');
});

Route::middleware(['auth', 'role:Koki'])->group(function () {
    Route::get('statusmenu/{kategori}',  [KokiController::class, 'getStatusMenu'])->name('koki.statusmenu');
    Route::get('makeavailable/{id}',     [KokiController::class, 'makeAvailable'])->name('koki.makeavailable');
    Route::get('makeunavailable/{id}',   [KokiController::class, 'makeUnavailable'])->name('koki.makeunavailable');
});

// ─── Pelayan ──────────────────────────────────────────────────────────────────

Route::middleware(['auth', 'role:Pelayan,Manajer'])->group(function () {
    Route::get('listpemanggilan',        [PelayanController::class, 'getPemanggilan'])->name('pelayan.pesanan');
    Route::get('listpemanggilan',        [PelayanController::class, 'getPemanggilan'])->name('pelayan.pemanggilan');
    Route::post('removepemanggilan',     [PelayanController::class, 'removePemanggilan'])->name('removepemanggilan');
});

// ─── Manajer ─────────────────────────────────────────────────────────────────

Route::middleware(['auth', 'role:Manajer'])->group(function () {

    // Menu management
    Route::get('manajermenu',                     [ManajerMenuController::class, 'dasar'])->name('manajer.menu.dasar');
    Route::get('manajermenu/{kategori}',          [ManajerMenuController::class, 'index'])->name('manajer.menu.index');
    Route::get('addmenu',                         [ManajerMenuController::class, 'create'])->name('manajer.menu.create');
    Route::get('addmenupromosi',                  [ManajerMenuController::class, 'createPromosi'])->name('manajer.menu.createpromosi');
    Route::post('addmenu',                        [ManajerMenuController::class, 'store'])->name('addmenu_store');
    Route::get('editmenu/{id}',                   [ManajerMenuController::class, 'edit'])->name('manajer.menu.edit');
    Route::put('editmenu/{id}',                   [ManajerMenuController::class, 'update'])->name('editmenu_update');
    Route::get('deletemenu/{id}',                 [ManajerMenuController::class, 'destroy'])->name('manajer.menu.destroy');
    Route::get('manajermenu/{action}/{id}',       [ManajerMenuController::class, 'toggleRekomendasi'])->name('manajer.menu.rekomendasi');

    // Employee management
    Route::get('manajerkaryawan',                 [ManajerKaryawanController::class, 'index'])->name('manajer.karyawan.index');
    Route::get('manajerkaryawan/{role}',          [ManajerKaryawanController::class, 'indexByRole'])->name('manajer.karyawan.byRole');
    Route::get('addkoki',                         [ManajerKaryawanController::class, 'createKoki'])->name('manajer.karyawan.createkoki');
    Route::get('addpelayan',                      [ManajerKaryawanController::class, 'createPelayan'])->name('manajer.karyawan.createpelayan');
    Route::post('addkaryawan',                    [ManajerKaryawanController::class, 'store'])->name('addkaryawan_store');
    Route::get('editkaryawan/{id}',               [ManajerKaryawanController::class, 'edit'])->name('manajer.karyawan.edit');
    Route::put('editkaryawan/{id}',               [ManajerKaryawanController::class, 'update'])->name('editkaryawan_update');
    Route::get('deletekaryawan/{id}',             [ManajerKaryawanController::class, 'destroy'])->name('manajer.karyawan.destroy');

    // Table management
    Route::get('manajermeja',                     [ManajerMejaController::class, 'index'])->name('manajer.meja.index');
    Route::get('addmeja',                         [ManajerMejaController::class, 'create'])->name('manajer.meja.create');
    Route::post('addmeja',                        [ManajerMejaController::class, 'store'])->name('addmeja_store');
    Route::get('editmeja/{id}',                   [ManajerMejaController::class, 'edit'])->name('manajer.meja.edit');
    Route::put('editmeja/{id}',                   [ManajerMejaController::class, 'update'])->name('editmeja_update');
    Route::get('deletemeja/{id}',                 [ManajerMejaController::class, 'destroy'])->name('manajer.meja.destroy');

    // Statistics & reviews
    Route::get('ulasanlayanan',                   [ManajerMenuController::class, 'lihatLayanan'])->name('manajer.ulasanlayanan');
    Route::get('ulasanmenudetail/{id}',           [ManajerMenuController::class, 'ulasanMenuDetail'])->name('manajer.ulasanmenudetail');
    Route::get('statistikmingguan/{namaMinggu}',  [ManajerMenuController::class, 'statistikMingguan'])->name('manajer.statistikmingguan');
    Route::get('statistikbulanan/{namaBulan}',    [ManajerMenuController::class, 'statistikBulanan'])->name('manajer.statistikbulanan');
    Route::get('rangkumanstatistik',              [ManajerMenuController::class, 'rangkuman'])->name('manajer.rangkuman');
});
