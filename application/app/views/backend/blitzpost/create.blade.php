<!-- Main content -->
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li><a href="{{ URL::route('BlitzPostIndex') }}">Pregled svih postova</a></li>
    <li class="active">Dodaj blitz post</li>
</ul>
<div class="panel-heading">
	<div class="row">
	    <div class="col-md-10">
    		<h4>Unos novog blitz posta</h4>
    	</div>
    	<div class="col-md-2">
      		<a href="{{ URL::route('BlitzPostIndex') }}">
                <button class="btn btn-default btn-md pull-right"><i class="fa fa-caret-square-o-left"></i> Povratak</button>
            </a> 
    	</div>
    </div>
</div>
<div class="panel-body">
	<div class="row">
		{{ Form::open(array('route' => $postRoute, 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}
		 
	    <div class="col-md-8">
	            <div class="form-group">  
	                <label for="title">Naslov:</label>  
					{{ Form::text('title', isset($entry->title) ? $entry->title : null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Naslov posta']) }}
					<small class="text-danger">{{ $errors->first('title') }}</small>
	            </div>
	         	<div class="form-group">  
	                <label for="title">Poveznica:</label>  
					{{ Form::text('permalink', isset($entry->permalink) ? $entry->permalink : null, ['class' => 'form-control', 'id' => 'permalink', 'placeholder' => 'Poveznica posta']) }}
					<small class="text-danger">{{ $errors->first('permalink') }}</small>
	            </div>  
	            <div class="form-group">  
	                <label for="intro">Uvod:</label>  
					{{ Form::textarea('intro', isset($entry->intro) ? $entry->intro : null, ['class' => 'form-control editor', 'placeholder' => 'Uvod u članak']) }}
					<small class="text-danger">{{ $errors->first('intro') }}</small>
	            </div>  
	           
	    </div>
	    <div class="col-md-4"> 
	       <div class="form-group m0 mb15">
	            <label class="col-md-12" for="published">Status</label>
	            {{ Form::select('published', array('0' => 'Neobjavljeno', '1' => 'Objavljeno'), 'draft', array('class'=>'form-control','style'=>'' )) }}
	        </div>
	        {{ Form::button('<i class="fa fa-floppy-o"></i>   ' . Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-info pull-right')) }}
	    </div>

	    {{ Form::close() }}
    </div>
</div>
 
<script type="text/javascript">
	$(document).ready(function() {
	    $(":file").filestyle();
		$('.editor').froalaEditor({
			toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'fontFamily', 'fontSize', '|', 'color', 'inlineStyle', 'paragraphStyle', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', 'insertHR', '-', 'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', 'undo', 'redo', 'clearFormatting', 'selectAll', 'html'],
		})
    	$("#title").stringToSlug();
	});
</script>