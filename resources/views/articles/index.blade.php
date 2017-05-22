@extends('layouts.app')

@section('content')
<div class="container">
    	<h1>This are our articles</h1>
    	<ul>
    		@foreach ($articles as $article)
    			<li>
    				<a href="articles/{{$article->slug}}"><h3>{{$article->title}}</h3></a>
    			</li>
    		@endforeach
</div>
@endsection('content')