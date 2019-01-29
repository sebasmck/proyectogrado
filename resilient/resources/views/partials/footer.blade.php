		

		<!-- BEGIN JAVASCRIPT -->

	
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
		<script src="{{URL::asset('js/libs/jquery/jquery-1.11.2.min.js')}}"></script>
		<script src="{{URL::asset('js/DataTables/datatables.min.js')}}" ></script>
		<script src="{{URL::asset('js/libs/jquery/jquery-migrate-1.2.1.min.js')}}"></script>
		<script src="{{URL::asset('js/libs/jquery-ui/jquery-ui.min.js')}}"></script>
		<script src="{{URL::asset('js/libs/bootstrap/bootstrap.min.js')}}"></script>
		<script src="{{URL::asset('js/libs/spin.js/spin.min.js')}}"></script>
		<script src="{{URL::asset('js/libs/autosize/jquery.autosize.min.js')}}"></script>
		<script src="{{URL::asset('js/libs/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
		<script src="{{URL::asset('js/libs/moment/moment.min.js')}}"></script>
		<script src="{{URL::asset('js/libs/flot/jquery.flot.min.js')}}"></script>
		<script src="{{URL::asset('js/libs/flot/jquery.flot.time.min.js')}}"></script>
		<script src="{{URL::asset('js/libs/flot/jquery.flot.resize.min.js')}}"></script>
		<script src="{{URL::asset('js/libs/flot/jquery.flot.orderBars.js')}}"></script>
		<script src="{{URL::asset('js/libs/flot/jquery.flot.pie.js')}}"></script>
		<script src="{{URL::asset('js/libs/flot/curvedLines.js')}}"></script>
		<script src="{{URL::asset('js/libs/jquery-knob/jquery.knob.min.js')}}"></script>
		<script src="{{URL::asset('js/libs/sparkline/jquery.sparkline.min.js')}}"></script>
		<script src="{{URL::asset('js/libs/nanoscroller/jquery.nanoscroller.min.js')}}"></script>
		<script src="{{URL::asset('js/libs/d3/d3.min.js')}}"></script>
		<script src="{{URL::asset('js/libs/d3/d3.v3.js')}}"></script>
		<script src="{{URL::asset('js/libs/rickshaw/rickshaw.min.js')}}"></script>
		<script src="{{URL::asset('js/core/source/App.js')}}"></script>
		<script src="{{URL::asset('js/core/source/AppNavigation.js')}}"></script>
		<script src="{{URL::asset('js/core/source/AppOffcanvas.js')}}"></script>
		<script src="{{URL::asset('js/core/source/AppCard.js')}}"></script>
		<script src="{{URL::asset('js/core/source/AppForm.js')}}"></script>
		<script src="{{URL::asset('js/core/source/AppNavSearch.js')}}"></script>
		<script src="{{URL::asset('js/core/source/AppVendor.js')}}"></script>
		<script src="{{URL::asset('js/core/demo/Demo.js')}}"></script>
		<script src="{{URL::asset('js/core/demo/DemoFormComponents.js')}}"></script>
		<script src="{{URL::asset('js/libs/dropzone/dropzone.min.js')}}"></script>
		<script src="{{URL::asset('js/libs/select2/select2.min.js')}}"></script>
		<script src="{{URL::asset('js/libs/nestable/jquery.nestable.js')}}"></script>
		<script src="{{URL::asset('js/libs/ckeditor/ckeditor.js')}}"></script>
		<script src="{{URL::asset('js/libs/ckeditor/adapters/jquery.js')}}"></script>
		<script src="{{URL::asset('js/utils/dryUtils.js')}}"></script>
		
		
		<!-- prueba con este codigo para los checkbox-->
		{{--  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>  --}}
		
		
		
		

		{{-- <script>
			@if(Session::has('message'))
			var type = "{{ Session::get('alert-type', 'info') }}";
			switch(type){
				case 'info':
				toastr.info("{{ Session::get('message') }}");
				break;
				
				case 'warning':
				toastr.warning("{{ Session::get('message') }}");
				break;

				case 'success':
				toastr.success("{{ Session::get('message') }}");
				break;

				case 'error':
				toastr.error("{{ Session::get('message') }}");
				break;
			}
			@endif
		</script> --}}

			<script type="text/javascript" charset="utf-8">
			  $(document).ready(function(){

			        $('.inputdocument').keydown(function(e) { 
			           this.value = (this.value + '').replace(/[.]/, '');
			        });

			        $('.inputdocument').keypress(function(e) { 
			          this.value = (this.value + '').replace(/[.]/, '');
			        });});

			   function cambiarEstado(){
				  	 if ( $('#selectescolaridad').val() == 60 ) {
				        	$('#escolaridad').css('display', 'block');
				        
				    }else{
				    		$('#escolaridad').css('display', 'none');
				    }


				     if ( $('#selectocupacion').val() == 60 ) {
				        	$('#ocupacion').css('display', 'block');
				        
				    }else{
				    		$('#ocupacion').css('display', 'none');
				    }


				     if ( $('#selectparentesco').val() == 60 ) {
				        	$('#parentesco').css('display', 'block');
				        
				    }else{
				    		$('#parentesco').css('display', 'none');
				    }
				}


				/**function comprobarEstado(){

					var selects = $('select');

					for (var i = selects.length - 1; i >= 0; i--) {
						selects[i] = 
					} */
				

			</script>

		{{--  <script type="text/javascript">
    			$(".date").datepicker({format: 'dd/mm/yyyy'});
		</script>    --}}


		{{-- <script type="text/javascript">
			$(document).ajaxStart(function () {
	            $('#status').show();
	        });
	        $(document).ajaxStop(function () {
	            $('#status').hide();
	        });
        </script> --}}

       {{-- 	<script type="text/javascript">
       		$('select').select2();
       	</script> --}}

		<!-- END JAVASCRIPT -->

		@yield('addjs')