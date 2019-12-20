<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/10/2019
 * Time: 11:57 AM
 */
?>
<script>
    function timeout() {
        if (!$.sessionTimeout) {
            console.warn('Warning - session_timeout.min.js is not loaded.');
            return;
        }

        // Session timeout
        $.sessionTimeout({
            heading: 'h5',
            title: 'Session Timeout',
            message: 'Your session is about to expire. Do you want to stay connected?',
            ignoreUserActivity: true,
            warnAfter: 600000, //10 minutes
            redirAfter: 900000, //15 minutes
            keepAliveUrl: '/',
            redirUrl: '<?php echo BASE_PATH?>logout/',
            logoutUrl: '<?php echo BASE_PATH?>logout/'
        });
    }
    timeout();
</script>
<!-- Footer -->
<div class="navbar navbar-expand-lg navbar-light d-print-none">
    <div class="text-center">
        <span class="navbar-text">
						&copy; <?php if ( ! empty( $this->getDateFounded() ) ) {
                echo $this->getDateFounded() . ' - ';
            } ?><?php echo date( "Y" ); ?> <a href="#"><?php echo $this->getCompany(); ?></a>
					</span>
    </div>

</div>
<!-- /footer -->
