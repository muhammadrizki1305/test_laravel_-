<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>To Do</title>
	<link rel="stylesheet" href="bst/css/bootstrap.css">
	<link rel="stylesheet" href="bst/css/animated.css">
	<link rel="stylesheet" href="bst/css/acc.css">
	<link rel="stylesheet" href="bst/css/css.css">
	<script src="bst/js/jquery.min.js" language="javascript"></script>
	<script src="bst/js/bootstrap.js" language="javascript"></script>
</head>
<body>
	<div class="col-md-12">
		<div class="col-md-6 col-md-offset-3">
			<form action="create" method="POST" style="text-align:center;margin-top:50px;margin-bottom:50px;">
			{{ csrf_field() }}
				To Do<input type="text" name="todo" class="form-control">
				<input type="submit" name="save" value="SAVE" class="form-control btn btn-danger">
				<input type="reset" name="reset" value="RESET" class="form-control btn btn-info">
			</form>
			<?php echo date('Y-m-d H:i:s'); ?>
		</div>
		<div class="col-md-12" align="center">
			<table class="table table-hover">
				<tr class="tebel">
					<td>ID</td>
					<td>To Do</td>
					<td>Created</td>
					<td>Updated</td>
					<td>Action</td>
				</tr>
				@foreach($todo as $todo)
				<tr>
					<td>{{$todo->id}}</td>
					<td>{{$todo->todo}}</td>
					<td>{{$todo->created_at}}</td>
					<td>{{$todo->updated_at}}</td>
					<td>
						<form action="destroy" method="GET">

							<input type="submit" name="delete" value="DELETE" class="btn btn-danger">
							<input type="hidden" name="id" value="{{$todo->id}}">
							<input type="hidden" name="created" value="{{$todo->crrated_at}}">

						</form>
						<button data-toggle="modal" data-target="#update" class="btn btn-info">UPDATE</button>
							<div class="modal fade" id="update" role="dialog" style="margin-top:150px;">
							    <div class="modal-dialog">
							    
							      <!-- Modal content-->
							      <div class="modal-content">
							        <div class="modal-header" style="background-color:#106B60;">
							          <button type="button" class="close" data-dismiss="modal">&times;</button>
							          <h4 class="modal-title modal-login-font">LOG - IN</h4>
							        </div>
							        <div class="modal-body" style="background-color:#fff;text-align:center;">
							          <form action="edit" method="POST">
							          {{ csrf_field() }}
							          	TO DO : <input type="text" name="todo" class="form-control">
							          	<input type="hidden" name="id" value="{{$todo->id}}">
							          	<input type="hidden" name="created_at" value="{{$todo->created_at}}">
							        </div>
							        <div class="modal-footer" style="background-color:#106B60;text-align:center;">
							          <input type="submit" name="update" class="btn btn-success" value="OK">
							          <input type="reset" class="btn btn-success" value="BATAL">
							          <button type="button" class="btn btn-success" data-dismiss="modal">TUTUP</button>
							          </form>
							        </div>
							      </div>
							      
							    </div>
						  	</div>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</body>
</html>