@if (Session::has('ok'))
<div class="container">
    <div class="row row-ok justify-content-center">
        <div class="col-4">
            <div class="alert alert-success mt-0 alert-ok">
                {{ Session::get('ok') }}
            </div>
        </div>
    </div>
</div>
@endif
@if (Session::has('info'))
<div class="container">
    <div class="row row-info justify-content-center">
        <div class="col-4">
            <div class="alert alert-info mt-5 alert-info">
                {{ Session::get('info') }}
            </div>
        </div>
    </div>
</div>
@endif