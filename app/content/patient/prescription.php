<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/30/2019
 * Time: 2:59 PM
 */

$db            = new \omh\database\DB();
$utils=new omh\utils\Utils();
?>
<?php if ( isset( $_GET['page'] ) && $_GET['page'] == 'new-prescription' ) { ?>
    <!-- Apply form -->
    <div class="card">
        <form method="post" action="?visit=<?php echo $_GET['visit'];?>&tab=prescription">

            <div class="card-body">

                <div class="row">
                    <div class="form-group col-lg-12">
                        <label>Drug name:</label>
                        <select name="drug_id" data-placeholder="Choose an option..."
                                class="form-control form-control-ajax" onselect="getDrug(this.selected.value())">
                            <option>--select drug--</option>

                        </select>
                    </div>
                    <div class="form-group col-lg-3">
                        <label>Quantity:</label>
                        <input class="form-control" type="number" value="1" name="qty"
                               required>
                    </div>
                    <div class="form-group col-lg-3">
                        <label>Type:</label>
                        <select name="type" class="form-control"  required>
                            <option value="1">Tablet(s)</option>
                            <option value="2">Capsule</option>
                            <option value="3">Ampule</option>
                            <option value="4">Vial</option>
                            <option value="5">Mg</option>
                            <option value="6">ml</option>
                            <option value="7">g</option>n>

                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Times a day:</label>
                        <select name="times" class="form-control" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>

                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Days:</label>
                        <input class="form-control" type="number" value="1" name="days"
                               required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Period: <span class="text-danger">*</span></label>
                        <select name="period" class="form-control">
                            <option value="1">After Meal</option>
                            <option value="2">Before meal</option>
                            <option value="3">Morning</option>
                            <option value="4">Night</option>

                        </select>
                    </div>

                </div>
            </div>

            <fieldset class="card-body">
                <button type="submit" class="btn bg-teal-400"> <i class="icon-floppy-disk ml-2"></i> Save</button>
                <a href="?visit=<?php echo $_GET['visit'];?>&tab=<?php echo $_GET['tab'];?>" class="btn btn-link" >Close</a>
            </fieldset>
        </form>
    </div>
    <!-- /apply form -->
    <script>



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

        function getDrug(str) {
            if (str.length == 0) {
                document.getElementById("type").innerHTML = "";

            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var arr;
                        arr=this.responseText;
                        console.log(arr);
                        //document.getElementById("type").innerHTML = arr.strength_of_drug;
                    }
                };
                xmlhttp.dataType('json');
                xmlhttp.open("GET", "<?php echo BASE_PATH.'drugs/api/';?>?id=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
<?php }else{?>
    <div class="card">
        <div class="card-header header-elements-inline">
            <button class="btn btn-primary"  onclick="search_page('page','new-prescription')">
                <i class="icon-diff-added"></i>
                <span class="d-none d-lg-inline-block ml-2">Add Prescription</span>
            </button>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Date</th>
                <th>Drug</th>
                <th>Times</th>
                <th>Days</th>
                <th>Period</th>
                <th>Doctor</th>
            </tr>
            </thead>
            <tbody>
			<?php
			$prescriptions = $db->getPrescriptions( $patient['id'], $visit_id );
            if ( ! empty( $prescriptions ) ) {
				foreach ( $prescriptions as $prescription ) {
					$drug = $db->getDrugByID( $prescription['drug_id'] );
					echo '<tr>
	            <td>' . $prescription['date_added'] . '</td>
	            <td>' . $drug['name_of_drug'] . '</td>
	            <td>' . $prescription['times'] . ' x ' . $prescription['qty'] . ' </td>
	            <td>' . $prescription['days'] . ' days</td>
	            <td>' . $utils->get_recur_types()[$prescription['period']]. '</td>
	            <td>David</td>
	        </tr>';
				}
			} ?>

            </tbody>
        </table>
    </div>
<?php }?>
