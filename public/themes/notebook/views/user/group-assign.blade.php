
<div class="m-b-md">
  	<a href="{{ route('group.create') }}" id="btn-user-add" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Add Group</a>
  	<h3 class="m-b-none">Assign Groups</h3>
  	
</div>

{{ Helper::bootstrap_alert() }}

<section class="panel panel-default">
	<div class="table-responsive">
		<table class="table table-striped">
	      <thead>
	        <tr>
	          <th>#</th>
	          <th>Route Name</th>
	          <th>Route Path</th>
	          @foreach ($groups as $key => $group)
	          <th class="text-center">
	          	{{ $group->name }}
	          </th>
	          @endforeach
	        </tr>
	      </thead>
	      <tbody>
	      	<?php $k = 1; ?>
	      	@foreach ($routes as $route)
	      		@if(substr($route->getName(),0,1) !== '_' && substr($route->getPath(),0,1) !== '_')
		        <tr>
		          <th scope="row">{{ $k++ }}</th>
		          <td>
		          	{{ $route->getName() }}
		          </td>
		          <td>
		          	{{ $route->getPath() }}
		          </td>
		          @foreach ($groups as $group)
		          <td class="pillbox text-center">
			          <label>
			          	@if (in_array($route->getName(), $permits[$group->name]))
		                	{!! Html::decode(Html::link(route('group.assign.post', strtolower($group->name).'_'.$route->getName().'_pop'), '<i class="fa fa-check fa-fw"></i>', array('class' => 'btn btn-xs btn-primary', 'data-method' => 'POST', 'data-token' => csrf_token(), 'name' => $route->getName()))) !!}
	                    @else
	                    	{!! Html::decode(Html::link(route('group.assign.post', strtolower($group->name).'_'.$route->getName().'_push'), '<i class="fa fa-times fa-fw"></i>', array('class' => 'btn btn-xs btn-danger', 'data-method' => 'POST', 'data-token' => csrf_token(), 'name' => $route->getName()))) !!}
	                    @endif
	                  </label>
		          </td>
		          @endforeach
		        </tr>
		        @endif
	        @endforeach
	        	<tr>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        	@foreach ($groups as $group)
	        	<td class="text-center">
	        		@if($group->name != 'Administrator')
	        		{!! Html::decode(Html::link(route('group.delete', $group->id), '<i class="fa fa-trash fa-fw"></i>', array('class' => 'btn btn-xs btn-default btn-user-edit', 'data-method' => 'delete', 'data-confirm' => 'Are you sure want to delete this group?', 'data-token' => csrf_token()))) !!}
	        		@endif
	        	</td>
	        	@endforeach
	        	</tr>
	      </tbody>
	    </table>
	</div>
</section>