@extends('shapka')

@section('title')
    Добавление сотрудника
@endsection

@section('shapka_left')

    @foreach($db_l as $lico)
        {{$lico->fam}} {{$lico->im}} {{$lico->otch}}
    @endforeach

@endsection

@section('main')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                <li>Некоторые поля были не заполнены</li>
            </ul>
        </div>
    @endif

    <div class="form_login mb-3">
        <form action="{{route('CreateMan')}}" method="post">
            @csrf
            <h1>Добавить сотрудника</h1>
            <input type="text" class="form-control" id="floatingInput" name="fam" placeholder="Фамилия сотрудника" width="20px">
            <br>
            <input type="text" class="form-control" id="floatingInput" name="im" placeholder="Имя сотрудника" width="20px">
            <br>
            <input type="text" class="form-control" id="floatingInput" name="otch" placeholder="Отчество сотрудника" width="20px">
            <br>
            <select class="form-select" id="validationCustom04" name="job_title" required>
                <option selected disabled value="">Должность сотрудника</option>
                @foreach($db as $d)
                    <option value="{{$d->id}}">{{$d->title}}</option>
                @endforeach
            </select>
            <br>
            <input type="text" class="form-control" id="floatingInput" name="log" placeholder="Логин" maxlength="40"><br>
            <input type="password" class="form-control" id="floatingInput" name="pass" placeholder="Пароль" maxlength="40"><br>
            <input class="btn-sbm man" type="submit" value="Добавить сотрудника">
        </form>
    </div>
@endsection
