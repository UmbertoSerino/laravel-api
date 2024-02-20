@extends('layouts.admin')

<title>@yield('head-title', 'My user - (Show)')</title>

@section('main-content')
<section class="container-heros-cards">
    <article class="container-card p-3">
        <div class="row">
            <div class="col-12">
                <div class="card m-auto">
                    <div class="card-body">
                      <h5 class="card-title">Nome: {{ $user['name'] }}</h5>
                      <img style="width: 70px; border-radius: 50%;" src="{{ $user->userProfile->user_photo }}" alt="photo {{ $user->name }}">
                      <p class="card-text">Email: {{ $user['email'] }}</p>
                      <p class="card-text">data di nascita: {{ $user->userProfile->date_of_birth }}</p>
                      <p class="card-text">Numero di telefono: +39 {{ $user->userProfile->phone_number }}</p>
                      <p class="card-text">Altri Progetti:</p>
                      <ul>
                          @forelse ($user->projects as $project)
                          <li>{{ $project->title }}</li>    
                          @empty
                              Non ha creato progetti
                          @endforelse
                      </ul>                      
                      <a href="{{ route('admin.users.index') }}">
                        <button class="btn btn-primary d-inline-block">Torna indietro</button>
                      </a>
                  </div>
                </div>
            </div>
        </div>
    </article>
</section>

@endsection