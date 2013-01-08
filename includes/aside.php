
        <aside id="Just_A_Random_ID">
		
		
			<?php 
			if (logged_in()) {
				include 'includes/widgets/loggedin.php';
				include 'includes/widgets/globalstats.php';
			} else {
				include 'includes/widgets/login.php';
			}
			?>
		</aside>