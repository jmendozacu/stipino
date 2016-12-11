<!-- Main content --> 
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li><a href="{{ URL::route('ProductsIndex') }}">Pregled svih proizvoda</a></li>
    <li class="active">Uredi proizvod</li>
</ul>
<div class="panel-heading">
	<div class="row">
	    <div class="col-md-10">
    		<h4>Dodaj proizvod</h4>
    	</div>
    	<div class="col-md-2">
      		<a href="{{ URL::route('ProductsIndex') }}">
                <button class="btn btn-default btn-md pull-right"><i class="fa fa-caret-square-o-left"></i> Povratak</button>
            </a> 
    	</div>
    </div>
</div>
<div class="panel-body">
	<div class="row">
		{{ Form::open(array('route' => $postRoute, 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}
	 
	    <div class="col-md-6">
	            <div class="form-group">  
	                <label for="title">Naziv proizvoda:</label>  
					{{ Form::text('title', isset($entry->title) ? $entry->title : null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Ime']) }}
					<small class="text-danger">{{ $errors->first('title') }}</small>
	            </div> 
	           	<div class="form-group">  
	                <label for="title">Poveznica proizvoda:</label>  
					{{ Form::text('permalink', isset($entry->permalink) ? $entry->permalink : null, ['class' => 'form-control', 'id' => 'permalink', 'placeholder' => 'Poveznica posta']) }}
					<small class="text-danger">{{ $errors->first('permalink') }}</small>
	            </div>  
	            <div class="form-group">  
	                <label for="price">Prodajna cijena:</label>  
					{{ Form::text('price', isset($entry->price) ? $entry->price : null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Prodajna cijena']) }}
					<small class="text-danger">{{ $errors->first('price') }}</small>
	            </div> 
	            <div class="form-group">  
	                <label for="sale_price">Snižena cijena:</label>  
					{{ Form::text('sale_price', isset($entry->sale_price) ? $entry->sale_price : null, ['class' => 'form-control', 'id' => 'sale_price', 'placeholder' => 'Snižena cijena']) }}
					<small class="text-danger">{{ $errors->first('sale_price') }}</small>
	            </div> 
	            <div class="form-group">  
	                <label for="manufacturing_price">Cijena proizvodnje</label>  
					{{ Form::text('manufacturing_price', isset($entry->manufacturing_price) ? $entry->manufacturing_price : null, ['class' => 'form-control', 'id' => 'manufacturing_price', 'placeholder' => 'Cijena proizvodnje']) }}
					<small class="text-danger">{{ $errors->first('manufacturing_price') }}</small>
	            </div> 

	           	<div class="form-group">  
	                <label for="product_weight">Paket:</label>  
					{{ Form::select('product_weight', $productsweightlist, isset($entry->product_weight) ? $entry->product_weight : null, array('class' => 'form-control', 'style' => 'width:100%', 'id' => 'product_weight', 'required')) }} 
					<small class="text-danger">{{ $errors->first('product_weight') }}</small>
	            </div>


		        <div class="form-group">
		            <label for="onsale">Na rasprodaji</label>
		            {{ Form::select('onsale', array('1' => 'Da', '0' => 'Ne'), isset($entry->onsale) ? $entry->onsale : null, array('class'=>'form-control','style'=>'' )) }}
		        </div>
		        <div class="form-group">
		            <label for="onstock">Na stanju</label>
		            {{ Form::select('onstock', array('1' => 'Da', '0' => 'Ne'), isset($entry->onstock) ? $entry->onstock : null, array('class'=>'form-control','style'=>'' )) }}
		        </div>
		        <div class="form-group">
		            <label for="published">Objavljeno?</label>
		            {{ Form::select('published', array('1' => 'Da', '0' => 'Ne'), isset($entry->published) ? $entry->published : null, array('class'=>'form-control','style'=>'' )) }}
		        </div>

		        <div class="form-group">
                                <label for="product_category">Kategorije proizvoda:</label>   
                                        {{ Form::select('product_category[]', $categorylist, isset($entry->product_category) ? $entry->product_category : null, array('class' => 'form-control multiselect', 'style' => 'width:100%', 'id' => 'id', 'multiple')) }}
                                <small class="text-danger">{{ $errors->first('product_category') }}</small>
                     </div>
 
 		<div class="form-group">
                        <label for="blogposts">Vezani članci:</label>   
                                {{ Form::select('blogposts[]', $bloglist, isset($entry->blogposts) ? $entry->blogposts : null, array('class' => 'form-control multiselect', 'style' => 'width:100%', 'id' => 'id', 'multiple')) }}
                        <small class="text-danger">{{ $errors->first('blogposts') }}</small>
                    </div>
  
	    </div>
	    <div class="col-md-6"> 
	    	<div class="form-group m0 mb15">
                <label for="long-description">Intro</label>
               	{{ Form::textarea('intro', isset($entry->intro) ? $entry->intro : null, ['class' => 'form-control editor', 'placeholder' => 'Napomena']) }}
				<small class="text-danger">{{ $errors->first('intro') }}</small>
            </div> 


        	<div class="form-group m0 mb15">
                <label for="long-description">Opis</label>
               	{{ Form::textarea('description', isset($entry->description) ? $entry->description : null, ['class' => 'form-control editor', 'placeholder' => 'Napomena']) }}
				<small class="text-danger">{{ $errors->first('description') }}</small>
            </div> 
            	        	        <div class="form-group mb15"> 
	        	<label class="col-md-12" for="image">Slika proizvoda</label>
	            <div class="col-md-12"> 
 					{{ Form::file('image', array('class' => 'form-control filestyle'))  }}
					@if (isset($errors) && ($errors->first('image') != '' || $errors->first('image') != null))
					<small class="text-danger">{{ $errors->first('image') }}</small>
					@endif
                </div>
	        </div>
 
             	        	        <div class="form-group mb15"> 
	        	<label class="col-md-12" for="cover_image">Velika slika proizvoda</label>
	            <div class="col-md-12"> 
 					{{ Form::file('cover_image', array('class' => 'form-control filestyle'))  }}
					@if (isset($errors) && ($errors->first('cover_image') != '' || $errors->first('cover_image') != null))
					<small class="text-danger">{{ $errors->first('cover_image') }}</small>
					@endif
                </div>
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

<script type="text/javascript">
  $('select').select2();
</script>