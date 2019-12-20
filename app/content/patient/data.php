<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/11/2019
 * Time: 8:45 PM
 */

$db=new omh\database\DB();
$patients=$db->getPatients(20);
?>

<!-- Task manager table -->
<div class="card">
	<div class="card-header bg-transparent header-elements-inline">
        <a  class="btn btn-primary" href="<?php echo BASE_PATH.'patients/add/'?>"><i class="icon-add mr-2"></i> New Patient</a>
		<div class="header-elements">
			<div class="list-icons">
				<a class="list-icons-item" data-action="collapse"></a>
				<a class="list-icons-item" data-action="reload"></a>
				<a class="list-icons-item" data-action="remove"></a>
			</div>
		</div>
	</div>

	<table class="table tasks-list table-lg">
		<thead>
		<tr>
			<th>#</th>
			<th>Period</th>
            <th></th>
			<th>Patient Name</th>
			<th>Contact</th>
			<th>Gender</th>
			<th>Age</th>
			<th>Status</th>
			<th class="text-center text-muted" style="width: 30px;"><i class="icon-checkmark3"></i></th>
		</tr>
		</thead>
		<tbody>
		<?php
		if ( ! empty( $patients ) ) {
			$utils=new omh\utils\Utils();
			foreach ($patients as $patient){
			    $gender=$patient['sex']=='F'?'Female':'Male';

				echo '<tr>
				<td>#'.$patient['id'].'</td>
				<td>'.date( "Y-m-d", strtotime( $patient['date_added']) ).'</td>
				<td class="table-inbox-image">';
				if(!empty($patient['profile_pic'])){
				    echo '<img src="'.CONTENT_PATH . 'uploads/' . $patient['profile_pic'].'" height="38" width="38" class="rounded-circle">';
                }else {
				    echo '

				<span class="btn bg-pink-400 rounded-circle btn-icon btn-sm" >
                    <span class="letter-icon" > '.substr($patient['first_name'],0,1).' </span >
                </span >';
                                          }
				echo '
                </td>
				<td>
					<div class="font-weight-semibold"><a href="view/'.$patient['id'].'/">'.$patient['first_name'].' '.$patient['last_name'].'</a></div>
					<div class="text-muted">'.$patient['address'].' '.$patient['division'].', '.$patient['city'].'</div>
				</td>
				<td>
					'.$patient['phone'].'
				</td>
				<td>
					'.$gender.'
				</td>
				<td>'.$utils->get_interval($patient['dob']).'</td>
				<td>
					<span class="badge bg-pink-400 mr-2">Admitted</span>
				</td>
				
				<td class="text-center">
					<div class="list-icons">
						<div class="list-icons-item dropdown">
							<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu9"></i></a>
							<div class="dropdown-menu dropdown-menu-right">
								<a href="#" class="dropdown-item"><i class="icon-alarm-add"></i> Check in</a>
								<a href="'.BASE_PATH.'invoice/print/'.$patient['id'].'/" class="dropdown-item" target="_blank"><i class="icon-printer"></i> Print Invoice</a>
								<a href="#" class="dropdown-item"><i class="icon-rotate-ccw2"></i> Assign bed</a>
								<div class="dropdown-divider"></div>
								<a href="edit/'.$patient['id'].'/" class="dropdown-item"><i class="icon-pencil7"></i> Edit Patient</a>
								<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
							</div>
							</li>
						</div>
				</td>
			</tr>';
			}
		} ?>

		</tbody>
	</table>
</div>
<!-- /task manager table -->