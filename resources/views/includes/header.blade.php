<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            @if($create)
                <h2>Create Contact</h2>
            @else
                <h2>Edit Contact № {{ $id }}</h2>
            @endif
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('contacts.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
