<!-- Main content -->
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li><a href="{{ URL::route('CategoryIndex') }}">Pregled svih kategorija</a></li>
    <li class="active">Dodaj kategoriju</li>
</ul>
<div class="panel-heading">
	<div class="row">
	    <div class="col-md-10">
    		<h4>Unos nove kategorije</h4>
    	</div>
    	<div class="col-md-2">
      		<a href="{{ URL::route('CategoryIndex') }}">
                <button class="btn btn-default btn-md pull-right"><i class="fa fa-caret-square-o-left"></i> Povratak</button>
            </a> 
    	</div>
    </div>
</div>
<div class="panel-body">
	<div class="row">
		{{ Form::open(array('route' => $postRoute, 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}
	    <div class="col-md-12">
	            <div class="form-group">  
	                <label for="title">Naslov kategorije:</label>  
					{{ Form::text('title', isset($entry->title) ? $entry->title : null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Naslov kategorije']) }}
					<small class="text-danger">{{ $errors->first('title') }}</small>
	            </div>
	         	<div class="form-group">  
	                <label for="title">Poveznica:</label>  
					{{ Form::text('permalink', isset($entry->permalink) ? $entry->permalink : null, ['class' => 'form-control', 'id' => 'permalink', 'placeholder' => 'Poveznica kategorije']) }}
					<small class="text-danger">{{ $errors->first('permalink') }}</small>
	            </div>    
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