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
                    <div class="col-md-4 mb-3 d-flex justify-content-center align-items-center"> 
                        @if (!empty($user->image))
                            <img src="{{ asset( 'storage/images/'.$user->image) }}" height="180" width="180">
                        @else
                            <img src="{{ $user->sex === 'F' ? asset('img/default-female.svg') : asset('img/default-male.svg') }}" height="180" width="180">
                        @endif
                    </div>
                    <div class="col-md-8 d-flex justify-content-center justify-content-md-start">
                        <div class="row d-flex flex-column align-items-center align-items-md-start w-100">
                            <h1 class="text-center" style="font-size: 2rem">{{ $user->name }}</h1>
                            <h3>{{ $user->sex === 'M' ? 'Male' : 'Female' }} -  <span>{{ $user->getAge() }}</span></h3>
                            <div class="row ml-1 mt-2 mb-2 d-flex justify-content-between w-100">
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
                            <div class="row d-flex flex-column ml-1">
                                <h4 style="color: black;">{{ !empty($user->diagnosis->isHealthy) ? 'Health Status' : 'Health Problem' }}</h4>
                                <div class="row d-flex justify-content-start p-0 m-0">
                                    @if (!empty($user->diagnosis->isHealthy))
                                        <div class="row d-flex justify-content-start p-0 m-0" id="isHealthy">
                                            <span class="badge badge-pill badge-success m-1" style="font-size: 1rem">{{ $user->diagnosis->isHealthy }}</span>
                                        </div>
                                    @else
                                        @if (!empty($user->diagnosis->problems))
                                            @foreach ($user->diagnosis->problems as $problem)
                                                <div class="row d-flex justify-content-start p-0 m-0" id="healthProblem">
                                                    <span class="badge badge-pill badge-primary m-1" style="font-size: 1rem">{{ $problem }}</span>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="row d-flex justify-content-start p-0 m-0" id="notChecked">
                                                <span class="badge badge-pill badge-warning m-1" style="font-size: 1rem">Not yet checked</span>
                                        </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mt-2">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <h3 class="">Lab test</h3>
                        </div>
                        <div class="col-md-8">
                            @if (!empty($labtest))
                                <span style="font-size: 1.2rem">{{ $labtest->file }}</span>
                                <button class="btn btn-icon btn-primary btn-sm ml-2" type="submit" id="update"  data-toggle="modal" data-target="#updateModal" data-id="{{ $labtest->id }}">
                                    <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                                </button>
                                <button type="button" data-toggle="modal" data-target="#uploadModal" class="btn btn-primary btn-sm">Update Lab Test</button>
                            @else
                                <a class="btn btn-icon btn-primary" data-toggle="modal" data-target="#uploadModal">
                                    <span class="btn-inner--icon text-white"><i class="fas fa-file-upload mr-2"></i>Upload Lab Test</span>
                                </a>
                            @endif
                            <!-- Upload Lab Test Modal -->
                            <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Upload File</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('record.store') }}" class="d-flex flex-column w-100" method="POST" enctype="multipart/form-data">
                                              @csrf
                                              <div class="form-row mb-3">
                                                <label for="validationCustom01">Type of Document</label>
                                                <select class="custom-select" id="validationDefault04" name="type">
                                                  <option>Lab Test</option>
                                                </select>   
                                              </div>
                                              <div class="form-row mb-3">
                                                <label for="validationCustom01">Document</label>
                                                <div class="file-drop-area mb-3 w-100">
                                                  <span class="fake-btn">Choose files</span>
                                                  <span class="file-msg">or drag and drop files here</span>
                                                  <input class="file-input" type="file" name="file" multiple>
                                                </div>
                                              </div>
                                              <button class="btn btn-sm btn-primary" type="submit" value="Submit Form">Upload File</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Update Lab Test Modal -->
                            <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalCenterTitle">Update File</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form id="formUpdate" class="d-flex flex-column w-100" method="POST" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-row mb-3">
                                          <label for="validationCustom01">Type of Document</label>
                                          <select class="custom-select" id="validationDefault04" name="type">
                                            <option>Lab Test</option>
                                          </select>   
                                        </div>
                                        <div class="form-row mb-3">
                                          <label for="validationCustom01">Document</label>
                                          <div class="file-drop-area mb-3 w-100">
                                            <span class="fake-btn">Choose files</span>
                                            <span class="file-msg">or drag and drop files here</span>
                                            <input class="file-input" type="file" name="file" multiple>
                                          </div>
                                        </div>
                                        <button class="btn btn-sm btn-primary" type="submit" value="Submit Form" >Update File</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(!empty($diagnosis))
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <h3 class="">Last checked</h3>
                            </div>

                            <div class="col-md-8">
                                <p>{{ $diagnosis->nurse.' '.'on'.' '.Carbon\Carbon::parse($diagnosis->created_at)->format('jS \o\f F, Y') }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h3 class="">Previous Diagnosis</h3>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $diagnosis->diagnosis }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h3 class="">Medication</h3>
                            </div>
                            <div class="col-md-7">
                                @if (!empty($diagnosis->medications))
                                    @foreach ($diagnosis->medications as $medication)
                                        <img src="{{ asset('img/capsule.png') }}" alt="" height="45" width="45" data-toggle="tooltip" data-placement="top" title="{{ $medication['med'].' '.'-'.' '.$medication['sched'] }}">
                                    @endforeach
                                @else
                                    <p class="text-muted font-italic">No recent medication to take</p>  
                                @endif

                                @if(!empty($diagnosis->medications))
                                    <a href="" class="ml-3" data-toggle="modal" data-target="#medList">view list</a>
                                @endif
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="medList" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        @if (!empty($diagnosis->medications))
                                            <table class="table table-borderless">
                                                <thead>
                                                  <tr>
                                                    <th scope="col" style="font-size: 1rem">Medicine</th>
                                                    <th scope="col" style="font-size: 1rem">Schedule</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($diagnosis->medications as $medication)
                                                      <tr>
                                                          <td style="font-size: 1rem"><i class="fas fa-capsules mr-2"></i>{{ $medication['med'] }}</td>
                                                          <td style="font-size: 1rem"><i class="fas fa-clock mr-2"></i>{{ $medication['sched'] }}</td>
                                                      </tr>
                                                  @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <p class="text-muted font-italic">No recent medication to take</p>
                                        @endif
                                        
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-primary w-100" data-dismiss="modal"><i class="fas fa-print mr-2"></i>Print</button>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-end mt-5">
                            <button type="button" class="btn btn-primary btn-secondary" data-toggle="modal" data-target="#editModal">Edit</button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dialogModal">Prescription</button>
                        </div>
                    @else 
                        <div class="row p-5 d-flex justify-content-center align-items-center">
                            <div class="col-md-4">
                               
                            </div>
                            <div class="col-md-8">
                                <p class="text-muted font-italic">No recent diagnosis by the school doctor</p>    
                            </div>
                        </div>   
                        <div class="row d-flex justify-content-end mt-5">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dialogModal">Prescription</button>
                        </div>
                    @endif
                </div>
                <!-- Prescription Modal -->
                <div class="modal fade cd-example-modal-md" id="dialogModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
                                <h3><strong>Health Status</strong></h3>
                                <div class="form-group">
                                    <label><input id="healthy" type="checkbox" name="isHealthy" value="Healthy"><strong> Healthy</strong></label>
                                </div>
                                <label><strong>Health Problem</strong></label>
                                <div class="form-row d-flex">
                                    <div class="col-md-6 d-flex flex-column">
                                        <label><input class="healthProblem" type="checkbox" name="problem[]" value="Heart Disease"> Heart Disease</label>
                                        <label><input class="healthProblem" type="checkbox" name="problem[]" value="Diabetes"> Diabetes</label>
                                        <label><input class="healthProblem" type="checkbox" name="problem[]" value="UTI"> UTI</label>
                                        <label><input class="healthProblem" type="checkbox" name="problem[]" value="Hypertension"> Hypertension</label>
                                        <label><input class="healthProblem" type="checkbox" name="problem[]" value="Allergy"> Allergy (Food, Medicine)</label>
                                    </div>
                                    <div class="col-md-6 d-flex flex-column">
                                        <label><input class="healthProblem" type="checkbox" name="problem[]" value="Ulcer"> Ulcer</label>
                                        <label><input class="healthProblem" type="checkbox" name="problem[]" value="Hepatitis"> Hepatitis</label>
                                        <label><input class="healthProblem" type="checkbox" name="problem[]" value="Scoliosis"> Scoliosis</label>
                                        <label><input class="healthProblem" type="checkbox" name="problem[]" value="Migraine"> Migraine</label>
                                        <label><input class="healthProblem" type="checkbox" name="problem[]" value="Asthma"> Asthma</label>
                                    </div>
                                </div> 
                                <h3 class="mt-3"><strong>Prescription</strong></h3>
                                <div class="form-group">
                                    <label for="diagnosis"><strong>Diagnosis</strong></label>
                                    <textarea class="form-control" id="diagnosis" name="diagnosis" rows="3"></textarea>
                                </div>
                                <div class="row d-flex justify-content-between px-3">
                                    <label for="diagnosis"><strong>Medications</strong></label>
                                    <label class="custom-toggle">
                                        <input type="checkbox" id="checkMedicine">
                                        <span class="custom-toggle-slider rounded-circle"></span>
                                    </label>
                                </div>
                                <div class="form-group inputs_div">
                                    <div class="form-row d-flex align-items-center">
                                      <div class="col-md-5 mb-3">
                                        <label for="name">Medicine</label>
                                        <input type="text" class="form-control med" name="medications[{{ 0 }}][med]" id="med" required>
                                      </div>
                                      <div class="col-md-5 mb-3 mr-2">
                                        <label for="date_of_birth">Schedule</label>
                                        <input type="text" class="form-control med" name="medications[{{ 0 }}][sched]" id="sched" required>
                                      </div>
                                      <button class="btn btn-primary btn-sm btn-fab btn-icon btn-round add" type="button">
                                        <i class="fas fa-plus"></i>
                                      </button>
                                      <button class="btn btn-danger btn-sm btn-fab btn-icon btn-round" type="button">
                                        <i class="fas fa-minus"></i>
                                      </button>
                                    </div>
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
                @if($diagnosis)
                    <!-- Prescription Edit Modal -->
                    <div class="modal fade cd-example-modal-md" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Prescription</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('diagnosis.edit', $diagnosis->id) }}" method="POST" id="diagnosisUpdateForm">
                                    @method('PUT')
                                    @csrf
                                    <h3><strong>Health Status</strong></h3>
                                    <div class="form-group">
                                        <label><input id="healthy" type="checkbox" name="isHealthy" value="Healthy" {{ !empty($diagnosis->isHealthy) ? 'checked' : '' }}><strong> Healthy</strong></label>
                                    </div>
                                    <label><strong>Health Problem</strong></label>
                                    <div class="form-row d-flex">
                                        <div class="col-md-6 d-flex flex-column">
                                            <label><input class="healthProblem" type="checkbox" name="problem[]" value="Heart Disease"> Heart Disease</label>
                                            <label><input class="healthProblem" type="checkbox" name="problem[]" value="Diabetes"> Diabetes</label>
                                            <label><input class="healthProblem" type="checkbox" name="problem[]" value="UTI"> UTI</label>
                                            <label><input class="healthProblem" type="checkbox" name="problem[]" value="Hypertension"> Hypertension</label>
                                            <label><input class="healthProblem" type="checkbox" name="problem[]" value="Allergy"> Allergy (Food, Medicine)</label>
                                        </div>
                                        <div class="col-md-6 d-flex flex-column">
                                            <label><input class="healthProblem" type="checkbox" name="problem[]" value="Ulcer"> Ulcer</label>
                                            <label><input class="healthProblem" type="checkbox" name="problem[]" value="Hepatitis"> Hepatitis</label>
                                            <label><input class="healthProblem" type="checkbox" name="problem[]" value="Scoliosis"> Scoliosis</label>
                                            <label><input class="healthProblem" type="checkbox" name="problem[]" value="Migraine"> Migraine</label>
                                            <label><input class="healthProblem" type="checkbox" name="problem[]" value="Asthma"> Asthma</label>
                                        </div>
                                    </div> 
                                    <h3 class="mt-3"><strong>Prescription</strong></h3>
                                    <div class="form-group">
                                        <label for="diagnosis"><strong>Diagnosis</strong></label>
                                        <textarea class="form-control" id="diagnosis" name="diagnosis" rows="3">{{ $diagnosis->diagnosis }}</textarea>
                                    </div>
                                    <label for="diagnosis"><strong>Medications</strong></label>
                                    <div class="form-group inputs_div">
                                        @if (!empty($diagnosis->medications))
                                            @foreach ($diagnosis->medications as $medication)
                                                <div class="form-row d-flex align-items-center">
                                                    <div class="col-md-5 mb-3">
                                                      <label for="name">Medicine</label>
                                                      <input type="text" class="form-control" name="medications[{{ $loop->iteration }}][med]" id="med" value="{{ $medication['med'] }}" required>
                                                    </div>
                                                    <div class="col-md-5 mb-3 mr-2">
                                                      <label for="date_of_birth">Schedule</label>
                                                      <input type="text" class="form-control" name="medications[{{ $loop->iteration }}][sched]" id="sched" value="{{ $medication['sched'] }}" required>
                                                    </div>
                                                    <button class="btn btn-primary btn-sm btn-fab btn-icon btn-round add" type="button">
                                                      <i class="fas fa-plus"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm btn-fab btn-icon btn-round remove" type="button">
                                                      <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="row d-flex justify-content-between px-3">
                                                <label for="diagnosis"><strong>Medications</strong></label>
                                                <label class="custom-toggle">
                                                    <input type="checkbox" id="checkEditMedicine">
                                                    <span class="custom-toggle-slider rounded-circle"></span>
                                                </label>
                                            </div>
                                            <div class="form-group inputs_div">
                                                <div class="form-row d-flex align-items-center">
                                                  <div class="col-md-5 mb-3">
                                                    <label for="name">Medicine</label>
                                                    <input type="text" class="form-control med" name="medications[{{ 0 }}][med]" id="med" required>
                                                  </div>
                                                  <div class="col-md-5 mb-3 mr-2">
                                                    <label for="date_of_birth">Schedule</label>
                                                    <input type="text" class="form-control med" name="medications[{{ 0 }}][sched]" id="sched" required>
                                                  </div>
                                                  <button class="btn btn-primary btn-sm btn-fab btn-icon btn-round add" type="button">
                                                    <i class="fas fa-plus"></i>
                                                  </button>
                                                  <button class="btn btn-danger btn-sm btn-fab btn-icon btn-round" type="button">
                                                    <i class="fas fa-minus"></i>
                                                  </button>
                                                </div>
                                            </div>   
                                        @endif
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary" onclick="document.getElementById('diagnosisUpdateForm').submit()">Save changes</button>
                            </div>
                          </div>
                        </div>
                    </div>
                @endif
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
                    <h3>{{ !empty( $user->dob) ? Carbon\Carbon::parse($user->dob)->format('F j, Y') : 'N/A' }}</h3>
                </div>
                <div class="col-6">
                    Sex
                    <h3>{{ !empty($user->sex) ? $user->sex : 'N/A' }}</h3>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    Address
                    <h3>{{ !empty($user->personal->address) ? $user->personal->address : 'N/A' }}</h3>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12">
                    Phone Number
                    <h3>{{ !empty($user->personal->cell_number) ? $user->personal->cell_number : 'N/A' }}</h3>
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
        <div class="card">
            <div class="card-body">
                <h2>Recent Physical Examination</h2>
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
                    <div class="row d-flex justify-content-end mr-1">
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#physicalEditModal">Edit</button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#physicalModal">Update</button>
                    </div>
                @else
                    <p class="text-muted font-italic">No recent data</p>
                    <div class="row d-flex justify-content-end mr-1">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#physicalModal">Add</button>
                    </div>
                @endif
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
        <!-- Physical Examination Edit Modal -->
        @if(!empty($physical))
            <div class="modal fade cd-example-modal-lg" id="physicalEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Physical Examination</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <form action="{{ route('physical.edit', $physical->id) }}" method="POST" id="physicalExamEditForm">
                                @method('PUT')
                                  @csrf
                                  <div class="form-row mb-3">
                                    <div class="col-6">
                                      <label for="inputAddress">School Year</label>
                                      <input type="text" class="form-control" name="school_year" value="{{ $physical->school_year }}">
                                    </div>
                                  </div>
                                  <div class="form-row mb-3">
                                      <div class="col">
                                        <label for="inputAddress">Height</label>
                                        <input type="number" step="any" class="form-control" name="height" value="{{ $physical->height }}">
                                      </div>
                                      <div class="col">
                                        <label for="inputAddress">Weight</label>
                                        <input type="number" step="any" class="form-control" name="weight" value="{{ $physical->weight }}">
                                      </div>
                                  </div>
                                  <div class="form-row mb-3">
                                    <div class="col">
                                      <label for="inputAddress">BMI</label>
                                      <input type="number" step="any" class="form-control" name="bmi" value="{{ $physical->bmi }}">
                                    </div>
                                    <div class="col">
                                      <label for="inputAddress">Blood Pressure</label>
                                      <input type="text" class="form-control" name="bp" value="{{ $physical->bp }}">
                                    </div>
                                  </div>
                                  <div class="form-row">
                                    <div class="col">
                                      <label for="inputAddress">Respiratory Rate</label>
                                      <input type="text" class="form-control" name="rr" value="{{ $physical->rr }}">
                                    </div>
                                    <div class="col">
                                      <label for="inputAddress">Heart Rate</label>
                                      <input type="text" class="form-control" name="hr" value="{{ $physical->hr }}">
                                    </div>
                                  </div>
                              </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="document.getElementById('physicalExamEditForm').submit()">Save changes</button>
                          </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="col-md-8 order-md-1">
        <div class="card">
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
                    <div class="row d-flex justify-content-end mr-1 mb-3">
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editHospitalModal">Edit</button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hospitalModal">Update</button>
                    </div>
                @else
                    <p class="text-muted font-italic">No recent data</p>
                    <div class="row d-flex justify-content-end mr-1">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hospitalModal">Update</button>
                    </div>
                @endif
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
        <!-- Hospitalization Update Modal -->
        @if(!empty($hospital))
            <div class="modal fade cd-example-modal-lg" id="editHospitalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Hospitalization</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('hospital.edit',$hospital->id) }}" method="POST" id="hospitalEditForm">
                                @method('PUT')
                                @csrf
                                <div class="form-row mb-3">
                                  <div class="col-6">
                                    <label for="inputAddress">Disease</label>
                                    <input type="text" class="form-control" name="disease" value="{{ $hospital->disease }}">
                                  </div>
                                  <div class="col-6">
                                    <label for="inputAddress">Height</label>
                                    <input type="date" class="form-control" name="d_date" value="{{ $hospital->d_date }}">
                                  </div>
                                </div>
                                <div class="form-row mb-3">
                                  <div class="col">
                                    <label for="inputAddress">Operation</label>
                                    <input type="text" class="form-control" name="operation" value="{{ $hospital->operation }}">
                                  </div>
                                  <div class="col">
                                    <label for="inputAddress">Date</label>
                                    <input type="date" class="form-control" name="o_date" value="{{ $hospital->o_date }}">
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="col">
                                    <label for="inputAddress">Chronic diseases & medication presently being taken</label>
                                    <input type="text" class="form-control" name="medication" value="{{ $hospital->medication }}">
                                  </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary" onclick="document.getElementById('hospitalEditForm').submit()">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<div class="row px-3">
    <div class="col-md-4 order-md-5">
        
    </div>
    <div class="col-md-8 order-md-1">
      <div class="card p-2">
        <div class="card-body">
            <h2>Personal History</h2>
            @if (!empty($histories))
                <div class="container py-3">
                    @foreach ($histories->illnesses as $history)
                        <span class="badge badge-pill badge-warning m-2" style="font-size: 1.2rem" style="cursor: pointer">{{ $history }}</span>
                    @endforeach
                </div>
                <div class="row d-flex justify-content-end mr-1">
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#">Edit</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#personalHistory">Update</button>
                </div>
            @else
                <div class="row d-flex justify-content-end mr-1">
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#personalHistory">Add</button>
                </div>
            @endif
            <div class="modal fade cd-example-modal-md" id="personalHistory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Personal History</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <h3>Check if you has been ill of the following:</h3>
                        <div class="row p-2" id="selection">
                            @foreach ($illnesses as $illness)
                                <label for="{{ $loop->iteration }}" class="pill">
                                    <span class="badge badge-pill badge-warning m-2" style="font-size: 1.2rem" style="cursor: pointer">{{ $illness->illness }}<input class="illness" type="checkbox" name="illnesses[]" id="{{ $loop->iteration }}" value="{{ $illness->illness }}" hidden></span>
                                </label>
                            @endforeach
                        </div>
                        <hr>
                        <form action="{{ route('history.store', $user->id) }}" method="POST" id="historyForm">
                            @csrf
                            <h3>Selected</h3>
                            <div class="row p-2" id="cart">
                              
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="document.getElementById('historyForm').submit()">Save changes</button>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
    

