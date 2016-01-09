@if($user->company and $user->company->exists())
    <div class="center-table col-md-4">
        @include('includes.inputErrors')
        {{ BootForm::open()->action('/profile/company/update')->class('col-md-12')->multipart() }}
        {{ BootForm::bind($user->company) }}
        {{ BootForm::text('Company Name', 'name') }}
        {{ BootForm::select('Are you a recruitment agency ?', 'type')->options(['company' => 'No', 'agency' => 'Yes'])->select('no') }}
        {{ BootForm::textarea('Company Description', 'description') }}
        {{ BootForm::text('Location', 'location') }}
        {{ BootForm::text('Website', 'website') }}

        @include('includes.logoInput')

        {{ BootForm::submit('Update')->class('btn btn-success jobs-submit') }}
        {{ BootForm::close() }}

    </div>
    <div class="center-table col-md-4">
        <h2 class="col-md-12">Your current logo</h2>
        @if($user->company->hasLogo() == false)
            <div class="col-md-12 alert alert-info">
                <span class="glyphicon glyphicon-info-sign"></span>
                You have not uploaded a logo yet. This default logo will be displayed on your adverts.
            </div>
        @endif
        <div class="col-md-2"></div>
        <div class="col-md-8 margin-top-lg "><img src="{{$user->company->logoUrl()}}" heigth='120' width='120'></div>
    </div>

    <div class="col-md-4">
        <h2 class="col-md-12">Preferences</h2>
        <div class="col-md-12 margin-top-lg">
            <a href="/templates/list" title="Easy and quick candidates emailing"><span class="glyphicon-th-list glyphicon"></span> Manage Email templates</a>
        </div>

    </div>
@endif
