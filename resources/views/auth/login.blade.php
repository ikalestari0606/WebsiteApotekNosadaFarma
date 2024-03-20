<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/CustomEase.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    <title>Login Page</title> 
</head>
<body>
  <script src="https://www.gstatic.com/firebasejs/10.8.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/10.8.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/10.8.0/firebase-database.js"></script>

  
<div class="outer-container">
  <div class="container">
    <div class="info-container">
      <div class="info-item log-in">
        <p>Have an account?</p>
        <div class="btn">Log In</div>
      </div>
      <div class="tree">
        <div class="leaves"></div>
        <div class="trunk"></div>
      </div>
      <div class="info-item sign-up">
        <p>Don't have an account?</p>
        <div class="btn">Sign Up</div>
      </div>
    </div>
    <div class="form-container">
      <div class="form-item">
        <div class="fire">
          <svg class="flameSVG" viewBox="0 0 800 600" xmlns="http://www.w3.org/2000/svg">
           <defs> 
           <rect  class="flame" x="400" y="310" width="5" height="5" rx="0.5"  ry="0.5" fill="#FFDD02"/>
            <circle class="spark" cx="400" cy="300" r="0.05" fill="#FFDD02"/>

            <filter id="shadow" x="-100%" y="-100%" width="250%" height="250%">
              <feOffset in="SourceAlpha" dx="4" dy="4" result="offsetOut"></feOffset>        
              <feGaussianBlur stdDeviation="3" in="offsetOut" result="drop" />
              <feOffset dx="0" dy="0" result="offsetblur"></feOffset>
              <feFlood id="glowAlpha" flood-color="#0F1217" flood-opacity="0.42"></feFlood>
              <feComposite in2="offsetblur" operator="in"></feComposite>
              <feMerge>
                <feMergeNode/>          
                <feMergeNode in="SourceGraphic"></feMergeNode>
              </feMerge>
            </filter>   
            </defs>
          <g class="whole">
           <g class="flameContainer" />
           <g class="sparksContainer" />
                <g class="logs" opacity="1">

            <path d="M446.68,299.63l-91.46,29.22a3,3,0,0,1-3.68-2.12L349.2,318a3,3,0,0,1,2.12-3.68l91.46-29.22a3,3,0,0,1,3.68,2.12L448.8,296A3,3,0,0,1,446.68,299.63Z" fill="#612e25"/>
                  <path filter="url(#shadow)" d="M349.2,296l2.34-8.69a3,3,0,0,1,3.68-2.12l91.46,29.22A3,3,0,0,1,448.8,318l-2.34,8.69a3,3,0,0,1-3.68,2.12l-91.46-29.22A3,3,0,0,1,349.2,296Z" fill="#70392f"/>

                </g>
                 </g>

           <rect class="hit" width="200" height="260" x="300" y="230" fill="transparent">
           </rect>

          </svg>
        </div>
        <form id="login-form" class="form-log-in animated" method="post">
        <input name="email" id="email" placeholder="Email" type="text" />
        <input name="password" id="password" placeholder="Password" type="password" />
        <button class="btn" type="submit" id="submit" onclick="login()">Log in</button>
    </form>

        <form class="form-sign-up animated">
        <input name="nama" placeholder="nama" type="text" required />
        <input name="username" placeholder="username" type="text" required />
        <input name="password" placeholder="password" type="password" required />
        <input name="email" placeholder="email" type="email" required />
        <input name="telepon" placeholder="telepon" type="tel" required />
        <input name="tanggal_lahir" placeholder="tanggal_lahir" type="date" required />
        <input name="jenis_kelamin" placeholder="jenis_kelamin" type="text" required />
        <input name="alamat" placeholder="alamat" type="text" required />
        <button class="btn" type="submit" id="submit" onclick="register()">Register</button>
        </form>

      </div>
    </div>
  </div>
</div>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script> 


</body>
</html>