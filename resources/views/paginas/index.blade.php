@extends('events.layout.app')
@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        @if($events->count()==0)
            <div class="alert alert-info" role="alert">
                Não possui nenhum evento cadastrado!
            </div>
        @endif

        @if($events->count()>0)
        <div class="row">
        @foreach ($events as $event)
            @if($event->vacancies==0 || $event->active==1)
                    <div class="alert alert-info" role="alert" style="width:100%;">
                        Não possui nenhum evento Ativo!
                    </div>
                @endif
            @if($event->vacancies>0 && $event->active==0)
                <div class="col-md-4">
                <form method="post" @if(Auth::user()->level==0)action="{{route('usuarios.store')}}" @endif enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="container">
                        <div class="card" style="width: 20rem; text-align:center;display:inline-block;">
                            <div class="card border-primary mb-4">
                                <img src="http://logofaves.com/wp-content/uploads/2011/10/imag_m.jpg?9cf02b" class="img-fluid" alt="Responsive image">
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
                                <input type="hidden" name="event_id_event" value="{{$event->id}}" >
                                <input type="hidden" name="user_id_user" value="{{Auth::user()->id}}">
                                <input type="hidden" name="id" value="{{$event->id}}" >
                                @if(Auth::user()->level==0)
                                <button type="submit" class="btn btn-primary">Inscrever-se</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
                   </div>

            @endif
        @endforeach
        </div>
        @endif
    </main>

    </div>
@endsection
