@extends('layouts.app')

@section('title', 'edit')

@section('content')
    @include('includes.header', ['create' => false, 'id' => $contact->id])

    <form action="{{ route('contacts.update',$contact->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('includes.form', ['create' => false])
    </form>
@endsection
