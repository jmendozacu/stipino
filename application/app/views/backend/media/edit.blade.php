<!-- Main content --> 
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li><a href="{{ URL::route('MediaIndex') }}">Pregled svih objava</a></li>
    <li class="active">Uredi objavu</li>
</ul>
<div class="panel-heading">
	<div class="row">
	    <div class="col-md-10">
    		<h4>Uredi objavu</h4>
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
		{{ Form::hidden('id', $entry->id, array('id' => 'id')) }}
	    <div class="col-md-8"> 
    		@if ($entry->image != null || $entry->image != '')
				<div class="form-group mb15">
					<label class="col-md-12" for="image">Trenutna slika:</label> 
	 				<div class="col-md-12" style="display:block; margin:0 auto;">
	 					{{ HTML::image(URL::to('/') . '/uploads/backend/media/' . $entry->image, $entry->permalink) }}
	 				</div>
				</div>
			@endif
	    </div>
	    <div class="col-md-4"> 
	    <label class="col-md-12" for="image">Link do slike:</label>
	    {{ URL::to('/') . '/uploads/backend/media/' . $entry->image, $entry->permalink }}
	    <hr>
		    	<div class="form-group mb15"> 
		        	<label class="col-md-12" for="image">Zamjeni sliku</label>
		            <div class="col-md-12"> 
	 					{{ Form::file('image', array('class' => 'form-control filestyle'))  }}
						@if (isset($errors) && ($errors->first('image') != '' || $errors->first('image') != null))
						<small class="text-danger">{{ $errors->first('image') }}</small>
						@endif
	                </div>
		        </div>
	        	{{ Form::button('<i class="fa fa-floppy-o"></i>   ' . Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-info pull-right')) }}
	    	{{ Form::close() }}
    	</div>
    </div>
</div>



 