@extends('shapka')

@section('title')
    Отчет о заявках
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
    <h1 align="center">Информация о всех заявках</h1>

    <div class="btn_li">
        @if($main == 'main')
            <a class="a_info" href="{{route('etot_mesyac')}}"><button type="button" class="btn btn-danger main">За этот месяц</button></a>
        @else
            <a class="a_info" href="{{route('etot_mesyac')}}"><button type="button" class="btn btn-danger ai">За этот месяц</button></a>

            <a class="a_info" href="#"><button type="button" class="btn btn-danger ai">Которые закрыты</button></a>
        @endif

    </div>

    @if(count($db)!=0)

    <table class="table border-dark table-bordered">
        <tr>
            <th>Название заявки</th>
            <th>Тип заявки</th>
            <th>Краткая информация</th>
            <th>Дата подачи</th>
            <th>Дата окончания</th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
        </tr>
        @foreach($db as $d)
            <tr>
                <td>{{$d->name_zayavki}}</td>
                <td>{{$d->type}}</td>
                <td>{{$d->info}}</td>
                <td>{{$d->date_start}}</td>

                @if(!$d->date_end == null)
                    <td>{{$d->date_end}}</td>
                @else
                    <td>Не завершен</td>
                @endif

                <td>{{$d->fam}}</td>
                <td>{{$d->im}}</td>
                <td>{{$d->otch}}</td>

            </tr>
        @endforeach
    </table>
    @else
        <h1 align="center">Нет зявок</h1>
    @endif
@endsection
