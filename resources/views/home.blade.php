@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <span class="text-success">Success</span> </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <p class="">{{ __('You are logged in!') }}</p>
                        <a href="/blog" class="btn btn-primary">Continue</a>
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
