@extends('admin.users.create-or-edit')


@section('route-for-create-or-edit')
    {{ route('admin.users.update', $user) }}
@endsection

@section('method-for-create-or-edit')
    @method('PUT')
@endsection
