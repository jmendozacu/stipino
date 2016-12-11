 
<div class="panel-heading bg-white">
    <h4>Stipino - Dashboard</h4>
</div>

    <div style="margin-top:20px;">
    </div>
<div class="row">


            <div class="col-lg-2 col-xs-6">
                <!-- small box -->
                <a href="{{ URL::route('OrdersIndex') }}" class="small-box-footer">
                <div class="small-box bg-aqua">
                  <div class="inner">
                    <h3>{{ $orderscount }}</h3>
                    <p>Narudžbe</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-users"></i>
                  </div>
                 <div style="text-align: center;" class="small-box-footer"><i class="fa fa-eye"></i> </div>
                </div>
                </a>
              </div>

               <div class="col-lg-2 col-xs-6">
                <!-- small box -->
                <a href="{{ URL::route('MediaIndex') }}" class="small-box-footer">
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3>{{ $imagescount }}</h3>
                    <p>Slika</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-picture-o"></i>
                  </div>
                 <div style="text-align: center;" class="small-box-footer"><i class="fa fa-eye"></i> </div>
                </div>
                </a>
              </div>
 

               <div class="col-lg-2 col-xs-6">
                <!-- small box -->
                <a href="{{ URL::route('WidgetIndex') }}" class="small-box-footer">
                <div class="small-box bg-orange">
                  <div class="inner">
                    <h3>{{ $widgetcount }}</h3>
                    <p>Widgeta</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-cogs"></i>
                  </div>
                 <div style="text-align: center;" class="small-box-footer"><i class="fa fa-eye"></i> </div>
                </div>
                </a>
              </div>
              

            <div class="col-lg-2 col-xs-6">
                <!-- small box -->
                <a href="{{ URL::route('BlogIndex') }}" class="small-box-footer">
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3>{{ $blogcount }}</h3>
                    <p>Blog</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-rss"></i>
                  </div>
                 <div style="text-align: center;" class="small-box-footer"><i class="fa fa-eye"></i> </div>
                </div>
                </a>
              </div>

              <div class="col-lg-2 col-xs-6">
                <!-- small box -->
                <a href="{{ URL::route('WorkshopIndex') }}" class="small-box-footer">
                <div class="small-box bg-purple">
                  <div class="inner">
                    <h3>{{ $workshopcount }}</h3>
                    <p>Radionice</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-briefcase"></i>
                  </div>
                 <div style="text-align: center;" class="small-box-footer"><i class="fa fa-eye"></i> </div>
                </div>
                </a>
              </div>

              <div class="col-lg-2 col-xs-6">
                <!-- small box -->
                <a href="{{ URL::route('ProductsIndex') }}" class="small-box-footer">
                <div class="small-box bg-bluish">
                  <div class="inner">
                    <h3>{{ $productscount }}</h3>
                    <p>Proizvodi</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                 <div style="text-align: center;" class="small-box-footer"><i class="fa fa-eye"></i> </div>
                </div>
                </a>
              </div>

 
</div>

 <div style="margin-top:20px;">
    </div>

<div class="row">
    <div class="col-md-6">
        <header class="panel-heading"> Pregled zadnje dodanih narudžbi </header>
        <div class="panel-body table-responsive">
            <table class="table table-hover" id="blogpost-list">
                <thead>
                    <tr>
                        
                        <th>Broj računa</th>
                        <th>Klijent</th>
                        <th>Datum</th>
                        <th>Proizvod</th>
                        <th>Akcije</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($orders as $order)
                <tr>

                    <td> 
                    <a href="{{ URL::route('OrdersEdit', array('id' => $order['entry']['0']->order_id)) }}">
                    {{ $order['entry']['0']->order_id }}
                    </a>
                    </td>
                    <td> 
                    <a href="{{ URL::route('ClientsEdit', array('id' => $order['0']['entry']->id)) }}">
                    {{ $order['0']['entry']->first_name }}  {{ $order['0']['entry']->last_name }}
                    </a>
                    </td>
                    <td> {{ date('d.m.Y', strtotime($order['1']['entry']->order_date))}}</td>
                    <td>
                    @foreach($order['entry'] as $second_array)
                  <div class="row"><div class="col-md-12">
                   <a href="{{ URL::route('ProductsEdit', array('id' => $second_array->product_id)) }}">{{ $second_array->title }}</a> <span style="color:violet;"> {{ $second_array->producttitle }}</span>
                   </div></div>
                    @endforeach
                    </td>
                    <td class="col-md-1">  
 
                        <a href="{{ URL::route('OrdersEdit', array('id' => $order['entry']['0']->order_id)) }}">
                            <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                        </a>
                        <button type="button" id="btn-delete-blog-id-{{ $order['entry']['0']->order_id }}" class="btn btn-danger btn-xs" data-target="#delete-blog-id-{{ $order['entry']['0']->order_id }}"><i class="fa fa-times"></i>
                        </button>
                    </td>
                </tr>
            
            @endforeach
                </tbody>
            </table>
        </div>
     
