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
      <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-[#0088cc] md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-[#0088cc] dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="{{ route('home') }}" class="<?=(Route::currentRouteName() === 'home') ? 'font-bold ' : '';?>block py-2 px-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:underline md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Главная</a>
        </li>
        <li>
          <a href="{{ route('request') }}" class="<?=(Route::currentRouteName() === 'request') ? 'font-bold ' : '';?>block py-2 px-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:underline md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Оставить заявку</a>
        </li>
        <li>
          <a href="{{ route('contact') }}" class="<?=(Route::currentRouteName() === 'contact') ? 'font-bold ' : '';?>block py-2 px-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:underline md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Контакты</a>
        </li>
        <li>
          <a href="{{ route('lk') }}" class="block py-2 px-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:underline md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
