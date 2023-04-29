@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (Auth::user() == true)
                    <div class="alert alert-success" role="alert">
                        TRUE
                    </div>
                    @else
                    <div class="alert alert-success" role="alert">
                        You are don't user ..!
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection