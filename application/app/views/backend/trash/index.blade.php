 
 <ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li class="active"><a href="{{ URL::route('TrashIndex') }}">Pregled svih obrisan sadržaja</a></li>
    
    
</ul>
        
<div class="panel-heading">
    <h4>Pregled svih obrisan sadržaja ({{$contentcount}})</h4>
</div>

<div class="panel-body table-responsive">

    <table class="table table-hover" id="entries-list">
        <thead>
            <tr>

            
              @if($trashed == 'blogposts' or $trashed == 'categories' or $trashed == 'pages' or $trashed == 'widgets' or $trashed == 'workshops' )
                <th>Naslov</th>
                <th>Slika</th>
                <th>Obrisano</th>
                <th>Obnovi</th>
              @endif

              @if($trashed == 'media')
                <th>Slika</th>
                <th>Obrisano</th>
                <th>Obnovi</th>
              @endif

              @if($trashed == 'clients')
                <th>Naziv klijenta</th>
                <th>Email</th>
                <th>Obrisano</th>
                <th>Obnovi</th>
              @endif

               @if($trashed == 'products')
                <th>Naziv</th>
                <th>Cijena</th>
                <th>Obrisano</th>
                <th>Obnovi</th>
              @endif

              @if($trashed == 'productsweight')
                <th>Naziv paketa</th>
                <th>Količina i mjerna jedinica</th>
                <th>Obrisano</th>
                <th>Obnovi</th>
              @endif

              @if($trashed == 'productscategories')
                <th>Naslov</th>
                <th>Obrisano</th>
                <th>Obnovi</th>
              @endif

              @if($trashed == 'orders')
                <th>Naziv klijenta</th>
                <th>Cijena narudžbe</th>
                <th>Obrisano</th>
                <th>Obnovi</th>
              @endif
          
        </thead>
         <!--blog, categories, pages, widgets, workshops-->
            @if($trashed == 'blogposts' or $trashed == 'categories' or $trashed == 'pages' or $trashed == 'widgets' or $trashed == 'workshops' )
                <tbody>
             @if (count($entries) > 0) 
                @foreach($entries as $entry)
                <tr>
                   
                    <td>{{ $entry->title }}</td>
                      <td>
                        @if ($entry->image != '' || $entry->image != null)
                        @if($trashed == 'blogposts' or $trashed == 'categories')
                            <img src="{{ url('/') }}/uploads/frontend/blog/thumbs/{{ $entry->image }}" class="blog-post-image img-responsive" />
                            @endif
                             @if($trashed == 'pages')
                            <img src="{{ url('/') }}/uploads/frontend/pages/thumbs/{{ $entry->image }}" class="blog-post-image img-responsive" />
                            @endif
                            @if($trashed == 'widgets')
                            <img src="{{ url('/') }}/uploads/frontend/widgets/thumbs/{{ $entry->image }}" class="blog-post-image img-responsive" />
                            @endif
                            @if($trashed == 'workshops')
                            <img src="{{ url('/') }}/uploads/frontend/workshops/thumbs/{{ $entry->image }}" class="blog-post-image img-responsive" />
                            @endif
                        @endif 
                    </td>
                    <td> {{ date('d. m. Y.', strtotime($entry->deleted_at)) }} </td>
                   
                    <td class="col-md-1">  
 
                        <a href="{{ URL::route('TrashRestore', array('id' => $entry->id, 'trashed' => $trashed)) }}">
                            <button class="btn btn-success btn-xs"><i class="fa fa-undo"></i></button>
                        </a>
                      
                  
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
      @endif
       <!--media-->
       @if($trashed == 'media')
                    <tbody>
             @if (count($entries) > 0) 
                @foreach($entries as $entry)
                <tr>
                      <td>
                        @if ($entry->image != '' || $entry->image != null)
                            <img src="{{ url('/') }}/uploads/backend/media/thumbs/{{ $entry->image }}" class="blog-post-image img-responsive" style="width:200px; height:100px;" />
                        @endif 
                    </td>
                    <td> {{ date('d. m. Y.', strtotime($entry->deleted_at)) }} </td>
                   
                    <td class="col-md-1">  
 
                        <a href="{{ URL::route('TrashRestore', array('id' => $entry->id, 'trashed' => $trashed)) }}">
                            <button class="btn btn-success btn-xs"><i class="fa fa-undo"></i></button>
                        </a>
                      
                  
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    @endif
<!--clients-->

              @if($trashed == 'clients')
                <tbody>
             @if (count($entries) > 0) 
                @foreach($entries as $entry)
                <tr>
                    <td>{{$entry->first_name}} {{$entry->last_name}}</td>
                    <td>{{$entry->email}}</td>
                    <td> {{ date('d. m. Y.', strtotime($entry->deleted_at)) }} </td>
                   
                    <td class="col-md-1">  
 
                        <a href="{{ URL::route('TrashRestore', array('id' => $entry->id, 'trashed' => $trashed)) }}">
                            <button class="btn btn-success btn-xs"><i class="fa fa-undo"></i></button>
                        </a>
                      
                  
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
     @endif
