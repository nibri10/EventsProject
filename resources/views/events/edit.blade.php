@extends('events.layout.app')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">

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
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Editar Evento</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('events.index') }}"> Voltar</a>
        </div>
    </div>
</div>
<form action="{{ route('events.update',$event->id) }}"  method="POST">
    @csrf
    @method('PUT')

    <div class="form-row">
        <div class="col">
            <label for="titulo"> Título do Evento:</label>
            <input type="text" value="{{ $event->name }}" class="form-control" placeholder="Titulo do evento" name="name" required>
        </div>
        <div class="col">
            <label for="descricao"> Descrição do Evento:</label>
            <input type="text" class="form-control" placeholder="Descrição" name="description" value="{{ $event->description }}" required>
        </div>
    </div>

    <br>
    <div class="form-row">
        <div class="col">
            <label for="Local"> Local do Evento:</label>
            <input type="text" class="form-control" placeholder="Local" name="local" value="{{ $event->local }}" required>
        </div>
        <br>
        <div class="col">
            <label for="city"> Cidade:</label>
            <input type="text" class="form-control" placeholder="Cidade" name="city" value="{{ $event->city }}" required>
        </div>
    </div>
    <br>

    <div class="form-row">
        <div class="col">
            <label for="date_initial"> Data de Inicio do Evento:</label>
            <input type="date" class="form-control" placeholder="date_initial" name="date_initial" value="{{ $event->date_initial }}" required>
        </div>
        <br>
        <div class="col">
            <label for="date_finish"> Data de Termino do Evento:</label>
            <input type="date" class="form-control" placeholder="date_finish" name="date_finish" value="{{ $event->date_finish }}" required>
        </div>
    </div>
    <br>


    <div class="form-row">
        <div class="col">
            <label for="time"> Horário de Incio:</label>
            <input type="time" class="form-control" placeholder="time" name="time" value="{{ $event->time }}" required>
        </div>
        <br>
        <div class="col">
            <label for="time_expiration"> Horário de Termino:</label>
            <input type="time" class="form-control" placeholder="time_expiration" name="time_expiration" value="{{ $event->time_expiration }}" required>
        </div>
    </div>
    <br>

    <div class="form-row">
        <div class="col">
            <label for="vacancies"> Numero de vagas:</label>
            <input type="text" class="form-control" placeholder="Numero de vagas" name="vacancies" value="{{ $event->vacancies }}" required>
        </div>
        <br>
        <div class="col">
            <label for="target_audience"> Publico Alvo:</label>
            <input type="text" class="form-control" placeholder="publico alvo" name="target_audience" value="{{ $event->target_audience }}" required>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Add images</div>

                    <div class="card-body">
                        <upload-files id="arquivos" :input_name="'arquivo'" :post_url="'painel/files/upload-file'" ></upload-files>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <button type="submit" class="btn btn-primary">Criar Evento</button>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("form").submit(function () {
            $.post('events.update', { 'arquivo' : $("input[name=arquivos]").val() } ,function(){
            });
        });
    </script>





</form>
    </div>
@endsection
