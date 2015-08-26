
<div class="m-b-md">
  	<a href="{{ route('group.create') }}" id="btn-user-add" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Add Group</a>
  	<h3 class="m-b-none">List Groups</h3>
</div>

{{ Helper::bootstrap_alert() }}

<section class="panel panel-default">
	<div class="table-responsive">
		<table class="table table-striped">
	      <thead>
	        <tr>
	          <th>#</th>
	          <th>Group Name</th>
	          <th>Permissions</th>
	          <th class="col-md-2 text-center">Action</th>
	        </tr>
	      </thead>
	      <tbody>
	      	@foreach ($groups as $key => $group)
	        <tr>
	          <th scope="row">{{ $key+1 }}</th>
	          <td>{{ $group->name }}</td>
	          <td class="pillbox">
	          <?php 
	          	$permits = array();
	          ?>
	          {{ implode(' ', $permits); }}
	          </td>
	          <td class="text-center">
                <a data-id="13" class="btn btn-xs btn-default btn-user-edit" href="#"><i class="fa fa-pencil fa-fw"></i></a>
                {{ HTML::decode(HTML::link(route('group.delete', $group->id), '<i class="fa fa-times fa-fw"></i>', array('class' => 'btn btn-xs btn-default btn-user-edit', 'data-method' => 'delete', 'data-confirm' => 'Are you sure want to delete this group?'))) }}
	          </td>
	        </tr>
	        @endforeach
	      </tbody>
	    </table>
	</div>
</section>