<?php 
/**
*	Theme Options v1.0.0
*	Adjust theme settings from the admin dashboard.
*	Autor: Mohit Tambi
*/

require_once('include/horizon-add-customcss.php');
?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory"); ?>/horizon-settings/include/horizon-add-css.css" >
<link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory"); ?>/horizon-settings/include/horizon-customcss.php" >
<script type="text/javascript" href="<?php bloginfo("template_directory"); ?>/horizon-settings/include/horizon-add-js.js" ></script>

<?php
/**
 * Theme Option Page
 */
function horizon_theme_menu()
{
  add_theme_page( 'Theme Option', 'Theme Options', 'manage_options', 'horizon_theme_options.php', 'horizon_theme_page');  
}
add_action('admin_menu', 'horizon_theme_menu');

/**
 * Callback function to the add_theme_page
 * Will display the theme options page
 */ 
function horizon_theme_page()
{
?>
    <div class="section panel horizon">

    	<?php $theme_name = function_exists( 'wp_get_theme' ) ? wp_get_theme() : get_current_theme(); ?>
    	<h2><?php printf( __( '%s Theme Options', 'horizon' ), $theme_name ); ?></h2>
			<?php settings_errors(); ?>
      	<h1>Custom Theme Options</h1><hr />
      	<form method="post" enctype="multipart/form-data" action="options.php">
        <div class="horizon-main">

          <div class="horizon-menu">
            <div class="theme-logo"><a href="#" ><img src="file:///F:/xampp/htdocs/horizoncustom/wp-content/themes/twentysixteen/horizon-settings/Accelrys.jpg" alt="Theme Logo"></a></div>
            <div class="dash-items">
              <ul>
                <li><div class="text-box items-list">Text box Title</div></li>
                <li><div class="social-box items-list">Enter Socials Details</div></li>
                <li><div class="section-box items-list">Check Section</div></li>
                <li><div class="css-box items-list">Custom CSS</div></li>
                <li><div class="section-box items-list">Header Section</div></li>
                <li><div class="section-box items-list">Footer Section</div></li>
                <li><div class="section-box items-list">Sidebar Section</div></li>
                <li><div class="section-box items-list">Nav Section</div></li>
              <ul>
            </div>
          </div>
        <?php 
          settings_fields('horizon_theme_options');
        ?>
        <div class="dash-cont">
          <div class="first">
          <?php do_settings_sections('horizon_theme_options.php'); ?>
          </div>

          <div class="second">
          <?php do_settings_sections('horizon_theme_options_second.php'); ?>
          </div>

          <div class="third">
          <?php do_settings_sections('horizon_theme_options_third.php'); ?>
          </div>

          <div class="fourth">
          <?php do_settings_sections('horizon_theme_options_fourth.php'); ?>
          </div>

        </div>
      </div>
        <div class="dash-submit">
            <p class="submit">  
                <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />  
            </p>
        </div>
            
      	</form>
      
      <p>Created by <a href="#">Mohit Tambi</a>.</p>
    </div>
    <?php
}

/**
 * Register the settings to use on the theme options page
 */
add_action( 'admin_init', 'horizon_register_settings' );

