<?php

use App\Kelurahan;
use App\Pasien;
use App\User;

class CrudPasienTest extends TestCase {

    /**
     * A basic test example.
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $this->setDB();
    }

    public function testCrudOperator() {
//      tambah operator
        $this->visit('/users/create')
                ->type('Reky', 'name')
                ->type('rekysenjaya@gmail.com', 'email')
                ->type('okeypassword', 'password')
                ->press('submit');
//      cek halaman depan
        $this->visit('/home')
                ->see('Logout')
                ->see('Reky');
//      cek halaman crud pasien
        $this->visit('/pasien')
                ->see('Nama Pasien')
                ->click('Tambah Data Pasien');

//      cek halaman form tambah
        $this->visit('/pasien/create')
                ->see('Simpan');
//      tambah pasien operator
//      tambah dulu kelurahan untuk option
        $kel = new Kelurahan;
        $kel->nama_kel = 'cis';
        $kel->nama_kec = 'cin';
        $kel->nama_kota = 'ban';
        $kel->save();
        $id = json_decode($kel->toJson())->id;

        $this->visit('/pasien/create')
                ->type('Yusup s', 'nama')
                ->type('Jjl cinambo gank h mahdi', 'alamat')
                ->type('08647474744', 'no_telepon')
                ->type('1', 'rt')
                ->type('4', 'rw')
                ->select("$id", 'id_kelurahan')
                ->type('04-08-1993', 'tanggal_lahir')
                ->select('Laki laki', 'jenis_kelamin')
                ->press('Simpan');
        $this->visit('/pasien')
                ->see('Yusup s');
    }

    public function testEditPasien() {
//      LOGIN   
        $this->visit('/login')
                ->type('rekysenjaya@gmail.com', 'email')
                ->type('okeypassword', 'password')
                ->press('login');

//      dapatkan data terakhir
        $data = Pasien::orderBy('created_at', 'desc')->first();
        $id = json_encode($data->id);
//      cek halaman pasien dan click card
        $this->visit("/pasien/$id/edit")
                ->see('Edit Data Kelurahan');
                
//      update data pasien
        $this->visit("/pasien/$id/edit")
                ->type('Yusup Subagja', 'nama')
                ->press('Simpan');
    }

    public function testCardPasien() {
//      LOGIN   
        $this->visit('/login')
                ->type('rekysenjaya@gmail.com', 'email')
                ->type('okeypassword', 'password')
                ->press('login');

//      dapatkan data terakhir
        $data = Pasien::orderBy('created_at', 'desc')->first();
        $id = json_encode($data->id);
//      cek halaman Card pasien
        $this->visit("/pasien/$id")
                ->see('Kartu Pasien')
//              cek nama kartu
                ->see('Yusup Subagja')                
//              cek no id
                ->see("$id");
    }

    public function testDelete() {
        $user = User::where('email', '=', 'rekysenjaya@gmail.com');
        $user->delete();


        Pasien::truncate();
    }

}
