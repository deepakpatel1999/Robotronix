@include('header')

@include('sitebar')
@include('nav')
<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		
		
		
		<div class="page-title">
			<div class="title_left">
				<h3>Tables <small> User Data</small></h3>
			</div>

			<div class="title_right">
				<div class="col-md-5 col-sm-5   form-group pull-right top_search">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search for...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button">Go!</button>
						</span>
					</div>
				</div>
			</div>
		</div>
		<a href="{{route('admin.User_create')}}" class="btn btn-primary" onclick="return confirm('Do you really want to Add List?')">Add List</a>
		
		
		<div class="clearfix"></div>

		<div class="row" style="display: block;">

			<div class="clearfix"></div>

			<div class="clearfix"></div>
			@foreach($user as $value)
			<div class="modal fade" id="editmodel{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">List Update</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							

							
							<!--<form name="ajax-contact-form" id="ajax-contact-form" method="post" action="javascript:void(0)" accept-charset="utf-8" enctype="multipart/form-data" onsubmit ="return validateForm()">-->
								<form  method="post" action="javascript:void(0)"  enctype="multipart/form-data" id="del" class="del">
									<fieldset>
										@csrf
										<input type="text" class="id" name="id" value="{{$value->id}}">
										<label for="name">Name:</label>
										<input type="text" id="name" name="name" class="form-control name" value="{{@$value->name}}">
										<span class="name_error fotm" style="color: red;"></span><br>
										<label for="email">Email:</label>
										<input type="email" id="email" name="email" class="form-control email" value="{{ @$value->email }}">
										<span class="email_error" style="color: red;"></span>
										<br>
										<label for="description">Discription:</label>
										<input type="text" id="description" class="form-control description" name="description" value="{{ @$value->description }}">
										<span class="description_error" style="color: red;"></span>
									</fieldset>
									<!--<button type="submit">Update</button>-->
									<br>
									<
									<button type="submit"  value="submit" >Submit</button>
								</form>
							</div>
							<div class="modal-footer">
								<!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
								

							</div>
						</div>
					</div>
				</div>
				@endforeach

				
				<div class="col-md-12 col-sm-12  ">
					<div class="x_panel">
						<div class="x_title">
							<h2>User List Table  <small> </small></h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<a class="dropdown-item" href="#">Settings 1</a>
										<a class="dropdown-item" href="#">Settings 2</a>
									</div>
								</li>
								<li><a class="close-link"><i class="fa fa-close"></i></a>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>

						<div class="x_content">

							<p> User Table<code></code> </p>

							<div class="table-responsive">
								<table class="table table-striped jambo_table bulk_action">
									<thead>
										<tr class="headings">

											<th class="column-title">S.NO. </th>
											<th class="column-title"> Name</th>
											<th class="column-title">Email </th>
											<th class="column-title">Description </th>
											

											<th class="column-title no-link last"><span class="nobr">Action</span>
											</th>

										</tr>
									</thead>

									<tbody>
										<?php $i=0;?>
										@foreach($user as $users)
										<?php $i++;?>
										<tr class="even pointer">

											<td class=" ">{{$i}}</td>
											<td class=" ">{{$users->name}} </td>

											<td class=" ">{{$users->email}}</td>
											<td class=" ">{{$users->description}}</td>
											

											<td class=" last">
												
												<a href="{{ url('edit-student/'.$users->id) }}" class="btn btn-primary btn-sm" onclick="return confirm('Do you really want to Add List?')">Edit</a>
												<button type="submit" class="btn btn-danger butdelete"onclick="return confirm('Do you really want to Add List?')" value ="{{$users->id}}" id="butdelete"><i class="fa fa-remove" style="font-size:20px;color:red"></i>Delete</button>

											</td>
										</tr>
										@endforeach

									</tbody>
								</table>
							</div>

							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /page content -->

	<script>
		$(document).ready(function() {

			$('.butdelete').on('click', function() {
				var butdelete_id = $(this).val();
				
				$.ajax({
					url: "{{route('admin.delete_list')}}",
					type: "POST",
					data: {
						butdelete_id:butdelete_id,
						_token: "{{ csrf_token() }}"
					},
					cache: false,
					success: function(dataResult){
						alert('Delete successffuly');       
						window.location = "{{route('admin.List')}}";

					}
				});

			});
		});
	</script>


	@include('footer')
