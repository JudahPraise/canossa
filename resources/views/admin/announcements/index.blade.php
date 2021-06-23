@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/orbitcss/css/orbit.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('argon/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('argon/css/argon.css?v=1.2.0') }}" type="text/css">
@endsection

@section('home')
<div class="container-fluid">
    <div class="row row-cols-2 p-3">
      <div class="col">
          <h2 class="font-weight-bold" style="color: black">Announcements</h2>
      </div>
      <div class="col d-flex justify-content-end align-items-start">
          <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#createModal">
            Create Announcement
          </button>
      </div>
    </div>
    <div class="row p-3">
      <div class="col">
        <div class="card">
          <!-- Card header -->
            <div class="card-header border-0 row d-flex align-items-center">
                <div class="col-6 col-md-6 m-0">
                  <h2 class="mb-0"></h2>
                </div>
                <div class="col-6 col-md-6 d-flex justify-content-sm-end p-0">
                    <form class="navbar-search-light form-inline" id="navbar-search-main">
                      <div class="form-group mb-0  w-100">
                        <div class="input-group input-group-alternative w-100">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                          </div>
                          <input class="form-control" placeholder="Search" type="text" id="myInput" onkeyup="myFunction()">
                        </div>
                      </div>
                    </form>
                </div>
            </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush" id="myTable">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Title</th>
                  <th>Description</th>
                  <th scope="col">Affected Employees</th>
                  <th scope="col">Date</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody class="list">
                @forelse ($announcements as $announcement)
                    <tr>
                      <th scope="row">
                        {{ $announcement->announcement_title }}
                      </th>
                      <td>
                        {{ $announcement->announcement_description }}
                      </td>
                      <td>
                        {{ $announcement->affected_employees }}
                      </td>
                      <td>
                        {{ \Carbon\Carbon::parse($announcement->date_from)->format('m/d/Y') }}
                      </td>
                      <td>
                        <button class="btn btn-icon btn-sm btn-primary" type="button" data-toggle="modal" data-target="#showModal">
                            <span class="btn-inner--icon"><i class="fas fa-eye"></i></span>
                        </button>
                        <button class="btn btn-icon btn-sm btn-info" type="button" data-toggle="modal" data-target="#editModal">
                            <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                        </button>
                        <button class="btn btn-icon btn-sm btn-danger" type="button" onclick="event.preventDefault();
                        document.getElementById('delete').submit()">
                            <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                        </button>
                        <form action="{{ route('announcement.delete', $announcement->id) }}" method="POST" id='delete'>
                            @csrf
                            @method('DELETE')
                          </form>
                      </td>
                    </tr>
                @empty
                  <tr>
                    <td class="text-center" colspan="5"><p>No data</p></td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Announcement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="w-100" enctype="multipart/form-data"  action="{{ route('announcement.store') }}" method="POST">
                        @csrf
                        <div class="form-row">  
                            <div class="col-md-6 mb-3">
                                <label for="announcement_title">Title</label>
                                <input type="text" class="form-control" name="announcement_title" id="announcement_title" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="affected_employees">Affected Employees</label>
                                <select id="affected_employees" name="affected_employees" class="form-control">
                                    <option class="text-muted" selected null>Choose</option>
                                    <option>All</option>
                                    <option>Teacher</option>
                                    <option>Staff</option>                                    
                                    <option>Maintenance</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="date_from">Date From</label>
                                <input type="date" class="form-control" name="date_from" id="date_from" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="time_from">Time From</label>
                                <input type="time" class="form-control" name="time_from" id="time_from" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="date_to">Date To</label>
                                <input type="date" class="form-control" name="date_to" id="date_to" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="time_to">Time To</label>
                                <input type="time" class="form-control" name="time_to" id="time_to" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="announcement_description">Description</label>
                                <textarea class="form-control" id="announcement_description" name="announcement_description" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md 12 mb-3">
                                <label for="link">Link</label>
                                <input type="text" class="form-control" name="link" id="link">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="customFile">Attachment</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="attachment" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                  </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" value="Submit Form">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Add Announcement</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
                <div class="modal-body">
                 <form class="w-100" enctype="multipart/form-data"  action="{{ route('announcement.update') }}" method="POST">
                    @csrf
                    <input type="text" name="id" id="idEdit" hidden>
                    <div class="form-row">  
                        <div class="col-md-6 mb-3">
                            <label for="announcement_title">Title</label>
                            <input type="text" class="form-control" name="announcement_title" id="announcement_titleEdit" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="affected_employees">Affected Employees</label>
                            <select id="affected_employeesEdit" name="affected_employees" class="form-control">
                                <option class="text-muted" selected null>Choose</option>
                                <option>All</option>
                                <option>Teacher</option>
                                <option>Staff</option>                                    
                                <option>Maintenance</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="date_from">Date From</label>
                            <input type="date" class="form-control" name="date_from" id="date_fromEdit" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="time_from">Time From</label>
                            <input type="time" class="form-control" name="time_from" id="time_fromEdit" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="date_to">Date To</label>
                            <input type="date" class="form-control" name="date_to" id="date_toEdit" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="time_to">Time To</label>
                            <input type="time" class="form-control" name="time_to" id="time_toEdit" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="announcement_description">Description</label>
                            <textarea class="form-control" id="announcement_descriptionEdit" name="announcement_description" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md 12 mb-3">
                            <label for="link">Link</label>
                            <input type="text" class="form-control" name="link" id="linkEdit">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="customFile">Attachment</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="attachment" id="customFileEdit">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                              </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" value="Submit Form">Save changes</button>
                </div>
             </form>
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script type="application/javascript">
        $(document).ready(function () {

            $('input[type="file"]').change(function(e){
                var fileName = e.target.files[0].name;
                $('.custom-file-label').html(fileName);
            });

            $('.ann-data').each(function() {
              $(this).click(function(event){
                console.log('clicked');
                $('#idEdit').val($(this).data("id"))
                $('#announcement_titleEdit').val($(this).data("title"))
                $('#affected_employeesEdit').val($(this).data("employees"))
                $('#date_fromEdit').val($(this).data("datefrom"))
                $('#time_fromEdit').val($(this).data("timefrom"))
                $('#date_toEdit').val($(this).data("dateto"))
                $('#time_toEdit').val($(this).data("timeto"))
                $('#announcement_descriptionEdit').val($(this).data("description"))
                $('#linkEdit').val($(this).data("link"))
                $('#customFileEdit').val($(this).data("attachment"))
              })
            });
        });
    </script>

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
@endsection
