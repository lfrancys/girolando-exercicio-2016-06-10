<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;

class AuthTest extends TestCase
{
    use WithoutMiddleware;
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateUser()
    {
        $dados = [
            'name' => 'Lorenna',
            'email' => 'luz4@gmail.com',
            'password' => Hash::make('Lorenna')
        ];
        factory('App\User')->create($dados);
        $this->seeInDatabase('homestead.users', $dados);
    }

   /* public function testRegister(){
        $dados = [
            'name' => 'Lorenna',
            'email' => 'lo8@gmail.com',
            'password' => Hash::make('Lorenna')
        ];
        $response = $this->post('register', $dados);
        $this->assertResponseStatus(200);
    }*/

    public function testLogout()
    {
        //Auth::logout();
        $user = factory('App\User')->create();
        $response = $this->actingAs($user)->call('GET', 'logout');
        $this->assertRedirectedTo('/');
        //$this->assertResponseStatus(302); //redirecionado


    }

    public function testLogin()
    {
        $user = [
            'email' => 'luannafrancys@gmail.com',
            'password' => Hash::make('luanna')
        ];

        $response = $this->post('login', $user);
        $this->assertResponseStatus(302);//redirecionado
        //$this->assertRedirectedTo('/home');
    }

   /* public function testUserRegistration()
    {

    }*/




}

