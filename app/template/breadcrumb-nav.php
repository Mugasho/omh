<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/17/2019
 * Time: 12:26 PM
 */
$activeTab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'visits';
$db=new \omh\database\DB();
$visits=!empty($db->getVisits($this->getPageVars2()))?count($db->getVisits($this->getPageVars2())):0;
$visit_id=filter_input(INPUT_GET,'visit',FILTER_SANITIZE_NUMBER_INT);
$visit=!empty($visit_id)?$db->getVisitByID($visit_id):null;
?>
<div class="navbar navbar-expand-lg navbar-light bg-light d-print-none">
	<div class="text-center d-lg-none w-100">
		<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-second">
			<i class="icon-menu7 mr-2"></i>
			Profile navigation
		</button>
	</div>

	<div class="navbar-collapse collapse" id="navbar-second">
		<ul class="nav navbar-nav">

            <li class="nav-item">
                <a  onclick="search_page('tab','visits')" class="navbar-nav-link<?php echo $this->getTab('visits',$activeTab); ?>">
                    <i class="icon-calendar3 mr-2"></i>
                    Patient Visits
                    <?php if($visits>0){
                       echo '<span class="badge badge-pill bg-success position-static ml-auto ml-lg-2">'.$visits.'</span>';
                    }?>

                </a>
            </li>

            <?php if(!empty($visit_id)  && !is_null($visit)){?>

            <li class="nav-item">
                <a onclick="search_page('tab','notes')" class="navbar-nav-link<?php echo $this->getTab('notes',$activeTab); ?>">
                    <i class="icon-stack-text mr-2"></i>
                    Notes
                </a>
            </li>

                <li class="nav-item">
                    <a  onclick="search_page('tab','lab_requests')" class="navbar-nav-link<?php echo $this->getTab('lab_requests',$activeTab); ?>">
                        <i class="icon-lab mr-2"></i>
                        Lab Requests
                    </a>
                </li>
                <li class="nav-item">
                    <a onclick="search_page('tab','prescription')" class="navbar-nav-link<?php echo $this->getTab('prescription',$activeTab); ?>">
                        <i class="icon-cart-add mr-2"></i>
                        Prescription
                    </a>
                </li>
            <li class="nav-item">
                <a  onclick="search_page('tab','files')" class="navbar-nav-link<?php echo $this->getTab('files',$activeTab); ?>">
                    <i class="icon-images3 mr-2"></i>
                    Files
                </a>
            </li>
            <?php } ?>
			<li class="nav-item">
				<a  onclick="search_page('tab','edit')" class="navbar-nav-link<?php echo $this->getTab('edit',$activeTab); ?>">
					<i class="icon-pencil mr-2"></i>
					Edit Details
				</a>
			</li>
		</ul>

		<ul class="navbar-nav ml-lg-auto">

			<li class="nav-item">
				<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
					<i class="icon-gear"></i>
					<span class="d-lg-none ml-2">Settings</span>
				</a>

				<div class="dropdown-menu dropdown-menu-right">
					<a href="#" class="dropdown-item"><i class="icon-image2"></i> Update cover</a>
					<a href="#" class="dropdown-item"><i class="icon-clippy"></i> Update info</a>
					<a href="#" class="dropdown-item"><i class="icon-make-group"></i> Manage sections</a>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item"><i class="icon-three-bars"></i> Activity log</a>
					<a href="#" class="dropdown-item"><i class="icon-cog5"></i> Profile settings</a>
				</div>
			</li>
		</ul>
	</div>

</div>
