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

            <form action="@yield('route2-for-create-or-edit')" method="POST">
                @csrf
                @yield('method-for-create-or-edit')
                <div class="mb-3 input-group">
                    <label for="name" class="input-group-text">Nome del tipo:</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $type->name) }}">
                </div>
                <div class="mb-3 input-group">
                    <button type="submit" class="btn btn-success d-line-block m-2">Modifica</button>
                </div>  
            </form>
            <a href="{{ route('admin.types.index') }}" class="m-2">
                <button class="btn btn-primary d-inline-block">Torna indietro</button>
            </a>
        </div>
    </div>
</div>
@endsection