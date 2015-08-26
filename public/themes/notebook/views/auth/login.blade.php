<div class="row col-md-4 col-md-offset-4 col-centered" style="margin-top:100px;">
  <div class="text-center wrapper">
    <img src="{{ Theme::asset()->url('img/logo.png') }}" class="m-r-sm">
    <h2 class="text-center padder">{{ Theme::get('description') }}</h2>
  </div>

  {!! Helper::bootstrap_alert() !!}

  <section class="panel panel-primary">
    <header class="panel-heading font-bold">Admin Authentication</header>
    <div class="panel-body">
        {!! Form::open(array('route' => '_auth.login.post')) !!}
        {!! csrf_field() !!}

          <div class="form-group">
            <label>Email address</label>
            {!! Form::text('email', Input::get('email'), array('class' => 'form-control')) !!}
          </div>
          <div class="form-group">
            <label>Password</label>
            {!! Form::password('password', array('class' => 'form-control')) !!}
          </div>
          
          <div class="line line-dashed line-lg pull-in"></div>
          <div class="pull-right">
            <button type="submit" class="btn btn-sm btn-primary">Login</button>
          </div>
        {!! Form::close() !!}
      </div>
  </section>
  <div class="text-center padder clearfix">
      <p>
        <small>Kay Rules<br>&copy; {{ date('Y') }}</small>
      </p>
    </div>
</div>