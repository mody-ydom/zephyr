<?php
	if( ! defined( 'ABSPATH' ) ){
		exit;
	} ?>
<div class="crm_fields_table">
  <div class="crm_field">
    <div class="crm_field_cell1"><label for="vx_name"><?php _e( "Account Name", 'contact-form-hubspot-crm' ); ?></label>
    </div>
    <div class="crm_field_cell2">
      <input type="text" name="crm[name]" value="<?php echo ! empty( $name ) ? $name : 'Account #' . $id; ?>" id="vx_name" class="crm_text">
    
    </div>
    <div class="clear"></div>
  </div>
  <div class="crm_field">
    <div class="crm_field_cell1"><label for="vx_api"><?php _e( "Integration Method", 'contact-form-hubspot-crm' ); ?></label>
    </div>
    <div class="crm_field_cell2">
      <label for="vx_api"><input type="radio" name="crm[api]" value="api" id="vx_api" class="vx_tabs_radio" <?php if( $this->post( 'api', $info ) != "web" ){
			  echo 'checked="checked"';
		  } ?>> <?php _e( 'OAuth 2.0 ', 'contact-form-hubspot-crm' );
			  $this->tooltip( 'vx_oauth' ); ?></label>
      <label for="vx_web" style="margin-left: 15px;"><input type="radio" name="crm[api]" value="web" id="vx_web" class="vx_tabs_radio" <?php if( $this->post( 'api', $info ) == "web" ){
			  echo 'checked="checked"';
		  } ?>> <?php _e( 'API Key ', 'contact-form-hubspot-crm' );
			  $this->tooltip( 'vx_api' ); ?></label>
    </div>
    <div class="clear"></div>
  </div>
  <div class="vx_tabs" id="tab_vx_web" style="<?php if( $this->post( 'api', $info ) != "web" ){
	  echo 'display:none';
  } ?>">
    <div class="crm_field">
      <div class="crm_field_cell1"><label for="org_id"><?php _e( 'HubSpot API Key', 'contact-form-hubspot-crm' ); ?></label></div>
      <div class="crm_field_cell2">
        <div class="vx_tr">
          <div class="vx_td">
            <input type="password" id="org_id" name="crm[api_key]" class="crm_text" placeholder="<?php _e( 'HubSpot API Key', 'contact-form-hubspot-crm' ); ?>"
                   value="<?php esc_html_e( $this->post( 'api_key', $info ) ); ?>">
          </div>
          <div class="vx_td2">
            <a href="#" class="button vx_toggle_btn vx_toggle_key" title="<?php _e( 'Toggle Key', 'contact-form-hubspot-crm' ); ?>"><?php _e( 'Show Key', 'contact-form-hubspot-crm' ) ?></a>
          </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  
  </div>
  <div class="vx_tabs" id="tab_vx_api" style="<?php if( $this->post( 'api', $info ) == "web" ){
	  echo 'display:none';
  } ?>">
    
    <div class="crm_field">
      <div class="crm_field_cell1"><label><?php _e( 'HubSpot Access', 'contact-form-hubspot-crm' ); ?></label></div>
      <div class="crm_field_cell2">
		  <?php if( isset( $info['access_token'] ) && $info['access_token'] != "" ){
			  $code = 'HubSpot';
			  if( ! empty( $info['portal_id'] ) ){
				  $code .= ' portal #' . $info['portal_id'];
			  }
			  ?>
            <div style="padding-bottom: 8px;" class="vx_green"><i class="fa fa-check"></i> <?php
					echo sprintf( __( "Authorized Connection to %s on %s", 'contact-form-hubspot-crm' ), '<code>' . $code . '</code>', date( 'F d, Y h:i:s A', $info['_time'] ) );
				?></div>
			  <?php
		  } else{ //"automation" permission is not available in free version , throws error for free accounts , "content" permission
			  ?>
            <a class="button button-default button-hero sf_login" data-id="<?php echo esc_html( $client['client_id'] ) ?>"
               href="https://app.hubspot.com/oauth/authorize?scope=<?php echo urlencode( 'contacts' ) ?>&optional_scope=<?php echo urlencode(
				   'forms tickets automation' ) ?>&state=<?php echo urlencode(
				   $link . "&" . $this->id . "_tab_action=get_token&id=" . $id . "&vx_nonce=" . $nonce ); ?>&client_id=<?php echo $client['client_id'] ?>&redirect_uri=<?php echo urlencode(
				   $client['call_back'] ) ?>" title="<?php _e( "Login with HubSpot", 'contact-form-hubspot-crm' ); ?>"> <i class="fa fa-lock"></i> <?php _e(
					"Login with HubSpot",
					'contact-form-hubspot-crm' ); ?></a>
			  <?php
		  }
		  ?></div>
      <div class="clear"></div>
    </div>
	  <?php if( isset( $info['access_token'] ) && $info['access_token'] != "" ){
		  ?>
        <div class="crm_field">
          <div class="crm_field_cell1"><label><?php _e( "Revoke Access", 'contact-form-hubspot-crm' ); ?></label></div>
          <div class="crm_field_cell2"><a class="button button-secondary" id="vx_revoke" href="<?php echo $link . "&" . $this->id . "_tab_action=get_token&vx_nonce=" . $nonce . '&id=' . $id ?>"><i
                class="fa fa-unlock"></i> <?php _e( "Revoke Access", 'contact-form-hubspot-crm' ); ?></a>
          </div>
          <div class="clear"></div>
        </div>
		  
		  <?php
	  }
	  ?>
    
    <div class="crm_field">
      <div class="crm_field_cell1"><label for="vx_custom_app_check"><?php _e( "HubSpot App", 'contact-form-hubspot-crm' ); ?></label></div>
      <div class="crm_field_cell2">
        <div><input type="checkbox" name="crm[custom_app]" id="vx_custom_app_check" value="yes" <?php if( $this->post( 'custom_app', $info ) == "yes" ){
				echo 'checked="checked"';
			} ?> style="margin-right: 5px;"><?php echo __( 'Use Own HubSpot App ', 'contact-form-hubspot-crm' );
				$this->tooltip( 'vx_custom_app' ); ?></div>
      </div>
      <div class="clear"></div>
    </div>
    <div id="vx_custom_app_div" style="<?php if( $this->post( 'custom_app', $info ) != "yes" ){
		echo 'display:none';
	} ?>">
      <div class="crm_field">
        <div class="crm_field_cell1"><label for="app_id"><?php _e( 'Client ID', 'contact-form-hubspot-crm' ); ?></label></div>
        <div class="crm_field_cell2">
          <div class="vx_tr">
            <div class="vx_td">
              <input type="password" id="app_id" name="crm[app_id]" class="crm_text" placeholder="<?php _e( 'Client ID', 'contact-form-hubspot-crm' ); ?>"
                     value="<?php echo esc_html( $this->post( 'app_id', $info ) ); ?>">
            </div>
            <div class="vx_td2">
              <a href="#" class="button vx_toggle_btn vx_toggle_key" title="<?php _e( 'Toggle Consumer Key', 'contact-form-hubspot-crm' ); ?>"><?php _e( 'Show Key', 'contact-form-hubspot-crm' ) ?></a>
            
            </div>
          </div>
        </div>
        <div class="clear"></div>
      </div>
      <div class="crm_field">
        <div class="crm_field_cell1"><label for="app_secret"><?php _e( 'Client Secret', 'contact-form-hubspot-crm' ); ?></label></div>
        <div class="crm_field_cell2">
          <div class="vx_tr">
            <div class="vx_td">
              <input type="password" id="app_secret" name="crm[app_secret]" class="crm_text" placeholder="<?php _e( 'Client Secret', 'contact-form-hubspot-crm' ); ?>"
                     value="<?php echo esc_html( $this->post( 'app_secret', $info ) ); ?>">
            </div>
            <div class="vx_td2">
              <a href="#" class="button vx_toggle_btn vx_toggle_key" title="<?php _e( 'Toggle Consumer Secret', 'contact-form-hubspot-crm' ); ?>"><?php _e(
					  'Show Key',
					  'contact-form-hubspot-crm' ) ?></a>
            
            </div>
          </div>
        </div>
        <div class="clear"></div>
      </div>
      <div class="crm_field">
        <div class="crm_field_cell1"><label for="app_url"><?php _e( "Redirect URL", 'contact-form-hubspot-crm' ); ?></label></div>
        <div class="crm_field_cell2"><input type="text" id="app_url" name="crm[app_url]" class="crm_text" placeholder="<?php _e( "Redirect URL", 'contact-form-hubspot-crm' ); ?>"
                                            value="<?php echo esc_html( $this->post( 'app_url', $info ) ); ?>">
          <div class="howto">
            <div>1: <?php echo $link . "&" . $this->id . "_tab_action=get_code"; ?></div>
            <div>2: https://www.crmperks.com/sf_auth/</div>
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </div>
  <div class="crm_field">
    <div class="crm_field_cell1"><label><?php _e( "Test Connection", 'contact-form-hubspot-crm' ); ?></label></div>
    <div class="crm_field_cell2">
      <button type="submit" class="button button-secondary" name="vx_test_connection"><i class="fa fa-refresh"></i> <?php _e( "Test Connection", 'contact-form-hubspot-crm' ); ?></button>
    </div>
    <div class="clear"></div>
  </div>
  <div class="crm_field">
    <div class="crm_field_cell1"><label for="vx_error_email"><?php _e( "Notify by Email on Errors", 'contact-form-hubspot-crm' ); ?></label></div>
    <div class="crm_field_cell2"><textarea name="crm[error_email]" id="vx_error_email" placeholder="<?php _e( "Enter comma separated email addresses", 'contact-form-hubspot-crm' ); ?>"
                                           class="crm_text" style="height: 70px"><?php echo isset( $info['error_email'] ) ? $info['error_email'] : ""; ?></textarea>
      <span class="howto"><?php _e(
			  "Enter comma separated email addresses. An email will be sent to these email addresses if an order is not properly added to HubSpot. Leave blank to disable.",
			  'contact-form-hubspot-crm' ); ?></span>
    </div>
    <div class="clear"></div>
  </div>
  <div class="crm_field">
    <div class="crm_field_cell1"><label for="vx_hub_analytics"><?php _e( 'HubSpot Analytics', 'contact-form-hubspot-crm' ); ?></label></div>
    <div class="crm_field_cell2">
      <span class="howto"><?php echo sprintf(
			  __( 'Add Hubspot Tracking Code in wordpress footer or install the %s HubSpot All-In-One Marketing %s', 'contact-form-hubspot-crm' ),
			  '<a href="https://wordpress.org/plugins/leadin/">',
			  '</a>' ); ?></span>
    </div>
    <div class="clear"></div>
  </div>
  
  <button type="submit" value="save" class="button-primary" title="<?php _e( 'Save Changes', 'contact-form-hubspot-crm' ); ?>" name="save"><?php _e(
		  'Save Changes',
		  'contact-form-hubspot-crm' ); ?></button>
</div>