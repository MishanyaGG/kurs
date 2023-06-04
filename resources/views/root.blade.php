@extends('shapka')

@section('title')
    ROOT
@endsection

{{--@section('shapka_left')--}}

{{--    @foreach($db_l as $lico)--}}
{{--        {{$lico->fam}} {{$lico->im}} {{$lico->otch}}--}}
{{--    @endforeach--}}

{{--@endsection--}}

@section('bt-main')
    <ul class="nav nav-pills">
        <li class="nav-item"><a class="a_info" href="{{route('CreateMan')}}"><button type="button" class="btn btn-danger ai aish">Добавить сотрудника</button></a></li>
        <li class="nav-item"><a class="a_info" href="{{route('index')}}"><button type="button" class="btn btn-danger ai aish">Выйти</button></a></li>
    </ul>
@endsection

@section('main')
    <div class="btn_li">
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
            <td>{{$d->id}}</td>
            <td>{{$d->fam}}</td>
            <td>{{$d->im}}</td>
            <td>{{$d->otch}}</td>
            <td>{{$d->title}}</td>
            <td>{{$d->login}}</td>
            <td>{{$d->password}}</td>
            <td><a href="{{route('tb_two_del',$d->id)}}"><button type="button" class="btn btn-danger">Удалить сотрудника</button></a></td>
        </tr>
        @endforeach
    </table>

    @if($count>6)
        <div align="center">
            {{$db->links()}}
        </div>
    @endif
@endsection
