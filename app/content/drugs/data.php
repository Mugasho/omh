<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/30/2019
 * Time: 5:23 AM
 */

$db          = new omh\database\DB();
$next_id     = null;
$search      = null;
$current     = isset( $_GET['p'] ) ? filter_input( INPUT_GET, 's', FILTER_SANITIZE_NUMBER_INT ) : 1;
$limit       = isset( $_GET['limit'] ) ? $_GET['limit'] : 25;
$search['s'] = isset( $_GET['s'] ) ?
	filter_input( INPUT_GET, 's', FILTER_SANITIZE_STRING ) : null;
$search['l'] = isset( $_GET['origin'] ) ?
	filter_input( INPUT_GET, 'origin', FILTER_SANITIZE_STRING ) : null;
$search['c'] = isset( $_GET['company'] ) ?
	filter_input( INPUT_GET, 'company', FILTER_SANITIZE_STRING ) : null;

$pages = round( $db->countDrugs( $search ) / $limit, 0 );
$drugs = array();

$countries = $db->countDistinctCountry();
$companies = $db->countDistinctCompany();
if ( ! is_null( $pages ) ) {

	$start   = $current < 5 ? 1 : $current - 4;
	$last    = ( $current + 4 ) > $pages ? $pages : $current + 4;
	$next_id = ( ( $current - 1 ) * $limit );
	$drugs   = $db->getAllDrugs( $limit, $next_id, $search );


}

sort( $countries, SORT_ASC );
?>

