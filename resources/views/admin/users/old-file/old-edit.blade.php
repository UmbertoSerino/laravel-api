@extends('layouts.admin')

<title>@yield('head-title', 'Edita un nuovo progetto')</title>

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

            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3 input-group">
                    <label for="title" class="input-group-text">Nome:</label>
                    <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $user->name) }}">
                </div>
                <div class="mb-3 input-group">
                    <label for="email" class="input-group-text">Email:</label>
                    <input class="form-control" type="email" name="email" id="email" value="{{ old('date', $user->email) }}">
                </div>
                <div class="mb-3 input-group">
                    <label for="date_of_birth" class="input-group-text">Data di nascita:</label>
                    <input class="form-control" type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date', $user->userProfile->date_of_birth) }}">
                </div>
                <div class="mb-3 input-group">
                    <label for="phone_number" class="input-group-text">Numero di cellulare:</label>
                    <input class="form-control" type="text" name="phone_number" id="phone_number" value="{{ old('date', $user->userProfile->phone_number) }}">
                </div>
                inseriamo foto

                inseriamo la foto
                <div class="mb-3 input-group">
                    <a href="{{ route('admin.users.show', $user) }}" class="m-2">
                        <button class="btn btn-success d-line-block">Modifica</button>
                    </a>
                    
                </div>
                
            </form>
            <a href="{{ route('admin.users.index') }}" class="m-2">
                <button class="btn btn-primary d-inline-block">Torna indietro</button>
            </a>
        </div>
    </div>
</div>
@endsection