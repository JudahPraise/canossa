@extends('employee.layouts.home')

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

@section('employee-home')

<div class="container-fluid p-4">
  @component('components.alerts')@endcomponent
  <div class="row w-100 m-0">
    <div id="qrcode"></div>
    <div class="card w-100">
      <div class="card-header border-0">
        <div class="row align-items-center justify-content-between px-2">
          <h3 class="mb-0">Schedule</h3>
          <div class="d-flex">
            <button class="btn btn-secondary btn-sm dropdown-toggle mr-2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Select Day
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{ route('schedule.filter-all', $days->all()) }}">All</a>
              @foreach ($days as $day)
              <a class="dropdown-item day" href="{{ route('schedule.filter', $day->day) }}" data-day="{{ $day->day }}">{{ $day->day }}</a>
              @endforeach
            </div>
            <button class="btn btn-icon btn-success btn-sm" type="button" data-toggle="modal" data-target="#schedule">
              <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
            </button>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr class="border" style="color: black">
              <th>Title</th>
              <th>Day</th>
              <th>Time</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($schedules as $schedule)
              <tr class="{{ $schedule->day == Carbon\Carbon::now()->format( 'l' ) ? 'bg-gradient-success text-white' : 'border'}}" style="color: black;"> 
                <th>{{ $schedule->title }}</th>  
                @if ($schedule->day == Carbon\Carbon::now()->format( 'l' ))
                <td>Today</td>
                @else
                <td>{{ $schedule->day }}</td>
                @endif
                <td>{{ $schedule->time_from.' '.'-'.' '.$schedule->time_to }}</td>
                <td>
                  <a href="" class="sched btn btn-sm btn-icon btn-info"
                  data-schedid="{{ $schedule->id }}"
                  data-schedtitle="{{ $schedule->title }}"
                  data-schedday="{{ $schedule->day }}"
                  data-schedtimefrom="{{ $schedule->time_from }}"
                  data-schedtimeto="{{ $schedule->time_to }}"
                  data-toggle="modal" data-target="#editModal"><span class="btn-inner--icon"><i class="fas fa-edit"></i></span></a>
                  <form action="{{ route(  'schedule.delete', $schedule->id)  }}" method="POST" id="deleteForm" hidden>
                    @method('delete') @csrf
                  </form>
                  <button type="submit" class="btn btn-sm btn-icon btn-danger" onclick="document.getElementById('deleteForm').submit()"><span class="btn-inner--icon"><i class="fas fa-trash"></i></span></button>
                  
                </td>
              </tr>
            @empty
              <tr>
                <td class="text-center" colspan="4">You do not have schedule</td>
              </tr>
            @endforelse
          </tbody>
        </table>
        {{ $schedules->links() }}
      </div>
    </div>
  </div>

  {{-- {!! QrCode::size(100)->generate('{{ Auth::user()->qr_token }}'); !!} --}}
</div>

<!-- Create Modal -->
<div class="modal fade" id="schedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
        <form class="w-100" action="{{ route('schedule.store') }}" method="POST">
          @csrf
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationDefault01">Day</label>
              <select id="inputState" name="day" class="form-control">
                @foreach ($days as $day)
                <option value="{{ $day->day }}">
                  {{ $day->day }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label for="validationDefault02">Schedule Title</label>
              <input type="text" class="form-control" name="title" id="validationDefault02" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="validationDefault02">Time From</label>
              <input type="time" class="form-control" name="time_from" id="validationDefault02" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="validationDefault02">Time To</label>
              <input type="time" class="form-control" name="time_to" id="validationDefault02" required>
            </div>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" value="Submit Form">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="w-100" action="{{ route('schedule.update') }}" method="POST">
          @csrf
          <input type="text" name="id" id="schedId" hidden>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationDefault01">Day</label>
              <select id="inputState" name="day" class="form-control">
                <option selected id="day"></option>
                @foreach ($days as $day)
                <option value="{{ $day->day }}">{{ $day->day }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label for="validationDefault02">Schedule Title</label>
              <input type="text" class="form-control" name="title" id="title" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="validationDefault02">Time From</label>
              <input type="time" class="form-control" name="time_from" id="timeFrom" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="validationDefault02">Time To</label>
              <input type="time" class="form-control" name="time_to" id="timeTo" required>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" value="Submit Form">Save changes</button>
      </div>
    </form>
    </div>
  </div>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="{{ asset('js/qrcode.js') }}"></script>
<script>
    $(document).ready(function () {
      $('.sched').each(function() {
        $(this).click(function(event){
          $('#schedId').val($(this).data("schedid"))
          $('#title').val($(this).data("schedtitle"))
          $('#day').text($(this).data("schedday"))
          $('#day').val($(this).data("schedday"))
          $('#timeFrom').val($(this).data("schedtimefrom"))
          $('#timeTo').val($(this).data("schedtimeto"))
        })
      });
  });

  

</script>
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