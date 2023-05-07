@csrf
<div class="row">
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="name" class="form-control" name="name"
                value="{{ isset($evento) ? $evento->name : old('name') }}">
            <label>Name</label>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="descripcion" class="form-control" name="descripcion"
                value="{{ isset($evento) ? $evento->descripcion : old('descripcion') }}">
            <label>Descripción</label>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input @if (isset($evento)) type="hidden" @endif type="text" placeholder="carpeta"
                class="form-control" name="carpeta" value="{{ isset($evento) ? $evento->carpeta : old('carpeta') }}">
            <label>Carpeta</label>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="file" placeholder="image" class="form-control" name="image"
                value="{{ isset($evento) ? $evento->image : old('image') }}">
            <label>Imagen</label>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="direccion" class="form-control" name="direccion"
                value="{{ isset($evento) ? $evento->direccion : old('direccion') }}">
            <label>Dirección</label>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="date" placeholder="fecha" class="form-control" name="fecha"
                value="{{ isset($evento) ? $evento->fecha : old('fecha') }}">
            <label>Fecha</label>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="time" placeholder="hora" class="form-control" name="hora"
                value="{{ isset($evento) ? $evento->hora : old('hora') }}">
            <label>Hora</label>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="codigo" class="form-control" name="codigo"
                value="{{ isset($evento) ? $evento->codigo : old('codigo') }}">
            <label>Codigo</label>
        </div>
    </div>
    <div class="col-12">
        <br>
        <label>Tipo De Evento</label>
        <select name="id_tipoEvento" class="form-control">
            <option value=""> Seleccione Un Tipo De Evento... </option>
            @foreach ($tiposEventos as $tipoEvento)
                <option value="{{ $tipoEvento->id }}" @if ((isset($evento->id_tipoEvento) ? $evento->id_tipoEvento : old('id_tipoEvento')) == $tipoEvento->id) selected @endif>
                    {{ $tipoEvento->name }}
                </option>
            @endforeach
        </select>
        <br>
    </div>
    <input type="hidden" placeholder="id_organizador" class="form-control" name="id_organizador"
        value="{{auth()->user()->id}}">
</div>
