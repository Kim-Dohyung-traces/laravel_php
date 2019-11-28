@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            you are logged in!
                        </div>
                    @endif

                    {{auth()->user()->name}} 님 꽉 환영해!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection