<div class="m-b-md">
  	<a href="{{ route('user.create') }}" id="btn-user-add" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Add User</a>
  	<h3 class="m-b-none">List Users</h3>
</div>

{{ Helper::bootstrap_alert() }}

<section class="panel panel-default">
	<div class="table-responsive">
		<table class="table table-striped">
	      <thead>
	        <tr>
	          <th>#</th>
	          <th>Name</th>
	          <th>Email Address</th>
	          <th>Groups</th>
	          <th class="col-md-2 text-center">Action</th>
	        </tr>
	      </thead>
	      <tbody>
	      	@foreach ($users as $key => $user)
	        <tr>
	          <th scope="row">{{ $key+1 }}</th>
	          <td>{{ $user->name }}</td>
	          <td>{{ $user->email }}</td>
	          <td>
	          <?php
	          $loggedin_user = App\User::find($user->id);
	          $user_groups = $loggedin_user->getGroups();
	          foreach ($user_groups as $key => $group) {
	          	if ($group->name == 'Administrator') {
	          		echo '<li class="label bg-danger">'.$group->name.'</li> ';
	          	} else if ($group->name == 'ProjectManager') {
	          		echo '<li class="label bg-primary">'.$group->name.'</li> ';
	          	} else if ($group->name == 'Buyer') {
		        	echo '<li class="label bg-info">'.$group->name.'</li> ';
		        } else {
		        	echo '<li class="label bg-warning">'.$group->name.'</li> ';
		        }
	          }
	          ?>
	          </td>
	          <td class="text-center">
                <a data-id="13" class="btn btn-xs btn-default btn-user-edit" href="{{ route('user.update', $user->id) }}"><i class="fa fa-pencil fa-fw"></i></a>
                {!! Html::decode(Html::link(route('user.delete', $user->id), '<i class="fa fa-times fa-fw"></i>', array('class' => 'btn btn-xs btn-default btn-user-edit', 'data-method' => 'delete', 'data-confirm' => 'Are you sure want to delete this user?', 'data-token' => csrf_token()))) !!}
	          </td>
	        </tr>
	        @endforeach
	      </tbody>
	    </table>
	</div>
</section>