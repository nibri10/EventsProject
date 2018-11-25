@extends('events.layout.app')
@section('content')
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if($subscription->count()==0)

                <div class="alert alert-info" role="alert">
                   {{Auth::user()->name}} você não está cadastrado em nenhum evento!
                </div>

            @endif

        @if($subscription->count()>0)
            <table class="table table-dark ">
                <thead>
                <tr>
                    <th scope="col">Nome do Usuario</th>
                    <th scope="col">Evento</th>
                    <th scope="col">Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($subscription as $subscription)
                    <tr>
                        <td>{{ $subscription->username}}</td>
                        <td>{{ $subscription->eventname}}</td>
                        <td>
                            <form action="{{ route('usuarios.destroy',$subscription->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            <button type="submit" class="btn btn-danger">Cancelar Inscrição</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @endif
    </div>
@endsection
