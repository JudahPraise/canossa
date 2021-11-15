<!-- Add File Modal -->
<div class="modal fade" id="{{ $addFile }}" tabindex="-1" aria-labelledby="showFileModelLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="showFileModelLabel">Upload Lab Test</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('employee.labtest.store', !empty(Request::get('school_year')) ? Request::get('school_year') : $latestRecord) }}" method="POST" enctype="multipart/form-data" id="uploadFile">
          @csrf
          <div class="form-row d-flex flex-column">
            <div class="form-row mb-3">
              <label for="validationCustom01">Type of Document</label>
              <select class="custom-select" id="validationDefault04" name="type">
                <option>Lab Test</option>
              </select>   
            </div>
            <div class="form-row mb-3">
              <label for="validationCustom01">Document</label>
              <div class="file-drop-area mb-3 w-100" style="height: 200px">
                <span class="fake-btn">Choose files</span>
                <span class="file-msg">or drag and drop files here</span>
                <input class="file-input" type="file" name="file" multiple>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" onclick="document.getElementById('uploadFile').submit()">Upload</button>
      </div>
    </div>
  </div>
</div>

<script>
    
  var $fileInput = $('.file-input');
  var $droparea = $('.file-drop-area');
    
  // highlight drag area
  $fileInput.on('dragenter focus click', function() {
    $droparea.addClass('is-active');
  });
  
  // back to normal state
  $fileInput.on('dragleave blur drop', function() {
    $droparea.removeClass('is-active');
  });
  
  // change inner text
  $fileInput.on('change', function() {
    var filesCount = $(this)[0].files.length;
    var $textContainer = $(this).prev();
  
    if (filesCount === 1) {
      // if single file is selected, show file name
      var fileName = $(this).val().split('\\').pop();
      $textContainer.text(fileName);
    } else {
      // otherwise show number of files
      $textContainer.text(filesCount + ' files selected');
    }
  });
</script>