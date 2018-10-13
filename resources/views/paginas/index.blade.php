@extends('events.layout.app')
@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Eventos</h1>
        </div>


        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        @foreach ($events as $event)


            @if($event->vacancies>0)
                <div class="container">
                    <div class="card-deck">
                        <div class="card border-primary mb-4">
                            <img src="{{$event->image}}" class="img-fluid" alt="Responsive image">
                            <h5 class="card-title">Titulo:{{$event->name}}</h5>
                            <p class="card-text">Descrição:{{$event->description}}</p>
                            <p class="card-text">Local:{{$event->local}}</p>
                            <p class="card-text">Horario:{{$event->time}}</p>
                            <p class="card-text">Horário Termino:{{$event->time_expiration}}</p>
                            <p class="card-text">Cidade:{{$event->city}}</p>
                            <p class="card-text">Vagas:{{$event->vacancies}}</p>
                            <p class="card-text">Publico Alvo:{{$event->target_audience}}</p>
                            <p class="card-text"><small class="text-muted">Data inicio:{{$event->date_initial}}</small></p>
                            <p class="card-text"><small class="text-muted">Data de Termino:{{$event->date_finish}}</small></p>
                            <button type="submit" class="btn btn-primary">Inscrever-se</button>

                        </div>
                    </div>
                    <br>
                    <br>
                </div>
            @endif

        @endforeach


    </main>

    </div>
@endsection
