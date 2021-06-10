@extends('admin.layouts.app')

@section('home')
    <div class="container-fluid">

        <div class="row pt-3 mb-3">
            <div class="col-lg-7">
                <h4 class="font-weight-bold" style="color: black">Announcements</h4>
            </div>
            <div class="col-lg-5 d-flex justify-content-end align-items-start">
                <button class="btn btn-md btn-success" data-toggle="modal" data-target="#createModal">Add
                    Announcement
                </button>
            </div>
        </div>

        <div class="accordion" id="accordionExample" style="border: none">
            @forelse ($announcements as $announcement)
                <div class="card mb-3 border-0" style="color: black">
                    <div class="card-header row" id="headingOne">
                        <div class="col-md-1 d-flex flex-column justify-content-center align-items-center p-3">
                            <span>{{ Carbon\Carbon::parse($announcement->date_from)->format('M d') }}</span>
                            <span>{{ $announcement->time_from }}</span>
                        </div>

                        <div class="col-md-1  px-3 d-flex align-items-center">
                            <div class="row w-100">
                                <div class="col-md-9">
                                    <h4 class="btn-link font-weight-bold" style="color: black" >{{ $announcement->announcement_title }}</h4>
                                    <span class="btn-link" data-toggle="collapse" data-target="#collapse-{{ $loop->index }}"" aria-expanded="true" aria-controls="collapseOne" style="cursor: pointer">Show more...</span>
                                    <a href="" class="ann-data" data-toggle="modal" data-target="#editModal"
                                    data-id="{{ $announcement->id }}"
                                    data-title="{{ $announcement->announcement_title }}"
                                    data-employees="{{ $announcement->affected_employees }}"
                                    data-datefrom="{{ $announcement->date_from }}"
                                    data-timefrom="{{ $announcement->time_from }}"
                                    data-dateto="{{ $announcement->date_to }}"
                                    data-timeto="{{ $announcement->time_to }}"
                                    data-description="{{ $announcement->announcement_description }}"
                                    data-link="{{ $announcement->link }}"
                                    data-attachment="{{ $announcement->attachment }}"
                                    ><i class="fas fa-edit text-primary px-3" style="font-size: 1.5rem"></i></a>
                                    <a href="" onclick="event.preventDefault();
                                    document.getElementById('delete').submit();"><i class="fas fa-trash-alt text-danger" style="font-size: 1.5rem"></i></a>
                                    <form action="{{ route('announcement.delete', $announcement->id) }}" method="POST" id='delete'>
                                        @csrf
                                        @method('DELETE')
                                      </form>
                                </div>
                                <div class="col-md-3 d-flex justify-content-end">
                                    <span class="text-muted">{{ $announcement->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="collapse-{{ $loop->index }}"" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                      <div class="card-body">
                        <div class="row p-2 mb-2">
                            <div class="col-md-6">
                                <h5>Title: {{ $announcement->announcement_title }}</h5>
                                <h5>Date: {{ Carbon\Carbon::parse($announcement->date_from)->format('M d Y').' '.'-'.' '.Carbon\Carbon::parse($announcement->time_from)->format('g:i A') }}</h5>
                            </div>
                            <div class="col-md-6">
                                <h5>Employees: {{ $announcement->affected_employees }}</h5>
                            </div>
                        </div>

                        <hr>

                        <div class="row p-2">
                            <div class="col-md-12">
                                <span>{{ $announcement->announcement_description }}</span>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            @empty
                
            @endforelse
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
