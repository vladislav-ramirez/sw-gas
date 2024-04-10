<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Request>
 */
class RequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statuses = [
            'В работе',
            'На рассмотрении',
            'Ожидает проверки',
            null
        ];

        $modes = [
            'Круглогодичный',
            'Сезонный'
        ];

        $targets = [
            'Технологическое',
            'Приготовление пищи',
            'Горячее водоснабжение',
            'Отопление',
            'Другое'
        ];

        $confirmed = rand(0, 1);
        $rejected = !$confirmed;


        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'tel' => $this->faker->phoneNumber(),
            'addr' => $this->faker->address(),
            'fuel' => 'Природный газ',
            'mode' => $modes[rand(0, count($modes) - 1)],
            'target' => $targets[rand(0, count($targets) - 1)],
            'equipment' => $this->faker->text(),
            'is_confirmed' => $confirmed,
            'is_rejected' => $rejected,
            'admin_id' => 1,
            'comment' => $this->faker->text()
        ];
    }
}
