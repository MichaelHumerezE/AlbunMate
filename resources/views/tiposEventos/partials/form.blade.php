@csrf
<div class="row">
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="name" class="form-control" name="name"
                value="{{ isset($tipoEvento) ? $tipoEvento->name : old('name') }}">
            <label>Name</label>
        </div>
    </div>
</div>
