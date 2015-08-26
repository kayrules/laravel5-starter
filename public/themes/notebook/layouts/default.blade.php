<!DOCTYPE html>
<html lang="en" class="app">
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
  <section class="vbox">
    {!! Theme::partial('header') !!}
    <section>
      <section class="hbox stretch">
        {!! Theme::partial('menu') !!}
        <section id="content">
          <section class="vbox">          
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{ route('_home') }}"><i class="fa fa-home"></i> Home</a></li>
                <?php
                $exs = explode('/', Route::current()->getPath());
                foreach ($exs as $x) {
                  if(strlen($x) > 0 && strpos($x, '{') === false) {
                ?>
                <li class="active">
                  <a href="{{ route(Route::current()->getName()) }}">
                  {{ ucwords($x) }}
                  </a>
                </li>
                <?php }} ?>
              </ul>
              {!! Theme::content() !!}
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
      </section>
    </section>
  </section>
  {!! Theme::asset()->container('core-scripts')->scripts() !!}
  {!! Theme::asset()->container('post-scripts')->scripts() !!}

</body>
</html>