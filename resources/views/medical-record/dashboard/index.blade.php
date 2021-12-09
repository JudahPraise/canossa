@extends('medical-record.layouts.home')

@section('css')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/orbitcss/css/orbit.css">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('argon/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('argon/css/argon.css?v=1.2.0') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/card.css') }}">
@endsection

@section('medical-home')
    <div class="container-fluid p-3">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3"  id="destPopuler">
            @forelse ($users as $data)
                <div class="col">
                    <a class="card" href="{{ route('medical.show', $data->id) }}">
                        <img src="{{ asset('img/for-sliders/image-7.jpg') }}" class="card__image" alt="" />
                        <div class="card__overlay">
                            <div class="card__header">
                              @if (!empty($data->user->image))
                                  <img  class="card__thumb" src="{{ asset( 'storage/images/'.$employee->image) }}" >
                              @else
                                  <img  class="card__thumb" src="{{ $data->user->sex === 'F' ? asset('img/default-female.svg') : asset('img/default-male.svg') }}">
                              @endif

                                <div class="card__header-text" id="showRecord">
                                    <h3 class="card__title">{{ $data->user->shortName() }}</h3>            
                                    <span class="card__status">{{ $data->user->role }}</span>
                                </div>
                            </div>

                            <p class="card__description d-flex flex-column mt-2">
                              @if(!empty($data->history))
                                  <span class="d-flex flex-column">
                                      <strong class="font-weight-bold text-muted" style="font-size: .8rem">Medical History</strong>
                                      <span>
                                          @foreach($data->history as $history)
                                              @if ($loop->index < 3)
                                                <span class="badge badge-pill badge-primary mb-3" style="font-size: 1rem">
                                                    {{ $history->illnesses }}
                                                </span>
                                              @endif
                                          @endforeach
                                      </span>
                                  </span>
                              @endif
                              @if(!empty($data->latestLabtest))
                                  <span class="d-flex flex-column">
                                      <strong class="font-weight-bold text-muted" style="font-size: .8rem">Lab Test</strong>
                                      <span class="d-flex justify-content-between" data-toggle="modal" 
                                      data-target="{{ "#showFile".$data->latestLabtest->id }}">
                                          {{ $data->latestLabtest->file }}
                                          <i class="far fa-eye mx-1 text-success" ></i>
                                      </span>
                                  </span>
                              @endif
                            </p>
                        </div>
                        @if(!empty($data->latestLabtest))
                        <x-showlabtest :file="$data->latestLabtest->file" :modal="$data->latestLabtest->id"></x-showlabtest>
                        @endif
                    </a> 
                </div>
            @empty
            @endforelse
        </div>
   </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script type="application/javascript">
        $(document).ready(function () {
            $("#populerNameKey").on('keyup', function(){
                var value = $(this).val().toLowerCase();
                $("#destPopuler .emp").each(function () {
                    if ($(this).text().toLowerCase().search(value) > -1) {
                        $(this).show();
                        $(this).prev('.country').last().show();
                    } else {
                        $(this).hide();
                    }
                });   
            })

            $("#category").on('change', function(){
                var value = $(this).val().toLowerCase();
                $("#destPopuler .emp").each(function () {
                    if ($(this).text().toLowerCase().search(value) > -1) {
                        $(this).show();
                        $(this).prev('.country').last().show();
                    } else if(value == "all") {
                        $('.filterText').val('');
		                $('.emp').show();
                    } else {
                        $(this).hide();
                    }
                });   
            })
        });

        document.getElementById("showRecord").onclick = function () { 
            location.href = "#"; 
        }; 
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