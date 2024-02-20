@extends('layouts.admin')

<title>@yield('head-title', 'My Project - (Show)')</title>

@section('main-content')
<section class="container-heros-cards">
    <article class="container-card p-3">
        <div class="row">
            <div class="col-12">
                <div class="card m-auto">
                    <div class="card-body">
                      <h5 class="card-title">Titolo: {{ $project['title'] }}</h5>
                      <p class="card-text">Data: {{ $project['date'] }}</p>
                      <p class="card-text">Descrizione: {{ $project['description'] }}</p>
                      <p class="card-text">Tecnologie usate:</p>
                      <ul>
                          @foreach($project->technologies as $technology)
                              <li>{{ $technology->name }}</li>
                          @endforeach
                      </ul>

                      <p class="card-text">Completato: {{ $project['complete'] ? 'ok' : 'non ancora'}}</p>
                      <p class="card-text">Tipo: {{ $project->type->name}}</p>
        {{-- @dump($project->technologies()) --}}
                      
                        <div class="col-12">
                            <span class="inline-block">Creato da: </span>
                            <a href="{{ route('admin.users.show', ['user' => $project->user->id]) }}"><span>{{ $project->user->name }}</span></a>
                                
                        </div>
                      <a href="{{ route('admin.projects.index') }}">
                        <button class="btn btn-primary d-inline-block">Torna indietro</button>
                      </a>
                      @include('admin.projects.partials-button.button')
                  </div>
                </div>
            </div>
        </div>
    </article>
</section>

@endsection