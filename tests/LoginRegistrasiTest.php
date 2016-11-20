<?php

use App\User;

class LoginRegistrasiTest extends TestCase {

    /**
     * A basic test example.
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $this->setDB();
    }

    public function testBasicExample() {
        $this->visit('/')
                ->see('Laravel 5');
    }

    public function testRegistrasi() {
        $this->visit('/users/create')
                ->type('Reky', 'name')
                ->type('rekysenjaya@gmail.com', 'email')
                ->type('okeypassword', 'password')
                ->press('submit');
        $this->visit('/home')
                ->see('Logout')
                ->see('Reky');
    }

    public function testLogin() {
        $this->visit('/login')
                ->type('rekysenjaya@gmail.com', 'email')
                ->type('okeypassword', 'password')
                ->press('login');
        $this->visit('/home')
                ->see('Logout')
                ->see('Reky');
    }

    public function testLogout() {
        $this->visit('/login')
                ->type('rekysenjaya@gmail.com', 'email')
                ->type('okeypassword', 'password')
                ->press('login');
        $this->visit('/home')
                ->click('Logout');
    }

    public function testValidation() {
        $this->visit('/users/create')
                ->type('Reky', 'name')
                ->type('rekysenjaya@gmail.com', 'email')
                ->type('okeypassword', 'password')
                ->press('submit');
        $this->visit('/users/create')
                ->see('name');
    }

    public function testDelete() {
        $user = User::where('email', '=', 'rekysenjaya@gmail.com');
        $user->delete();
    }

}
