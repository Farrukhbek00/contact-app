@extends('layouts.app')

@section('title', 'Index')

@section('content')
    <div class="row" style="margin-top: 30px">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List of contacts</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('emails.index') }}" title="Emails"> Emails
                </a>
                <a style="margin-right: 50px" class="btn btn-warning" href="{{ route('phones.index') }}" title="Phones">Phones
                </a>
                <a class="btn btn-success" href="{{ route('contacts.create') }}" title="Create a contact"> <i class="fas fa-plus-circle"></i>
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <form action="{{ route('contacts.index') }}" method="GET">
        <div class="form-group">
            <input type="text" name="search" class="form-control" placeholder="Search by id,name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <table class="table table-bordered table-hover table-responsive-lg table-dark">
        <tr>
            <th>No</th>
            <th>Name</th>
            <td></td>
        </tr>
        @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->name }}</td>
                <td>
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">

                        <a href="{{ route('contacts.show', $contact->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('contacts.edit', $contact->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $contacts->links() !!}

@endsection
