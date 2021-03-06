<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">

            </div>
            <a href="{{ route('admit') }}" class="btn btn-primary col-md-4">Admit Student</a>
            <div class="col-md-4">

            </div>
        </div>
        <br>
        <br>
        <livewire:admitted-datatable/>
    </div>
</x-app-layout>
