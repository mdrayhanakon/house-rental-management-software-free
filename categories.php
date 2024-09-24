<?php include('db_connect.php');?>

<div class="container-fluid">
	
	<div class="col-lg-12 mt-5">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-12">
			<form action="" id="manage-category">
				<div class="card">
					<div class="card-header">
						    Category Form
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="row">
								<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Name</label>
								<input type="text" class="form-control" name="name">
							</div>
							</div>
						</div>
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
								<button class="btn btn-sm btn-default col-sm-3" type="button" onclick="$('#manage-category').get(0).reset()"> Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
			<!-- FORM Panel -->

			
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
</style>
<script>
	
$('#manage-category').submit(function(e){
    e.preventDefault();
    start_load();
    $.ajax({
        url:'ajax.php?action=save_category',
        data: new FormData($(this)[0]),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        success:function(resp){
            if(resp==1){
                alert_toast("Data successfully added",'success');
                setTimeout(function(){
                    window.location.href = 'index.php?page=manage_categories'; // Redirect to manage-category.php
                },1500);
            }
            else if(resp==2){
                alert_toast("Data successfully updated",'success');
                setTimeout(function(){
                    location.reload();
                },1500);
            }
        }
    });
});

	// $('.edit_category').click(function(){
	// 	start_load()
	// 	var cat = $('#manage-category')
	// 	cat.get(0).reset()
	// 	cat.find("[name='id']").val($(this).attr('data-id'))
	// 	cat.find("[name='name']").val($(this).attr('data-name'))
	// 	end_load()
	// })
	// $('.delete_category').click(function(){
	// 	_conf("Are you sure to delete this category?","delete_category",[$(this).attr('data-id')])
	// })
	// function delete_category($id){
	// 	start_load()
	// 	$.ajax({
	// 		url:'ajax.php?action=delete_category',
	// 		method:'POST',
	// 		data:{id:$id},
	// 		success:function(resp){
	// 			if(resp==1){
	// 				alert_toast("Data successfully deleted",'success')
	// 				setTimeout(function(){
	// 					location.reload()
	// 				},1500)

	// 			}
	// 		}
	// 	})
	// }
	$('table').dataTable()
</script>