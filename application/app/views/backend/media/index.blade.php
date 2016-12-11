 
 <ul class="breadcrumb">
    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
    <li class="active"><a href="{{ URL::route('BlogIndex') }}">Pregled svih slika</a></li>
    
    <a href="{{ URL::route('MediaCreate') }}" class="pull-right" style="margin-top: -5px;">
        <button class="btn btn-success btn-addon btn-sm">
            <i class="fa fa-plus"></i> Dodaj novu sliku
        </button>
    </a>
</ul>
        
<div class="panel-heading">
    <h4>Pregled svih slika ({{$mediacount}})</h4>
</div>

<div class="panel-body table-responsive">
             @if (count($entries) > 0) 
                @foreach($entries as $entry)
                    <div class="col-md-3 border-images">
                        </button>
                        @if ($entry->image != '' || $entry->image != null)
                            <a href="{{ URL::route('MediaEdit', array('id' => $entry->id)) }}"><img src="{{ url('/') }}/uploads/backend/media/thumbs/{{ $entry->image }}" class="img-responsive" /></a>
                        @endif 
                         <button type="button" id="btn-delete-media-id-{{ $entry->id }}" class="btn-position btn btn-danger" data-target="#delete-media-id-{{ $entry->id }}"><i class="fa fa-times"></i>
                    </div>
                    
                @endforeach
            @endif
</div>



@if (count($entries) > 0) 
    @foreach($entries as $entry)
    <!-- Modal {{ $entry->id }}-->
    <div class="modal fade" id="delete-media-id-{{ $entry->id }}" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pozor!</h4>
                </div>
                <div class="modal-body">
                    <p>Želite li obrisati media post: {{ $entry->id }}?</p>
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

 <div>{{$entries->links()}}</div>


    <script type="text/javascript">
    $(document).ready(function() {
        @if (count($entries) > 0) 
            @foreach($entries as $entry)
                $("#btn-delete-media-id-{{ $entry->id }}").click(function() { 
                    $('#delete-media-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 
    
    });
    </script>