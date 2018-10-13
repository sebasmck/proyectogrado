@extends('partials.layout')

@section('title')
Infantes

@endsection

@section('content')

<div class="container-fluid">
    <div class="row align-items-center justify-content-center" style="margin-left: 12px;">
        <div class="col-md-3 col-sm-6">
            <a href="{{ route('/cuidador-dashboard','1') }}">
                <div class="card">
                    <img class="card-img-top" src="http://www.javierfenoll.com/wp-content/uploads/2013/12/ni%C3%B1o-cara-chocolate.jpg" alt="Niño" style="width:100%; height:300px;">
                    <div class="card-body">
                        <b>Nombre: </b> Alberto <br />
                        <b>Edad: </b> 4 Años
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>


@endsection