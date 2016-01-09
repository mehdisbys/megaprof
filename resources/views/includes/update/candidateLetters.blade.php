@if(Auth::user()->hasRole('candidate') or Auth::user()->hasRole('admin'))
@section('custom_js_before')
    {{ HTML::script('js/ckeditor/ckeditor.js',['async' => 'async']) }}
@stop

<div class="col-md-4">
    <h2 class="col-md-12">Your Letter(s)</h2>
    <hr class="col-md-8 col-md-offset-2">

    @if($user->letters and !$user->letters->isEmpty())

        <ul>
            @foreach($user->letters as $letter)

                @include('includes.popups.editModal',
                ['title' => 'Edit Cover Letter',
                'message' => $letter->letter,
                'varname' => 'letter',
                'action'  => 'Edit',
                'route'   => $letter->editUrl(),
                'id' => "letterEdit{$letter->id}"])

                <li>
                    <div class="col-md-12 margin-top-sm">
                        <div class="col-md-8">
                            <a id={{"letterEdit{$letter->id}"}}
                                    data-link={{"/letter/edit/{$letter->id}"}}
                                    href="#"
                               class="confirm" data-toggle="modal" data-target={{"#letterEdit{$letter->id}"}}>
                                {{$letter->name}}
                            </a>
                        </div>

                        <a href="{{"/letter/delete/{$letter->id}" }}"
                           class="btn btn-sm btn-danger delete_cv pull-right">
                            <i class="glyphicon glyphicon-trash"></i>
                        </a>
                    </div>
                </li>

            @endforeach
        </ul>

    @else

        <div class="col-md-12 alert alert-danger">{{trans('copy.errors.noLetters')}}</div>

    @endif
</div>


@section('custom_js_after')
    {{ HTML::script('js/confirmModal.js',['async' => 'async'])}}
@endsection
@endif