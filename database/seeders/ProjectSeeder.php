<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;


class ProjectSeeder extends Seeder
{
    public $dateFormat = 'd/m/Y';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create(); // Creazione dell'istanza di Faker

        $projects = [
            [
                'title' => 'laravel-primi-passi',
                'type_id' => 1,
                'description' => 'Ciao ragazze e ciao ragazzi
                Esercizio di oggi: Laravel Primi Passi
                nome repo: laravel-primi-passi
                Oggi iniziamo a muovere i primi passi con questo fantastico framework che è Laravel!
                Per prima cosa, creiamo un nuovo progetto Laravel 9, utilizzando questo comando:
                 composer create-project laravel/laravel laravel-primi-passi
                Al termine dell\'installazione, entriamo nella cartella del progetto cd laravel-primi-passi
                e avviamo l\'artisan serve con uno di questi due comandi:
                php artisan serve  oppure se il primo non funziona
                php -S localhost:8000 -t public
                A questo punto, iniziamo a prendere confidenza con le rotte e le views:
                cancelliamo la view welcome.blade.php e creiamo una nostra homepage.
                Facciamo quindi sì che la rotta / visualizzi home.blade.php
                Inizialmente stampiamo un Hello World, poi passiamo dei dati alla view in modo da visualizzarli dinamicamente con Blade.
                Bonus:
                Creiamo più di una pagina e la visualizziamo con un link nella prima pagina creato.',
                // parsiamo la data
                'date' => '2024/01/30',
                'complete' => true,

            ],
            [
                'title' => 'laravel-model-controller',
                'type_id' => 1,
                'description' => 'Ciao ragazze e ciao ragazzi!
                Esercizio di oggi:  Laravel Model Controller
                nome repo: laravel-model-controller
                Oggi facciamo la nostra prima vera interazione con il database utilizzando l’ORM di Laravel.
                1 - Create un nuovo progetto Laravel 10
                2 - tramite phpMyAdmin create un nuovo database laravel_model_controller
                3 - Importate nel vostro database la tabella movies in allegato
                4 - inserite le vostre credenziali per il database nel file .env
                5 - Create un model Movie php artisan make:model Movie
                6 - Create un controller che gestirà la rotta / php artisan make:controller PageController
                7 - All’interno della funzione index() del controller, recuperate tutti i film dal database e passateli alla view, che quindi li visualizzerà a schermo, tramite delle card.
                BONUS:
                Stilare il layout nei dettagli con Sass',
                'date' => '2024/02/01',
                'complete' => true,

            ],
            [
                'title' => 'laravel-migration-seeder',
                'type_id' => 2,
                'description' => 'Ciao ragazze e ciao ragazzi!
                Esercizio di oggi: Laravel 10 Migration & Seeder
                nome repo: laravel-migration-seeder
                Milestone 1:
                Creiamo una tabella trains e relativa Migration
                Ogni treno dovrà avere:
                Azienda
                Stazione di partenza
                Stazione di arrivo
                Orario di partenza
                Orario di arrivo
                Codice Treno
                Numero Carrozze
                In orario
                Cancellato
                È probabile che siano necessarie altre colonne per far funzionare la tabella nel modo corretto ;) ...
                Inserite inizialmente i dati tramite PhpMyAdmin.
                Create Model relativo ed un Controller per mostrare nella home page tutti i treni che sono in partenza dalla data odierna.
                Milestone 2:
                Aggiungiamo un seeder per la classe Train usando FakerPHP.
                BONUS:
                Implementare il seeder tramite un file csv.',
                'date' => '2024/02/02',
                'complete' => true,

            ],
            [
                'title' => 'laravel-dc-comics',
                'type_id' => 2,
                'description' => 'Esercizio di oggi: Laravel DC Comics
                nome repo: laravel-dc-comics
                Ciao ragazze e ciao ragazzi!
                Oggi create un nuovo progetto Laravel 10 per gestire un archivio di fumetti.
                Milestone 1
                Tramite gli appositi comandi artisan create un model con relativa migration e un resource controller.
                Milestone 2
                Iniziate a definire le prime operazioni CRUD con le relative view:
                index()
                show()
                Bonus:
                creare il seeder per la tabella comics utilizzando il file in allegato.',
                'date' => '2024/02/05',
                'complete' => true,

            ],
            [
                'title' => 'laravel-general-crud',
                'type_id' => 3,
                'description' => 'Esercizio di oggi: Pokédex
                Nome repo: laravel-general-crud
                Descrizione:
                Oggi dovrete realizzare un simil-Pokédex online che, per chi non lo sapesse e semplificato, è una specie di enciclopedia di tutti i Pokémon.
                Realizzate la tabella dei Pokémon e relativa migration, poi inserite qualche Pokémon dal seeder (potete usare i dati sia dei faker che presi da un array).
                Create Model relativo ed un Controller per mostrare nella home page tutti i Pokémon inseriti.
                Consigli:
                Un membro del gruppo creerà la repo sul suo github e tramite screenshare mostrerà l\'avanzamento del lavoro ai colleghi del gruppo. Tutti gli altri dovranno collaborare suggerendo cosa scrivere.
                Una volta terminato il lavoro, scaricate il lavoro del collega che ha fatto da screensharer e caricatelo sul vostro github.
                Buon lavoro!',
                'date' => '2024/02/08',
                'complete' => false,
            ],
        ];
        foreach ($projects as $project) {
            $newProject = new Project();
            $newProject->user_id = $faker->numberBetween(1, 10);
            $newProject->type_id = $project['type_id'];
            $newProject->title = $project['title'];
            $newProject->description = $project['description'];
            $newProject->date = $project['date'];
            $newProject->complete = $project['complete'];
            $newProject->save();
        }
    }
}
