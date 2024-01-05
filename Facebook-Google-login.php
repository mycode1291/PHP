<div id="fb-root"></div>
<script>
  (function(thisdocument, scriptelement, id) {
    var js, fjs = thisdocument.getElementsByTagName(scriptelement)[0];
    if (thisdocument.getElementById(id)) return;
    js = thisdocument.createElement(scriptelement); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js"; //you can use
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
  window.fbAsyncInit = function() {
  FB.init({
    appId      : '1889073327771855', //Your APP ID
    cookie     : true,  // enable cookies to allow the server to access
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.11' // use version 2.1
  });
  // These three cases are handled in the callback function.
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
  };
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
     // _i();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
  } 
 
  function _login() {
    FB.login(function(response) {
       // handle the response
       if(response.status==='connected') {
        _i();
       }
     }, {scope: 'public_profile'});
 }

 function _i(){
     FB.api('/me?fields=name,email', function(response) {
      var fullname = response.name;
   if(fullname != ''){
   document.getElementById("name2").value = fullname;
   }
   var fbemail = response.email;
     if(fbemail != ''){
    document.getElementById("emailpu2").value = fbemail;
   }
    });
 }
</script>

<a class="fbbutton" onclick="_login();" style = "cursor:pointer"><i class="fa fa-facebook" aria-hidden="true"></i>Sign in with Facebook</a>


(For Google)
<meta name="google-signin-scope" content="profile email">
<meta name="google-signin-client_id" content="1084630626390-aabs354dhpr6hrjqab947uh3v2ckuerf.apps.googleusercontent.com">
<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="1084630626390-aabs354dhpr6hrjqab947uh3v2ckuerf.apps.googleusercontent.com">
<div id="my-signin2"></div>
</div>
<script>
    function onSuccess(googleUser) {
   var profile = googleUser.getBasicProfile();
   var fullname = profile.getName();
   if(fullname != ''){
    document.getElementById("name2").value = fullname;
   }
   var myemail = profile.getEmail();
   if(myemail != ''){
    document.getElementById("emailpu2").value = myemail;
   }
  
  
    }
    function onFailure(error) {
      console.log(error);
    }
    function renderButton() {
      gapi.signin2.render('my-signin2', {
        'scope': 'profile email',
        'width': 240,
        'height': 50,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
      });
    }
  </script>
  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script> 