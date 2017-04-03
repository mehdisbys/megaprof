@if(\Illuminate\Support\Facades\Request::is('*nouvelle-annonce*'))

    <style>
        .bs-wizard {
            margin-top: -40px;
        }

        /*Form Wizard*/
        .bs-wizard {
            border-bottom: solid 1px #e0e0e0;
            padding: 0 0 0px 0;
        }

        .bs-wizard > .bs-wizard-step {
            padding: 0;
            position: relative;
            margin-left: -1px;
        }

        .bs-wizard > .bs-wizard-step + .bs-wizard-step {
        }

        .bs-wizard > .bs-wizard-step .bs-wizard-stepnum {
            color: #595959;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .bs-wizard > .bs-wizard-step .bs-wizard-info {
            color: #999;
            font-size: 14px;
        }

        .bs-wizard > .bs-wizard-step > .bs-wizard-dot {
            position: absolute;
            width: 30px;
            height: 30px;
            display: block;
            background: #f57009;
            top: 45px;
            left: 50%;
            margin-top: -15px;
            margin-left: -15px;
            border-radius: 50%;
        }

        .bs-wizard > .bs-wizard-step > .bs-wizard-dot:after {
            content: ' ';
            width: 14px;
            height: 14px;
            background: #f7900a;
            border-radius: 50px;
            position: absolute;
            top: 8px;
            left: 8px;
        }

        .bs-wizard > .bs-wizard-step > .progress {
            position: relative;
            border-radius: 0px;
            height: 8px;
            box-shadow: none;
            margin: 20px 0;
        }

        .bs-wizard > .bs-wizard-step > .progress > .progress-bar {
            width: 0px;
            box-shadow: none;
            background: #f7900a;
            opacity: 0.6
        }

        .bs-wizard > .bs-wizard-step.complete > .progress > .progress-bar {
            width: 100%;
        }

        .bs-wizard > .bs-wizard-step.active > .progress > .progress-bar {
            width: 50%;
        }

        .bs-wizard > .bs-wizard-step:first-child.active > .progress > .progress-bar {
            width: 0%;
        }

        .bs-wizard > .bs-wizard-step:last-child.active > .progress > .progress-bar {
            width: 100%;
        }

        .bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot {
            background-color: #f5f5f5;
        }

        .bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot:after {
            opacity: 0;
        }

        .bs-wizard > .bs-wizard-step:first-child > .progress {
            left: 50%;
            width: 50%;
        }

        .bs-wizard > .bs-wizard-step:last-child > .progress {
            width: 50%;
        }

        .bs-wizard > .bs-wizard-step.disabled a.bs-wizard-dot {
            pointer-events: none;
        }

        /*END Form Wizard*/
    </style>


    <div class="bottommargin-sm">

        <?php $advert = \App\Models\Advert::find(session('advert_id')); ?>

        <div class="row bs-wizard" style="border-bottom:0;">

            <div class="col-xs-3 col-md-2 bs-wizard-step {{$step1 or 'active'}}">
                @if(isset($advert) and $advert->step1Done())
                    <div class="text-center bs-wizard-stepnum"><a href="/nouvelle-annonce-1"><span><i
                                        class="icon icon-checkmark"></i></span> Activités</a></div>
                @else
                    <div class="text-center bs-wizard-stepnum">Activités</div>
                @endif

                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <div class="bs-wizard-dot"></div>
                <div class="bs-wizard-info text-center"></div>
            </div>

            <div class="col-xs-3 col-md-2 bs-wizard-step {{$step2 or 'disabled'}}">

                @if(isset($advert) and $advert->step2Done())
                    <div class="text-center bs-wizard-stepnum"><a href='/nouvelle-annonce-2'>
                            <span><i class="icon icon-checkmark"></i></span> Titre</a></div>
                @else
                    <div class="text-center bs-wizard-stepnum">Titre</div>
                @endif

                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <div class="bs-wizard-dot"></div>
                <div class="bs-wizard-info text-center"></div>
            </div>

            <div class="col-xs-3 col-md-2 bs-wizard-step {{$step3 or 'disabled'}}">

                @if(isset($advert) and $advert->step3Done())
                    <div class="text-center bs-wizard-stepnum"><a href='/nouvelle-annonce-3'><span><i class="icon icon-checkmark"></i></span> Lieu</a></div>
                @else
                    <div class="text-center bs-wizard-stepnum">Lieu</div>
                @endif

                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <div class="bs-wizard-dot"></div>
                <div class="bs-wizard-info text-center"></div>
            </div>

            <div class="col-xs-3 col-md-2 bs-wizard-step {{$step4 or 'disabled'}}">

                @if(isset($advert) and $advert->step4Done())
                    <div class="text-center bs-wizard-stepnum"><a href="/nouvelle-annonce-4"><span><i class="icon icon-checkmark"></i></span> Description</a></div>
                @else
                    <div class="text-center bs-wizard-stepnum">Description</div>
                @endif

                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <div class="bs-wizard-dot"></div>
                <div class="bs-wizard-info text-center"></div>
            </div>

            <div class="col-xs-3 col-md-2 bs-wizard-step {{$step5 or 'disabled'}}">

                @if(isset($advert) and $advert->step5Done())
                    <div class="text-center bs-wizard-stepnum"><a href="/nouvelle-annonce-5"><span><i class="icon icon-checkmark"></i></span> Prix</a></div>
                @else
                    <div class="text-center bs-wizard-stepnum">Prix</div>
                @endif

                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <div class="bs-wizard-dot"></div>
                <div class="bs-wizard-info text-center"></div>
            </div>

            <div class="col-xs-3 col-md-2 bs-wizard-step {{$step6 or 'disabled'}}">

                @if(isset($advert) and $advert->step6Done())
                    <div class="text-center bs-wizard-stepnum"><a href="/nouvelle-annonce-6"><span><i class="icon icon-checkmark"></i></span> Photo</a></div>
                @else
                    <div class="text-center bs-wizard-stepnum">Photo</div>
                @endif

                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <div class="bs-wizard-dot"></div>
                <div class="bs-wizard-info text-center"></div>
            </div>

        </div>
    </div>
@endif
