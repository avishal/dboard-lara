@extends('dboard.main')

@section('page-content')


<h1 class="mt-5">Sticky footer with fixed navbar</h1>
    <p class="lead">Pin a footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar has been added with <code>padding-top: 60px;</code> on the <code>main &gt; .container</code>.</p>
    <p>Back to <a href="/docs/4.3/examples/sticky-footer/">the default sticky footer</a> minus the navbar.</p>

<div class="row">
  <div class="col-sm-3 pr-2">
    <div class="card">
	  <ul class="list-group list-group-flush">
	    <li class="list-group-item"><a href="{{ route('all-matters') }}">All Matters</a></li>
	    <li class="list-group-item"><a href="{{ route('all-clients') }}">All Clients</a></li>
	    <li class="list-group-item"><a href="{{ route('new-client') }}">New Client</a></li>
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
	    <form method="post" action="{{route('new-matter')}}">
			@csrf
			<div class="form-group">
			    <label for="inputCaseNumber">Case Number</label>
			    <input type="text" name="case_number" id="inputCaseNumber" aria-describedby="caseNumberHelp" class="form-control" required="required" placeholder="Case Number" value="{{ old('case_number') }}">
			    @if ($errors->has('case_number'))
				    <small class="text-danger">{{ $errors->first('case_number') }}</small>
				@endif
			    <!-- <small id="caseNumberHelp" class="form-text text-muted"></small> -->
			</div>
			
			<div class="form-group">
			    <label for="inputCaseNumber">Year</label>
				<select name="year" class="form-control" required="required">
					<option @if(old('case_year') == '2020') {{"selected"}}@endif )>2020</option>
					<option @if(old('case_year') == '2019') {{"selected"}}@endif )>2019</option>
					<option @if(old('case_year') == '2018') {{"selected"}}@endif )>2018</option>
					<option @if(old('case_year') == '2017') {{"selected"}}@endif )>2017</option>
				</select>
				@if ($errors->has('year'))
				    <small class="text-danger">{{ $errors->first('year') }}</small>
				@endif
			</div>
			<div class="form-group">
			    <label for="inputCaseNumber">Year</label>
				<select name="bench_id" class="form-control" required="required">
					<option value="1">Bombay</option>
				</select>
				@if ($errors->has('bench_id'))
				    <small class="text-danger">{{ $errors->first('bench_id') }}</small>
				@endif
			</div>

			<div class="form-group">
			    <label for="inputCaseNumber">Year</label>
				<select name="case_side_id" class="form-control" required="required">
					<option value="1">Civil</option>
				</select>
				@if ($errors->has('case_side_id'))
				    <small class="text-danger">{{ $errors->first('case_side_id') }}</small>
				@endif
			</div>

			<div class="form-group">
			    <label for="inputCaseNumber">Year</label>
				<select name="case_type_id" class="form-control" required="required">
					<option value="1">Civil Writ Petition</option>
				</select>
				@if ($errors->has('case_type_id'))
				    <small class="text-danger">{{ $errors->first('case_type_id') }}</small>
				@endif
			</div>


			<div class="form-group">
			    <label for="inputCaseNumber">Year</label>
				<select name="stamp_register_id" class="form-control" required="required">
					<option value="1">Stamp</option>
					<option value="2">Register</option>
				</select>
				@if ($errors->has('stamp_register_id'))
				    <small class="text-danger">{{ $errors->first('stamp_register_id') }}</small>
				@endif
			</div>
			<input type="submit" name="new-matter-submit" value="Save" class="btn btn-primary">
		</form>
	  </div>
	</div>
  </div>
@endsection

