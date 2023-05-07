@csrf
<div class="row">
    <div class="col-12">
        <div class="form-floating">
            <input type="file" placeholder="image" class="form-control" name="image"
                value="{{ isset($foto) ? $foto->image : old('image') }}">
            <label>Foto</label>
        </div>
    </div>
    <input type="hidden" placeholder="id_fotografo" class="form-control" name="id_fotografo"
        value="{{ auth()->user()->id }}">
    <input type="hidden" placeholder="id_evento" class="form-control" name="id_evento"
        value="{{ $id_evento }}">
</div>
