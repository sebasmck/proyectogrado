@extends('partials.layout')

@section('title')
Escala
@endsection

@section('content')

<div class="col-lg-offset-2 col-md-8">
<form class="form" method="POST" action="{{route('/escalaWY-cuestionario-calculate')}}">
{{csrf_field()}}

<div class="card">
                <div class="card-head style-primary">
                    <header>Escala de WALDING Y YOUNG</header>
                </div>
 <div class="card-body floating-label">
  <div class="row">
                            <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group"> 
                                        <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 40px;" >
                                            <label> 
                                            Instrucciones:</label></div>
                                        </div>
                                    </div>
                                </div>
                                

                           <div class="row">
                                   <div class="col-sm-12">
                                        <div class="form-group">
                                        <div class="title" style="font-family: 'Raleway', sans-serif; font-size: 20px;color:gray;" >
                                            <label> A continuación le presentamos una serie de afirmaciones referidas a diferentes
                                             aspectos de su vida, donde tendrá que leer cada una de ellas y marcar con un aspa que
                                             tan acuerdo o en desacuerdo esta con ellas. Recuerde que no hay respuestas correctas
                                             e incorrectas.</label>
                                             </div>
                                        </div>
                                    </div>                       
                            </div>
            <hr>


<table class="table table-striped">
<thead>
    <tr>
      <th scope="col"><b>Pregunta</b></th>
      <th scope="col"><b>1</b></th>
      <th scope="col"><b>2</b></th>
      <th scope="col"><b>3</b></th>
      <th scope="col"><b>4</b></th>
      <th scope="col"><b>5</b></th>
      <th scope="col"><b>6</b></th>
      <th scope="col"><b>7</b></th>
    </tr>
  </thead>


 <tbody>
    <tr>

      <th scope="row">
       <label style="font-family: 'Raleway', sans-serif; font-size: 15px;color:black;">1. Cuando planeo algo lo realizo</label>
       
      </th>
      <td>
      <label class="radio-inline radio-styled">
                                            <input type="radio" name="inlineRadioOptions" value="1" required="true"><span></span>
                                        </label>
      </td>
      <td>
      <label class="radio-inline radio-styled">
                                            <input type="radio" name="inlineRadioOptions" value="2"><span></span>
                                        </label>
      </td>
      <td>
      <label class="radio-inline radio-styled">
                                            <input type="radio" name="inlineRadioOptions" value="3"><span></span>
                                        </label>
      </td>
        
      <td>
      <label class="radio-inline radio-styled">
                                            <input type="radio" name="inlineRadioOptions" value="4"><span></span>
                                        </label>
      </td>
      <td>
      <label class="radio-inline radio-styled">
                                            <input type="radio" name="inlineRadioOptions" value="5"><span></span>
                                        </label>
      </td>

<td>
<label class="radio-inline radio-styled">
                                            <input type="radio" name="inlineRadioOptions" value="6"><span></span>
                                        </label>
                                        </td>
<td>
<label class="radio-inline radio-styled">
                                            <input type="radio" name="inlineRadioOptions" value="7"><span></span>
                                            </label>
                                        </td>


    </tr>
    <tr>
    <td><label style="font-family: 'Raleway', sans-serif; font-size: 15px;color:black;">2. Frente a un problema generalmente me las arreglo
de una manera u otra</label></td>

<td><label class="radio-inline radio-styled">
                                         <input type="radio" name="inlineRadioOptions2" value="1" required="true"><span></span>
                                     </label></td>
<td><label class="radio-inline radio-styled">
                                         <input type="radio" name="inlineRadioOptions2" value="2"><span></span>
                                     </label></td>  
  
  <td><label class="radio-inline radio-styled">
                                         <input type="radio" name="inlineRadioOptions2" value="3"><span></span>
                                     </label></td>
  <td><label class="radio-inline radio-styled">
                                         <input type="radio" name="inlineRadioOptions2" value="4"><span></span>
                                     </label></td>
  
  <td>
                                     <label class="radio-inline radio-styled">
                                         <input type="radio" name="inlineRadioOptions2" value="5"><span></span>
                                     </label>
                                     </td>
                                     <td>
                                     <label class="radio-inline radio-styled">
                                         <input type="radio" name="inlineRadioOptions2" value="6"><span></span>
                                     </label>
                                     </td>
                                     <td>
                                     <label class="radio-inline radio-styled">
                                         <input type="radio" name="inlineRadioOptions2" value="7"><span></span>
                                     </label>
                                     </td>
    </tr>


<tr>


<td>
<label style="font-family: 'Raleway', sans-serif; font-size: 15px;color:black;">3. Dependo mas de mi misma que de otras personas</label>
</td>
<td>
                                     <label class="radio-inline radio-styled">
                                         <input type="radio" name="inlineRadioOptions3" value="1" required="true"><span></span>
                                     </label>
                                     </td>
                                     <td>
                                     <label class="radio-inline radio-styled">
                                         <input type="radio" name="inlineRadioOptions3" value="2"><span></span>
                                     </label>
                                     </td>
                                     <td>
                                     <label class="radio-inline radio-styled">
                                         <input type="radio" name="inlineRadioOptions3" value="3"><span></span>
                                     </label>
                                     </td>
                                     <td>
                                     <label class="radio-inline radio-styled">
                                         <input type="radio" name="inlineRadioOptions3" value="4"><span></span>
                                     </label>
                                     </td>
                                     <td>
                                     <label class="radio-inline radio-styled">
                                         <input type="radio" name="inlineRadioOptions3" value="5"><span></span>
                                     </label>
                                     </td>
                                     <td>
                                     <label class="radio-inline radio-styled">
                                         <input type="radio" name="inlineRadioOptions3" value="6"><span></span>
                                     </label>
                                     </td>
                                     <td>
                                     <label class="radio-inline radio-styled">
                                         <input type="radio" name="inlineRadioOptions3" value="7"><span></span>
                                     </label>
                                     </td>
</tr>


<tr>
<th>  <label style="font-family: 'Raleway', sans-serif; font-size: 15px;color:black;">4. Es importante para mi mantenerme interesada de
las cosas que suceden a mi alrededor.</label></th>
<td>
                                     <label class="radio-inline radio-styled">
                                         <input type="radio" name="inlineRadioOptions4" value="1" required="true"><span></span>
                                     </label>
                                     </td>
                                     <td>
                                     <label class="radio-inline radio-styled">
                                         <input type="radio" name="inlineRadioOptions4" value="2"><span></span>
                                     </label>
                                     </td>
                                     <td>
                                     <label class="radio-inline radio-styled">
                                         <input type="radio" name="inlineRadioOptions4" value="3"><span></span>
                                     </label>
                                     </td>
                                     <td>
                                     <label class="radio-inline radio-styled">
                                         <input type="radio" name="inlineRadioOptions4" value="4"><span></span>
                                     </label>
                                     </td>
                                     <td>
                                     <label class="radio-inline radio-styled">
                                         <input type="radio" name="inlineRadioOptions4" value="5"><span></span>
                                     </label>
                                     </td>
                                     <td>
                                     <label class="radio-inline radio-styled">
                                         <input type="radio" name="inlineRadioOptions4" value="6"><span></span>
                                     </label>
                                     </td>
                                     <td>
                                     <label class="radio-inline radio-styled">
                                         <input type="radio" name="inlineRadioOptions4" value="7"><span></span>
                                     </label>
                                     </td>



</tr>


<tr>

<th> <label style="font-family: 'Raleway', sans-serif; font-size: 15px;color:black;">5. Puedo estar sola si tengo que hacerlo</label>
     </th>

     <td>
     <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions5" value="1" required="true">
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions5" value="2"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions5" value="3"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions5" value="4"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions5" value="5"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions5" value="6"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions5" value="7"><span></span>
           </label>
           </td>
     



</tr>

<tr>
<th><label style="font-family: 'Raleway', sans-serif; font-size: 15px;color:black;">6. Me siento orgullosa de haber logrado cosas en mi vida</label>
    </th>
<td>
    <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions6" value="1" required="true"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions6" value="2"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions6" value="3"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions6" value="4"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions6" value="5"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions6" value="6"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions6" value="7"><span></span>
           </label>
           </td>

</tr>

<tr>
<th>
<label style="font-family: 'Raleway', sans-serif; font-size: 15px;color:black;">7. Usualmente veo las cosas a largo plazo</label>
    </th>
<td>
 <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions7" value="1" required="true"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions7" value="2"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions7" value="3"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions7" value="4"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions7" value="5"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions7" value="6"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions7" value="7"><span></span>
           </label>
           </td>
</tr>



<tr>
<th><label style="font-family: 'Raleway', sans-serif; font-size: 15px;color:black;">8. Soy amiga de mi misma</label>
     </th>
     <td>
       <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions8" value="1" required="true"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions8" value="2"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions8" value="3"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions8" value="4"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions8" value="5"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions8" value="6"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions8" value="7"><span></span>
           </label>
           </td>

</tr>
<tr>
<th><label style="font-family: 'Raleway', sans-serif; font-size: 15px;color:black;">9. Siento que puedo manejar varias cosas al mismo tiempo</label>
    </th>
    <td>
    <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions9" value="1" required="true"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions9" value="2"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions9" value="3"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions9" value="4"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions9" value="5"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions9" value="6"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions9" value="7"><span></span>
           </label>
           </td>
</tr>







<tr>
<th>
 <label style="font-family: 'Raleway', sans-serif; font-size: 15px;color:black;">10. Soy decidida</label>
  </th> 
         <td>
         <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions10" value="1" required="true"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions10" value="2"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions10" value="3"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions10" value="4"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions10" value="5"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions10" value="6"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions10" value="7"><span></span>
           </label>
           </td>
</tr>


<tr>
<th>
 <label style="font-family: 'Raleway', sans-serif; font-size: 15px;color:black;">11. Rara vez me pregunto cuál es la finalidad de todo</label>
</th> 

<td>
         <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions11" value="1" required="true"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions11" value="2"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions11" value="3"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions11" value="4"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions11" value="5"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions11" value="6"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions11" value="7"><span></span>
           </label>
           </td>



</tr>




<tr>
<th>
 <label style="font-family: 'Raleway', sans-serif; font-size: 15px;color:black;">12. Tomo las cosas una por una</label>
</th> 


<td>
         <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions12" value="1" required="true"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions12" value="2"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions12" value="3"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions12" value="4"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions12" value="5"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions12" value="6"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions12" value="7"><span></span>
           </label>
           </td>



</tr>


<tr>
<th>
 <label style="font-family: 'Raleway', sans-serif; font-size: 15px;color:black;">13. Puedo enfrentar las dificultades porque las he
experimentado anteriormente</label>
</th> 

<td>
         <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions13" value="1" required="true"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions13" value="2"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions13" value="3"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions13" value="4"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions13" value="5"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions13" value="6"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions13" value="7"><span></span>
           </label>
           </td>



</tr>


<tr>
<th>
 <label style="font-family: 'Raleway', sans-serif; font-size: 15px;color:black;">14. Tengo autodisciplina</label>
</th> 

<td>
         <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions14" value="1" required="true"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions14" value="2"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions14" value="3"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions14" value="4"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions14" value="5"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions14" value="6"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions14" value="7"><span></span>
           </label>
           </td>


</tr>


<tr>
<th>
 <label style="font-family: 'Raleway', sans-serif; font-size: 15px;color:black;">15. Me mantengo interesada en las cosas</label>
</th> 

<td>
         <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions15" value="1" required="true"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions15" value="2"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions15" value="3"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions15" value="4"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions15" value="5"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions15" value="6"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions15" value="7"><span></span>
           </label>
           </td>



</tr>

<tr>
<th>
 <label style="font-family: 'Raleway', sans-serif; font-size: 15px;color:black;">16. Por lo general encuentro algo de que reírme</label>
</th> 

<td>
         <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions16" value="1" required="true"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions16" value="2"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions16" value="3"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions16" value="4"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions16" value="5"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions16" value="6"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions16" value="7"><span></span>
           </label>
           </td>
</tr>

