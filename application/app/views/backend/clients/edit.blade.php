<!-- Main content --> 
<ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li><a href="{{ URL::route('ClientsIndex') }}">Pregled svih klijenata</a></li>
    <li class="active">Uredi klijenta</li>
</ul>
<div class="panel-heading">
	<div class="row">
	    <div class="col-md-8">
    		<h4>Uredi klijenta</h4>
    	</div>
    	<div class="col-md-3"> 
      @if(!empty($entry->email))
      <button class="btn btn-primary btn-md pull-right" style="margin-left:15px;" data-toggle="modal" data-target="#mailModal"><i class="fa fa-caret-square-o-left"></i> Pošalji poruku</button>
      @endif
      </div>
    	<div class="col-md-1">
      		<a href="{{ URL::route('ClientsIndex') }}">
                <button class="btn btn-default btn-md pull-right"><i class="fa fa-caret-square-o-left"></i> Povratak</button>
            </a> 
            
    	</div>
    </div>
</div>
<main>
 {{ Form::open(array('route' => 'postMail', 'autocomplete' => 'on', 'role' => 'form', 'class' => 'form-container')) }}
 {{ Form::hidden('id', $entry->id, array('id' => 'id')) }}
 {{ Form::hidden('client_email', $entry->email, array('client_email' => 'client_email')) }}

<div class="modal fade" id="mailModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Poruka za: {{$entry->first_name}} {{$entry->last_name}}</h4>
        </div>
        <div class="modal-body">
        <div class="form-group">
         <label for="contact_email">Poruka od:</label>    
          {{ Form::text('contact_email', 'info@stipino.com' ,['class' => 'form-control', 'id' => 'contact_email', 'placeholder' => 'Email']) }}
          <small class="text-danger">{{ $errors->first('contact_email') }}</small>
        </div>

         <div class="form-group">  
          <label for="client_message">Poruka:</label>  
          {{ Form::textarea('client_message', '' ,['class' => 'form-control editor', 'placeholder' => 'Unesite poruku', 'style' => 'max-height: 125px']) }}
          <small class="text-danger">{{ $errors->first('client_message') }}</small>
              </div> 
        </div>
        <div class="modal-footer">
        
     {{ Form::button('Pošalji', array('class' => 'btn btn-primary btn-block', 'type' => 'submit')) }}
          
        </div>
      </div>
     
    </div>
  </div>

 {{ Form::close() }}
<div class="panel-body">
	<div class="row">
		{{ Form::open(array('route' => $postRoute, 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}
		{{ Form::hidden('id', $entry->id, array('id' => 'id')) }}
	    <div class="col-md-4">
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
					{{ Form::text('additional_email', isset($entry->additional_email) ? $entry->additional_email : null, ['class' => 'form-control', 'id' => 'additional_email', 'placeholder' => 'E-mail adresa']) }}
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
					{{ Form::text('additional_phone', isset($entry->additional_phone) ? $entry->additional_phone : null, ['class' => 'form-control', 'id' => 'additional_phone', 'placeholder' => 'Kontakt telefon']) }}
					<small class="text-danger">{{ $errors->first('additional_phone') }}</small>
	            </div> 
  
	    </div>
	    <div class="col-md-4"> 
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
	    <div class="col-md-4" style="overflow: scroll; max-height: 700px;">
	        <div class="row " style="margin-bottom: 15px;">
	        	
	        	<div class="col-md-4"><b>Narudžbe</b></div>
            <div class="col-md-3"><b>Status</b></div>
	        	<div class="col-md-2"><b>Cijena</b></div>
            <div class="col-md-3"><b>Datum</b></div>
	        </div>
 
	        @foreach ($orders as $key => $order)
             
	         <?php $keyarray = array() ?>
	    	 @foreach($orderdata[$key]['entry'] as $second_array)

	            
                  <div class="row"><div class="col-md-4">
                   <a href="{{ URL::route('ProductsEdit', array('id' => $second_array->product_id)) }}">{{ $second_array->title }}</a> <span style="color:violet;"> {{ $second_array->producttitle }}</span>
                   </div>
                    @if(!in_array($key, $keyarray))
                  <div class="col-md-3">
                  	<p>{{$order->payment_status}}</p>
                  </div>
                   <div class="col-md-2">
                    <p>{{$order->price}}kn</p>
                  </div>
                   <div class="col-md-3">
                    <p>{{$order->order_date}}</p>
                  </div>
                        <?php array_push($keyarray, $key) ?>
                    @endif
                   </div>
             
           
             @endforeach
             <hr>
             @endforeach

            <div class="row" style="margin-bottom: 15px; margin-top:30px;">
            
            <div class="col-md-9"><b>Interakcija</b></div>
            <div class="col-md-3"><b>Datum</b></div>
           </div>
            @foreach ($interactions as $interaction)
            
            <div class="row" style="margin-bottom: 15px;">

            @if($interaction->type == 'Napomena')
             <div class="col-md-9">
              <div class="client-interaction-bubble-note">
                {{$interaction->note}}
              </div>
           </div>
           
            <div class="col-md-3"><p>{{date('d.m.Y', strtotime($interaction->created_at))}}</p>
            
            </div>

            @elseif($interaction->type == 'Poruka')
            <div class="col-md-9">
              <div class="client-interaction-bubble-message">
                {{$interaction->message}}
              </div>
           </div>
           
            <div class="col-md-3"><p>{{date('d.m.Y', strtotime($interaction->created_at))}}</p>
            
            </div>
            @else
            
            <div class="col-md-9">
            <div class="client-interaction-bubble-price">
            <div class="col-md-9" style="padding-left:0px;">
              {{$interaction->type}}
            </div>
            <div class="col-md-3">{{$interaction->price}}kn</div>
            </div>
            </div>
            <div class="col-md-1"><p>{{date('d.m.Y', strtotime($interaction->order_date))}}</p></div>
            <div class="col-md-1"></div>
            
            @endif
          </div>
      
          @endforeach

	  
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