@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-2">
                <div class="card-header">{{ __('Compose your message') }}</div>

                <div class="card-body">
                    @livewire('composer-mail')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
