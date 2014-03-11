<?php
    add_action('admin_menu', 'register_my_custom_submenu_page');
    
    function register_my_custom_submenu_page() {
		add_theme_page('Theme Options', 'Theme Options', 'read', 'my-custom-submenu-page', 'my_custom_submenu_page_callback' ); 
    }
    
    function my_custom_submenu_page_callback() {
		if(isset($_POST["facebook"])) {
      		$facebook = sanitize_text_field($_POST["facebook"]);
    	}
		if(isset($_POST["twitter"])) {
      		$twitter = sanitize_text_field($_POST["twitter"]);
    	}
		if(isset($_POST["youtube"])) {
      		$youtube = sanitize_text_field($_POST["youtube"]);
    	}
    	if(isset($_POST["phone"])) {
      		$phone = sanitize_text_field($_POST["phone"]);
    	}
		if(isset($_POST["email"])) {
      		$email = sanitize_text_field($_POST["email"]);
    	}
		if(isset($_POST["copyright"])) {
      		$copyright = sanitize_text_field($_POST["copyright"]);
    	}
		if(isset($_POST["image_1"])) {
      		$logo_sus = sanitize_text_field($_POST["image_1"]);
    	}
		if(isset($_POST["image_2"])) {
      		$logo_jos = sanitize_text_field($_POST["image_2"]);
    	}
    	if (isset($_POST["update_settings"])) {	
			update_option("vertimagazine_options",array(
				"copyright"=>$copyright,
				"email"=>$email,
				"phone"=>$phone,
				"logo_sus"=>$logo_sus,
				"logo_jos"=>$logo_jos,
				"facebook"=>$facebook,
				"twitter"=>$twitter,
				"youtube"=>$youtube
			)); 
    	} 
		$op = get_option("vertimagazine_options");
	 
    ?>
    <style type="text/css">
	#form-options th {
		width: 200px !important;
		padding: 10px !important;
		text-align:left !important;
	}
	</style>
      <div class="wrap">
        <form method="POST" action="">
        	<h2>General options</h2>
            
            <table id="form-options">
            <tr>
                <th scope="row">Facebook link</th>
                <td><input type="text" name="facebook" size="25" value="<?php $fb = $op["facebook"]; echo esc_attr($fb); ?>" /></td>
            </tr>
            <tr>
                <th scope="row">Twitter link</th>
                <td><input type="text" name="twitter" size="25" value="<?php $tw = $op["twitter"]; echo esc_attr($tw); ?>" /></td>
            </tr>
            <tr>
                <th scope="row">Youtube link</th>
                <td><input type="text" name="youtube" size="25" value="<?php $yt = $op["youtube"]; echo esc_attr($yt); ?>" /></td>
            </tr>
            <tr>
                <th scope="row">Phone number</th>
                <td><input type="text" name="phone" size="25" value="<?php $ph = $op["phone"]; echo esc_attr($ph); ?>" /></td>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <td><input type="text" name="email" size="25" value="<?php $em = $op["email"]; echo esc_attr($em); ?>" /></td>
            </tr>
            <tr>
                <th scope="row">Copyright</th>
                <td><textarea name="copyright"><?php $cr = $op["copyright"]; echo esc_attr($cr); ?></textarea></td>
            </tr>
           	<tr>
            	<td colspan="2">
            		<h3>Top logo</h3>
                </td>
            </tr>
            <tr>    
                <th scope="row">Preview</th>
                <td><img src="<?php $ls = $op["logo_sus"]; echo esc_attr($ls); ?>" name="preview1" id="preview1" alt="logo"/></td>
            </tr>
            <tr>
            	<th scope="row">Upload</th>
            	<td>
                	<input type="text" id="image_1" name="image_1" value="<?php $ls = $op["logo_sus"]; echo esc_attr($ls); ?>" style="width: 200px; float:left; margin:0 5px;"/>
            		<input id="_btn" class="upload_image_button" type="button" value="Upload Image" />
                </td>
            </tr>
            
            
            <tr>
            	<td colspan="2">
            		<h3>Bottom logo</h3>
                </td>
            </tr>
            <tr>    
                <th scope="row">Preview</th>
                <td><img src="<?php $lj =  $op["logo_jos"]; echo esc_attr($lj); ?>" name="preview2" id="preview2" alt="logo"/></td>
            </tr>
            <tr>
            	<th scope="row">Upload</th>
            	<td>
                	<input type="text" id="image_2" name="image_2" value="<?php $lj =  $op["logo_jos"]; echo esc_attr($lj); ?>" style="width: 200px; float:left; margin:0 5px;"/>
            		<input id="_btn" class="upload_image_button" type="button" value="Upload Image" />
                </td>
            </tr>
           </table>
            
     
            <input type="hidden" name="update_settings" value="Y" />  
            <input type="submit" value="Save settings" class="button-primary"/> 
        </form>
    </div>
  <?php  
    }
  ?>