<?php

use App\Kelurahan;

class CrudsKelurahanTest extends TestCase {

    /**
     * A basic test example.
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $this->setDB();
    }

    public function testCrudKelurahan() {
//      LOGIN sebagai admin
        $this->visit('/login')
                ->type('admin@laravel.com', 'email')
                ->type('admin', 'password')
                ->press('login');
//      cek halaman depan
        $this->visit('/home')
                ->see('Logout')
                ->see('admin');

//      cek halaman crud kelurahan
        $this->visit('/kelurahan')
                ->see('Data Kelurahan')
                ->click('Tambah Data Kelurahan');

//      cek halaman form tambah
        $this->visit('/kelurahan/create')
                ->see('Tambah Kelurahan');
//      tambah kelurahan

        $this->visit('/kelurahan/create')
                ->type('cicingkung', 'nama_kel')
                ->type('cibiru', 'nama_kec')
                ->type('bandung', 'nama_kota')
                ->press('Simpan');
        $this->visit('/kelurahan')
                ->see('cicingkung');
    }

    public function testEditKelurahan() {
//      LOGIN sebagai admin
        $this->visit('/login')
                ->type('admin@laravel.com', 'email')
                ->type('admin', 'password')
                ->press('login');

//      dapatkan data terakhir
        $data = Kelurahan::orderBy('created_at', 'desc')->first();
        $id = json_encode($data->id);
//      cek halaman pasien dan click card
        $this->visit("/kelurahan/$id/edit")
                ->see('Edit Data Kelurahan');

//      update data pasien
        $this->visit("/kelurahan/$id/edit")
                ->type('cimuncang', 'nama_kel')
                ->press('Simpan');
    }

    public function testCekDataShow() {
//      LOGIN sebagai admin
        $this->visit('/login')
                ->type('admin@laravel.com', 'email')
                ->type('admin', 'password')
                ->press('login');

//      dapatkan data terakhir
        $data = Kelurahan::orderBy('created_at', 'desc')->first();
        $id = json_encode($data->id);
//      cek halaman kelurahan
        $this->visit("/kelurahan/$id")
                ->see('cimuncang');
    }

    public function testDelete() {
        Kelurahan::truncate();
    }

}
