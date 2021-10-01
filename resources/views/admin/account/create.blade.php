@extends('admin.layouts.app')

@section('css')
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('argon/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('argon/css/argon.css?v=1.2.0') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/breakpoints.css') }}" type="text/css">
@endsection

@section('home')

    <div class="container break-container">
        <h2 class="mb-3">Assign Administrator</h3>
        <div class="form-group position-relative">
            <div class="input-group input-group-alternative w-100">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" id="search" placeholder="Enter employee name..." autocomplete="off">
            </div>
            <div id="matchList" class="list-group position-absolute w-100" style="z-index: 1"></div>
        </div>
        <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection

@section('js')
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ asset('argon/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/js-cookie/js.cookie.j') }}s"></script>
    <script src="{{ asset('argon/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('argon/js/argon.js?v=1.2.0') }}"></script>
        <!-- Script -->
        <script>
            const search = document.getElementById('search');
            const matchList = document.getElementById('matchList');
    
            const searchEmployees = async searchText => {
                const res = await fetch('{{ route('admin.getEmployees') }}');
                const employees = await res.json();
                
                let matches = employees.filter(employee => {
                    const regex = new RegExp(`^${searchText}`, 'gi');
                    return employee.lname.match(regex) || employee.fname.match(regex);
                });
    
                if(searchText.length === 0){
                    matches = [];
                    matchList.innerHTML = '';
                }
    
                console.log(matches);
                outputHtml(matches);
            };
    
            const outputHtml = matches => {
                if(matches.length > 0){
                    const html = matches
                    .map(
                        match => `
                        <a href="/admin/admins/getEmployee/${match.id}" class="list-group-item list-group-item-action" >
                            <h3>${match.lname}, ${match.fname}, ${match.mname}</h3> 
                            <span class="text-black-50">Role: <span class="text-primary mr-2">${match.role}</span> Department: <span class="text-primary">${match.category}</span></span> 
                        </a>
                        `
                    ).join('');
    
                    matchList.innerHTML = html;
                }
            }
    
            search.addEventListener('input', () => searchEmployees(search.value));
        </script>
@endsection