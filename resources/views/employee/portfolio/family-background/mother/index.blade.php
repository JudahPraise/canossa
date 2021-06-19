@extends('employee.portfolio.family-background.index')

@section('family')

<div class="container-fluid">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
              <h1 class="mb-0">Mother</h1>
            </div>
            <div class="col text-right">
                <a href="{{ url()->current() === route('family.index', 'card') ? route('family.index', 'card') :  route('family.index', 'card') }}" class="btn btn-icon btn-light" type="button">
                    <span class="btn-inner--icon"><i class="fas fa-caret-left"></i></span>
                </a>

                @if (url()->current() != route('mother.create'))
                    <a href="{{ route('mother.edit', Auth::user()->id) }}" class="btn btn-icon btn-info" type="button">
                        <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                    </a>
                @endif
            </div>
        </div>
    </div>

    <div class="row p-3">
        @yield('mother')
    </div>
    
</div>
@endsection