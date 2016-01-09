<html>
    <body>
	<h1>Application confirmation for: {{$title}}</h1>
	<hr>
	<br>
	<p>Hello {{$name}}</p>
	<p>We confirm your application for the advert <strong><a href="{{$link}}"> {{$title}}</a> </strong> has been processed correctly.</p>
	<p>The recruiter will be in touch if your profile corresponds to the vacant position.</p>
	<br>
	<p>You can view all your applications <a href="{{url() . '/my_applications'}}">here</a></p>
	<br>
	<p>Thanks for applying with us !</p>
    </body>
</html>
