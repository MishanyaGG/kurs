@extends('shapka')

@section('title')
    Подробная информация о заявке
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
                <li class="nav-item"><a class="a_info" href="{{route('otсhet')}}"><button type="button" class="btn btn-danger ai aish">Отчеты</button></a></li>
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
            @if($d->title == "Администратор")
                <a class="a_info" href="{{route('tb_all')}}"><button type="button" class="btn btn-danger ai">Все заявки</button></a>
                <a class="a_info" href="{{route('tb_one')}}"><button type="button" class="btn btn-danger ai">Личные заявки</button></a>
                <a class="a_info" href="{{route('tb_two')}}"><button type="button" class="btn btn-danger ai">Сотрудники</button></a>
            @else
                <a class="a_info" href="{{route('tb_all')}}"><button type="button" class="btn btn-danger ai">Все заявки</button></a>
                <a class="a_info" href="{{route('tb_one')}}"><button type="button" class="btn btn-danger ai">Личные заявки</button></a>
            @endif
        @endforeach
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
            Дата подачи {{$d->date_start}}
        </div>

        @if($d->status != "done")
            @foreach($db_m as $dm)
                @if($dm->title == 'Администратор')
                    <div class="btn_info">
                        <a href="{{route('locked',$d->id)}}"><button type="button" class="btn btn-danger dg">Завершить заявку</button></a>
                    </div>
                @endif
            @endforeach
        @else
            <div class="date_info">
                Дата завершения {{$d->date_end}}
            </div>
        @endif
    @endforeach
@endsection
