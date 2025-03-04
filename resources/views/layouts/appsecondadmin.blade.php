<!DOCTYPE html> 
<html lang="en"> 
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="MecheriHadia">
        <meta name="csrf-token" content="{{csrf_token()}}">
        
        <title>ِChronoTruck</title>

         <!-- Bootstrap core CSS -->
       <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Additional CSS Files -->
        <link rel="stylesheet" href="../assets/css/app.css">
        <link rel="stylesheet" href="../assets/css/font.css">
        <link rel="stylesheet" href="../assets/css/fontawsome.css">
        <link rel="stylesheet" href="../assets/css/owl.css">
        <link rel="stylesheet" href="../assets/css/select2.css">

        <script src="../vendor/jquery/jquery.min.js"></script>
        
        <link rel="stylesheet" href="../assets/css/bootstrapTable.css">

        <script src="../assets/js/select2.js"></script>
        <script src="assets/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/dataTables.bootstrap5.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Additional Scripts -->
        <script src="../assets/js/custom.js"></script>
        <script src="../assets/js/owl.js"></script>
        
    </head> 
    
    <body>

    <!-- Header -->
    <header >
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand"><h2>ِChrono<em>Truck</em></h2></a>
          <div class="navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            @if(session('admin_name'))
              <li class="nav-item active">
                <a class="nav-link" href="{{ route('acceuilAdmin') }}">Accueil</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="{{ route('gestion_users') }}">les utilisateurs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('gestion_annonces') }}">les annonces</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('gestion_news') }}">les news</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('gestion_contenu') }}">le contenu</a>
              </li>
              @if(session('super_admin_name'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('gestion_admin') }}">les admins</a>
              </li>
              @endif
              <li class="nav-item">
                  <div class="main-button">
                  <a rel="nofollow" id="logout_botton" href="{{ route('logout_admin') }}" >déconnecter</a>
                  </div>
              </li>
              @else
              <li class="nav-item">
                  <div class="main-button">
                  <a rel="nofollow" href="" data-toggle="modal" data-target="#loginModal">connecter</a>
                  </div>
              </li>
              @endif
            </ul>
          </div>
        </div>
      </nav>
    </header>

        @yield('content')
     
  <!-- Modal login-->  

 <div id="loginModal" class="modal fade" role="dialog">  
    <div class="modal-dialog">  
      <div class="modal-content">    
        <section class="formulaire formulaire-modal">
          <div class="col-lg-12">
            <div class="sidebar-heading">
              <h2>connectez-vous sur votre compte admin</h2>
            </div>
            <form >
              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <fieldset>
                    <input name="email_login_admin" class="form-control" type="text" id="email_login_admin" placeholder="votre email" required>
                  </fieldset>
                </div>
                <div class="col-md-12 col-sm-12">
                  <fieldset>
                    <input name="password_login" class="form-control" type="password" id="password_login" placeholder="votre mot de passe" required>
                  </fieldset>
                </div>
                <div class="col-md-12 col-sm-12" id="incorrect_login">
                  <fieldset>
                    <label >email ou mot de passe incorrect. Réessayez</label>
                  </fieldset>
                </div>
                <div class="col-lg-12 col-sm-12">
                  <fieldset>
                    <button type="submit" id="login_submit" class="main-button btn btn-warning">se connecter</button>
                  </fieldset>
                </div>
                <div class="text-content">
                  <a href="{{route('inscription')}}"><h4>vous n'avez pas de compte, inscrivez-vous ici</h4></a>  
                </div>
              </div>
            </form>
          </div>
        </section>
      </div>  
    </div>  
  </div>  
    
    <script>
      $("#login_submit").click(function (e) {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
              }
          });
          e.preventDefault();
          let formData = {
            email : $("#email_login_admin").val(),
            password : $("#password_login").val(),
          };
          let type = "POST";
          let ajaxurl = "{{route('login')}}";

          $.ajax({
              type: type,
              url: ajaxurl,
              data: formData,
              dataType: 'json',
              success: function (response) {
                if (response['status_code']==500){
                  $("#email_login").css("border-color", "#d93025");
                  $("#email_login").css("color", "#d93025");
                  $("#password_login").css("border-color", "#d93025");
                  $("#password_login").css("color", "#d93025");
                  $("#email_login").attr("placeholder","votre email");
                  $("#password_login").attr("placeholder","votre mot de passe");
                  $("#incorrect_login").css("display","block");
                  $("#password_login").css("margin-bottom","5px");
                }
                else{
                  window.location.replace("http://localhost/chronotruck/public/acceuil");
                }
              },
              error: function (response) {
                  console.log(response);
              }
            });
       });  
    </script>
  </body>
</html>