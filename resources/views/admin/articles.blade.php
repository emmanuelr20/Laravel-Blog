@extends('layouts.app')
@section('content')
        <div class="container">
            <br>
            <h1>Articles</h1>
            <br>
            <form method="post" action="/admin/articles/new">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('title') ?  ' has-error': ''}}">
                    <label for="title">Article title</label>
                    <input name="title" class="form-control" type="text" required/>
                    @if ($errors->has('title'))
                        <span class="help-block"><strong>{{$errors->first('title')}}</strong></span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('body') ?  ' has-error': ''}}">
                    <label for="body">Article Content</label>
                    <textarea name="body" class="form-control" row="3"></textarea>
                    @if ($errors->has('body'))
                        <span class="help-block"><strong>{{$errors->first('body')}}</strong></span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('name') ?  ' has-error': ''}}">
                    <input type="submit" class="btn btn-primary" value="Post Article"/>
                </div>
            </form>

            @foreach ($articles as $article)
                <div class="well">
                    <div class="col-sm-12"><a href="/admin/articles/{{$article->id}}"><h4><b>{{$article->title}}<b></h4></a></div>
                    <br>
                    <textarea class="form-control" disabled>{{$article->body}}</textarea>
                    <br>
                    <div  class="row pull-right">
                        <div class="col-sm-6"><a href="/admin/articles/{{$article->id}}/edit">
                            <button class="btn btn-primary">Edit</button>
                        </a></div>
                        <div class="col-sm-6"><form method="post" action="/admin/articles/{{$article->id}}/delete">
                            {{ csrf_field() }} {{ method_field('DELETE') }}
                            <input type="submit" class="btn btn-danger" value="Delete"/>
                        </form></div>
                    </div>
                    <br><br>
                </div>
            @endforeach
        </div>
@endsection('content')