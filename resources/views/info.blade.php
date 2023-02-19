@extends('shapka')

@section('title')
    Подробная информация о заявке
@endsection

@section('login')

    @foreach($db_l as $lico)
        {{$lico->fam}} {{$lico->im}} {{$lico->otch}}
    @endforeach

@endsection

@section('bt-main')
    <ul class="nav nav-pills">
        <li class="nav-item"><a class="a_info" href="{{route('CreateZap')}}"><button type="button" class="btn btn-danger ai aish">Создать запись</button></a></li>
        <li class="nav-item"><a class="a_info" href="{{route('CreateMan')}}"><button type="button" class="btn btn-danger ai aish">Добавить сотрудника</button></a></li>
        <li class="nav-item"><a class="a_info" href="{{route('index')}}"><button type="button" class="btn btn-danger ai aish">Выйти</button></a></li>
    </ul>
@endsection

@section('main')
    <div class="btn_li">
        <a class="a_info" href="{{route('tb_one')}}"><button type="button" class="btn btn-danger ai">Заявки</button></a>
        <a class="a_info" href="{{route('tb_two')}}"><button type="button" class="btn btn-danger ai">Сотрудники</button></a>
    </div>
    @foreach($db as $d)
    <div class="info">
        <div class="sag"><h2>{{$d->name_zayavki}}</h2></div>
        <div><h1>{{$d->fam}} {{$d->im}} {{$d->otch}}</h1></div>
    </div>

    <div class="info_text">
        {{$d->info}}
    </div>

    <div class="date_info">
        {{$d->date_start}}
    </div>

    <div class="btn_info">
        <button type="button" class="btn btn-danger dg">Завершить заявку</button>
    </div>
    @endforeach
@endsection
