<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8" />
  <title>{{ Theme::get('title') }}</title>
  <meta name="keywords" content="{{ Theme::get('keywords') }}">
  <meta name="description" content="{{ Theme::get('description') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  {!! Theme::asset()->styles() !!}
  {!! Theme::asset()->container('post-styles')->styles() !!}
  {!! Theme::asset()->scripts() !!}
  <!--[if lt IE 9]>
    {!! Theme::asset()->container('ie9')->scripts() !!}
  <![endif]-->
</head>
<body>
  	
  <!-- header -->
  <header id="header" class="navbar navbar-fixed-top bg-white box-shadow b-b b-light"  data-spy="affix" data-offset-top="1">
    <div class="container">
      <div class="navbar-header">        
        <a href="#" class="navbar-brand"><img src="{!! Theme::asset()->url('img/logo.png') !!}" class="m-r-sm"><span class="text-muted">Laravel Starter</span></a>
        <button class="btn btn-link visible-xs" type="button" data-toggle="collapse" data-target=".navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="active">
            <a href="#">Home</a>
          </li>
          <li>
            <a href="#">Features</a>
          </li>
          <li>
            <a href="#">Blog</a>
          </li>
          <li>
            <div class="m-t-sm">
              <a href="{{ route('_auth.login') }}" class="btn btn-link btn-sm">Sign in</a>
              <a href="#" class="btn btn-sm btn-success m-l"><strong>Sign up</strong></a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </header>
  <!-- / header -->
	<section id="content">
	  {!! Theme::content() !!}
	</section>
  
  <!-- footer -->
  <footer id="footer">
    <div class="bg-danger text-center">
      <div class="container wrapper">
        <div class="m-t-xl m-b">
          For your faster and easier web development.
          <a href="https://github.com/kayrules/laravel-starter" target="_blank" class="btn btn-lg btn-dark m-sm">Download it</a>
          <a href="http://dev.kayrules.com/laravel-starter/" target="_blank" class="btn btn-lg btn-warning b-white bg-empty m-sm">Live Preview</a>
        </div>
      </div>
      <i class="fa fa-caret-down fa-4x text-danger m-b-n-lg block"></i>
    </div>
    <div class="bg-dark dker wrapper">
      <div class="container text-center m-t-lg">
        <div class="row m-t-xl m-b-xl">
          <div class="col-sm-4" data-ride="animated" data-animation="fadeInLeft" data-delay="300">
            <i class="fa fa-map-marker fa-3x icon-muted"></i>
            <h5 class="text-uc m-b m-t-lg">Find Us</h5>
            <p class="text-sm">23 soe Midlokls <br>
              120002 Loki — UNITED KINGDOM
             </p>
          </div>
          <div class="col-sm-4" data-ride="animated" data-animation="fadeInUp" data-delay="600">
            <i class="fa fa-envelope-o fa-3x icon-muted"></i>
            <h5 class="text-uc m-b m-t-lg">Mail Us</h5>
            <p class="text-sm"><a href="mailto:hey@example.com">info@example.com</a></p>
          </div>
          <div class="col-sm-4" data-ride="animated" data-animation="fadeInRight" data-delay="900">
            <i class="fa fa-globe fa-3x icon-muted"></i>
            <h5 class="text-uc m-b m-t-lg">Join Us</h5>
            <p class="text-sm">Send your resume to <br><a href="mailto:hey@example.com">recruit@example.com</a></p>
          </div>
        </div>
        <div class="m-t-xl m-b-xl">
          <p>
            <a href="#" class="btn btn-icon btn-rounded btn-facebook bg-empty m-sm"><i class="fa fa-facebook"></i></a>
            <a href="#" class="btn btn-icon btn-rounded btn-twitter bg-empty m-sm"><i class="fa fa-twitter"></i></a>
            <a href="#" class="btn btn-icon btn-rounded btn-gplus bg-empty m-sm"><i class="fa fa-google-plus"></i></a>
          </p>
          <p>
            <a href="#content" data-jump="true" class="btn btn-icon btn-rounded btn-dark b-dark bg-empty m-sm text-muted"><i class="fa fa-angle-up"></i></a>
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->  
  {!! Theme::asset()->container('core-scripts')->scripts() !!}
  {!! Theme::asset()->container('post-scripts')->scripts() !!}

</body>
</html>