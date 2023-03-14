@extends('shapka')

@section('title')
    Отчет о заявках
@endsection

@section('main')
    <h1 align="center">Информация о всех заявках</h1>

    <a href="{{route('etot_mesyac')}}"><button class="btn btn-danger ai">За этот месяц</button></a>
    <a href="#"><button class="btn btn-danger ai">Которые закрыты</button></a>
    <a href="#"><button class="btn btn-danger ai">Которые не закрыты</button></a>

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
@endsection
