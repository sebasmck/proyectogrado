@extends('partials.layout')
@section('title')
Culminación 
@endsection

@section('addcss')

<style>

body {
  background: #0C5AF0;
  padding: 40px;
  color: rgba(0, 0, 0, 0.6);
  font-family: 'Roboto', sans-serif;
  font-size: 14px;
  line-height: 1.7em;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
body:before {
  content: '';
  position: absolute;
  background: #30343E;
  width: 80%;
  height: 200%;
  box-shadow: 0 0 60px rgba(0, 0, 0, 0.3);
  border-radius: 100%;
  -webkit-transform: translate(-20%, -40%) rotate(30deg);
          transform: translate(-20%, -40%) rotate(30deg);
}

::-moz-selection {
  background: #E84F89;
}

::selection {
  background: #E84F89;
}

.modal {
  z-index: 1000;
  position: relative;
  background: #FFF;
  max-width: 530px;
  border-radius: 6px;
  box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
  box-sizing: border-box;
  margin: 0 auto;
  padding: 40px 60px 0;
  overflow: hidden;
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
  -webkit-perspective: 100;
          perspective: 100;
}
.modal.toggled {
  -webkit-animation: flip 3s ease;
          animation: flip 3s ease;
}

.trophy {
  display: block;
  margin: 0 auto 40px;
}

h1 {
  display: block;
  margin: 0 0 20px;
  color: rgba(0, 0, 0, 0.8);
  font-size: 24px;
  font-weight: 400;
  text-align: center;
}

p {
  margin: 0 0 40px;
  padding: 0 60px;
  font-size: 18px;
  text-align: center;
}

button {
  outline: 0;
  background: linear-gradient(#5388C5, #2A78DD);
  width: 35%;
  border: 0;
  border-radius: 100px;
  box-shadow: 0 5px 10px rgba(42, 120, 221, 0.3);
  margin: 0 15px;
  padding: 15px;
  box-sizing: border-box;
  color: #FFF;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
}
button:last-child {
  background: linear-gradient(#54CE42, #1FCD37);
  box-shadow: 0 5px 10px rgba(31, 205, 55, 0.3);
}

footer {
  background: #FFF;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.06);
  margin: 0 -60px;
  padding: 30px 0;
  text-align: center;
}

</style>

@endsection

@section('content')
<div class="col-lg-offset-2 col-md-8">
        <form class="form">
        {{csrf_field()}}
            <div class="card">

                <div class="card-head style-primary">
                   <header> Practica Sentido Del Humor </header>
                </div>
                <div class="card-body floating-label">
                    
                    <!-- animation and stuff -->

                    <div class="modal"><img class="trophy" src="{{asset('img/trophy.png')}}"/>
                        <h1>Congratulations</h1>
                        <p>You have successfully completed the 100 Days UI Challenge</p>
                        <footer>
                          <button>Share</button>
                          <button>Have a beer</button>
                        </footer>
                      </div>

                </div> 
            </div><!--end .card-body -->
            <div class="card-actionbar">
                  <div class="card-actionbar-row">
                  <a style="btn btn-flat btn-primary ink-reaction" href=""> <button type="button" class="btn btn-default ink-reaction btn-primary-dark">Finalizar</button></a>
                  </div>
            </div>

        </div><!--end .card -->
            
        </form>
    </div>

@endsection
 @section('addjs')

        <script scr="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		<script>
			$(document).ready(function() {
				$('#example').DataTable();
			} );
		</script>
        <script>
            $(document).ready( function () {
                $('#example').DataTable();
            } );    
        </script>


@endsection  