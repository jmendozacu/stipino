 
 <ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li class="active"><a href="{{ URL::route('PagesIndex') }}">Pregled svih stranica</a></li>
    
    <a href="{{ URL::route('PagesCreate') }}" class="pull-right" style="margin-top: -5px;">
        <button class="btn btn-success btn-addon btn-sm">
            <i class="fa fa-plus"></i> Dodaj novu stranicu
        </button>
    </a>
</ul>
        
<div class="panel-heading">
    <h4>Tablica objavljenih stranica ({{$pagescount}})</h4>
</div>

<div class="panel-body table-responsive">

    <table class="table table-hover" id="entries-list">
        <thead>
            <tr>
                
                <th>Naziv</th>
                <th>Stalni link</th>
               
                <th>Objavljeno?</th>
            </tr>
        </thead>
        <tbody>
             @if (count($entries) > 0) 
                @foreach($entries as $entry)
                <tr>
                   
                    <td><a href="{{ URL::route('PagesEdit', array('id' => $entry->id)) }}">{{ $entry->title }}</a></td>
                    <td>{{ $entry->permalink }}</td>
                   
                    <td>
                    @if ($entry->published == '1')
                        Objavljeno
                    @else
                        Neobjavljeno
                    @endif
                    </td>
                    <td class="col-md-1">
 
                        <a href="{{ URL::route('PagesEdit', array('id' => $entry->id)) }}">
                            <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                        </a>
                        <button type="button" id="btn-delete-dentist-id-{{ $entry->id }}" class="btn btn-danger btn-xs" data-target="#delete-dentist-id-{{ $entry->id }}"><i class="fa fa-times"></i>
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
    <div class="modal fade" id="delete-dentist-id-{{ $entry->id }}" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pozor!</h4>
                </div>
                <div class="modal-body">
                    <p>Želite li obrisati upit: {{ $entry->title }}?</p>
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


    <script type="text/javascript">
    $(document).ready(function() {
        @if (count($entries) > 0) 
            @foreach($entries as $entry)
                $("#btn-delete-dentist-id-{{ $entry->id }}").click(function() { 
                    $('#delete-dentist-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 
       
    });
    </script>
    <script>
     $('#entries-list').DataTable({
            "language": {
                "url": "http://cdn.datatables.net/plug-ins/1.10.11/i18n/Croatian.json"
            }
        });
    </script>