<!--products-->
  @if($trashed == 'products')
                 <tbody>
             @if (count($entries) > 0) 
                @foreach($entries as $entry)
                <tr>
                    <td>{{$entry->title}}</td>
                    <td>{{$entry->price}}</td>
                    <td> {{ date('d. m. Y.', strtotime($entry->deleted_at)) }} </td>
                   
                    <td class="col-md-1">  
 
                        <a href="{{ URL::route('TrashRestore', array('id' => $entry->id, 'trashed' => $trashed)) }}">
                            <button class="btn btn-success btn-xs"><i class="fa fa-undo"></i></button>
                        </a>
                      
                  
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    @endif
<!--productsweight-->
  @if($trashed == 'productsweight')
                <tbody>
             @if (count($entries) > 0) 
                @foreach($entries as $entry)
                <tr>
                    <td>{{$entry->title}}</td>
                    <td>{{$entry->product_weight}} {{$entry->measure_unit}}</td>
                    <td> {{ date('d. m. Y.', strtotime($entry->deleted_at)) }} </td>
                   
                    <td class="col-md-1">  
 
                        <a href="{{ URL::route('TrashRestore', array('id' => $entry->id, 'trashed' => $trashed)) }}">
                            <button class="btn btn-success btn-xs"><i class="fa fa-undo"></i></button>
                        </a>
                      
                  
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
              @endif

<!--productscategories-->
     @if($trashed == 'productscategories')
                  <tbody>
             @if (count($entries) > 0) 
                @foreach($entries as $entry)
                <tr>
                    <td>{{$entry->categorytitle}}</td>
                    <td> {{ date('d. m. Y.', strtotime($entry->deleted_at)) }} </td>
                   
                    <td class="col-md-1">  
 
                        <a href="{{ URL::route('TrashRestore', array('id' => $entry->id, 'trashed' => $trashed)) }}">
                            <button class="btn btn-success btn-xs"><i class="fa fa-undo"></i></button>
                        </a>
                      
                  
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    @endif


     @if($trashed == 'orders')
                  <tbody>
             @if (count($entries) > 0) 
                @foreach($entries as $entry)
                <tr>
                    <td>{{$entry->first_name}} {{$entry->last_name}}</td>
                    <td>{{$entry->orderprice}}</td>
                    <td> {{ date('d. m. Y.', strtotime($entry->deleted_at)) }} </td>
                   
                    <td class="col-md-1">  
 
                        <a href="{{ URL::route('TrashRestore', array('id' => $entry->id, 'trashed' => $trashed)) }}">
                            <button class="btn btn-success btn-xs"><i class="fa fa-undo"></i></button>
                        </a>
                      
                  
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    @endif
    </table>
</div>

@if (count($entries) > 0) 
    @foreach($entries as $entry)
    
    <div class="modal fade" id="delete-blog-id-{{ $entry->id }}" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pozor!</h4>
                </div>
                <div class="modal-body">
                @if($trashed != 'media')
                    <p>Želite li vratiti blog post: {{ $entry->title }}?</p>
                @endif
                </div>
                <div class="modal-footer">
                    <a href="{{ URL::route('TrashRestore', array('id' => $entry->id, 'trashed' => $trashed)) }}">
                        <button type="button" class="btn btn-default" data-ok="modal">U redu</button>
                    </a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif 

<div>{{$entries->links()}}</div>

    <script type="text/javascript">
    $(document).ready(function() {
        @if (count($entries) > 0) 
            @foreach($entries as $entry)
                $("#btn-delete-blog-id-{{ $entry->id }}").click(function() { 
                    $('#delete-blog-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 
       
    });
    </script>