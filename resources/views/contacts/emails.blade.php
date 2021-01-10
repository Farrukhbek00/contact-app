@extends('layouts.app')

@section('title', 'Emails')

@section('content')
    <div class="row" style="margin-top: 30px">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Emails</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('contacts.index') }}">Back</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered table-hover table-responsive-lg table-dark">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <td></td>
        </tr>
        @foreach ($emails as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->email }}</td>
            </tr>
        @endforeach
    </table>

    {!! $emails->links() !!}

@endsection
