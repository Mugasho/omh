<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 12/4/2019
 * Time: 3:47 PM
 */
$db    = new \omh\database\DB();
$drugs = $db->getDrugNames( 300, 0,'' );
?>

<div class="card ">
    <div class="card-header">
        <div class="btn-group">
            <a href="<?php echo BASE_PATH . 'drugs/ledgers/'; ?>" class="btn bg-primary btn-icon ">
                <i class="icon-menu7"></i> Drug Ledgers
            </a>
            <a href="#" class="btn bg-primary btn-icon dropdown-toggle" data-toggle="dropdown">

            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <a href="<?php echo BASE_PATH . 'drug/add/?return=drugs+ledgers+add'; ?>" class="dropdown-item">
                    <i class="icon-file-plus"></i> Drugs</a>
            </div>
        </div>

    </div>
    <form method="POST" accept-charset="UTF-8" class="" name="form" >
        <div class="card-body">

            <div class="form-group">
                <label for="drug_id" class=" control-label">Drug</label>

                <select class="form-control form-control-ajax" required="required" id="drug_id"
                        name="drug_id">
                    <option>--select drug--</option>

                </select>

            </div>
            <div class="form-group">
                <label for="notes" class="">Notes</label>
                <textarea class="form-control" name="ledger_description" rows="5"
                          id="ledger_description"></textarea>
            </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="icon icon-floppy-disk"></i> Save</button>
        </div>
    </form>

</div>

<script type="text/javascript">
    $(".form-control-ajax").select2({
        ajax: {
            url: "<?php echo BASE_PATH.'drugs/api/';?>",
            dataType: 'json',
            delay: 250,
            type: 'GET',
            data: function (params) {
                return {
                    s: params.term, // search term
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) { return markup; },
        minimumInputLength: 1
    });
</script>
