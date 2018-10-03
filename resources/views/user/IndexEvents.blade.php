@extends('user.layout')

@section('content')

  @if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
  @endif
@foreach ($events as $events)
  <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{$events->name}}</h5>
              <p class="card-text">{{$events->description}}</p>
            <p class="card-tex"><small class="text-muted">{{$events->date_initial}}</small></p>
              <a href="#" class="btn btn-primary">Visitar</a>
            </div>
          </div>
        </div>       
 </div>
@endforeach
@endsection



     