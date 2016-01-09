@if($user->profile and $user->profile->exists())
    <div class="col-md-4">
        <h2 class="col-md-12">Your Details</h2>
        <hr class="col-md-8 col-md-offset-1">

        {{ BootForm::open()->action('/profile/candidate/update')->class('center-table col-md-12') }}

        @include('includes.inputErrors')

        {{ BootForm::bind($user->profile) }}
        {{ BootForm::text('Username', 'username')->value($user->username)->readonly()
        ->title('Go to your settings to change your username')}}
        {{ BootForm::text('Email', 'email')->value($user->email)->readonly()
        ->title('Go to your settings to change your email') }}
        {{ BootForm::text('First name', 'firstname') }}
        {{ BootForm::text('Surname', 'surname') }}

        {{ BootForm::select('Industry', 'industry')
        ->options([''=> 'Please Select'] + Industry::lists('name', 'id')->all())
        ->multiple()
        ->select($user->profile->industry) }}

        {{ BootForm::select('Experience', 'experience')
        ->options(['' => 'Please Select'] + Experience::lists('name', 'id')->all())
        ->multiple()
        ->select($user->profile->experience)}}

        {{ BootForm::select('Education', 'education')
        ->options(['' => 'Please Select'] + Education::lists('name', 'id')->all())
        ->multiple()
        ->select($user->profile->education)}}


        {{ BootForm::text('Skills', 'skills')->readonly() }}
        {{ BootForm::text('Job title', 'jobtitle') }}
        {{ BootForm::text('Desired salary', 'salary') }}

        <div class="form-group{{ $errors->has('searchable_cv') ? ' has-error' : '' }}">
            <input type="checkbox" class="" id="searchable_cv" name="searchable_cv" value="1" checked="{{$user->profile->searchable_cv}}">
            <label for="searchable_cv" class="control-label">Enable employers to find me</label>
        </div>

        <div class="form-group{{ $errors->has('turn_off_email_alerts') ? ' has-error' : '' }}">
            <input type="checkbox" class="" id="turn_off_email_alerts" name="turn_off_email_alerts" value="1"
                   @if ($user->profile->turn_off_email_alerts == 1)
                   checked="1"
                    @endif
                    >
            <label for="turn_off_email_alerts" class="control-label">Turn Off Email alerts</label>
        </div>

        {{ BootForm::submit('Update')->class('btn btn-success jobs-submit') }}
        {{ BootForm::close() }}
    </div>
@endif