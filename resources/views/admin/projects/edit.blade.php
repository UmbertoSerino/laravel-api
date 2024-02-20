@extends('admin.projects.create-or-edit')


@section('route-for-create-or-edit')
    {{ route('admin.projects.update', $project) }}
@endsection

@section('method-for-create-or-edit')
    @method('PUT')
@endsection
