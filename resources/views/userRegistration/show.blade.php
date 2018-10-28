@extends('events.layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-18 margin-tb">


                <div class="pull-right">
                    <br><br>
                    <a class="btn btn-success" href="{{ '/painel'}}">Voltar</a>
                </div>
            </div>
        </div>


        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table">
            <thead>
            <tr>

                <th scope="col">Nome do Usuario:</th>
                <th scope="col">Evento:</th>
            </tr>
            </thead>

            @foreach ($userRegistration as $userRegistrations)
                <tr>
                    <td>{{ $userRegistrations->username}}</td>
                    <td>{{ $userRegistrations->eventname}}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
