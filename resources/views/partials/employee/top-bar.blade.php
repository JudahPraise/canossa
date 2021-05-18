<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
  <i class="fas fa-align-left px-2" id="menu-toggle"></i>
  <ul class="navbar-nav ml-auto mt-2 mt-lg-0 d-flex flex-row">

    {{-- Messages --}}
    <div class="has-dropdown dropleft m-0 mt-2 px-2">
      <i class="fas fa-envelope" style="font-size: 1.5rem" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
      @if(auth()->user()->unreadNotifications->where('type','=','App\Notifications\MessageNotification')->count())  
        <span class="badge badge-danger align-self-start">{{ auth()->user()->unreadNotifications->where('type','=','App\Notifications\MessageNotification')->count() }}</span>
      @endif
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width: 25rem; height: 30rem; position: absolute; top: 2rem; left: -15rem">
        <div class="card-header d-flex align-items-center justify-content-between" style="position: absolute; top: 0; height:10%; width: 100%; color: black; font-weight: bold; font-size: 1.2rem">
          <span>Messages</span>
          <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createModal">Create</button>
        </div>
        <div class="card-body p-0 pt-2" style="position: absolute; top: 2.8rem; height:82%; width: 100%; overflow: scroll">
          @if (auth()->user()->notifications->count())
            @foreach (Auth::user()->notifications as $notification)
              @if ($notification->type === 'App\Notifications\MessageNotification')
                <a class="dropdown-item d-flex flex-column announcement py-2" data-toggle="modal" data-target="#showAnnouncement"
                data-markasread="{{ $notification->id }}"
                data-subject="{{ $notification->data['subject'] }}"
                data-message="{{ $notification->data['message'] }}"
                data-attachment="{{ $notification->data['attachment'] }}"
                >
                  <h5 class="card-title">{{ $notification->data['subject']}}</h5>
                  <p class="card-text">{{ $notification->data['message']}}</p>
                </a>
              @endif
            @endforeach
          @else
            <div class="container w-100 h-100 m-0 d-flex justify-content-center align-items-center">
              <p>No messages yet</p>
            </div>
          @endif
        </div>
        <div class="card-footer d-flex justify-content-between" style="position: absolute; bottom: 0; height:10%; width: 100%">
            <small class="text-muted">Last updated 3 mins ago</small>
            <small><a href="#" >Mark all as read</a></small>
        </div>
      </div>
    </div>
    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    {{-- Announcements --}}
    <div class="has-dropdown dropleft m-0 mt-2 px-2">
      <i class="fas fa-bell" style="font-size: 1.5rem" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
      @if(auth()->user()->notifications->where('type', 'App\Notifications\AnnouncementNotification')->count())  
        <span class="badge badge-danger align-self-start">{{ auth()->user()->unreadNotifications()->where('type', 'App\Notifications\AnnouncementNotification')->count() }}</span>
      @endif
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width: 25rem; height: 30rem; position: absolute; top: 2rem; left: -16rem;">
        <div class="card-header" style="position: absolute; top: 0; height:10%; width: 100%; color: black; font-weight: bold; font-size: 1.2rem">Announcements</div>>
        <div class="card-body p-0 pt-2" style="position: absolute; top: 2.8rem; height:82%; width: 100%; overflow: scroll">
          @if (auth()->user()->unreadNotifications->count())
            @foreach (auth()->user()->notifications as $notification)
              @if ($notification->type === 'App\Notifications\AnnouncementNotification')
                <a class="dropdown-item d-flex flex-column announcement py-2" 
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
                data-toggle="modal" data-target="#showAnnouncement">
                  <h5 class="card-title" style="color: black">{{ $notification->data['announcement_title']  }}</h5>
                  <p class="card-text" style="color: black">{{ Carbon\Carbon::parse($notification->data['date_from'])->format('M d') }}</p>
                </a>
            @endif
            @endforeach
          @else
            <div class="container w-100 h-100 m-0 d-flex justify-content-center align-items-center">
              <p>No notifications yet</p>
            </div>
          @endif
        </div>
        <div class="card-footer d-flex justify-content-between" style="position: absolute; bottom: 0; height:10%; width: 100%">
            {{-- <small class="text-muted">{{ $notifications->first()->created_at->diffForHumans() }}</small> --}}
            <small><a href="{{ route('announcement.markAllAsRead') }}" >Mark all as read</a></small>
        </div>
      </div>
    </div>
    <!--FIXME: Modal -->
    <div class="modal fade" id="showAnnouncement" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTitle"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <span id="body"></span>
          </div>
          <div class="modal-footer">
            <a id="markAsRead" class="btn btn-secondary">Close</a>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    {{-- Account Settings --}}
    <ul class="nav-item has-dropdown is-right is-hoverable m-0 is-desktop-up">
        <li onclick="this.closest('.has-dropdown').classList.toggle('is-active');" class="nav-item" style="height: 2rem; list-style: none;"><a class="has-arrow nav-link has-text-black" href="#" style="color: black;">{{ Auth::user()->name }}</a></li>
        <ul class="dropdown" style="height: 10rem; position: absolute">
            <li class="nav-item dropdown__link">
              <a href="#" class="nav-link" >Profile</a>
            </li>
            <li class="nav-item dropdown__link">
                <a href="#" class="nav-link" >Account Settings</a>
            </li>
            <li class="nav-item dropdown__link">
                <a class="dropdown-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt px-2 is-desktop-down is-tablet-only"></i>{{ __('Logout') }}</a>
            </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
       </ul>
    </ul>

    <ul class="nav-item has-dropdown is-right is-hoverable m-0 is-desktop-down">
        <li onclick="this.closest('.has-dropdown').classList.toggle('is-active');" class="nav-item" style="height: 2rem; list-style: none;">
            <a class="has-arrow nav-link" href="#">{{ Auth::user()->fname }}</a>
        </li>
        <ul class="dropdown" style="height: 10rem; position: absolute">
            <li class="nav-item dropdown__link">
                <a href="#" class="nav-link" >Profile</a>
            </li>
            <li class="nav-item dropdown__link">
                <a href="#" class="nav-link" >Account Settings</a>
            </li>
            <li class="nav-item dropdown__link">
                <a class="dropdown-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt px-2 is-desktop-down is-tablet-only"></i>{{ __('Logout') }}</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
       </ul>
    </ul>
  </ul>
</nav>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script type="application/javascript">
    $(document).ready(function () {
        $('.announcement').each(function() {
          $(this).click(function(event){
            $('#markAsRead').attr("href", "/employee/announcement/mark-as-read/"+$(this).data('markasread')+"")
            $('#modalTitle').text($(this).data("title"))
            // $('#announcement_titleEdit').val($(this).data("title"))
            // $('#affected_employeesEdit').val($(this).data("employees"))
            // $('#date_fromEdit').val($(this).data("datefrom"))
            // $('#time_fromEdit').val($(this).data("timefrom"))
            // $('#date_toEdit').val($(this).data("dateto"))
            // $('#time_toEdit').val($(this).data("timeto"))
            $('#body').text($(this).data("description"))
            // $('#linkEdit').val($(this).data("link"))
            // $('#customFileEdit').val($(this).data("attachment"))
          })
        });
    });
</script>