<!-- Inner container -->
<div class="d-md-flex align-items-md-start">

    <!-- Left sidebar component -->
    <div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-left border-0 shadow-0 sidebar-expand-md">

        <!-- Sidebar content -->
        <div class="sidebar-content">

            <!-- Filter -->
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <span class="text-uppercase font-size-sm font-weight-semibold">Filter</span>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form>
                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="search" class="form-control" value="<?php echo $search['s'];?>" name="s" placeholder="Drug title">
                            <div class="form-control-feedback">
                                <i class="icon-reading text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="search" class="form-control" value="<?php echo $search['l'];?>" name="origin" placeholder="Country of Origin">
                            <div class="form-control-feedback">
                                <i class="icon-pin-alt text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="search" class="form-control" value="<?php echo $search['c'];?>" name="company" placeholder="Company">
                            <div class="form-control-feedback">
                                <i class="icon-cart text-muted"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn bg-blue btn-block">
                            <i class="icon-search4 font-size-base mr-2"></i>
                            Find Drugs
                        </button>
                    </form>
                </div>
            </div>
            <!-- /filter -->

            <!-- Company -->
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <span class="text-uppercase font-size-sm font-weight-semibold">Company</span>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>

                <form action="#">
                    <div class="card-body">
                        <div class="form-group"><?php
							for ( $i = count( $companies ) - 10; $i < count( $companies ); $i ++ ) {
								if ( ! empty( $companies[ $i ]['local_technical_representative'] ) ) {
									$company = $companies[ $i ]['local_technical_representative'];
									echo '
                              <div class="form-check">
								<label class="form-check-label">
									<input type="radio" name="company" onclick="search_page(\'company\',\'' . $company . '\')" class="form-input-styled" data-fouc>
									' . $companies[ $i ]['local_technical_representative'] . '
									<span class="text-muted font-size-sm ml-1">(' . $companies[ $i ]['count'] . ')</span>
								</label>
							</div>
                              ';
								}
							}
							?>
                        </div>
                    </div>

                    <div class="card-footer text-center p-0">
                        <a href="#" class="d-block p-2" onclick="search_page('company','')">All companies <?php echo '(' . count( $companies ) . ')';?></a>
                    </div>
                </form>
            </div>
            <!-- /company -->

            <!-- Date posted -->
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <span class="text-uppercase font-size-sm font-weight-semibold">Country of Origin</span>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="#">
                        <div class="form-group"><?php
							echo '
                            <div class="form-check">
								<label class="form-check-label">
									<input type="radio" name="origin" onclick="search_page(\'origin\',\'\')" class="form-input-styled" data-fouc>
									All countries
									<span class="text-muted font-size-sm ml-1">(' . count( $countries ) . ')</span>
								</label>
							</div>
                            ';
							for ( $i = count( $countries ) - 10; $i < count( $countries ); $i ++ ) {
								if ( ! empty( $countries ) ) {
									$country = $countries[ $i ]['country_of_manufacture'];

									echo '
                              <div class="form-check">
								<label class="form-check-label">
									<input type="radio" name="origin" onclick="search_page(\'origin\',\'' . $country . '\')" class="form-input-styled" data-fouc>
									' . $countries[ $i ]['country_of_manufacture'] . '
									<span class="text-muted font-size-sm ml-1">(' . $countries[ $i ]['count'] . ')</span>
								</label>
							</div>
                              ';
								}
							}
							?>


                        </div>
                    </form>
                </div>

                <div class="card-footer text-center p-0">
                    <a href="#" onclick="search_page('origin','')" class="d-block p-2">All countries</a>
                </div>
            </div>
            <!-- /date posted -->


        </div>
        <!-- /sidebar content -->

    </div>
    <!-- /left sidebar component -->


    <!-- Right content -->
    <div class="flex-fill overflow-auto">

        <!-- List layout -->
        <div class="card">
            <div class="card-header bg-white header-elements-inline">
                <h6 class="card-title">Drug search</h6>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <ul class="media-list">
				<?php for ( $i = 0; $i < count( $drugs ); $i ++ ) {
					echo '
					<li class="media card-body flex-column flex-sm-row">
					<div class="mr-sm-3 mb-2 mb-sm-0">
						<a href="#">
							<img src="'.CONTENT_PATH.'images/medicine.png" class="rounded" width="44" height="44" alt="">
						</a>
					</div>

					<div class="media-body">
						<h6 class="media-title font-weight-semibold">
							<a href="' . $drugs[ $i ]['id'] . '/">' . $drugs[ $i ]['name_of_drug'] . '</a>
						</h6>

						<ul class="list-inline list-inline-dotted text-muted mb-2">
							<li class="list-inline-item"><a href="#" class="text-muted">' . $drugs[ $i ]['generic_name_of_drug'] . ' (' . $drugs[ $i ]['dosage_form'] . ')</a></li>
							<li class="list-inline-item">' . $drugs[ $i ]['country_of_manufacture'] . '</li>
						</ul>
						' . $drugs[ $i ]['local_technical_representative'] . '
					</div>

					<div class="ml-sm-3 mt-2 mt-sm-0">
						<span class="badge bg-blue">' . $db->limitChars( $drugs[ $i ]['strength_of_drug'], 30 ) . '</span>
					</div>
				</li>';
				} ?>
            </ul>
        </div>
        <!-- /list layout -->


        <!-- Pagination -->
        <div class="d-flex justify-content-center pt-3 mb-3">
            <ul class="pagination">
                <li class="page-item">
                    <button <?php echo 'onclick="search_page(\'p\',1)"'; ?> class="page-link"><i
                                class="icon-arrow-small-right"></i></button>
                </li>
				<?php for ( $i = $start; $i <= $last; $i ++ ) {
					$status = $i == $current ? 'active' : '';
					echo '<li class="page-item  ' . $status . '"><button onclick="search_page(\'p\',' . $i . ')" class="page-link">' . $i . '</button></li>';
				}; ?>
                <li class="page-item">
                    <button <?php echo 'onclick="search_page(\'p\',' . $pages . ')"'; ?> class="page-link"><i
                                class="icon-arrow-small-left"></i></button>
                </li>
            </ul>
        </div>
        <!-- /pagination -->

    </div>
    <!-- /right content -->

</div>
<!-- /inner container -->

<script>
    function search_page(param, value) {
        var searchParams = new URLSearchParams(window.location.search);
        searchParams.set(param, value)
        var newParams = searchParams.toString()
        window.location.href = window.location.href.split('?')[0] + '?' + newParams;
    }

    function search_input(param, value) {
        if (event.keyCode === 13) {
            search_page(param, value)
        }
    }
</script>


