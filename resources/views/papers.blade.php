@extends('core')

@section('content')
<div class="container">
			<div class="row">
				
					<section class="content-inner">
					<div class="row">
						<table class="responsive-table">
						<thead>
							<tr>
							<th>Paper Id</th>
							<th>Paper Title</th>
							<th>Paper Author(s)</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($papersRecords as $paper)
						<tr>
							<td>{{ $paper->paper_id }}</td>
							<td>{{ (strlen($paper->paper_title) > 30) ? substr($paper->paper_title,0,30).'...' : $paper->paper_title }}</td>
							<td>{{ (strlen($paper->author) > 30) ? substr($paper->author,0,30).'...' : $paper->author }}</td>
						</tr>
							@endforeach
						</tbody>
						</table>
						{!! $papers->render() !!}
				</div>
					</section>
			</div>
		</div>
@endsection
