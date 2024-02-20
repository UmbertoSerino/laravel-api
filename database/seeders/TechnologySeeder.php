<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            [
                'name' => 'HTML',
                'doc_link' => 'https://www.w3schools.com/tags/tag_doctype.asp',
                'version' => '5.2',
                'released_date' => '2017/12/14',
                'icon' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/HTML5_logo_and_wordmark.svg/150px-HTML5_logo_and_wordmark.svg.png',
            ],
            [
                'name' => 'CSS',
                'doc_link' => 'https://www.w3.org/TR/CSS/',
                'version' => 'CSS3',
                'released_date' => '1996/12/17',
                'icon' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/CSS3_logo_and_wordmark.svg/150px-CSS3_logo_and_wordmark.svg.png',
            ],
            [
                'name' => 'JavaScript',
                'doc_link' => 'https://developer.mozilla.org/en-US/docs/Web/JavaScript',
                'version' => 'ES6',
                'released_date' => '2022/06/01',
                'icon' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Unofficial_JavaScript_logo_2.svg/270px-Unofficial_JavaScript_logo_2.svg.png',
            ],
            [
                'name' => 'PHP',
                'doc_link' => 'https://www.php.net/docs.php',
                'version' => '8.3.3',
                'released_date' => '2024/02/15',
                'icon' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/390px-PHP-logo.svg.png',
            ]
        ];
        foreach ($technologies as $technology) {
            $newTechnology = new Technology();
            $newTechnology->name = $technology['name'];
            $newTechnology->doc_link = $technology['doc_link'];
            $newTechnology->version = $technology['version'];
            $newTechnology->released_date = $technology['released_date'];
            $newTechnology->icon = $technology['icon'];
            $newTechnology->save();
        }
    }
}
