<div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">

            {{ Form::label('logo', 'Logo' , array('class' => 'control-label jobs-logo-label')) }}

            {{ Form::file('logo', null, array('class' => 'form-control jobs-logo', 'placeholder' => trans('copy.application.logo'))) }}

            @if ($errors->has('logo'))
                <span class="help-block">{{ $errors->first('logo') }}</span>
            @endif

        </div>