<tr>
<th>
 <label style="font-family: 'Raleway', sans-serif; font-size: 15px;color:black;">17. El creer en mí misma me permite atravesar tiempos
difíciles</label>
</th>
<td>
         <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions17" value="1" required="true"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions17" value="2"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions17" value="3"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions17" value="4"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions17" value="5"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions17" value="6"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions17" value="7"><span></span>
           </label>
           </td>


</tr>

<tr>
<th>
 <label style="font-family: 'Raleway', sans-serif; font-size: 15px;color:black;">18. En una emergencia soy una persona en quien se
puede confiar</label>
</th>

<td>
         <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions18" value="1" required="true"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions18" value="2"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions18" value="3"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions18" value="4"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions18" value="5"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions18" value="6"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions18" value="7"><span></span>
           </label>
           </td>



</tr>



<tr>
<th>
 <label style="font-family: 'Raleway', sans-serif; font-size: 15px;color:black;">19. Generalmente puedo ver una situación de varias
maneras</label>
</th>
<td>
         <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions19" value="1" required="true"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions19" value="2"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions19" value="3"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions19" value="4"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions19" value="5"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions19" value="6"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions19" value="7"><span></span>
           </label>
           </td>
</tr>

<tr>
<th>
 <label style="font-family: 'Raleway', sans-serif; font-size: 15px;color:black;">20. Algunas veces me obligo hacer cosas que no quiera</label>
</th>
<td>
         <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions20" value="1" required="true"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions20" value="2"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions20" value="3"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions20" value="4"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions20" value="5"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions20" value="6"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions20" value="7"><span></span>
           </label>
           </td>

</tr>


<tr>
<th>
 <label style="font-family: 'Raleway', sans-serif; font-size: 15px;color:black;">21. Mi vida tiene significado</label>
</th>
<td>
         <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions21" value="1" required="true"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions21" value="2"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions21" value="3"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions21" value="4"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions21" value="5"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions21" value="6"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions21" value="7"><span></span>
           </label>
           </td>

</tr>


<tr>
<th>
 <label style="font-family: 'Raleway', sans-serif; font-size: 15px;color:black;">22. No me lamento de las cosas por las que no puedo
hacer nada</label>
</th>
<td>
         <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions22" value="1" required="true"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions22" value="2"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions22" value="3"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions22" value="4"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions22" value="5"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions22" value="6"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions22" value="7"><span></span>
           </label>
           </td>

</tr>


<tr>
<th>
 <label style="font-family: 'Raleway', sans-serif; font-size: 15px;color:black;">23. Cuando estoy en la situación difícil generalmente
encuentro una salida</label>
</th>
<td>
         <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions23" value="1" required="true"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions23" value="2"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions23" value="3"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions23" value="4"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions23" value="5"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions23" value="6"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions23" value="7"><span></span>
           </label>
           </td>

</tr>


<tr>
<th>
 <label style="font-family: 'Raleway', sans-serif; font-size: 15px;color:black;">24. Tengo la energía suficiente para hacer lo que debo
hacer</label>
</th>
<td>
         <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions24" value="1" required="true"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions24" value="2"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions24" value="3"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions24" value="4"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions24" value="5"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions24" value="6"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions24" value="7"><span></span>
           </label>
           </td>

</tr>

<tr>
<th>
 <label style="font-family: 'Raleway', sans-serif; font-size: 15px;color:black;">25. Acepto que hay personas a las que no les agrado</label>
</th>
<td>
         <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions25" value="1" required="true"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions25" value="2"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions25" value="3"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions25" value="4"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions25" value="5"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions25" value="6"><span></span>
           </label>
           </td>
           <td>
           <label class="radio-inline radio-styled">
               <input type="radio" name="inlineRadioOptions25" value="7"><span></span>
           </label>
           </td>

</tr>


</table>
            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                   <button  type="submit" class="btn btn-default ink-reaction btn-primary-dark">Siguiente</button>
                  </div>
            </div>
</div>         

</div>





</form>
</div>


@endsection

@section('addjs')





@endsection