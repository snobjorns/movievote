
        <aside id="Just_A_Random_ID">
		
		
			<?php 
			if (logged_in()) {
				include 'includes/widgets/loggedin.php';
				if (is_admin()){
					include 'includes/widgets/admin_pane.php';
				}
				include 'includes/widgets/globalstats.php';

				include 'includes/widgets/door_status.php';
			} else {
				include 'includes/widgets/login.php';
			}
			?>
		</aside>
