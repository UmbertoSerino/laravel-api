@extends('layouts.admin')

<title>@yield('head-title', 'My technology - (Index)')</title>



@section('main-content')
<div class="container">
    <div class="row">
      <h1 class="mb-5 text-center">
          Qui sono disponibili tutti i progetti di: {{ Auth::user()->name }}!
      </h1>
        <div class="col-6">
            <a href="{{ route('admin.technologies.create') }}" class="btn btn-primary">Crea una nuova tecnologia</a>
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
                    <th scope="col">versione</th>
                    <th scope="col">data di rilascio</th>
                    <th scope="col">Link Documentazione</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($technologies as $technology )
                  <tr>
                    <th scope="row">{{ $technology->id }}</th>
                    <td>{{ $technology->name }}
                      <div class="d-flex" style="width: 30px">
                        <img src="{{ $technology->icon }}" class="w-100" alt="icon {{ $technology->name }}">
                      </div>
                    </td>
                    <td> {{ $technology->version }}</td>
                    <td>{{ $technology->released_date }}</td>
                    <td>{{ $technology->doc_link  }} 
                    </td>
                    <td>
                        <a href="{{ route('admin.technologies.show', $technology) }}">
                            <button class="btn btn-primary m-2 inline-block">Mostra</button>
                        </a>
                        @include('admin.technologies.partials-button.button')
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

                      {{-- <div class="d-flex" style="width: 30px">
                        <p class="me-3">
                          {{ $technology->name }}
                        </p>
                        <img src="{{ $technology->icon }}" class="w-100" alt="icon {{ $technology->name }}">
                      </div> --}}