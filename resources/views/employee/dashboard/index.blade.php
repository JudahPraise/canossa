@extends('employee.layouts.home')

@section('employee-home')
<div class="container-fluid">
  <div class="row pt-5">
    <div class="col-lg-7">
      <h4 class="font-weight-bold" style="color: black">Your Schedule</h4>
    </div>
    <div class="col-lg-5 d-flex justify-content-end align-items-start">
      <div class="form-group row mr-2">
        <div class="col-sm-10">
          <div class="btn-group">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Select Day
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{ route('schedule.filter-all', $days->all()) }}">All</a>
              @foreach ($days as $day)
              <a class="dropdown-item day" href="{{ route('schedule.filter', $day->day) }}" data-day="{{ $day->day }}">{{ $day->day }}</a>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <button class="btn btn-md btn-success" data-toggle="modal" data-target="#createModal">Add Schedule</button>
    </div>
  </div>

  <div class="table-responsive" style="color: black">
    <table class="table table-striped table-hover table-borderless">
      <thead>
        <tr class="border" style="color: black">
          <th scope="col">Title</th>
          <th scope="col">Day</th>
          <th scope="col">Time</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($schedules as $schedule)
        <tr class="{{ $schedule->day == Carbon\Carbon::now()->format( 'l' ) ? 'glowing-border' : 'border'}}" style="color: black;">
          <th scope="row">{{ $schedule->title }}</th>
          @if ($schedule->day == Carbon\Carbon::now()->format( 'l' ))
          <td>Today</td>
          @else
          <td>{{ $schedule->day }}</td>
          @endif
          <td>{{ $schedule->time_from.' '.'-'.' '.$schedule->time_to }}</td>
          <td>
            <a href="" class="sched" 
            data-schedid="{{ $schedule->id }}"
            data-schedtitle="{{ $schedule->title }}"
            data-schedday="{{ $schedule->day }}"
            data-schedtimefrom="{{ $schedule->time_from }}"
            data-schedtimeto="{{ $schedule->time_to }}"
            data-toggle="modal" data-target="#editModal"><i class="fas fa-edit text-primary px-3" style="font-size: 1.5rem"></i></a>
            <a href="" onclick="event.preventDefault();
            document.getElementById('delete').submit();"><i class="fas fa-trash-alt text-danger" style="font-size: 1.5rem"></i></a>
            <form action="{{ route('schedule.delete', $schedule->id) }}" method="POST" id='delete'>
              @csrf
              @method('DELETE')
            </form>
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


<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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