function horizon_register_settings(){

    // Register a setting and its Validation callback
	// register_setting( $option_group, $option_name, $sanitize_callback );
	// $option_group - A settings group name.
	// $option_name - The name of an option to sanitize and save.
	// $sanitize_callback - A callback function that sanitizes the option's value.
    register_setting( 'horizon_theme_options', 'horizon_theme_options1', 'horizon_validate_settings' );
    register_setting( 'horizon_theme_options', 'horizon_theme_social_options' );
    register_setting( 'horizon_theme_options', 'horizon_theme_check_options' );
    register_setting( 'horizon_theme_options', 'horizon_theme_css_options' );

	// Register our settings field group
	// add_settings_section( $id, $title, $callback, $page );
	// $id - Unique identifier for the settings section
	// $title - Section title
	// $callback - // Section callback (we don't want anything)
	// $page - // Menu slug, used to uniquely identify the page. See YourTheme_theme_options_add_page().
    add_settings_section( 'horizon_text_section', 'Text box Title', 'horizon_display_section', 'horizon_theme_options.php' );
    add_settings_section( 'horizon_text_socials_section', 'Enter Socials Details', 'horizon_display_socials_section', 'horizon_theme_options_second.php' );
    add_settings_section( 'horizon_text_check_section', 'Check Section', 'horizon_display_check_section', 'horizon_theme_options_third.php' );
    add_settings_section( 'horizon_text_css_section', 'Add Custom CSS', 'horizon_display_css_section', 'horizon_theme_options_fourth.php' );
	// Create textbox field
    $field_args = array(
      'type'      => 'text',
      'id'        => 'horizon_textbox',
      'name'      => 'horizon_textbox',
      'desc'      => 'Enter Title',
      'std'       => '',
      'label_for' => 'horizon_textbox',
      'class'     => 'css_class'
    );

    add_settings_field( 'example_textbox', 'Enter Title', 'horizon_display_setting', 'horizon_theme_options.php', 'horizon_text_section', $field_args );

/* Socials Start*/ 	

 	$field_args = array(
      'type'      => 'text',
      'id'        => 'horizon_fb_textbox',
      'name'      => 'horizon_fb_textbox',
      'desc'      => 'Enter Facebook URL',
      'std'       => '',
      'label_for' => 'horizon_fb_textbox',
      'class'     => 'css_class'
    );
 	 add_settings_field( 'fb_textbox', 'Facebook Textbox', 'horizon_display_social_setting', 'horizon_theme_options_second.php', 'horizon_text_socials_section', $field_args );
 	/* Second Start */ 
 	 $field_args = array(
      'type'      => 'text',
      'id'        => 'horizon_tw_textbox',
      'name'      => 'horizon_tw_textbox',
      'desc'      => 'Enter Twitter URL',
      'std'       => '',
      'label_for' => 'horizon_tw_textbox',
      'class'     => 'css_class'
    );
 	 add_settings_field( 'tw_textbox', 'Twitter Textbox', 'horizon_display_social_setting', 'horizon_theme_options_second.php', 'horizon_text_socials_section', $field_args );
/* Second End */
/* Socials End */

/* Third Start */
/* Checkbox */

 	  $field_args = array(
      'type'      => 'checkbox',
      'id'        => 'horizon_twc_textbox',
      'name'      => 'horizon_twc_textbox',
      'desc'      => 'COLOR CODE',
      'std'       => '',
      'label_for' => 'horizon_twc_textbox',
      'class'     => 'css_class'
    );
 	 add_settings_field( 'twc_textbox', 'COLOR BOX', 'horizon_display_check_setting', 'horizon_theme_options_third.php', 'horizon_text_check_section', $field_args );

/* Select Box */

       $field_args = array(
      'type'      => 'select-option',
      'id'        => 'horizon_options',
      'name'      => 'horizon_options',
      'desc'      => 'Select an option.',
      'std'       => '',
      'label_for' => 'horizon_options',
      'class'     => 'css_class'
    );
    add_settings_field( 'horizon_options', 'SELECTION BOX', 'horizon_display_check_setting', 'horizon_theme_options_third.php', 'horizon_text_check_section', $field_args );

/* Third End */

/* Fourth Start */

       $field_args = array(
      'type'      => 'textarea',
      'id'        => 'horizon_cust_css',
      'name'      => 'horizon_cust_css',
      'desc'      => 'Add Custom CSS',
      'std'       => '',
      'label_for' => 'horizon_cust_css',
      'class'     => 'css_class'
    );
    add_settings_field( 'horizon_cust_css', 'Add Custom CSS', 'horizon_display_css_setting', 'horizon_theme_options_fourth.php', 'horizon_text_css_section', $field_args );

       $field_args = array(
      'type'      => 'textarea',
      'id'        => 'horizon_cust_js',
      'name'      => 'horizon_cust_js',
      'desc'      => 'Add Custom JavaScript',
      'std'       => '',
      'label_for' => 'horizon_cust_js',
      'class'     => 'css_class'
    );
    add_settings_field( 'horizon_cust_js', 'Add Custom JavaScript code', 'horizon_display_css_setting', 'horizon_theme_options_fourth.php', 'horizon_text_css_section', $field_args );
}
/* Fourth End */

