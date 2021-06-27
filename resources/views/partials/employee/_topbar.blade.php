<div class="c-wrapper">
  <header class="c-header c-header-light c-header-fixed c-header-with-subheader" id="topbar">
    <button class="c-header-toggler c-class-toggler d-lg-none mr-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show"><span class="c-header-toggler-icon"></span></button>
    <button class="c-header-toggler c-class-toggler ml-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true"><span class="c-header-toggler-icon"></span></button>
    <ul class="c-header-nav ml-auto">
      {{-- Message Icon --}}
      <div class="has-dropdown dropleft">
        <i class="fas fa-envelope" style="font-size: 1.5rem; color: #407BFF" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
        @if(auth()->user()->unreadNotifications->where('type','=','App\Notifications\MessageNotification')->count())  
          <span class="badge badge-danger align-self-start">{{ auth()->user()->unreadNotifications->where('type','=','App\Notifications\MessageNotification')->count() }}</span>
        @endif
        <div class="dropdown-menu p-0 m-0" aria-labelledby="dropdownMenuButton" style="width: 20rem; height: 30rem; position: absolute; top: 2rem; left: -13rem">
          <div class="card-header d-flex align-items-center justify-content-between" style="position: absolute; top: 0; height:10%; width: 100%; color: black; font-weight: bold; font-size: 1.2rem">
            <span>Messages</span>
            <button class="btn btn-success btn-sm btn-pill mb-1" type="button" data-toggle="modal" data-target="#createModal">Create</button>
          </div>
          <div class="card-body p-0 d-flex flex-column" style="position: absolute; top: 2.8rem; height:82%; width: 100%; overflow-y: auto">
            @if (auth()->user()->notifications->count())
              @foreach (Auth::user()->notifications as $notification)
                @if ($notification->type === 'App\Notifications\MessageNotification')
                  <a class="dropdown-item row d-flex message w-100 message-item m-0 mt-2 {{ $notification->read_at === null ? 'bg-gradient-success text-white' : '' }}" data-toggle="modal" data-target="#showMessage" 
                  data-markasread="{{ $notification->id }}"
                  data-sender="{{ $notification->data['sender'] }}"
                  data-subject="{{ $notification->data['subject'] }}"
                  data-message="{{ $notification->data['message'] }}"
                  data-attachment="{{ $notification->data['attachment'] }}"
                  style="width: 300px; white-space: nowrap;
                  overflow: hidden;"
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
                        <h4 class="card-title font-weight-bold m-0 {{ $notification->read_at === null ? 'text-white' : '' }}">{{ $notification->data['sender']}}</h4>
                        <p class="card-text m-0 pt-1 {{ $notification->read_at === null ? 'text-white' : '' }}" style="white-space: nowrap;
                          overflow: hidden;
                          text-overflow: ellipsis;">{{ $notification->data['message']}}</p>
                        <span class="m-0 p-0 {{ $notification->read_at === null ? 'text-white' : '' }}" style="font-size: 10px">{{ $notification->created_at->diffForHumans() }}</span>
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
      <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="true">
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
    <div class="modal fade" id="showMessage" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
            <div>Message</div>
            <span id="bodyMess" style="color: black"></span>
            <div class="mt-3">Attachment</div>
            <span id="attachment" style="color: black"></span>
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
      {{-- End Message Icon --}}
      {{-- Announcements --}}
      <div class="has-dropdown dropleft mx-3">
        <i class="fas fa-bell" style="font-size: 1.5rem; color: #407BFF" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
        @if(auth()->user()->unreadNotifications->where('type', 'App\Notifications\AnnouncementNotification')->count())  
          <span class="badge badge-danger align-self-start">{{ auth()->user()->unreadNotifications()->where('type', 'App\Notifications\AnnouncementNotification')->count() }}</span>
        @endif
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width: 20rem; height: 30rem; position: absolute; top: 2rem; left: -15.5rem;">
          <div class="card-header d-flex align-items-center justify-content-between" style="position: absolute; top: 0; height:10%; width: 100%; color: black; font-weight: bold; font-size: 1rem;">
            Announcements
          </div>
          <div class="card-body p-0 pt-2" style="position: absolute; top: 2.8rem; height:82%; width: 100%; overflow-y: auto; overflow-x: hidden;">
            @if (auth()->user()->notifications->count())
              @forelse (auth()->user()->notifications as $notification)
                @if ($notification->type === 'App\Notifications\AnnouncementNotification')
                  <a class="dropdown-item row d-flex flex-column align-items-start announcement m-0 mt-2 {{ $notification->read_at === null ? 'bg-gradient-success text-white' : '' }}" 
                  data-markasread="{{ $notification->id }}"
                  data-title="{{ $notification->data['announcement_title'] }}"
                  data-employees="{{ $notification->data['affected_employees'] }}"
                  data-datefrom="{{ $notification->data['date_from'] }}"
                  data-timefrom="{{ $notification->data['time_from'] }}"
                  data-dateto="{{ $notification->data['date_to'] }}"
                  data-timeto="{{ $notification->data['time_to'] }}"
                  data-description="{{ $notification->data['announcement_description'] }}"
                  data-link="{{ $notification->data['link'] }}"
                  data-attachment="{{ $notification->data['attachment'] }}"
                  data-toggle="modal" data-target="#showAnnouncement"
                  style="width: 300px; white-space: nowrap;
                  overflow: hidden;">
                    <h4 class="card-title m-0 font-weight-800 {{ $notification->read_at === null ? 'text-white' : '' }}">{{ $notification->data['announcement_title']  }}</h4>
                    <p class="m-0 {{ $notification->read_at === null ? 'text-white' : '' }}" style="text-overflow: ellipsis; white-space: nowrap;
                      overflow: hidden;">{{ $notification->data['announcement_description'] }}</p>
                    <p class="card-text m-0 {{ $notification->read_at === null ? 'text-white' : '' }}">{{ Carbon\Carbon::parse($notification->data['date_from'])->format('M d') }}</p>
                  </a>
                @endif
              @empty
                <div class="container w-100 h-100 m-0 d-flex justify-content-center align-items-center">
                  <p>No notifications yet</p>
                </div>
              @endforelse
            @endif
          </div>
          <div class="card-footer d-flex justify-content-between" style="position: absolute; bottom: 0; height:10%; width: 100%">
            @if (!empty(auth()->user()->notifications->where('type', 'App\Notifications\AnnouncementNotification')->first()->created_at))
              <small class="text-muted">{{ auth()->user()->notifications->where('type', 'App\Notifications\AnnouncementNotification')->first()->created_at->diffForHumans() }}</small>
            @endif
              <small><a href="{{ route('announcement.markAllAsRead') }}" >Mark all as read</a></small>
          </div>
        </div>
      </div>
      <!--Announcement Show Modal -->
      <div class="modal fade" id="showAnnouncement" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalTitleAnn"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h3>Description</h3>
              <span id="bodyAnn"></span>
            </div>
            <div class="modal-body w-100">
              <h3>Link</h3>
              <a class="w-100" id="link" style=" word-wrap:break-word;"></a>
            </div>
            <div class="modal-body">
              <h3>Attachment</h3>
              <span id="attachment"></span>
            </div>
            <div class="modal-footer">
              <a id="markAsReadAnn" class="btn btn-secondary">Close</a>
            </div>
          </div>
        </div>
      </div>
      {{-- Profile Icon --}}
      <li class="c-header-nav-item has-dropdown">
        @if (!empty(auth()->user()->image))
          <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <div class="c-avatar"><img class="c-avatar-img" src="{{ asset( 'storage/images/'.Auth::user()->image) }}" style=" height: 40px; overflow: hidden;"></div>
          </a>
        @else
          <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <div class="c-avatar"><img class="c-avatar-img" src="{{ asset(auth()->user()->sex === 'M' ? 'img/default-male.svg' : 'img/default-female.svg') }}" style=" height: 40px; overflow: hidden;"></div>
          </a>
        @endif
        <div class="dropdown-menu dropdown-menu-right pt-0">
          <div class="dropdown-header bg-light py-2"><strong>Account</strong></div>
          <a class="dropdown-item" href="{{ route('profile.index') }}">
            <svg class="c-icon mr-2">
              <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-user') }}"></use>
            </svg>{{ !empty(auth()->user()->personal->first_name) ? auth()->user()->personal->first_name : auth()->user()->employee_id }}
          </a>
          <a class="dropdown-item" href="{{ route('settings') }}">
            <svg class="c-icon mr-2">
              <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-settings') }}"></use>
            </svg> Settings
          </a>
          @if (!empty(auth()->user()->feedback))
            <a class="dropdown-item" href="{{ route('feedback.index') }}">
              <svg class="c-icon mr-2">
                <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-speech') }}"></use>
              </svg> Feedback
            </a>
          @else
            <a class="dropdown-item" data-toggle="modal" data-target="#feedback2Modal">
              <svg class="c-icon mr-2">
                <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-speech') }}"></use>
              </svg> Feedback
            </a>
          @endif
          @if (!empty(auth()->user()->feedback) || auth()->user()->status === 'resigned')
            <a class="dropdown-item" onclick="document.getElementById('logoutForm').submit()">
              <svg class="c-icon mr-2">
                <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-exit-to-app') }}"></use>
              </svg> Logout
              <form action="{{ route('logout') }}" method="POST" id="logoutForm">@csrf</form>
            </a>
          @else
            <a class="dropdown-item" data-toggle="modal" data-target="#feedbackModal">
              <svg class="c-icon mr-2">
                <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-exit-to-app') }}"></use>
              </svg> Logout
            </a>
          @endif
        </div>
      </li>
      {{-- End Profile Icon --}}
    </ul>
    {{-- Modals --}}
    {{-- Feedback Modal --}}
    <div class="modal fade" style="z-index: 2050" id="feedback2Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="true">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Feedback</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <form class="w-100" enctype="multipart/form-data" id="feedbackForm"  action="{{ route('feedback.storeToFeedback') }}" method="POST">
              @csrf
              <div class="text-center mb-5">
                <h1>We need your feedback</h1>
                <h3>What can we do to improve the experience?</h3>
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Feedback</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="feedback" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Suggestion</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="suggestion" rows="3"></textarea>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" value="Submit Form">Send</button>
            </div>
         </form>
        </div>
      </div>
    </div>
    {{-- Feedback Modal --}}
    <div class="modal fade" style="z-index: 2050" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="true">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Feedback</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <form class="w-100" enctype="multipart/form-data" id="feedbackForm"  action="{{ route('feedback.store') }}" method="POST">
              @csrf
              <div class="text-center mb-5">
                <h1>We need your feedback!</h1>
                <h3>What can we do to improve the experience?</h3>
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Feedback</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="feedback" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Suggestion</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="suggestion" rows="3"></textarea>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" value="Submit Form">Send</button>
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
            $('#link').text($(this).data("link"))
            $('#link').attr('href', $(this).data("link"))
            $('#attachment').text($(this).data("attachment"))
          })
        });

        $('.message').each(function() {
          $(this).click(function(event){
            $('#replyMarkAsRead').attr("href", "/employee/announcement/mark-as-read/"+$(this).data('markasread')+"")
            $('#markAsReadMessShow').attr("href", "/employee/announcement/mark-as-read/"+$(this).data('markasread')+"")
            $('#markAsReadMessReply').attr("href", "/employee/announcement/mark-as-read/"+$(this).data('markasread')+"")
            $('#showClose').attr("href", "/employee/announcement/mark-as-read/"+$(this).data('markasread')+"")
            $('#replyClose').attr("href", "/employee/announcement/mark-as-read/"+$(this).data('markasread')+"")
            $('#attachment').text($(this).data("attachment"))
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