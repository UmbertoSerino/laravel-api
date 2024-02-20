@extends('admin.types.create-or-edit')


@section('route-for-create-or-edit')
    {{ route('admin.types.update', $type) }}
@endsection

@section('method-for-create-or-edit')
    @method('PUT')
@endsection
