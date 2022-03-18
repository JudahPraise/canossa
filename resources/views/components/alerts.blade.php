<link rel="stylesheet" href="{{ asset('css/alert.css') }}">

@if (session('success'))
    <div id="message" class="bg-success d-flex align-items-center">
        <span style="font-size: 1rem"><i class="fas fa-check-circle mr-2 text-white"></i>{{ session('success') }}</span>
    </div>
@elseif(session('delete'))
    <div id="message" class="bg-danger d-flex align-items-center">
        <span style="font-size: 1rem"><i class="fas fa-trash-alt mr-2 text-white"></i>{{ session('delete') }}</span>
    </div>
@elseif(session('update'))
    <div id="message" class="bg-info d-flex align-items-center">
        <span style="font-size: 1rem"><i class="fas fa-pen mr-2 text-white"></i>{{ session('update') }}</span>
    </div>
@elseif(session('warning'))
    <div id="message" class="bg-warning d-flex align-items-center">
        <span style="font-size: 1rem"><i class="fa-solid fa-triangle-exclamation mr-2 text-white"></i>{{ session('warning') }}</span>
    </div>
@elseif(session('sent'))
    <div id="message" class="bg-success d-flex align-items-center">
        <span style="font-size: 1rem"><i class="fas fa-paper-plane mr-2 text-white"></i>{{ session('sent') }}</span>
    </div>
@elseif(session('announced'))
    <div id="message" class="bg-success d-flex align-items-center">
        <span style="font-size: 1rem"><i class="fas fa-bullhorn mr-2 text-white"></i>{{ session('announced') }}</span>
    </div>
@elseif(session('error'))
    <div id="message" class="bg-danger d-flex align-items-center">
        <div class="row d-flex align-items-center">
            <div class="col-2">
                <i class="fas fa-times-circle mr-2 text-white" style="font-size: 2rem"></i>
            </div>
            <div class="col-10">
                <span style="font-size: 1rem">{{ session('error') }}</span>
            </div>
        </div>
    </div>
@endif


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script>
    $(function() {
        showMessage();
    });

    function showMessage() {
      var m = $("#message");
    
      m.addClass("is-visible");
      setTimeout(function() {
        m.removeClass("is-visible");
        m.addClass("is-hidden");
        setTimeout(function() {
          m.addClass("is-removed");
        }, 2000);
      }, 3000);
    }
</script>