
@if (isset($errors) and count($errors) > 0)
    <div class="alert toastr-info alert-danger col-md-12">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Désolé, il manque quelques informations : <br>
        <ul class="col-md-8 col-md-offse">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif