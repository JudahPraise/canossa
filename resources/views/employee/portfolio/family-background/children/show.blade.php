@extends('employee.portfolio.family-background.children.index')

@section('children')
<div class="container-fluid">
    @foreach ($children as $child)
        <div class="row row-cols-1 row-cols-md-3 mt-3">
            <div class="col-md-1 mb-3 d-flex align-items-end">
                <a href="#" class="child neu-effect d-flex justify-content-center align-items-center mr-2 text-decoration-none py-3 px-3" style="display:inline-block; width: 2.6rem; height: 2.6rem"
                data-id="{{ $child->id }}"
                data-name="{{ $child->name }}"
                data-dob="{{ $child->date_of_birth }}"
                data-toggle="modal" data-target="#childEdit"
                >
                    <i class="fas fa-edit text-success" style="font-size: 1.1rem"></i>
                </a>
            </div>
            <div class="col-md-5 mb-3 d-flex flex-column">
                <small style="font-size: 1rem">Name</small>
                <strong style="color: black; font-size: 1.3rem">{{ $child->name }}</strong>
            </div>
            <div class="col-md-5 mb-3 d-flex flex-column">
                <small style="font-size: 1rem">Date of birth</small>
                <strong style="color: black; font-size: 1.3rem">{{ $child->date_of_birth }}</strong>
            </div>
        </div>
    @endforeach
  
    <!-- Modal -->
    <div class="modal fade" id="childEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="editForm" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group inputs_div">
                  <div class="form-row d-flex align-items-center">
                    <div class="col-md-6 mb-3">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="col-md-5 mb-3 mr-2">
                      <label for="date_of_birth">Date of birth</label>
                      <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" required>
                    </div>
                  </div>
                </div> 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
        </div>
      </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script>
    $(document).ready(function () {
    $('.child').each(function() {
      $(this).click(function(event){
        $('#editForm').attr('action', '/employee/portfolio/family-background/children/update/'+$(this).data("id")+'')
        $('#name').val($(this).data("name"))
        $('#date_of_birth').val($(this).data("dob"))
      })
    });
  });
</script>

@endsection