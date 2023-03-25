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
                <a class="a_info" href="{{route('tb_all')}}"><button type="button" class="btn btn-danger ai">Все заявки</button></a>

                <div class="dropdown">
                    <button type="button" class="btn btn-danger dropdown-toggle main" data-bs-toggle="dropdown">Личные заявки</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('tb_one')}}">Все заявки</a></li>
                            <li><a class="dropdown-item" href="{{route('tb_one_not_done')}}">Которые не сделаны</a></li>
                            <li><a class="dropdown-item" href="{{route('tb_one_done')}}">Которые сделаны</a></li>
                        </ul>
                </div>

                <a class="a_info" href="{{route('tb_two')}}"><button type="button" class="btn btn-danger ai">Сотрудники</button></a>
            @else

                <a class="a_info" href="{{route('tb_all')}}"><button type="button" class="btn btn-danger ai">Все заявки</button></a>

                <div class="dropdown">
                    <button type="button" class="btn btn-danger dropdown-toggle main" data-bs-toggle="dropdown">Личные заявки</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('tb_one')}}">Все заявки</a></li>
                            <li><a class="dropdown-item" href="{{route('tb_one_not_done')}}">Которые не сделаны</a></li>
                            <li><a class="dropdown-item" href="{{route('tb_one_done')}}">Которые сделаны</a></li>
                        </ul>
                </div>
            @endif
        @endforeach
    </div>

    @if($count != 0)
    <table class="table border-dark table-bordered">
        <tr>
            <th>Название заявки</th>
            <th>Тип заявки</th>
            <th>Краткая информация</th>
            <th>Дата подачи</th>
            <th>Статус заявки</th>
        </tr>
        @foreach($db as $d)
            <tr>
                <td><a class="tb" href="{{route('info',$d->id)}}">{{$d->name_zayavki}}</a></td>
                <td><a class="tb" href="{{route('info',$d->id)}}">{{$d->type}}</a></td>
                <td><a class="tb" href="{{route('info',$d->id)}}">{{$d->info}}</a></td>
                <td><a class="tb" href="{{route('info',$d->id)}}">{{$d->date_start}}</a></td>
                @if($d->status == "done")
                    <td><a class="tb" href="{{route('info',$d->id)}}">Сделана (дата завершения: {{$d->date_end}})</a></td>
                @else
                    <td><a class="tb" href="{{route('info',$d->id)}}">Не сделана</a></td>
                @endif
            </tr>
        @endforeach
    </table>
    @else
        <h1 align="center">Нет зявок</h1>
    @endif
@endsection
