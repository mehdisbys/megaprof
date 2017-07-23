<form action="/search" id="search_form" class="home-search-form autocomplete-form">
    {!! csrf_field() !!}

    <div class="home-search-field-wrapper">
        <input
                id="subject_input"
                class="home-search-input autocomplete-input"
                placeholder="Que souhaitez-vous apprendre ?"
                data-minchars="1"
                data-autofirst="1"
                data-list="{!! $subsubjects !!}"
                name="subject"
                type="text"
                autocomplete="off"
                aria-autocomplete="list"/>
    </div>

    <div class="home-search-field-wrapper">
        <input id="location_input"
               class="home-search-input"
               placeholder="Ville où le cours a lieu"
               name="city" type="text"/>
    </div>

    <div class="home-search-button-wrapper">
        <button id="submit-btn" class="button" type="submit"> Chercher</button>
    </div>
    <div class="location-details no-visibility">
        {!! Form::hidden('lng',null, ['id' => 'longitude']) !!}
        {!! Form::hidden('lat', null, ['id' => 'latitude']) !!}
    </div>
</form>
