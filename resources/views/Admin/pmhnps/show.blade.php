@extends('Admin.layouts.app')

@section('content')
 hi
@endsection


@section('scripts')
<script>
	function confirmDelete() {
		return confirm('Are you sure you want to delete this item?');
	}
</script>

