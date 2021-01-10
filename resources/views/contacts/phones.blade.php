@extends('layouts.app')

@section('title', 'Phones')

@section('content')
    <div class="row" style="margin-top: 30px">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Phones</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('contacts.index') }}">Back</a>
            </div>
        </div>
    </div>

    <table style="margin-top: 30px" class="table table-bordered table-hover table-responsive-lg table-dark">
        <tr>
            <th>ID</th>
            <th>Phone</th>
            <td></td>
        </tr>
        @foreach ($phones as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->phone }}</td>
            </tr>
        @endforeach
    </table>

    {!! $phones->links() !!}
@endsection
