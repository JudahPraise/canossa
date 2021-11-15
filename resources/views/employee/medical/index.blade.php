@extends('employee.layouts.home')

@section('css')
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('argon/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('argon/css/argon.css?v=1.2.0') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/grid.css') }}">
    
    <link rel="stylesheet" href="{{ asset('vendor/datatables/datatables.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('vendor/datatables/responsive.bootstrap.min.css') }}" type="text/css">
@endsection

@section('employee-home')
<div class="row d-flex justify-content-center p-2">
    <div class="col-md-3 shadow bg-white rounded p-3 m-1 d-flex flex-column justify-content-center">
        <div class="row avatar-upload d-flex justify-content-center">
            <x-avatar :image="$user->image"  />
        </div>
        <div class="row d-flex flex-column align-items-center p-3">
            <h5>{{ auth()->user()->fullName() }}</h5>
            <p>{{ auth()->user()->department }} | {{ auth()->user()->role }}</p>
        </div>
    </div>
    <div class="col-md-8 shadow bg-white rounded p-3 m-1">
        <div class="form-row m-3">
            <div class="col-md-4 mb-2">
                <p style="font-size: .8rem">Gender</p>
                <strong style="font-size: 1.1rem">{{ auth()->user()->sex }}</strong>
            </div>
            <div class="col-md-4 mb-2">
                <p style="font-size: .8rem">Date of birth</p>
                <strong style="font-size: 1.1rem">{{ auth()->user()->dob }}</strong>
            </div>
            <div class="col-md-4 mb-2">
                <p style="font-size: .8rem">Date of birth</p>
                <strong style="font-size: 1.1rem">{{ auth()->user()->getAge() }}</strong>
            </div>
        </div>
        <div class="form-row m-3">
            <div class="col-md-4 mb-2">
                <label for="">Height</label>
                <input type="number" step="0.01" class="form-control" id="height">
                <small class="font-italic text-muted"><span class="text-danger mr-1">*</span>in ft</small>
            </div>
            <div class="col-md-4 mb-2">
                <label>Weight</label>
                <input type="number" step="0.01" class="form-control" id="weight">
                <small class="font-italic text-muted"><span class="text-danger mr-1">*</span>in kl</small>
            </div>
            <div class="col-md-4 mb-2">
                <label for="">Blood Type</label>
                <select class="custom-select" id="validationDefault04" name="type">
                    <option disabled selected>Choose...</option>
                    <option>A</option>
                    <option>O</option>
                    <option>B</option>
                    <option>AB</option>
                    <option>A-</option>
                    <option>O-</option>
                    <option>B-</option>
                    <option>AB-</option>
                </select> 
            </div>
        </div>
    </div>
</div>
<div class="row p-3 d-flex justify-content-center align-items-start">
    <div class="col-md-7 shadow bg-white rounded">
        <h2 class="m-3">Medical Record</h2>
        @if($record->hospitalizations == null || $record->immunizations == null || $record->medications == null)
            <div class="container">
                <div class="row py-2">
                    <a href="{{ route('employee.history.create', $record->id) }}" class="container-fluid d-flex flex-column align-items-center p-1">
                        <img src="{{ asset('SVG/undraw_create.svg') }}" alt="" srcset="" height="250" width="250">
                        <span>Create medical record</span>
                    </a>
                </div>
            </div>
        @else
           <section>
               <div class="row m-3 d-flex justify-content-between align-items-center">
                    <h3>Hospitalization</h3>
               </div>
               <div class="row m-3">
                    <div class="table-responsive">
                        <table class="table table-borderless dt-responsive nowrap w-100" id="myTable">
                            <thead>
                              <tr>
                                <th scope="col">Disease</th>
                                <th scope="col">Date</th>
                                <th scope="col">Operation</th>
                                <th scope="col">Date</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($record->hospitalizations as $hospitalization)
                                    <tr>
                                        <td>{{ $hospitalization->disease }}</td>
                                        <td>{{ $hospitalization->d_date }}</td>
                                        <td>{{ $hospitalization->operation }}</td>
                                        <td>{{ $hospitalization->o_date }}</td>
                                        <td class="d-flex justify-content-around">
                                          <a class="text-primary" style="cursor: pointer"><i class="fas fa-pencil-alt mr-2"></i>Edit</a>
                                          <a class="text-danger" style="cursor: pointer"><i class="fas fa-trash-alt mr-2"></i>Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
               </div>
           </section>
        @endif
    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12 shadow bg-white rounded p-3 m-2">
                <x-labtestfile :labtests="$record->labtests" :record="$record"></x-labtestfile>
            </div>
            <div class="col-md-12 shadow bg-white rounded p-3 m-2">
                <x-diagnosis></x-diagnosis>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ asset('argon/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/js-cookie/js.cookie.j') }}s"></script>
    <script src="{{ asset('argon/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('argon/js/argon.js?v=1.2.0') }}"></script>
    <script>
        $( document ).ready(function() {
            $('#myTable').DataTable( {
            responsive:true,
            searching: false,
            bInfo: false,
            bLengthChange: false,
            bPaginate: false,
          });
        });
    </script>

    {{-- DataTable --}}
    <script src="{{ asset('vendor/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.responsive.min.js') }}"></script>
@endsection