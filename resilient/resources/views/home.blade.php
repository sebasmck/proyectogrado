@extends('partials.layout')

@section('title')
    Home
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div style="margin-top: 100px;" class="card">
                <div class="card-header">Dashboard</div>

                <div  class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    Bienvenido
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
