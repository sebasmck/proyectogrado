@extends('partials.layout')

@section('title')
SEGUIR Y SEGUIR INTENTANDO
@endsection

@section('addcss')
<style type="text/css">
    .tg {
        border-collapse: collapse;
        border-spacing: 0;
    }

    .tg td {
        font-family: Arial, sans-serif;
        font-size: 14px;
        padding: 10px 17px;
        border-style: solid;
        border-width: 1px;
        overflow: hidden;
        word-break: normal;
        border-color: black;
    }

    .tg th {
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-weight: normal;
        padding: 10px 17px;
        border-style: solid;
        border-width: 1px;
        overflow: hidden;
        word-break: normal;
        border-color: black;
    }

    .tg .tg-s6z2 {
        text-align: center
    }

    table {
        display: block;
        margin-left: 12%;
        margin-right: auto;
        margin-top: 25px;
        width: 50%;
    }

    input {
        width: 100px;
    }
</style>
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
    <form class="form">
        <div class="card">

            <div class="card-head style-primary">
                <header> CUALIDADES NIÑOS RESILIENTES </header>
            </div>

            <div class="card-body floating-label">

                <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 18px;color:black;">
                    <label>
                        <p style="text-align:justify; text-justify: inter-word;"> <b> Da clic de manera organizada
                                (de 1 a 4) según las sensaciones que experimentaste cuando realizaste los cuatro
                                ejercicios anteriores.
                            </b> </p>
                    </label>
                </div>

                <div class="col-md-12">
                    <table class="tg">
                        <tr>
                            <th class="tg-s6z2">Alegría</th>
                            <th class="tg-s6z2">Miedo</th>
                            <th class="tg-s6z2">Rabia</th>
                            <th class="tg-s6z2">Tristeza</th>
                        </tr>
                        <tr>
                            <td class="tg-s6z2"><input type="text"></td>
                            <td class="tg-s6z2"><input type="text"></td>
                            <td class="tg-s6z2"><input type="text"></td>
                            <td class="tg-s6z2"><input type="text"></td>
                        </tr>
                    </table>
                    <br>
                    <p>A continuación, encontraras una serie de colores, números o letras que puedes utilizar para
                        jugar en casa con tu niño o niña.
                    </p>
                </div>
            </div>
            <!--end .card -->

            <div class="card-actionbar">
                <div class="card-actionbar-row">
                    <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/ssi3')}}"> <button type="button"
                            class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                </div>
            </div>

    </form>
</div>

@endsection
{{-- @section('addjs')
<script>
    var tl = new TimelineLite();
    avatar = $('.avatar');
        //  content = $('.content-card');
        // tl.to(title, 1.5, {y:10});
        // tl.from(card1, .3, {left:100, opacity:0});  
</script>
@endsection --}}