@extends('master')
@section('content')
    <h2>Add new post</h2>
    <form class="" action="/blog" method="post" enctype="multipart/form-data">
        <input type="text" name="title" value="" placeholder="this is title"><br>
        {{ ($errors->has('title')) ? $errors->first('title') : '' }} <br>
        <textarea name="description" rows="8" cols="100" placeholder="this is description"></textarea><br>
        {{ ($errors->has('description')) ? $errors->first('description') : '' }} <br>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <img src="http://placehold.it/100x100" id="showimages" style="max-width:200px;max-height:200px;float:left;"/>
        <div class="row">
            <div class="col-md-12">
                <input type="file" id="inputimages" name="images">
            </div>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary pull-right" value="post">
                Submit
            </button>
        </div>
    </form>
@stop