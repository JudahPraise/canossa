@extends('admin.employees.index')

@section('employee')
<div class="row">
    <div class="col-xl-12 order-xl-1">
        <div class="card-body mt-5">
            <div class="pl-lg-4">
                <div class="row">
                    <div class="card card-profile w-100 px-3">
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
                          <a href="#" class="btn btn-sm btn-info  mr-4 ">Download CV</a>
                          <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                        </div>
                      </div>
                      <div class="card-body pt-0">
                          <div class="text-center">
                            <h5 class="h3">
                              {{ $employee->personal->fullName() }}<span class="font-weight-light">, 27</span>
                            </h5>
                            <div class="h5 font-weight-300">
                              <i class="ni location_pin mr-2"></i>{{ $employee->email }}
                            </div>
                            <div class="h5 mt-4">
                              <i class="ni business_briefcase-24 mr-2"></i>{{ $employee->role }}
                            </div>
                            <div>
                              <i class="ni education_hat mr-2"></i>{{ $employee->department }}
                            </div>
                          </div>
                        </div>
                        <hr class="my-4" />
                        <!-- Address -->
                        <div class="row d-flex justify-content-center">
                            <h6 class="heading-small text-muted mb-4">Documents</h6>
                        </div>
                        <div class="pl-lg-4">
                            <div class="table-responsive">
                                <!-- Projects table -->
                                  <table class="table align-items-center table-flush">
                                      <thead class="thead-light">
                                        <tr>
                                          <th scope="col">Document</th>
                                          <th scope="col">Filename</th>
                                          <th scope="col">Type</th>
                                          <th scope="col"></th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                          @forelse ($employee->documents as $document)
                                              <tr>
                                                  <th scope="row">
                                                    {{ $document->type }}
                                                  </th>
                                                  <td>
                                                    {{ $document->file }}
                                                  </td>
                                                  <td>
                                                    {{ $document->extension }}
                                                  </td>
                                                  <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="mr-2">{{ $document->updated_at->diffForHumans() }}</span>
                                                    </div>
                                                  </td>
                                              </tr>
                                          @empty
                                              <tr class="text-center">
                                                  <td colspan="4">No document</td>
                                              </tr>
                                          @endforelse
                                      </tbody>
                                  </table>
                              </div>
                        </div>
                      <hr class="my-4" />
                      <!-- Address -->
                      <div class="row d-flex flex-column align-items-center justify-content-center mb-4">
                          <h6 class="heading-small text-muted">Personal information</h6>
                          <span style="font-size: .8rem">{{ 'Updated'.$employee->personal->updated_at->diffForHumans() }}</span>
                      </div>
                      <div class="pl-lg-4">
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
                          <div class="row d-flex justify-content-center">
                              <h6 class="heading-small text-muted mb-4">Contact information</h6>
                          </div>
                          <div class="pl-lg-4">
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
                          <div class="row d-flex justify-content-center">
                              <h6 class="heading-small text-muted mb-4">Government IDs</h6>
                          </div>
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
                              <div class="row d-flex justify-content-center">
                                  <h6 class="heading-small text-muted mb-4 ml-3">Spouse</h6>
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
                              <div class="row d-flex justify-content-center">
                                  <h6 class="heading-small text-muted mb-4 ml-3">Children</h6>
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
                              <div class="row d-flex justify-content-center">
                                  <h6 class="heading-small text-muted mb-4 ml-3">Mother</h6>
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
                              <div class="row d-flex justify-content-center">
                                  <h6 class="heading-small text-muted mb-4 ml-3">Father</h6>
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
                          </div>
                          <hr class="my-4" />
                          {{-- Family Background --}}
                          <div class="pl-lg-4">
                              <div class="row d-flex justify-content-center">
                                  <h6 class="heading-small text-muted mb-4 ml-3">Elementary</h6>
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
                              <div class="row d-flex justify-content-center">
                                  <h6 class="heading-small text-muted mb-4 ml-3">Secondary</h6>
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
                              <div class="row d-flex justify-content-center">
                                  <h6 class="heading-small text-muted mb-4 ml-3">College</h6>
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
                              <div class="row d-flex justify-content-center">
                                  <h6 class="heading-small text-muted mb-4 ml-3">Graduate Study</h6>
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
                          {{-- Work Experience --}}
                          <hr class="my-4" />
                          <div class="pl-lg-2">
                              <div class="row d-flex justify-content-center">
                                  <h6 class="heading-small text-muted mb-4 ml-3">Work Experience</h6>
                              </div>
                              @if (!empty(auth()->user()->experiences->first()))
                                  @foreach ($employee->experiences as $experience)
                                      <div class="row row-cols-2 row-cols-md-5 mt-3">
                                          <div class="col mb-3 d-flex flex-column">
                                              <strong style="font-size: 1rem">Duration</strong>
                                              <strong style="color: black; font-size: 1rem">{{ $experience->duration }}</strong>
                                          </div>
                                          <div class="col mb-3 d-flex flex-column">
                                              <strong style="font-size: 1rem">Work Description</strong>
                                              <strong style="color: black; font-size: 1rem">{{ $experience->work_description }}</strong>
                                          </div>
                                          <div class="col mb-3 d-flex flex-column">
                                              <strong style="font-size: 1rem">Work Place</strong>
                                              <strong style="color: black; font-size: 1rem">{{ $experience->work_place }}</strong>
                                          </div>
                                      </div>
                                  @endforeach
                              @else
                                  <div class="col-md-12 d-flex justify-content-center p-5">
                                      <strong class="text-muted font-italic text-center">No data</strong>
                                  </div>
                              @endif
                          </div>
                          {{-- Training Programs --}}
                          <hr class="my-4" />
                          <div class="pl-lg-2">
                              <div class="row d-flex justify-content-center">
                                  <h6 class="heading-small text-muted mb-4 ml-3">Training Programs</h6>
                              </div>
                              @if (!empty(auth()->user()->trainings->first()))
                                  @foreach ($employee->trainings as $training)
                                      <div class="row row-cols-2 row-cols-md-5 mt-3">
                                          <div class="col mb-3 d-flex flex-column">
                                              <strong style="font-size: 1rem">Title</strong>
                                              <strong style="color: black; font-size: 1rem">{{ $training->training_title }}</strong>
                                          </div>
                                          <div class="col mb-3 d-flex flex-column">
                                              <strong style="font-size: 1rem">Date</strong>
                                              <strong style="color: black; font-size: 1rem">{{ $training->training_date }}</strong>
                                          </div>
                                          <div class="col mb-3 d-flex flex-column">
                                              <strong style="font-size: 1rem">Sponsor</strong>
                                              <strong style="color: black; font-size: 1rem">{{ $training->training_sponsor }}</strong>
                                          </div>
                                          <div class="col mb-3 d-flex flex-column">
                                              <strong style="font-size: 1rem">Certificate</strong>
                                              <strong style="color: black; font-size: 1rem">{{ $training->training_certificate }}</strong>
                                          </div>
                                          <div class="col mb-3 d-flex align-items-center">
                                              <a class="btn btn-icon btn-success btn-sm" type="submit">
                                                  <span class="btn-inner--icon text-white"><i class="fas fa-download"></i></span>
                                              </a>
                                          </div>
                                      </div>
                                  @endforeach
                              @else
                                  <div class="col-md-12 d-flex justify-content-center p-5">
                                      <strong class="text-muted font-italic text-center">No data</strong>
                                  </div>
                              @endif
                          </div>
                          {{-- Voluntary Works --}}
                          <hr class="my-4" />
                          <div class="pl-lg-2">
                              <div class="row d-flex justify-content-center">
                                  <h6 class="heading-small text-muted mb-4 ml-3">Training Programs</h6>
                              </div>
                              @if (!empty(auth()->user()->trainings->first()))
                                  @foreach ($employee->voluntary_works as $voluntary)
                                      <div class="row row-cols-2 row-cols-md-5 mt-3">
                                          <div class="col mb-3 d-flex flex-column">
                                              <strong style="font-size: 1rem">NAME OF ORGANIZATION</strong>
                                              <strong style="color: black; font-size: 1rem">{{ $voluntary->name_address }}</strong>
                                          </div>
                                          <div class="col mb-3 d-flex flex-column">
                                              <strong style="font-size: 1rem">PERIOD OF ATTENDANCE</strong>
                                              <strong style="color: black; font-size: 1rem">{{ $voluntary->duration }}</strong>
                                          </div>
                                          <div class="col mb-3 d-flex flex-column">
                                              <strong style="font-size: 1rem">NUMBER OF HOURS</strong>
                                              <strong style="color: black; font-size: 1rem">{{ $voluntary->no_hours }}</strong>
                                          </div>
                                          <div class="col mb-3 d-flex flex-column">
                                              <strong style="font-size: 1rem">NATURE OF WORK</strong>
                                              <strong style="color: black; font-size: 1rem">{{ $voluntary->position }}</strong>
                                          </div>
                                      </div>
                                  @endforeach
                              @else
                                  <div class="col-md-12 d-flex justify-content-center p-5">
                                      <strong class="text-muted font-italic text-center">No data</strong>
                                  </div>
                              @endif
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection