@extends('layouts.admin')

@section('head-title')
    @yield('create-or-edit')
@endsection

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

            <form action="@yield('route-for-create-or-edit')" method="POST">
                @csrf
                @yield('method-for-create-or-edit')
                <div class="mb-3 input-group">
                    <label for="name" class="input-group-text">Nome Tecnologia:</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ old('title', $technology->name) }}">
                </div>
                <div class="mb-3 input-group">
                    <label for="icon" class="input-group-text">Inserisci il link per l'icona:</label>
                    <input class="form-control" type="text" name="icon" id="icon" value="{{ old('title', $technology->icon) }}">
                </div>
                <div class="mb-3 input-group">
                    <label for="version" class="input-group-text">Versione:</label>
                    <input class="form-control" type="text" name="version" id="version" value="{{ old('date', $technology->version) }}">
                </div>
                <div class="mb-3 input-group">
                    <label for="released_date" class="input-group-text">Data Rilascio:</label>
                    <input class="form-control" type="date" name="released_date" id="released_date" value="{{ old('date', $technology->released_date) }}">
                </div>
                <div class="mb-3 input-group">
                    <label for="doc_link" class="input-group-text">Link per la documentazione:</label>
                    <input class="form-control" type="text" name="doc_link" id="doc_link" value="{{ old('date', $technology->doc_link) }}">
                </div>
                <div class="mb-3 input-group">
                    <button type="submit" class="m-2 btn btn-success d-line-block">Modifica</button>
                </div>  
            </form>
            <a href="{{ route('admin.technologies.index') }}" class="m-2">
                <button class="btn btn-primary d-inline-block">Torna indietro</button>
            </a>
        </div>
    </div>
</div>
@endsection