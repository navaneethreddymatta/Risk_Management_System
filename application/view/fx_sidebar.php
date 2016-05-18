<!-- Main Sidebar -->
<div id="sidebar">
	<!-- Wrapper for scrolling functionality -->
	<div class="sidebar-scroll">
		<!-- Sidebar Content -->
		<div class="sidebar-content">
			<div class="sidebar-section sidebar-user clearfix" style="padding-left:33px">				
				<img src="assets/img/logo.png">				
			</div>
			<div class="sidebar-section">			
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-12 text-center">
										<div class="huge" style="font-size:20pt"><?php echo $numRI; ?></div>
										<div style="font-size:10pt"># Risk Instances</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					<div class="col-md-12">
						<div class="panel panel-red">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-12 text-center">
										<div class="huge"  style="font-size:20pt"><?php echo $numCriticalRI;?></div>
										<div style="font-size:10pt"># Critical Risk Instances</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					<div class="col-md-12">
						<div class="panel panel-yellow">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-12 text-center">
										<div class="huge" style="font-size:20pt"><?php echo $criticalBA;?></div>
										<div style="font-size:10pt">Critical Business Area</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					<div class="col-md-12">
						<div class="panel panel-green">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-12 text-center">
										<div class="huge" style="font-size:15pt"><?php echo $criticalCat;?></div>
										<div style="font-size:10pt">Critical Category</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END Sidebar Content -->
	</div>
	<!-- END Wrapper for scrolling functionality -->
</div>
<!-- END Main Sidebar -->