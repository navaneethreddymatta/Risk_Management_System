<div id="baform" class="block">
	<div class="block-title">
		<h2><strong>Categories</strong></h2>
	</div>
	<div class="row">
		<div id="example-datac" class="table-responsive" >
			<table id="example-datatablec" class="table table-vcenter table-hover table-condensed table-bordered" style="width:100% !important">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1;foreach($categories as $category){
					echo "<tr id='Row2".$i."' onclick='loadRisksView(\"".$category->id."\")'><td>".$category->id."</td><td>".$category->name."</td></tr>";
					$i=$i+1;
				}?>			
				</tbody>
			</table>
		</div>
	</div>
</div>

