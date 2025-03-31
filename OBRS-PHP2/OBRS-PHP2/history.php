<section id="" class="d-flex align-items-center">
<main id="main">
	<div class="container-fluid">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-md-12">
				
				</div>
			</div>
			<div class="row">
				&nbsp;
			</div>
			<div class="row">
				<div class="card col-md-12">
				<div class="card-header">
						<div class="card-title"><b>User History</b></div>
					</div>
					
					<div class="card-body">
						<table class="table table-hover table-striped" id="bus-field">
						<thead class='thead-light'>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Reference no</th>
									<th class="text-center">Name</th>
									<th class="text-center">Quantity</th>
                                    <th class="text-center">Departure</th>
									<th class="text-center">status</th>

								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</main>
</section>
<script>
	

	window.load_bus = function(){
		$('#bus-field').dataTable().fnDestroy();
		$('#bus-field tbody').html('<tr><td colspan="4" class="text-center">Please wait...</td></tr>')
		$.ajax({
			url:'load_user1.php',
			error:err=>{
				console.log(err)
				alert_toast('An error occured.','danger');
			},
			success:function(resp){
				if(resp){
					if(typeof(resp) != undefined){
						resp = JSON.parse(resp)
							if(Object.keys(resp).length > 0){
								$('#bus-field tbody').html('')
								var i = 1 ;
								Object.keys(resp).map(k=>{
									var tr = $('<tr></tr>');
									tr.append('<td class="text-center">'+(i++)+'</td>')
									tr.append('<td class="text-center">'+resp[k].ref_no+'</td>')
									tr.append('<td>'+resp[k].name+'</td>')
                                    tr.append('<td class="text-center">'+resp[k].qty+'</td>')
									tr.append('<td class="text-center">'+resp[k].departure+'</td>')

									tr.append('<td>'+resp[k].status+'</td>')
									

								})

							}else{
								$('#bus-field tbody').html('<tr><td colspan="4" class="text-center"><b>THEREs NO DATA HERE!!</b>.</td></tr>')
							}
					}
				}
			},
			complete:function(){
				$('#bus-field').dataTable()
				manage();
			}
		})
	}
	function manage(){
		$('.edit_bus').click(function(){
		uni_modal('Edit New Bus','manage_bus.php?id='+$(this).attr('data-id'))

		})
		$('.remove_bus').click(function(){
		_conf('Are you sure to delete this data?','remove_bus',[$(this).attr('data-id')])

		})
	}
	function remove_bus($id=''){
		start_load()
		$.ajax({
			url:'delete_bus.php',
			method:'POST',
			data:{id:$id},
			error:err=>{
				console.log(err)
				alert_toast("An error occured","danger");
				end_load()
			},
			success:function(resp){
				if(resp== 1){
					alert_toast("Data succesfully deleted","success");
					end_load()
					$('.modal').modal('hide')
					load_bus()
				}
			}
		})
	}
	$(document).ready(function(){
		load_bus()
	})
</script>