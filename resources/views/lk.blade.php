@extends('templates.lk')

@section('title')
  Личный кабинет
@endsection

@section('content')
  <section>
    <div class="container mx-auto px-4">
      <h1 class="text-3xl">Личный кабинет</h1>


      @if(auth()->user()->isAdmin())
        <span class="text-lg text-gray-700 mb-8">входящие заявки</span>
        @php
          $requests = \App\Models\Request::where('admin_id', auth()->user()->id)->orWhereNull('admin_id')->get();
        @endphp

        @if(count($requests))
          @foreach($requests as $val)
            <a href="{{route('lk.request.once', ['uuid' => $val->uuid])}}" class="bg-white flex flex-col w-full shadow-md rounded md:rounded-xl p-4 mb-6">
              <div class="flex flex-row justify-between mb-1">
                <h2 class="text-xl">Заявка от {{\Carbon\Carbon::make($val->created_at)->format('d.m.Y')}}</h2>
                <div>
                  <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">{{$val->uuid}}</span>
                </div>
              </div>

              <div class="my-2">
                  @if($val->is_rejected)
                    <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Отклонена</span>
                  @elseif($val->is_confirmed)
                    <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Принята</span>
                  @else
                    @if($val->status)
                      <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">{{$val->status}}</span>
                    @else
                      <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300">Создана</span>
                    @endif
                  @endif

                @if($val->admin_id === auth()->user()->id)
                    <span class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-indigo-900 dark:text-indigo-300">Моя заявка</span>
                @endif
              </div>

              <div>
                <span class="text-sm font-semibold">Создана: {{\Carbon\Carbon::make($val->created_at)->format('d.m.Y H:i')}}</span>
              </div>

              <div>
                <span class="text-sm font-semibold">Обновлена: {{\Carbon\Carbon::make($val->updated_at)->format('d.m.Y H:i')}}</span>
              </div>

              @if($val->comment)
                <div class="mt-2.5">
                  <span class="text-sm font-semibold">Комментарий: {{$val->comment}}</span>
                </div>
              @endif


            </a>
          @endforeach
        @else
          <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <div>
              У Вас нет ни одной заявки.
            </div>
          </div>
        @endif

      @else
        <span class="text-lg text-gray-700 mb-8">мои заявки</span>
        @php
          $requests = auth()->user()->requests;
        @endphp

        @if(count($requests))
          @foreach($requests as $val)
            <div class="bg-white flex flex-col w-full shadow-md rounded md:rounded-xl p-4 mb-6">
              <div class="flex flex-row justify-between mb-1">
                <h2 class="text-xl">Заявка от {{\Carbon\Carbon::make($val->created_at)->format('d.m.Y')}}</h2>
                <div>
                  <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">{{$val->uuid}}</span>
                </div>
              </div>

              <div class="my-2">
                @if($val->is_rejected)
                  <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Отклонена</span>
                @elseif($val->is_confirmed)
                  <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Принята</span>
                @else
                  @if($val->status)
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">{{$val->status}}</span>
                  @else
                    <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300">Создана</span>
                  @endif
                @endif
              </div>

              @if($val->admin)
                <div class="my-2">
                  <span class="font-semibold">Над заявкой работает: </span>{{$val->admin->name}} ({{$val->admin->email}})
                </div>
              @endif


              <div>
                <span class="text-sm font-semibold">Создана: {{\Carbon\Carbon::make($val->created_at)->format('d.m.Y H:i')}}</span>
              </div>

              <div>
                <span class="text-sm font-semibold">Обновлена: {{\Carbon\Carbon::make($val->updated_at)->format('d.m.Y H:i')}}</span>
              </div>

              @if($val->comment)
                <div class="mt-2.5">
                  <span class="text-sm font-semibold">Комментарий: </span>{{$val->comment}}
                </div>
              @endif


            </div>
          @endforeach
        @else
          <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <div>
              У Вас нет ни одной заявки.
            </div>
          </div>
        @endif
      @endif

    </div>
  </section>
@endsection
