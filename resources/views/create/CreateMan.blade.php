@extends('shapka')

@section('title')
    Добавление сотрудника
@endsection

@section('shapka_left')

    {{--  Если не зашли под ROOT  --}}
    @if(!isset($_SESSION['login']))
        @foreach($db_l as $lico)
            {{$lico->fam}} {{$lico->im}} {{$lico->otch}}
        @endforeach
    @endif

@endsection

@section('main')

    {{--  Если зашли под ROOT  --}}
    @if (isset($_SESSION['login']))
        <a href="{{route('tb_two')}}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <span class="fs-4">Назад</span>
        </a>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                <li>Некоторые поля были не заполнены</li>
            </ul>
        </div>
    @endif

    @if (isset($status))
        @if($status == 'log_error')
            <div class="alert alert-danger">
               <ul>
                    <li>Такой логин уже существует</li>
                </ul>
            </div>
        @endif

        @if ($status == 'log_error_root')
            <div class="alert alert-danger">
               <ul>
                    <li>Такой логин занят системой</li>
                </ul>
            </div>
        @endif

    @endif


    <div class="form_login mb-3">
        <form action="{{route('CreateMan')}}" method="post">
            @csrf
            <h1>Добавить сотрудника</h1>
            {{--     Занесение значений, которые были записаны до проверки логина       --}}
            @if (isset($snach))
                <input value="{{$snach['fam']}}" type="text" class="form-control" id="floatingInput" name="fam" placeholder="Фамилия сотрудника" width="20px">
                <br>
<<<<<<< HEAD
                <input value="{{$snach['im']}}" type="text" class="form-control" id="floatingInput" name="im" placeholder="Имя сотрудника" width="20px">
                <br>
                <input value="{{$snach['otch']}}" type="text" class="form-control" id="floatingInput" name="otch" placeholder="Отчество сотрудника" width="20px">
=======
                <input value="{{$snach['im']}}" type="text" class="form-control" id="floatingInput" name="im" placeholder="Фамилия сотрудника" width="20px">
                <br>
                <input value="{{$snach['otch']}}" type="text" class="form-control" id="floatingInput" name="otch" placeholder="Имя сотрудника" width="20px">
>>>>>>> Edit
                <br>
            @else
                <input type="text" class="form-control" id="floatingInput" name="fam" placeholder="Фамилия сотрудника" width="20px">
                <br>
                <input type="text" class="form-control" id="floatingInput" name="im" placeholder="Имя сотрудника" width="20px">
                <br>
                <input type="text" class="form-control" id="floatingInput" name="otch" placeholder="Отчество сотрудника" width="20px">
                <br>
            @endif

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
