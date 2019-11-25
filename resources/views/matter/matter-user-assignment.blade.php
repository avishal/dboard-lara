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
	    <li class="list-group-item"><a href="{{ route('new-client') }}">New Clients</a></li>

		<li class="list-group-item"><a href="{{ route('all-matters') }}">All Matter</a></li>
	    <li class="list-group-item"><a href="{{ route('all-clients') }}">All Clients</a></li>
	    <!-- <li class="list-group-item"></li> -->
	  </ul>
	</div>
</div>
<div class="col-sm-9">
	  <form method="post" action="{{ route('assign-matter-client') }}">
	  		@csrf
			<div class="form-group">
			    <label for="inputCaseNumber">Case Number/Year </label>
			    <select name="matter_id" id="inputCaseNumber" class="form-control" required="required">
			    	@foreach($matters as $key =>  $matter)
			    	<option value="{{ $key }}">{{ $matter }}</option>
			    	@endforeach
			    </select>
			    @if ($errors->has('matter_id'))
				    <small class="text-danger">{{ $errors->first('matter_id') }}</small>
				@endif
			    <!-- <small id="caseNumberHelp" class="form-text text-muted"></small> -->
			</div>
			

			<div class="form-group">
			    <label for="inputClientId">Client Name </label>
			    <select name="client_id[]" id="inputClientId" class="form-control client-select-multiple" required="required" multiple="true">
				@if(count($clients) > 0)
			    	@foreach($clients as $client)
			    	<option value="{{ $client->id }}">{{ $client->client_name }}</option>
			    	@endforeach
				@endif
			    </select>
			    @if ($errors->has('client_id'))
				    <small class="text-danger">{{ $errors->first('client_id') }}</small>
				@endif
			    <!-- <small id="caseNumberHelp" class="form-text text-muted"></small> -->
			</div>
			
			<input type="submit" name="new-matter-submit" value="Save" class="btn btn-primary">

	  </form>
  </div>
@endsection

@section("page-scripts")
<script type="text/javascript">
$(document).ready(function() {
    $('.client-select-multiple').select2();
});
</script>
@endsection