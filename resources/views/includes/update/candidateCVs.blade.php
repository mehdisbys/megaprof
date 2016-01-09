@if(Auth::user()->hasRole('candidate') or Auth::user()->hasRole('admin'))
    <div class="col-md-4">
        <h2 class="col-md-12">Your CV(s)</h2>
        <hr class="col-md-8 col-md-offset-2">

        @if($user->cvs and !$user->cvs->isEmpty())

            @include('includes.update.uploadCv', ['action' => '/profile/cv/add'])


            <hr class="col-md-12">

            <ul>
                @foreach($user->cvs as $cv)

                    <li>
                        <div class="col-md-12 margin-top-sm">
                            <div class="col-md-8"><a href="{{$cv->see()}}">{{$cv->cv_name}}</a></div>

                            <a href="{{"/cv/star/{$cv->id}" }}"
                               class="btn btn-sm btn-success star_cv">
                                <i class="glyphicon glyphicon-star"></i>
                            </a>

                            <a href="{{"/cv/delete/{$cv->id}" }}"
                               class="btn btn-sm btn-danger delete_cv pull-right">
                                <i class="glyphicon glyphicon-trash"></i>
                            </a>
                        </div>
                    </li>

                @endforeach
            </ul>

        @else

            @include('includes.update.uploadCv', ['action' => '/profile/cv/add'])

            <hr class="col-md-12">

            <div class="col-md-12 alert alert-danger">{{trans('copy.errors.noCv')}}</div>

        @endif
    </div>
@endif