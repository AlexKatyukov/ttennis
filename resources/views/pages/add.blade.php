@extends('includes.main')

@section('maincontent')
    <div class="container py-5">
        <div class="col-12">
            <h4 class="mb-3">Добавить точку на карту</h4>

            <div class="alert alert-info" role="alert">
                Привет! Это форма, чтобы добавить точку на карту. Обратите внимание:
                <ul>
                    <li>Проверяем каждую точку перед добавлением на сайт, появится не мгновенно</li>
                    <li>Если точка работает два часа в день бесплатно, а остальное время платно, она считается платной</li>
                    <li>Мы не храним цены, потому что они имеют свойство меняться, но мы храним адреса на прайс-листы</li>
                    <li>Пожалуйста, проверьте, нет ли точки, которую вы хотите предложить, на нашей карте</li>
                    <li>Если нужно исправить данные в существующей точке, воспользуйтесь соответствующей ссылкой</li>
                </ul>
            </div>

            @if (session('status') == 'ok')
                <div class="alert alert-success">
                    Данные успешно отправлены, спасибо!
                </div>
            @endif

            <form action="/add/process" method="post" class="needs-validation" novalidate="">
                <div class="row g-3">
                    <div class="col-12 col-md-9">
                        <label for="name" class="form-label">Название точки</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Например, название парка / сквера или адрес дома неподалёку" value="{{ old('name') }}" required="">
                        @error('name')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-3">
                        <label for="num" class="form-label">Количество столов</label>
                        <input type="text" class="form-control" id="num" name="num" placeholder="" value="{{ old('num') }}" min="1" required="">
                        <div class="invalid-feedback">
                            Введите точное количество столов
                        </div>
                        @error('num')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="coordinates" class="form-label">Координаты  <span class="text-muted">(можно узнать <a href="https://snipp.ru/tools/address-coord" target="_blank">здесь</a>)</span></label>
                        <input type="input" class="form-control" id="coordinates" name="coordinates" placeholder="55.750824803657714,37.6165831330424" value="{{ old('coordinates') }}" required="">
                        @error('coordinates')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="coverage" class="form-label">Покрытие</label>
                        <select class="form-select" id="coverage" name="coverage" required="">
                            <option value="">Выберите...</option>
                            <option value="пластик" @if(old('coverage') == 'пластик')selected @endif>Пластик</option>
                            <option value="дерево" @if(old('coverage') == 'дерево')selected @endif>Дерево</option>
                            <option value="камень" @if(old('coverage') == 'камень')selected @endif>Камень</option>
                            <option value="неизвестно" @if(old('coverage') == 'неизвестно')selected @endif>Неизвестно</option>
                        </select>
                        @error('coverage')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="type" class="form-label">Тип площадки</label>
                        <select class="form-select" id="type" name="type" value="{{ old('type') }}" required="">
                            <option value="">Выберите...</option>
                            <option value="уличная" @if(old('type') == 'уличная')selected @endif>Уличная</option>
                            <option value="в помещении" @if(old('type') == 'в помещении')selected @endif>В помещении</option>
                        </select>
                        @error('type')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="net" class="form-label">Сетка</label>
                        <select class="form-select" id="net" name="net" value="{{ old('net') }}" required="">
                            <option value="">Выберите...</option>
                            <option value="верёвочная" @if(old('net') == 'верёвочная')selected @endif>Верёвочная</option>
                            <option value="жёсткая" @if(old('net') == 'жёсткая')selected @endif>Жёсткая</option>
                            <option value="есть, тип неизвестен" @if(old('net') == 'есть, тип неизвестен')selected @endif>Есть, тип неизвестен</option>
                            <option value="отсутствует" @if(old('net') == 'отсутствует')selected @endif>Отсутствует</option>
                        </select>
                        @error('net')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="light" class="form-label">Освещение</label>
                        <select class="form-select" id="light" name="light" value="{{ old('light') }}" required="">
                            <option value="">Выберите...</option>
                            <option value="есть" @if(old('light') == 'есть')selected @endif>Есть</option>
                            <option value="нет" @if(old('light') == 'нет')selected @endif>Нет</option>
                            <option value="неизвестно" @if(old('light') == 'неизвестно')selected @endif>Неизвестно</option>
                        </select>
                        @error('light')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="pay" class="form-label">Платно или бесплатно?</label>
                        <select class="form-select" id="pay" name="pay" value="{{ old('pay') }}" required="">
                            <option value="">Выберите...</option>
                            <option value="1" @if(old('pay') == '1')selected @endif>Платно</option>
                            <option value="0" @if(old('pay') == '0')selected @endif>Бесплатно</option>
                        </select>
                        @error('pay')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="website" class="form-label">Если платно, укажите ссылку на прайс-лист <span class="text-muted">(необязательно)</span></label>
                        <input type="text" class="form-control" id="website" name="website" placeholder="" value="{{ old('website') }}">
                    </div>

                    <div class="col-12">
                        <label for="comment" class="form-label">Комментарий <span class="text-muted">(необязательно)</span></label>
                        <input type="text" class="form-control" id="comment" name="comment" placeholder="" value="{{ old('comment') }}">
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">Email, если хотите, чтобы написали, когда опубликуем <span class="text-muted">(необязательно)</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com"  value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <hr class="my-4">

                @csrf

                <button class="w-100 btn btn-primary btn-lg" type="submit">Отправить данные</button>
            </form>
        </div>
    </div>
@endsection

@section('add-active')active @endsection
