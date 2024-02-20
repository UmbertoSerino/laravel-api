@extends('admin.technologies.create-or-edit')



@section('route-for-create-or-edit')
    {{ route('admin.technologies.store') }}
@endsection


@section('method-for-create-or-edit')
    @method('POST')
@endsection