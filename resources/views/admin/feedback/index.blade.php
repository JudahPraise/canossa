@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/orbitcss/css/orbit.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('argon/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('argon/css/argon.css?v=1.2.0') }}" type="text/css">
@endsection

@section('home')
<div class="container-fluid p-3">
    <div class="row p-3">
        <div class="col">
            <h2 class="mb-0 ml-2">Feedback</h2>
        </div>
    </div>
    <div class="row p-3">
        @forelse ($feedbacks as $feedback)
            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card card-stats pressable-day feedback" 
                data-name="{{ $feedback->user->name }}"
                data-feedback="{{ $feedback->feedback }}"
                data-suggestion="{{ $feedback->suggestion }}"
                data-created="{{ $feedback->created_at->diffForHumans() }}"
                data-toggle="modal"
                data-target="#showFeedback"
                >
                  <!-- Card body -->
                    <div class="card-body">
                      <div class="row">
                        <div class="col" style="width: 250px;
                        white-space: nowrap;
                        overflow: hidden;
                        text-overflow: ellipsis;">
                            <h3>{{ $feedback->user->name }}</h3>
                            <h5>Feedback</h5>
                            <p class="card-title text-muted mb-0" style="text-overflow: ellipsis;
                            white-space: nowrap;
                            overflow: hidden;">{{ $feedback->feedback }}</p>
                            <small>{{ $feedback->created_at->diffForHumans() }}</small>
                        </div>
                        <div class="col-auto">
                            @if (!empty($feedback->user->image))
                                <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                  <div class="c-avatar"><img class="c-avatar-img" src="{{ asset( 'storage/images/'.$feedback->user->image) }}" style=" height: 40px; overflow: hidden;"></div>
                                </a>
                            @else
                              <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <div class="c-avatar"><img class="c-avatar-img" src="{{ asset($feedback->user->sex === 'M' ? 'img/default-male.svg' : 'img/default-female.svg') }}" style=" height: 40px; overflow: hidden;"></div>
                              </a>
                            @endif
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="row w-100 d-flex justify-content-center align-items-center" style="height: 50vh">
                <p class="font-italic">No feedback yet</p>
            </div>
        @endforelse
        <!-- Modal -->
        <div class="modal fade" id="showFeedback" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content p-2">
                  <div class="modal-header px-1">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Employee's Feedback</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body mb-3">
                      <div class="row">
                          <h3 id="name"></h3>
                      </div>
                      <div class="row d-flex flex-column mb-3">
                          <strong class="mb-2">Feedback</strong>
                          <small id="feedback" style="font-size: 1rem"></small>
                      </div>
                      <div class="row d-flex flex-column">
                          <strong class="mb-2">Suggestion</strong>
                          <small id="suggestion" style="font-size: 1rem"></small>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            $('.feedback').each(function() {
              $(this).click(function(event){
                $('#name').text($(this).data("name"))
                $('#feedback').text($(this).data("feedback"))
                $('#suggestion').text($(this).data("suggestion"))
                $('#created').attr('href', $(this).data("created"))
              })
            });
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