<html>
<body>
<h1>{{count($adverts)}} new job(s) match your criterias</h1>
<hr>
<br>

<p>Hello {{$username}},</p>

<p>Here is a selection of jobs that correspond to your criterias, check them out and be the first to apply!

<p>
    <br>
<?php $ads = \App\Models\Job::whereIn('id', $adverts)->get(); ?>

@foreach ($ads as $ad)
    <p><a href="{{$ad->link()}}">{{$ad->title}}</a></p>

@endforeach

<p>All the best from the jobsite team!</p>
<br>

</body>
</html>