@if (count($entries) > 0) 
    @foreach($entries as $entry)
    <!-- Modal {{ $entry->id }}-->
    <div class="modal fade" id="delete-blog-id-{{ $entry->id }}" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pozor!</h4>
                </div>
                <div class="modal-body">
                    <p>Želite li obrisati narudžbu: ?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ URL::route('OrdersDestroy', array('id' => $entry->id)) }}">
                        <button type="button" class="btn btn-default" data-ok="modal">U redu</button>
                    </a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif 
    </div>
    <div class="col-md-6">
        <header class="panel-heading"> Pregled zadnje dodanih stranica </header>
        <div class="panel-body table-responsive">
            <table class="table table-hover" id="pages-list">
                <thead>
                    <tr>
                        
                        <th>Naslov</th>
                        <th>Datum</th>
                        <th>Akcije</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($pages) > 0) 
                    @foreach($pages as $entry)
                    <tr>
                        
                        <td>{{ $entry->title }}</td>
                        <td> {{ date('d. m. Y.', strtotime($entry->created_at)) }} </td>
                        <td class="col-md-1">
                            <a href="{{ URL::route('PagesEdit', array('id' => $entry->id)) }}">
                                <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> </button>
                            </a>
                            <button type="button" id="btn-delete-page-id-{{ $entry->id }}" class="btn btn-danger btn-xs" data-target="#delete-page-id-{{ $entry->id }}"><i class="fa fa-times"></i> </button>
                        </td>
                    </tr>
                    @endforeach 
                    @endif
                </tbody>
            </table>
        </div>
        @if (count($pages) > 0) 
        @foreach($pages as $entry)
        <!-- Modal {{ $entry->id }}-->
        <div class="modal fade" id="delete-page-id-{{ $entry->id }}" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Pozor!</h4> </div>
                    <div class="modal-body">
                        <p>Želite li obrisati stranicu: {{ $entry->title }}?</p>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ URL::route('PagesDestroy', array('id' => $entry->id)) }}">
                            <button type="button" class="btn btn-default" data-ok="modal">U redu</button>
                        </a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach 
        @endif
    </div>
</div>

    <div style="margin-top:20px;">
    </div>

<!--sada dodano-->
    <div class="row">
    <div class="col-md-6">
        <header class="panel-heading"> Pregled zadnje dodanih radionica </header>
        <div class="panel-body table-responsive">
            <table class="table table-hover" id="blogpost-list">
                <thead>
                    <tr>
                        
                        <th>Naslov</th>
                        <th>Datum radionice</th>
                        <th>Slika</th>
                        <th>Kratki sadržaj</th>
                        <th>Akcije</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($workshops) > 0) 
                    @foreach($workshops as $entry)
                    <tr>
                        
                        <td>{{ $entry->title }}</td>
                        <td> {{ date('d. m. Y.', strtotime($entry->created_at)) }} </td>
                        <td> @if ($entry->image != '' || $entry->image != null) <img src="{{ url('/') }}/uploads/frontend/workshops/thumbs/{{ $entry->image }}" class="img-responsive" style="width:50px;" /> @endif </td>
                        <td>{{ $entry->intro }}</td>
                        <td class="col-md-1">
                            <a href="{{ URL::route('WorkshopEdit', array('id' => $entry->id)) }}">
                                <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> </button>
                            </a>
                            <button type="button" id="btn-delete-workshop-id-{{ $entry->id }}" class="btn btn-danger btn-xs" data-target="#delete-workshop-id-{{ $entry->id }}"><i class="fa fa-times"></i> </button>
                        </td>
                    </tr>
                    @endforeach 
                    @endif
                </tbody>
            </table>
        </div>
        @if (count($workshops) > 0) 
        @foreach($workshops as $entry)
        <!-- Modal {{ $entry->id }}-->
        <div class="modal fade" id="delete-workshop-id-{{ $entry->id }}" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Pozor!</h4> </div>
                    <div class="modal-body">
                        <p>Želite li obrisati radionicu : {{ $entry->title }}?</p>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ URL::route('WorkshopDestroy', array('id' => $entry->id)) }}">
                            <button type="button" class="btn btn-default" data-ok="modal">U redu</button>
                        </a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach 
        @endif
    </div>

    <!--proizvodi-->
    <div class="col-md-6">
        <header class="panel-heading"> Pregled zadnje dodanih proizvoda </header>
        <div class="panel-body table-responsive">
            <table class="table table-hover" id="pages-list">
                <thead>
                    <tr>
                        
                        <th>Proizvod</th>
                        <th>Slika</th>
                        <th>Pakiranje</th>
                        <th>Opis</th>
                        <th>Akcije</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($products) > 0) 
                    @foreach($products as $entry)
                    <tr>
                        
                        <td>{{ $entry->title }}</td>
                        <td> @if ($entry->image != '' || $entry->image != null) <img src="{{ url('/') }}/uploads/frontend/products/thumbs/{{ $entry->image }}" class="img-responsive" style="width:50px;" /> @endif </td>
                        <td>{{ $entry->joinproduct_weight }} {{ $entry->measure_unit }}</td>
                        <td>{{ $entry->description }}</td>
                        <td class="col-md-1">
                            <a href="{{ URL::route('ProductsEdit', array('id' => $entry->id)) }}">
                                <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> </button>
                            </a>
                            <button type="button" id="btn-delete-products-id-{{ $entry->id }}" class="btn btn-danger btn-xs" data-target="#delete-products-id-{{ $entry->id }}"><i class="fa fa-times"></i> </button>
                        </td>
                    </tr>
                    @endforeach 
                    @endif
                </tbody>
            </table>
        </div>
        @if (count($products) > 0) 
        @foreach($products as $entry)
        <!-- Modal {{ $entry->id }}-->
        <div class="modal fade" id="delete-products-id-{{ $entry->id }}" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Pozor!</h4> </div>
                    <div class="modal-body">
                        <p>Želite li obrisati ovaj proizvod: {{ $entry->title }}?</p>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ URL::route('ProductsDestroy', array('id' => $entry->id)) }}">
                            <button type="button" class="btn btn-default" data-ok="modal">U redu</button>
                        </a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach 
        @endif
    </div>
