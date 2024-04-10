@extends('templates.main')

@section('title')
  Заявка на подключение
@endsection

@section('content')

  <div class="container mx-auto px-4">
    <h1 class="text-3xl">Оставить заявку</h1>
    <span class="text-lg text-gray-700">на подключение газа</span>

    @if(\Session::has('ok'))
      @php
        $retData = session('ok');
      @endphp

      <div class="flex p-4 my-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <div>
          <span class="font-medium">Ваша заявка на подключение успешно создана и зарегистрирована под идентификатором {{$retData[0]->uuid}}.</span><br>
          @if($retData[1]['is_new'])
            <span>Для просмотра статуса заявки для Вас был создан личный кабинет.</span>
            <ul class="mt-1.5 list-disc list-inside">
              <li>Логин: {{$retData[1]['email']}}</li>
              <li>Пароль: {{$retData[1]['password']}}</li>
            </ul>
          @else
            <span>У Вас уже есть Личный кабинет, заявка и её статус будут доступны в нем.</span>
          @endif

        </div>
      </div>
    @endif

    <form class="w-full md:w-1/2 mt-8" method="POST">
      @csrf
      <div class="mb-4">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Как Вас зовут?</label>
        <input value="{{ old('name') }}" type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Иванов Иван Иванович" />
        @error('name')
          <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label for="tel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ваш номер телефона</label>
        <input value="{{ old('tel') }}" type="tel" id="tel" name="tel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="+79999999999" />
        @error('tel')
          <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ваш e-mail</label>
        <input value="{{ old('email') }}" type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="user@example.com" />
        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">На этот адрес придёт письмо с логином и паролем от Личного Кабинета, где можно посмотреть статус Вашей заявки.</p>
        @error('email')
          <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label for="addr" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Адрес объекта</label>
        <input value="{{ old('addr') }}" type="text" id="addr" name="addr" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="г. Екатеринбург, СНТ Лесное, дом 8" />
        @error('addr')
          <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label for="fuel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Вид топлива</label>
        <input type="text" id="fuel" name="fuel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="Природный газ" readonly/>
        @error('fuel')
          <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label for="mode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Режим потребления</label>
        <select id="mode" name="mode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option selected>Выберите...</option>
          <option value="Круглогодичный">Круглогодичный</option>
          <option value="Сезонный">Сезонный</option>
        </select>
        @error('mode')
          <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label for="target" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Назначение</label>
        <select id="target" name="target" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option selected>Выберите...</option>
          <option value="Технологическое">Технологическое</option>
          <option value="Приготовление пищи">Приготовление пищи</option>
          <option value="Горячее водоснабжение">Горячее водоснабжение</option>
          <option value="Отопление">Отопление</option>
          <option value="Другое">Другое</option>
        </select>
        @error('target')
          <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label for="equipment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Оборудование</label>
        <textarea id="equipment" name="equipment" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('equipment') }}</textarea>
        @error('equipment')
          <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
      </div>

      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Отправить</button>
    </form>
  </div>

@endsection
