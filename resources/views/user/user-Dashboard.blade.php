@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{ __(' Main Dashboard') }}
                    <div>
                        <a href="{{route('user.Dashboard.edit')}}"><button>Edit Profile</button></a>
                    <a href="{{route('user.my.subscription')}}"><button>My Subscription</button></a>
                    <a href="##"><button>My Reviews </button></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
