@extends('admin.employees.index')

@section('css')
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('argon/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('argon/css/argon.css?v=1.2.0') }}" type="text/css">
@endsection

@section('home')
    <div class="container-fluid m-0 p-0">
        <!-- Header -->
        <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{ asset('img/canossa.jpg') }}); background-size: cover; background-position: center top;">
            <!-- Mask -->
            <span class="mask bg-gradient-default opacity-8"></span>
            <!-- Header container -->
            <div class="container-fluid d-flex align-items-center">
              <div class="row p-3 w-100">
                <div class="col-lg-7 col-md-10">
                    <h1 class="display-2 text-white">{{ $employee->name }}</h1>
                    <h2 class="text-white mt-0">{{ $employee->employee_id }}</h2>
                    <small class="text-white mt-0" style="font-size: 1rem">{{ $employee->department }}</small>
                    <small class="text-white mt-0" style="font-size: 1rem">{{ $employee->role }}</small><br>
                    <a class="btn btn-icon btn-success mt-3" data-toggle="modal" data-target="#createModal" type="button" type="submit">
                        <span class="btn-inner--icon text-white"><i class="fas fa-envelope mr-2"></i>Message</span>
                    </a>
                   @if ($employee->role === 'Nurse')
                        <a class="btn btn-icon btn-success mt-3" href="{{ route('assign.nurse', $employee->id) }}">
                           <span class="btn-inner--icon text-white"><i class="fas fa-envelope mr-2"></i>Assign in medical record</span>
                        </a>
                   @endif
                </div>
              </div>
            </div>
        </div>

      <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
              <div class="col-xl-4 order-xl-2">
                <div class="card card-profile">
                  <img src="{{ asset('img/cover.jpg') }}" alt="Image placeholder" class="card-img-top">
                  <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image avatar-upload">
                            <form action="{{ route('image.update') }}" id="uploadForm" enctype="multipart/form-data" method="POST">
                                @method('PUT')
                                @csrf
                                <input type='file' name="image" id="imageUpload" accept=".png, .jpg, .jpeg" onchange="document.getElementById('uploadForm').submit()" hidden/>
                            </form>
                            <a href="#" onclick="document.getElementById('imageUpload').click()">
                              <img src="{{ asset( 'storage/images/'.$employee->image) }}" class="rounded-circle" style="height: 150px; width: 200px; overflow: hidden;">
                            </a>
                            @if(empty($employee->image))
                                <a href="#" onclick="document.getElementById('imageUpload').click()">
                                    <img src="{{ asset($employee->sex === 'M' ? 'img/default-male.svg' : 'img/default-female.svg') }}" class="rounded-circle" style="height: 144px; width: 200px; overflow: hidden;">
                                </a>
                            @endif
                        </div>
                    </div>
                  </div>
                  <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                      
                    </div>
                  </div>
                    <!-- Create Modal -->
                    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create Message</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                              <form class="w-100" enctype="multipart/form-data"  action="{{ route('send') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                  <div class="col-md-12 mb-3">
                                      <label for="validationDefault01">Send To</label>
                                      <select id="inputState" class="form-control" name="send_to">
                                        <option selected value="{{ $employee->name }}">{{ $employee->name }}</option>
                                      </select>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Subject</label>
                                    <input type="text" class="form-control" name="subject" id="validationDefault01" placeholder="Subject" required>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="col-md-12 mb-3">
                                    <label for="exampleFormControlTextarea1">Message</label>
                                    <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
                                  </div>
                                </div>
                            
                                <div class="form-row">
                                  <label for="">Attachment</label>
                                  <div class="col-md-12 mb-3 custom-file">
                                    <input type="file" class="custom-file-input" name="attachment" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                  </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary" value="Submit Form">Send</button>
                            </div>
                          </form>
                          </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                      <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <div class="text-center">
                                        <h5 class="h3">
                                          {{ $employee->name }}
                                        </h5>
                                        <div class="h5 font-weight-300">
                                            @if ($employee->personal)
                                                {{ $employee->personal->address }}
                                            @else
                                               <small>Not set</small> 
                                            @endif
                                        </div>
                                        <div class="h5 mt-4">
                                            {{ $employee->role }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header border-0">
                      <div class="row align-items-center">
                        <div class="col">
                          <h3 class="mb-0">Documents</h3>
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <!-- Projects table -->
                      <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Document</th>
                            <th scope="col">Updated</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($employee->documents as $document)
                                <tr>
                                    <th scope="row">
                                      {{ $document->file }}
                                    </th>
                                    <td>
                                      <div class="d-flex align-items-center">
                                        <span class="mr-2">{{ $document->updated_at->diffForHumans() }}</span>
                                      </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">No documents</td>
                                </tr> 
                            @endforelse
                        </tbody>
                      </table>
                    </div>
                  </div>
              </div>
                <div class="col-xl-8 order-xl-1">
                    <div class="card">
                        <div class="card-header">
                              <div class="row align-items-center">
                                <div class="col-8">
                                  <h3 class="mb-0">Profile </h3>
                                </div>
                              </div>
                        </div>
                        <div class="card-body">
                            {{-- Personal Information --}}
                            <div class="pl-lg-2">
                                <h6 class="heading-small text-muted mb-4 text-center">Personal information</h6>
                                <div class="row d-flex justify-content-between px-2">
                                    <h6 class="heading-small text-muted mb-4"></h6>
                                </div>
                                @if (!empty($employee->personal))
                                    <div class="pl-lg-3">
                                        <div class="row row-cols-2 row-cols-md-4 mt-3">
                                            <div class="col mb-3 d-flex flex-column">
                                                <strong style="font-size: 1rem">Date of Birth</strong>
                                                <strong style="color: black; font-size: 1rem">{{ $employee->personal->date_of_birth }}</strong>
                                            </div>
                                            <div class="col mb-3 d-flex flex-column">
                                                <strong style="font-size: 1rem">Sex</strong>
                                                <strong style="color: black; font-size: 1rem">{{ $employee->personal->sex }}</strong>
                                            </div>
                                            <div class="col mb-3 d-flex flex-column">
                                                <strong style="font-size: 1rem">Citizenship</strong>
                                                <strong style="color: black; font-size: 1rem">{{ $employee->personal->citizenship }}</strong>
                                            </div>
                                            <div class="col mb-3 d-flex flex-column">
                                                <strong style="font-size: 1rem">Civil Status</strong>
                                                <strong style="color: black; font-size: 1rem">{{ $employee->personal->civil_status }}</strong>
                                            </div>
                                        </div>
                                        <div class="row row-cols-2 row-cols-md-4 mt-3">
                                            <div class="col mb-3 d-flex flex-column">
                                                <strong style="font-size: 1rem">Height</strong>
                                                <strong style="color: black; font-size: 1rem">{{ $employee->personal->height }}</strong>
                                            </div>
                                            <div class="col mb-3 d-flex flex-column">
                                                <strong style="font-size: 1rem">Weight</strong>
                                                <strong style="color: black; font-size: 1rem">{{ $employee->personal->weight }}</strong>
                                            </div>
                                            <div class="col mb-3 d-flex flex-column">
                                                <strong style="font-size: 1rem">Blood Type</strong>
                                                <strong style="color: black; font-size: 1rem">{{ $employee->personal->blood_type }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    {{-- Contact Information --}}
                                    <h6 class="heading-small text-muted mb-4">Contact information</h6>
                                    <div class="pl-lg-3">
                                        <div class="row row-cols-2 row-cols-md-2 mt-3">
                                            <div class="col mb-3 d-flex flex-column">
                                                <strong style="font-size: 1rem">Address</strong>
                                                <strong style="color: black; font-size: 1rem">{{ $employee->personal->address }}</strong>
                                            </div>
                                            <div class="col mb-3 d-flex flex-column">
                                                <strong style="font-size: 1rem">Zip</strong>
                                                <strong style="color: black; font-size: 1rem">{{ $employee->personal->zip_code }}</strong>
                                            </div>
                                        </div>
                                        <div class="row row-cols-2 row-cols-md-4 mt-3">
                                            <div class="col mb-3 d-flex flex-column">
                                                <strong style="font-size: 1rem">Telephone Number</strong>
                                                <strong style="color: black; font-size: 1rem">{{ $employee->personal->tel_number }}</strong>
                                            </div>
                                            <div class="col mb-3 d-flex flex-column">
                                                <strong style="font-size: 1rem">Cellphone number</strong>
                                                <strong style="color: black; font-size: 1rem">{{ $employee->personal->cell_number }}</strong>
                                            </div>
                                            <div class="col mb-3 d-flex flex-column">
                                                <strong style="font-size: 1rem">Email address</strong>
                                                <strong style="color: black; font-size: 1rem">{{ $employee->personal->email_address }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    {{-- Government IDs --}}
                                    <h6 class="heading-small text-muted mb-4">Government IDs</h6>
                                    <div class="pl-lg-2">
                                        <div class="row row-cols-2 row-cols-md-4 mt-3">
                                            <div class="col mb-3 d-flex flex-column">
                                                <strong style="font-size: 1rem">PRC</strong>
                                                <strong style="color: black; font-size: 1rem">{{ $employee->personal->prc }}</strong>
                                            </div>
                                            <div class="col mb-3 d-flex flex-column">
                                                <strong style="font-size: 1rem">GSIS</strong>
                                                <strong style="color: black; font-size: 1rem">{{ $employee->personal->gsis }}</strong>
                                            </div>
                                            <div class="col mb-3 d-flex flex-column">
                                                <strong style="font-size: 1rem">SSS</strong>
                                                <strong style="color: black; font-size: 1rem">{{ $employee->personal->sss }}</strong>
                                            </div>
                                        </div>
                                        <div class="row row-cols-2 row-cols-md-4 mt-3">
                                            <div class="col mb-3 d-flex flex-column">
                                                <strong style="font-size: 1rem">Pag-IBIG</strong>
                                                <strong style="color: black; font-size: 1rem">{{ $employee->personal->pag_ibig }}</strong>
                                            </div>
                                            <div class="col mb-3 d-flex flex-column">
                                                <strong style="font-size: 1rem">Driver's License</strong>
                                                <strong style="color: black; font-size: 1rem">{{ $employee->personal->driver_license }}</strong>
                                            </div>
                                            <div class="col mb-3 d-flex flex-column">
                                                <strong style="font-size: 1rem">PhilHealth</strong>
                                                <strong style="color: black; font-size: 1rem">{{ $employee->personal->phil_health }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <small class="text-muted font-italic text-center">No data</small>
                                    </div>
                                @endif
                                <hr class="my-4" />
                            </div>
                            {{-- Family Background --}}
                            <div class="pl-lg-2">
                                <h6 class="heading-small text-muted text-center">Family Background</h6>
                                @if (!empty($employee->family->spouse))
                                    <div class="row row-cols-1 row-cols-md-2 mt-3">
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Name</small>
                                            <strong style="color: black; font-size: 1rem">{{ $family->spouse->spouseFullname() }}</strong>
                                        </div>
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Occupation</small>
                                            <strong style="color: black; font-size: 1rem">{{ $family->spouse->occupation }}</strong>
                                        </div>
                                    </div>
                                    <div class="row row-cols-1 row-cols-md-2">
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Employer business name</small>
                                            <strong style="color: black; font-size: 1rem">{{ $family->spouse->employer_business_name}}</strong>
                                        </div>
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Business address</small>
                                            <strong style="color: black; font-size: 1rem">{{ $family->spouse->business_address }}</strong>
                                        </div>
                                    </div>
                                    <div class="row row-cols-1 row-cols-md-1">
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Telephone number</small>
                                            <strong style="color: black; font-size: 1rem">{{ $family->spouse->tel_no}}</strong>
                                        </div>
                                    </div>
                                @else
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <small class="text-muted font-italic text-center">No data</small>
                                    </div>
                                @endif
                                <hr class="my-4" />
                                @forelse ($family->children as $child)
                                    <div class="row row-cols-1 row-cols-md-2 mt-3">
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Name</small>
                                            <strong style="color: black; font-size: 1rem">{{ $child->name }}</strong>
                                        </div>
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Date of birth</small>
                                            <strong style="color: black; font-size: 1rem">{{ $child->date_of_birth }}</strong>
                                        </div>
                                    </div>
                                @empty
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <small class="text-muted font-italic text-center">No data</small>
                                    </div>
                                @endforelse
                                <hr class="my-4" />
                                @if (!empty($employee->family->mother))
                                    <div class="row row-cols-1 row-cols-md-2 mt-3">
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Name</small>
                                            <strong style="color: black; font-size: 1rem">{{ $family->mother->motherFullname() }}</strong>
                                        </div>
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Occupation</small>
                                            <strong style="color: black; font-size: 1rem">{{ $family->mother->occupation }}</strong>
                                        </div>
                                    </div>
                                    <div class="row row-cols-1 row-cols-md-2">
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Employer business name</small>
                                            <strong style="color: black; font-size: 1rem">{{ $family->mother->employer_business_name}}</strong>
                                        </div>
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Business address</small>
                                            <strong style="color: black; font-size: 1rem">{{ $family->mother->business_address }}</strong>
                                        </div>
                                    </div>
                                    <div class="row row-cols-1 row-cols-md-1">
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Telephone number</small>
                                            <strong style="color: black; font-size: 1rem">{{ $family->mother->tel_no}}</strong>
                                        </div>
                                    </div>
                                @else
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <small class="text-muted font-italic text-center">No data</small>
                                    </div>
                                @endif
                                <hr class="my-4" />
                                @if (!empty($employee->family->father))
                                    <div class="row row-cols-1 row-cols-md-2 mt-3">
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Name</small>
                                            <strong style="color: black; font-size: 1rem">{{ $family->father->fatherFullname() }}</strong>
                                        </div>
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Occupation</small>
                                            <strong style="color: black; font-size: 1rem">{{ $family->father->occupation }}</strong>
                                        </div>
                                    </div>
                                    <div class="row row-cols-1 row-cols-md-2">
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Employer business name</small>
                                            <strong style="color: black; font-size: 1rem">{{ $family->father->employer_business_name}}</strong>
                                        </div>
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Business address</small>
                                            <strong style="color: black; font-size: 1rem">{{ $family->father->business_address }}</strong>
                                        </div>
                                    </div>
                                    <div class="row row-cols-1 row-cols-md-1">
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Telephone number</small>
                                            <strong style="color: black; font-size: 1rem">{{ $family->father->tel_no}}</strong>
                                        </div>
                                    </div>
                                @else
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <small class="text-muted font-italic text-center">No data</small>
                                    </div>
                                @endif
                                <hr class="my-4" />
                            </div>
                            {{-- Educational background --}}
                            {{-- Elementary --}}
                            <div class="pl-lg-2">
                                <h6 class="heading-small text-muted text-center">Educational Background</h6>
                                @if (!empty($employee->education->elem))
                                    <div class="row row-cols-2 row-cols-md-4 mt-3">
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Name of school</small>
                                            <strong style="color: black; font-size: 1rem">{{ $educ->elem->name_of_school }}</strong>
                                        </div>
                                        @if(!empty($educ->elem->level_units_earned))
                                            <div class="col mb-3 d-flex flex-column">
                                                <small style="font-size: 1rem">Level units earned</small>
                                                <strong style="color: black; font-size: 1rem">{{ $educ->elem->level_units_earned }}</strong>
                                            </div>
                                        @endif
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Year graduated</small>
                                            <strong style="color: black; font-size: 1rem">{{ $educ->elem->sy_graduated }}</strong>
                                        </div>
                                        @if(!empty($educ->elem->academic_award))
                                            <div class="col mb-3 d-flex flex-column">
                                                <small style="font-size: 1rem">Academic award</small>
                                                <strong style="color: black; font-size: 1rem">{{ $educ->elem->academic_reward }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                @else
                                    <div class="col-md-12 d-flex justify-content-center p-5">
                                        <small class="text-muted font-italic text-center">No data</small>
                                    </div>
                                @endif
                                <hr class="my-4" />
                                {{-- Secondary --}}
                                @if (!empty($employee->education->sec))
                                    <div class="row row-cols-2 row-cols-md-4 mt-3">
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Name of school</small>
                                            <strong style="color: black; font-size: 1rem">{{ $educ->sec->name_of_school }}</strong>
                                        </div>
                                        @if(!empty($educ->sec->level_units_earned))
                                            <div class="col mb-3 d-flex flex-column">
                                                <small style="font-size: 1rem">Level units earned</small>
                                                <strong style="color: black; font-size: 1rem">{{ $educ->sec->level_units_earned }}</strong>
                                            </div>
                                        @endif
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Year graduated</small>
                                            <strong style="color: black; font-size: 1rem">{{ $educ->sec->sy_graduated }}</strong>
                                        </div>
                                        @if(!empty($educ->sec->academic_award))
                                            <div class="col mb-3 d-flex flex-column">
                                                <small style="font-size: 1rem">Academic award</small>
                                                <strong style="color: black; font-size: 1rem">{{ $educ->sec->academic_reward }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                @else
                                    <div class="col-md-12 d-flex justify-content-center p-5">
                                        <small class="text-muted font-italic text-center">No data</small>
                                    </div>
                                @endif
                                <hr class="my-4" />
                                {{-- College --}}
                                @if (!empty($employee->education->col))
                                    <div class="row row-cols-2 row-cols-md-4 mt-3">
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Name of school</small>
                                            <strong style="color: black; font-size: 1rem">{{ $educ->col->name_of_school }}</strong>
                                        </div>
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Course</small>
                                            <strong style="color: black; font-size: 1rem">{{ $educ->col->course_degree }}</strong>
                                        </div>
                                        @if(!empty($educ->col->level_units_earned))
                                            <div class="col mb-3 d-flex flex-column">
                                                <small style="font-size: 1rem">Level units earned</small>
                                                <strong style="color: black; font-size: 1rem">{{ $educ->col->level_units_earned }}</strong>
                                            </div>
                                        @endif
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Year graduated</small>
                                            <strong style="color: black; font-size: 1rem">{{ $educ->col->sy_graduated }}</strong>
                                        </div>
                                        @if(!empty($educatio->col->academic_award))
                                            <div class="col mb-3 d-flex flex-column">
                                                <small style="font-size: 1rem">Academic award</small>
                                                <strong style="color: black; font-size: 1rem">{{ $educ->col->academic_reward }}</strong>
                                            </div>
                                        @endIf
                                    </div>
                                @else
                                    <div class="col-md-12 d-flex justify-content-center p-5">
                                        <small class="text-muted font-italic text-center">No data</small>
                                    </div>
                                @endif
                                <hr class="my-4" />
                                {{-- Graduate Study --}}
                                @forelse ($educ->grad as $grad)
                                    <div class="row row-cols-2 row-cols-md-5 mt-3">
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Name of school</small>
                                            <strong style="color: black; font-size: 1rem">{{ $grad->name_of_school }}</strong>
                                        </div>
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Degree</small>
                                            <strong style="color: black; font-size: 1rem">{{ $grad->degree }}</strong>
                                        </div>
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Course</small>
                                            <strong style="color: black; font-size: 1rem">{{ $grad->course }}</strong>
                                        </div>
                                        @if(!empty($grad->level_units_earned))
                                            <div class="col mb-3 d-flex flex-column">
                                                <small style="font-size: 1rem">Level units earned</small>
                                                <strong style="color: black; font-size: 1rem">{{ $grad->level_units_earned }}</strong>
                                            </div>
                                        @endif
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Year graduated</small>
                                            <strong style="color: black; font-size: 1rem">{{ $grad->sy_graduated }}</strong>
                                        </div>
                                        @if(!empty($grad->academic_award))
                                            <div class="col mb-3 d-flex flex-column">
                                                <small style="font-size: 1rem">Academic award</small>
                                                <strong style="color: black; font-size: 1rem">{{ $grad->academic_reward }}</strong>
                                            </div>
                                        @endIf
                                    </div>
                                @empty
                                    <div class="col-md-12 d-flex justify-content-center p-5">
                                        <small class="text-muted font-italic text-center">No data</small>
                                    </div>
                                @endforelse
                                <hr class="my-4" />
                            </div>
                            {{-- Work Experience --}}
                            <div class="pl-lg-2">
                                <h6 class="heading-small text-muted mb-4 text-center">Work Experience</h6>
                                @forelse ($employee->experiences as $experience)
                                    <div class="row row-cols-2 row-cols-md-5 mt-3">
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Duration</small>
                                            <strong style="color: black; font-size: 1rem">{{ $experience->duration }}</strong>
                                        </div>
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Work Description</small>
                                            <strong style="color: black; font-size: 1rem">{{ $experience->work_description }}</strong>
                                        </div>
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Work Place</small>
                                            <strong style="color: black; font-size: 1rem">{{ $experience->work_place }}</strong>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-md-12 d-flex justify-content-center p-5">
                                        <small class="text-muted font-italic text-center">No data</small>
                                    </div>
                                @endforelse
                            </div>
                            {{-- Training Programs --}}
                            <hr class="my-4" />
                            <div class="pl-lg-2">
                                <h6 class="heading-small text-muted mb-4 text-center">Training Programs</h6>
                                @forelse ($employee->trainings as $training)
                                    <div class="row row-cols-2 row-cols-md-5 mt-3">
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Title</small>
                                            <strong style="color: black; font-size: 1rem">{{ $training->training_title }}</strong>
                                        </div>
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Date</small>
                                            <strong style="color: black; font-size: 1rem">{{ $training->training_date }}</strong>
                                        </div>
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Sponsor</small>
                                            <strong style="color: black; font-size: 1rem">{{ $training->training_sponsor }}</strong>
                                        </div>
                                        <div class="col mb-3 d-flex flex-column">
                                            <small style="font-size: 1rem">Certificate</small>
                                            <strong style="color: black; font-size: 1rem">{{ $training->training_certificate }}</strong>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-md-12 d-flex justify-content-center p-5">
                                        <small class="text-muted font-italic text-center">No data</small>
                                    </div>
                                @endforelse
                            </div>
                            {{-- Voluntary Works --}}
                            <hr class="my-4" />
                            <div class="pl-lg-2">
                                <h6 class="heading-small text-muted mb-4 text-center">Voluntary Works</h6>
                                @if (!empty($employee->voluntary_works))
                                    @foreach ($employee->voluntary_works as $voluntary)
                                        <div class="row row-cols-2 row-cols-md-5 mt-3">
                                            <div class="col mb-3 d-flex flex-column">
                                                <small style="font-size: 1rem">NAME OF ORGANIZATION</small>
                                                <strong style="color: black; font-size: 1rem">{{ $voluntary->name_address }}</strong>
                                            </div>
                                            <div class="col mb-3 d-flex flex-column">
                                                <small style="font-size: 1rem">PERIOD OF ATTENDANCE</small>
                                                <strong style="color: black; font-size: 1rem">{{ $voluntary->duration }}</strong>
                                            </div>
                                            <div class="col mb-3 d-flex flex-column">
                                                <small style="font-size: 1rem">NUMBER OF HOURS</small>
                                                <strong style="color: black; font-size: 1rem">{{ $voluntary->no_hours }}</strong>
                                            </div>
                                            <div class="col mb-3 d-flex flex-column">
                                                <small style="font-size: 1rem">NATURE OF WORK</small>
                                                <strong style="color: black; font-size: 1rem">{{ $voluntary->position }}</strong>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-md-12 d-flex justify-content-center p-5">
                                        <small class="text-muted font-italic text-center">No data</small>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
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