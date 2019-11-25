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
	    <form method="post" action="{{route('matter-save-date')}}">
			@csrf
			<div class="form-group">
			    <label for="inputCaseId">Case Details</label>
				<select name="matter_id" id="inputCaseId" class="form-control" required="required">
				@foreach($matters as $matter)
					<option value="{{ $matter->id }}">{{ $matter->clients()->first() ? $matter->clients()->first()->client_name : "" }} {{ $matter->case_type()->first()->name }} {{ $matter->case_number}} / {{ $matter->year}}</option>
				@endforeach
				</select>
				@if ($errors->has('matter_id'))
				    <small class="text-danger">{{ $errors->first('matter_id') }}</small>
				@endif
			</div>

			<div class="form-group">
			    <label for="inputCaseNextDate">Next Date</label>
			    <input type="date" name="next_date" id="inputCaseNextDate"  class="form-control" required="required" placeholder="Case Next Date" value="{{ old('next_date') }}">
			    @if ($errors->has('next_date'))
				    <small class="text-danger">{{ $errors->first('next_date') }}</small>
				@endif
			    <!-- <small id="caseNumberHelp" class="form-text text-muted"></small> -->
			</div>


			<div class="form-group">
			    <label for="inputCaseDescription">Description</label>
			    <input type="text" name="description" id="inputCaseDescription"  class="form-control" required="required" placeholder="Case description" value="{{ old('description') }}">
			    @if ($errors->has('description'))
				    <small class="text-danger">{{ $errors->first('description') }}</small>
				@endif
			    <!-- <small id="caseNumberHelp" class="form-text text-muted"></small> -->
			</div>

			<div class="form-group">
			    <label for="inputCRno">C.R. No</label>
			    <input type="text" name="crno" id="inputCRno"  class="form-control" placeholder="Case crno" value="{{ old('crno') }}">
			    @if ($errors->has('crno'))
				    <small class="text-danger">{{ $errors->first('crno') }}</small>
				@endif
			    <!-- <small id="caseNumberHelp" class="form-text text-muted"></small> -->
			</div>

			<div class="form-group">
			    <label for="inputSRno">S.R. No</label>
			    <input type="text" name="srno" id="inputSRno"  class="form-control" placeholder="Case Srno" value="{{ old('srno') }}">
			    @if ($errors->has('srno'))
				    <small class="text-danger">{{ $errors->first('srno') }}</small>
				@endif
			    <!-- <small id="caseNumberHelp" class="form-text text-muted"></small> -->
			</div>

			<div class="form-group">
			    <label for="inputCaseRemark">Remark</label>
			    <input type="text" name="remark" id="inputCaseRemark"  class="form-control" placeholder="Case remark" value="{{ old('remark') }}">
			    @if ($errors->has('remark'))
				    <small class="text-danger">{{ $errors->first('remark') }}</small>
				@endif
			    <!-- <small id="caseNumberHelp" class="form-text text-muted"></small> -->
			</div>

			<input type="submit" name="new-matter-submit" value="Save" class="btn btn-primary">
		</form>
	  </div>
	</div>
  </div>
@endsection

