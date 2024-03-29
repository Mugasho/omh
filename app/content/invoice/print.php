<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/12/2019
 * Time: 11:44 AM
 */

?>


<div class="card">
	<div class="card-header bg-transparent header-elements-inline d-print-none" id="invoice-header">
		<h6 class="card-title">Static invoice</h6>
		<div class="header-elements">
			<button type="button" class="btn btn-light btn-sm ml-3" onclick="window.print();"><i class="icon-printer mr-2"></i> Print</button>
		</div>
	</div>

	<div class="card-body">
		<div class="row">
			<div class="col-sm-6">
				<div class="mb-4">
					<img src="../../../../global_assets/images/logo_demo.png" class="mb-3 mt-2" alt="" style="width: 120px;">
					<ul class="list list-unstyled mb-0">
						<li>2269 Elba Lane</li>
						<li>Paris, France</li>
						<li>888-555-2311</li>
					</ul>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="mb-4">
					<div class="text-sm-right">
						<h4 class="text-primary mb-2 mt-md-2">Invoice #49029</h4>
						<ul class="list list-unstyled mb-0">
							<li>Date: <span class="font-weight-semibold">January 12, 2015</span></li>
							<li>Due date: <span class="font-weight-semibold">May 12, 2015</span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="d-md-flex flex-md-wrap">
			<div class="mb-4 mb-md-2">
				<span class="text-muted">Invoice To:</span>
				<ul class="list list-unstyled mb-0">
					<li><h5 class="my-2">Rebecca Manes</h5></li>
					<li><span class="font-weight-semibold">Normand axis LTD</span></li>
					<li>3 Goodman Street</li>
					<li>London E1 8BF</li>
					<li>United Kingdom</li>
					<li>888-555-2311</li>
					<li><a href="#">rebecca@normandaxis.ltd</a></li>
				</ul>
			</div>

			<div class="mb-2 ml-auto">
				<span class="text-muted">Payment Details:</span>
				<div class="d-flex flex-wrap wmin-md-400">
					<ul class="list list-unstyled mb-0">
						<li><h5 class="my-2">Total Due:</h5></li>
						<li>Bank name:</li>
						<li>Country:</li>
						<li>City:</li>
						<li>Address:</li>
						<li>IBAN:</li>
						<li>SWIFT code:</li>
					</ul>

					<ul class="list list-unstyled text-right mb-0 ml-auto">
						<li><h5 class="font-weight-semibold my-2">$8,750</h5></li>
						<li><span class="font-weight-semibold">Profit Bank Europe</span></li>
						<li>United Kingdom</li>
						<li>London E1 8BF</li>
						<li>3 Goodman Street</li>
						<li><span class="font-weight-semibold">KFH37784028476740</span></li>
						<li><span class="font-weight-semibold">BPT4E</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="table-responsive">
		<table class="table table-lg">
			<thead>
			<tr>
				<th>Description</th>
				<th>Rate</th>
				<th>Hours</th>
				<th>Total</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>
					<h6 class="mb-0">Create UI design model</h6>
					<span class="text-muted">One morning, when Gregor Samsa woke from troubled.</span>
				</td>
				<td>$70</td>
				<td>57</td>
				<td><span class="font-weight-semibold">$3,990</span></td>
			</tr>
			<tr>
				<td>
					<h6 class="mb-0">Support tickets list doesn't support commas</h6>
					<span class="text-muted">I'd have gone up to the boss and told him just what i think.</span>
				</td>
				<td>$70</td>
				<td>12</td>
				<td><span class="font-weight-semibold">$840</span></td>
			</tr>
			<tr>
				<td>
					<h6 class="mb-0">Fix website issues on mobile</h6>
					<span class="text-muted">I am so happy, my dear friend, so absorbed in the exquisite.</span>
				</td>
				<td>$70</td>
				<td>31</td>
				<td><span class="font-weight-semibold">$2,170</span></td>
			</tr>
			</tbody>
		</table>
	</div>

	<div class="card-body">
		<div class="d-md-flex flex-md-wrap">
			<div class="pt-2 mb-3">
				<h6 class="mb-3">Authorized person</h6>
				<div class="mb-3">
					<img src="../../../../global_assets/images/signature.png" width="150" alt="">
				</div>

				<ul class="list-unstyled text-muted">
					<li>Eugene Kopyov</li>
					<li>2269 Elba Lane</li>
					<li>Paris, France</li>
					<li>888-555-2311</li>
				</ul>
			</div>

			<div class="pt-2 mb-3 wmin-md-400 ml-auto">
				<h6 class="mb-3">Total due</h6>
				<div class="table-responsive">
					<table class="table">
						<tbody>
						<tr>
							<th>Subtotal:</th>
							<td class="text-right">$7,000</td>
						</tr>
						<tr>
							<th>Tax: <span class="font-weight-normal">(25%)</span></th>
							<td class="text-right">$1,750</td>
						</tr>
						<tr>
							<th>Total:</th>
							<td class="text-right text-primary"><h5 class="font-weight-semibold">$8,750</h5></td>
						</tr>
						</tbody>
					</table>
				</div>

				<div class="text-right mt-3 d-print-none">
					<button type="button" class="btn btn-primary btn-labeled btn-labeled-left"><b><i class="icon-paperplane"></i></b> Send invoice</button>
				</div>
			</div>
		</div>
	</div>

	<div class="card-footer">
		<span class="text-muted">Thank you for using Limitless. This invoice can be paid via PayPal, Bank transfer, Skrill or Payoneer. Payment is due within 30 days from the date of delivery. Late payment is possible, but with with a fee of 10% per month. Company registered in England and Wales #6893003, registered office: 3 Goodman Street, London E1 8BF, United Kingdom. Phone number: 888-555-2311</span>
	</div>
</div>
