@extends('layouts.master')

@section('content')

    <div class="col-md-6 col-md-offset-3">
        @foreach ($subjects as $subject)
            <div class="toggle toggle-bg clearfix">


                <div class="togglet">
                    <i class="toggle-closed icon-ok-circle"></i>
                    <i class="toggle-open icon-remove-circle"></i>
                    {{$subject->name}}
                </div>

                <div class="togglec" style="display: none;">
                    @foreach ($subject->subSubjects as $subs)
                        <div class="ck-button">
                            <input class="no-display" type="checkbox" name="subject_{{$subs->id}}" id="{{$subs->id}}">
                            <label class="" for="{{$subs->id}}">
                                <span>{{$subs->name}}</span>
                            </label>
                        </div>
                    @endforeach
                </div>

            </div>
        @endforeach
    </div>
@endsection