<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BirdGenus;
use Illuminate\Support\Facades\DB;

class BirdGenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BirdGenus::create(array(
            'title' => 'Чибисы',
            'title_latin' => 'Vanellus',
            'description' => 'Чи́бисы, или пигалицы (лат. Vanellus), — род птиц из семейства ржанковых (Charadriidae), содержащий наиболее крупных представителей семейства. Чибисы обитают зачастую на открытом пространстве: на берегах озёр, рек и в болотистых местностях. Часто их можно встретить и на возделанных землях. Чибисы — очень громкие птицы. Наиболее редким и угрожаемым видом является кречётка, от которой осталось предположительно лишь 5600 гнездящихся пар.',
            'bird_family_id' => DB::table('bird_families')->where('title', 'Ржанковые')->value('id')
        ));

        BirdGenus::create(array(
            'title' => 'Альпийские галки',
            'title_latin' => 'Pyrrhocorax',
            'description' => 'Альпийские галки (лат. Pyrrhocorax) — род птиц семейства врановых. 
            Представители данного рода имеют чёрное оперение. Обитают в горах южной Евразии и Северной Африки. Строят мягкое гнездо из палочек; откладывают от 3 до 5 яиц.',
            'bird_family_id' => DB::table('bird_families')->where('title', 'Врановые')->value('id')
        ));

        BirdGenus::create(array(
            'title' => 'Бекасы',
            'title_latin' => 'Gallinago',
            'description' => 'Бека́сы (лат. Gallinago) — род небольших болотных птиц семейства бекасовых, широко распространённых в мире (отсутствуют в Австралии). Объединяет группу очень схожих между собой птиц с очень длинным тонким клювом и покровительственным окрасом оперения. Большинство видов выделяется так называемым «токованием» — характерным демонстративным полётом, выполняемым в сумерках. Биотопы — влажные и заболоченные местности. Питаются в основном мелкими беспозвоночными, которых с помощью длинного клюва находят в сырой почве. В орнитофауне России 6 видов — бекас, японский бекас, азиатский бекас, дупель, лесной дупель, горный дупель. Японский бекас занесён в Красную книгу России как редкий, спорадично распространённый вид.',
            'bird_family_id' => DB::table('bird_families')->where('title', 'Бекасовые')->value('id')
        ));

        BirdGenus::create(array(
            'title' => 'Бекасовидные веретенники',
            'title_latin' => 'Limnodromus',
            'description' => 'Бекасовидные веретенники размером с бекаса и похожи на него и малого веретенника в телосложении, движении и красноватом летнем оперении, отличаются, однако, значительно более короткими ногами. Клюв бекасовидных веретенников длинный, утолщённый на конце и согнутый вниз. Во всех нарядах у птиц отчетливо видна полоса над глазами. Средней длины, относительно короткие ноги зеленоватые. В полёте можно видеть белое, продолговатое, овальное пятно на спине. На крыльях имеется белая окантовка.',
            'bird_family_id' => DB::table('bird_families')->where('title', 'Бекасовые')->value('id')
        ));

        BirdGenus::create(array(
            'title' => 'Улары',
            'title_latin' => 'Tetraogallus',
            'description' => 'Ула́ры, или го́рные инде́йки (лат. Tetraogallus), — род птиц из семейства фазановых (Phasianidae). Длина тела 50—70 см. Распространены в высокогорных районах Евразии — от Турции на западе до Монголии и Китая на востоке.',
            'bird_family_id' => DB::table('bird_families')->where('title', 'Фазановые')->value('id')
        ));

        BirdGenus::create(array(
            'title' => 'Завирушки',
            'title_latin' => 'Prunella',
            'description' => 'Завиру́шки (лат. Prunella) — род певчих воробьиных птиц из монотипического семейства завирушковых (Prunellidae). Распространены исключительно в палеарктическом регионе. За исключением лесной и японской завирушек все виды являются обитателями горных регионов Азии и Европы. Остальные же два вида встречаются в равнинной местности.
            На территории Российской Федерации — 7 видов. В лесной зоне Европейской части страны гнездится лесная завирушка. На Белом море, Урале и в горах Южной Сибири встречается черногорлая завирушка. Там же, на Алтае и Саянах, можно встретить бледную и гималайскую завирушек (последняя живёт высоко в горах). На Кавказе и в горных системах Сибири обитает альпийская завирушка. Сибирская завирушка — обитатель равнинной лесотундры и гор. Наконец, японскую завирушку в России можно увидеть только на Сахалине и Курильских островах.
            Завирушки, как правило, не являются перелётными птицами и живут круглогодично в одном и том же месте. Лишь живущие в наиболее холодных регионах завирушки покидают зимой места их летнего гнездования. Это маленькие птицы, немного похожие на воробьёв, с неприметной расцветкой оперения и тоненьким острым клювом. Крылья короткие и закруглённые. Самцы и самки мало отличаются друг от друга. Летом питаются насекомыми, зимой их пищу составляют семена и ягоды. Гнёзда чашевидные, строят в кустах или расщелинах скал.',
            'bird_family_id' => DB::table('bird_families')->where('title', 'Завирушковые')->value('id')
        ));

        BirdGenus::create(array(
            'title' => 'Коньки',
            'title_latin' => 'Anthus',
            'description' => 'Коньки́ (лат. Anthus, от др.-греч. ἄνθος, предполож. трясогузка или овсянка) — род птиц семейства трясогузковых, объединяющий около 46 видов мелких птиц, распространённых как в восточном, так и западном полушарии. В отличие от близких им трясогузок, имеют покровительственную окраску оперения — как правило, тёмно-бурые тона в верхней части тела и грязно-белые в нижней. Несколько выделяется оперение пятнистого конька (Anthus hodgsoni) — верхняя часть его тела имеет зеленоватый оливковый оттенок. Тело коньков часто покрыто пестринами, однако их частота может варьироваться. Многие виды чрезвычайно похожи друг на друга, и иногда различить их можно скорее по характеру уникального для каждого конька пения, нежели чем по внешним морфологическим признакам. Также при идентификации большое значение имеет рисунок оперения, который при внимательном взгляде несколько различается у разных птиц. Половой диморфизм у большинства видов не выражен, то есть самки по внешнему виду не отличаются от самцов. Также имеется мало различий между молодыми и взрослыми особями.
            Распространены коньки очень широко, встречаясь на всех континентах, за исключением Антарктиды, и во всех географических зонах. Наиболее северные виды, такие как сибирский, краснозобый, пятнистый и американский коньки, гнездятся в арктической тундре Европы, Азии и Северной Америки, а большой конёк обитает в субантарктике на о. Южной Георгии. Среди коньков многие виды гнездятся на высокогорных альпийских лугах — к ним можно отнести очкового и розового коньков. Птицы, обитающие в северных регионах, являются перелётными, в зимнее время мигрируют в Африку, Азию и Центральную Америку.',
            'bird_family_id' => DB::table('bird_families')->where('title', 'Трясогузковые')->value('id')
        ));

        BirdGenus::create(array(
            'title' => 'Соколы',
            'title_latin' => 'Falco',
            'description' => 'Со́колы (лат. Falco) — род хищных птиц из семейства соколиных, широко распространённых в мире. Научное название Falco является производным от латинского слова «falx» («серп») и подчёркивает серпообразную форму крыльев в полёте.',
            'bird_family_id' => DB::table('bird_families')->where('title', 'Соколиные')->value('id')
        ));
    }
}
