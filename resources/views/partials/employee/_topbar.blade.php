<div class="c-wrapper">
  <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
    <button class="c-header-toggler c-class-toggler d-lg-none mr-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show"><span class="c-header-toggler-icon"></span></button><a class="c-header-brand d-sm-none" href="#"><img class="c-header-brand" src="{{ url('/assets/brand/coreui-base.svg')}}" width="97" height="46" alt="CoreUI Logo"></a>
    <button class="c-header-toggler c-class-toggler ml-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true"><span class="c-header-toggler-icon"></span></button>
    <ul class="c-header-nav ml-auto mr-4">
      {{-- Message Icon --}}
      <div class="has-dropdown dropleft mx-3">
        <svg class="c-icon mr-2" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-envelope-open') }}"></use>
        </svg>
        @if(auth()->user()->unreadNotifications->where('type','=','App\Notifications\MessageNotification')->count())  
          <span class="badge badge-danger align-self-start">{{ auth()->user()->unreadNotifications->where('type','=','App\Notifications\MessageNotification')->count() }}</span>
        @endif
        <div class="dropdown-menu p-0 m-0" aria-labelledby="dropdownMenuButton" style="width: 25rem; height: 30rem; position: absolute; top: 2rem; left: -20rem">
          <div class="card-header d-flex align-items-center justify-content-between" style="position: absolute; top: 0; height:10%; width: 100%; color: black; font-weight: bold; font-size: 1.2rem">
            <span>Messages</span>
            <button class="btn btn-success btn-sm btn-pill mb-1" type="button" data-toggle="modal" data-target="#createModal">Create</button>
          </div>
          <div class="card-body p-0 d-flex flex-column" style="position: absolute; top: 2.8rem; height:82%; width: 100%; overflow: scroll">
            @if (auth()->user()->notifications->count())
              @foreach (Auth::user()->notifications as $notification)
                @if ($notification->type === 'App\Notifications\MessageNotification')
                  <a class="dropdown-item row d-flex message w-100 message-item m-0 mt-2" data-toggle="modal" data-target="#showMessage" 
                  data-markasread="{{ $notification->id }}"
                  data-sender="{{ $notification->data['sender'] }}"
                  data-subject="{{ $notification->data['subject'] }}"
                  data-message="{{ $notification->data['message'] }}"
                  data-attachment="{{ $notification->data['attachment'] }}"
                  >
                    <div class="col-md-12 d-flex align-items-center">
                      <div class="is-tiny-square image is-rounded">
                        @if(!empty($notification->data['sender_image']))
                          <img class="img"  alt="">
                          <div class="c-avatar"><img class="c-avatar-img" src="{{ asset('/storage/images/'.$notification->data['sender_image']) }}" alt="user@email.com"><span class="c-avatar-status bg-success"></span></div>
                          @else
                          <div class="c-avatar"><img class="c-avatar-img" src="https://orbitcss.com/img/square.png" alt="user@email.com"><span class="c-avatar-status bg-success"></span></div>
                        @endIf
                      </div>
                      <span class="ml-2">
                        <h6 class="card-title font-weight-bold m-0">{{ $notification->data['sender']}}</h6>
                        <p class="card-text m-0 pt-1">{{ $notification->data['message']}}</p>
                        <span class="m-0 p-0" style="font-size: 10px">{{ $notification->created_at->diffForHumans() }}</span>
                      </span>
                    </div>
                  </a>
                @endif
              @endforeach
            @endif
          </div>
          <div class="card-footer d-flex justify-content-between" style="position: absolute; bottom: 0; height:10%; width: 100%">
            @if(!empty(auth()->user()->notifications->where('type', 'App\Notifications\MessageNotification')->first()->created_at))
              <small class="text-muted">{{ auth()->user()->notifications->where('type', 'App\Notifications\MessageNotification')->first()->created_at->diffForHumans() }}</small>
            @endif
              <small><a href="{{ route('announcement.markAllAsRead') }}" >Mark all as read</a></small>
          </div>
        </div>
      </div>
      {{-- End Message Icon --}}
      {{-- Profile Icon --}}
      <li class="c-header-nav-item has-dropdown">
        <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <div class="c-avatar"><img class="c-avatar-img" src="{{ asset('core-ui/assets/img/avatars/6.jpg') }}" alt="user@email.com"></div>
        </a>
        <div class="dropdown-menu dropdown-menu-right pt-0">
          <div class="dropdown-header bg-light py-2"><strong>Account</strong></div>
          <a class="dropdown-item" href="#">
            <svg class="c-icon mr-2">
              <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-bell"></use>
            </svg> Updates<span class="badge badge-info ml-auto">42</span>
          </a>
          <a class="dropdown-item" href="#">
            <svg class="c-icon mr-2">
              <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-envelope-open"></use>
            </svg> Messages<span class="badge badge-success ml-auto">42</span>
          </a>
          <a class="dropdown-item" href="#">
            <svg class="c-icon mr-2">
              <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-task"></use>
            </svg> Tasks<span class="badge badge-danger ml-auto">42</span>
          </a>
          <a class="dropdown-item" href="#">
            <svg class="c-icon mr-2">
              <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-comment-square"></use>
            </svg>Comments<span class="badge badge-warning ml-auto">42</span>
          </a>
        </div>
      </li>
      {{-- End Profile Icon --}}
    </ul>
    {{-- Modals --}}
    <!-- Create Modal -->
    <div class="modal fade" style="z-index: 2050" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create Message</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <form class="w-100" enctype="multipart/form-data"  action="{{ route('employee.send') }}" method="POST">
              @csrf
              <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationDefault01">Send To</label>
                    <select id="inputState" class="form-control" name="send_to">
                      <option selected value="">Choose...</option>             
                      <option value="Admin">Admin</option>             
                      @foreach ($users as $user)
                        <option>{{ $user->name }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="inputState">Send To All</label>
                  <select id="inputState" class="form-control" name="send_to_all">
                    <option selected value="">Choose...</option>
                    <option>All</option>
                    <option>Teacher</option>
                    <option>Staff</option>                                    
                    <option>Maintenance</option>
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
                  <input type="file" class="custom-file-input" name="attachment" id="customFile">
                  <label class="custom-file-label" for="customFile">Choose file</label>
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
    <!--Message Show Modal -->
    <div class="modal fade" id="showMessage" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTitleMess" style="font-weight: bold; color: black;"></h5>
            <a type="button" class="text-decoration-none close" id="showClose">
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
          </div>
          <div class="modal-footer">
            <a id="markAsReadMessShow" class="btn btn-secondary">Close</a>
            <button type="button" class="btn btn-primary" id="replyTo" 
            data-dismiss="modal" 
            data-toggle="modal" 
            data-target="#replyModal">Reply</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Reply Modal -->
    <div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Reply to: <span id="reply" style="color:black" ></span></h5>
              <a type="button" class="text-decoration-none close" id="replyClose">
                <span  aria-hidden="true">&times;</span>
              </a>
          </div>
          <div class="modal-body">
            <form class="w-100" enctype="multipart/form-data" action="{{ route('employee.reply') }}" method="POST">
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
                  <input type="file" class="custom-file-input" name="attachment" id="customFile">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <a type="button" class="btn btn-secondary" id="markAsReadMessReply">Close</a>
            <a id="replyMarkAsRead">
              <button type="submit" class="btn btn-primary" value="Submit Form">Send</button>
            </a>
          </div>
        </form>
        </div>
      </div>
    </div>
  </header>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script type="application/javascript">
    $(document).ready(function () {
        $('.announcement').each(function() {
          $(this).click(function(event){
            $('#markAsReadAnn').attr("href", "/employee/announcement/mark-as-read/"+$(this).data('markasread')+"")
            $('#modalTitleAnn').text($(this).data("title"))
            $('#bodyAnn').text($(this).data("description"))
          })
        });

        $('.message').each(function() {
          $(this).click(function(event){
            $('#replyMarkAsRead').attr("href", "/employee/announcement/mark-as-read/"+$(this).data('markasread')+"")
            $('#markAsReadMessShow').attr("href", "/employee/announcement/mark-as-read/"+$(this).data('markasread')+"")
            $('#markAsReadMessReply').attr("href", "/employee/announcement/mark-as-read/"+$(this).data('markasread')+"")
            $('#showClose').attr("href", "/employee/announcement/mark-as-read/"+$(this).data('markasread')+"")
            $('#replyClose').attr("href", "/employee/announcement/mark-as-read/"+$(this).data('markasread')+"")
            $('#modalTitleMess').text($(this).data("sender"))
            $('#sender').text($(this).data("sender"))
            $('#bodyMess').text($(this).data("message"))
            $('#subject').text($(this).data("subject"))
            $('#replyTo').attr('data-sendto', $(this).data("sender"))
          })
        });

        $('#replyTo').click(function(event){
          $('#reply').text($(this).data('sendto'))
          $('#sendTo').text($(this).data('sendto'))
          $('#sendTo').val($(this).data('sendto'))
        });
    });
</script>