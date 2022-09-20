 {{-- Immunization --}}
<section class="mb-3">
  <div class="row m-3 d-flex justify-content-between align-items-center">
       <h3>Immunization</h3>
  </div>
  <div class="row m-3">
    <div class="table-responsive" style="overflow: hidden">
      <table class="table table-borderless dt-responsive nowrap" id="immTable" width="100%">
        <thead>
          <tr>
            <th scope="col">Vaccine</th>
            <th scope="col">Status</th>
            <th scope="col">Brand</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($record->immunizations as $immunization)
            <tr>
              <td>{{ $immunization->vaccine_recieved }}</td>
              <td>{{ $immunization->status }}</td>
              <td>{{ !empty($immunization->brand) ? $immunization->brand : 'Uninformed' }}</td>
              <td>{{ $immunization->date }}</td>
              <td class="d-flex justify-content-around">
                <a class="text-primary immunization-edit" style="cursor: pointer"
                  data-toggle="modal" data-target="#editImmunization"
                  data-idimmunization="{{ $immunization->id }}"
                  data-vaccine="{{ $immunization->vaccine_recieved }}"
                  data-status="{{ $immunization->status }}"
                  data-brand="{{ $immunization->brand }}"
                  data-date="{{ $immunization->date }}"
                  ><i class="fas fa-pencil-alt mr-2"></i>Edit</a>
                <a class="text-danger immunization-delete"
                  data-toggle="modal" data-target="#deleteImmunization"
                  data-idimmunization="{{ $immunization->id }}"
                  style="cursor: pointer"
                  ><i class="fas fa-trash-alt mr-2"></i>Delete</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!--Update Modal-->
  <div class="modal fade" id="editImmunization" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Immunization</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="updateImmunization" method="POST">
                @method('PUT')
                @csrf
                <div class="form-row mb-3">
                  <div class="form-row mb-3 w-100">
                    <div class="col-md-3 d-flex flex-column mb-2">
                      <label for="">Vaccine</label>
                      <input type="text" class="form-control" id="vaccine" name="vaccine_recieved">
                  </div>
                  <div class="col-md-3 d-flex flex-column mb-2">
                      <label for="">Status</label>
                      <select class="custom-select" id="status" name="status">
                          <option disabled selected>Choose...</option>
                          <option value="1st Dose">1st Dose</option>
                          <option value="Fully Vaccinated">Fully Vaccinated</option>
                          <option value="1st Dose Booster Shot">1st Dose Booster Shot</option>
                          <option value="2nd Dose Booster Shot">2nd Dose Booster Shot</option>
                      </select> 
                  </div>
                  <div class="col-md-3 d-flex flex-column mb-2">
                      <label for="">Brand</label>
                      <input type="text" class="form-control" name="brand" id="brand">
                  </div>
                  <div class="col-md-3 d-flex flex-column mb-2">
                      <label>Date</label>
                      <input type="date" class="form-control" name="date" id="date">
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="document.getElementById('updateImmunization').submit()">Update</button>
          </div>
        </div>
      </div>
  </div>
   <!--Delete Modal-->
   <div class="modal fade" id="deleteImmunization" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form id="destroyImmunization" method="POST">
                  @method('DELETE')
                  @csrf
                  <p>Delete this record?</p>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger" onclick="document.getElementById('destroyImmunization').submit()">Delete</button>
          </div>
        </div>
      </div>
  </div>
</section>

{{-- <script>
  $( document ).ready(function() {
    $('#immTable').DataTable( {
      responsive:true,
      columnDefs: [
		          { responsivePriority: 1, targets: 0 },
		          { responsivePriority: 2, targets: 4 }
		      ],
      searching: false,
      bInfo: false,
      bLengthChange: false,
      bPaginate: false,
    });
  })
</script> --}}