</div>

    <div style="margin-top:20px;">
    </div>

<div class="row">
   <div class="col-md-6">
        <header class="panel-heading"> Pregled zadnje dodanih blog postova </header>
        <div class="panel-body table-responsive">
            <table class="table table-hover" id="blogpost-list">
                <thead>
                    <tr>
                        
                        <th>Naslov</th>
                        <th>Datum</th>
                        <th>Istaknuta slika</th>
                        <th>Kratki sadržaj</th>
                        <th>Akcije</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($blogposts) > 0) 
                    @foreach($blogposts as $entry)
                    <tr>
                        
                        <td>{{ $entry->title }}</td>
                        <td> {{ date('d. m. Y.', strtotime($entry->created_at)) }} </td>
                        <td> @if ($entry->image != '' || $entry->image != null) <img src="{{ url('/') }}/uploads/frontend/blog/thumbs/{{ $entry->image }}" class="img-responsive" style="width:50px;" /> @endif </td>
                        <td>{{ $entry->intro }}</td>
                        <td class="col-md-1">
                            <a href="{{ URL::route('BlogEdit', array('id' => $entry->id)) }}">
                                <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> </button>
                            </a>
                            <button type="button" id="btn-delete-blogposts-id-{{ $entry->id }}" class="btn btn-danger btn-xs" data-target="#delete-blogposts-id-{{ $entry->id }}"><i class="fa fa-times"></i> </button>
                        </td>
                    </tr>
                    @endforeach 
                    @endif
                </tbody>
            </table>
        </div>
        @if (count($blogposts) > 0) 
        @foreach($blogposts as $entry)
        <!-- Modal {{ $entry->id }}-->
        <div class="modal fade" id="delete-blogposts-id-{{ $entry->id }}" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Pozor!</h4> </div>
                    <div class="modal-body">
                        <p>Želite li obrisati blog post: {{ $entry->title }}?</p>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ URL::route('BlogDestroy', array('id' => $entry->id)) }}">
                            <button type="button" class="btn btn-default" data-ok="modal">U redu</button>
                        </a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach 
        @endif
    </div>
   
    <div class="col-md-6">
        <header class="panel-heading"> Pregled zadnje dodanih widgeta </header>
        <div class="panel-body table-responsive">
            <table class="table table-hover" id="pages-list">
                <thead>
                    <tr>
                     
                        <th>Naslov</th>
                        <th>Datum</th>
                        <th>Akcije</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($widgets) > 0) 
                    @foreach($widgets as $entry)
                    <tr>
                      
                        <td>{{ $entry->title }}</td>
                        <td> {{ date('d. m. Y.', strtotime($entry->created_at)) }} </td>
                        <td class="col-md-1">
                            <a href="{{ URL::route('WidgetEdit', array('id' => $entry->id)) }}">
                                <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> </button>
                            </a>
                            <button type="button" id="btn-delete-widget-id-{{ $entry->id }}" class="btn btn-danger btn-xs" data-target="#delete-widget-id-{{ $entry->id }}"><i class="fa fa-times"></i> </button>
                        </td>
                    </tr>
                    @endforeach 
                    @endif
                </tbody>
            </table>
        </div>
        @if (count($widgets) > 0) 
        @foreach($widgets as $entry)
        <!-- Modal {{ $entry->id }}-->
        <div class="modal fade" id="delete-widget-id-{{ $entry->id }}" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Pozor!</h4> </div>
                    <div class="modal-body">
                        <p>Želite li obrisati widget: {{ $entry->title }}?</p>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ URL::route('WidgetDestroy', array('id' => $entry->id)) }}">
                            <button type="button" class="btn btn-default" data-ok="modal">U redu</button>
                        </a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach 
        @endif
    </div> 
