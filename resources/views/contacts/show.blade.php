@extends('layouts.app')

@section('title', 'show')

@section('content')
    <div class="row" style="margin-top: 30px">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Contact № {{ $contact->id }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('contacts.index') }}">Back</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $contact->name }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm">
            <table class="table table-hover table-dark">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Email</th>
                    <td>Delete</td>
                </tr>
                </thead>
                <tbody>
                @foreach($contact->emails as $item)
                    <tr>
                        <td scope="row">{{ $item->id }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <form action="{{ route('emails.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                    <i class="fas fa-trash fa-lg text-danger"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-sm">
            <table class="table table-hover table-dark">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Phone</th>
                    <td>Delete</td>
                </tr>
                </thead>
                <tbody>
                @foreach($contact->phones as $item)
                    <tr>
                        <td scope="row">{{ $item->id }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>
                            <form action="{{ route('phones.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                    <i class="fas fa-trash fa-lg text-danger"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
