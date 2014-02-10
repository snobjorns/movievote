<?php
?>

<div class="widget">
<h2>Sef Door is</h2>

<div class = "inner" >
<h3>
<?php 
echo  substr(@readfile('door/doorstatus.txt'),0,-1) ;
?>
</h3>
</div>


</div>
