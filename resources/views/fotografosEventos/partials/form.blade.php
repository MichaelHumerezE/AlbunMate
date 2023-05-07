@csrf
<div class="row">
    <div class="col-12">
        <br>
        <label>Elegir un fotógrafo</label>
        <select name="id_fotografo" class="form-control">
            <option value=""> Seleccione Un Fotógrafo... </option>
            @foreach ($fotografos as $fotografo)
                <option value="{{ $fotografo->id }}" @if ((isset($fotografoEvento->id_fotografo) ? $fotografoEvento->id_fotografo : old('id_fotografo')) == $fotografo->id) selected @endif>
                    {{ $fotografo->name }}
                </option>
            @endforeach
        </select>
        <br>
    </div>
    @if (isset($fotografoEvento))
        <input type="hidden" placeholder="id_evento" class="form-control" name="id_evento" value="{{ $fotografoEvento->id_evento }}">
    @else
        <input type="hidden" placeholder="id_evento" class="form-control" name="id_evento" value="{{ $id_evento }}">
    @endif

</div>
