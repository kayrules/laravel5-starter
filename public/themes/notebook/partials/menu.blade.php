<aside class="bg-dark lter aside-md hidden-print" id="nav">
  <section class="vbox">
    <header class="header bg-primary lter text-center clearfix">
      <div class="btn-group">
        <button type="button" class="btn btn-sm btn-dark btn-icon" title="New project"><i class="fa fa-plus"></i></button>
        <div class="btn-group hidden-nav-xs">
          <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
            Dropdown &nbsp;
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu text-left">
            <li><a href="#">Dropdown 1</a></li>
            <li><a href="#">Dropdown 2</a></li>
          </ul>
        </div>
      </div>
    </header>
    <section class="w-f scrollable">
      <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
        
        <nav class="nav-primary hidden-xs">
          <ul class="nav">
            
            <li class="{{ Helper::set_active('home') }}">
              <a href="{{ route('_home') }}" class="{{ Helper::set_active('home.index') }}">
                <i class="fa fa-dashboard icon">
                  <b class="bg-danger"></b>
                </i>
                <span>Home</span>
              </a>
            </li>

            <li class="{{ Helper::set_active('list') }}">
              <a href="#list"  >
                <i class="fa fa-question-circle icon">
                  <b class="bg-warning"></b>
                </i>
                <span class="pull-right">
                  <i class="fa fa-angle-down text"></i>
                  <i class="fa fa-angle-up text-active"></i>
                </span>
                <span>Menu List</span>
              </a>
              <ul class="nav lt">
                <li class="{{ Helper::set_active('list.menu1') }}">
                  <a href="{{ route('_home') }}">
                    <i class="fa fa-angle-right"></i>
                    <span>Menu 1</span>
                  </a>
                </li>
                <li class="{{ Helper::set_active('list.menu2') }}">
                  <a href="{{ route('_home') }}">
                    <i class="fa fa-angle-right"></i>
                    <span>Menu 2</span>
                  </a>
                </li>
                <li class="{{ Helper::set_active('list.menu3') }}">
                  <a href="{{ route('_home') }}">
                    <i class="fa fa-angle-right"></i>
                    <span>Menu 3</span>
                  </a>
                </li>
              </ul>
            </li>

            <li class="{{ Helper::set_active('user') }}">
              <a href="#users">
                <i class="fa fa-user icon">
                  <b class="bg-info"></b>
                </i>
                <span class="pull-right">
                  <i class="fa fa-angle-down text"></i>
                  <i class="fa fa-angle-up text-active"></i>
                </span>
                <span>User &amp; Group</span>
              </a>
              <ul class="nav lt">
                <li class="{{ Helper::set_active('user.user') }}">
                  <a href="{{ route('user.list') }}">
                    <i class="fa fa-angle-right"></i>
                    <span>User</span>
                  </a>
                </li>
                <li class="{{ Helper::set_active('user.group') }}">
                  <a href="{{ route('group.assign') }}">
                    <i class="fa fa-angle-right"></i>
                    <span>Group</span>
                  </a>
                </li>
              </ul>
            </li>
            
          </ul>
        </nav>
        
      </div>
    </section>
    
    <footer class="footer lt hidden-xs b-t b-dark">
      <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-dark btn-icon">
        <i class="fa fa-angle-left text"></i>
        <i class="fa fa-angle-right text-active"></i>
      </a>
    </footer>
  </section>
</aside>