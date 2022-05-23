@include('header')

@include('sitebar')
@include('nav')
<style>
	.error{
		color: #FF0000; 
	}
</style>
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>User Form  <small></small></h3>
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

		<div class="clearfix"></div>
		<div class="row" style="display: block;">
			<div class="clearfix"></div>
			<div class="clearfix"></div>

			<div class="col-md-12 col-sm-12  ">
				<div class="content-wrapper">

					<section class="content">
						<div class="container-fluid">
							<div class="row">
								<!-- left column -->
								<div class="col-md-12">
									<!-- general form elements -->
									<div class="card card-primary">
										<div class="card-header">
											<h3 class="card-title"></h3>
										</div>
										
										<form  method="post" action="javascript:void(0)"  enctype="multipart/form-data" id="imageUpload">
											
											@csrf
											<div class="form-group">
												<label for="exampleInputEmail1">Name*</label>
												<input type="text" id="name" name="name" value="{{old('name')}}" placeholder="Enter Name" class="form-control name">
											</div>   
											<span class="name_error" style="color: red;"></span>       
											<div class="form-group">
												<label for="exampleInputEmail1">Email*</label>
												<input type="email" placeholder="Enter Email" id="email" value="{{old('email')}}" name="email" class="form-control">
											</div>
											<span class="email_error"style="color: red;"></span>            

											<span class="address_error"style="color: red;"></span>    
											<div class="form-group">
												<label for="exampleInputEmail1">Description*</label>
												<textarea name="description" placeholder="Enter Description" value="{{old('description')}}" id="description" class="form-control"></textarea>
											</div>
											<span class="description_error"style="color: red;"></span> 
											<br>
											<button type="submit" class="btn btn-primary" value="submit" >Submit</button>
										</form>
									</div>

								</div>

							</div>

						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
 //function validatessForm(){
 	$('#imageUpload').on('submit',(function(e) {
 		e.preventDefault(e);
 		var name = $('.name').val();
 		var email = $('#email').val();
 		var description = $('#description').val();
 		var name_err='';
 		var email_err='';
 		var description_err='';
 		if (name=='') {

 			name_err = 'Name is required*';
 		}
 		if (email=='') {

 			email_err = 'Email is required*';
 		}

 		if (description=='') {

 			description_err = 'Description is required*';
 		}
 		$('.name_error').html(name_err);
 		$('.email_error').html(email_err);

 		$('.description_error').html(description_err);
 		if (name_err || email_err || description_err) {
 			return false;
 		}else{
 			true;

 			var formData = new FormData(this);

 			$.ajax({
 				type:'POST',
 				url: "{{route('admin.inset_list')}}",
 				data:formData,
 				cache:false,
 				contentType: false,
 				processData: false,
 				success: function(dataResult){
 					console.log(dataResult);
 					var dataResult = JSON.parse(dataResult);
 					alert('Submit Succssfully');       
 					window.location = "{{route('admin.List')}}";
 				},

 			});
 		}

 	}));

 </script>
 @include('footer')