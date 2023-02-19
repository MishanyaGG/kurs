@extends('shapka')

@section('title')
    Создание записи
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
        <form action="{{route('CreateZap')}}" method="post">
            @csrf
            <h1>Заполнение заявки</h1>
            <input type="text" class="form-control" id="floatingInput" name="name_zayavki" placeholder="Название заявки" width="20px">
            <br>
            <select class="form-select" id="validationCustom04" name="type" required>
                <option selected disabled value="">Выберите один из двух</option>
                <option>Ремонт</option>
                <option>Установка</option>
            </select>
            <br>
            <textarea class="info_texarea" placeholder="Краткая информация о заявке" name="info" maxlength="100" rows="3"></textarea>
            <input class="btn-sbm zp" type="submit" value="Создать заявку">
        </form>
    </div>
@endsection
