<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/17/2019
 * Time: 12:05 PM
 */

$activeTab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'visits';
$db=new \omh\database\DB();
$patient   = $this->getPageVars();
$visits=count($db->getVisits($this->getPageVars2()));
$visit_id=filter_input(INPUT_GET,'visit',FILTER_SANITIZE_NUMBER_INT);
$visit=!empty($visit_id)?$db->getVisitByID($visit_id):null;
$utils=new \omh\utils\Utils();
$countries=$utils->get_countries();
?>

<!-- Inner container -->
<div class="d-flex align-items-start flex-column flex-md-row">

    <!-- Left content -->
    <div class="tab-content w-100 overflow-auto order-2 order-md-1">

        <div class="tab-pane fade<?php echo $this->getTab( 'visits', $activeTab ); ?>" id="visits">
			<?php require_once 'visits.php'; ?></div><?php
        if(!empty($visit_id) && !is_null($visit)){?>

        <div class="tab-pane fade<?php echo $this->getTab( 'notes', $activeTab ); ?>" id="notes">
		    <?php require_once 'notes.php'; ?></div>

            <div class="tab-pane fade<?php echo $this->getTab( 'files', $activeTab ); ?>" id="files">
		        <?php require_once 'files.php'; ?></div>
        <div class="tab-pane fade<?php echo $this->getTab( 'lab_requests', $activeTab ); ?>" id="lab_requests"><?php
			require_once 'lab_requests.php'; ?></div>
            <div class="tab-pane fade<?php echo $this->getTab( 'prescription', $activeTab ); ?>" id="prescription">
		        <?php require_once 'prescription.php'; ?></div><?php }?>
        <div class="tab-pane fade<?php echo $this->getTab( 'edit', $activeTab ); ?>" id="edit"><?php
		    require_once 'edit.php'; ?></div>
    </div>
    <!-- /left content -->


    <!-- Right sidebar component -->
    <div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right wmin-300 border-0 shadow-0 order-1 order-md-2 sidebar-expand-md">

        <!-- Sidebar content -->
        <div class="sidebar-content">

            <!-- Navigation -->
            <div class="card">
                <div class="card-header bg-transparent text-center">
                    <div class="card-img-actions d-inline-block mb-3">
                        <img class="img-fluid rounded-circle"
                             src="<?php echo CONTENT_PATH . 'uploads/' . $patient['profile_pic']; ?>" width="150" height="150"
                             alt="">
                        <div class="card-img-actions-overlay card-img rounded-circle">
                            <a href="<?php echo CONTENT_PATH . 'uploads/' . $patient['profile_pic']; ?>" data-popup="lightbox"
                               class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
                                <i class="icon-plus3"></i>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="card-body p-0">

                    <table class="table table-borderless table-xs my-2">
                        <tbody>
                        <tr>
                            <td><i class="icon-address-book mr-2"></i> Names:</td>
                            <td class="text-right"><a
                                        href="#"><?php echo $patient['first_name'] . ' ' . $patient['last_name'] ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td><i class="icon-user-lock mr-2"></i> Patient ID:</td>
                            <td class="text-right"><a
                                        href="#"><?php echo $patient['id'];?></a>
                            </td>
                        </tr>
                        <tr>
                            <td><i class="icon-circles2 mr-2"></i> Priority:</td>
                            <td class="text-right">
                                <div class="btn-group">
                                    <a href="#" class="badge bg-info dropdown-toggle" data-toggle="dropdown">High
                                        priority</a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item"><span
                                                    class="badge badge-mark mr-2 bg-danger border-danger"></span>
                                            Blocker</a>
                                        <a href="#" class="dropdown-item active"><span
                                                    class="badge badge-mark mr-2 bg-orange border-orange"></span> High
                                            priority</a>
                                        <a href="#" class="dropdown-item"><span
                                                    class="badge badge-mark mr-2 bg-success border-success"></span>
                                            Normal priority</a>
                                        <a href="#" class="dropdown-item"><span
                                                    class="badge badge-mark mr-2 bg-grey-300 border-grey-300"></span>
                                            Low priority</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><i class="icon-history mr-2"></i> Age:</td>
                            <td class="text-right">29</td>
                        </tr>
                        <tr>
                            <td><i class="icon-calendar mr-2"></i> Visits:</td>
                            <td class="text-right"><?php echo count($visits);?></td>
                        </tr>
                        <tr>
                            <td><i class="icon-pin mr-2"></i> Location:</td>
                            <td class="text-right"><?php echo $patient['city'];?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
        <!-- /sidebar content -->

    </div>
    <!-- /right sidebar component -->

</div>
<!-- /inner container -->
