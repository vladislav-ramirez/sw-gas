<?php

namespace App\Http\Controllers;

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
}
