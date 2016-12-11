<!-- Main content -->
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li><a href="{{ URL::route('MediaIndex') }}">Pregled svih slika</a></li>
    <li class="active">Dodaj sliku</li>
</ul>
<div class="panel-heading">
	<div class="row">
	    <div class="col-md-10">
    		<h4>Unos nove sliku</h4>
    	</div>
    	<div class="col-md-2">
      		<a href="{{ URL::route('MediaIndex') }}">
                <button class="btn btn-default btn-md pull-right"><i class="fa fa-caret-square-o-left"></i> Povratak</button>
            </a> 
    	</div>
    </div>
</div>
<div class="panel-body">
	<div class="row">
		{{ Form::open(array('route' => $postRoute, 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}
	    <div class="col-md-8">
	        <div class="form-group m0 mb15"> 
	        	<label class="col-md-12" for="image">Odabir multimedije</label>
	        	{{ Form::file('image[]', ['multiple' => 'multiple'], array('class' => 'form-control filestyle')) }}
				@if (isset($errors) && ($errors->first('image') != '' || $errors->first('image') != null))
				<small class="text-danger">{{ $errors->first('image') }}</small>
				@endif
	        </div>	           
	          
	    </div>
	    <div class="col-md-4"> 
	         {{ Form::button('<i class="fa fa-floppy-o"></i>   ' . Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-info pull-right')) }}
	    </div>
	    {{ Form::close() }}
    </div>
</div>
 
<script type="text/javascript">
	$(document).ready(function() {
	    $(":file").filestyle();
	    $('.editor').summernote({
	    	height: 200
	    });
    	$("#title").stringToSlug();
	});
</script>