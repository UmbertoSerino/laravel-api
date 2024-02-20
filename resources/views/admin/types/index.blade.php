@extends('layouts.admin')

<title>@yield('head-title', 'My type - (Index)')</title>



@section('main-content')
<div class="container">
    <div class="row">
      <h1 class="mb-5 text-center">
          Qui sono disponibili tutti i tipi di: {{ Auth::user()->name }}!
      </h1>
        <div class="col-6">
            <a href="{{ route('admin.types.create') }}" class="btn btn-primary">Crea un nuovo Tipo</a>
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
                  </tr>
                </thead>
                <tbody>
                  @forelse ($types as $type)
                  <tr>
                    <td>{{ $type->id }}</td>
                    <td>{{ $type->name }}</td>
                    <td>
                      <a href="{{ route('admin.types.show', $type) }}">
                          <button class="btn btn-primary m-2 inline-block">Mostra</button>
                      </a>
                      @include('admin.types.partials-button.button')
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