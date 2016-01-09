<div class="form-group{{ $errors->has('cv') ? ' has-error' : '' }}">

{{ Form::label('cv', 'Add a new CV', array('class' => 'control-label jobs-cv-label')) }}

{{ Form::file('cv', null, array('class' => 'form-control jobs-cv', 'placeholder' => trans('copy.application.cv'))) }}

@if ($errors->has('cv'))
    <span class="help-block">{{ $errors->first('cv') }}</span>
@endif
</div>