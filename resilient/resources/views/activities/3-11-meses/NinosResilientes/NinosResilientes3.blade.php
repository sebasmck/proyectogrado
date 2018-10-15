@extends('partials.layout')

@section('title')
Niños Resilientes 3
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
        <form class="form">
            <div class="card">

                <div class="card-head style-primary">
                   <header> Niños Resilientes - Reflexionando ando  </header>
                </div>

                <div class="card-body floating-label">

                  <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                    <p style="text-align:left; text-justify: inter-word;">
                         <b>Instrucción:</b> Selecciona la respuesta que consideras correcta</p>
                  </div> 

                  <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                    <p style="text-align:justify; text-justify: inter-word;">
                        <b>1.</b> ¿Crees que tu hijo es un niño resiliente?  </p>
                      <div class="row">
                            <div class="col-sm-2">
                                    <div class="radio radio-styled">
                                        <label>
                                            <input type="radio" name="optionsRadios1" value="1" required >
                                            <span> De Acuerdo</span>
                                        </label>
                                    </div>
                            </div>  
                            <div class="col-sm-2">
                                    <div class="radio radio-styled">
                                        <label>
                                            <input type="radio" name="optionsRadios1" value="1"  >
                                            <span> En Desacuerdo</span>
                                        </label>
                                    </div>
                            </div>           
                      </div>  

                   </div>

                   <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                        <p style="text-align:justify; text-justify: inter-word;">
                            <b>2.</b> ¿Cómo padre estoy aportando a mi hijo en el desarrollo de la resiliencia? </p>
                            <div class="row">
                                    <div class="col-sm-2">
                                            <div class="radio radio-styled">
                                                <label>
                                                    <input type="radio" name="optionsRadios2" value="1" required >
                                                    <span> De Acuerdo</span>
                                                </label>
                                            </div>
                                    </div>  
                                    <div class="col-sm-2">
                                            <div class="radio radio-styled">
                                                <label>
                                                    <input type="radio" name="optionsRadios2" value="1"  >
                                                    <span> En Desacuerdo</span>
                                                </label>
                                            </div>
                                    </div>           
                              </div>  


                       </div>

                       <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                            <p style="text-align:justify; text-justify: inter-word;">
                                <b>3.</b> ¿Puedes hacer que tu hijo desarrolle estas características del niño resiliente 
                                o mejore las que ya posee? </p>
                                <div class="row">
                                        <div class="col-sm-2">
                                                <div class="radio radio-styled">
                                                    <label>
                                                        <input type="radio" name="optionsRadios3" value="1" required >
                                                        <span> De Acuerdo</span>
                                                    </label>
                                                </div>
                                        </div>  
                                        <div class="col-sm-2">
                                                <div class="radio radio-styled">
                                                    <label>
                                                        <input type="radio" name="optionsRadios3" value="1"  >
                                                        <span> En Desacuerdo</span>
                                                    </label>
                                                </div>
                                        </div>           
                                  </div>  
                           </div>
                           
                           <div  style="font-family: 'Raleway', sans-serif; font-size: 14px;color:black;">
                                <p style="text-align:justify; text-justify: inter-word;">
                                    <b>4.</b> ¿En el contexto en el cual se está desarrollando tu hijo
                                     existen personas con características resilientes? </p>
                                     <div class="row">
                                            <div class="col-sm-2">
                                                    <div class="radio radio-styled">
                                                        <label>
                                                            <input type="radio" name="optionsRadios4" value="1" required >
                                                            <span> De Acuerdo</span>
                                                        </label>
                                                    </div>
                                            </div>  
                                            <div class="col-sm-2">
                                                    <div class="radio radio-styled">
                                                        <label>
                                                            <input type="radio" name="optionsRadios4" value="1" >
                                                            <span> En Desacuerdo</span>
                                                        </label>
                                                    </div>
                                            </div>           
                                      </div>  
                               </div>

                   


                </div> {{-- card-body no padding --}}
            </div><!--end .card-body -->

            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" href="{{route('/NinosResilientes4')}}"> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button></a>
                  </div>
            </div>

        </div><!--end .card -->
            
        </form>
    </div>

@endsection
{{--  @section('addjs')
<script>
        var tl = new TimelineLite();
        avatar = $('.avatar');
        //  content = $('.content-card');
        // tl.to(title, 1.5, {y:10});
        // tl.from(card1, .3, {left:100, opacity:0});  
</script>
@endsection  --}}