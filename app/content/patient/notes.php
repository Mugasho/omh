<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/25/2019
 * Time: 12:45 PM
 */

$db=new \omh\database\DB();
$utils=new \omh\utils\Utils();
$visit_id=filter_input(INPUT_GET,'visit',FILTER_SANITIZE_NUMBER_INT);
$notes=!empty($visit_id)?$db->getPatientNotes( $this->getPageVars2(),$visit_id):null;
?>

<div class="card">
    <div class="card-header bg-light">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modal_notes"><i class="icon-file-plus"></i> Add Notes</button>
    </div>
</div>
<?php
$note_id=filter_input(INPUT_GET,'e',FILTER_SANITIZE_NUMBER_INT);
if(!empty($note_id)&& !is_null($note=$db->getPatientNoteByID($note_id))){

    ?>

    <div class="card">
        <div class="card-header bg-light">
            <h6 class="card-title">Edit Notes</h6>
        </div>
        <div class="card-body">
            <form  method="post" action="?visit=<?php echo $visit_id;?>&tab=notes">
                <div class="modal-body">
                    <input hidden name="edit-note" value="<?php echo $note_id;?>">

                    <div class="form-group">
                        <textarea class="form-control" rows="8" name="notes" title="notes"><?php echo $note['notes'];?></textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <a href="?visit=<?php echo $visit_id;?>&tab=notes" class="btn btn-link" data-dismiss="modal">Close</a>
                    <button type="submit" class="btn bg-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>


<?php
}else{?>


<div class="card">
<div class="card-body">
	<table class="table">
		<tbody>
		<?php
		if ( ! empty( $notes ) ) {
			foreach ($notes as $note){
				echo '<tr>
				<td>
					<div class="media">
						<div class="mr-3">
							<a href="#">
								<img src="'.CONTENT_PATH.'images/users/me50.jpg" class="rounded-circle" width="44" height="44" alt="">
							</a>
						</div>
	
						<div class="media-body">
						<h6 class="mb-3">
						<i class="icon-bubbles5 mr-2"></i>
						<a href="#">Jason Ansley</a> reviewed
					</h6>
						
							'.$note['notes'].'
							<ul class="list-inline mt-1">
								<li class="list-inline-item"><div class="text-muted">'.$utils->get_interval($note['date_added']).' ago</div></li>
								<li class="list-inline-item"><a href="#">John Doe</a></li>
								<li class="list-inline-item"><a href="?visit='.$_GET['visit'].'&tab=notes&e='.$note['id'].'"><i class="icon-pencil"></i></a></li>
								<li class="list-inline-item"><a href="?visit='.$_GET['visit'].'&tab=notes&r='.$note['id'].'"><i class="icon-bin"></i></a></li>
							</ul>
						</div>
						
					</div>
											
				</td>
	
			</tr>';
			}
		}
		?>

		</tbody>
	</table>
</div>

</div>
<!-- Modal -->
<?php }?>
<div id="modal_notes" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add notes</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<form  method="post" action="?visit=<?php echo $visit_id;?>&tab=notes"">
				<div class="modal-body">
                    <input hidden name="add-note">
					<div class="form-group">
						<textarea class="form-control" rows="8" name="notes" title="notes"></textarea>
					</div>

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					<button type="submit" class="btn bg-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>