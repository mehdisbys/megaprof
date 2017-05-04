@extends('layouts.master')

@section('content')

    <h1 class="center">Création d'articles </h1>
    <div class="col-md-10 topmargin-lg bottommargin-lg col-md-offset-2 center" id="content">


        <form action="{{isset($article) ? "/admin/blog/edit/".$article->slug : "/admin/blog" }}" method="post">
            {{csrf_field()}}

            <div class="col-md-8 center">

                <input type="text" class ="sm-form-control" name="title" placeholder="Titre" value="{{$article->title or ''}}"></div>
            <div class="col-md-8"><input class ="sm-form-control" type="text" name="tagline" placeholder="tagline" value="{{$article->tagline or ''}}"></div>
            <div class="col-md-8"><input class ="sm-form-control" type="text" name="meta" placeholder="meta" value="{{$article->meta or ''}}"></div>
            <div class="col-md-8"><textarea class ="sm-form-control" name="content" id="" cols="30" rows="10">
                    {{$article->content or ''}}"
            </textarea>

               <input type="submit">
            </div>

        </form>

    </div>
@endsection