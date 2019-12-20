<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/30/2019
 * Time: 4:52 AM
 */

$utils=new omh\utils\Utils();
$countries=$utils->get_countries();
?>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<a href="<?php echo BASE_PATH . 'drugs/' ?>"
				                     class="btn btn-primary"><i class="icon-menu7"></i> All Drugs</a>
			</div>
			<form action="<?php echo BASE_PATH . 'drugs/add/' ?>" method="post">
				<div class="card-body">
					<div class="col-lg-12">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label for="product-title">Name of Drug</label>
									<input type="text" class="form-control" id="name_of_drug"  name="name_of_drug" placeholder="Brand name"
									       required="required">
								</div>
								<div class="form-group">
									<label for="product-subtitle">Generic Name</label>
									<input type="text" class="form-control" id="generic_name_of_drug" name="generic_name_of_drug"
									       placeholder="Generic name" value="">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="product-type">Dosage form</label>
									<input type="text" class="form-control" id="dosage_form" name="dosage_form" placeholder="Dispensed as">
								</div>
								<div class="form-group">
									<label for="product-year">Pack size</label>
									<input type="text" class="form-control" id="pack_size" name="pack_size" placeholder="Size of pack">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<label for="product-desc">Strength of drug</label>
									<textarea id="strength_of_drug"  name="strength_of_drug" rows="5" class="form-control"
									          placeholder="Strength of drug"></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card-header bg-light">
					<h6 class="card-title">Company information</h6>
				</div>
				<div class="card-body">
					<div class="col-lg-12">

						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label for="product-title">NDA Registration</label>
									<input type="text" class="form-control" id="nda_registration_no" name="nda_registration_no"
									       placeholder="NDA Registration" required="required">
								</div>
								<div class="form-group">
									<label for="product-subtitle">Local Distributor</label>
									<input type="text" class="form-control" id="local_technical_representative" name="local_technical_representative"
									       placeholder="Local distributor" value="">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="product-type">Licence holder</label>
									<input type="text" class="form-control" id="license_holder" name="license_holder"
									       placeholder="Licence holder">
								</div>
								<div class="form-group">
									<label for="country_of_manufacture">Country</label>
									<select id="country_of_manufacture" name="country_of_manufacture" class="form-control form-control-select2" >
										<?php foreach ($countries as $key=>$value){
											$selected=$this->getSelected($key,'UG');
											echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
										}?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<label for="product-desc">Manufacturer</label>
									<textarea id="manufacturer" name="manufacturer" rows="5" class="form-control"
									          placeholder="Address of the manufacturer"></textarea>
								</div>
							</div>
						</div>

					</div>
				</div>
				<div class="card-footer text-lg-center">
					<button type="submit" class="btn btn-primary ">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>

