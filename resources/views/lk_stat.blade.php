@extends('templates.lk')

@section('title')
  Личный кабинет
@endsection

@section('content')
  <section>
    <div class="container mx-auto px-4">
      <h1 class="text-3xl">Личный кабинет</h1>
      <span class="text-lg text-gray-700 mb-8">просмотр статистики</span>
      <div class="hidden" id="chartJSON">{{$gr}}</div>
      <div class="mt-4" id="chartContainer"></div>

    </div>
  </section>
@endsection
