@extends('dboard.main')
@section('page-content')

    <h1 class="mt-5">Sticky footer with fixed navbar</h1>
    <p class="lead">Pin a footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar has been added with <code>padding-top: 60px;</code> on the <code>main &gt; .container</code>.</p>
    <p>Back to <a href="/docs/4.3/examples/sticky-footer/">the default sticky footer</a> minus the navbar.</p>

<div class="row">
  <div class="col-sm-3 pr-2">
    <div class="card">
	  <ul class="list-group list-group-flush">
		<li class="list-group-item"><a href="{{ route('new-matter') }}">New Matter</a></li>
	    <li class="list-group-item"><a href="{{ route('all-clients') }}">All Clients</a></li>
	    <!-- <li class="list-group-item"></li> -->
	  </ul>
	</div>
</div>
<div class="col-sm-9">
	<div class="card">
	  <!-- <div class="card-header">
	    Featured
	  </div> -->
	  <!-- <div class="card-body"> -->
	    <table class="table">
	    	<thead>
	    		<th>#</th>
	    		<th>Name</th>
	    		<th>Case Number/Year</th>
	    		<th>Actions</th>
	    	</thead>
	    	<tbody>
	    		<?php $i = 1;?>
	    		@foreach($matters as $matter)
	    			<tr>
	    				<td>{{ $i++ }}</td>
	    				@if($matter->clients()->first() != null)
	    				<td><a href="{{ route('all-clients') }}">{{$matter->clients()->first()->client_name}}</a></td>
	    				@else
	    				<td><a href="{{ route('assign-client') }}">Assign Client(s)</a></td>
	    				@endif
	    				<td><a href="{{ route('matter-clients', $matter->id) }}">{{ $matter->case_number }} / {{ $matter->year }}</a></td>
	    				<td>Edit | Delete</td>
	    			</tr>
	    		@endforeach
	    	</tbody>
	    </table>
	  <!-- </div> -->
	</div>
  </div>
@endsection
