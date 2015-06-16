<script type="text/javascript">

jQuery(function() {
	jQuery('.sparky_full').first().css('display','none')
								  .css('color', '<?php echo $topPanelTextColor; ?>')
								  .find('h3').css('color', '<?php echo $topPanelH3Color; ?>');
	
	jQuery('.sparky_top_panel_button').on('click', function(){	
		jQuery('.sparky_full').first().css('background', '<?php echo $topPanelBgColor; ?>').slideToggle('fast');
		jQuery('.open_button').toggle();
		jQuery('.close_button').toggle();
	})
	
});

</script>

<div class="sparky_top_panel_container">
	<div class="sparky_top_panel_button">
    	<span class="open_button"><?php echo $topPanelOpen; ?></span>
        <div class="close_button"><?php echo $topPanelClose; ?></div>
    </div>
</div>