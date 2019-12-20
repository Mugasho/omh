<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/26/2019
 * Time: 4:22 PM
 */
$db=new omh\database\DB();
$asset=$db->getAssetByID($this->getPageVars());
$valuations=$db->getAssetValuations($asset['id']);
$assetTypes=$db->getAssetTypes();
?>

<!-- Edit form -->
<div class="card">
	<form method="post">

		<fieldset class="card-body">
			<h6 class="font-weight-semibold mt-1 mb-3">Add new Asset</h6>

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label>Asset type:</label>
						<select name="asset_type" data-placeholder="Choose an option..."
						        class="form-control form-control-select2" data-fouc>
							<?php
							foreach ($assetTypes as $asset_type){
								$selected=$this->getSelected($asset_type['id'],$asset['asset_type_id']);
								echo '<option value="'.$asset_type['id'].'" '.$selected.' >'.$asset_type['asset_name'].'</option>';
							}
							?>

						</select>
                        <a href="<?php echo BASE_PATH.'assets/types/';?>"><i class="icon-add-to-list"></i> </a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>Asset name: <span class="text-danger">*</span></label>
						<input type="text" name="asset_name" class="form-control"  value="<?php echo $asset['asset_name'];?>" placeholder="Enter asset name">
					</div>
				</div>
			</div>


			<div class="mb-3">
				<div class="content-divider text-muted">
					<span class="px-2"><i class="icon-circle-down2"></i></span>
				</div>
			</div>
			<h6 class="font-weight-semibold mb-3">Asset value </h6>

			<div class="form-repeater">
				<div data-repeater-list="repeater-list"><?php
					$i=0;
					if ( ! empty( $valuations ) ) {
						foreach ($valuations as $valuation){
							echo '<div data-repeater-item>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>Current Value: <span class="text-danger">*</span></label>
										<input type="number" name="repeater-list['.$i.'][amount]" id="amount"  value="'.$valuation['amount'].'" class="form-control" placeholder="Enter Value amount">
									
									</div>
								</div>
	
								<div class="col-sm-6">
									<div class="form-group">
										<label>Period: <span class="text-danger">*</span></label>
										<div class="row">
											<div class="col-6">
												<input  name="repeater-list['.$i.'][date_valued]"  id="date_valued" type="date" class="form-control" value="'.$valuation['date_valued'].'"
												       placeholder="Valuation date" >
								           
											</div>
											<div class="col-6">
												<button class="btn btn-warning" onclick="deleteValuation('.$valuation['id'].')" data-repeater-delete><i class="icon-bin"></i>
												</button>
											</div>
										</div>
									</div>
								</div>
	
							</div>
						</div>';
							$i++;
						}
					}else{
						echo '<div data-repeater-item>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>Current Value: <span class="text-danger">*</span></label>
										<input type="number" name="repeater-list[0][amount]" id="repeater-list[0][amount]"   class="form-control" placeholder="Enter Value amount">
									
									</div>
								</div>
	
								<div class="col-sm-6">
									<div class="form-group">
										<label>Period: <span class="text-danger">*</span></label>
										<div class="row">
											<div class="col-6">
												<input name="date_valued" id="date_valued"  type="date" class="form-control date-picker"
												       placeholder="Valuation date">
											</div>
											<div class="col-6">
												<button class="btn btn-warning" data-repeater-delete><i class="icon-bin"></i>
												</button>
											</div>
										</div>
									</div>
								</div>
	
							</div>
						</div>';
					}
					?>
				</div>
				<button type="button" class="btn bg-blue" data-repeater-create > <i class="icon-plus2"></i> Add row
				</button>
			</div>

			<span class="form-text text-muted">For physical assets like equipment, you can use the rows to show the depreciated value over time.</span>

			<div class="mb-3">
				<div class="content-divider text-muted">
					<span class="px-2"><i class="icon-circle-down2"></i></span>
				</div>
			</div>

			<h6 class="font-weight-semibold mb-3">Only valid for tangible (physical) assets </h6>

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label>supplier:</label>
						<select name="supplier" data-placeholder="Choose an option..."
						        class="form-control form-control-select2" data-fouc>
							<option></option>
							<option value="netherlands">Riham</option>
							<option value="hungary">Cocacola</option>
							<option value="uk">United Kingdom</option>
							<option value="germany">Germany</option>
							<option value="other">...</option>
							<option value="spain">Spain</option>
						</select>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<label>Serial No: </label>
						<input type="text" name="serial" class="form-control" placeholder="Enter Serial Number">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label>Purchase Price: <span class="text-danger">*</span></label>
						<input type="number"  name="pprice" class="form-control " placeholder="Enter purchase price">
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<label>Purchase Date: <span class="text-danger">*</span></label>
						<input  name="pdate" class="form-control date-picker" placeholder="Purchase date">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label>Replacement Value: </label>
						<input type="number"  name="rprice" class="form-control" placeholder="Replacement value">
					</div>

				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<label>Replacement Date: </label>
						<input type="text"  name="rdate" class="form-control date-picker" placeholder="Replacement date">
					</div>

				</div>
			</div>
		</fieldset>

		<fieldset class="card-body">
			<h6 class="font-weight-semibold mb-3">Upload files</h6>

			<div class="form-group">
				<label>Upload your asset files: </label>
				<input type="file" class="form-input-styled" data-fouc>
				<span class="form-text text-muted">Accepted formats: doc, docx, pdf. Max file size 2Mb</span>
			</div>

		</fieldset>

		<fieldset class="card-body">
			<h6 class="font-weight-semibold mt-1 mb-3">Other information</h6>

			<div class="form-group mb-0">
				<label>Additional information:</label>
				<textarea name="notes" rows="4" cols="4"
				          placeholder="If you want to add any info, do it here." class="form-control"></textarea>
			</div>
		</fieldset>


		<fieldset class="card-body">
			<button type="submit" class="btn bg-blue">Update Asset <i class="icon-paperplane ml-2"></i></button>
			<button class="btn btn-light ml-3">Cancel</button>
		</fieldset>
	</form>
</div>
<!-- /Edit form -->
<script>
    function deleteValuation(id){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "?dv=" + id , true);
        xmlhttp.send();
    }

</script>