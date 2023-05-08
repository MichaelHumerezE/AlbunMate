@csrf
<div class="row">
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="name" class="form-control" name="name"
                value="{{ isset($perfil) ? $perfil->name : old('name') }}">
            <label>Nombre</label>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="apellidos" class="form-control" name="apellidos"
                value="{{ isset($perfil) ? $perfil->apellidos : old('apellidos') }}">
            <label>Apellidos</label>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="number" placeholder="ci" class="form-control" name="ci"
                value="{{ isset($perfil) ? $perfil->ci : old('ci') }}">
            <label>CI</label>
        </div>
    </div>
    <div class="col-12">
        <h5>Género</h5>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault1" value="M"
                @if ((isset($perfil) ? $perfil->sexo : old('sexo')) == 'M') checked @endif>
            <label class="form-check-label" for="flexRadioDefault1">
                Masculine
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault1" value="F"
                @if ((isset($perfil) ? $perfil->sexo : old('sexo')) == 'F') checked @endif>
            <label class="form-check-label" for="flexRadioDefault2">
                Female
            </label>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="number" placeholder="phone" class="form-control" name="phone"
                value="{{ isset($perfil) ? $perfil->phone : old('phone') }}">
            <label>Teléfono</label>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="email" placeholder="email" class="form-control" name="email"
                value="{{ isset($perfil) ? $perfil->email : old('email') }}">
            <label>E-Mail</label>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="domicilio" class="form-control" name="domicilio"
                value="{{ isset($perfil) ? $perfil->domicilio : old('domicilio') }}">
            <label>Domicilio</label>
        </div>
    </div>
    <div class="col-12">
        <h5>Suscripcion</h5>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="suscripcion" id="flexRadioDefault1" value="0"
                disabled @if ((isset($perfil) ? $perfil->suscripcion : old('suscripcion')) == '0') checked @endif>
            <label class="form-check-label" for="flexRadioDefault1">
                Inactivo
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="suscripcion" id="flexRadioDefault1" value="1"
                disabled @if ((isset($perfil) ? $perfil->suscripcion : old('suscripcion')) == '1') checked @endif>
            <label class="form-check-label" for="flexRadioDefault1">
                Activo
            </label>
        </div>
    </div>
    <input type="hidden" name="tipo_p" class="form-control" id="exampleInputPassword1" value="{{ $perfil->tipo_p }}">
    <input type="hidden" name="tipo_o" class="form-control" id="exampleInputPassword1" value="{{ $perfil->tipo_o }}">
    <input type="hidden" name="tipo_f" class="form-control" id="exampleInputPassword1" value="{{ $perfil->tipo_f }}">
    <input type="hidden" name="tipo_i" class="form-control" id="exampleInputPassword1" value="{{ $perfil->tipo_i }}">
</div>
