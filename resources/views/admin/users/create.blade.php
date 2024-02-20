@extends('admin.users.create-or-edit')



@section('route-for-create-or-edit')
    {{ route('admin.users.store') }}
@endsection


@section('method-for-create-or-edit')
    @method('POST')
@endsection