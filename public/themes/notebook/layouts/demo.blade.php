<!DOCTYPE html>
<html lang="en" class="app">
<head>
  <meta charset="utf-8" />
  <title>{{ Theme::get('title') }}</title>
  <meta name="keywords" content="{{ Theme::get('keywords') }}">
  <meta name="description" content="{{ Theme::get('description') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  {{ Theme::asset()->styles() }}
  {{ Theme::asset()->scripts() }}
  <!--[if lt IE 9]>
    {{ Theme::asset()->container('ie9')->scripts() }}
  <![endif]-->
</head>
<body>
  <section class="vbox">
    {{ Theme::partial('header') }}
    <section>
      <section class="hbox stretch">
        {{ Theme::partial('demo-menu') }}
        <section id="content">
          <section class="vbox">          
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">Workset</li>
              </ul>
              {{ Theme::content() }}
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
        <aside class="bg-light lter b-l aside-md hide" id="notes">
          <div class="wrapper">Notification</div>
        </aside>
      </section>
    </section>
  </section>
  {{ Theme::asset()->container('core-scripts')->scripts() }}
  {{ Theme::asset()->container('post-scripts')->scripts() }}

</body>
</html>