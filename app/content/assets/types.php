<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/29/2019
 * Time: 12:34 PM
 */

$db          = new  omh\database\DB();
$utils=new omh\utils\Utils();
$asset_types = $db->getAssetTypes();
$asset_category=$utils->get_asset_category();

?>

<div class="row"><?php
	if ( ! isset( $_GET['e'] ) ) {?>
    <div class="col-lg-4">
            <!-- /default ordering -->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Add new asset type</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <form method="post">
                        <input hidden name="add" title="add">
                        <div class="form-group">
                            <label for="asset_name">Asset name</label>
                            <input class="form-control" name="asset_name" title="Asset name">
                        </div>
                        <div class="form-group">
                            <label for="asset_category">Category</label>
                            <select class="form-control" id="asset_category" name="asset_category">
	                            <?php
	                            foreach ($asset_category as $key=>$value){
		                            echo '<option value="'.$key.'">'.$value.' Asset</option>';
	                            }
	                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="asset_description">Description</label>
                            <textarea rows="5" class="form-control" name="asset_description"
                                      title="Asset name"></textarea>
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>


            </div>
            <!-- /default ordering -->
        </div><?php } else {
	    $c_asset=$db->getAssetTypeByID($_GET['e']);
	    ?>
    <div class="col-lg-4">
            <!-- /default ordering -->
            <div class="card">
                <div class="card-header header-elements-inline bg-primary-300">
                    <h5 class="card-title">Edit asset type</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <form method="post" action="<?php echo BASE_PATH.'assets/types/'?>">
                        <input hidden name="edit" title="edit">
                        <input hidden name="id" title="id" value="<?php echo $_GET['e'];?>">
                        <div class="form-group">
                            <label for="asset_name">Asset name</label>
                            <input class="form-control" name="asset_name" title="Asset name" value="<?php echo  $c_asset['asset_name'];?>">
                        </div>
                        <div class="form-group">
                            <label for="asset_category">Category</label>
                            <select class="form-control" id="asset_category" name="asset_category">
	                            <?php
	                            foreach ($asset_category as $key=>$value){
		                            $selected=$this->getSelected($key,$c_asset['asset_category']);
		                            echo '<option value="'.$key.'" '.$selected.' >'.$value.' Asset</option>';
	                            }
	                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="asset_description">Description</label>
                            <textarea rows="5" class="form-control" name="asset_description"
                                      title="Asset name" ><?php echo $c_asset['asset_description'];?></textarea>
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>


            </div>
            <!-- /default ordering -->
        </div><?php } ?>

    <div class="col-lg-8">
        <!-- /default ordering -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Asset Types</h5>
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
                    <th>Asset Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>

				<?php if ( ! empty( $asset_types ) ) {
					foreach ( $asset_types as $asset_type ) {
						echo '<tr>
	            <td><a href="#">' . $asset_type['asset_name'] . '</a></td>
	            <td>' . $asset_type['asset_category'] . ' Asset</td>
	            <td>' . $asset_type['asset_description'] . '</td>
	            <td class="text-center">
	                <div class="list-icons">
	                    <div class="dropdown">
	                        <a href="#" class="list-icons-item" data-toggle="dropdown">
	                            <i class="icon-menu9"></i>
	                        </a>
	
	                        <div class="dropdown-menu dropdown-menu-right">
	                            <a href="?e=' . $asset_type['id'] . '" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
	                            <a href="?r=' . $asset_type['id'] . '" class="dropdown-item"><i class="icon-bin"></i> Delete</a>
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
    </div>
</div>


<script>
    $('.datatable-sorting').DataTable({
        autoWidth: false,
        columnDefs: [{
            orderable: false,
            width: 100,
            targets: [3]
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