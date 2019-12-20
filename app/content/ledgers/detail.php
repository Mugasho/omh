<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/19/2019
 * Time: 8:32 PM
 */

$db           = new \omh\database\DB();
$staff        = $this->getPageVars();
$ledger       = $this->getPageVars2();
$transactions = $db->getLedgerTransactions();
$fees         = $db->getLedgerFees();
$profile_pic  = ! empty( $staff['profile_pic'] ) ? 'uploads/' . $staff['profile_pic'] : 'images/users/user.png';
$balance      = 0;
$total_debit  = 0;
$total_credit = 0;
for ( $i = 0; $i < count( $transactions ); $i ++ ) {
	$feeType                          = $db->getLedgerFeeByID( $transactions[ $i ]['t_type'] );
	$balance                          = $feeType['fee_action'] == '0' ? $balance + $transactions[ $i ]['t_amount'] :
		$balance - $transactions[ $i ]['t_amount'];
	$transactions[ $i ]['balance']    = $balance;
	$transactions[ $i ]['fee_action'] = $feeType['fee_action'];
	$transactions[ $i ]['ledger_fee'] = $feeType['ledger_fee'];
}

$db->updateStaffLedgerBalance( $ledger['id'], $balance );
$transactions = ! empty( $transactions ) ? array_reverse( $transactions ) : null;
?>

<div class="card-group mb-sm-2">
    <div class="card bg-light">
        <ul class="media-list media-list-linked">
            <li>
                <a href="<?php echo CONTENT_PATH . $profile_pic ?>" class="media">
                    <div class="mr-3">
                        <img src="<?php echo CONTENT_PATH . $profile_pic ?>" class="rounded-circle" width="100"
                             height="100" alt="">
                    </div>
                    <div class="media-body">
                        <br>
                        <div class="media-title font-size-lg font-weight-semibold"><?php echo $staff['first_name'] . ' ' . $staff['surname'] . ' ' . $staff['other_names']; ?></div>
                        <span class="text-muted font-size-lg">Staff</span>
                    </div>
                </a>
            </li>
        </ul>

    </div>
    <div class="card">

        <table class="table table-borderless table-xs my-2">
            <tbody>
            <tr>
                <td><i class="icon-phone mr-2"></i> Phone:</td>
                <td class="text-right"><a href="#"><?php echo $staff['phone']; ?></a>
                </td>
            </tr>

            <tr>
                <td><i class="icon-map mr-2"></i> Address:</td>
                <td class="text-right"><a href="#"><?php echo $staff['address']; ?></a>
                </td>
            </tr>

            </tbody>
        </table>
        <div class="card-footer d-flex justify-content-between">
            <strong><span class="text-muted">LEDGER NO</span></strong>
            <strong><span class="card-text"><?php echo $ledger['ledger_no']; ?></span></strong>
        </div>
    </div>
    <div class="card">

        <table class="table table-borderless table-xs my-2">
            <tbody>
            <tr>
                <td><i class="icon-map mr-2"></i> Address:</td>
                <td class="text-right"><a href="#"><?php echo $staff['address']; ?></a>
                </td>
            </tr>
            <tr>
                <td><i class="icon-mail-read mr-2"></i> Email:</td>
                <td class="text-right">
					<?php echo $staff['email']; ?>
                </td>
            </tr>

            </tbody>
        </table>
        <div class="card-footer d-flex justify-content-between">
            <strong><span class="text-muted">CURRENT BALANCE</span></strong>
            <strong><span class="card-text"> UGX <?php echo $balance; ?></span></strong>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header d-print-none">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modal_form_vertical"><i class="icon-add"></i>
            Add New
        </button>
        <button class="btn bg-teal-400" onclick="window.print()"><i
                    class="icon-file-pdf"></i> Export to PDF
        </button>
    </div>
    <div class="table-responsive">
        <table class="table text-nowrap">
            <thead>
            <tr>
                <th>Date</th>
                <th>Transaction</th>
                <th>Description</th>
                <th>Staff</th>
                <th>Credit</th>
                <th>Debit</th>
                <th>Balance</th>
                <th class="text-center d-print-none" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
            </tr>
            </thead>
            <tbody>
			<?php if ( ! empty( $transactions ) ) {
				$total_credit = 0;
				$total_debit  = 0;
				foreach ( $transactions as $transaction ) {
					$credit       = $transaction['fee_action'] == '0' ? $transaction['t_amount'] : '';
					$debit        = $transaction['fee_action'] == '0' ? '' : $transaction['t_amount'];
					$total_credit = $total_credit + $credit;
					$total_debit  = $total_debit + $debit;
					echo '
	                 <tr>
	                <td>' . date( 'd-m-Y', strtotime( $transaction['t_date'] ) ) . ' <br><span class="text-muted">' . $transaction['t_time'] . '</span></td>
	                <td>
	                    <span class="font-weight-semibold">' . $transaction['ledger_fee'] . '</span>
	                </td>
	                <td>' . $transaction['t_notes'] . '</td>
	                <td>
	                    <a href="#">John Doe</a>
	                </td>
	                <td>' . $credit . '</td>
	                <td>' . $debit . '</td>
	                <td><span class="mb-0 font-weight-semibold">UGX ' . $transaction['balance'] . '</span></td>
	                <td class="text-center d-print-none">
	                    <div class="list-icons">
	                        <div class="list-icons-item dropdown">
	                            <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
	                            <div class="dropdown-menu dropdown-menu-right">
	                                <a href="?post=' . $transaction['id'] . '&action=trash" class="dropdown-item"><i class="icon-bin"></i> Delete</a>
	                                <div class="dropdown-divider"></div>
	                                <a href="?post=' . $transaction['id'] . '&action=report" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
	                            </div>
	                        </div>
	                    </div>
	                </td>
	            </tr>
	                ';

				}
			} ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><span class="mb-0 font-weight-semibold">Total</span></td>
                <td><span class="mb-0 font-weight-semibold">UGX <?php echo $total_credit; ?></span></td>
                <td><span class="mb-0 font-weight-semibold">UGX <?php echo $total_debit; ?></span></td>
                <td><span class="mb-0 font-weight-semibold">UGX <?php echo $balance; ?></span></td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>


<!-- Modal -->

<div id="modal_form_vertical" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Transaction for <?php echo $staff['surname']; ?></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Amount</label>
                                <input type="number" placeholder="Amount" class="form-control" name="t_amount" required>
                            </div>
                            <div class="col-sm-6">
                                <label>Type</label>
                                <select class="form-control" name="t_type">
									<?php foreach ( $fees as $fee ) {
										echo '<option value="' . $fee['id'] . '">' . $fee['ledger_fee'] . '</option>';
									} ?>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Date</label>
                                <input class="form-control date-picker" name="t_date"
                                       value="<?php echo date( 'd-m-Y' ); ?>">
                            </div>

                            <div class="col-sm-6">
                                <label>Time</label>
                                <input class="form-control pickatime" name="t_time"
                                       value="<?php echo date( "H:i" ); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Notes</label>
                        <textarea class="form-control" rows="4" name="t_notes"></textarea>
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