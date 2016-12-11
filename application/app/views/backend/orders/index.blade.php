 
 <ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li class="active"><a href="{{ URL::route('OrdersIndex') }}">Pregled svih narudžbi</a></li>
    
    <a href="{{ URL::route('OrdersCreate') }}" class="pull-right" style="margin-top: -5px;">
        <button class="btn btn-success btn-addon btn-sm">
            <i class="fa fa-plus"></i> Dodaj novu narudžbu
        </button>
    </a>
</ul>
        
<div class="panel-heading">
    <h4>Pregled svih narudžbi ({{$orderscount}})</h4>
</div>

<div class="panel-body table-responsive">

    <table class="table table-hover" id="entries-list">
        <thead>
            <tr>
               
                <th>Narudžba broj</th>
                <th>Klijent</th>
                <th>Adresa</th>
                <th>Datum narudžbe</th>
                <th>Proizvodi</th>
            </tr>
        </thead>
        <tbody>
        @if(count($orders) > 0)
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
                    <td> {{ $order['0']['entry']->address }}</td>
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
            @endif
        </tbody>
    </table>
</div>

     
@if (count($orders) > 0) 
    @foreach($orders as $order)

    <div class="modal fade" id="delete-blog-id-{{ $order['entry']['0']->order_id }}" role="dialog">
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
                    <a href="{{ URL::route('OrdersDestroy', array('id' => $order['entry']['0']->order_id)) }}">
                        <button type="button" class="btn btn-default" data-ok="modal">U redu</button>
                    </a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif 

<div>{{$entries['entries']->links()}}</div>

    <script type="text/javascript">
    $(document).ready(function() {
        @if (count($orders) > 0) 
            @foreach($orders as $order)
                $("#btn-delete-blog-id-{{ $order['entry']['0']->order_id }}").click(function() { 
                    $('#delete-blog-id-{{ $order['entry']['0']->order_id }}').modal('show');
                });
            @endforeach
        @endif 

    });
    </script>

