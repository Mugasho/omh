<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/10/2019
 * Time: 8:27 PM
 */

$db=new \omh\database\DB();
$staffs=$db->getHealthWorkers();
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
                <a href="<?php echo BASE_PATH . 'hw/add/?return=ledgers+add'; ?>" class="dropdown-item"><i class="icon-file-plus"></i> Staff member</a>
            </div>
        </div>

    </div>
    <form method="POST" accept-charset="UTF-8" class="" name="form" enctype="multipart/form-data">
        <div class="card-body">

            <div class="form-group">
                <label for="staff_id" class=" control-label">Staff Member</label>

                <select class="form-control form-control-select2" required="required" id="staff_id"
                        name="staff_id">
                    <option value="">-- Select staff member --</option>
			        <?php if ( ! empty( $staffs ) ) {
				        foreach ( $staffs as $staff ) {
					        echo '<option value="' . $staff['id'] . '">' . $staff['first_name'] .' '.$staff['surname'].'</option>';
				        }
			        } ?>
                </select>

            </div>
            <div class="form-group">
                <label>Ledger Number</label>
                <input name="ledger_no" class="form-control">
            </div>
            <div class="form-group">
                <label for="notes" class="">Notes</label>
                <textarea class="form-control" name="ledger_description"  rows="5"
                          id="ledger_description"></textarea>
            </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="icon icon-floppy-disk"></i> Save</button>
        </div>
    </form>

</div>
