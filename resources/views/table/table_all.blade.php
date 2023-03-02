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
        @foreach($db_m as $d)
            @if($d->title == "Администратор")
                <li class="nav-item"><a class="a_info" href="{{route('CreateZap')}}"><button type="button" class="btn btn-danger ai aish">Создать запись</button></a></li>
                <li class="nav-item"><a class="a_info" href="{{route('CreateMan')}}"><button type="button" class="btn btn-danger ai aish">Добавить сотрудника</button></a></li>
            @else
                <li class="nav-item"><a class="a_info" href="{{route('CreateZap')}}"><button type="button" class="btn btn-danger ai aish">Создать запись</button></a></li>
            @endif
        @endforeach
        <li class="nav-item"><a class="a_info" href="{{route('index')}}"><button type="button" class="btn btn-danger ai aish">Выйти</button></a></li>
    </ul>
@endsection

@section('main')
    <div class="btn_li">
        @foreach($db_m as $d)
            @if($d->title =="Администратор")

                <div class="dropdown">
                    <button type="button" class="btn btn-danger dropdown-toggle main" data-bs-toggle="dropdown">Все заявки</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('tb_all')}}">Все заявки</a></li>
                            <li><a class="dropdown-item" href="{{route('tb_all_not_done')}}">Которые не закрыты</a></li>
                            <li><a class="dropdown-item" href="{{route('tb_all_done')}}">Которые закрыты</a></li>
                        </ul>
                </div>

                <a class="a_info" href="{{route('tb_one')}}"><button type="button" class="btn btn-danger ai ">Личные заявки</button></a>
                <a class="a_info" href="{{route('tb_two')}}"><button type="button" class="btn btn-danger ai">Сотрудники</button></a>
            @else

                <div class="dropdown">
                    <button type="button" class="btn btn-danger dropdown-toggle main" data-bs-toggle="dropdown">Все заявки</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('tb_all')}}">Все заявки</a></li>
                            <li><a class="dropdown-item" href="{{route('tb_all_not_done')}}">Которые не закрыты</a></li>
                            <li><a class="dropdown-item" href="{{route('tb_all_done')}}">Которые закрыты</a></li>
                        </ul>
                </div>

                <a class="a_info" href="{{route('tb_one')}}"><button type="button" class="btn btn-danger ai">Личные заявки</button></a>
            @endif
        @endforeach
    </div>

    @if($count != 0)
    <table class="table border-dark table-bordered">
        <tr>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Название заявки</th>
            <th>Краткая информация</th>
            <th>Дата подачи</th>
        </tr>
        @foreach($db as $d)
            <tr>
                <td><a class="tb" href="{{route('info',$d->id)}}">{{$d->fam}}</a></td>
                <td><a class="tb" href="{{route('info',$d->id)}}">{{$d->im}}</a></td>
                <td><a class="tb" href="{{route('info',$d->id)}}">{{$d->name_zayavki}}</a></td>
                <td><a class="tb" href="{{route('info',$d->id)}}">{{$d->info}}</a></td>
                <td><a class="tb" href="{{route('info',$d->id)}}">{{$d->date_start}}</a></td>
            </tr>
        @endforeach
    </table>
    @else
        <h1 align="center">Нет зявок</h1>
    @endif
@endsection
