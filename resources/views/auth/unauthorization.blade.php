@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Missing permission') }}</div>

                <div class="card-body">
                <div class="alert alert-danger">
                    You don't have permission to visit this page. Ask admin for more details.
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
