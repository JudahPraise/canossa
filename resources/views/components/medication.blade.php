<section class="mb-3">
  <div class="row m-3 d-flex justify-content-between align-items-center">
      <h3>Medications</h3>
  </div>
  <div class="row m-3">
    <div class="table-responsive" style="overflow: hidden">
      <table class="table table-borderless dt-responsive nowrap " id="medTable" width="100%">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Condition</th>
                <th scope="col">Strength</th>
                <th scope="col">Frequency</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($record->medications as $med)
          <tr>
              <td>{{ $med->name }}</td>
              <td>{{ $med->condition }}</td>
              <td>{{ $med->mg() }}</td>
              <td>{{ $med->frequency }}</td>
              <td class="d-flex justify-content-around">
                  <a class="text-primary medication-edit" style="cursor: pointer"
                  data-toggle="modal" data-target="#editMedication"
                  data-medid="{{ $med->id }}"
                  data-name="{{ $med->name }}"
                  data-condition="{{ $med->condition }}"
                  data-mg="{{ $med->strength }}"
                  data-frequency="{{ $med->frequency }}"
                  ><i class="fas fa-pencil-alt mr-2"></i>Edit</a>
                  <a class="text-danger medication-delete" style="cursor: pointer"
                  data-toggle="modal" data-target="#deleteMedication"
                  data-medid="{{ $med->id }}"
                  ><i class="fas fa-trash-alt mr-2"></i>Delete</a>
                </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!--Update Modal-->
  <div class="modal fade" id="editMedication" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Update Medication</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
          <form id="updatemedication" method="POST">
            @method('PUT')
            @csrf
            <div class="inputs_div">
              <div class="form-row d-flex align-items-center">
                <div class="col-md-3 mb-3">
                  <label for="name">Name</label>
                  <input type="text" class="form-control med" name="name" id="name">
                </div>
                <div class="col-md-3 mb-3">
                  <label for="condition">Condition</label>
                  <input class="form-control" type="text" list="conditions" name="condition" id="condition"/>
                  <datalist id="conditions">
                    <option value="Hypertension">Hypertension</option>
                    <option value="Diabetes">Diabetes</option>
                    <option value="Asthma">Asthma</option>
                    <option value="Allergy (Food, Medicine)">Allergy (Food, Medicine)</option>
                    <option value="Hepatitis">Hepatitis</option>
                    <option value="Urinary Tract Infection">Urinary Tract Infection</option>
                    <option value="Typhoid">Typhoid</option>
                    <option value="Anemia">Anemia</option>
                    <option value="Food Supplement">Food Supplement</option>
                  </datalist>
                </div>
                <div class="col-md-2 mb-3 mr-2">
                  <label for="strength">Strength</label>
                  <input type="text" class="form-control med" id="strength" name="strength[]" placeholder="5 mg">
                </div>
                <div class="col-md-3 mb-3 mr-2">
                  <label for="frequency">Frequency</label>
                  <select class="form-control" id="frequency" name="frequency[]">
                    <option disabled selected>Choose ...</option>
                    <option value="Every 6 hours">Every 6 hours</option>
                    <option value="Every 8 hours">Every 8 hours</option>
                    <option value="Every 12 hours">Every 12 hours</option>
                    <option value="Once a day">Once a day</option>
                    <option value="Twice a day">Twice a day</option>
                    <option value="Thrice a day">Thrice a day</option>
                  </select>
                </div>
              </div>
            </div>
         </form>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <button type="button" class="btn btn-primary" onclick="document.getElementById('updatemedication').submit()">Update</button>
       </div>
     </div>
    </div>
  </div>
  <!--Delete Modal-->
  <div class="modal fade" id="deleteMedication" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="destroyMedication" method="POST">
                    @method('DELETE')
                    @csrf
                    <p>Delete this record?</p>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-danger" onclick="document.getElementById('destroyMedication').submit()">Delete</button>
            </div>
          </div>
        </div>
  </div>
</section> 