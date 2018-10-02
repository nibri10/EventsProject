@extends('user.layout')

@section('content')



  @if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
  @endif

      @foreach ($events as $events)
      <div class="card-group">
      <div class="card">
          <div class="card border-success mb-3">
              <div class="card-header">{{$events->name}}</div>
              <div class="card-body text-success">
              <h5 class="card-title">{{$events->date_initial}}</h5>
              <p class="card-text">{{$events->description}}</p>
              </div>
            </div>
       </div>
      </div> 
      @endforeach
 



@endsection