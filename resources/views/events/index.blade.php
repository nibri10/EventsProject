@extends('events.layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-18 margin-tb">
           
            
            <div class="pull-right">
                <br><br>
                <a class="btn btn-success" href="{{ route('events.create') }}"> Criar novo Evento</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            
            <th>Título do evento:</th>
            <th>Data do Evento</th>
            <th>Descrição</th>
            <th>Ações</th>
            
        </tr>
        @foreach ($events as $events)
        <tr>
            
            <td>{{ $events->name }}</td>
            <td>{{ $events->date }}</td>
            <td>{{ $events->description}}</td>
            <td>
                <form action="{{ route('events.destroy',$events->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('events.show',$events->id) }}">Detalhes</a>
                    <a class="btn btn-primary" href="{{ route('events.edit',$events->id) }}">Editar</a>


                    @csrf
                    @method('DELETE')

   
                    <button type="submit" class="btn btn-danger">Apagar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
