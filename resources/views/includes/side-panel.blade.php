<form class="form-vertical" id="form-filters">
	<div class="category_panel cat-industry-faded" id="industryFilters">
		<div class="bold">Industry</div>

		@foreach ($jobsPerX['industry'] as $industry)


		<div class="checkbox">
			<label class="cfilter">
				<input  name="industry[]" type="checkbox" 
				{{in_array($industry['industry']['id'], $inputChecked['industry']) ? 'checked="checked"' : '' }} 
				value="{{$industry['industry']['id']}}" id="industry_{{$industry['industry']['id']}}"
				data-type="{{$industry['industry']['name']}}" >
				{{$industry['industry']['name']}}: ({{$industry['count'] }}) 
			</label>
		</div>
		@endforeach
	</div>

	<div class="category_panel cat-education-faded" id="educationFilters">
		<div class="bold">Education</div>
		@foreach ($jobsPerX['education'] as $education)

		<div class="checkbox">
			<label class="cfilter">
				<input  name="education[]" type="checkbox" 
				{{in_array($education['education']['id'], $inputChecked['education']) ? 'checked="checked"' : '' }} 
				value="{{$education['education']['id']}}" id="education_{{$education['education']['id']}}"
				data-type="{{$education['education']['name']}}" >
				{{$education['education']['name']}}: ({{$education['count'] }}) 
			</label>
		</div>

		@endforeach
	</div>

	<div class="category_panel cat-experience-faded" id="experienceFilters">
		<div class="bold">Experience</div>

		@foreach ($jobsPerX['experience'] as $experience)

		<div class="checkbox">
			<label class="cfilter">
				<input  name="experience[]" type="checkbox" 
				{{in_array($experience['experience']['id'], $inputChecked['experience']) ? 'checked="checked"' : '' }} 
				value="{{$experience['experience']['id']}}" id="experience_{{$experience['experience']['id']}}"
				data-type="{{$experience['experience']['name']}}" >
				{{$experience['experience']['name']}}: ({{$experience['count'] }}) 
			</label>
		</div>

		@endforeach
	</div>
</form>
