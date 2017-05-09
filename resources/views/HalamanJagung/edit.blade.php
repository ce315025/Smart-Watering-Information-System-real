@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Data</h1>
        </div>
    </div>
    <div class="row">
        <form class="" action="{{route('jagung.update',$jagungs->id)}}" method="post">
            <input name="_method" type="hidden" value="PATCH">
            {{csrf_field()}}

            <img src="http://placehold.it/100x100" id="showimages" style="max-width:200px;max-height:200px;float:left;"/>
            <div class="row">
                <div class="col-md-12">
                    <input type="file" id="inputimages" name="images">
                </div>
            </div>

            <div class="form-group{{ ($errors->has('nama')) ? $errors->first('nama') : '' }}">
                <input type="text" name="nama" class="form-control" placeholder="Enter Title Here" value="{{$jagungs->nama}}">
                {!! $errors->first('nama','<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group{{ ($errors->has('family')) ? $errors->first('family') : '' }}">
                <input type="text" name="family" class="form-control" placeholder="Enter Title Here" value="{{$jagungs->family}}">
                {!! $errors->first('family','<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group{{ ($errors->has('tanggal_tanam')) ? $errors->first('tanggal_tanam') : '' }}">
                <input type="date" name="tanggal_tanam" class="form-control" placeholder="Enter Title Here" value="{{$jagungs->tanggal_tanam}}">
                {!! $errors->first('tanggal_tanam','<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group{{ ($errors->has('usia')) ? $errors->first('usia') : '' }}">
                <input type="text" name="usia" class="form-control" placeholder="Enter Title Here" value="{{$jagungs->usia}}">
                {!! $errors->first('usia','<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group{{ ($errors->has('hama')) ? $errors->first('hama') : '' }}">
                <input type="text" name="hama" class="form-control" placeholder="Enter Title Here" value="{{$jagungs->hama}}">
                {!! $errors->first('hama','<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group{{ ($errors->has('syarat_tumbuh')) ? $errors->first('syarat_tumbuh') : '' }}">
                <input type="text" name="syarat_tumbuh" class="form-control" placeholder="Enter Title Here" value="{{$jagungs->syarat_tumbuh}}">
                {!! $errors->first('syarat_tumbuh','<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group{{ ($errors->has('pemeliharaan')) ? $errors->first('pemeliharaan') : '' }}">
                <input type="text" name="pemeliharaan" class="form-control" placeholder="Enter Title Here" value="{{$jagungs->pemeliharaan}}">
                {!! $errors->first('pemeliharaan','<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="save">
            </div>
        </form>
    </div>
@stop