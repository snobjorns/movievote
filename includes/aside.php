
        <aside id="Just_A_Random_ID">
		
		
			<?php 
			if (logged_in()) {
				include 'includes/widgets/loggedin.php';
				if (in_array($user_data['uname'], $admins)){
					include 'includes/widgets/admin_pane.php';
				}
				include 'includes/widgets/globalstats.php';

			} else {
				include 'includes/widgets/login.php';
			}
			?>
		</aside>