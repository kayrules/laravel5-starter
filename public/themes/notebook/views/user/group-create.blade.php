<div class="m-b-md">
  <a href="{{ route('group.assign') }}" id="btn-user-add" class="btn btn-success btn-sm pull-right"><i class="fa fa-group"></i> Assign Groups</a>
  <h3 class="m-b-none">Add New Group</h3>
</div>

{{ Helper::bootstrap_alert() }}

  <section class="panel panel-default">
    <div class="panel-body">
      {!! Form::open(array('route' => 'group.create.post')) !!}
        <div class="form-group">
          <label>Group Name</label>
          {!! Form::text('group_name', '', array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
          <label>Permissions</label>
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="checkbox">
              @foreach($routes as $route)
                @if(substr($route->getName(),0,1) !== '_' && substr($route->getPath(),0,1) !== '_')
                  <div class="col-md-3"><label>
                    {!! Form::checkbox('routes[]', $route->getName(), false) !!} 
                    {{ $route->getName() }}
                  </label></div>
                @endif
              @endforeach
              </div>
            </div>
          </div>
        </div>
        <div class="line line-dashed line-lg pull-in"></div>
        <div class="pull-right">
          <a href="{{ route('group.assign') }}" id="btn-user-add" class="btn btn-default btn-sm">Cancel</a>
          <button type="submit" class="btn btn-sm btn-primary">Create Group</button>
        </div>
      {!! Form::close() !!}
    </div>
  </section>