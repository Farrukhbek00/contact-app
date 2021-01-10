<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name</strong>
            @if($create)
                <input type="text" name="name" class="form-control" placeholder="Name">
                @for($i = 0; $i < 2; $i++)
                    <div class="form-group">
                        <strong>Email {{ $i + 1 }}</strong>
                        <input type="text" class="form-control" name="emails[]" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <strong>Phone {{ $i + 1 }}</strong>
                        <input type="text" class="form-control" name="phones[]" placeholder="Phone">
                    </div>
                @endfor
            @else
                <input type="text" name="name" value="{{ $contact->name }}" class="form-control" placeholder="Name">
                @foreach ($contact->emails as $item)
                    <div class="form-group">
                        <strong>Email {{ $item->id }}</strong>
                        <input type="text" class="form-control" name="emails[]" value="{{ $item->email }}" placeholder="Email">
                    </div>
                @endforeach
                @foreach ($contact->phones as $item)
                    <div class="form-group">
                        <strong>Phone {{ $item->id }}</strong>
                        <input type="text" class="form-control" name="phones[]" value="{{ $item->phone }}" placeholder="Phone">
                    </div>
                @endforeach
            @endif
        </div>

    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
