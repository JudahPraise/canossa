<link rel="stylesheet" href="{{ asset('css/cookie.css') }}">

<div class="fixed-bottom d-flex justify-content-center">
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
            cookieBox.classList.add('hide');
        }else{
            alert("Cookie can't be set!");
        }
    }

    
    let checkCookie = document.cookie.indexOf("CookieBy=CHRMIS");
    checkCookie != -1 ? cookieBox.classList.add("hide"): cookieBox.classList.remove("hide");
    
</script>
