 {{-- Hospitalization --}}
<section class="mb-3">
  <div class="row m-3 d-flex justify-content-between align-items-center">
       <h3>Hospitalization</h3>
  </div>
  <div class="row m-3">
    <div class="table-responsive" style="overflow: hidden">
      <table class="table table-borderless dt-responsive nowrap" id="hosTable" width="100%">
        <thead>
          <tr>
            <th scope="col">Disease</th>
            <th scope="col">Date</th>
            <th scope="col">Operation</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($record->hospitalizations as $hospitalization)
              <tr>
                  <td>{{ $hospitalization->disease }}</td>
                  <td>{{ $hospitalization->dDate() }}</td>
                  <td>{{ !empty($hospitalization->operation) ? $hospitalization->operation : 'N/A' }}</td>
                  <td>{{ $hospitalization->oDate() }}</td>
                  <td class="d-flex justify-content-around">
                    <a class="text-primary hospitalization-edit" style="cursor: pointer" 
                    data-toggle="modal" data-target="#editHospitalization"
                    data-hospitalizationid="{{ $hospitalization->id }}"
                    data-disease="{{ $hospitalization->disease }}"
                    data-ddate="{{ $hospitalization->d_date}}"
                    data-operation="{{ !empty($hospitalization->operation) ? $hospitalization->operation : 'N/A' }}"
                    data-odate="{{ $hospitalization->o_date }}"
                    ><i class="fas fa-pencil-alt mr-2"></i>Edit</a>
                    <a class="text-danger hospitalization-delete" style="cursor: pointer"
                    data-toggle="modal" data-target="#deleteHospitalization"
                    data-hospitalizationid="{{ $hospitalization->id }}"
                    ><i class="fas fa-trash-alt mr-2"></i>Delete</a>
                  </td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!--Update Modal-->
  <div class="modal fade" id="editHospitalization" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Hospitalization</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="updateHospitalization" method="POST">
                @method('PUT')
                @csrf
                <div class="form-row mb-3">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Disease</label>
                            <input type="text" class="form-control" name="disease">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" class="form-control" id="dDate" name="d_date">
                        </div>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="col-6">
                        <div class="form-group mb-2">
                            <label for="">Operation</label>
                            <input type="text" class="form-control" name="operation">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-2">
                            <label>Date</label>
                            <input type="date" class="form-control" name="o_date">
                        </div>
                    </div>
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="document.getElementById('updateHospitalization').submit()">Update</button>
          </div>
        </div>
      </div>
  </div>
  <div class="modal fade" id="deleteHospitalization" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form id="destroyHospitalization" method="POST">
                  @method('DELETE')
                  @csrf
                  <p>Delete this record?</p>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger" onclick="document.getElementById('destroyHospitalization').submit()">Delete</button>
          </div>
        </div>
      </div>
  </div>

</section>

{{-- <script>
  $( document ).ready(function() {
    $('#hosTable').DataTable( {
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