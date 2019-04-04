@if(Session::has('mensaje'))
    <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        {{ Session::get('mensaje') }}
    </div>
@endif