</div>


<div class="row">
  <div class="col-md-6">
        <header class="panel-heading"> Posljednjih 8 unešenih slika </header>
        <div class="panel-body">
            @if(count($images) > 0) 
            @foreach($images as $entry)
            <div class="col-md-3 border-images">
                
                @if($entry->image != '' || $entry->image != null) <a href="{{ URL::route('MediaEdit', array('id' => $entry->id)) }}"><img src="{{ url('/') }}/uploads/backend/media/thumbs/{{ $entry->image }}" class="img-responsive" /></a> 
                @endif
                <button type="button" id="btn-delete-image-id-{{ $entry->id }}" class="btn-position btn btn-danger" data-target="#delete-image-id-{{ $entry->id }}"><i class="fa fa-times"></i> </button> 
            </div>
            @endforeach 
            @endif
        </div>
            @if(count($images) > 0) 
            @foreach($images as $entry)
            <!-- Modal {{ $entry->id }}-->
            <div class="modal fade" id="delete-image-id-{{ $entry->id }}" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Pozor!</h4> </div>
                        <div class="modal-body">
                            <p>Želite li obrisati sliku: {{ $entry->image }}?</p>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ URL::route('MediaDestroy', array('id' => $entry->id)) }}">
                                <button type="button" class="btn btn-default" data-ok="modal">U redu</button>
                            </a>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach 
            @endif
    </div>
   
  
        </div>
        @if (count($widgets) > 0) 
        @foreach($widgets as $entry)
        <!-- Modal {{ $entry->id }}-->
        <div class="modal fade" id="delete-widget-id-{{ $entry->id }}" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Pozor!</h4> </div>
                    <div class="modal-body">
                        <p>Želite li obrisati widget: {{ $entry->title }}?</p>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ URL::route('WidgetDestroy', array('id' => $entry->id)) }}">
                            <button type="button" class="btn btn-default" data-ok="modal">U redu</button>
                        </a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach 
        @endif
    </div> 
</div>

 
<script type="text/javascript">
    $(document).ready(function() {
        @if(count($orders) > 0)
        @foreach($orders as $order)
        $("#btn-delete-blog-id-{{ $order['0']['entry']->id }}").click(function() {
            $('#delete-blog-id-{{ $order['0']['entry']->id }}').modal('show');
        });
        @endforeach
        @endif
         
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        @if(count($workshops) > 0)
        @foreach($workshops as $entry)
        $("#btn-delete-workshop-id-{{ $entry->id }}").click(function() {
            $('#delete-workshop-id-{{ $entry->id }}').modal('show');
        });
        @endforeach
        @endif
         
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        @if(count($products) > 0)
        @foreach($products as $entry)
        $("#btn-delete-products-id-{{ $entry->id }}").click(function() {
            $('#delete-products-id-{{ $entry->id }}').modal('show');
        });
        @endforeach
        @endif
         
    });
</script>
 

<script type="text/javascript">
    $(document).ready(function() {
        @if(count($blogposts) > 0)
        @foreach($blogposts as $entry)
        $("#btn-delete-blogposts-id-{{ $entry->id }}").click(function() {
            $('#delete-blogposts-id-{{ $entry->id }}').modal('show');
        });
        @endforeach
        @endif
         
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        @if(count($images) > 0)
        @foreach($images as $entry)
        $("#btn-delete-image-id-{{ $entry->id }}").click(function() {
            $('#delete-image-id-{{ $entry->id }}').modal('show');
        });
        @endforeach
        @endif
        
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        @if(count($widgets) > 0)
        @foreach($widgets as $entry)
        $("#btn-delete-widget-id-{{ $entry->id }}").click(function() {
            $('#delete-widget-id-{{ $entry->id }}').modal('show');
        });
        @endforeach
        @endif
        
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        @if(count($pages) > 0)
        @foreach($pages as $entry)
        $("#btn-delete-page-id-{{ $entry->id }}").click(function() {
            $('#delete-page-id-{{ $entry->id }}').modal('show');
        });
        @endforeach
        @endif
        
    });
</script>