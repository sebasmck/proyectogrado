@extends('partials.layout')

@section('title')
Pretest 10
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form" method="POST" action="{{route('/posttestprueba12')}}">
        {{csrf_field()}}
            <div class="card">

                <div class="card-head style-primary">
                    <header>Post Test</header>
                </div>

                <div class="card-body floating-label">
                    <p><b>14. De las siguientes opciones ¿cuál crees que es la definición correcta de crianza?
                        </b></p>
                    <br>

                    <div class="col-sm-9">
                            <div class="radio radio-styled">
                                <label>
                                    <input type="radio" name="optionsRadios" value="1" required>
                                    <span>a. Son las técnicas y creencias que un padre/madre opta para formar a su hijo. </span>
                                </label>
                            </div>
                            <div class="radio radio-styled">
                                <label>
                                    <input type="radio" name="optionsRadios" value="2">
                                    <span>b. Son las creencias, conocimiento y actitudes de un padre/madre hacia la formación de su hijo</span>
                                </label>
                            </div>
                            <div class="radio radio-styled">
                                <label>
                                    <input type="radio" name="optionsRadios" value="3">
                                    <span>
                                            c. Es la forma de castigo que opta un padre para corregir y formar a su hijo.
                                        </span>
                                </label>
                            </div>

                            <div class="radio radio-styled">
                                    <label>
                                        <input type="radio" name="optionsRadios" value="4">
                                        <span>
                                                d. Son los valores que un padre/madre transmite a su hijo para guiarlo de forma adecuada.
adecuada.
                                            </span>
                                    </label>
                                </div>
                            
                    </div>

                   

                    <br><br>
                </div> {{-- card-body no padding --}}


                    
            </div><!--end .card-body -->

            <div class="card-actionbar">
                    <div class="card-actionbar-row">
                    <a style="btn btn-flat btn-primary ink-reaction" > <button type="submit" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                    </div>
              </div>

        </div><!--end .card -->
            
        </form>
    </div>

@endsection

@section('addjs')

<script>

    preventDoubleSubmit();

</script>

@endsection