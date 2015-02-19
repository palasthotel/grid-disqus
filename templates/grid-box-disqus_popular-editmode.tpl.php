<?php 
/**
 * @author Palasthotel by Edward <eb@palasthotel.de>
 * @copyright Copyright (c) 2015, Palasthotel
 * @license http://www.gnu.org/licenses/gpl-2.0.html GPLv2
 * @package Palasthotel\Grid-Disqus-Boxes
 */
?>
<div class="grid-box-editmode">
	
	<?php
	if ($this->title!=""){
		echo '<h2 class="b-title">'.$this->title.'</h2>';
	}
	?>
	<div>Popular Disqus:<?php
	echo ( $content->limit != 5 )? "<br>Limit: ".$content->limit: "";
	echo ( $content->forum != "" )? "<br>Forum: ".$content->forum: "";
	?></div>
</div>

