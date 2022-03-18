<div class="row mx-2 d-flex justify-content-between">
  <p class="font-weight-bold">Labtest Schedule</p>
  @if (Auth::guard('nurse')->check())
    <a href="" data-toggle="modal" data-target="#addSched">
      <p class="font-weight-bold "><i class="far fa-calendar mr-2"></i>Add Schedule</p>
    </a>
  @endif
  @if (!empty($labtestSched))
    <div class="container">
      <div class="row d-flex flex-column py-2">
          <h3>Date</h3>
         <p>{{ $labtestSched->date_from()." "."-"." ".$labtestSched->date_to()}}</p>
         <h3>Laboratory</h3>
         <p>{{ $labtestSched->laboratory_name }}</p>
      </div>
    </div>  
  @else
    <div class="container">
      <div class="row py-2">
        <div class="container-fluid d-flex flex-column align-items-center p-1" data-toggle="modal" data-target="#addSched">
          <img src="{{ asset('SVG/undraw_schedule.svg') }}" alt="" srcset="" height="250" width="250">
          @if (Auth::guard('nurse')->check())
            <span>Add Schedule</span>
          @endif
        </div>
      </div>
    </div>  
  @endif
  <!-- Modal -->
  @if (Auth::guard('nurse')->check())
    <div class="modal fade" id="addSched" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Schedule</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('labtestSchedule.store') }}" method="POST" id="labSchedForm">
              @csrf
              <div class="form-row mb-3">
                <div class="col">
                  <label for="dateFrom">Date from</label>
                  <input type="date" class="form-control" name="date_to">
                </div>
                <div class="col">
                  <label for="dateTo">Date to</label>
                  <input type="date" class="form-control" name="date_from">
                </div>
              </div>
              <div class="form-group">
                <label for="labName">Laboratory Name</label>
                <input type="text" class="form-control" id="labName" name="laboratory_name">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="document.getElementById('labSchedForm').submit()">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  @endif

</div>