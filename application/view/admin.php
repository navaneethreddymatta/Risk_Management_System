<?php
$ptweet="";
$pscore=0;
$regId =0;
$status=0;?>
<?php include 'application/view/fx_commonhead.php'; ?>            
<?php include 'application/view/fx_sidebar.php';?>
	<div id="main-container">	
		<header class="navbar navbar-default navbar-fixed-top">
			<div>
				<div style="float:left;width:50px">
					<ul class="nav navbar-nav-custom">
						<li>
							<a onclick="App.sidebar('toggle-sidebar');" href="javascript:void(0)">
								<i class="fa fa-bars fa-fw"></i>
							</a>
						</li>
					</ul>
				</div>
				<div style="float:left;text-align:center;font-size: 30px;line-height: 50px;"> Risk Management System </div>
				<div style="float:right;width:50px;padding:16px"><a href="index.php?op=logout" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a></div>
			</div>
		</header>
		<div id="page-content" style="min-height: 378px;">			
			<div class="block full">
				<div class="row">
					<div class="col-lg-7 col-md-12 col-sm-12">
						<!-- Default Tabs -->
						<ul data-toggle="tabs" class="nav nav-tabs push">
							<li id="example-li-bas" class="" onclick="clearForm();"><a href="#example-tabs-bas" data-original-title="Events"><i class="fa fa-cog"></i> Business Areas</a></li>
							<li id="example-li-categories" class="" onclick="clearForm();"><a href="#example-tabs-categories"><i class="gi gi-roundabout"></i> Categories</a></li>
							<li id="example-li-risks" class="" onclick="clearForm();"><a href="#example-tabs-risks" data-original-title="Email Messages"><i class="fa fa-envelope-o"></i> Risks</a></li>
							<li id="example-li-mas" class="" onclick="clearForm();"><a href="#example-tabs-mas" data-original-title="People"><i class="gi gi-group"></i> MA</a></li>							
						</ul>
						<div class="tab-content">
							<div id="example-tabs-bas" class="tab-pane">			<div id="example-data1" class="table-responsive" >
									<table id="example-datatable1" class="table table-vcenter table-hover table-condensed table-bordered" style="width:100% !important">
										<thead>
											<tr>
												<th>#</th>
												<th>Name</th>											
											</tr>
										</thead>
										<tbody>
										<?php $i=1;foreach($bas as $ba){
											$rowTxt= "<tr id='Row1".$i."' onclick='getSelected(\"ba\",\"".$ba->id."\")'><td id='Col1".$i."'>".$ba->id."</td><td id='Col1".$i."'>".$ba->name."</td></tr>";
											$i=$i+1;
											echo $rowTxt;
										}?>
										</tbody>
									</table>
								</div>
							</div>
							<div id="example-tabs-categories" class="tab-pane">
								<div id="example-data2" class="table-responsive" >
									<table id="example-datatable2" class="table table-vcenter table-hover table-condensed table-bordered" style="width:100% !important">
										<thead>
											<tr>
												<th>#</th>
												<th>Name</th>
											</tr>
										</thead>
										<tbody>
											<?php $i=1;foreach($categories as $category){
											echo "<tr id='Row2".$i."' onclick='getSelected(\"category\",\"".$category->id."\")'><td id='Col2".$i."'>".$category->id."</td><td id='Col2".$i."'>".$category->name."</td></tr>";
											$i=$i+1;
										}?>			
										</tbody>
									</table>
								</div>
							</div>
							<div id="example-tabs-risks" class="tab-pane">
								<div id="example-data3" class="table-responsive" >
									<table id="example-datatable3" class="table table-vcenter table-hover table-condensed table-bordered" style="width:100% !important">
										<thead>
											<tr>
												<th>#</th>
												<th>Name</th>
												<th>Category</th>
											</tr>
										</thead>
										<tbody>
											<?php $i=1;foreach($risks as $risk){
											echo "<tr id='Row3".$i."' onclick='getSelected(\"risk\",\"".$risk->id."\")'><td id='Col3".$i."'>".$risk->id."</td><td id='Col3".$i."'>".$risk->name."</td><td id='Col3".$i."'>".$risk->categoryName."</td></tr>";
											$i=$i+1;
										}?>				
										</tbody>
									</table>
								</div>
							</div>
							<div id="example-tabs-mas" class="tab-pane">
								<div id="example-data4" class="table-responsive" >
									<table id="example-datatable4" class="table table-vcenter table-hover table-condensed table-bordered" style="width:100% !important">
										<thead>
											<tr>
												<th>#</th>
												<th>Name</th>												
												<th>% Reduction</th>												
											</tr>
										</thead>
										<tbody>
											<?php $i=1;foreach($mas as $ma){
											echo "<tr id='Row4".$i."' onclick='getSelected(\"ma\",\"".$ma->id."\")'><td id='Col4".$i."'>".$ma->id."</td><td id='Col4".$i."'>".$ma->name."</td><td id='Col4".$i."'>".$ma->impReduction."</td></tr>";
											$i=$i+1;
										}?>				
										</tbody>
									</table>
								</div>
							</div>							
						</div>
						<!-- END Default Tabs -->
					</div>
					<div class="col-lg-5 col-md-12 col-sm-12">
						<div id="details">
						</div>
					</div>
				</div>
			</div>                
		</div>
	</div>
</div>		
	<script>
		function getSelected(source,val){
			$('#details').html("");
			$.get('index.php?op=getSettings&source='+source+'&val='+val, function(data) {
				$('#details').html(data);
			});
		}
		function getIncluded(source,val){
			$('#details').html("");
			$.get('index.php?op=getIncluded&source='+source, function(data) {
				$('#details').html(data);			 
			});
		}
		function clearForm(){
			$('#details').html("");
		}
		$(document).ready(function(){
			var tabVal = <?php echo $tab;?>;
			if(tabVal == 1){
				$("#example-li-bas").addClass("active");
				$("#example-tabs-bas").addClass("active");
			}
			else if(tabVal == 2){
				$("#example-li-categories").addClass("active");
				$("#example-tabs-categories").addClass("active");
			}
			else if(tabVal == 3){
				$("#example-li-risks").addClass("active");
				$("#example-tabs-risks").addClass("active");
			}
			else{
				$("#example-li-mas").addClass("active");
				$("#example-tabs-mas").addClass("active");
			}
			$('#example-datatable1').DataTable();
			$('#example-datatable2').DataTable();
			$('#example-datatable3').DataTable();
			$('#example-datatable4').DataTable();
			$('.dataTables_filter input').attr('placeholder', 'Search');
			$("<button style='margin-left:10px' class=\"btn btn-alt btn-primary\" onclick=\"getSelected('ba','');\"><i class=\"fa fa-plus\"></i> New</button>").appendTo('#example-datatable1_length');
			$("<button style='margin-left:10px' class=\"btn btn-alt btn-primary\" onclick=\"getSelected('category','');\"><i class=\"fa fa-plus\"></i> New</button>").appendTo('#example-datatable2_length');
			$("<button style='margin-left:10px' class=\"btn btn-alt btn-primary\" onclick=\"getSelected('risk','');\"><i class=\"fa fa-plus\"></i> New</button>").appendTo('#example-datatable3_length');
			$("<button style='margin-left:10px' class=\"btn btn-alt btn-primary\" onclick=\"getSelected('ma','');\"><i class=\"fa fa-plus\"></i> New</button>").appendTo('#example-datatable4_length');
		});
	</script>
</body>
</html>