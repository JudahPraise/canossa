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

    {{-- Header --}}
    <div class="container-fluid m-0 p-0">
        <!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{ asset('img/canossa.jpg') }}); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
          <div class="row p-3">
            <div class="col-lg-7 col-md-10">
              <h1 class="display-2 text-white">Hello {{ auth()->user()->personal->first_name }}</h1>
              <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
              <a href="#!" class="btn btn-neutral">Edit profile</a>
            </div>
          </div>
        </div>
    </div>

      <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
          <div class="col-xl-4 order-xl-2">
            <div class="card card-profile">
              <img src="{{ asset('argon/img/theme/img-1-1000x600.jpg') }}" alt="Image placeholder" class="card-img-top">
              <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                    <div class="card-profile-image">
                        <a href="#">
                          <img src="{{ asset('argon/img/theme/team-4.jpg') }}" class="rounded-circle">
                        </a>
                    </div>
                </div>
              </div>
              <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                <div class="d-flex justify-content-between">
                  <a href="#" class="btn btn-sm btn-info  mr-4 ">Connect</a>
                  <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                </div>
              </div>
              <div class="card-body pt-0">
                <div class="row">
                  <div class="col">
                    <div class="card-profile-stats d-flex justify-content-center">
                      <div>
                        <span class="heading">22</span>
                        <span class="description">Friends</span>
                      </div>
                      <div>
                        <span class="heading">10</span>
                        <span class="description">Photos</span>
                      </div>
                      <div>
                        <span class="heading">89</span>
                        <span class="description">Comments</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <h5 class="h3">
                    {{ $employee->personal->fullName() }}
                  </h5>
                  <div class="h5 font-weight-300">
                    <i class="ni location_pin mr-2"></i>Bucharest, Romania
                  </div>
                  <div class="h5 mt-4">
                    <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                  </div>
                  <div>
                    <i class="ni education_hat mr-2"></i>University of Computer Science
                  </div>
                </div>
              </div>
            </div>
          </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card">
                    <div class="card-header">
                          <div class="row align-items-center">
                            <div class="col-8">
                              <h3 class="mb-0">Edit profile </h3>
                            </div>
                            <div class="col-4 text-right">
                              <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                            </div>
                          </div>
                    </div>
                    <div class="card-body">
                        {{-- Personal Information --}}
                        <div class="row d-flex justify-content-between">
                            <h6 class="heading-small text-muted mb-4 ml-3">Personal information</h6>
                            <div>
                                <button class="btn btn-icon btn-danger" type="button">
                                    <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                </button>
                                <a  href="{{ route('personal.edit', Auth::user()->id) }}" {{ !empty(auth()->user()->personal()) ? '' : ' btn-disabled' }} class="btn btn-icon btn-info" type="button">
                                    <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                                </a>
                            </div>
                        </div>
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
                        <div class="pl-lg-4">
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
                        <hr class="my-4" />
                        {{-- Family Background --}}
                        <div class="pl-lg-4">
                            <div class="row d-flex justify-content-between">
                                <h6 class="heading-small text-muted mb-4 ml-3">Spouse</h6>
                                <div>
                                    <button class="btn btn-icon btn-danger" type="button">
                                        <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                    </button>
                                    <a  href="{{ route('spouse.edit', Auth::user()->id) }}" {{ !empty(auth()->user()->family->spouse) ? '' : ' btn-disabled' }} class="btn btn-icon btn-info" type="button">
                                        <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                                    </a>
                                </div>
                            </div>
                            <div class="row row-cols-1 row-cols-md-2 mt-3">
                                <div class="col mb-3 d-flex flex-column">
                                    <strong style="font-size: 1rem">Name</strong>
                                    @if (!empty(auth()->user()->family->spouse))
                                        <strong style="color: black; font-size: 1rem">{{ $family->spouse->spouseFullname() }}</strong>
                                    @else
                                        <strong style="color: black; font-size: 1rem">Not set</strong>
                                    @endif
                                </div>
                                <div class="col mb-3 d-flex flex-column">
                                    <strong style="font-size: 1rem">Occupation</strong>
                                    @if (!empty(auth()->user()->family->spouse))
                                        <strong style="color: black; font-size: 1rem">{{ $family->spouse->occupation }}</strong>
                                    @else
                                        <strong style="color: black; font-size: 1rem">Not set</strong>
                                    @endif
                                </div>
                            </div>
                            <div class="row row-cols-1 row-cols-md-2">
                                <div class="col mb-3 d-flex flex-column">
                                    <strong style="font-size: 1rem">Employer business name</strong>
                                    @if (!empty(auth()->user()->family->spouse))
                                        <strong style="color: black; font-size: 1rem">{{ $family->spouse->employer_business_name}}</strong>
                                    @else
                                        <strong style="color: black; font-size: 1rem">Not set</strong>
                                    @endif
                                </div>
                                <div class="col mb-3 d-flex flex-column">
                                    <strong style="font-size: 1rem">Business address</strong>
                                    @if (!empty(auth()->user()->family->spouse))
                                        <strong style="color: black; font-size: 1rem">{{ $family->spouse->business_address }}</strong>
                                    @else
                                        <strong style="color: black; font-size: 1rem">Not set</strong>
                                    @endif
                                </div>
                            </div>
                            <div class="row row-cols-1 row-cols-md-1">
                                <div class="col mb-3 d-flex flex-column">
                                    <strong style="font-size: 1rem">Telephone number</strong>
                                    @if (!empty(auth()->user()->family->spouse))
                                        <strong style="color: black; font-size: 1rem">{{ $family->spouse->tel_no}}</strong>
                                    @else
                                        <strong style="color: black; font-size: 1rem">Not set</strong>
                                    @endif
                                </div>
                            </div>
                            <hr class="my-4" />
                            <div class="row d-flex justify-content-between">
                                <h6 class="heading-small text-muted mb-4 ml-3">Children</h6>
                                <div>
                                    <button class="btn btn-icon btn-danger" type="button">
                                        <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                    </button>
                                    <a  href="{{ route('children.edit', Auth::user()->id) }}" {{ !empty(auth()->user()->family->children) ? '' : ' btn-disabled' }} class="btn btn-icon btn-info" type="button">
                                        <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                                    </a>
                                </div>
                            </div>
                            @forelse ($family->children as $child)
                                <div class="row row-cols-1 row-cols-md-2 mt-3">
                                    <div class="col mb-3 d-flex flex-column">
                                        <strong style="font-size: 1rem">Name</strong>
                                        <strong style="color: black; font-size: 1rem">{{ $child->name }}</strong>
                                    </div>
                                    <div class="col mb-3 d-flex flex-column">
                                        <strong style="font-size: 1rem">Date of birth</strong>
                                        <strong style="color: black; font-size: 1rem">{{ $child->date_of_birth }}</strong>
                                    </div>
                                </div>
                            @empty

                            @endforelse
                            <hr class="my-4" />
                            <div class="row d-flex justify-content-between">
                                <h6 class="heading-small text-muted mb-4 ml-3">Mother</h6>
                                <div>
                                    <button class="btn btn-icon btn-danger" type="button">
                                        <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                    </button>
                                    <a  href="{{ route('mother.edit', Auth::user()->id) }}" {{ !empty(auth()->user()->family->mother) ? '' : ' btn-disabled' }} class="btn btn-icon btn-info" type="button">
                                        <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                                    </a>
                                </div>
                            </div>
                            <div class="row row-cols-1 row-cols-md-2 mt-3">
                                <div class="col mb-3 d-flex flex-column">
                                    <strong style="font-size: 1rem">Name</strong>
                                    @if (!empty(auth()->user()->family->mother))
                                        <strong style="color: black; font-size: 1rem">{{ $family->mother->motherFullname() }}</strong>
                                    @else
                                        <strong style="color: black; font-size: 1rem">Not set</strong>
                                    @endif
                                </div>
                                <div class="col mb-3 d-flex flex-column">
                                    <strong style="font-size: 1rem">Occupation</strong>
                                    @if (!empty(auth()->user()->family->mother))
                                        <strong style="color: black; font-size: 1rem">{{ $family->mother->occupation }}</strong>
                                    @else
                                        <strong style="color: black; font-size: 1rem">Not set</strong>
                                    @endif
                                </div>
                            </div>
                            <div class="row row-cols-1 row-cols-md-2">
                                <div class="col mb-3 d-flex flex-column">
                                    <strong style="font-size: 1rem">Employer business name</strong>
                                    @if (!empty(auth()->user()->family->mother))
                                        <strong style="color: black; font-size: 1rem">{{ $family->mother->employer_business_name}}</strong>
                                    @else
                                        <strong style="color: black; font-size: 1rem">Not set</strong>
                                    @endif
                                </div>
                                <div class="col mb-3 d-flex flex-column">
                                    <strong style="font-size: 1rem">Business address</strong>
                                    @if (!empty(auth()->user()->family->mother))
                                        <strong style="color: black; font-size: 1rem">{{ $family->mother->business_address }}</strong>
                                    @else
                                        <strong style="color: black; font-size: 1rem">Not set</strong>
                                    @endif

                                </div>
                            </div>
                            <div class="row row-cols-1 row-cols-md-1">
                                <div class="col mb-3 d-flex flex-column">
                                    <strong style="font-size: 1rem">Telephone number</strong>
                                    @if (!empty(auth()->user()->family->mother))
                                        <strong style="color: black; font-size: 1rem">{{ $family->mother->tel_no}}</strong>
                                    @else
                                        <strong style="color: black; font-size: 1rem">Not set</strong>
                                    @endif
                                </div>
                            </div>
                            <hr class="my-4" />
                            <div class="row d-flex justify-content-between">
                                <h6 class="heading-small text-muted mb-4 ml-3">Father</h6>
                                <div>
                                    <button class="btn btn-icon btn-danger" type="button">
                                        <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                    </button>
                                    <a  href="{{ route('father.edit', Auth::user()->id) }}" {{ !empty(auth()->user()->family->father) ? '' : ' btn-disabled' }} class="btn btn-icon btn-info" type="button">
                                        <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                                    </a>
                                </div>
                            </div>
                            <div class="row row-cols-1 row-cols-md-2 mt-3">
                                <div class="col mb-3 d-flex flex-column">
                                    <strong style="font-size: 1rem">Name</strong>
                                    @if (!empty(auth()->user()->family->father))
                                        <strong style="color: black; font-size: 1rem">{{ $family->father->fatherFullname() }}</strong>
                                    @else
                                        <strong style="color: black; font-size: 1rem">Not set</strong>
                                    @endif
                                </div>
                                <div class="col mb-3 d-flex flex-column">
                                    <strong style="font-size: 1rem">Occupation</strong>
                                    @if (!empty(auth()->user()->family->father))
                                        <strong style="color: black; font-size: 1rem">{{ $family->father->occupation }}</strong>
                                    @else
                                        <strong style="color: black; font-size: 1rem">Not set</strong>
                                    @endif
                                </div>
                            </div>
                            <div class="row row-cols-1 row-cols-md-2">
                                <div class="col mb-3 d-flex flex-column">
                                    <strong style="font-size: 1rem">Employer business name</strong>
                                    @if (!empty(auth()->user()->family->father))
                                        <strong style="color: black; font-size: 1rem">{{ $family->father->employer_business_name}}</strong>
                                    @else
                                        <strong style="color: black; font-size: 1rem">Not set</strong>
                                    @endif
                                </div>
                                <div class="col mb-3 d-flex flex-column">
                                    <strong style="font-size: 1rem">Business address</strong>
                                    @if (!empty(auth()->user()->family->father))
                                        <strong style="color: black; font-size: 1rem">{{ $family->father->business_address }}</strong>
                                    @else
                                        <strong style="color: black; font-size: 1rem">Not set</strong>
                                    @endif

                                </div>
                            </div>
                            <div class="row row-cols-1 row-cols-md-1">
                                <div class="col mb-3 d-flex flex-column">
                                    <strong style="font-size: 1rem">Telephone number</strong>
                                    @if (!empty(auth()->user()->family->father))
                                        <strong style="color: black; font-size: 1rem">{{ $family->father->tel_no}}</strong>
                                    @else
                                        <strong style="color: black; font-size: 1rem">Not set</strong>
                                    @endif
                                </div>
                            </div>
                            {{-- Educational background --}}
                            <hr class="my-4" />
                            {{-- Elementary --}}
                            <div class="pl-lg-2">
                                <h6 class="heading-small text-muted">Educational Background</h6>
                                <div class="row d-flex justify-content-between">
                                    <h6 class="heading-small text-muted mb-4 ml-3">Elementary</h6>
                                    <div class="d-flex flex-row align-items-center">
                                        <form class="mr-2" action="{{ !empty(auth()->user()->education->elem) ? route('elem.delete', $educ->elem->id) : '#' }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-icon btn-danger" type="submit">
                                                <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                            </button>
                                        </form>
                                        <a  href="{{ route('father.edit', Auth::user()->id) }}" {{ !empty(auth()->user()->family->father) ? '' : ' btn-disabled' }} class="btn btn-icon btn-info" type="button">
                                            <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                                        </a>
                                    </div>
                                </div>
                                @if (!empty(auth()->user()->education->elem))
                                    <div class="row row-cols-2 row-cols-md-4 mt-3">
                                        <div class="col mb-3 d-flex flex-column">
                                            <strong style="font-size: 1rem">Name of school</strong>
                                            <strong style="color: black; font-size: 1rem">{{ $educ->elem->name_of_school }}</strong>
                                        </div>
                                        @if(!empty($educ->elem->level_units_earned))
                                            <div class="col mb-3 d-flex flex-column">
                                                <strong style="font-size: 1rem">Level units earned</strong>
                                                <strong style="color: black; font-size: 1rem">{{ $educ->elem->level_units_earned }}</strong>
                                            </div>
                                        @endif
                                        <div class="col mb-3 d-flex flex-column">
                                            <strong style="font-size: 1rem">Year graduated</strong>
                                            <strong style="color: black; font-size: 1rem">{{ $educ->elem->sy_graduated }}</strong>
                                        </div>
                                        @if(!empty($educ->elem->academic_award))
                                            <div class="col mb-3 d-flex flex-column">
                                                <strong style="font-size: 1rem">Academic award</strong>
                                                <strong style="color: black; font-size: 1rem">{{ $educ->elem->academic_reward }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                @else
                                    <div class="col-md-12 d-flex justify-content-center p-5">
                                        <strong class="text-muted font-italic text-center">No data</strong>
                                    </div>
                                @endif
                                <hr class="my-4" />
                                {{-- Secondary --}}
                                <div class="row d-flex justify-content-between">
                                    <h6 class="heading-small text-muted mb-4 ml-3">Secondary</h6>
                                    <div class="d-flex flex-row align-items-center">
                                        <form class="mr-2" action="{{ !empty(auth()->user()->education->sec) ? route('sec.delete', $educ->sec->id) : "#" }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-icon btn-danger" type="submit">
                                                <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                            </button>
                                        </form>
                                        <a href="{{  !empty(auth()->user()->education->sec) ? route('sec.edit', $educ->sec->id ) : '#' }}" class="btn btn-icon btn-info" type="button">
                                            <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                                        </a>
                                    </div>
                                </div>
                                @if (!empty(auth()->user()->education->sec))
                                    <div class="row row-cols-2 row-cols-md-4 mt-3">
                                        <div class="col mb-3 d-flex flex-column">
                                            <strong style="font-size: 1rem">Name of school</strong>
                                            <strong style="color: black; font-size: 1rem">{{ $educ->sec->name_of_school }}</strong>
                                        </div>
                                        @if(!empty($educ->sec->level_units_earned))
                                            <div class="col mb-3 d-flex flex-column">
                                                <strong style="font-size: 1rem">Level units earned</strong>
                                                <strong style="color: black; font-size: 1rem">{{ $educ->sec->level_units_earned }}</strong>
                                            </div>
                                        @endif
                                        <div class="col mb-3 d-flex flex-column">
                                            <strong style="font-size: 1rem">Year graduated</strong>
                                            <strong style="color: black; font-size: 1rem">{{ $educ->sec->sy_graduated }}</strong>
                                        </div>
                                        @if(!empty($educ->sec->academic_award))
                                            <div class="col mb-3 d-flex flex-column">
                                                <strong style="font-size: 1rem">Academic award</strong>
                                                <strong style="color: black; font-size: 1rem">{{ $educ->sec->academic_reward }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                @else
                                    <div class="col-md-12 d-flex justify-content-center p-5">
                                        <strong class="text-muted font-italic text-center">No data</strong>
                                    </div>
                                @endif
                                <hr class="my-4" />
                                {{-- College --}}
                                <div class="row d-flex justify-content-between">
                                    <h6 class="heading-small text-muted mb-4 ml-3">College</h6>
                                    <div class="d-flex flex-row align-items-center">
                                        <form  class="mr-2" action="{{ !empty(auth()->user()->education->col) ? route('col.delete', $educ->col->id) : '#' }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-icon btn-danger" type="submit">
                                                <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                            </button>
                                        </form>
                                        <a href="{{ !empty(auth()->user()->education->col) ? route('col.edit', $educ->col->id ) : '#' }}" class="btn btn-icon btn-info" type="button">
                                            <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                                        </a>
                                    </div>
                                </div>
                                @if (!empty(auth()->user()->education->col))
                                    <div class="row row-cols-2 row-cols-md-4 mt-3">
                                        <div class="col mb-3 d-flex flex-column">
                                            <strong style="font-size: 1rem">Name of school</strong>
                                            <strong style="color: black; font-size: 1rem">{{ $educ->col->name_of_school }}</strong>
                                        </div>
                                        <div class="col mb-3 d-flex flex-column">
                                            <strong style="font-size: 1rem">Course</strong>
                                            <strong style="color: black; font-size: 1rem">{{ $educ->col->course_degree }}</strong>
                                        </div>
                                        @if(!empty($educ->col->level_units_earned))
                                            <div class="col mb-3 d-flex flex-column">
                                                <strong style="font-size: 1rem">Level units earned</strong>
                                                <strong style="color: black; font-size: 1rem">{{ $educ->col->level_units_earned }}</strong>
                                            </div>
                                        @endif
                                        <div class="col mb-3 d-flex flex-column">
                                            <strong style="font-size: 1rem">Year graduated</strong>
                                            <strong style="color: black; font-size: 1rem">{{ $educ->col->sy_graduated }}</strong>
                                        </div>
                                        @if(!empty($educatio->col->academic_award))
                                            <div class="col mb-3 d-flex flex-column">
                                                <strong style="font-size: 1rem">Academic award</strong>
                                                <strong style="color: black; font-size: 1rem">{{ $educ->col->academic_reward }}</strong>
                                            </div>
                                        @endIf
                                    </div>
                                @else
                                    <div class="col-md-12 d-flex justify-content-center p-5">
                                        <strong class="text-muted font-italic text-center">No data</strong>
                                    </div>
                                @endif
                                <hr class="my-4" />
                                {{-- Graduate Study --}}
                                <div class="row d-flex justify-content-between">
                                    <h6 class="heading-small text-muted mb-4 ml-3">Graduate Study</h6>
                                    <div class="d-flex flex-row align-items-center">
                                        <form  class="mr-2" action="{{ !empty(auth()->user()->education->grad->first()) ? route('grad.delete', auth()->user()->education->id) : '#' }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-icon btn-danger" type="submit">
                                                <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                            </button>
                                        </form>
                                        <a href="{{ !empty(auth()->user()->education->grad->first()) ? route('grad.edit', auth()->user()->education->id ) : '#' }}" class="btn btn-icon btn-info" type="button">
                                            <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                                        </a>
                                    </div>
                                </div>
                                @if (!empty(auth()->user()->education->grad->first()))
                                    @foreach ($educ->grad as $grad)
                                        <div class="row row-cols-2 row-cols-md-5 mt-3">
                                            <div class="col mb-3 d-flex flex-column">
                                                <strong style="font-size: 1rem">Name of school</strong>
                                                <strong style="color: black; font-size: 1rem">{{ $grad->name_of_school }}</strong>
                                            </div>
                                            <div class="col mb-3 d-flex flex-column">
                                                <strong style="font-size: 1rem">Degree</strong>
                                                <strong style="color: black; font-size: 1rem">{{ $grad->degree }}</strong>
                                            </div>
                                            <div class="col mb-3 d-flex flex-column">
                                                <strong style="font-size: 1rem">Course</strong>
                                                <strong style="color: black; font-size: 1rem">{{ $grad->course }}</strong>
                                            </div>
                                            @if(!empty($grad->level_units_earned))
                                                <div class="col mb-3 d-flex flex-column">
                                                    <strong style="font-size: 1rem">Level units earned</strong>
                                                    <strong style="color: black; font-size: 1rem">{{ $grad->level_units_earned }}</strong>
                                                </div>
                                            @endif
                                            <div class="col mb-3 d-flex flex-column">
                                                <strong style="font-size: 1rem">Year graduated</strong>
                                                <strong style="color: black; font-size: 1rem">{{ $grad->sy_graduated }}</strong>
                                            </div>
                                            @if(!empty($grad->academic_award))
                                                <div class="col mb-3 d-flex flex-column">
                                                    <strong style="font-size: 1rem">Academic award</strong>
                                                    <strong style="color: black; font-size: 1rem">{{ $grad->academic_reward }}</strong>
                                                </div>
                                            @endIf
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-md-12 d-flex justify-content-center p-5">
                                        <strong class="text-muted font-italic text-center">No data</strong>
                                    </div>
                                @endif
                            </div>
                            {{-- Educational background --}}
                            <hr class="my-4" />
                            {{-- Elementary --}}
                            <div class="pl-lg-2">
                                <h6 class="heading-small text-muted">Work Experience</h6>
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