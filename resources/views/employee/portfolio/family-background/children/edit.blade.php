@extends('employee.portfolio.family-background.children.index')

@section('children')
  <div class="container-fluid pb-5">
      <form action="{{ route('children.update', Auth::user()->family->id) }}" method="POST">
        @method('PUT')
          @csrf
          <div class="form-group inputs_div">
            @foreach ($children as $child)
              <div class="form-row d-flex align-items-center">
                <div class="col-md-6 mb-3">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name[]" id="name" value="{{ $child->name }}" required>
                </div>
                <div class="col-md-5 mb-3 mr-2">
                  <label for="date_of_birth">Date of birth</label>
                  <input type="date" class="form-control" name="date_of_birth[]" id="date_of_birth" value="{{ $child->date_of_birth }}" required>
                </div>
                <a class="add neu-effect d-flex justify-content-center align-items-center mr-2 text-decoration-none py-3 px-3" style="display:inline-block; "><i class="fas fa-plus text-success" style="font-size: 1.1rem"></i></a>
                <a class="neu-effect d-flex justify-content-center align-items-center mr-2 text-decoration-none py-3 px-3" style="display:inline-block; "><i class="fas fa-trash text-danger" style="font-size: 1.1rem"></i></a>
              </div>
            @endforeach
          </div>
          <button class="btn btn-primary" type="submit">Submit form</button>
      </form>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $(this).on("click", ".add", function(){
        var html = '<div class="form-row d-flex align-items-center"><div class="col-md-6 mb-3"><label for="name">Name</label><input type="text" class="form-control" name="name[]" id="name" required></div><div class="col-md-5 mb-3 mr-2"><label for="date_of_birth">Date of birth</label><input type="date" class="form-control" name="date_of_birth[]" id="date_of_birth" required></div><a class="add neu-effect d-flex justify-content-center align-items-center mr-2 text-decoration-none py-3 px-3" style="display:inline-block; "><i class="fas fa-plus text-success" style="font-size: 1.1rem"></i></a><a class="neu-effect d-flex justify-content-center align-items-center mr-2 text-decoration-none py-3 px-3 remove" style="display:inline-block; "><i class="fas fa-trash text-danger" style="font-size: 1.1rem"></i></a></div>'
        console.log('get');
        $('.inputs_div').append(html);
      // console.log('hello');
      });
      $(this).on("click", ".remove", function(){
        var target_input = $(this).parent();
          target_input.remove();
      });
    });
  </script>

@endsection