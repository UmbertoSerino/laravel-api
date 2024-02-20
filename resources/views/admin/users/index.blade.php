@extends('layouts.admin')

<title>@yield('head-title', 'My user - (Index)')</title>



@section('main-content')
<div class="container">
    <div class="row">
      <h1 class="mb-5 text-center">
          Qui sono disponibili tutti i progetti di: {{ Auth::user()->name }}!
      </h1>
        <div class="col-6">
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Crea un nuovo Utrente</a>
        </div>
        <div class="col-6 mb-5">
          <a href="{{ route('admin.softdelete.index') }}" class="btn btn-primary">Il tuo cestino</a>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Indirizzo Email</th>
                    <th scope="col">data di nascita</th>
                    <th scope="col">Immagine di profilo</th>
                    <th scope='col'></th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user )
                  <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td> {{ ($user->name)  }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->userProfile->date_of_birth }}</td>
                    <td><img style="width: 70px; border-radius: 50%;" src="{{ $user->userProfile->user_photo }}" alt="photo {{ $user->name }}"></td>
                  </td>
                  <td>
                    <a href="{{ route('admin.users.show', $user) }}">
                      <button class="btn btn-primary m-2 inline-block">Mostra</button>
                    </a>
                    @include('admin.users.partials-button.button')
                  </td>
                  @empty
                  <td> Non ci sono progetti {{ Auth::user()->name }} </td>
                  @endforelse 
                  </tr>
                </tbody>
              </table>
        </div>
    </div>

</div>

@endsection