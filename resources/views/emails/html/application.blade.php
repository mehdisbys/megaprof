<html>
    <body>
	<h1>New application for: {{$title}}</h1>
	<hr>
	<br>
        <p>Hello, </p>
	<p>You have received a new job application through the website for <strong><a href="{{$link}}"> {{$title}}</a> </strong></p>
	<h2><u>Applicant details</u></h2>
        <p>Name:   <strong>{{ $name }}</strong></p>
        <p>Email:  <strong>{{ $email }}</strong></p>
        <p>Covering letter:</p>
	<p>{{ nl2br($letter) }}</p>
	<br>
	<p>You will find the applicant's CV attached with this email.</p>
	
	<p><a href="{{$link . '/applications'}}">Manage your job applications</a></p>
	<p>Access to your Dashboard: <a href="{{url() . '/dashboard'}}" >My dashboard</a> </p>
    </body>
</html>
