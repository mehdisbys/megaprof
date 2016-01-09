<html>
    <body>
	<h1>New advert: {{$title}}</h1>
	<hr>
	<br>
        <p>Hello,</p>
        <p>We confirm that your job advert: <strong><a href="{{$link}}"> {{$title}}</a> </strong> has been correctly posted.</p>
        <p>You can view it <a href="{{$link}}">here</a>.</p>
	<br>
	<p>Access to your Dashboard: <a href="{{url() . ':8000/dashboard'}}" >My dashboard</a> </p>
	<br>
	<p>Thanks for posting with us !</p>
    </body>
</html>
