@extends('layouts.app')
@section('content')
    	<div class="container">
            <h1>Blog</h1><br><hr><br>
            @if (\Session::has('message'))
                <div class="alert alert-sucess">{{\Session::get('message')}}</div>
            @endif
            <div class="row">
                <div class="col-sm-12">
                    <h1><b>{{$article->title}}</b></h1>
                    <div class="col-sm-12">
                        <div class="row well">
                            <div class="row-fluid">
                                <div class="span12">
                                    <span class=" text-span hideOverflow">
                                        <p style="word-break: break-all">{{$article->body}}</p>
                                    </sapn>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h5> Add a comment</h5>
                        <form method="post" action="/articles/{{ $article->id}}/comment">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ?  ' has-error': ''}}">
                                <label>Name: </label>
                                <input class="form-control" type="text" name="name"/>
                                @if ($errors->has('name'))
                                    <span class="help-block"><strong>{{$errors->first('name')}}</strong></span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('comment') ?  ' has-error': ''}}">
                                <label>comment </label>
                                <textarea class="form-control"  row=4 name="comment" placeholder="comment here..."></textarea>
                                @if ($errors->has('comment'))
                                    <span class="help-block"><strong>{{$errors->first('comment')}}</strong></span>
                                @endif
                            </div>
                            <input type="submit" value="comment" class="btn btn-primary"/>
                        </form>
                        <br>
                        <div class="col-sm-8 pull-right">
                            @if ($comments != [])
                                @foreach ($comments as $comment)
                                    <div class="well well-default">
                                        <p><b>{{$comment->name}}</b></p>
                                        <span class=" text-span hideOverflow">
                                            <p style="word-break: break-all">
                                                {{$comment->comment}}
                                            </p>
                                        </span>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection('content')