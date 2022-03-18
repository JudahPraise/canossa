@extends('employee.layouts.home')

@section('css')
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('argon/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('argon/css/argon.css?v=1.2.0') }}" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/orbitcss/css/orbit.css">
@endsection

@section('employee-home')
<div class="container-fluid">
    <div class="row w-100 m-0">
        <div class="card has-no-shadow w-100">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Resume</h3>
                </div>
                <div class="col text-right">
                    <a class="btn btn-icon btn-success text-white" type="button" id="download">
                        <span class="btn-inner--icon"><i class="fas fa-cloud-download-alt"></i></span>
                        <span class="btn-inner--text">Download Resume</span>
                    </a>
                </div>
              </div>
            </div>
            <div class="row d-flex justify-content-center p-3">
                <div class="card p-3" id="paper">
                    <div class="container p-2" style="width: 8.5in;">
                        <div class="row row-cols-2 row-cols-md-2 w-100">
                            <div class="col-3 col-md-3">
                                <div class="image is-medium-square">
                                    @if (!empty($employee->image))
                                        <img src="{{ asset( 'storage/images/'.$employee->image) }}">
                                    @else
                                        <img src="{{ asset(auth()->user()->sex === 'Mphp ar' ? 'img/default-male.svg' : 'img/default-female.svg') }}">
                                    @endif
                                </div>
                            </div>
                            <div class="col-8 col-md-8">
                                <strong style="font-size: 2rem">{{ $employee->fullName() }}</strong><br>
                                <small class="font-weight-bold" style="font-size: .9rem">{{ !empty($employee->personal->address) ? $employee->personal->address : 'No data' }}</small>
                                <small class="font-weight-bold" style="font-size: .9rem">{{ !empty($employee->personal->cell_number) ? $employee->personal->cell_number : 'No data' }}</small>
                            </div>
                        </div>
                        <hr style="padding: .2rem;" class="bg-gradient-info">
                        <div class="row w-100 pl-3">
                            <strong class="text-center w-100">Educational Background</strong>
                            <div class="row row-cols-2 row-cols-md-2 w-100 mt-3">
                                <div class="col">
                                    <strong>Elementary</strong>
                                </div>
                                <div class="col">
                                    @if(!empty($educ->elem))
                                        <strong>{{ $educ->elem->name_of_school }}</strong><br>
                                        <strong>{{ $educ->elem->level }}</strong><br>
                                        <strong>{{ !empty($educ->elem->sy_graduated) ? $educ->elem->sy_graduated : $educ->elem->level_units_earned }}</strong>
                                    @else
                                        <small>No data</small>
                                    @endif
                                </div>
                            </div>
                            <div class="row row-cols-2 row-cols-md-2 w-100 mt-3">
                                <div class="col">
                                    <strong>Secondary</strong>
                                </div>
                                <div class="col">
                                    @if(!empty($educ->sec))
                                        <strong>{{ $educ->sec->name_of_school }}</strong><br>
                                        <strong>{{ $educ->sec->level }}</strong><br>
                                        <strong>{{ !empty($educ->elem->sy_graduated) ? $educ->sec->sy_graduated : $educ->sec->level_units_earned }}</strong>
                                    @else
                                        <small>No data</small>
                                    @endif
                                </div>
                            </div>
                            <div class="row row-cols-2 row-cols-md-2 w-100 mt-3">
                                <div class="col">
                                    <strong>Tertiary</strong>
                                </div>
                                <div class="col">
                                    @if(!empty($educ->col))
                                        <strong>{{ $educ->col->name_of_school }}</strong><br>
                                        <strong>{{ $educ->col->level }}</strong><br>
                                        <strong>{{ !empty($educ->col->sy_graduated) ? $educ->col->sy_graduated : $educ->col->level_units_earned }}</strong>
                                    @else
                                        <small>No data</small>
                                    @endif
                                </div>
                            </div>
                            <div class="row row-cols-2 row-cols-md-2 w-100 mt-3">
                                <div class="col">
                                    <strong>Graduate Study</strong>
                                </div>
                                <div class="col">
                                    @forelse ($educ->grad as $grad)
                                        <div class="mt-3 {{ $loop->iteration === 5 ? 'before' : '' }}">
                                            <strong>{{ $grad->name_of_school }}</strong><br>
                                            <strong>{{ $grad->degree }}</strong><br>
                                            <strong>{{ $grad->course }}</strong><br>
                                            <strong>{{ !empty($grad->sy_graduated) ? $grad->sy_graduated : $grad->level_units_earned }}</strong><br>
                                        </div>
                                    @empty
                                        <small>No data</small>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <hr>
                        @if (!empty(auth()->user()->experiences))
                            <div class="row d-flex flex-column w-100 pl-3 mt-3">
                                <strong class="text-center w-100">Work Experience</strong>
                                <div class="row row-cols-3 mt-3 d-flex justify-content-center">
                                    <div class="col-md-6 d-flex justify-content-start"><strong>Work Place</strong></div>
                                    <div class="col-md-3 d-flex justify-content-end"><strong>Description</strong></div>
                                    <div class="col-md-3 d-flex justify-content-end"> <strong>Duration</strong></div>
                                </div>
                                @forelse ($employee->experiences as $work)
                                    @if($loop->iteration < 3)
                                        <div class="row row-cols-3 mt-3 d-flex justify-content-center">
                                            <div class="col-md-6 d-flex justify-content-start"><small style="font-size: 1rem">{{ $work->work_place }}</small></div>
                                            <div class="col-md-3 d-flex justify-content-end"><small style="font-size: 1rem">{{ $work->work_description }}</small></div>
                                            <div class="col-md-3 d-flex justify-content-end"> <small style="font-size: 1rem" >{{ $work->duration }}</small></div>
                                        </div>
                                    @else
                                        <div class="row row-cols-3 mt-3 d-flex justify-content-center {{ $loop->iteration === 3 ? 'before' : '' }}">
                                            <div class="col-md-6 d-flex justify-content-start"><strong>Work Place</strong></div>
                                            <div class="col-md-3 d-flex justify-content-end"><strong>Description</strong></div>
                                            <div class="col-md-3 d-flex justify-content-end"> <strong>Duration</strong></div>
                                        </div>
                                        <div class="row row-cols-3 mt-3 d-flex justify-content-center">
                                            <div class="col-md-6 d-flex justify-content-start"><small style="font-size: 1rem">{{ $work->work_place }}</small></div>
                                            <div class="col-md-3 d-flex justify-content-end"><small style="font-size: 1rem">{{ $work->work_description }}</small></div>
                                            <div class="col-md-3 d-flex justify-content-end"> <small style="font-size: 1rem" >{{ $work->duration }}</small></div>
                                        </div>
                                    @endif
                                @empty
                                    <div class="row d-flex flex-column w-100 pl-3 mt-3">
                                        <small class="text-center">No data</small>
                                    </div>
                                @endforelse
                                
                            </div>
                        @else
                            <div class="row d-flex flex-column w-100 pl-3 mt-3">
                                <small class="text-center">No data</small>
                            </div>
                        @endif
                        <hr>
                        @if (!empty(auth()->user()->trainings))
                            <div class="row d-flex flex-column w-100 pl-3 mt-3">
                                <strong class="text-center w-100">Training Programs</strong>
                                <div class="row row-cols-3 mt-3 d-flex justify-content-center">
                                    <div class="col-md-6 d-flex justify-content-start"><strong>Title</strong></div>
                                    <div class="col-md-3 d-flex justify-content-end"><strong>Date</strong></div>
                                    <div class="col-md-3 d-flex justify-content-end"> <strong>Sponsor</strong></div>
                                </div>
                                @forelse ($employee->trainings as $training)
                                    <div class="row row-cols-3 mt-3 d-flex justify-content-center">
                                        <div class="col-md-6 d-flex justify-content-start"><small style="font-size: 1rem">{{ $training->training_title }}</small></div>
                                        <div class="col-md-3 d-flex justify-content-end"><small style="font-size: 1rem">{{ $training->training_date }}</small></div>
                                        <div class="col-md-3 d-flex justify-content-end"> <small style="font-size: 1rem">{{ $training->training_sponsor }}</small></div>
                                    </div>
                                @empty
                                    <div class="row d-flex flex-column w-100 pl-3 mt-3">
                                        <small class="text-center">No data</small>
                                    </div>
                                @endforelse
                            </div>
                        @else
                            <div class="row d-flex flex-column w-100 pl-3 mt-3">
                                <small class="text-center">No data</small>
                            </div>
                        @endif
                        <hr>
                        @if (!empty(auth()->user()->voluntary_works))
                            <div class="row d-flex flex-column w-100 pl-3 mt-3">
                                <strong class="text-center w-100">Civic Works</strong>
                                <div class="row row-cols-4 mt-3 d-flex justify-content-center">
                                    <div class="col-md-3 d-flex justify-content-start"><strong>Name of Organization</strong></div>
                                    <div class="col-md-3 d-flex justify-content-end"><strong>Period of Attendance</strong></div>
                                    <div class="col-md-3 d-flex justify-content-end"> <strong>number of Hours</strong></div>
                                    <div class="col-md-3 d-flex justify-content-end"> <strong>Nature of Work</strong></div>
                                </div>
                                @forelse ($employee->voluntary_works as $volunteer)
                                    <div class="row row-cols-4 mt-3 d-flex justify-content-center">
                                        <div class="col-md-3 d-flex justify-content-start"><small style="font-size: 1rem">{{ $volunteer->name_address }}</small></div>
                                        <div class="col-md-3 d-flex justify-content-end"><small style="font-size: 1rem">{{ $volunteer->duration }}</small></div>
                                        <div class="col-md-3 d-flex justify-content-end"> <small style="font-size: 1rem">{{ $volunteer->no_hours }}</small></div>
                                        <div class="col-md-3 d-flex justify-content-end"> <small style="font-size: 1rem">{{ $volunteer->position }}</small></div>
                                    </div>
                                @empty
                                    <div class="row d-flex flex-column w-100 pl-3 mt-3">
                                        <small class="text-center">No data</small>
                                    </div>
                                @endforelse
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    var downloadBtn = document.getElementById("download");
        downloadBtn.addEventListener("click", function(){
        var pdfContents = document.getElementById('paper').innerHTML;
        var filename = 'Paper';
        var opt = {
            margin:       .1,
            filename:     filename + '_' + 'resume.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            pagebreak: { before: '.before' },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
        };
        html2pdf().from(pdfContents).set(opt).save();
    });

</script>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <!-- Core -->
    <script src="{{ asset('argon/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/js-cookie/js.cookie.j') }}s"></script>
    <script src="{{ asset('argon/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('argon/js/argon.js?v=1.2.0') }}"></script>
@endsection