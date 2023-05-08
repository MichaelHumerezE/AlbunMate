@if (isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        <ul class="list-unstyled mb-0">
            @foreach ($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
@endif
@if (Session::get('success', false))
    <?php $data = Session::get('success'); ?>
    @if (is_array($data))
        @foreach ($data as $message)
            <div class="alert alert-success">
                <i class="fa fa-circle-check"> </i>
                {{ $message }}
            </div>
        @endforeach
    @else
        <div class="alert alert-success">
            <i class="fa fa-circle-check"> </i>
            {{ $data }}
        </div>
    @endif
@endif
@if (Session::get('info', false))
    <?php $data = Session::get('info'); ?>
    @if (is_array($data))
        @foreach ($data as $message)
            <div class="alert alert-info">
                <i class="fa fa-circle-info"> </i>
                {{ $message }}
            </div>
        @endforeach
    @else
        <div class="alert alert-info">
            <i class="fa fa-circle-info"> </i>
            {{ $data }}
        </div>
    @endif
@endif

@if (Session::get('danger', false))
    <?php $data = Session::get('danger'); ?>
    @if (is_array($data))
        @foreach ($data as $message)
            <div class="alert alert-danger">
                <i class="fa fa-circle-exclamation"> </i>
                {{ $message }}
            </div>
        @endforeach
    @else
        <div class="alert alert-danger">
            <i class="fa fa-circle-exclamation"> </i>
            {{ $data }}
        </div>
    @endif
@endif
