<!-- Main content --> 
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li><a href="{{ URL::route('ProductsIndex') }}">Pregled svih proizvoda</a></li>
    <li class="active">Uredi proizvod</li>
</ul>
<div class="panel-heading">
	<div class="row">
	    <div class="col-md-10">
    		<h4>Uredi proizvod</h4>
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
		{{ Form::hidden('id', $entry['entry']->id, array('id' => 'id')) }}
	    <div class="col-md-6">
	            <div class="form-group">  
	                <label for="title">Naziv proizvoda:</label>  
					{{ Form::text('title', isset($entry['entry']->title) ? $entry['entry']->title : null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Ime']) }}
					<small class="text-danger">{{ $errors->first('title') }}</small>
	            </div> 
	            <div class="form-group">  
	                <label for="permalink">Permalink proizvoda:</label>  
					{{ Form::text('permalink', isset($entry['entry']->permalink) ? $entry['entry']->permalink : null, ['class' => 'form-control', 'id' => 'permalink', 'placeholder' => 'Ime']) }}
					<small class="text-danger">{{ $errors->first('permalink') }}</small>
	            </div> 
	            <div class="form-group">  
	                <label for="price">Prodajna cijena:</label>  
					{{ Form::text('price', isset($entry['entry']->price) ? $entry['entry']->price : null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Prodajna cijena']) }}
					<small class="text-danger">{{ $errors->first('price') }}</small>
	            </div> 
		     <div class="form-group">  
	                <label for="sale_price">Snižena cijena:</label>  
					{{ Form::text('sale_price', isset($entry['entry']->sale_price) ? $entry['entry']->sale_price : null, ['class' => 'form-control', 'id' => 'sale_price', 'placeholder' => 'Snižena cijena']) }}
					<small class="text-danger">{{ $errors->first('sale_price') }}</small>
	            </div> 
	            <div class="form-group">  
	                <label for="manufacturing_price">Cijena proizvodnje</label>  
					{{ Form::text('manufacturing_price', isset($entry['entry']->manufacturing_price) ? $entry['entry']->manufacturing_price : null, ['class' => 'form-control', 'id' => 'manufacturing_price', 'placeholder' => 'Cijena proizvodnje']) }}
					<small class="text-danger">{{ $errors->first('manufacturing_price') }}</small>
	            </div> 
	           	<div class="form-group">  
	                <label for="product_weight">Paket:</label>  
					{{ Form::select('product_weight', $productsweightlist, isset($entry['entry']->product_weight) ? $entry['entry']->product_weight : null, array('class' => 'form-control', 'style' => 'width:100%', 'id' => 'product_weight', 'required')) }} 
					<small class="text-danger">{{ $errors->first('product_weight') }}</small>
	            </div>
		        <div class="form-group">
		            <label for="onsale">Na rasprodaji</label>
		            {{ Form::select('onsale', array('1' => 'Da', '0' => 'Ne'), isset($entry['entry']->onsale) ? $entry['entry']->onsale : '0', array('class'=>'form-control','style'=>'' )) }}
		        </div>
		        <div class="form-group">
		            <label for="onstock">Na stanju</label>
		            {{ Form::select('onstock', array('1' => 'Da', '0' => 'Ne'), isset($entry['entry']->onstock) ? $entry['entry']->onstock : null, array('class'=>'form-control','style'=>'' )) }}
		        </div>
		      	<div class="form-group">
		            <label for="published">Objavljeno?</label>
		            {{ Form::select('published', array('1' => 'Da', '0' => 'Ne'), isset($entry['entry']->published) ? $entry['entry']->published : null, array('class'=>'form-control','style'=>'' )) }}
		        </div>
 
                  <div class="form-group">
                      <label for="product_category">Kategorije proizvoda:</label>   
                            <select class="form-control multiselect" multiple="multiple" name="product_category[]" id="product_category" style="width:100%;" > 
                            @foreach ($categorylist['0']['entries'] as $category)  
                                    
                                       @if(in_array($category->id, $categorylist['1']))
                                        {{ $category->title }} 
                                        <option value="{{ $category->id }} " selected="selected">{{ $category->title }} </option>
                                     @else
                                     <option value="{{ $category->id }}">{{ $category->title }}</option>
                                   @endif
                                    
                                    
                             @endforeach 
                             </select>
                        <small class="text-danger">{{ $errors->first('product_category[]') }}</small>
                  </div>

                  <div class="form-group">
                       <label for="product_posts">Vezani članci:</label>   
                            <select class="form-control multiselect" multiple="multiple" name="product_posts[]" id="product_posts" style="width:100%;" >
                                    @foreach($blogslist['0']['entries'] as $blogpost)
                                        @if(in_array($blogpost->id, $blogslist['1']))
                                        {{ $blogpost->title }} 
                                        <option value="{{ $blogpost->id }} " selected="selected">{{ $blogpost->title }} </option>
                                        @else
                                   
                                        <option value="{{$blogpost->id}}">{{ $blogpost->title }}</option>
                                        @endif
                                    @endforeach
                             </select>
                                   <small class="text-danger">{{ $errors->first('product_posts') }}</small>
                                         </div>
                      
               
		                    @if ($entry['entry']->image != null || $entry['entry']->image != '')
				<div class="form-group mb15">
					<label class="col-md-12" for="image">Trenutna slika:</label> 
	 				<div class="col-md-12" style="display:block; margin:0 auto;">
	 					{{ HTML::image(URL::to('/') . '/uploads/frontend/products/' . $entry['entry']->image, $entry['entry']->permalink) }}
	 				</div>
				</div>
			@endif
	    </div>
	    <div class="col-md-6"> 
	    	  <div class="form-group m0 mb15">
                <label for="long-description">Intro</label>
               	{{ Form::textarea('intro', isset($entry['entry']->intro) ? $entry['entry']->intro : null, ['class' => 'form-control editor', 'placeholder' => 'Napomena']) }}
				<small class="text-danger">{{ $errors->first('intro') }}</small>
            </div> 
        	<div class="form-group m0 mb15">
                <label for="long-description">Opis</label>
               	{{ Form::textarea('description', isset($entry['entry']->description) ? $entry['entry']->description : null, ['class' => 'form-control editor', 'placeholder' => 'Napomena']) }}
				<small class="text-danger">{{ $errors->first('description') }}</small>
            </div> 

            <div class="form-group mb15"> 
	        	<label class="col-md-12" for="image">Zamjeni sliku</label>
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
			imageManagerLoadURL: 'http://culex.minix-project.com/test/bakine-carolije/images/dorucak/thumbnails/'
		})

		$("#title").stringToSlug();
	});
</script>

<script type="text/javascript">
  $('select').select2();
</script>