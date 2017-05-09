@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                
                @if(Auth::user()->jabatan== 'Admin')
                <div class="panel-body">

                    Halaman Admin
                    
                    
                    Hello {{auth::user()->name}}<br/>
                    Email anda : {{auth::user()->email}}<br/>
                    anda masuk menggunakan username : {{auth::user()->username}}
                </div>
                @else
                    <div class="panel-body">
                    Halaman Member
                    Hello {{auth::user()->name}}<br/>
                    Email anda : {{auth::user()->email}}<br/>
                    anda masuk menggunakan username : {{auth::user()->username}}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
