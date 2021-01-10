@extends('layouts.app')

@section('content')
    @include('includes.header', ['create' => true])

    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        @include('includes.form', ['create' => true])
    </form>
@endsection