/**
 * Function to add extra text to display on each section
 */
function horizon_display_section($section){ ?>
<div class="dash title-section">
  <p>Welcome <p>
</div>
<?php
}
function horizon_display_socials_section($section){

}
function horizon_display_check_section($section){

}
function horizon_display_css_section($section){

}

/**
 * Function to display the settings on the page
 * This is setup to be expandable by using a switch on the type variable.
 * In future you can add multiple types to be display from this function,
 * Such as checkboxes, select boxes, file upload boxes etc.
 */
function horizon_display_setting($args)
{
    extract( $args );

    $option_name = 'horizon_theme_options1';

    $options = get_option( $option_name );

    switch ( $type ) {
          case 'text':
              $options[$id] = stripslashes($options[$id]);  
              $options[$id] = esc_attr( $options[$id]);  
              echo "<input class='regular-text$class' type='text' id='$id' name='" . $option_name . "[$id]' value='$options[$id]' />";  
              echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
          break; 
    }
}

function horizon_display_social_setting($args)
{
    extract( $args );

    $option_name = 'horizon_theme_social_options';

    $options = get_option( $option_name );

    switch ( $type ) {
          case 'text':
              $options[$id] = stripslashes($options[$id]);  
              $options[$id] = esc_attr( $options[$id]);  
              echo "<input class='regular-text$class' type='text' id='$id' name='" . $option_name . "[$id]' value='$options[$id]' />";  
              echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
          break;
    }
}

function horizon_display_check_setting($args)
{
    extract( $args );

    $option_name = 'horizon_theme_check_options';

    $options = get_option( $option_name );
        switch ( $type ) {
          case "checkbox":
			        $options[$id] = stripslashes($options[$id]);  
              $options[$id] = esc_attr( $options[$id]);
                          
              echo "<input class='regular-text$class' type='checkbox' id='$id' name='" . $option_name . "[$id]' " . checked( 'on', $options[$id] ) . " />";
              echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";			 
		      break;

		      case "select-option":
		  	      $options[$id] = stripslashes($options[$id]);  
              $options[$id] = esc_attr( $options[$id]);
              $value = $options[$id] ;
              echo "<select class='regular-text$class' id='$id' name='" . $option_name . "[$id]' />";
                  $options = array(
                    '1' => esc_html__( 'Option 1', 'horizon' ),
                    '2' => esc_html__( 'Option 2', 'horizon' ),
                    '3' => esc_html__( 'Option 3', 'horizon' ),
                  );
                  foreach ( $options as $id => $label ) { ?>
                    <option value="<?php echo esc_attr( $id ); ?>" <?php selected( $value, $id, true ); ?>>
                      <?php echo strip_tags( $label ); ?>
                    </option>
                  <?php } ?>
                </select>
                <?php
              echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : ""; 
          break;
    }
}

function horizon_display_css_setting($args)
{
    extract( $args );

    $option_name = 'horizon_theme_css_options';

    $options = get_option( $option_name );

    switch ( $type ) {
          case 'textarea':              
          echo "<textarea class='regular-text$class' type='text' id='$id' name='" . $option_name . "[$id]' rows='12' cols='80' />";
          echo $options[$id];
          echo"</textarea>" ; 
          echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
          break;
    }
}

/**
 * Callback function to the register_settings function will pass through an input variable
 * You can then validate the values and the return variable will be the values stored in the database.
 */
function horizon_validate_settings($input)
{
  foreach($input as $k => $v)
  {
    $newinput[$k] = trim($v);
    
    // Check the input is a letter or a number
    if(!preg_match('/^[A-Z0-9 _]*$/i', $v)) {
      $newinput[$k] = '';
    }
  }

  return $newinput;
}
