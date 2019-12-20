<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/4/2019
 * Time: 1:37 PM
 */
$db=new \omh\database\DB();
$departments=$db->getDepartments();
$utils=new \omh\utils\Utils();
$visits=$db->getVisits($this->getPageVars2());
$users=$db->getAllUsers();
$tab='&tab=notes';
?>

<!-- visits -->
<div class="card">
	<div class="card-header header-elements-inline">
        <div class="btn-group">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_form_vertical">
                <i class="icon-diff-added"></i> Inpatient</button>
            <button type="button" class="btn btn-secondary">Outpatient</button>
        </div>
		<div class="header-elements">
			<div class="list-icons">
				<a class="list-icons-item" data-action="collapse"></a>
				<a class="list-icons-item" data-action="reload"></a>
				<a class="list-icons-item" data-action="remove"></a>
			</div>
		</div>
	</div>

	<div class="card-body">
        <table class="table text-nowrap">
            <thead>
            <tr>
                <th>Category</th>
                <th>Department</th>
                <th>Date</th>
                <th>Patient No</th>
                <th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
            </tr>
            </thead>
            <tbody>
			<?php if ( ! empty( $visits ) ) {
				foreach ($visits as $visit){
					$category=$visit['category']==0?'Inpatient':'OutPatient';
				    $dept_name=$db->getDepartmentByID($visit['department']);
				    $date=!empty($visit['date_added'])?date("d-M-Y",strtotime($visit['date_added'])):'';
					echo '<tr>
					
						<td>
							<a href="?visit=' . $visit['id'] .$tab.'" class="font-weight-semibold">'.$category.'</a>
							<div class="text-muted font-size-sm">
								<span class="badge badge-mark bg-danger border-danger mr-1"></span>
								Referred
							</div>
						</td>
						<td>'.$dept_name['department'].'</td>
						<td>'.$date.'</td>
						<td>
							'.$visit['visit_no'].'
						</td>
				
						<td class="text-center">
							<div class="list-icons">
								<div class="list-icons-item dropdown">
									<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="?visit=' . $visit['id'] .$tab.'" class="dropdown-item"><i class="icon-file-eye"></i> View</a>
										<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
										<a href="#" class="dropdown-item"><i class="icon-close2"></i> End Visit</a>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
									</div>
								</div>
							</div>
						</td>
					</tr>';
				}
			} ?>

            </tbody>
        </table>

	</div>
</div>
<!-- /visits -->

<!-- add visit modal -->
<div id="modal_form_vertical" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add New Patient Visit</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<form method="post">
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label>Category</label>
								<select class="form-control" name="category">
									<option value="1">Outpatient</option>
                                    <option value="0">Inpatient</option>
								</select>
							</div>

							<div class="col-sm-6">
								<label>Patient No</label>
								<input type="text" placeholder="Patient No" class="form-control" name="visit_no" value="HCH<?php echo date('myhis')?>">
							</div>
						</div>
					</div>

					<div class="form-group">
						<label>Department</label>
						<select class="form-control" name="department">
                            <option value=""></option>
							<?php foreach ($departments as $department){
								echo '<option value="'.$department['id'].'">'.$department['department'].'</option>';
							} ?>
						</select>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label>Assign Doctor</label>
                                <select class="form-control" name="doctor">
                                    <option value=""></option>
									<?php foreach ($users as $user){
										echo '<option value="'.$user['id'].'">'.$user['username'].'</option>';
									} ?>
                                </select>
							</div>

							<div class="col-sm-6">
								<label>Next of Kin</label>
								<input type="text" placeholder="Next of kin" class="form-control">
							</div>

						</div>
					</div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-5"><label>Does Patient Need palliative care?</label></div>
                            <div class="col-7"> <div class="form-check form-check-switchery">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input-switchery" name="care" checked data-fouc>
                                    </label>
                                </div></div>
                        </div>
                    </div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					<button type="submit" class="btn bg-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /add visit modal -->
