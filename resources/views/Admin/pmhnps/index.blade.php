@extends('Admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
                    <div class="col-sm-6">

	{{-- <div class="mb-3 d-flex justify-content-end"><a href="{{ route('pmhnps.create') }}" class="btn btn-info">Create</a></div> --}}

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>name</th>
				<th>email</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pmhnps as $pmhnp)

				<tr>
					<td>{{ $pmhnp->id }}</td>
					<td>{{ $pmhnp->name }}</td>
					<td>{{ $pmhnp->email }}</td>
					<td>Active</td>


					<td>
						<div >
                            <a href="{{ route('pmhnps.show', [$pmhnp->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('pmhnps.edit', [$pmhnp->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['pmhnps.destroy', $pmhnp->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>
	{!! $pmhnps->links() !!}
	@endsection

@section('scripts')

