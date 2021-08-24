<div class="c-sidebar-brand d-lg-down-none">     
  <div class="c-sidebar-brand-full">
    <h5 class="text-white">Canossa</h5>
  </div>
  <div class="c-sidebar-brand-minimized" style="background: none">
    <img src="{{ asset('img/circle-logo.png') }}" width="35" height="35" alt="Canossa Logo">
  </div>
</div>
<ul class="c-sidebar-nav m-0">
<li class="c-sidebar-nav-item">
  <a class="c-sidebar-nav-link" href="{{ route('home') }}">
    <svg class="c-sidebar-nav-icon">
      <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-speedometer') }}"></use>
    </svg>
    Dashboard
  </a>
</li>
<li class="c-sidebar-nav-item">
  <a class="c-sidebar-nav-link" href="{{ route('portfolio.index', 'card') }}">
    <svg class="c-sidebar-nav-icon">
      <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-address-book') }}"></use>
    </svg>
    Portfolio
  </a>
</li>
<li class="c-sidebar-nav-item">
  <a class="c-sidebar-nav-link" href="{{ route('profile.index') }}">
    <svg class="c-sidebar-nav-icon">
      <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-user') }}"></use>
    </svg>
    Profile
  </a>
</li>
<li class="c-sidebar-nav-item">
  <a class="c-sidebar-nav-link" href="{{ route('resume') }}">
    <svg class="c-sidebar-nav-icon">
      <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-file') }}"></use>
    </svg>
    Resume
  </a>
</li>
<li class="c-sidebar-nav-item">
  <a class="c-sidebar-nav-link" href="{{ route('document.index') }}">
    <svg class="c-sidebar-nav-icon">
      <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-folder-open') }}"></use>
    </svg>
    Documents
  </a>
</li>
<li class="c-sidebar-nav-item mt-auto">
  <a class="c-sidebar-nav-link c-sidebar-nav-link-success text-white" data-toggle="modal" data-target="#feedbackModal">
    <svg class="c-sidebar-nav-icon">
      <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-medical-cross') }}"></use>
    </svg>
    Go to Medical Records
  </a>
</li>
<li class="c-sidebar-nav-item">
  @if (!empty(auth()->user()->feedback) || auth()->user()->status === 'resigned')
    <a class="c-sidebar-nav-link c-sidebar-nav-link-danger text-white" onclick="document.getElementById('logoutForm').submit()">
      <svg class="c-sidebar-nav-icon">
        <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-exit-to-app') }}"></use>
      </svg>
      Logout
      <form action="{{ route('logout') }}" method="POST" id="logoutForm">@csrf</form>
    </a>
  @else
    <a class="c-sidebar-nav-link c-sidebar-nav-link-danger text-white" data-toggle="modal" data-target="#feedbackModal">
      <svg class="c-sidebar-nav-icon">
        <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-exit-to-app') }}"></use>
      </svg>
      Logout
    </a>
  @endif
</li>
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
            <label for="feedback">Feedback</label>
            <span role="textbox" contenteditable id="feedback"  style="display: block;
            width: 100%;
            overflow: hidden;
            resize: both;
            min-height: 40px;
            line-height: 20px;
            border: 2px solid grey;
            padding: .7rem"></span>
            <textarea name="feedback" id="textFeedback" hidden></textarea>
          </div>
          <div class="form-group">
            <label for="suggestion">Suggestion</label>
            <span role="textbox" contenteditable id="suggestion" style="display: block;
            width: 100%;
            overflow: hidden;
            resize: both;
            min-height: 40px;
            line-height: 20px;
            border: 2px solid grey;
            padding: .7rem"></span>
            <textarea name="suggestion" id="textSuggest" hidden></textarea>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" value="Submit Form">Send</button>
        </div>
     </form>
    </div>
  </div>
</div>
</ul>

<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>  


<script>
  const form = document.getElementById('feedbackForm')
  form.addEventListener('submit', submit);

  function submit() {
    document.getElementById('textFeedback').value = document.getElementById('feedback').innerHTML
    document.getElementById('textSuggest').value = document.getElementById('suggestion').innerHTML
  }
</script>

</div>