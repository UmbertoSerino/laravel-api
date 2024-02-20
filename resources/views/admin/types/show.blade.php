@extends('layouts.admin')

<title>@yield('head-title', 'My type - (Show)')</title>

@section('main-content')
<section class="container-heros-cards">
    <article class="container-card p-3">
        <div class="row">
            <div class="col-12">
                <div class="card m-auto">
                    <div class="card-body">
                      <h5 class="card-title">Tipo: {{ $type['name'] }}</h5>
                      <a href="{{ route('admin.types.index') }}">
                        <button class="btn btn-primary d-inline-block">Torna indietro</button>
                      </a>
                      @include('admin.types.partials-button.button')
                  </div>
                </div>
            </div>
        </div>
    </article>
</section>

@endsection