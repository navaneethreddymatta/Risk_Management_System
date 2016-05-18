<div id="baform" class="block">
	<div class="block-title">
		<h2><strong>Mitigating Actions</strong></h2>
	</div>
	<div class="block full">
		<div class="row">	
			<div class="col-md-4">Risk Score</div>		
			<div class="col-md-5">
				<div class="input-group">					
					<input type="text" placeholder="Score" class="form-control input-lg" name="val_score" id="val_score" value="<?php echo $rInstScore; ?>">
				</div>
			</div>
			<div class="col-md-3">
				<button onclick="setRiskScore(<?php echo $selectedRI; ?>)" class="btn btn-sm btn-primary" type="submit"><i class="fa fa-arrow-right"></i>Set</button>
			</div>
		</div>
	</div>
	<form class="form-horizontal" method="post" action="" id="masform" novalidate="novalidate">
		<div class="row">
			<div id="example-datam" class="table-responsive" >
				<table id="example-datatablem" class="table table-vcenter table-hover table-condensed table-bordered" style="width:100% !important">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>% Reduction</th>
							<th>Selected</th>						
						</tr>
					</thead>
					<tbody>
						<?php $i=1;foreach($mas as $ma){
						echo "<tr id='Row4".$i."'><td>".$ma->id."</td><td>".$ma->name."</td><td>".$ma->impReduction."</td><td style='text-align:center'><input type='checkbox' name='val_masIncluded[]' id='val_masIncluded".$ma->id."' value='".$ma->id."'";
						if($ma->cnt > 0){echo 'checked';}
						echo "></td></tr>";
						$i=$i+1;
					}?>			
					</tbody>
				</table>
			</div>
		</div>
		<div class="form-group form-actions">
			<div class="col-md-8 col-md-offset-4">
				<input type="hidden" value="includedMAs" name="val_form" id="val_form">	
				<input type="hidden" value="<?php echo $selectedRI; ?>" name="val_riskInstanceID" id="val_riskInstanceID">				
				<button class="btn btn-sm btn-primary" type="submit" name="stInclude"><i class="fa fa-arrow-right"></i> Submit</button>
				<button class="btn btn-sm btn-warning" type="reset"><i class="fa fa-repeat"></i> Reset</button>
			</div>
		</div>
	</form>
</div>