@extends('layouts.app')
@section('content')
    	<div class="container">
            <h2>Edit Post</h2><hr><br>
            @if (\Session::has('message'))
                <div class="alert alert-sucess">{{\Session::get('message')}}</div>
            @endif
            <div class="row">
                <div class="col-sm-12">
                    <form method="post" action="/admin/articles/{{ $article->id}}/update">
                        {{ csrf_field() }}{{ method_field('PATCH') }}
                        <div class="form-group{{ $errors->has('title') ?  ' has-error': ''}}">
                            <label>Title: </label>
                            <input class="form-control" type="text" name="title" value="{{$article->title}}"/>
                            @if ($errors->has('title'))
                                <span class="help-block"><strong>{{$errors->first('title')}}</strong></span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('body') ?  ' has-error': ''}}">
                            <label>comment </label>
                            <textarea class="form-control"  row="10" name="body" placeholder="comment here...">{{$article->body}}</textarea>
                            @if ($errors->has('body'))
                                <span class="help-block"><strong>{{$errors->first('body')}}</strong></span>
                            @endif
                        </div>
                        <input type="submit" value="Update" class="btn btn-success"/>
                    </form>
                </div>
            </div>
        </div>
@endsection('content')