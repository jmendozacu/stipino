 
 <ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li class="active"><a href="{{ URL::route('WorkshopIndex') }}">Pregled svih radionica</a></li>
    
    <a href="{{ URL::route('WorkshopCreate') }}" class="pull-right" style="margin-top: -5px;">
        <button class="btn btn-success btn-addon btn-sm">
            <i class="fa fa-plus"></i> Dodaj novu radionicu
        </button>
    </a>
</ul>
        
<div class="panel-heading">
    <h4>Pregled svih objava ({{$workshopcount}})</h4>
</div>

<div class="panel-body table-responsive">

    <table class="table table-hover" id="entries-list">
        <thead>
            <tr>
               
                <th>Naslov</th>
                <th>Poveznica</th>
                <th>Kratki opis</th>
                <th>Sadržaj</th>
                <th>Slika</th>
                <th>Datum radionice</th>
                <th>Objavljeno</th>
            </tr>
        </thead>
        <tbody>
             @if (count($entries['entries']) > 0) 
                @foreach($entries['entries'] as $entry)
                <tr>
                  
                    <td>{{ $entry->title }}</td>
                    <td> {{ $entry->permalink }} </td>
                    <td> {{ $entry->intro }} </td>
                    <td>{{ $entry->content }}</td>
                    <td><div style="width:75px; height: 75px;">{{ HTML::image(URL::to('/') . '/uploads/frontend/workshops/thumbs/' . $entry->image, $entry->permalink) }}<div></td>
                    <td>{{ $entry->workshop_date }}</td>
                    <td>
                    @if ($entry->published == '1')
                        Objavljeno
                    @else
                        Neobjavljeno
                    @endif
                   </td>
                    <td class="col-md-1">  
 
                        <a href="{{ URL::route('WorkshopEdit', array('id' => $entry->id)) }}">
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

@if (count($entries['entries']) > 0) 
    @foreach($entries['entries'] as $entry)
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
                    <p>Želite li obrisati radionicu: {{ $entry->title }}?</p>
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

<div>{{$entries['entries']->links()}}</div>
    <script type="text/javascript">
    $(document).ready(function() {
        @if (count($entries['entries']) > 0) 
            @foreach($entries['entries'] as $entry)
                $("#btn-delete-blog-id-{{ $entry->id }}").click(function() { 
                    $('#delete-blog-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 

    });
    </script>
