<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/7/2019
 * Time: 10:55 AM
 */

$db=new \omh\database\DB();
$labRequests=$db->getAllLabRequests();

?>


<!-- visits -->
<div class="card">
	<div class="card-header header-elements-inline">
		<h6 class="card-title">Lab Requests</h6>
		<div class="header-elements">
			<div class="list-icons">
				<a class="list-icons-item" data-action="collapse"></a>
				<a class="list-icons-item" data-action="reload"></a>
				<a class="list-icons-item" data-action="remove"></a>
			</div>
		</div>
	</div>

	<div class="card-body">

	</div>

    <table class="table text-nowrap library" >
        <thead>
        <tr>
            <th>Date</th>
            <th>Lab test</th>
            <th>Patient</th>
            <th>Department</th>
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
				$patient=$db->getPatientByID($labRequest['patient_id']);
				$author=$labRequest['author']!=0?$labRequest['author']:'Admin';
				$result=!empty($labRequest['result_notes'])?$labRequest['result_notes']:'Pending';
				$class=$labRequest['result_notes']=='Positive'?'danger':'primary';
				$date=!empty($labRequest['date_added'])?date("d-M-Y",strtotime($labRequest['date_added'])):'';
				echo '<tr>
						<td>'.$date.'</td>
						<td>
							<a href="?visit=' . $labRequest['visit_id'] .'" class="font-weight-semibold">'.$test_name['parent_test'].' > '.$test_name['child_test'].'</a>
							<div class="text-muted font-size-sm">
								<span class="badge badge-mark bg-danger border-danger mr-1"></span>
								'.$labRequest['specimen'].'
							</div>
						</td>
						<td>'.$patient['first_name'].' '.$patient['last_name'].'</td>
						<td>'.$dept_name['department'].'</td>
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
<!-- /visits -->

<script>
    $('.library').DataTable({
        autoWidth: false,
        order: [[ 0, 'asc' ]],
        lengthMenu: [ 25, 50, 75, 100 ],
        displayLength: 25,
        columnDefs :[
	        {orderable: false,
                targets: 0},
            {
                visible: false,
                targets: 0
            },
            {
                orderable: false,
                targets: 6
            }
        ],
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        drawCallback: function (settings) {
            var api = this.api();
            var rows = api.rows({page: 'current'}).nodes();
            var last = null;

            // Grouod rows
            api.column(0, {page: 'current'}).data().each(function (group, i) {
                if (last !== group) {
                    $(rows).eq(i).before(
                        '<tr class="table-active"><td colspan="6" class="font-weight-semibold">' + group + '</td></tr>'
                    );

                    last = group;
                }
            });
        },
        language: {
            search: '<span>Filter:</span> _INPUT_',
            searchPlaceholder: 'Type to filter...',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
        }
    });
</script>