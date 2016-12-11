<!-- Main content --> 
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li><a href="{{ URL::route('ProductsWeightIndex') }}">Pregled svih paketa</a></li>
    <li class="active">Uredi paket</li>
</ul>
<div class="panel-heading">
	<div class="row">
	    <div class="col-md-10">
    		<h4>Dodaj paket</h4>
    	</div>
    	<div class="col-md-2">
      		<a href="{{ URL::route('ProductsWeightIndex') }}">
                <button class="btn btn-default btn-md pull-right"><i class="fa fa-caret-square-o-left"></i> Povratak</button>
            </a> 
    	</div>
    </div>
</div>
<div class="panel-body">
	<div class="row">
		{{ Form::open(array('route' => $postRoute, 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}
	 {{ Form::hidden('id', $entry->id, array('id' => 'id')) }}
	    <div class="col-md-6">
	            <div class="form-group">  
	                <label for="title">Naziv paketa:</label>  
					{{ Form::text('title', isset($entry->title) ? $entry->title : null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Ime']) }}
					<small class="text-danger">{{ $errors->first('title') }}</small>
	            </div> 
	            <div class="form-group">  
	                <label for="product_weight">Količina:</label>  
					{{ Form::text('product_weight', isset($entry->product_weight) ? $entry->product_weight : null, ['class' => 'form-control', 'id' => 'product_weight', 'placeholder' => 'Količina']) }}
					<small class="text-danger">{{ $errors->first('product_weight') }}</small>
	            </div> 
		        <div class="form-group">
		            <label class="col-md-12" for="measure_unit">Mjerna jedinica</label>
		            {{ Form::select('measure_unit', array('ml' => 'ml', 'l' => 'l', 'g' => 'g', 'kg' => 'kg'), isset($entry->measure_unit) ? $entry->measure_unit : null, array('class'=>'form-control','style'=>'' )) }}
		        </div>
 				   {{ Form::button('<i class="fa fa-floppy-o"></i>   ' . Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-info pull-right')) }}
  
	    </div>
	    <div class="col-md-6"> 


 

	      
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

<script type="text/javascript">
  $('select').select2();
</script>