@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Data</h1>
        </div>
    </div>
    <div class="row">
        <form class="" action="{{route('tomat.update',$tomat->id)}}" method="post">
            <input name="_method" type="hidden" value="PATCH">
            {{csrf_field()}}
            <div class="form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
                <input type="file" name="images" class="form-control" placeholder="Upload Foto" value="{{$tomats->images}}">
                {!! $errors->first('images', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{$tomats->nama}}">
                {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group{{ $errors->has('family') ? ' has-error' : '' }}">
                <input type="text" name="family" class="form-control" placeholder="Family" value="{{$tomats->family}}">
                {!! $errors->first('family', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group{{ $errors->has('tanggal_tanam') ? ' has-error' : '' }}">
                <input type="text" name="tanggal_tanam" class="form-control" placeholder="Tanggal Tanam" value="{{$tomats->tanggal_tanam}}">
                {!! $errors->first('tanggal_tanam', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group{{ $errors->has('usia') ? ' has-error' : '' }}">
                <input type="text" name="usia" class="form-control" placeholder="Usia" value="{{$tomats->usia}}">
                {!! $errors->first('usia', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group{{ $errors->has('hama') ? ' has-error' : '' }}">
                <input type="text" name="hama" class="form-control" placeholder="Hama" value="{{$tomats->hama}}">
                {!! $errors->first('hama', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group{{ $errors->has('syarat_tumbuh') ? ' has-error' : '' }}">
                <input type="text" name="syarat_tumbuh" class="form-control" placeholder="Syarat Tumbuh" value="{{$tomats->syarat_tumbuh}}">
                {!! $errors->first('syarat_tumbuh', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group{{ $errors->has('pemeliharaan') ? ' has-error' : '' }}">
                <input type="text" name="pemeliharaan" class="form-control" placeholder="Pemeliharaan" value="{{$tomats->pemeliharaan}}">
                {!! $errors->first('pemeliharaan', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="save">
            </div>
        </form>
    </div>
@stop