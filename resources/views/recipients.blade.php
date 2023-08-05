@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-2">
                <div class="card-header">{{ __('Recipients') }}</div>

                <div class="card-body">
                    @livewire('recipient-manager')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
