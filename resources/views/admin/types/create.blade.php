@extends('admin.types.create-or-edit')



@section('route2-for-create-or-edit')
    {{ route('admin.types.store') }}
@endsection


@section('method-for-create-or-edit')
    @method('POST')
@endsection