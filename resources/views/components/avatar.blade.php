<div class="avatar-upload">
    @if(empty(auth()->user()->image))
        <form action="{{ route('image.update') }}" id="uploadForm" enctype="multipart/form-data" method="POST">
            @method('PUT')
            @csrf
            <input type='file' name="image" id="imageUpload" accept=".png, .jpg, .jpeg" onchange="document.getElementById('uploadForm').submit()" hidden/>
        </form>
        <a href="#" onclick="document.getElementById('imageUpload').click()">
            <img src="{{ asset(auth()->user()->sex === 'M' ? 'img/default-male.svg' : 'img/default-female.svg') }}" class="rounded-circle" style="height: 144px; width: 200px; overflow: hidden;">
        </a>
    @else
        <form action="{{ route('image.update') }}" id="uploadForm" enctype="multipart/form-data" method="POST">
            @method('PUT')
            @csrf
            <input type='file' name="image" id="imageUpload" accept=".png, .jpg, .jpeg" onchange="document.getElementById('uploadForm').submit()" hidden/>
        </form>
        <a href="#" onclick="document.getElementById('imageUpload').click()">
          <img src="{{ asset( 'storage/images/'.$image) }}" class="rounded-circle" style="height: 150px; width: 150px; overflow: hidden;">
        </a>
    @endif
</div>