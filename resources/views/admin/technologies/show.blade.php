@extends('layouts.admin')

<title>@yield('head-title', 'My technology - (Show)')</title>

@section('main-content')
<section class="container-heros-cards">
    <article class="container-card p-3">
        <div class="row">
            <div class="col-12">
                <div class="card m-auto">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title"><strong> Nome Tecnologia: </strong> {{ $technology['name'] }}
                            </h5>
                            <div style="width: 30px">
                                <img src="{{ $technology->icon }}" class="w-100" alt="icon {{ $technology->name }}">
                          </div>
                        </div> 
                        <p class="card-text"><strong> Versione: </strong> {{ $technology['version'] }}</p>
                        <p class="card-text"><strong> Data rilascio: </strong> {{ $technology['released_date'] }}</p>
                      <p class="card-text"><strong> Link per documentazione:</strong> <a href="{{ $technology->doc_link }}">{{ $technology['doc_link'] }}</a></p>
                      
                      <a href="{{ route('admin.technologies.index') }}">
                        <button class="btn btn-primary d-inline-block">Torna indietro</button>
                      </a>
                      @include('admin.technologies.partials-button.button')
                  </div>
                </div>
            </div>
        </div>
    </article>
</section>

@endsection