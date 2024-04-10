@section('title')
  Главная
@endsection

@extends('templates.main')

@section('content')
  <div class="flex flex-col lg:flex-row justify-between space-x-20 p-4 md:px-24 ">
    <div class="text-center lg:text-left mt-40 w-full md:w-1/2">
      <h1 class="font-semibold text-gray-900 text-3xl md:text-6xl leading-normal mb-6">
        Бесплатная газификация
      </h1>

      <p class="font-light text-gray-400 text-md md:text-lg leading-normal mb-12">
        Доступная и бесплатная газификация по госпрограмме.
        <br>
        Оставьте заявку прямо сейчас!
      </p>

      <a href="{{route('request')}}" class="block px-6 py-3.5 text-base font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Оставить заявку</a>
    </div>

    <div class="mt-24 w-full md:w-1/2">
      <img class="max-w-[500px] mx-auto" src="{{asset('/img/gas-pipe-oil-svgrepo-com.svg')}}" alt="Image">
    </div>
  </div>


  <section class="bg-white py-16 md:mt-10">
    <div class="container max-w-screen-xl mx-auto px-4">
      <p class="font-light text-gray-500 text-lg md:text-xl text-center uppercase mb-6">
        Наша цель
      </p>

      <h1 class="font-semibold text-gray-900 text-xl md:text-4xl text-center leading-normal mb-10">
        Мы хотим сделать газоснабжение доступным
      </h1>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-20">
        <div class="text-center">
          <div class="flex justify-center mb-6">
            <div class="w-20 py-6 flex justify-center bg-blue-200 bg-opacity-30 text-blue-700 rounded-xl">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
            </div>
          </div>

          <h4 class="font-semibold text-lg md:text-2xl text-gray-900 mb-6">
            География
          </h4>

          <p class="font-light text-gray-500 text-md md:text-xl mb-6">
            Доступность по всей стране
          </p>
        </div>

        <div class="text-center">
          <div class="flex justify-center mb-6">
            <div class="w-20 py-6 flex justify-center bg-blue-200 bg-opacity-30 text-blue-700 rounded-xl">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up-right"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
            </div>
          </div>

          <h4 class="font-semibold text-lg md:text-2xl text-gray-900 mb-6">
            Эффективность
          </h4>

          <p class="font-light text-gray-500 text-md md:text-xl mb-6">
            Мы обрабатываем огромное количество заявок ежедневно
          </p>
        </div>

        <div class="text-center">
          <div class="flex justify-center mb-6">
            <div class="w-20 py-6 flex justify-center bg-blue-200 bg-opacity-30 text-blue-700 rounded-xl">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
            </div>
          </div>

          <h4 class="font-semibold text-lg md:text-2xl text-gray-900 mb-6">
            Сроки
          </h4>

          <p class="font-light text-gray-500 text-md md:text-xl mb-6">
            Мы уменьшаем сроки за счёт цифровизации
          </p>

        </div>
      </div>
    </div>
    <!-- container.// -->
  </section>


  <section class="bg-white py-16 md:mt-10">
    <div class="container max-w-screen-xl mx-auto px-4">
      <p class="font-light text-gray-500 text-lg md:text-xl text-center uppercase mb-6">
        Новости
      </p>

      <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-4 gap-4">

        <div class="rounded border">
          <img src="{{asset('img/ry5isujmejgmtc4o7s41qpketyjokr9e.png')}}" class="w-full">
          <p class="font-bold mx-2.5 mt-4 mb-4">
            Пермские газовики обращают внимание на ужесточение мер административной ответственности за нарушение правил обеспечения безопасного использования и содержания газового оборудования
          </p>
        </div>

        <div class="rounded border">
          <img src="{{asset('img/stwuh2knhmpbkwiohss6pa0a9sj7gyun.jpg')}}" class="w-full">
          <p class="font-bold mx-2.5 mt-4 mb-4">
            Сергей Густов поручил компаниям Группы «Газпром межрегионгаз» подготовить мемориалы с Вечными огнями ко Дню Победы
          </p>
        </div>

        <div class="rounded border">
          <img src="{{asset('img/mjc5hyiqgtbq6ekv1049gd2ex3b9rzk5.jpg')}}" class="w-full">
          <p class="font-bold mx-2.5 mt-4 mb-4">
            В поселке Нартовка Пермского края газифицированы первые домовладения
          </p>
        </div>

        <div class="rounded border">
          <img src="{{asset('img/xth9gijh0i7uhrdb99xysuakq4li91i5.jpg')}}" class="w-full">
          <p class="font-bold mx-2.5 mt-4 mb-4">
            «Газпром газораспределение Пермь» напоминает об опасности отравления угарным газом
          </p>
        </div>




      </div>
    </div>
  </section>
@endsection
