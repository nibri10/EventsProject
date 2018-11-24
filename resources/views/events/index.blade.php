@extends('events.layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-20 margin-tb">


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


    <table class="table table-dark">
        <thead class="thead-dark">
        <tr class="m-lg-auto">
            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Nome</th>
            <th scope="col-xs-2 col-sm-2 col-md-2 col-lg-2">Descrição</th>
            <th scope="col-xs-2 col-sm-2 col-md-2 col-lg-2">Data de Ínicio</th>
            <th scope="col-xs-2 col-sm-2 col-md-2 col-lg-2">Data de Termino</th>
            <th scope="col-xs-2 col-sm-2 col-md-2 col-lg-2">Local</th>
            <th scope="col-xs-2 col-sm-2 col-md-2 col-lg-2">Hora de Ínicio </th>
            <th scope="col-xs-2 col-sm-2 col-md-2 col-lg-2">Hora de Termino </th>
            <th scope="col-xs-2 col-sm-2 col-md-2 col-lg-2">Cidade</th>
            <th scope="col-xs-2 col-sm-2 col-md-2 col-lg-2">Numero de vagas  </th>
            <th scope="col-xs-2 col-sm-2 col-md-2 col-lg-2">Publico Alvo   </th>
            <th scope="col-xs-2 col-sm-2 col-md-2 col-lg-2">Status</th>
            <th scope="col-xs-2 col-sm-2 col-md-2 col-lg-2">Ação</th>
        </tr>

        </thead>
        <tbody>
        @foreach ($events as $events)
            @if($events->active==1)
            <tr>
                <td scope="row">{{$events->name}}</td>
                <td scope="row">{{$events->description}}</td>
                <td scope="row">{{$events->date_initial}}</td>
                <td scope="row">{{$events->date_finish}}</td>
                <td scope="row">{{$events->local}}</td>
                <td scope="row">{{$events->time}}</td>
                <td scope="row">{{$events->time_expiration}}</td>
                <td scope="row">{{$events->city}}</td>
                <td scope="row">{{$events->vacancies}}</td>
                <td scope="row">{{$events->target_audience}}</td>
                <td scope="row">Desativado</td>
                <td scope="row">
                    <form action="{{ route('events.destroy',$events->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('events.show',$events->id) }}">Detalhes</a>
                        <a class="btn btn-primary" href="{{ route('events.edit',$events->id) }}">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Apagar</button>
                    </form>
                    <form action="{{route('events.desactive',$events->id)}}" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-dark">Ativar</button>
                    </form>
                </td>

            </tr>
            @endif

            @if($events->active==0)
                <tr>
                    <td scope="row ">{{$events->name}}</td>
                    <td scope="row">{{$events->description}}</td>
                    <td scope="row">{{$events->date_initial}}</td>
                    <td scope="row">{{$events->date_finish}}</td>
                    <td scope="row">{{$events->local}}</td>
                    <td scope="row">{{$events->time}}</td>
                    <td scope="row">{{$events->time_expiration}}</td>
                    <td scope="row">{{$events->city}}</td>
                    <td scope="row">{{$events->vacancies}}</td>
                    <td scope="row">{{$events->target_audience}}</td>
                    <td scope="row">Ativado</td>
                    <td scope="row">
                        <form action="{{ route('events.destroy',$events->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('events.show',$events->id) }}">Detalhes</a>
                            <a class="btn btn-primary" href="{{ route('events.edit',$events->id) }}">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Apagar</button>
                        </form>
                        <form action="{{route('events.desactive',$events->id)}}" method="POST">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-dark">Desativar</button>
                        </form>
                    </td>

                </tr>
            @endif

        @endforeach
        </tbody>
    </table>
    </div>

    </div>


</div>
@endsection
