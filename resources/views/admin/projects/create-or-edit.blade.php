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
             {{-- @dump($technologies->pluck('name')) --}}
             {{-- @dump($types) --}}

            <form action="@yield('route-for-create-or-edit')" method="POST">
                @csrf
                @yield('method-for-create-or-edit')
                <div class="mb-3 input-group">
                    <label for="title" class="input-group-text">Titolo:</label>
                    <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $project->title) }}">
                </div>
                <div class="mb-3 input-group">
                    <label for="date" class="input-group-text">Data:</label>
                    <input class="form-control" type="date" name="date" id="date" value="{{ old('date', $project->date) }}">
                </div>
                {{-- ------------------------- --}}
                <div class="mb-3 input-group">
                    <label for="technologies" class="me-4"><strong>Tecnologie usate:</strong></label>
                    <div>
                        @foreach ($technologies as $technology)
                        {{-- Aggiungere il simbolo dell'array [] al name per poter scegliere più checkbox per lo stesso calmpo, altrimenti passa il valore dell'ultima checkbox selezionata --}}
                            <input class="form-check-input" type="checkbox" name="technologies[]" id="technologies-{{ $technology->id }}" value="{{ $technology->id }}" 
                            {{-- se la tech su cui sto ciclando è presente nelle tech che ho inviato e voglio rivederlo come errore, selezionalo, se invece non ho errori, cercalo all'iterno della lista delle tech presenti nel procjet --}}
                            {{ in_array($technology->id, old('technologies', $project->technologies->pluck('id')->toArray())) ? 'checked' : '' }}>

                            <label for="technologies-{{ $technology->id }}">{{ $technology->name }}</label>
                        @endforeach
                    </div>
                </div>
                {{-- ------------------------- --}}
                <select class="form-select my-4" aria-label="Default select example" name="type_id" id="type_id">
                    <option selected>Seleziona il Tipo</option>
                    @forelse ($types as $type)

                    <option value="{{ $type->id }}"
                        {{-- condizione per la OLD, l'id del type è uguale alla vecchia categoria? se lo è mettila, sennò metti il tipo del project, se così metti selected--}}
                        {{ $type->id == old('type_id', $project->type_id) ? 'selected' : ''}}
                        {{-- Fine condizione old e chiusura tag option--}}
                        >{{ $type->name }}</option>
                    @empty
                    <option value="3">Non ci sono tipi</option>
                    @endforelse
                  </select>
                  <div class="form-check form-switch">
                      <label class="form-check-label" for="complete">Completato?</label>
                    <input type="hidden" name="complete" value="0">
                    <input class="form-check-input" type="checkbox" role="switch" id="complete" name="complete" value="1">
                </div> 
                <div class="mb-3 input-group">
                    <label for="description" class="input-group-text">Descrizione:</label>
                    <textarea class="form-control"  name="description" id="description" cols="40" rows="10">{{ old('description',$project->description)  }}</textarea>
                </div>
                <div class="mb-3 input-group">
                    <button type="submit" class="m-2 btn btn-success d-line-block">Modifica</button>
                </div>  
            </form>
            <a href="{{ route('admin.projects.index') }}" class="m-2">
                <button class="btn btn-primary d-inline-block">Torna indietro</button>
            </a>
        </div>
    </div>
</div>
@endsection