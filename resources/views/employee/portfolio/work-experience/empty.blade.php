@extends('employee.portfolio.work-experience.index')

@section('work')
    <div class="container d-flex flex-column justify-content-center align-items-center" style="height: 70vh">
        {{-- <div class="image is-large-square">
            <img src="{{ asset('img/for-portfolio/Uploading-amico.svg') }}" alt="">
        </div> --}}
        <strong class="my-3" style="font-size: 1.6rem;">Nothing in here!</strong>
        <a href="{{ route('work.create') }}" class="btn btn-sm btn-primary">Create</a>
    </div>
@endsection
