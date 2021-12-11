<?php

namespace Database\Seeders;

use App\Models\Satisfaction;
use Illuminate\Database\Seeder;

class Satisfactions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data() as $item) {
            $method = Satisfaction::find($item['id']);

            if ($method) {
                $method->fill($item);
                $method->save();
            } else {
                Satisfaction::create($item);
            }
        }
    }

    private function data()
    {
        return [
            [
                'id' => 1,
                'descricao' => 'Ótimo'
            ],
            [
                'id' => 2,
                'descricao' => 'Bom'
            ],
            [
                'id' => 3,
                'descricao' => 'Ruim'
            ],
            [
                'id' => 4,
                'descricao' => 'Péssimo'
            ],
            [
                'id' => 5,
                'descricao' => 'Nova triologia Star Wars'
            ],
        ];
    }
}
