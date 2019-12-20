<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/12/2019
 * Time: 10:25 AM
 */

$utils=new omh\utils\Utils();
$countries=$utils->get_countries();
$gender=$utils->get_gender();
$districts=$utils->get_districts();
?>

<div class="card">
	<div class="card-header header-elements-inline">
        <a  class="btn btn-primary" href="<?php echo BASE_PATH.'patients/'?>"><i class="icon-users mr-2"></i> All Patients</a>
		<div class="header-elements">
			<div class="list-icons">
				<a class="list-icons-item" data-action="collapse"></a>
				<a class="list-icons-item" data-action="reload"></a>
				<a class="list-icons-item" data-action="remove"></a>
			</div>
		</div>
	</div>

	<div class="card-body">
		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label>First name</label>
						<input class="form-control" id="first_name"name="first_name" required>
					</div>
					<div class="col-md-6">
						<label>Last name</label>
						<input  class="form-control" id="last_name" name="last_name">
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-md-3">
						<label>Patient ID</label>
						<input  class="form-control" id="patient_id" name="patient_id" required>
					</div>
                    <div class="col-md-3">
                        <label>Sex</label>
                        <select class="form-control form-control-select2" id="sex" name="sex" data-fouc>
	                        <?php
	                        foreach ($gender as $key=>$value){
		                        echo '<option value="'.$key.'">'.$value.'</option>';
	                        }
	                        ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Email</label>
                        <input type="email"  class="form-control" name="email" id="email">
                    </div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-md-3">
						<label>City</label>
                        <select class="form-control form-control-select2" id="city" name="city" data-fouc>
                            <option value="">--select city--</option>
							<?php
							foreach ($districts as $key=>$value){
								echo '<option value="'.$key.'">'.$value.'</option>';
							}
							?>
                        </select>
					</div>
					<div class="col-md-3">
						<label>Division/Parish</label>
						<input  class="form-control" id="division" name="division">
					</div>
					<div class="col-md-6">
						<label>Village</label>
						<input  class="form-control" id="village" name="village">
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
                    <div class="col-md-6">
                        <label>Address</label>
                        <input  class="form-control" id="address" name="address">
                    </div>

					<div class="col-md-6">
						<label>Your country</label>
						<select class="form-control form-control-select2" id="country" name="country" data-fouc>
                            <option value="">--select country--</option>
							<?php
							foreach ($countries as $key=>$value){
								echo '<option value="'.$key.'">'.$value.'</option>';
							}
							?>
						</select>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-md-3">
						<label>Phone #</label>
						<input  class="form-control" id="phone" name="phone">
						<span class="form-text text-muted">+256-700-000-000</span>
					</div>
                    <div class="col-md-3">
                        <label>Date of Birth</label>
                        <input  class="form-control date-picker" placeholder="dd-mm-yy" id="dob" name="dob">
                    </div>

					<div class="col-md-6">
						<label>Upload profile image</label>
						<input type="file" class="form-input-styled" name="profile_pic" id="profile_pic" data-fouc="">
						<span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
					</div>
				</div>
			</div>

			<div class="text-right">
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
		</form>
	</div>
</div>
<script>

</script>