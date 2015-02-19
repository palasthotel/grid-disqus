<?php 
/**
 * @author Palasthotel by Edward <eb@palasthotel.de>
 * @copyright Copyright (c) 2015, Palasthotel
 * @license http://www.gnu.org/licenses/gpl-2.0.html GPLv2
 * @package Palasthotel\Grid-Disqus-Boxes
 */
?>
<div class="grid-box box<?php echo ($this->style)? " ".$this->style." ": " "; echo implode($this->classes," ")?>">
	<?php
	if ($this->title!=""){

		if ($this->titleurl !=""){
		?>
			<h2 class="b-title"><a href="<?php echo $this->titleurl?>"><?php echo $this->title?></a></h2>
		<?php }else{?>
			<h2 class="b-title"><?php echo $this->title?></h2>
		<?php }?>
	<?php }?>
	<div class="b-prolog">
		<?php echo $this->prolog?>
	</div>
	
	<ol class="disqus-most-comments">
		<?php
		foreach ($content->items as $item) {
			?>
			<li data-comments-count="<?php echo $item->postsInInterval; ?>">
				<a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
			</li>
			<?php
		}
		?>
	</ol>

	<div class="b-epilog">
		<?php echo $this->epilog?>
	</div>
  	<?php
	if ($this->readmore!=""){?>
	<a href="<?php echo $this->readmoreurl?>" class="b-readmore-link"><?php echo $this->readmore?></a>
	<?php }?>
	
</div>
