<div class="modal fade" id="{{ "delete".$file }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="deleteFileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteFileModalLabel">Delete file</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('employee.labtest.delete', $file) }}" method="POST" id="deleteFile">
            @method('DELETE')
            @csrf
            <p>Are you sure you want to delete this file?</p>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger" onclick="document.getElementById('deleteFile').submit()">Delete</button>
        </div>
      </div>
    </div>
</div>