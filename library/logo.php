<div class="cell mp_<?php echo $mpostion[0];?>">
     <div class="cell_pad">
     		<?php if($logoImageSwitch) { ?>
            <div class="sparky_logo_image"><a href="index.php"><img src="<?php echo $template_path."/images/".$logoImageFile; ?>" alt="<?php echo $logoImageAlt; ?>" /></a></div>
			<?php }else{ ?>
            <div class="sparky_logo"><a href="index.php"><?php echo $logoText; ?></a></div>
            <div class="sparky_slogan"><?php echo $sloganText; ?></div>
            <?php } ?>
     </div>
</div>