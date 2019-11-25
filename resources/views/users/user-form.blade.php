@extends('dboard.main')

@section('page-content')


<h1 class="mt-5">Sticky footer with fixed navbar</h1>
    <p class="lead">Pin a footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar has been added with <code>padding-top: 60px;</code> on the <code>main &gt; .container</code>.</p>
    <p>Back to <a href="/docs/4.3/examples/sticky-footer/">the default sticky footer</a> minus the navbar.</p>

<div class="row">
  <div class="col-sm-3 pr-2">
    <div class="card">
	  <ul class="list-group list-group-flush">
	    <li class="list-group-item">Cras justo odio</li>
	    <li class="list-group-item">Dapibus ac facilisis in</li>
	    <li class="list-group-item">Vestibulum at eros</li>
	  </ul>
	</div>
</div>
<div class="col-sm-9">
	<div class="card">
	  <div class="card-header">
	    Featured
	  </div>
	  <?php //dd($errors);?>
		@if (false && $errors->any())
		    {{ implode('', $errors->all('<div>:message</div>')) }}
		@endif
	  <div class="card-body">
	    <form method="post" action="{{route('new-client')}}">
			@csrf
			<div class="form-group">
			    <label for="inputCaseNumber">Client Name </label>
			    <input type="text" name="case_number" id="inputCaseNumber" aria-describedby="caseNumberHelp" class="form-control" required="required" placeholder="Case Number" value="{{ old('case_number') }}">
			    @if ($errors->has('case_number'))
				    <small class="text-danger">{{ $errors->first('case_number') }}</small>
				@endif
			    <!-- <small id="caseNumberHelp" class="form-text text-muted"></small> -->
			</div>
			
			<input type="submit" name="new-matter-submit" value="Save" class="btn btn-primary">
		</form>
	  </div>
	</div>
  </div>
@endsection

