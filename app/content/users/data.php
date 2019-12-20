<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/3/2019
 * Time: 4:33 PM
 */
$db=new omh\database\DB();
$users=$db->getAllUsers();
?>

<!-- /default ordering -->
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Users</h5>
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
		<tr><th></th>
			<th>Username</th>
			<th>Email</th>
			<th>Date Added</th>
			<th class="text-center">Actions</th>
		</tr>
		</thead>
		<tbody>

		<?php if ( ! empty( $users ) ) {
			foreach ( $users as $user ) {
				echo '<tr>
                <td class="table-inbox-image">';
                if(!empty($user['profile_pic'])){
                    echo '<img src="'.CONTENT_PATH . 'uploads/' . $user['profile_pic'].'" height="38" width="38" class="rounded-circle">';
                }else {
                    echo '

				<span class="btn bg-pink-400 rounded-circle btn-icon btn-sm" >
                    <span class="letter-icon" > '.strtoupper(substr($user['username'],0,1)).' </span >
                </span >';
                }
                echo '
                </td>
	            <td><a href="#">' . $user['username'] . '</a></td>
	            <td>' . $user['email'] . '</td>
	            <td>' . $user['created_at'] . '</td>
	            <td class="text-center">
	                <div class="list-icons">
	                    <div class="dropdown">
	                        <a href="#" class="list-icons-item" data-toggle="dropdown">
	                            <i class="icon-menu9"></i>
	                        </a>
	
	                        <div class="dropdown-menu dropdown-menu-right">
	                            <a href="?e=' . $user['id'] . '" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
	                            <a href="?r=' . $user['id'] . '" class="dropdown-item"><i class="icon-bin"></i> Delete</a>
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
            targets: [4]
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
