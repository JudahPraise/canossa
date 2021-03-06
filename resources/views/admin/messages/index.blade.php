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
          <h2 class="font-weight-bold" style="color: black">Messages</h2>
      </div>
      <div class="col d-flex justify-content-end align-items-start">
          <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#createModal">
            Create Message
          </button>
      </div>
    </div>
    <div class="row p-3">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0 row d-flex align-items-center">
              <div class="col-6 col-md-6 m-0">
                <h2 class="mb-0">Inbox</h2>
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
                  <th scope="col">Name</th>
                  <th></th>
                  <th scope="col">Send to</th>
                  <th scope="col">Subject</th>
                  <th scope="col"></th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody class="list">
                @forelse ($messages as $message)
                    <tr class="message" data-toggle="modal" data-target="#showMessage" 
                    data-markasread="{{ $message->id }}"
                    data-sender="{{ $message->sender }}"
                    data-subject="{{ $message->subject }}"
                    data-message="{{ $message->message }}"
                    data-attachment="{{ $message->attachment }}">
                      <th scope="row">
                        <div class="media align-items-center">
                            <a href="#" class="avatar rounded-circle mr-3">
                              <img src="{{ asset('storage/images/'.$message->sender_image) }}" style=" height: 50px; overflow: hidden;">
                            </a>
                        </div>
                      </th>
                      <td>
                        <strong style="font-size: .9rem">{{ $message->sender }}</strong><br>
                        <small style="font-size: .9rem">{{ $message->message }}</small>
                      </td>
                      <td class="budget">
                        {{ $message->send_to }}
                      </td>
                      <td class="budget">
                        {{ $message->subject }}
                      </td>
                      <td>
                        {{ $message->created_at->diffForHumans() }}
                      </td>
                      <td class="message">
                        <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#showMessage" 
                        data-markasread="{{ $message->id }}"
                        data-sender="{{ $message->sender }}"
                        data-subject="{{ $message->subject }}"
                        data-message="{{ $message->message }}"
                        data-attachment="{{ $message->attachment }}">View Message</button>
                        @if ($message->sender_type != 'Admin')
                            <button class="btn btn-sm btn-info text-white" data-toggle="modal"  id="replyTo"
                            data-target="#replyModal" 
                            data-sendto="{{ $message->sender }}" >Reply</button>
                        @endif
                      </td>
                    </tr>
                @empty
                  <tr class="text-center">
                    <td colspan="5"><small>No message yet</small></td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!--Message Show Modal -->
    <div class="modal fade" id="showMessage" aria-labelledby="showMessage" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTitleMess" style="font-weight: bold; color: black;"></h5>
            <a type="button" class="text-decoration-none close" id="showClose" data-dismiss="modal">
              <span  aria-hidden="true">&times;</span>
            </a>
          </div>
          <div class="modal-body mb-3">
            <div class="row">
              <div class="col-md-12 d-flex flex-column" style="color: black">
                <span>Subject: <span id="subject" style="font-weight: bold"></span></span>
                <span>Sender: <span id="sender" style="font-weight: bold"></span></span>
              </div>
            </div>
            <hr>
            <div>Message:</div>
            <span id="bodyMess" style="color: black"></span>
            <div class="mt-3">Attachment:</div>
            <span id="attachment" style="color: black"></span>
          </div>
          <div class="modal-footer">
            <a class="btn btn-secondary" data-dismiss="modal">Close</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Create Modal -->
    <div class="modal fade" id="createModal" aria-labelledby="createModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create Message</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <form class="w-100" enctype="multipart/form-data"  action="{{ route('send') }}" method="POST">
              @csrf
              <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="validationDefault01">Send To</label>
                    <select id="inputState" class="form-control" name="send_to">
                      <option selected value="">Choose...</option>
                      @foreach ($users as $user)
                        <option value={{ $user->employee_id }}>{{ $user->fullName() }}</option>
                      @endforeach
                    </select>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-12 mb-3">
                  <label for="validationDefault01">Subject</label>
                  <input type="text" class="form-control" name="subject" id="validationDefault01" placeholder="Subject" required>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-12 mb-3">
                  <label for="exampleFormControlTextarea1">Message</label>
                  <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
              </div>

              <div class="form-row">
                <label for="">Attachment</label>
                <div class="col-md-12 mb-3 custom-file">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input-core" name="attachment"  id="customFile">
                    <label class="custom-file-label-core" for="customFile">Choose file</label>
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" value="Submit Form">Send</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="replyModal" aria-labelledby="replyModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Reply to: <span id="reply" style="color:black" ></span></h5>
            <a type="button" class="text-decoration-none close" id="replyClose" data-dismiss="modal">
              <span  aria-hidden="true">&times;</span>
            </a>
          </div>
          <div class="modal-body">
            <div class="modal-body">
              <form class="w-100" enctype="multipart/form-data" id="replyForm" action="{{ route('reply') }}" method="POST">
                @csrf
                <div class="form-row mb-3">
                  <div class="col-md-12 mb-3">
                      <label for="validationDefault01">Send To</label>
                      <select id="inputState" class="form-control" name="send_to">           
                        <option id="sendTo"></option>
                      </select> 
                  </div>
                </div>
                
                <div class="form-row mb-3">
                  <div class="col-md-12 mb-3">
                    <label for="validationDefault01">Subject</label>
                    <input type="text" class="form-control" name="subject" id="validationDefault01" placeholder="Subject" required>
                  </div>
                </div>
  
                <div class="form-row">
                  <div class="col-md-12 mb-3">
                    <label for="exampleFormControlTextarea1">Message</label>
                    <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                </div>
  
                <div class="form-row">
                  <label for="">Attachment</label>
                  <div class="col-md-12 mb-3 custom-file">
                    <input type="file" class="custom-file-input-core" name="attachment" id="customFile">
                    <label class="custom-file-label-core" for="customFile">Choose file</label>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="document.getElementById('replyForm').submit()">Save changes</button>
          </div>
        </div>
      </div>
    </div>
</div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script type="application/javascript">
      $(document).ready(function () {
          $('.message').each(function() {
            $(this).click(function(event){
              $('#modalTitleMess').text($(this).data("sender"))
              $('#sender').text($(this).data("sender"))
              $('#bodyMess').text($(this).data("message"))
              $('#subject').text($(this).data("subject"))
              $('#attachment').text($(this).data("attachment"))
              $('#replyTo').attr('data-sendto', $(this).data("sender"))
            })
            $('#replyTo').click(function(event){
              $('#sendTo').text($(this).data('sendto'))
            });
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
