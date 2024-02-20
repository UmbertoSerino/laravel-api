@extends('layouts.admin')

<title>@yield('head-title', 'My Project - (Index)')</title>



@section('main-content')
<div class="container">
    <div class="row">
      <h1 class="mb-5 text-center">
          Qui sono disponibili tutti i progetti di: {{ Auth::user()->name }}!
      </h1>
        <div class="col-6">
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Crea un nuovo Progetto</a>
        </div>
        <div class="col-6 mb-5">
          <a href="{{ route('admin.softdelete.index') }}" class="btn btn-primary">Il tuo cestino</a>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">data di consegna</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Completato</th>
                    <th scope='col'>Funzioni</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project )
                  <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td> {{ strlen($project->description) > 100 ? substr($project->description, 0, 100) . '...' : $project->description }}</td>
                    <td>{{ $project->date }}</td>
                    <td>{{ $project->type->name }}</td>
                    <td>{{ $project->complete ? 'Completato' : 'Incompleto' }} </td>
                    <td>{{ $project->user->name }}</td>

                    <td>
                        <a href="{{ route('admin.projects.show', $project) }}">
                            <button class="btn btn-primary m-2 inline-block">Mostra</button>
                        </a>
                        @include('admin.projects.partials-button.button')
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