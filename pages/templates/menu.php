<ul class="nav">
	<li role="presentation"><span style="font-size: 125%;">
		<?php echo utility\htmlTags::href('index.php', 'Home'); ?>
	</span></li>
	
	<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
	
	<li role="presentation"><span style="font-size: 125%;">
		<?php echo utility\htmlTags::href('index.php?page=tasks&action=all', 'Show all Tasks'); ?>
	</span></li>
	
	<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
	
	<li role="presentation"><span style="font-size: 125%;">
		<?php echo utility\htmlTags::href('index.php?page=accounts&action=all', 'Show all Accounts'); ?>
	</span></li>
	
	<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
	
	<li role="presentation"><span style="font-size: 125%;">
		<?php echo utility\htmlTags::href('index.php?page=accounts&action=logout', 'Logout'); ?>
	</span></li>
	
	<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
</ul>

<?php echo utility\htmlTags::lineBreak(); ?>