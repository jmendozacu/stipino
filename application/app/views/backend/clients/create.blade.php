<!-- Main content --> 
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li><a href="{{ URL::route('ClientsIndex') }}">Pregled svih klijenata</a></li>
    <li class="active">Dodaj klijenta</li>
</ul>
<div class="panel-heading">
	<div class="row">
	    <div class="col-md-10">
    		<h4>Dodaj klijenta</h4>
    	</div>
    	<div class="col-md-2">
      		<a href="{{ URL::route('ClientsIndex') }}">
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
	                <label for="first_name">Ime:</label>  
					{{ Form::text('first_name', isset($entry->first_name) ? $entry->first_name : null, ['class' => 'form-control', 'id' => 'first_name', 'placeholder' => 'Ime']) }}
					<small class="text-danger">{{ $errors->first('first_name') }}</small>
	            </div> 
	            <div class="form-group">  
	                <label for="last_name">Prezime:</label>  
					{{ Form::text('last_name', isset($entry->last_name) ? $entry->last_name : null, ['class' => 'form-control', 'id' => 'last_name', 'placeholder' => 'Prezime']) }}
					<small class="text-danger">{{ $errors->first('last_name') }}</small>
	            </div> 
		        <div class="form-group">
		            <label for="type">Tip</label>
		            {{ Form::select('type', array('1' => 'Fizička osoba', '2' => 'Pravna osoba'), isset($entry->type) ? $entry->type : null, array('class'=>'form-control','style'=>'' )) }}
		        </div>

	            <div class="form-group">  
	                <label for="oib">OIB</label>  
					{{ Form::text('oib', isset($entry->oib) ? $entry->oib : null, ['class' => 'form-control', 'id' => 'oib', 'placeholder' => 'Osobni identifikacijski broj']) }}
					<small class="text-danger">{{ $errors->first('oib') }}</small>
	            </div> 

	            <div class="form-group">  
	                <label for="email">E-mail adresa</label>  
					{{ Form::text('email', isset($entry->email) ? $entry->email : null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'E-mail adresa']) }}
					<small class="text-danger">{{ $errors->first('email') }}</small>
	            </div> 
	             <div class="form-group">  
	                <label for="additional_email">Dodatna E-mail adresa</label>  
					{{ Form::text('additional_email', isset($entry->additional_email) ? $entry->additional_email : null, ['class' => 'form-control', 'id' => 'additional_email', 'placeholder' => 'Dodatna E-mail adresa']) }}
					<small class="text-danger">{{ $errors->first('additional_email') }}</small>
	            </div> 
	            <div class="form-group">  
	                <label for="contact_person">Kontakt osoba</label>  
					{{ Form::text('contact_person', isset($entry->contact_person) ? $entry->contact_person : null, ['class' => 'form-control', 'id' => 'contact_person', 'placeholder' => 'Kontakt osoba']) }}
					<small class="text-danger">{{ $errors->first('contact_person') }}</small>
	            </div> 
	            <div class="form-group">  
	                <label for="phone">Kontakt telefon</label>  
					{{ Form::text('phone', isset($entry->phone) ? $entry->phone : null, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Kontakt telefon']) }}
					<small class="text-danger">{{ $errors->first('phone') }}</small>
	            </div> 
	            <div class="form-group">  
	                <label for="additional_phone">Dodatni kontakt telefon</label>  
					{{ Form::text('additional_phone', isset($entry->additional_phone) ? $entry->additional_phone : null, ['class' => 'form-control', 'id' => 'additional_phone', 'placeholder' => 'Dodatni kontakt telefon']) }}
					<small class="text-danger">{{ $errors->first('additional_phone') }}</small>
	            </div> 
  
	    </div>
	    <div class="col-md-6"> 
	            <div class="form-group m0 mb15">  
	                <label for="address">Adresa</label>  
					{{ Form::text('address', isset($entry->address) ? $entry->address : null, ['class' => 'form-control', 'id' => 'address', 'placeholder' => 'Adresa']) }}
					<small class="text-danger">{{ $errors->first('address') }}</small>
	            </div> 
	             <div class="form-group m0 mb15">  
	                <label for="area">Kvart:</label>  
					{{ Form::select('area', $arealist, isset($entry->area) ? $entry->area : null, array('class' => 'form-control', 'style' => 'width:100%', 'id' => 'area', 'required')) }} 
					<small class="text-danger">{{ $errors->first('area') }}</small>
	            </div>
	            <div class="form-group m0 mb15">  
	                <label for="city">Grad:</label>  
					{{ Form::select('city', $citieslist, isset($entry->city) ? $entry->city : null, array('class' => 'form-control', 'style' => 'width:100%', 'id' => 'city', 'required')) }} 
					<small class="text-danger">{{ $errors->first('city') }}</small>
	            </div>
	            <div class="form-group m0 mb15">  
	                <label for="region">Županija:</label>  
					{{ Form::select('region', $regionslist, isset($entry->region) ? $entry->region : null, array('class' => 'form-control', 'style' => 'width:100%', 'id' => 'region', 'required')) }} 
					<small class="text-danger">{{ $errors->first('region') }}</small>
	            </div>
        	<div class="form-group m0 mb15">
                <label for="long-description">Napomena</label>
               	{{ Form::textarea('note', isset($entry->note) ? $entry->note : null, ['class' => 'form-control editor', 'placeholder' => 'Napomena']) }}
				<small class="text-danger">{{ $errors->first('note') }}</small>
            </div> 

	         {{ Form::button('<i class="fa fa-floppy-o"></i>   ' . Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-info pull-right')) }}
	    </div>
	    {{ Form::close() }}
    </div>
</div>
<script type="text/javascript">

$("#area").change(function() {
  $.ajax({
    url: '/admin/ajax/getCity/' + $(this).val(),
    type: 'get',
    data: {},
    success: function(data) {
      if (data.success == true) {
        $("#city").val(data.city);
       
      } else {
        alert('Cannot find info');
      }

    },
    error: function(jqXHR, textStatus, errorThrown) {}
  });
});

</script>


<script type="text/javascript">
	$(document).ready(function() {
	   
		$("#title").stringToSlug();
	});
</script>

<script type="text/javascript">
  $('select').select2();
</script>