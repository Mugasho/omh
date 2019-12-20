<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/10/2019
 * Time: 11:06 AM
 */

$db            = new \omh\database\DB();
$expense_types = $db->getExpenseTypes();
?>

<div class="card ">
    <div class="card-header">
        <a href="<?php echo BASE_PATH.'expenses/';?>" class="btn btn-primary"><i class="icon icon-list-ordered"></i> Expenses </a>

    </div>
    <form method="POST" accept-charset="UTF-8" class="" name="form" enctype="multipart/form-data"><input name="_token"
                                                                                                         type="hidden"
                                                                                                         value="ay8wlKGRtOv7eTEKJFlU7PzxDSTCRrEjpg8BLA5z">
        <div class="card-body">

            <div class="form-group">
                <label for="expense_type_id" class=" control-label">Expense Type</label>

                <select class="form-control" required="required" id="expense_type_id" name="expense_type_id">
                    <option value="">-- select expense type --</option>
					<?php foreach ( $expense_types as $expense_type ) {
						echo '<option value="' . $expense_type['id'] . '">' . $expense_type['expense_type'] . '</option>';
					} ?>
                </select>

            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="amount" class="">Expense Amount</label>
                        <input class="form-control " placeholder="" required name="amount" type="number"
                               id="amount">
                    </div>
                    <div class="col-lg-6">
                        <label for="expense_date" class="">Date</label>
                        <input class="form-control date-picker" placeholder="" required="required" name="expense_date"
                               type="text"
                               id="expense_date">
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label for="recurring" class="active">Is Expense Recurring?</label>
                <select class="form-control" id="recurring" name="recurring">
                    <option value="1">Yes</option>
                    <option value="0" selected="selected">No</option>
                </select>
            </div>
            <div id="recur">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-line">
                                <label for="recur_frequency" class="">Recur Frequency</label>
                                <input class="form-control" id="recurF" name="recur_frequency" type="number" value="1">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-line">
                                <label for="recur_type" class="active">Recur Type</label>
                                <select class="form-control" id="recurT" name="recur_type">
                                    <option value="day">Day(s)</option>
                                    <option value="week">Week(s)</option>
                                    <option value="month" selected="selected">Month(s)</option>
                                    <option value="year">Year(s)</option>
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
                                       type="text" value="2019-11-10">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-line">
                                <label for="recur_end_date" class="">Recur Ends</label>
                                <input class="form-control date-picker" id="recur_end_date" name="recur_end_date"
                                       type="text">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="notes" class="">Description</label>
                <textarea class="form-control" name="expense_description" cols="50" rows="10"
                          id="expense_description"></textarea>
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
