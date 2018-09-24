@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Criar um novo evento</h2><br/>
    <form method="post" action="{{url('events')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="col">
                <label for="titulo"> Título do Evento:</label>
                <input type="text" class="form-control" placeholder="Titulo do evento" name="name">
            </div>
            <div class="col">
                <label for="descricao"> Descrição do Evento:</label>
                <input type="text" class="form-control" placeholder="Descrição" name="description">
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="col">
                <label for="Local"> Local do Evento:</label>
                <input type="text" class="form-control" placeholder="Local" name="local">
            </div>
            <br>
            <div class="col">
                <label for="date"> Data do Evento:</label>
                <input type="date" class="form-control" placeholder="Descrição" name="date">
            </div>
        </div>
        <br>

        <div class="form-row">
            <div class="col">
                <label for="horario"> Horário do Evento:</label>
                <input type="time" class="form-control" placeholder="tempo" name="time">
            </div>
        </div>
        <br>
         <button type="submit" class="btn btn-primary">Criar Evento</button>
</div>
</form>
</div>
@endsection