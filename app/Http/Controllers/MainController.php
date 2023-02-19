<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    // Главная страница (ВХОД)
    public function index(){

        // Вывод представления
        return view('index',['key'=>false]);
    }

    public function login(Request $rq){

        $login = $rq->input('login');
        $pass = $rq->input('pass');

        $validate = $rq->validate([
           'login'=>'required',
           'pass'=>'required'
        ]);

        $db = DB::table('login')
            ->where('login','=',$login)
            ->where('password','=',$pass)
            ->get();

        $count = $db->count();

        if ($count == 0){
            $key = true;

            return view('index',['key'=>$key]);
        }
        else{

            foreach ($db as $d)
                $_SESSION['id'] = $d->id;

            return redirect()->route('tb_one');
        }
    }

    // Таблица ЗАЯВКИ
    public function table_one(){

        // Получаем таблицу ЗАЯВКИ
        $db_z = DB::table('zayavka')->get();

        // Получаем таблицу ПОЛЬЗОВАТЕЛЬ
        $db_l = DB::table('lico')
            ->where('id','=',$_SESSION['id'])
            ->get();

        // Вывод представления и инициализация переменной для представления
        return view('table/table_one',['db'=>$db_z,'db_l'=>$db_l]);
    }

    //Страница ПОДРОБНАЯ ИНФОРМАЦИЯ О ЗАЯВКЕ
    public function info($id){

        // Запросник о выводе ПОДРОБНОЙ ИНФОРМАЦИИ О ЗАЯВКЕ
        $db = DB::table('zayavka')
                  ->join('lico','lico_id','=','lico.id')
                  ->select('zayavka.*','lico.im','lico.fam','lico.otch')
                  ->where('zayavka.id','=',$id)
                  ->get();

        // Получаем таблицу ПОЛЬЗОВАТЕЛЬ
        $db_l = DB::table('lico')
            ->where('id','=',$_SESSION['id'])
            ->get();

        // Вывод представления и инициализация переменной для представления
        return view('info',['db'=>$db,'db_l'=>$db_l]);
    }

    // Таблица СОТРУДНИКИ
    public function table_two(){

        // Запросник на таблицу СОТРУДНИКИ
        $db = DB::table('lico')
            ->join('job_title','lico.job_title_id','=','job_title.id')
            ->select('lico.id','fam','im','otch','job_title.title')
            ->get();

        // Получаем таблицу ПОЛЬЗОВАТЕЛЬ
        $db_l = DB::table('lico')
            ->where('id','=',$_SESSION['id'])
            ->get();

        // Вывод представления и инициализация переменной для представления
        return view('table/table_two',['db'=>$db,'db_l'=>$db_l]);
    }

    // Страница СОЗДАНИЕ ЗАПИСИ (GET)
    public function create_zap_get(){

        // Получаем таблицу ПОЛЬЗОВАТЕЛЬ
        $db_l = DB::table('lico')
            ->where('id','=',$_SESSION['id'])
            ->get();

        // Вывод представления
        return view('create/CreateZap',['db_l'=>$db_l]);
    }

    // Страница СОЗДАНИЕ ЗАПИСИ (POST)
    public function create_zap_post(Request $rq){

        // Получение данных из формы
        $name_zayavki = $rq->input('name_zayavki');
        $type = $rq->input('type');
        $info = $rq->input('info');
        $date_start = date('Y.m.d');
        $lico_id = $_SESSION['id'];

        // Валидация
        $validated = $rq->validate([
            'name_zayavki'=>'required',
            'type'=>'required',
            'info'=>'required'
        ]);

        // INSERT
        $db = DB::table('zayavka')
            ->insert([
                'name_zayavki'=>$name_zayavki,
                'type'=>$type,
                'info'=>$info,
                'date_start'=>$date_start,
                'lico_id'=>$lico_id
            ]);

        // Получаемм список ЗАЯВОК
        $db = DB::table('zayavka')->get();

        // Получаем таблицу ПОЛЬЗОВАТЕЛЬ
        $db_l = DB::table('lico')
            ->where('id','=',$_SESSION['id'])
            ->get();

        // Вывод представления и инициализация переменной для представления
        return view('table_one',['db'=>$db,'db_l'=>$db_l]);
    }

    // Форма добавления СОТРУДНИКА
    public function create_man_get(){

        // Получаемм список ДОЛЖНОСТЕЙ
        $db = DB::table('job_title')->get();

        // Получаем таблицу ПОЛЬЗОВАТЕЛЬ
        $db_l = DB::table('lico')
            ->where('id','=',$_SESSION['id'])
            ->get();

        // Вывод представления и инициализация переменной для представления
        return view('create/CreateMan',['db'=>$db,'db_l'=>$db_l]);
    }

    //Форма заполнения СОТРУДНИКИ (INSERT)
    public function create_man_post(Request $rq){

        // Валидация
        $validated = $rq->validate([
            'fam'=>'required',
            'im'=>'required',
            'otch'=>'required',
            'log'=>'required',
            'pass'=>'required',
            'job_title'=>'required'
        ]);

        // Получение данных из формы
        $fam = $rq->input('fam');
        $im = $rq->input('im');
        $otch = $rq->input('otch');
        $job_title = $rq->input('job_title');
        $log = $rq->input('log');
        $pass = $rq->input('pass');

        // INSERT
        $db = DB::table('lico')->insert([
            'fam'=>$fam,
            'im'=>$im,
            'otch'=>$otch,
            'login'=>$log,
            'password'=>$pass,
            'job_title_id'=>$job_title
        ]);

        // Запросник на таблицу СОТРУДНИКИ
        $db = DB::table('lico')
            ->join('job_title','lico.job_title_id','=','job_title.id')
            ->select('lico.id','fam','im','otch','job_title.title')
            ->get();

        // Вывод представления и инициализация переменной для представления
        return view('table_two',['db'=>$db]);
    }

    //Удаление СОТРУДНИКА
    public function delete_man($id){

        // Находим необходимого СОТРУДНИКА
        DB::table('lico')->where('id',$id)->delete();

        // Запросник на таблицу СОТРУДНИКИ
        $db = DB::table('lico')
            ->join('job_title','lico.job_title_id','=','job_title.id')
            ->select('lico.id','fam','im','otch','job_title.title')
            ->get();

        // Получаем таблицу ПОЛЬЗОВАТЕЛЬ
        $db_l = DB::table('lico')
            ->where('id','=',$_SESSION['id'])
            ->get();

        // Вывод представления и инициализация переменной для представления
        return view('table_two',['db'=>$db,'db_l'=>$db_l]);
    }
}
