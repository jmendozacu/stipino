<!-- Main content --> 
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li><a href="{{ URL::route('OrdersIndex') }}">Pregled svih narudžbi</a></li>
    <li class="active">Dodaj narudžbu</li>
   
      
   
</ul>
<div class="panel-heading">
	<div class="row">
	    <div class="col-md-10">
    		<h4>Dodaj narudžbu</h4>
    	</div>
    	<div class="col-md-1">
    	  <button class="btn btn-success btn-addon btn-sm pull-right" style="height:35px;" data-toggle="modal" 
          data-target="#newClient">
            <i class="fa fa-plus"></i> Dodaj novog klijenta
        </button>
        </div>
    	<div class="col-md-1">
      		<a href="{{ URL::route('OrdersIndex') }}">
                <button class="btn btn-default btn-md pull-right"><i class="fa fa-caret-square-o-left"></i> Povratak</button>
            </a> 
    	</div>
    </div>
</div>
<div class="panel-body">
<div class="modal fade" id="newClient" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" 
          data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" 
        id="favoritesModalLabel">Dodaj novog klijenta</h4>
      </div>
      <div class="modal-body">
        
<div class="row" style="padding: 15px;">
		{{ Form::open(array('route' => 'ClientsStoreFromOrder' , 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}
		 
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
	                <label for="contact_person">Kontakt osoba</label>  
					{{ Form::text('contact_person', isset($entry->contact_person) ? $entry->contact_person : null, ['class' => 'form-control', 'id' => 'contact_person', 'placeholder' => 'Kontakt osoba']) }}
					<small class="text-danger">{{ $errors->first('contact_person') }}</small>
	            </div> 
	            <div class="form-group">  
	                <label for="phone">Kontakt telefon</label>  
					{{ Form::text('phone', isset($entry->phone) ? $entry->phone : null, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Kontakt telefon']) }}
					<small class="text-danger">{{ $errors->first('phone') }}</small>
	            </div> 
  
	    </div>
	    <div class="col-md-6"> 
	            <div class="form-group m0 mb15">  
	                <label for="area">Kvart:</label>  
					{{ Form::select('area', $arealist, isset($entry->area) ? $entry->area : null, array('class' => 'form-control', 'style' => 'width:100%', 'id' => 'area', 'required')) }} 
					<small class="text-danger">{{ $errors->first('area') }}</small>
	            </div>
	    	    <div class="form-group m0 mb15">  
	                <label for="address">Adresa</label>  
					{{ Form::text('address', isset($entry->address) ? $entry->address : null, ['class' => 'form-control', 'id' => 'address', 'placeholder' => 'Adresa']) }}
					<small class="text-danger">{{ $errors->first('address') }}</small>
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
      
    </div>
  </div>
</div>
	<div class="row">
	<div class="col-md-8">
		{{ Form::open(array('route' => $postRoute, 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => false)) }}
		{{ Form::hidden('order_id', $newordernumber, array('id' => 'order_id')) }}
		{{ Form::hidden('order_date', '32', array('id' => 'order_date')) }}
		 	<div class="row" style="margin-bottom:15px;" >
		 	<div class="col-md-4">
		 	
		 
		 	<div class="form-group">  
	                <label for="user_id">Klijent:</label>  
					{{ Form::select('user_id', $clientslist, isset($client->id) ? $client->id : null, array('class' => 'form-control', 'style' => 'width:100%', 'id' => 'user_id', 'required')) }} 
					<small class="text-danger">{{ $errors->first('user_id') }}</small>
	            </div>
	            </div>
	            <div class="col-md-8"></div>

	          </div>
	       
 			<div class="row">
			<div class="col-md-12">
			 			<div class="row">
			 			    <div class="form-group">
					        	<div class="col-md-6">
				            		<div class="input-group">
			               			<span class="input-group-addon">Proizvod</span> 
			          				{{ Form::select('products_array[]', $productlist, isset($entry->id) ? $entry->id : null, array('class' => 'form-control selector', 'style' => 'width:100%', 'id' => 'id', 'required')) }}
			          				</div>
					        	</div>
					        	<div class="col-md-4">
					            	<div class="input-group">
			                   			<span class="input-group-addon">Količina</span> 
										{{ Form::text('quantity[]', isset($entry->quantity) ? $entry->quantity : null, ['class' => 'form-control', 'id' => 'quantity', 'placeholder' => 'Unesite željenu količinu']) }}
									<small class="text-danger">{{ $errors->first('quantity') }}</small>
			              			</div>
					            </div>
					        </div>
					    </div>
				</div>
		    </div>
		 
         
<div class="duplicateable-content">
	<div class="item-block">
		<div class="item-form">  
			<div class="row product-between">		 
				<div class="col-md-12">
			 			<div class="row">
			 			    <div class="form-group">
					        	<div class="col-md-6">
				            		<div class="input-group">
			               			<span class="input-group-addon">Proizvod</span> 
			          				{{ Form::select('products_array[]', $productlist, isset($entry->id) ? $entry->id : null, array('class' => 'form-control selector', 'style' => 'width:100%', 'id' => 'id', 'required')) }}
			          				</div>
					        	</div>
					        	<div class="col-md-4">
					            	<div class="input-group">
			                   			<span class="input-group-addon">Količina</span> 
										{{ Form::text('quantity[]', isset($entry->quantity) ? $entry->quantity : null, ['class' => 'form-control', 'id' => 'quantity', 'placeholder' => 'Unesite željenu količinu']) }}
									<small class="text-danger">{{ $errors->first('quantity') }}</small>
			              			</div>
					            </div>
					            <div class="col-md-1"></div>
							 <div class="col-md-1">
							<a class="btn btn-danger btn-float btn-remove"><i class="ti-close"></i></a>
							</div>
					        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
  		 
      	<div class="col-md-11">
        <a class="btn btn-success btn-duplicator margin-bot30">Dodaj proizvod</a>
      	</div>
      	<div class="row">
      	<div class="col-md-3">
		        <div class="form-group">
		            <label for="shipping_way">Način dostave:</label>
		            {{ Form::select('shipping_way', array('stipino' => 'Stipino','overseas' => 'Overseas', 'cityexpress' => 'Cityexpress', 'hrvatskaposta' => 'Hrvatska pošta', 'tisakpaketi' => 'Tisak paketi', 'dpd' => 'DPD', 'dhl' => 'DHL', 'gls' => 'GLS', 'intereuropa' => 'Intereuropa'), isset($entry->shipping_way) ? $entry->shipping_way : null, array('class'=>'form-control','style'=>'' )) }}
		        </div>
	</div>
	<div class="col-md-1"></div>
      	<div class="col-md-4">
		        <div class="form-group">
		            <label for="payment_way">Naćin plaćanja: </label>
		            {{ Form::select('payment_way', array('pouzecu' => 'Pouzeću','virman' => 'Virman (bankovna transakcija)', 'preuzimanje' => 'Po preuzimanju', 'kartica' => 'Kartično plaćanje', 'paypal' => 'PayPal'), isset($entry->payment_way) ? $entry->payment_way : null, array('class'=>'form-control','style'=>'' )) }}
		        </div>
	</div>
	<div class="col-md-1"></div>
	      	<div class="col-md-3">
		        <div class="form-group">
		            <label for="payment_status">Status narudžbe: </label>
		            {{ Form::select('payment_status', array('procesuiranje' => 'Precesuiranje','zavrseno' => 'Završeno'), isset($entry->payment_status) ? $entry->payment_status : null, array('class'=>'form-control','style'=>'' )) }}
		        </div>
	</div>
	</div>
	<div class="row">
	      	<div class="col-md-4" style="padding-left:0px;">
            		 <label for="billing_address">Adresa naplate</label>  
					{{ Form::text('billing_address', isset($billingaddress) ? $billingaddress : null, ['class' => 'form-control', 'id' => 'billing_address', 'placeholder' => 'Adresa naplate']) }}
					<small class="text-danger">{{ $errors->first('billing_address') }}</small>
	</div>
	<div class="col-md-4" >
		       
               	 <label for="shipping_address">Adresa dostave</label>  
					{{ Form::text('shipping_address', isset($billingaddress) ? $billingaddress : null, ['class' => 'form-control', 'id' => 'shipping_address', 'placeholder' => 'Adresa dostave']) }}
					<small class="text-danger">{{ $errors->first('shipping_address') }}</small>
          
	</div>
	</div>
	        	<div class="form-group" style="margin-top: 15px;">
                <label for="note">Napomena</label>
               	{{ Form::textarea('note', isset($entry->note) ? $entry->note : null, ['class' => 'form-control editor', 'placeholder' => 'Napomena']) }}
				<small class="text-danger">{{ $errors->first('note') }}</small>
            </div> 
            	   	<div class="col-md-1 pull-right"> 
		    {{ Form::button('<i class="fa fa-floppy-o"></i>   ' . Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-info pull-right')) }}
		</div>
	</div> 


</div> 
  
 

{{ Form::close() }}
<script type="text/javascript">

$("#user_id").change(function() {
  $.ajax({
    url: '/admin/ajax/getAddress/' + $(this).val(),
    type: 'get',
    data: {},
    success: function(data) {
      if (data.success == true) {
        $("#billing_address").val(data.info);
        $("#shipping_address").val(data.info);
      } else {
        alert('Cannot find info');
      }

    },
    error: function(jqXHR, textStatus, errorThrown) {}
  });
});

</script>

