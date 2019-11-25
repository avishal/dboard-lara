@extends('dboard.main')

@section('page-content')
<div class="row">
  <div class="col-sm-3 pr-2">
    <div class="card">
	  <ul class="list-group list-group-flush">
	    <li class="list-group-item"><a href="{{ route('all-matters') }}">All Matters</a></li>
	    <li class="list-group-item"><a href="{{ route('all-clients') }}">All Clients</a></li>
	    <li class="list-group-item"><a href="{{ route('new-client') }}">New Client</a></li>
	    <li class="list-group-item"><a href="{{ route('new-matter') }}">New Matter</a></li>
	  </ul>
	</div>
</div>
<div class="col-sm-9">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upcoming Matters</div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <th>S.R. no</th>
                            <th>C. R.no</th>
                            <th>Case Detail</th>
                            <th>Next Date</th>
                        </thead>
                        </tbody>
                        @foreach($caseDates as $date)
                        <?php $matter = $date->matter()->first();?>
                            <tr>
                                <td>{{ $date->srno }}</td>
                                <td>{{ $date->crno }}</td>
                                <td><a href="{{ route('matter-clients', [$matter->id]) }}">{{ ($matter->clients()->first() != null) ? $matter->clients()->first()->client_name :"" }} {{ $matter->case_number }}/{{ $matter->year }}</a></td>
                                <td>{{ $date->next_date->format('M d, Y') }}</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

            </div>
        </div>
</div>
</div>
@endsection
