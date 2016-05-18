<div id="baform" class="block">
	<div class="block-title">
		<h2><strong>Risks</strong></h2>
	</div>
	<div class="row">
		<div id="example-datar" class="table-responsive" >
			<table id="example-datatabler" class="table table-vcenter table-hover table-condensed table-bordered" style="width:100% !important">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Gross Score</th>
						<th>Net Score</th>						
					</tr>
				</thead>
				<tbody>
					<?php $i=1;foreach($risks as $risk){
					echo "<tr id='RI".$risk->id."' onclick='loadMAView(\"".$risk->id."\")'><td>".$i."</td><td>".$risk->riskName."</td><td id='RIScore".$risk->id."'>".$risk->score."</td><td id='RINetScore".$risk->id."'>".$risk->netScore."</td></tr>";
					$i=$i+1;
				}?>			
				</tbody>
			</table>
		</div>
	</div>
</div>
