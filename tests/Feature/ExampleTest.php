<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\LicoModel;
use App\Models\ZayavkaModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_post_zayavka()
    {
        $_SESSION['id']=30;

        $response = $this->post('/CreateZap',[
            'name_zayavki'=>'test_unit',
            'type'=>'Ремонт',
            'info'=>'tests_in_unit_test'
        ]);

        $this->assertDatabaseHas('zayavka',[
            'name_zayavki'=>'test_unit'
        ]);

        ZayavkaModel::where('name_zayavki','=','test_unit')->delete();

        session_destroy();
    }
    public function test_loced_zayavka(){

        $zayavka = new ZayavkaModel();

        $zayavka->id = 1;
        $zayavka->name_zayavki = 'test_lock';
        $zayavka->type = 'Установка';
        $zayavka->info = 'test_lock';
        $zayavka->status = 'not_done';
        $zayavka->date_start = date('y-m-d');
        $zayavka->lico_id = 22;

        $zayavka->save();

//        $zayavka = ZayavkaModel::factory()->create([
//            'id'=>1,
//            'name_zayavki'=>'test_lock',
//            'type'=>'Установка',
//            'info'=>'test_lock',
//            'status'=>'not_done',
//            'date_start'=>date('y-m-d'),
//            'lico_id'=>22
//        ]);

        $this->assertDatabaseHas('zayavka',[
            'id'=>1
        ]);

        $this->get('/locked/1');

        $this->assertDatabaseHas('zayavka',[
            'status'=>'done'
        ]);

        ZayavkaModel::destroy(1);

        session_destroy();
    }

    public function test_post_lico(){
        $response = $this->post('/CreateMan',[
            'fam'=>'Test',
            'im'=>'Test',
            'otch'=>'Test',
            'job_title'=>'6',
            'log'=>'Test',
            'pass'=>'Test'
        ]);

        $this->assertDatabaseHas('lico',[
            'login'=>'Test'
        ]);

        LicoModel::where('login','=','Test')->delete();

        session_destroy();
    }

    public function test_delete_lico(){
        $user = new LicoModel();

        $user->id = 1;
        $user->im = 'Test';
        $user->fam = 'Test';
        $user->otch = 'Test';
        $user->login = 'Test';
        $user->password = 'Test';
        $user->job_title_id = 6;

        $user->save();

        $this->assertDatabaseHas('lico',[
            'id'=>1
        ]);

        $this->get('/tb_two/delete/'.$user->id);

        if($this->count(LicoModel::where('id','=',1)->get()) == 0)
            return;

        session_destroy();
    }

    public function test_post_login(){

        session_destroy();
        $log = $this->post('/login',[
            'login'=>'petyaGG',
            'pass'=>'123'
        ]);

        $response = $this->get('tb_one');
        $response->assertOk();
    }
}
