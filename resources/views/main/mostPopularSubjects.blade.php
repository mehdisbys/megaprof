<!-- start of components  -->
<div class="scrolling-pane topmargin-lg">
    <h2>Les matières les plus populaires</h2>
    <div class="row">
        <ul id="pane-a">
            @foreach($popularSubjects->take(6) as $subject)
                <li class="scroll-items col-md-2" id="subject-{{$subject['parent_id']}}">
                    <div class="fa {{$subject['class']}} fa-3x"></div>
                    <a href="/annonces/{{$subject['name']}}">{{ str_limit($subject['name'],22) }} - {{$subject['count']}}
                        annonces </a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="row">
        <ul id="pane-b">
            @foreach($popularSubjects->take(-6) as $subject)
                <li class="scroll-items col-md-2" id="subject-{{$subject['parent_id']}}">
                    <div class="fa {{$subject['class']}} fa-3x "></div>
                    <a href="/annonces/{{$subject['name']}}">{{ str_limit($subject['name'],22) }} - {{$subject['count']}}
                        annonces </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<!-- end of components  -->