@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script type="application/javascript">
        $(document).ready(function () {

            $(function() {
              update_disable_cb();
              $("input.illness").click(update_disable_cb);
            });

            function update_disable_cb() {
                if (this.checked) {
                    var pill = '<label for="'+$(this).attr('id')+'" class="pill"><span class="badge badge-pill badge-primary m-2" style="font-size: 1.2rem" style="cursor: pointer">'+$(this).val()+'<input class="illness" type="checkbox" id="'+$(this).attr('id')+'" value="'+$(this).val()+'" name="illnesses[]" checked hidden></span></label>'
                    $('#cart').append(pill);
                    $(this).parent().remove();
                } else {
                    $("input.med").attr("disabled", true);
                }
            }
        });
    </script>
    <script type="application/javascript">
      $(document).ready(function () {
        $('#update').each(function() {
          $(this).click(function(event){
            $('#formUpdate').attr("action", "/medical-record/lab-tests/update/"+$(this).data('id')+"")
            // console.log($(this).data('id'));
          })
        });
      });
    </script>
    <script type="application/javascript">
        $(document).ready(function () {

            // Prescription Modal
            $(function() {
              update_disable_cb();
              $("#checkMedicine").click(update_disable_cb);
            });

            function update_disable_cb() {
                if (this.checked) {
                    $("input.med").removeAttr("disabled");
                } else {
                    $("input.med").attr("disabled", true);
                }
            }

            // Prescription Edit
            $(function() {
              edit_disable_cb();
              $("#checkEditMedicine").click(edit_disable_cb);
            });

            function edit_disable_cb() {
                if (this.checked) {
                    $("input.med").removeAttr("disabled");
                } else {
                    $("input.med").attr("disabled", true);
                }
            }

            var count = {{ !empty($diagnosis->medication) ? count($diagnosis->medications) : 0 }};
            $(this).on("click", ".add", function(){
                count++;
                var html = '<div class="form-row d-flex align-items-center"><div class="col-md-5 mb-3"><label for="name">Medicine</label><input type="text" class="form-control" name="medications['+count+'][med]" id="name" required></div><div class="col-md-5 mb-3 mr-2"><label for="date_of_birth">Schedule</label><input type="text" class="form-control" name="medications['+count+'][sched]" id="date_of_birth" required></div><button class="btn btn-primary btn-sm btn-fab btn-icon btn-round add"><i class="fas fa-plus"></i></button><button class="btn btn-danger btn-sm btn-fab btn-icon btn-round remove"><i class="fas fa-minus"></i></button></div>'
                console.log('get');
                $('.inputs_div').append(html);
            // console.log('hello');
            });
            $(this).on("click", ".remove", function(){
                var target_input = $(this).parent();
                target_input.remove();
            });
        }) 
    </script>

    <script type="application/javascript">
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
    <script type="application/javascript">
        $(document).ready(function () {

            $(function() {
              enable_cb();
              $("#healthy").click(enable_cb);
            });

            function enable_cb() {
                if (this.checked) {
                  $("input.healthProblem").attr("disabled", true);
                } else {
                  $("input.healthProblem").removeAttr("disabled");
                }
            }

            $(function() {
              disable_cb();
              $("input.healthProblem").click(disable_cb);
            });

            function disable_cb() {
                if (this.checked) {
                  $("#healthy").attr("disabled", true);
                } else {
                  $("#healthy").removeAttr("disabled");
                }
            }
        });
    </script>
    <!-- Script -->
    <script>
    
      var $fileInput = $('.file-input');
      var $droparea = $('.file-drop-area');
        
      // highlight drag area
      $fileInput.on('dragenter focus click', function() {
        $droparea.addClass('is-active');
      });
      
      // back to normal state
      $fileInput.on('dragleave blur drop', function() {
        $droparea.removeClass('is-active');
      });
      
      // change inner text
      $fileInput.on('change', function() {
        var filesCount = $(this)[0].files.length;
        var $textContainer = $(this).prev();
      
        if (filesCount === 1) {
          // if single file is selected, show file name
          var fileName = $(this).val().split('\\').pop();
          $textContainer.text(fileName);
        } else {
          // otherwise show number of files
          $textContainer.text(filesCount + ' files selected');
        }
      });
    </script>
    <script src="{{ asset('argon/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/js-cookie/js.cookie.j') }}s"></script>
    <script src="{{ asset('argon/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <script src="{{ asset('argon/js/argon.js?v=1.2.0') }}"></script>

@endsection