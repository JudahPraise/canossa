@extends('employee.layouts.home')

@section('employee-home')

<div class="container-fluid">
    <div class="row my-2">
        <div class="col-md-4 d-flex flex-column justify-content-center">
            @foreach ($days as $day)
            <h3 class="ml-2">{{ $day->day }}</h3>
            @forelse ($day->schedules as $schedule)
                <div class="container d-flex m-2 border p-0">
                    <div class="col-md-4 d-flex justify-content-center align-items-center" style="background-color: black; color: white;">
                        <h1>09</h1>
                    </div>
                    <div class="col-md-8">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>
            @empty
                <div class="container d-flex justify-content-center m-2 p-0 ">
                    <div class="row d-flex flex-column align-items-center m-2 border" 
                    data-day="{{ $day->day }}"
                    data-toggle="modal" 
                    data-target="#staticBackdrop" id="sched">
                        <i class="far fa-plus-square text-muted" style="font-size: 2rem; cursur: pointer;"></i>
                        <a href="#" style="font-size: 1rem;" class="text-muted text-decoration-none">Add Schedule</a>
                    </div>
                </div>
            @endforelse
                
            @endforeach
        </div>
        <div class="col-md-8">
            Hello world
        </div>
    </div>
</div>

  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add Schedule for <span id="day"></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="validationDefault03">City</label>
                    <input type="text" class="form-control" id="validationDefault03" required>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="validationDefault04">State</label>
                    <select class="custom-select" id="validationDefault04" required>
                      <option selected disabled value="">Choose...</option>
                      <option>...</option>
                    </select>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="validationDefault05">Zip</label>
                    <input type="text" class="form-control" id="validationDefault05" required>
                  </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Add</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script>
    $(document).ready(function () {
        $('#sched').each(function() {
            $(this).click(function(event){
            $('#day').text($(this).data("day"));
            console.log('clicked');
            })
        });
    });
  </script>

@endsection