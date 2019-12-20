<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/4/2019
 * Time: 12:53 AM
 */

$db             =new omh\database\DB();
$utils=new \omh\utils\Utils();
$health_workers =$db->getHealthWorkers();
?>

<!-- /default ordering -->
<div class="card">
	<div class="card-header header-elements-inline">
        <a href="<?php echo BASE_PATH .'hw/add/' ?>"
           class="btn btn-primary"><i class="icon-diff-added"></i> Add New </a>
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
	<table class="table datatable-sorting">
		<thead>
		<tr>
			<th></th>
			<th>Names</th>
			<th>Reg No</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Address</th>
			<th class="text-center">Actions</th>
		</tr>
		</thead>
		<tbody>

		<?php if ( ! empty( $health_workers ) ) {
			foreach ( $health_workers as $health_worker ) {
				echo '<tr>
                <td class="table-inbox-image">';
                if(!empty($health_worker['profile_pic'])){
                    echo '<img src="'.CONTENT_PATH . 'uploads/' . $health_worker['profile_pic'].'" height="38" width="38" class="rounded-circle">';
                }else {
                    echo '

				<span class="btn bg-pink-400 rounded-circle btn-icon btn-sm" >
                    <span class="letter-icon" > '.strtoupper(substr($health_worker['first_name'],0,1)).' </span >
                </span >';
                }
                echo '
	            <td><a href="#">' . $health_worker['surname'] . ' '.$health_worker['first_name'].'</a></td>
	            <td>' . $health_worker['reg_no'] . '</td>
	            <td>' . $health_worker['email'] . '</td>
	            <td>' . $health_worker['phone'] . '</td>
	            <td>' . $health_worker['address'] . '</td>
	            
	            
	            <td class="text-center">
	                <div class="list-icons">
	                    <div class="dropdown">
	                        <a href="#" class="list-icons-item" data-toggle="dropdown">
	                            <i class="icon-menu9"></i>
	                        </a>
	
	                        <div class="dropdown-menu dropdown-menu-right">
	                            <a href="?e=' . $health_worker['id'] . '" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
	                            <a href="?r=' . $health_worker['id'] . '" class="dropdown-item"><i class="icon-bin"></i> Delete</a>
	                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to .pdf</a>
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
<!-- /default ordering -->

<script>
    $('.datatable-sorting').DataTable({
        autoWidth: false,
        columnDefs: [{
            orderable: false,
            width: 100,
            targets: [5]
        }],
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            searchPlaceholder: 'Type to filter...',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: {
                'first': 'First',
                'last': 'Last',
                'next': $('html').attr('dir') === 'rtl' ? '&larr;' : '&rarr;',
                'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;'
            }
        }
    });
</script>