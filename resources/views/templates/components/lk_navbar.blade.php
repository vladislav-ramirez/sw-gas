<?php
  use Illuminate\Support\Facades\Route;
?>

<nav class="bg-[#0088cc] border-gray-200 dark:bg-gray-900">
  <div class="container flex flex-wrap items-center justify-between mx-auto p-4 pb-2 pt-2">
    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="{{asset('img/logo_white_w150.svg')}}" class="h-14" alt="Газпром лого" />
    </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
      </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-[#0088cc] dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        @if(auth()->user()->isAdmin())
          <li>
            <a href="{{ route('lk') }}" class="<?=(Route::currentRouteName() === 'lk') ? 'font-bold ' : '';?>block py-2 px-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:underline md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Заявки пользователей</a>
          </li>
          <li>
            <a href="{{ route('lk.stat') }}" class="<?=(Route::currentRouteName() === 'lk.stat') ? 'font-bold ' : '';?>block py-2 px-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:underline md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Статистика</a>
          </li>
        @else
          <li>
            <a href="{{ route('lk') }}" class="<?=(Route::currentRouteName() === 'lk') ? 'font-bold ' : '';?>block py-2 px-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:underline md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Мои заявки</a>
          </li>
        @endif
        <li>
          <a href="{{ route('lk.profile') }}" class="<?=(Route::currentRouteName() === 'lk.profile') ? 'font-bold ' : '';?>block py-2 px-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:underline md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Профиль</a>
        </li>

        <li>
          <a href="{{ route('lk.logout') }}" class="block py-2 px-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:underline md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Выйти</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

