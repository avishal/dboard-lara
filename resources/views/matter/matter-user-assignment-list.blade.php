@extends('dboard.main')
@section('page-content')

<h3>Case Details</h3>
<div class="row">
    <div class="col-sm-3 p-2">
        Case Number
    </div>
    <div class="col-sm-3 p-2">
        {{ $matter->case_number}} /{{ $matter->year }}
    </div>
    <div class="col-sm-3 p-2">
        Bench
    </div>
    <div class="col-sm-3 p-2">
        {{ $matter->bench()->first()->name }}
    </div>

    <div class="col-sm-3 p-2">
        Case Side
    </div>
    <div class="col-sm-3 p-2">
        {{ $matter->case_side()->first()->name }}
    </div>
    <div class="col-sm-3 p-2">
        Case Type
    </div>
    <div class="col-sm-3 p-2">
        {{ $matter->case_type()->first()->name }}
    </div>
    <div class="col-sm-3 p-2">
        Stamp / Register
    </div>
    <div class="col-sm-3 p-2">
        {{ $matter->stamp_register()->first()->name }}
    </div>
</div>

<div class="row">
  <div class="col-sm-3 pr-2">
    <div class="card">
	  <ul class="list-group list-group-flush">
	    <li class="list-group-item"><a href="{{ route('new-matter') }}">New Matter</a></li>
	    <li class="list-group-item"><a href="{{ route('all-matters') }}">All Matters</a></li>
	    <li class="list-group-item"><a href="{{ route('all-clients') }}">All Clients</a></li>
	    <li class="list-group-item"><a href="{{ route('assign-client') }}">Assign Clients</a></li>
	    <li class="list-group-item"><a href="{{ route('matter-add-date') }}">Add Next Date</a></li>
	    <!-- <li class="list-group-item"></li> -->
	  </ul>
	</div>
</div>
<div class="col-sm-9">
    <div>
        <div class="card">
        <div class="card-header">
	    Clients
	    </div>
        <ul class="list-group list-group-flush">
            <?php $clients =  $matter->clients()->get(); ?>
            @if(count($clients) > 0)
                @foreach($clients as $client)
                <li class="list-group-item">
                <a href="{{ route('new-matter') }}">{{$client->client_name}}</a>
                <!--<span><form method="post" action="{{ route('deassign-matter-client')}}">
                @csrf
                <input type="hidden" name="matter_id" value="{{ $matter->id }}"/>
                <input type="hidden" name="client_id" value="{{ $client->id }}"/>
                <button type="submit" class="btn btn-danger float-right">X</button></li>
                </form></span>-->
                <button type="button" class="btn btn-link float-right deleteclient" data-hid_matter_id="{{ $matter->id }}" data-hid_client_id="{{ $client->id }}">X</button></li>
                @endforeach
            @else 
            <li class="list-group-item">No clients assigned</li>
            @endif
        </ul>
        </div>
    </div>

    <div class="pt-2">
        <div class="card">
        
        <?php 
        $dates = $matter->case_dates()->get();
        ?>
        @if( count($dates) > 0 )
            @foreach($dates as $date)
            <div class="card-header">
            Case Dates: {{ $date->next_date->format('d/m/Y') }} 
            <span class="float-right"><a  href="{{ route('matter-edit-date', [$date->id]) }}">Edit</a> | <button type="button" class="btn btn-link deletecasedate" data-hid_case_date_id="{{ $date->id }}">Delete</button></span>
            </div>
            <ul class="list-group list-group-flush">
            <li class="list-group-item">Description: {{ $date->description }}</li>
            <li class="list-group-item">S.R. No: {{ $date->srno }}</li>
            <li class="list-group-item">C.R. No: {{ $date->crno }}</li>
            <li class="list-group-item">Remark: {{ $date->remark }}</li>
            </ul>
            @endforeach
        @else
        <div class="card-header">
            Case Dates
            </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">No dates</li>
        </ul>
        @endif
            
        
        </div>
    </div>

</div>
@endsection

@section("page-scripts")
<script type="text/javascript">
$(document).ready(function() {
    $('.deleteclient').on('click', function(){

        $("#hid_matter_id").val($(this).data('hid_matter_id'));
        $("#hid_client_id").val($(this).data('hid_client_id'));
        $("#myModal").modal('show');
    })

    $('.deletecasedate').on('click', function(){

        $("#hid_case_date_id").val($(this).data('hid_case_date_id'));
        $("#casedatedelete").modal('show');
    })
    $('#casedatedelete').on('shown.bs.modal', function () {
        $('#deleteCancel').trigger('focus')
    })
    $('#myModal').on('shown.bs.modal', function () {
        $('#deleteCancel').trigger('focus')
    })

    $('.client-select-multiple').select2();
});
</script>
@endsection

@section("page-footer")
<div class="modal" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete client.</p>
      </div>
      <div class="modal-footer">
      <form method="post" action="{{ route('deassign-matter-client')}}">
        @csrf
        <input type="hidden" name="matter_id" id="hid_matter_id"/>
        <input type="hidden" name="client_id" id="hid_client_id"/>
        <button id="deleteCancel" type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button id="deleteConfirm" type="submit" class="btn btn-primary">Yes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="casedatedelete" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete date.</p>
      </div>
      <div class="modal-footer">
      <form method="post" action="{{ route('matter-delete-date')}}">
        @csrf
        <input type="hidden" name="id" id="hid_case_date_id"/>
        <button id="deleteCancel" type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button id="deleteConfirm" type="submit" class="btn btn-primary">Yes</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection