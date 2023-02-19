@extends('shapka')

@section('title')
    Вход
@endsection

@section('login')
    Вход
@endsection

@section('main')

    @if($key==true)
        <div class="alert alert-danger">
            <ul>
                <li>Неверный логин или пароль</li>
            </ul>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                <li>Некоторые поля были не заполнены</li>
            </ul>
        </div>
    @endif

    <!--ФОРМА ЛОГИНА-->
    <div class="form_login mb-3">
        <form action="{{route('login')}}" method="post">
            @csrf
            <h1>Введите логин и пароль</h1>
            <input type="text" class="form-control" id="floatingInput" name="login" placeholder="Логин" width="20px">
            <br>
            <input type="password" class="form-control" id="floatingInput" name="pass" placeholder="Пароль" maxlength="40"><br>
            <input class="btn-sbm" type="submit" value="Войти">
        </form>
    </div>
@endsection
