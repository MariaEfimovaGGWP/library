<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book = [
            [
                'book_name' => 'Улисс',
                'description' => 'Джойс познакомился с персонажем Одиссея (Улисса) в английской адаптации «Одиссеи» Чарльза Лэма для детей «Приключения Улисса», что, вероятно, закрепило латинский вариант имени в памяти писателя. В школьные годы он написал эссе об этом персонаже под названием «Мой любимый герой». Джойс говорил Фрэнку Баджену[en], что считал Улисса единственным многогранным персонажем в литературе. Он задумывал назвать «Улисс в Дублине» свой сборник рассказов, который позднее назвал «Дублинцы», но в итоге эта идея переросла в замысел большого романа, который был начат в 1914 году.',
                'img' => 'img/james-joyce-ullis.jpg',
                'author_id' => '1',
            ],
            [
                'book_name' => 'Священная книга оборотня',
                'description' => 'Есть мир, скрытый от глаз человека. Это мир оборотней — хитрых, умных и таинственных. Они живут бок о бок с нами, и увидеть их непросто, — но и отрицать их существование бессмысленно."Священная книга оборотня" — один из "главных" романов Виктора Пелевина. В нем, еще задолго до стремительно охватившей весь мир моды на нечистую силу, эти милые, но коварные полулисицы и полуволки уже вовсю вершили людские судьбы. А уж если оборотням случилось полюбить друг друга, то сотрясения тверди земной грозят погубить все человечество."Священная книга оборотня" — роман, полный юмора, философии и сексуальной энергии. Пелевин, как никто другой, умеет объединить тонкие материи и ткать из них литературное полотно самого высокого качества.',
                'img' => 'img/victor-pelevin-kniga-oborotnya.jpg',
                'author_id' => '2',
            ],
            [
                'book_name' => 'Эрагон',
                'description' => 'Эрагон — мальчик, живущий в деревне Карвахолл. Отправившись на охоту, он случайно становится обладателем таинственного камня, оставленного захваченной воинами Империи эльфийкой Арьей. Эрагон не подозревает о том, что этот камень ищут подданные короля Гальбаторикса, и лишь со временем узнает, что камень является драконьим яйцом, так как из него вылупляется дракон. Эрагон становится из простого сельского жителя драконьим Всадником и находит наставника в лице Брома, который берет на себя ответственность за обучение Эрагона.
                Сюжет первой книги заканчивается сражением варденов, Эрагона и его друзей с ургалами и шейдом при Фартхен-Дуре — Городе-Горе гномов и последнем убежищем варденов.',
                'img' => 'img/kristofer-paolini-Eragon.jpg',
                'author_id' => '3',
            ],
            [
                'book_name' => 'Сезон Гроз',
                'description' => 'События развиваются в том же выдуманном мире, что и другие книги саги о Ведьмаке: главное действие происходит в королевстве Керак. Главный герой — ведьмак Геральт из Ривии — охотник за монстрами по найму, подвергнутый мутациям и натренированный в цитадели ведьмаков Каэр Морхене, которого (из-за вызванного мутациями изменения облика и физиологии) в обществе воспринимают в лучшем случае как меньшее зло.',
                'img' => 'img/anjey-sapkovskyi-season-of-storms.jpg',
                'author_id' => '4',
            ],
            [
                'book_name' => 'Защита Лужина',
                'description' => 'Петербургский мальчик-аутист, чьи родители-дворяне не любят друг друга, отправлен в школу, жизнь его становится адом, он защищается от её жестокостей растворением в шахматной игре. Он вырастает в одного из сильнейших шахматистов, мотается с турнира на турнир по городам Европы, не замечая их улиц, перемещаясь от гостиницы до шахматного зала, и борется за право вызвать на матч чемпиона мира. Перед турниром претендентов в Берлине нелепый тучный Лужин неожиданно обретает любовь: жертвой Амура становится жалостливая красавица, дочь состоятельных, в отличие от Лужина, русских эмигрантов. Он показывает на этом турнире лучшую свою игру, но в результате перенапряжения и умелой игры главного соперника у героя романа происходит сильнейший нервный срыв с обмороком и госпитализацией. Все попытки жены вернуть его к обычной жизни разбиваются о кошмары Лужина, которому кажется, что реальность играет с ним в какие-то фантастические шахматы, и весной 1929-го гроссмейстер прыгает в окно.',
                'img' => 'img/vladimir-nabokov-zaschita-luzhina.jpg',
                'author_id' => '5',
            ],
        ];

        foreach ($book as $data) {
            \App\Models\Book::create($data);
        }
    }
}
