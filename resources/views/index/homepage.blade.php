@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-sm-8"><h1>Welcome WTF Blog</h1></div>
        <div class="col-sm-2 pull-right">
            <a href="/articles"><button class="btn btn-success">View Articles</button></a>
        </div>
        <img width="100%" src="/Oli-Blog-2.jpg"/>
    </div>
</div>
@endsection('content')