<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/30/2019
 * Time: 3:34 AM
 */

$db=new \omh\database\DB();
$ledger=$db->getStaffLedgerByID($this->getPageVars());
$staff=$db->getHealthWorkerByID($ledger['staff_id']);
?>

<div class="card ">
	<div class="card-header">
		<div class="btn-group">
			<a href="<?php echo BASE_PATH . 'ledgers/'; ?>" class="btn bg-primary btn-icon " >
				<i class="icon-menu7"></i> Ledgers
			</a>
			<a href="#" class="btn bg-primary btn-icon dropdown-toggle" data-toggle="dropdown">

			</a>

			<div class="dropdown-menu dropdown-menu-right">
				<a href="<?php echo BASE_PATH . 'hw/add/?return=ledger+add'; ?>" class="dropdown-item"><i class="icon-file-plus"></i> Staff member</a>
				<a href="<?php echo BASE_PATH . 'ledgers/types/'; ?>" class="dropdown-item"><i class="icon-file-plus"></i> Ledger types</a>
			</div>
		</div>

	</div>
	<form method="POST"  name="form">
		<div class="card-body">

			<div class="form-group">
				<label for="staff_id" class=" control-label">Staff Member</label>
				<input readonly class="form-control" value="<?php echo $staff['first_name'] .' '.$staff['surname'];?>">

			</div>
			<div class="form-group">
				<label>Ledger Number</label>
				<input name="ledger_no" class="form-control" value="<?php echo $ledger['ledger_no'];?>">
			</div>
			<div class="form-group">
				<label for="notes" class="">Notes</label>
				<textarea class="form-control" name="ledger_description"  rows="5"
				          id="ledger_description"><?php echo $ledger['ledger_description'];?></textarea>
			</div>


		</div>

		<div class="card-footer">
			<button type="submit" class="btn btn-primary"><i class="icon icon-floppy-disk"></i> Save</button>
		</div>
	</form>

</div>

