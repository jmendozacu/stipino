 
 <ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li class="active"><a href="{{ URL::route('ProductsWeightIndex') }}">Pregled svih paketa</a></li>
    
    <a href="{{ URL::route('ProductsWeightCreate') }}" class="pull-right" style="margin-top: -5px;">
        <button class="btn btn-success btn-addon btn-sm">
            <i class="fa fa-plus"></i> Dodaj novi paket
        </button>
    </a>
</ul>
        
<div class="panel-heading">
    <h4>Pregled svih paketa ({{$productsweightcount}})</h4>
</div>

<div class="panel-body table-responsive">

    <table class="table table-hover" id="entries-list">
        <thead>
            <tr>
                <th>Naziv paketa</th>
                <th>Količina</th>
                <th>Mjerna jedinica</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
             @if (count($entries) > 0) 
                @foreach($entries as $entry)
                <tr>
                  
                    <td><a href="{{ URL::route('ProductsWeightEdit', array('id' => $entry->id)) }}">{{ $entry->title }}</a></td>
                    <td>{{ $entry->product_weight }}</td>
                    <td>{{ $entry->measure_unit }}</td>
                    <td class="col-md-1">  
                        <a href="{{ URL::route('ProductsWeightEdit', array('id' => $entry->id)) }}">
                            <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                        </a>
                        <button type="button" id="btn-delete-blog-id-{{ $entry->id }}" class="btn btn-danger btn-xs" data-target="#delete-blog-id-{{ $entry->id }}"><i class="fa fa-times"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            @endif
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
                    <p>Želite li obrisati blog post: {{ $entry->title }}?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ URL::route('ProductsWeightDestroy', array('id' => $entry->id)) }}">
                        <button type="button" class="btn btn-default" data-ok="modal">U redu</button>
                    </a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif 


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

   <script type="text/javascript">
            $('#entries-list').DataTable( 
        {
            "language": {
                "url": "http://cdn.datatables.net/plug-ins/1.10.11/i18n/Croatian.json"
            }
        });
    </script>