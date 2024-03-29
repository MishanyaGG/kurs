@extends('shapka')

@section('title')
    Главная страница
@endsection

@section('shapka_left')

    @foreach($db_l as $lico)
        {{$lico->fam}} {{$lico->im}} {{$lico->otch}}
    @endforeach

@endsection

@section('bt-main')
    <ul class="nav nav-pills">
        <li class="nav-item"><a class="a_info" href="{{route('CreateZap')}}"><button type="button" class="btn btn-danger ai aish">Создать запись</button></a></li>
        <li class="nav-item"><a class="a_info" href="{{route('CreateMan')}}"><button type="button" class="btn btn-danger ai aish">Добавить сотрудника</button></a></li>
        <li class="nav-item"><a class="a_info" href="{{route('otсhet')}}"><button type="button" class="btn btn-danger ai aish">Отчеты</button></a></li>
        <li class="nav-item"><a class="a_info" href="{{route('index')}}"><button type="button" class="btn btn-danger ai aish">Выйти</button></a></li>
    </ul>
@endsection

@section('main')
    <div class="btn_li">
        <a class="a_info" href="{{route('tb_all')}}"><button type="button" class="btn btn-danger ai">Все заявки</button></a>
        <a class="a_info" href="{{route('tb_one')}}"><button type="button" class="btn btn-danger ai">Личные заявки</button></a>
        <a class="a_info" href="{{route('tb_two')}}"><button type="button" class="btn btn-danger main">Сотрудники</button></a>
    </div>

    <table class="table border-dark table-bordered">
        <tr>
            <th>№</th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Должность</th>
            <th>Логин</th>
            <th>Пароль</th>
        </tr>
        @foreach($db as $d)
        <tr>
            @if ($d->id == $_SESSION['id'])
                <td><u><strong>{{$d->id}}</strong></u></td>
                <td><u><strong>{{$d->fam}}</strong></u></td>
                <td><u><strong>{{$d->im}}</strong></u></td>
                <td><u><strong>{{$d->otch}}</strong></u></td>
                <td><u><strong>{{$d->title}}</strong></u></td>
                <td><u><strong>{{$d->login}}</strong></u></td>
                <td><u><strong>{{$d->password}}</strong></u></td>
            @else
                <td>{{$d->id}}</td>
                <td>{{$d->fam}}</td>
                <td>{{$d->im}}</td>
                <td>{{$d->otch}}</td>
                <td>{{$d->title}}</td>
                <td>{{$d->login}}</td>
                @if($d->title != "Администратор")
                    <td>{{$d->password}}</td>
                    <td><a href="{{route('tb_two_del',$d->id)}}"><button type="button" class="btn btn-danger">Удалить сотрудника</button></a></td>
                @else
                    <td>Пароль скрыт</td>
                    <td></td>
               @endif
            @endif
        </tr>
        @endforeach
    </table>

    @if($count>6)
        <div align="center">
            {{$db->links()}}
        </div>
    @endif
@endsection
