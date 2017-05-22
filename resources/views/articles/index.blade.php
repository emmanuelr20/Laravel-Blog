@extends('layouts.app')

@section('content')
<div class="container">
    	<div class="col-sm-12"><h1><b>These are our articles</b></h1></div>

        @foreach ($articles as $article)
        <div class="col-sm-12">
            <div class="well">
                <a href="articles/{{$article->slug}}"><h3>{{$article->title}}</h3></a>
                <textarea class="form-control" disabled>{{$article->body}}</textarea>
                <br>
            </div>
        </div>
        @endforeach
</div>
@endsection('content')