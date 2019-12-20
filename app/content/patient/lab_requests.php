<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/6/2019
 * Time: 10:30 PM
 */

$labRequests=$db->getPatientLabRequests($this->getPageVars()['id'],$_GET['visit']);
$procedures=$db->getProcedures();
$states=array();

$page=isset($_GET['page'])?$_GET['page']:'';

if(!$page==''){
?>
<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">Add lab Request</h6>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <form method="post" action="?visit=<?php echo $_GET['visit'];?>&tab=<?php echo $_GET['tab'];?>">
            <input hidden name="lab_request">
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Specimen</label>
                            <select class="form-control select" name="specimen" id="specimen">
                                <option value="stool">stool</option>
                                <option value="blood">Blood</option>
                                <option value="urine">Urine</option>
                            </select>
                        </div>

                        <div class="col-sm-6">
                            <label>Department</label>
                            <select class="form-control " name="department_id" id="department_id">
							    <?php foreach ($departments as $department){
								    echo '<option value="'.$department['id'].'">'.$department['department'].'</option>';
							    } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Type of Test</label>
                    <select class="form-control form-control-select2" name="test" id="test">
                        <option>-- select test--</option>
		                <?php foreach ($procedures as $procedure){
			                echo '<option value="'.$procedure['id'].'">'.$procedure['parent_test'].' | '.$procedure['child_test'].'</option>';
		                } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="request_notes">Notes</label>
                    <textarea class="form-control" name="request_notes" id="request_notes" rows="5"></textarea>
                </div>

            </div>

            <div class="modal-footer">
                <a href="?visit=<?php echo $_GET['visit'];?>&tab=<?php echo $_GET['tab'];?>" class="btn btn-link" data-dismiss="modal">Close</a>
                <button class="btn bg-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<?php }else{?>
    <!-- visits -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <button class="btn btn-primary"  onclick="search_page('page','new')">
                <i class="icon-diff-added"></i>
                <span class="d-none d-lg-inline-block ml-2">Add Lab Request</span>
            </button>
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
                    <th>Lab test</th>
                    <th>Department</th>
                    <th>Date</th>
                    <th>Result</th>
                    <th>Technician</th>
                    <th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
                </tr>
                </thead>
                <tbody>
				<?php if ( ! empty( $labRequests ) ) {
					foreach ($labRequests as $labRequest){
						$dept_name=$db->getDepartmentByID($labRequest['department_id']);
						$test_name=$db->getProcedureByID($labRequest['test_id']);
						$author=$labRequest['author']!=0?$labRequest['author']:'Admin';
						$result=!empty($labRequest['result_notes'])?$labRequest['result_notes']:'Pending';
						$class=$labRequest['result_notes']=='Positive'?'danger':'primary';
						$date=!empty($labRequest['date_added'])?date("d-M-Y",strtotime($labRequest['date_added'])):'';
						echo '<tr>
					
						<td>
							<a href="?visit=' . $labRequest['visit_id'] .'" class="font-weight-semibold">'.$test_name['parent_test'].' > '.$test_name['child_test'].'</a>
							<div class="text-muted font-size-sm">
								<span class="badge badge-mark bg-danger border-danger mr-1"></span>
								'.$labRequest['specimen'].'
							</div>
						</td>
						<td>'.$dept_name['department'].'</td>
						<td>'.$date.'</td>
						<td>
							<span class="badge  bg-'.$class.' border-'.$class.' mr-1"><a href="#" class="text-white">'.$result.'</a></span>
						</td>
						<td>
							<a href="#">'.$author.'</a>
						</td>
						<td class="text-center">
							<div class="list-icons">
								<div class="list-icons-item dropdown">
									<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
									<div class="dropdown-menu dropdown-menu-right">
									    <a href="#" class="dropdown-item"><i class="icon-plus2"></i> Positive</a>
										<a href="#" class="dropdown-item"><i class="icon-minus2"></i> Negative</a>
										<a href="#" class="dropdown-item"><i class="icon-pencil"></i> Edit details</a>
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

<?php }?>
<?php if (!empty($procedures)) {
    foreach ($procedures as $procedure){
        array_push($states,$procedure['parent_test'].' | '.$procedure['child_test']);
    }
} ?>


<script>
    $('.select4').select2();
    var states = <?php echo json_encode( $states );?>;

    // Add data
    var _componentTypeahead = function() {
        if (!$().typeahead) {
            console.warn('Warning - typeahead.bundle.min.js is not loaded.');
            return;
        }

        // Substring matches
        var substringMatcher = function (strs) {
            return function findMatches(q, cb) {
                var matches, substringRegex;

                // an array that will be populated with substring matches
                matches = [];

                // regex used to determine if a string contains the substring `q`
                substrRegex = new RegExp(q, 'i');

                // iterate through the pool of strings and for any string that
                // contains the substring `q`, add it to the `matches` array
                $.each(strs, function (i, str) {
                    if (substrRegex.test(str)) {

                        // the typeahead jQuery plugin expects suggestions to a
                        // JavaScript object, refer to typeahead docs for more info
                        matches.push({value: str});
                    }
                });

                cb(matches);
            };
        };



        // Initialize
        // Initialize
        $('.typeahead-basic').typeahead(
            {
                hint: true,
                highlight: true,
                minLength: 1
            },
            {
                name: 'states',
                displayKey: 'value',
                source: substringMatcher(states)
            }
        );
    };
    _componentTypeahead();
</script>
