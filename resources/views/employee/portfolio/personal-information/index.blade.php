@extends('employee.portfolio.index')

@section('portfolio')

<div class="container-fluid pl-4">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
              <h1 class="mb-0">Personal Information</h1>
            </div>
            <div class="col text-right">
                <a href="{{ url()->current() === route('personal.index') ? route('portfolio.index', 'card') : route('personal.index') }}" class="btn btn-icon btn-light" type="button">
                    <span class="btn-inner--icon"><i class="fas fa-caret-left"></i></span>
                </a>

                @if (url()->current() != route('personal.create'))
                    <a href="{{ route('personal.edit', Auth::user()->id) }}" class="btn btn-icon btn-info" type="button">
                        <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                    </a>
                @endif
            </div>
        </div>
    </div>
    
    <div class="row p-3">
        @yield('personal')
    </div>
</div>
@endsection