<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BirdOrder;
use Illuminate\Support\Facades\DB;

class BirdOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BirdOrder::create(array(
            'title' => 'Ржанкообразные',
            'title_latin' => 'Charadriiformes',
            'description' => 'Ржанкообра́зные (лат. Charadriiformes) — один из самых крупных отрядов водных и околоводных птиц, распространённых во всём мире и значительно различающихся как морфологически, так и по поведенческим характеристикам. Птицы от мелкого до среднего размера, их масса варьирует от 19—30 г у песочника-крошки (Calidris minutilla) до 1,3—2 кг у морской чайки (Larus marinus). Среди них встречаются как колониальные птицы (такие как тиркушковые), так и живущие обособленно (например, улит-отшельник (Tringa solitaria)). Полярная крачка (Sterna paradisaea) мигрирует на расстояние более 28 тыс. км между островами Северного Ледовитого океана и побережьем Антарктиды, тогда как горный дупель (Gallinago solitaria) живёт оседло.'
        ));

        BirdOrder::create(array(
            'title' => 'Воробьинообразные',
            'title_latin' => 'Passeriformes',
            'description' => 'Воробьинообра́зные (лат. Passeriformes; устаревшее название — воробьи́ные[1]) — самый многочисленный отряд птиц (около 5400 видов). Преимущественно мелкие и средней величины птицы, значительно различающиеся по внешнему виду, образу жизни, условиям обитания и способам добывания пищи. Распространены по всему свету.'
        ));

        BirdOrder::create(array(
            'title' => 'Курообразные',
            'title_latin' => 'Galliformes',
            'description' => 'Курообра́зные (лат. Galliformes, в старом, нетипифицированном латинском написании научного названия — Gallinaceae и Rasores), — широко распространённый отряд новонёбных птиц из клады Galloanseres. Устаревшие русские названия: куриные, скребу́щие или ро́ющие.
            У них крепкие лапы, приспособленные для быстрого бега и рытья земли. Летать умеют не все куриные и, в лучшем случае, лишь на небольшие расстояния.'
        ));

        BirdOrder::create(array(
            'title' => 'Соколообразные',
            'title_latin' => 'Falconiformes',
            'description' => 'Соколообра́зные, или дневные хищные птицы (лат. Falconiformes) — отряд птиц из подкласса новонёбных.'
        ));
    }
}
