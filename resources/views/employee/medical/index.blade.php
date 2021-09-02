@extends('employee.layouts.home')

@section('css')
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('argon/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('argon/css/argon.css?v=1.2.0') }}" type="text/css">
@endsection

@section('employee-home')

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
                            <div class="row ml-1 mb-2 d-flex justify-content-between w-100">
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
                                <span class="py-sm-2 d-flex flex-column align-items-center" style="color: black">
                                    <img src="{{ asset('img/bone.png') }}" alt="" height="40" width="40">
                                    Fracture
                                </span>
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
                                <button class="btn btn-icon btn-primary btn-sm ml-2" ype="submit" id="update"  data-toggle="modal" data-target="#updateModal" data-id="{{ $labtest->id }}">
                                    <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                                </button>
                                <button type="button" data-toggle="modal" data-target="#uploadModal" class="btn btn-primary btn-sm">Update Lab Test</button>
                            @else
                                <a class="btn btn-icon btn-primary" data-toggle="modal" data-target="#uploadModal">
                                    <span class="btn-inner--icon text-white"><i class="fas fa-file-upload mr-2"></i>Upload Lab Test</span>
                                </a>
                            @endif
                            <!-- Upload Modal -->
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
                            <!-- Update Modal -->
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
                                        <button class="btn btn-sm btn-primary" type="submit" value="Submit Form">Update File</button>
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
                    @else 
                        <div class="row p-5 d-flex justify-content-center align-items-center">
                            <div class="col-md-4">
                               
                            </div>
                            <div class="col-md-8">
                                <p class="text-muted font-italic">No recent diagnosis by the school doctor</p>    
                            </div>
                        </div>   
                    @endif
                </div>
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
                    <h3>{{ !empty( $user->personal->date_of_birth) ? $user->personal->date_of_birth : 'N/A' }}</h3>
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
                @else
                    <p class="text-muted font-italic">No recent data</p>
                @endif
            </div>
        </div>
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
                @else
                    <p class="text-muted font-italic">No recent data</p>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script type="application/javascript">
    $(document).ready(function () {
        $('#update').each(function() {
          $(this).click(function(event){
            $('#formUpdate').attr("action", "/employee/medical-record/update-labtest/"+$(this).data('id')+"")
            // console.log($(this).data('id'));
          })
        });
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