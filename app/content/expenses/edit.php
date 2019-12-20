<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/10/2019
 * Time: 4:12 PM
 */

$db           = new \omh\database\DB();
$utils        =new \omh\utils\Utils();
$ledger_types = $db->getExpenseTypes();
$expense      =$this->getPageVars();
$recur_types  =$utils->get_recur_types();
$bool         =$utils->get_bool();
?>

<div class="card ">
	<div class="card-header">
		<a href="types.php" class="btn btn-primary"><i class="icon icon-list-ordered"></i> Expenses </a>

	</div>
	<form method="POST" accept-charset="UTF-8" class="" name="form" enctype="multipart/form-data"><input name="_token"
	                                                                                                     type="hidden"
	                                                                                                     value="ay8wlKGRtOv7eTEKJFlU7PzxDSTCRrEjpg8BLA5z">
		<div class="card-body">

			<div class="form-group">
				<label for="expense_type_id" class=" control-label">Expense Type</label>

				<select class="form-control" required="required" id="expense_type_id" name="expense_type_id">
					<option value="">-- select expense type --</option>
					<?php foreach ( $ledger_types as $expense_type ) {
						$selected=$this->getSelected($expense['expense_type_id'],$expense_type['id']);
						echo '<option value="' . $expense_type['id'].'" '.$selected.' >' . $expense_type['expense_type'] . '</option>';
					} ?>
				</select>

			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-lg-6">
						<label for="amount" class="">Expense Amount</label>
						<input class="form-control " placeholder="" required name="amount" type="number" value="<?php echo $expense['amount'];?>"
						       id="amount">
					</div>
					<div class="col-lg-6">
						<label for="expense_date" class="">Date</label>
						<input class="form-control date-picker" placeholder="" required="required" name="expense_date" value="<?php echo $expense['expense_date'];?>"
						       type="text"
						       id="expense_date">
					</div>
				</div>
			</div>


			<div class="form-group">
				<label for="recurring" class="active">Is Expense Recurring?</label>
				<select class="form-control" id="recurring" name="recurring">
					<?php foreach ( $bool as $key=>$value ) {
						$selected=$this->getSelected($key,$expense['recurring']);
						echo '<option value="' . $key.'" '.$selected.' >' . $value . '</option>';
					} ?>
				</select>
			</div>
			<div id="recur">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<div class="form-line">
								<label for="recur_frequency" class="">Recur Frequency</label>
								<input class="form-control" id="recurF" name="recur_frequency" type="number" value="<?php echo $expense['recur_frequency'];?>">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<div class="form-line">
								<label for="recur_type" class="active">Recur Type</label>
								<select class="form-control" id="recurT" name="recur_type">
									<?php foreach ( $recur_types as $key=>$value ) {
										$selected=$this->getSelected($key,$expense['recur_type']);
										echo '<option value="' . $key.'" '.$selected.' >' . $value . '</option>';
									} ?>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<div class="form-line">
								<label for="recur_start_date" class="">Recur Starts</label>
								<input class="form-control date-picker" id="recur_start_date" name="recur_start_date"
								       type="text" value="<?php echo $expense['recur_start_date'];?>">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<div class="form-line">
								<label for="recur_end_date" class="">Recur Ends</label>
								<input class="form-control date-picker" id="recur_end_date" name="recur_end_date"
								       type="text" value="<?php echo $expense['recur_end_date'];?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="form-group">
				<label for="notes" class="">Description</label>
				<textarea class="form-control" name="expense_description" cols="50" rows="10"
				          id="expense_description"><?php echo $expense['expense_description'];?></textarea>
			</div>
			<div class="form-group">
				<label for="files" class="">Files(doc, pdf, image)</label>
				<input class="form-control" multiple="" rows="3" name="files[]" type="file">
				<div class="col-sm-12">You can select up to 30 files. Please click Browse button and then hold Ctrl button on your keyboard to select multiple files.
				</div>
			</div>
			<div class="form-group">
				<hr>
			</div>


		</div>

		<div class="card-footer">
			<button type="submit" class="btn btn-primary"><i class="icon icon-floppy-disk"></i> Save</button>
		</div>
	</form>

</div>
<!-- /.box -->

<script>

    $(document).ready(function (e) {
        if ($('#recurring').val() == '1') {
            $('#recur').show();
            $('#recurT').attr('required', 'required');
            $('#recur_start_date').attr('required', 'required');
            $('#recurF').attr('required', 'required');
        } else {
            $('#recur').hide();
            $('#recurT').removeAttr('required');
            $('#recur_start_date').removeAttr('required');
            $('#recurF').removeAttr('required');
        }
        $('#recurring').change(function () {
            if ($('#recurring').val() == '1') {
                $('#recur').show();
                $('#recurT').attr('required', 'required');
                $('#recurF').attr('required', 'required');
                $('#recur_start_date').attr('required', 'required');
            } else {
                $('#recur').hide();
                $('#recurT').removeAttr('required');
                $('#recur_start_date').removeAttr('required');
                $('#recurF').removeAttr('required');
            }
        })
    })

</script>
