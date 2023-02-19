@extends('shapka')

@section('title')
    Главная страница
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
        <a class="a_info" href="{{route('tb_one')}}"><button type="button" class="btn btn-danger main">Заявки</button></a>
        <a class="a_info" href="{{route('tb_two')}}"><button type="button" class="btn btn-danger ai">Сотрудники</button></a>
    </div>

    <table class="table border-dark table-bordered">
        <tr>
            <th>Название заявки</th>
            <th>Тип заявки</th>
            <th>Краткая информация</th>
            <th>Дата подачи</th>
        </tr>
        @foreach($db as $d)
        <tr>
            <td><a class="tb" href="{{route('info',$d->id)}}">{{$d->name_zayavki}}</a></td>
            <td><a class="tb" href="{{route('info',$d->id)}}">{{$d->type}}</a></td>
            <td><a class="tb" href="{{route('info',$d->id)}}">{{$d->info}}</a></td>
            <td><a class="tb" href="{{route('info',$d->id)}}">{{$d->date_start}}</a></td>
        </tr>
        @endforeach
    </table>
@endsection
