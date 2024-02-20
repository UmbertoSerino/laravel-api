@extends('layouts.admin')

<title>@yield('head-title', 'Crea un nuovo progetto')</title>


@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            @if($errors->any())

            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            <strong>
                                {{ $error }}
                            </strong>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

            <form action="{{ route('admin.projects.store') }}" method="POST">
                @csrf

                <div class="mb-3 input-group">
                    <label for="title" class="input-group-text">Titolo:</label>
                    <input class="form-control" type="text" name="title" id="title" value="{{ old('title') }}">
                </div>
                <div class="mb-3 input-group">
                    <label for="date" class="input-group-text">Data:</label>
                    <input class="form-control" type="date" name="date" id="date" value="{{ old('date') }}">
                </div>
                {{-- modificarlo con checkbox --}}
                <div class="form-check form-switch">
                    <input type="hidden" name="complete" value="0">
                    <input class="form-check-input" type="checkbox" role="switch" id="complete" name="complete" value="1">
                    <label class="form-check-label" for="complete">Completato?</label>
                </div> 
                <div class="mb-3 input-group">
                    <label for="description" class="input-group-text">Descrizione:</label>
                    <textarea class="form-control"  name="description" id="description" cols="40" rows="10">{{ old('description')  }}</textarea>
                </div>
                <div>
                    <button class="btn btn-success m-2">
                        Crea
                    </button>
                    
                </div>
                
            </form>
            <a href="{{ route('admin.projects.index') }}">
                <button class="btn btn-primary m-2">
                    Torna indietro
                </button>
            </a>
        </div>
    </div>
</div>
@endsection