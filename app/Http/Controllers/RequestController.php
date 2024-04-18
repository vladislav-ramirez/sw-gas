<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class RequestController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'tel' => ['required'],
            'email' => ['required', 'email'],
            'addr' => ['required'],
            'fuel' => ['required', Rule::in(['Природный газ'])],
            'mode' => ['required', Rule::in(['Круглогодичный', 'Сезонный'])],
            'target' => ['required', Rule::in(['Технологическое', 'Приготовление пищи', 'Горячее водоснабжение', 'Отопление', 'Другое'])],
            'equipment' => ['required']
        ],
        $messages = [
            'required' => ':attribute не может быть пустым.',
            'email' => ':attribute должен быть формата email'
        ],
        [
            'name' => 'ФИО',
            'tel' => 'Телефон',
            'email' => 'Эл. адрес',
            'addr' => 'Адрес объекта',
            'mode' => 'Тип потребления',
            'target' => 'Цель потребления',
            'equipment' => 'Оборудование'
        ]);

        $userData = AuthController::register($data['email'], $data['name']);

        unset($data['name']);
        unset($data['email']);

        $data['user_id'] = $userData['id'];
        $data['uuid'] = Str::uuid();
        $order = \App\Models\Request::create($data);

        return back()->with('ok', [
            $order,
            $userData
        ]);
    }

    public function update(Request $request, $uuid){
        $data = $request->validate([
            'tel' => ['required'],
            'addr' => ['required'],
            'status' => [],
            'comment' => [],
            'fuel' => ['required', Rule::in(['Природный газ'])],
            'mode' => ['required', Rule::in(['Круглогодичный', 'Сезонный'])],
            'target' => ['required', Rule::in(['Технологическое', 'Приготовление пищи', 'Горячее водоснабжение', 'Отопление', 'Другое'])],
            'equipment' => ['required'],
            'is_confirmed' => ['boolean'],
            'is_rejected' => ['boolean']
        ],
            $messages = [
                'required' => ':attribute не может быть пустым.',
                'email' => ':attribute должен быть формата email'
            ],
            [
                'name' => 'ФИО',
                'tel' => 'Телефон',
                'email' => 'Эл. адрес',
                'addr' => 'Адрес объекта',
                'mode' => 'Тип потребления',
                'target' => 'Цель потребления',
                'equipment' => 'Оборудование'
            ]);

        $data['admin_id'] = auth()->user()->id;

        unset($data['user_id']);
        unset($data['created_at']);
        unset($data['updated_at']);


        $req = \App\Models\Request::where('uuid', $uuid)->firstOrFail();

        foreach ($data as $datum=>$val) {
            $req->{$datum} = $val;
        }

        $req->save();

        return back();
    }

    public static function getStat($days = 15){

        $today = Carbon::now();
        $d5 = Carbon::today()->subDays($days);

        $data = \App\Models\Request::where('created_at', '>=', $d5)->where('created_at', '<=', $today)->get();

        $new = [];
        $confirmed = [];
        $rejected = [];

        foreach ($data as $dt){
            if ($dt->is_confirmed){
                $confirmed[Carbon::create($dt->created_at)->format('d.m.Y')][] = $dt;
            }else if($dt->is_rejected){
                $rejected[Carbon::create($dt->created_at)->format('d.m.Y')][] = $dt;
            }else{
                $new[Carbon::create($dt->created_at)->format('d.m.Y')][] = $dt;
            }
        }

        $graph = [
            [
                'name' => 'Новые заявки',
                'data' => []
            ],
            [
                'name' => 'Отклонённые',
                'data' => []
            ],
            [
                'name' => 'Подтвержденные',
                'data' => []
            ],
        ];

        foreach ($new as $key => $val) {
            $graph[0]['data'][] = [
                'x' => $key,
                'y' => count($val)
            ];
        }

        foreach ($rejected as $key => $val) {
            $graph[1]['data'][] = [
                'x' => $key,
                'y' => count($val)
            ];
        }

        foreach ($confirmed as $key => $val) {
            $graph[2]['data'][] = [
                'x' => $key,
                'y' => count($val)
            ];
        }

        return $graph;
    }
}
