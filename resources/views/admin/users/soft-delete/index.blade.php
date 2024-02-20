@extends('layouts.admin')

<title>@yield('head-title', 'Project - Delete')</title>



@section('main-content')
<div class="container">
    <div class="row">
      <h1 class="mb-5 text-center">
          Qui sono disponibili tutti i progetti di: {{ Auth::user()->name }}!
      </h1>
        <div class="col-6">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Torna indietro</a>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <a href="">
                        <th scope="col">Titolo</th>

                    </a>
                    <th scope="col">Descrizione</th>
                    <th scope="col">data di consegna</th>
                    <th scope="col">Completato</th>
                    <th scope='col'>Funzioni</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project )
                  <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    {{-- se maggiore di 100 riduci la stringa a 100 e aggiungi ... --}}
                    <td> {{ strlen($project->description) > 100 ? substr($project->description, 0, 100) . '...' : $project->description }}</td>
                    <td>{{ $project->date }}</td>
                    <td>{{ $project->complete ? 'Completato' : 'Incompleto' }} 
                    </td>
                    <td>
                        <a href="{{ route('admin.softdelete.show', $project) }}">
                            <button class="btn btn-primary m-2 inline-block">Mostra</button>
                        </a>
                      <form action="{{ route('admin.softdelete.restore', $project) }}" method="POST">
                        @csrf
                        @method('PATCH')
                          <button class="btn btn-warning m-2 inline-block">Recupera</button>
                      </form>

                      
                      <form action="{{ route('admin.softdelete.destroy', $project) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger m-2 inline-block">Elimina</button>
                      </form>
                    </a>
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