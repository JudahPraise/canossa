@extends('employee.portfolio.personal-information.index')

@section('personal')
<div class="container-fluid">
    <div class="row w-100 m-0">
        <div class="row w-100">
            <div class="card-body w-100">
                <div class="row">
                    <strong style="font-weight: bold; color: black; font-size: 2.8rem">{{ $personal->fullName() }}</strong>
                </div>
                <hr>
                <div class="row row-cols-2 row-cols-md-4 mt-3">
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Date of Birth</strong>
                        <strong style="color: black; font-size: 1.3rem">{{ $personal->date_of_birth }}</strong>
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Sex</strong>
                        <strong style="color: black; font-size: 1.3rem">{{ $personal->sex }}</strong>
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Citizenship</strong>
                        <strong style="color: black; font-size: 1.3rem">{{ $personal->citizenship }}</strong>
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Civil Status</strong>
                        <strong style="color: black; font-size: 1.3rem">{{ $personal->civil_status }}</strong>
                    </div>
                </div>
                <div class="row row-cols-2 row-cols-md-4 mt-3">
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Height</strong>
                        <strong style="color: black; font-size: 1.3rem">{{ $personal->height.' '."ft" }}</strong>
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Weight</strong>
                        <strong style="color: black; font-size: 1.3rem">{{ $personal->weight.' '."kl" }}</strong>
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Blood Type</strong>
                        <strong style="color: black; font-size: 1.3rem">{{ $personal->blood_type }}</strong>
                    </div>
                </div>
                <hr>
                <strong style="color: black; font-size: 1.5rem">Contact Information</strong>
                <div class="row row-cols-2 row-cols-md-2 mt-3">
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Address</strong>
                        <strong style="color: black; font-size: 1.3rem">{{ $personal->address }}</strong>
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Zip</strong>
                        <strong style="color: black; font-size: 1.3rem">{{ $personal->zip_code }}</strong>
                    </div>
                </div>
                <div class="row row-cols-2 row-cols-md-4 mt-3">
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Telephone Number</strong>
                        <strong style="color: black; font-size: 1.3rem">{{ $personal->tel_number }}</strong>
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Cellphone number</strong>
                        <strong style="color: black; font-size: 1.3rem">{{ $personal->cell_number }}</strong>
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Email address</strong>
                        <strong style="color: black; font-size: 1.3rem">{{ $personal->email_address }}</strong>
                    </div>
                </div>
                <hr>
                <strong style="color: black; font-size: 1.5rem">Government ID's</strong>
                <div class="row row-cols-2 row-cols-md-4 mt-3">
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">PRC</strong>
                        <strong style="color: black; font-size: 1.3rem">{{ !empty($personal->prc) ? $personal->prc : 'N/A' }}</strong>
                    </div>
                    {{-- <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">GSIS</strong>
                        <strong style="color: black; font-size: 1.3rem">{{ !empty($personal->gsis) ? $personal->gsis : 'N/A' }}</strong>
                    </div> --}}
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">SSS</strong>
                        <strong style="color: black; font-size: 1.3rem">{{ !empty($personal->sss) ? $personal->sss : 'N/A' }}</strong>
                    </div>
                </div>
                <div class="row row-cols-2 row-cols-md-4 mt-3">
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Pag-IBIG</strong>
                        <strong style="color: black; font-size: 1.3rem">{{ !empty($personal->pag_ibig) ? $personal->pag_ibig : 'N/A' }}</strong>
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Driver's License</strong>
                        <strong style="color: black; font-size: 1.3rem">{{ !empty($personal->driver_license) ? $personal->driver_license : 'N/A' }}</strong>
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">PhilHealth</strong>
                        <strong style="color: black; font-size: 1.3rem">{{ !empty($personal->phil_health) ? $personal->phil_health : 'N/A' }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="container-fluid cont">
    
</div> --}}

@endsection