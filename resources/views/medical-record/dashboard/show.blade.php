@extends('medical-record.layouts.home')

@section('css')
  {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/orbitcss/css/orbit.css"> --}}
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('argon/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('argon/css/argon.css?v=1.2.0') }}" type="text/css">
@endsection

@section('medical-home')
    <div class="row row-cols-1 row-cols-md-2 p-3">
        <div class="col col-md-8 mb-3">
            <div class="card h-100 p-2">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-4 mb-3 d-flex justify-content-center"> 
                            @if (!empty($user->image))
                                <img src="{{ asset( 'storage/images/'.$user->image) }}" height="200" width="200">
                            @else
                                <img src="{{ $user->sex === 'F' ? asset('img/default-female.svg') : asset('img/default-male.svg') }}" height="200" width="200">
                            @endif
                        </div>
                        <div class="col-md-8 d-flex justify-content-center justify-content-md-start" style="border-bottom: 1px solid grey">
                            <div class="row d-flex flex-column align-items-center align-items-md-start w-75">
                                <h1 style="font-size: 2.5rem">{{ $user->name }}</h1>
                                <h3>{{ $user->sex === 'M' ? 'Male' : 'Female' }} -  <span>{{ $user->getAge() }}</span></h3>
                                <div class="row ml-1 mt-2 mb-2 d-flex justify-content-between mb-4 w-100">
                                    <span class="py-sm-2" style="color: grey">
                                        Height <br>
                                        <span id="height" style="color: black">{{ !empty($user->personal->height) ? $user->personal->height.' '.'M' : 'N/A'}}</span>
                                    </span>
                                    <span class="py-sm-2" style="color: grey">
                                        Weight <br>
                                        <span id="weight" style="color: black">{{ !empty($user->personal->weight) ? $user->personal->weight.' '.'KL' : 'N/A' }}</span>
                                    </span>
                                    <span class="py-sm-2" style="color: grey">
                                        BMI <br>
                                        <span id="weight" style="color: black">{{ !empty($user->personal->bmi) ? $user->personal->bmi : 'N/A' }}</span>
                                    </span>
                                    <span class="py-sm-2" style="color: grey">
                                        Blood <br>
                                        <span id="blood" style="color: black">{{ !empty($user->personal->blood_type) ? $user->personal->blood_type : 'N/A' }}</span>        
                                    </span>
                                </div>
                                <h3>Health Status</h3>
                                <div class="row ml-1 mb-2 d-flex justify-content-between mb-4 w-100">
                                    <span class="py-sm-2 d-flex flex-column align-items-center" style="color: black">
                                        <img src="{{ asset('img/heart.png') }}" alt="" height="40" width="40">
                                        High BP
                                    </span>
                                    <span class="py-sm-2 d-flex flex-column align-items-center" style="color: black">
                                        <img src="{{ asset('img/injection.png') }}" alt="" height="40" width="40">
                                        On Insulin
                                    </span>
                                    <span class="py-sm-2 d-flex flex-column align-items-center" style="color: black">
                                        <img src="{{ asset('img/bone.png') }}" alt="" height="40" width="40">
                                        Fracture
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 d-flex justify-content-center justify-content-md-start">
                            <h3 class="ml-3">Last checked</h3>
                        </div>
                        <div class="col-md-8 d-flex justify-content-center justify-content-md-start p-0">
                            <p>{{ $diagnosis->nurse.' '.'on'.' '.Carbon\Carbon::parse($diagnosis->created_at)->format('jS \o\f F, Y') }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 d-flex justify-content-center justify-content-md-start">
                            <h3 class="ml-3">Present Diagnosis</h3>
                        </div>
                        <div class="col-md-8 d-flex justify-content-center justify-content-md-start p-0 text-center text-md-left">
                            <p>{{ $diagnosis->diagnosis }}</p>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-end pr-3">
                    <button type="button" class="btn btn btn-primary btn-neutral mr-3 mb-3">Contact</button>
                    <button type="button" class="btn btn-primary mr-3 mb-3" data-toggle="modal" data-target="#dialogModal">Prescription</button>
                </div>
            </div>
        </div>
        <div class="col col-md-4 mb-3">
          <div class="card p-2 h-100">
            <div class="card-body">
                <h2 class="mb-3">General Data</h2>
                <div class="row mb-3">
                    <div class="col-6">
                        Date of Birth
                        <h3>{{ $user->personal->date_of_birth }}</h3>
                    </div>
                    <div class="col-6">
                        Sex
                        <h3>{{ $user->sex }}</h3>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        Address
                        <h3>{{ $user->personal->address }}</h3>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12">
                        Phone Number
                        <h3>{{ $user->personal->cell_number }}</h3>
                    </div>
                </div>
                <h2 class="mb-3">In case of emergency whom to notify</h2>
                <div class="row mb-3">
                    <div class="col-6">
                        Name
                        <h3>Irish M. Odchigue</h3>
                    </div>
                    <div class="col-6">
                        Relationship
                        <h3>Spouse</h3>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        Address
                        <h3>Brgy. Pinza, Calauan, Laguna</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        Relationship
                        <h3>09186286277</h3>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
    <div class="row px-3">
        <div class="col-md-4 order-md-5">
            <div class="card p-3">
                <div class="card-body">
                    <h2 class="mb-3">Recent Physical Examination</h2>
                    @if (!empty($physical))
                        <div class="row mb-3">
                            <div class="col-6">
                                Date
                                <h3>{{ Carbon\Carbon::parse($physical->created_at)->toFormattedDateString() }}</h3>
                            </div>
                            <div class="col-6">
                                School Year
                                <h3>{{ $physical->school_year }}</h3>
                            </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-6">
                              Height
                              <h3>{{ $physical->height }}</h3>
                          </div>
                          <div class="col-6">
                              Weight
                              <h3>{{ $physical->weight }}</h3>
                          </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                BMI
                                <h3>{{ $physical->bmi }}</h3>
                            </div>
                            <div class="col-6">
                                Blood Pressure
                                <h3>{{ $physical->bp }}</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                Respiratory Rate
                                <h3>{{ $physical->rr }}</h3>
                            </div>
                            <div class="col-6">
                                Heart Rate
                                <h3>{{ $physical->hr }}</h3>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-end mt-3">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#physicalModal">Update</button>
                        </div>
                    @else
                        <p>Empty</p>
                        <div class="row d-flex justify-content-end">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#physicalModal">Add</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-8 order-md-1">
            <div class="card p-2">
                <div class="card-body">
                    <h2>Hospitalization</h2>
                    @if (!empty($hospital))
                        <div class="row mb-3">
                            <div class="col-6">
                                <h3>Disease</h3>
                                <p>{{ $hospital->disease }}</p>
                            </div>
                            <div class="col-6">
                                <h3>Date</h3>
                                <p>{{ Carbon\Carbon::parse($hospital->d_date)->toFormattedDateString() }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <h3>Operation</h3>
                                <p>{{ $hospital->operation }}</p>
                            </div>
                            <div class="col-6">
                                <h3>Date</h3>
                                <p>{{ Carbon\Carbon::parse($hospital->o_date)->toFormattedDateString() }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h3>Chronic diseases & medication presently being taken</h3>
                                <p>{{ $hospital->medication }}</p>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-end">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hospitalModal">Update</button>
                        </div>
                    @else
                        Empty
                        <div class="row d-flex justify-content-end">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hospitalModal">Update</button>
                        </div>
                    @endif
                   
                </div>
            </div>
        </div>
    </div>

    <!-- Prescription Modal -->
    <div class="modal fade cd-example-modal-xl" id="dialogModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Prescription</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('diagnosis.store', $user->id) }}" method="POST" id="diagnosisForm">
                    @csrf
                    <div class="form-group">
                        <label for="diagnosis">Diagnosis</label>
                        <textarea class="form-control" id="diagnosis" name="diagnosis" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="document.getElementById('diagnosisForm').submit()">Save changes</button>
            </div>
          </div>
        </div>
    </div>

    <!-- Physical Examination Modal -->
    <div class="modal fade cd-example-modal-lg" id="physicalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Physical Examination</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('physical.store', $user->id) }}" method="POST" id="physicalExamForm">
                    @csrf
                    <div class="form-row mb-3">
                      <div class="col-6">
                        <label for="inputAddress">School Year</label>
                        <input type="text" class="form-control" name="school_year">
                      </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col">
                          <label for="inputAddress">Height</label>
                          <input type="number" step="any" class="form-control" name="height">
                        </div>
                        <div class="col">
                          <label for="inputAddress">Weight</label>
                          <input type="number" step="any" class="form-control" name="weight">
                        </div>
                    </div>
                    <div class="form-row mb-3">
                      <div class="col">
                        <label for="inputAddress">BMI</label>
                        <input type="number" step="any" class="form-control" name="bmi">
                      </div>
                      <div class="col">
                        <label for="inputAddress">Blood Pressure</label>
                        <input type="text" class="form-control" name="bp">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <label for="inputAddress">Respiratory Rate</label>
                        <input type="text" class="form-control" name="rr">
                      </div>
                      <div class="col">
                        <label for="inputAddress">Heart Rate</label>
                        <input type="text" class="form-control" name="hr">
                      </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="document.getElementById('physicalExamForm').submit()">Save changes</button>
            </div>
          </div>
        </div>
    </div>

    <!-- Hospitalization Modal -->
    <div class="modal fade cd-example-modal-lg" id="hospitalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Hospitalization</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('hospital.store', $user->id) }}" method="POST" id="hospitalForm">
                    @csrf
                    <div class="form-row mb-3">
                      <div class="col-6">
                        <label for="inputAddress">Disease</label>
                        <input type="text" class="form-control" name="disease">
                      </div>
                      <div class="col-6">
                        <label for="inputAddress">Height</label>
                        <input type="date" class="form-control" name="d_date">
                      </div>
                    </div>
                    <div class="form-row mb-3">
                      <div class="col">
                        <label for="inputAddress">Operation</label>
                        <input type="text" class="form-control" name="operation">
                      </div>
                      <div class="col">
                        <label for="inputAddress">Date</label>
                        <input type="date" class="form-control" name="o_date">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <label for="inputAddress">Chronic diseases & medication presently being taken</label>
                        <input type="text" class="form-control" name="medication">
                      </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="document.getElementById('hospitalForm').submit()">Save changes</button>
            </div>
          </div>
        </div>
    </div>

@endsection

@section('js')
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ asset('argon/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/js-cookie/js.cookie.j') }}s"></script>
    <script src="{{ asset('argon/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('argon/js/argon.js?v=1.2.0') }}"></script>
@endsection