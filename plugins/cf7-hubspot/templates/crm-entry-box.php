<?php
	if( ! defined( 'ABSPATH' ) ){
		exit;
	}
	$comments = false;
	if( is_array( $log_entry ) && count( $log_entry ) > 0 ){
		$log      = $this->verify_log( $log_entry );
		$comments = true;
		echo $this->format_log_msg( $log );
	}
	if( isset( $_GET['vx_debug'] ) ){
		?>
      <input type="hidden" name="vx_debug" value="<?php echo $_GET['vx_debug'] ?>">
		<?php
	}
?>
<div class="box_btns_div">
  <button class="button" type="submit" name="<?php echo $this->id ?>_send_btn" value="yes"><?php echo __( "Send to Hubspot", 'contact-form-hubspot-crm' ) ?></button>
	<?php
		if( $comments ){
			?>
          <a href="<?php echo $log_url ?>" class="button"><?php echo __( "Go to Logs", 'contact-form-hubspot-crm' ) ?></a>
			<?php
		}
	?>
</div>