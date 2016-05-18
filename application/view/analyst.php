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
					<div class="col-md-3" style="padding-left: 5px;padding-right: 5px;">
						<div class="input-group">
							<span class="input-group-addon"><i class="gi gi-parents"></i></span>
							<select class="form-control input-lg" placeholder="Select a Business Area" id ="val_ba" name="val_ba" style="padding-top:12px;opacity:0.8">
								<option value="" disabled selected style='display:none;' >Select a Business Area</option>
								<?php foreach($bas as $ba){								
									/*** create the options ***/
									echo '<option value="'.$ba->id.'"';
									if($ba->id == $currentUser->selectedBA)	{
										echo ' selected';
									}
									echo '>'. $ba->name . '</option>'."\n";
								}
								?>
							</select>
						</div>
					</div>	
					<div class="col-md-4">
						<button onclick="setSelectedBA()" class="btn btn-sm btn-primary" type="submit"><i class="fa fa-arrow-right"></i>Go</button>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-12" style="padding-left: 5px;padding-right: 5px;">
						<div id="categoryTable"></div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12" style="padding-left: 5px;padding-right: 5px;">
						<div id="riskTable"></div>
					</div>
					<div class="col-lg-5 col-md-5 col-sm-12" style="padding-left: 5px;padding-right: 5px;">
						<div id="maTable"></div>
					</div>
				</div>
			</div>                
		</div>
	</div>
</div>			
	<script>
		$(window).load(function(){
			loadCategoriesView();
		});
		function loadCategoriesView(){
			$('#categoryTable').html("");
			$('#riskTable').html("");
			$('#maTable').html("");
			$.get('index.php?op=getCategoriesView', function(data) {
				$('#categoryTable').html(data);
				$('#example-datatablec').DataTable();
			});
		}
		function loadRisksView(category){
			$('#riskTable').html("");
			$('#maTable').html("");
			$.get('index.php?op=getRisksView&category=' + category, function(data) {
				$('#riskTable').html(data);
				$('#example-datatabler').DataTable();
			});
		}
		function loadMAView(riskInstance){
			$('#maTable').html("");
			$.get('index.php?op=getMAView&ri=' + riskInstance, function(data) {
				$('#maTable').html(data);
				$('#example-datatablem').DataTable();
			});
		}
		function setSelectedBA(){
			var selBA = $("#val_ba").val();
			$.get('index.php?op=setSelectedBusinessArea&ba=' + selBA, function(data) {
				loadCategoriesView();
			});			
		}
		function setRiskScore(riId){
			var riScore = $("#val_score").val();
			$.get('index.php?op=setRiskScore&ri=' + riId + '&score=' + riScore, function(data) {		
				$("#RIScore" + riId).html(riScore);
				$("#RINetScore" + riId).html(data);
			});			
		}
	</script>
</body>
</html>