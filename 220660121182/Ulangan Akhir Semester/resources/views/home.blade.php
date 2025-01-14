@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Dashboard</div>

                <div class="card-body text-center">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="title">
                        <h2>Welcome Back!</h2>
                        <p>You've successfully logged in.</p>
                    </div>

                    <div class="links">
                        <a href="{{ route('customers') }}" class="btn btn-primary btn-lg">Go To Customer Details</a>
                    </div>

                    <!-- Redirect to Customers after 3 seconds -->
                    <script>
                        setTimeout(function() {
                            window.location.href = "{{ route('customers') }}";
                        }, 5000);
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection