 
 <ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li class="active"><a href="{{ URL::route('ClientsIndex') }}">Pregled svih klijenata</a></li>
    
    <a href="{{ URL::route('ClientsCreate') }}" class="pull-right" style="margin-top: -5px;">
        <button class="btn btn-success btn-addon btn-sm">
            <i class="fa fa-plus"></i> Dodaj novog klijenta
        </button>
    </a>
</ul>
        
<div class="panel-heading">
    <h4>Pregled svih klijenata ({{$clientcount}})</h4>
</div>

<div class="panel-body table-responsive">

    <table class="table table-hover" id="entries-list">
        <thead>
            <tr>
               
                <th>Naziv klijenta</th>
                <th>Adresa</th>
                <th>E-mail adresa</th>
                <th>Kvart</th>
                <th>Kontakt telefon</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
             @if (count($paginate) > 0) 
                @foreach($paginate as $entry)
                <tr>
                  
                    <td><a href="{{ URL::route('ClientsEdit', array('id' => $entry->id)) }}">{{ $entry->first_name }} {{ $entry->last_name }} </a></td>
                    <td>{{ $entry->address }}</td>
                    <td>{{ $entry->email }}</td>
                    <td>{{ $entry->area }}</td>
                    <td>{{ $entry->phone }}</td>
                    <td class="col-md-1">  
 
                        <a href="{{ URL::route('ClientsEdit', array('id' => $entry->id)) }}">
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

@if (count($paginate) > 0 ) 
    @foreach($paginate as $entry)
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
                    <p>Želite li obrisati blog post: {{ $entry->first_name }} {{ $entry->last_name }} ?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ URL::route('ClientsDestroy', array('id' => $entry->id)) }}">
                        <button type="button" class="btn btn-default" data-ok="modal">U redu</button>
                    </a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif 

<div>{{$paginate->links()}}</div>


    
    <script type="text/javascript">
    $(document).ready(function() {
        @if (count($paginate) > 0) 
            @foreach($paginate as $entry)
                $("#btn-delete-blog-id-{{ $entry->id }}").click(function() { 
                    $('#delete-blog-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 
    });
        
       
    </script>