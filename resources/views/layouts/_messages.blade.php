@if(session('success'))
	<div class="alert alert-success">
	    <div class="container">
	      <div class="alert-icon mt-1">
	        <i class="fa fa-check"></i>
	      </div>
	      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	        <span aria-hidden="true" class="text-white"><i class="fa fa-close"></i></span>
	      </button>
	      <b>Success Alert:</b> {{ session('success') }}
	    </div>
	</div>
@endif

