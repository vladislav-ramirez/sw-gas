@extends('templates.lk')

@section('title')
  Личный кабинет
@endsection

@section('content')
  <section>
    <div class="container mx-auto px-4">
      <h1 class="text-3xl">Личный кабинет</h1>
      <span class="text-lg text-gray-700 mb-8">просмотр заявки</span>


      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <div class="bg-white w-full rounded md:rounded-xl shadow-lg p-4 mb-4">
            <h3 class="text-xl mb-4">Пользователь</h3>

            <p>
              {{$req->user->name}}
            </p>
            <p>
              {{$req->user->email}}
            </p>
          </div>
          <div class="bg-white w-full rounded md:rounded-xl shadow-lg p-4 mb-4">
            <h3 class="text-xl mb-4">Заявка</h3>
            <form method="POST">
              @csrf
              @foreach($req->getAttributes() as $attribute => $value)
                <div class="mb-4">
                  <label for="{{$attribute}}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{$attribute}}</label>
                  <input type="text" id="{{$attribute}}" name="{{$attribute}}" value="{{$value}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
              @endforeach
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Сохранить</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
