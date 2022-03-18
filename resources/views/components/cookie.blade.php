{{-- <link rel="stylesheet" href="{{ asset('css/cookie.css') }}">

<div class="fixed-bottom d-flex justify-content-center" id="cookieContainer">
    <div class="container-fluid text-white cookie-container"  style="background-color: #233D4D; width: 65%">
        <div class="row p-3 d-flex justify-content-center align-items-center">
            <p class="mt-3">We use cookies to ensure you get the best experience on our Website and Online Services. By continuing, you agree to our use of cookies.</p>
            <div class="buttons d-flex align-items-center ml-2 ">
                <button class="btn btn-primary">Allow</button>
                <a class="text-white">Learn More</a>
            </div>
        </div>
    </div>
</div>

<script>
    const cookieBox = document.querySelector(".cookie-container"),
    acceptBtn = cookieBox.querySelector(".buttons button");

    acceptBtn.onclick = () => {
        
        document.cookie = "CookieBy=CHRMIS; max-age="+60*60*24*30;

        if (document.cookie) {
            document.getElementById('cookieContainer').remove();
        }else{
            alert("Cookie can't be set!");
        }
    }

    
    let checkCookie = document.cookie.indexOf("CookieBy=CHRMIS");
    checkCookie != -1 ? cookieBox.classList.add("hide"): cookieBox.classList.remove("hide");

    checkCookie = -1 ? document.getElementById('cookieContainer').remove(): cookieBox.classList.remove("hide");
    
</script> --}}



@if(session('cookie'))
  <!-- Modal -->
  <div class="modal fade" id="cookieForm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container d-flex flex-column align-items-start">
              <h1>Privacy Notice</h1>
              <p>At Canossa College - San Pablo, we value your privacy and strive to protect your personal information in compliance with the Data Privacy Act of 2012.</p>
              <br>
              <p>Canossa College - San Pablo will only collect, record, hold, use, disclose and store (i.e. “process”) use your personal information in accordance with such laws (including the Data Privacy Act of 2012), this Privacy Notice and the privacy terms in your agreement(s) with Canossa College - San Pablo.</p>
              <br>
              <p>Data we collect from the employees are:</p>
              <br>
              <ul>
                <li>Personal Information</li>
                <li>Family Background</li>
                <li>Educational Background</li>
                <li>Work Experiece</li>
                <li>Training Programs</li>
                <li>Civic Works</li>
                <li>Medical Record</li>
              </ul>
              <br>
              <p>These data will be use to track your achievements and skills. It will help us to be keep updated about our employees. We ensure the security and protection of your personal information and your privacy. In fact the system is hosted locally meaning it is only accessible on the vicinity of Canossa College - San Pablo to ensure the protection of your data.</p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Continue</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#cookieForm').modal();
    });
  </script>
@endif