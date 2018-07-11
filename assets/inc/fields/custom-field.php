<?php
global $new_meta_boxes, $post;

$new_meta_boxes =
array(
// SEO
	"_hasSlider" => array(
	"name" => "_hasSlider",
	"std" => '',
	"title" => "Has Full Width Hero Slider?",
	"description" => "Check if using fullwidth hero slider",
	"type" => "checkbox",
	"location" => "all"),
	
	
	"_hasHeader" => array(
	"name" => "_hasHeader",
	"std" => '',
	"title" => "Has standard header?",
	"description" => "Check if using header module",
	"type" => "checkbox",
	"location" => "all"),
	
 // PAGE
   	"_pagecolour" => array(
	"name" => "_pagecolour",
	"std" => "",
	"title" => "Page Colour",
	"description" => "",
	"type" => "colorpicker",
	"location" => "all"),

	"_subheadtwo" => array(
	"name" => "_subheadtwo",
	"std" => "",
	"title" => "Internatioal Page Heading",
	"description" => "ie. Alternative heading for international page",
	"type" => "text",
	"location" => "all"),	
	
		"_internationalPage" => array(
	"name" => "_internationalPage",
	"std" => '',
	"title" => "Is International Page",
	"description" => "check if this is an international page.",
	"type" => "checkbox",
	"location" => "all"),
	
	
		"_redirectPage" => array(
	"name" => "_redirectPage",
	"std" => '',
	"title" => "Redirect",
	"description" => "check if you wish to create a 301 redirect.",
	"type" => "checkbox",
	"location" => "all"),
	
	"_redirectPageUrl" => array(
	"name" => "_redirectPageUrl",
	"std" => "",
	"title" => "Redirect Page Url",
	"description" => "ie. http://gateleyplc.com",
	"type" => "text",
	"location" => "all"),
	/*
	Careers Settings
	*/
	
	"_externalLink" => array(
	"name" => "_externalLink",
	"std" => "",
	"title" => "Link to career page",
	"type" => "text",
	"location" => "careers"),	
	
	
	
	/*
	People Settings
	*/
	
	"_jobRole" => array(
	"name" => "_jobRole",
	"std" => "",
	"title" => "Job Role",
	"type" => "text",
	"location" => "people"),	
	
	"_personDepartment" => array(
	"name" => "_personDepartment",
	"std" => "",
	"title" => "Department",
	"type" => "text",
	"location" => "people"),	
	
	"_personNumber" => array(
	"name" => "_personNumber",
	"std" => "",
	"title" => "Direct Number",
	"type" => "text",
	"location" => "people"),	
	
	"_personFax" => array(
	"name" => "_personFax",
	"std" => "",
	"title" => "Direct Fax Number",
	"type" => "text",
	"location" => "people"),	
	
	"_personMobile" => array(
	"name" => "_personMobile",
	"std" => "",
	"title" => "Mobile Number",
	"type" => "text",
	"location" => "people"),	

"_personEmail" => array(
	"name" => "_personEmail",
	"std" => "",
	"title" => "Email Address",
	"type" => "text",
	"location" => "people"),	
	
"_personLinkedin" => array(
	"name" => "_personLinkedin",
	"std" => "",
	"title" => "Linkedin",
	"type" => "text",
	"location" => "people"),	
	
	"_personTwitter" => array(
	"name" => "_personTwitter",
	"std" => "",
	"title" => "Twitter",
	"type" => "text",
	"location" => "people"),	
	
	"_personBlog" => array(
	"name" => "_personBlog",
	"std" => "",
	"title" => "Blog",
	"type" => "text",
	"location" => "people"),	
		
	
"_Overview" => array(
	"name" => "_Overview",
	"std" => "",
	"title" => "Overview",
	"type" => "textarea",
	"location" => "all"),	
	/*
	
"_Expertise" => array(
	"name" => "_Expertise",
	"std" => "",
	"title" => "Expertise",
	"type" => "textarea",
	"location" => "people"),	



"_Experience" => array(
	"name" => "_Experience",
	"std" => "",
	"title" => "Experience",
	"type" => "textarea",
	"location" => "people"),	
	
	
"_Successes" => array(
	"name" => "_Successes",
	"std" => "",
	"title" => "Successes",
	"type" => "textarea",
	"location" => "people"),	

"_Interests" => array(
	"name" => "_Interests",
	"std" => "",
	"title" => "Interests",
	"type" => "textarea",
	"location" => "people"),	*/

	
	"_personNumber" => array(
	"name" => "_personNumber",
	"std" => "",
	"title" => "Direct Number",
	"type" => "text",
	"location" => "vcard"),	
	
	"_personFax" => array(
	"name" => "_personFax",
	"std" => "",
	"title" => "Direct Fax Number",
	"type" => "text",
	"location" => "vcard"),	
	
	"_personaddress" => array(
	"name" => "_personaddress",
	"std" => "",
	"title" => "Address",
	"type" => "text",
	"location" => "office"),	
	
	
 	"_personaddressstreet" => array(
	"name" => "_personaddressstreet",
	"std" => "",
	"title" => "Address - Street",
	"type" => "text",
	"location" => "office"),	
	
	 	"_personaddresscity" => array(
	"name" => "_personaddresscity",
	"std" => "",
	"title" => "Address - City",
	"type" => "text",
	"location" => "office"),	
	
	 	"_personaddressstate" => array(
	"name" => "_personaddresstate",
	"std" => "",
	"title" => "Address - County",
	"type" => "text",
	"location" => "office"),	
	
	"_personaddresspc" => array(
	"name" => "_personaddresspc",
	"std" => "",
	"title" => "Address - Postcode",
	"type" => "text",
	"location" => "office"),	
	
		"_personaddresscountry" => array(
	"name" => "_personaddresscountry",
	"std" => "",
	"title" => "Address - Country",
	"type" => "text",
	"location" => "office"),	
	
	
"_personEmail" => array(
	"name" => "_personEmail",
	"std" => "",
	"title" => "Email Address",
	"type" => "text",
	"location" => "vcard"),	
	
"_gmaplink" => array(
	"name" => "_gmaplink",
	"std" => "",
	"title" => "Google Maps Link",
	"type" => "text",
	"location" => "office"),	
	
	"_personTwitter" => array(
	"name" => "_personTwitter",
	"std" => "",
	"title" => "Twitter",
	"type" => "text",
	"location" => "vcard"),	
	
	"_personBlog" => array(
	"name" => "_personBlog",
	"std" => "",
	"title" => "Blog",
	"type" => "text",
	"location" => "vcard"),	


"_insetMap" => array(
	"name" => "_insetMap",
	"std" => "",
	"title" => "Map Image",
	"type" => "upload",
	"location" => "office"),		
"_contactFormShort" => array(
	"name" => "_contactFormShort",
	"std" => "",
	"title" => "Contact Form Shortcode",
	"type" => "text",
	"location" => "office"),			
"_publication" => array(
	"name" => "_publication",
	"std" => "",
	"title" => "Publication PDF",
	"type" => "upload",
	"location" => "publication"),		
);
function new_meta_boxes_page() {
	new_meta_boxes('page');
}
function new_meta_boxes_people() {
	new_meta_boxes('people');
}

function new_meta_boxes_formidable_entries() {
	new_meta_boxes('formidable-entries');
}



function new_meta_boxes_all() {
	new_meta_boxes('all');
}

function new_meta_boxes_careers() {
	new_meta_boxes('careers');
}

function new_meta_boxes_office() {
	new_meta_boxes('office');
}
function new_meta_boxes_vcard() {
	new_meta_boxes('vcard');
}

function new_meta_boxes_publication() {
	new_meta_boxes('publication');
}

function new_meta_boxes( $type ) {
	global $post, $new_meta_boxes;
	

  echo '<input type="hidden" name="nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
	
	echo '<div class="form-wrap">';

	foreach($new_meta_boxes as $meta_box) {
		if( $meta_box['location'] == $type) {
			
			if ( $meta_box['type'] == 'title' ) {
				echo '<p class="sidebar-name">' . $meta_box[ 'title' ] . '</p>';
			} else {			
				$meta_box_value = get_post_meta($post->ID, $meta_box['name'], true);
		
				if($meta_box_value == "")
					$meta_box_value = $meta_box['std'];
		
				echo '<div class="form-field form-required">';
				
				switch ( $meta_box['type'] ) {
					case 'text':
						echo 	'<label for="' . $meta_box[ 'name' ] .'"><strong>' . $meta_box[ 'title' ] . '</strong></label>';
						echo 	'<input type="text" name="' . $meta_box[ 'name' ] . '" value="' . htmlspecialchars( $meta_box_value ) . '" style="width:100%;"/>';
						
                        break;
						
							case 'hr':					
						echo 	'<hr/>';
						
                        break;
				    
				    
							case 'colorpicker':
						echo 	'<label for="' . $meta_box[ 'name' ] .'"><strong>' . $meta_box[ 'title' ] . '</strong></label>';
						echo 	'<input type="text" class="my-color-field" name="' . $meta_box[ 'name' ] . '" value="' . htmlspecialchars( $meta_box_value ) . '" style="width:100%;"/>';
						
                        break;
						
						case 'slider':
						echo 	'<div class="sliderwrap"><label for="' . $meta_box[ 'name' ] .'"><strong>' . $meta_box[ 'title' ] . '</strong></label>';
						echo 	'<input type="text" class="slideramount" name="' . $meta_box[ 'name' ] . '" value="' . htmlspecialchars( $meta_box_value ) . '" />';
						echo '<div id="slider" style="width:80%; float:left;"></div></div>';
                        break;	

					case 'textarea':
						echo 	'<label for="' . $meta_box[ 'name' ] .'"><strong>' . $meta_box[ 'title' ] . '</strong></label>';
						//echo 	'<textarea class="editor"  style="min-height:300px; background:#fff; height:auto;" name="' .  . '">' .  . '</textarea>';
						echo wp_editor(  $meta_box_value, $meta_box[ 'name' ] );
                        break;
																								
																								
					case 'plaintextarea':
						echo 	'<label for="' . $meta_box[ 'name' ] .'"><strong>' . $meta_box[ 'title' ] . '</strong></label>';
						echo 	'<textarea class="editor" name="' . $meta_box[ 'name' ]. '">' . $meta_box_value . '</textarea>';
                        break;
						
							case 'upload':
						echo 	'<label for="upload_image" class="nj_image_uploader" style="clear:both; width:100%; display:block;">';
		
//if(empty(wp_get_attachment_image( $meta_box_value, 'thumbnail', false))) {
	 $butval = 'Upload Image / File';	
//} else {
// $butval = 'Change Image / File';	
//}
						echo '<strong style="width:100%; display:block; margin-bottom:3px;  clear:right">' . $meta_box[ 'title' ] . '</strong>
    <input id="upload_image" type="hidden" size="36" name="' . $meta_box[ 'name' ] . '" value="'.$meta_box_value.'" style="width:80%;" class="upload_image"/>
    <div style="width:200px; border:1px solid #d0d0d0; padding:5px; display:inline-block; text-align:center;">';
          if(empty($meta_box_value)) {
				echo 
 '<img src="'.home_url().'/wp-includes/images/media/document.png" class="hidden thumbnail" data-to="'.home_url().'" style="max-width:100%;">';
    } else {
 			echo wp_get_attachment_image( $meta_box_value, 'thumbnail', true, array('style' => "max-width:100%;"));
    }
    echo '<br>
    <input style="width:100%;" id="upload_image_button" class="upload_image_button button" type="button" value="'. $butval.'" />';
    
   
echo '</div></label>';

						
                        break;
							
case 'multiupload':?>
<div class="display-block">
	<a class="add_new_media button button-primary button-large">Add Images</a>
    <div class="sortable">
    <hr />
    <br />
	<?php
    //$mcs will be a multi-dimensional array with this method
	global $post;
	$name= $meta_box[ 'name' ];
	$postid = get_the_ID();
   $mcs = get_post_meta($postid,  $name, true);
  
   //print_r( $mcs);?>
   <?php $id = 'upload_image_'.uniqid();?>
<?php if (!empty($mcs)) { 
 $count = 1;
foreach($mcs as $data): ?>
 <?php if ($count = 1) { ?><div class="copy"><?php }?>
<?php echo wp_get_attachment_image(  $data['media'], 'thumbnial', false, array('style' => "width:100%;height:auto;"));?>
      <input id="<?php echo $id; ?>" type="text" name="<?php echo $meta_box[ 'name' ]?>[][media]" value="<?php echo $data['media']; ?>" class="form-ctrl hidden"/>
      <button class=" upload_image_button button hidden">Upload Image</button>
        <br /><a class="remove">Remove</a>
    <?php if ($count = 1) { ?></div><?php } ?>
     <?php
    $count++;
        endforeach;
		} else {?>
        <div class="copy">
         <img src=" " class="hidden thumbnail" data-to="<?php echo home_url(); ?>">

      <input id="<?php echo $id; ?>" type="text" name="<?php echo $meta_box[ 'name' ]?>[][media]" value="<?php echo $data['media']; ?>" class="form-ctrl hidden" /><button class=" upload_image_button button">Upload Image</button>
        <br /><a class="remove hidden">Remove</a>
    </div>
			
		<?php }?>
        
        

    <div class="pastehere"></div>
    </div>
    </div>
    <hr />

<?php
break;
               
					case 'checkbox':
						if($meta_box_value == '1'){ $checked = "checked=\"checked\""; }else{ $checked = "";} 
						echo 	'<label for="' . $meta_box[ 'name' ] .'"><strong>' . $meta_box[ 'title' ] . '</strong>&nbsp;<input style="width: 20px;" type="checkbox" name="' . $meta_box[ 'name' ] . '" value="1" ' . $checked . ' /></label>';
						break;
						
					case 'select':
						echo 	'<label for="' . $meta_box[ 'name' ] .'"><strong>' . $meta_box[ 'title' ] . '</strong></label>';
						
                        echo	'<select name="' . $meta_box[ 'name' ] . '">';

						// Loop through each option in the array
						foreach ($meta_box[ 'options' ] as $option) {
							if(is_array($option)) {
								echo '<option ' . ( $meta_box_value == $option['value'] ? 'selected="selected"' : '' ) . ' value="' . $option['value'] . '">' . $option['text'] . '</option>';
							} else {
   								echo '<option ' . ( $meta_box_value == $option ? 'selected="selected"' : '' ) . ' value="' . $option['value'] . '">' . $option['text'] . '</option>';
							}
						}
                        
						echo	'</select>';
                        break;
						
						
							case 'workspages':
							wp_reset_query(); 
							global $post;

$args = array (
						'nopaging' => true,
						'post_type' => 'case_studies',
						'status' => 'publish',
						'orderby' => 'menu_order',
						'order' => 'ASC');
						 query_posts($args);

						
						
						echo 	'<label for="' . $meta_box[ 'name' ] .'"><strong>' . $meta_box[ 'title' ] . '</strong></label>';
						//echo $meta_box_value;
						

                        echo	'<select name="' . $meta_box[ 'name' ] . '">';
					echo '<option value="none">Do not link</option>';			
	while (have_posts()) : the_post(); 
if($meta_box_value == get_the_permalink($post->ID)){ $selected = "selected=\"selected\""; }else{ $selected = "";}?>
 <option value="<?php echo get_the_permalink($post->ID); ?>" <?php  echo $selected?>> <?php echo get_the_title(); ?></option>
				<?php
				echo $meta_box_value;
                endwhile;

						echo	'</select>';
						
                        break;
						
						
						
						
					case 'works_cat':
						echo 	'<label for="' . $meta_box[ 'name' ] .'"><strong>' . $meta_box[ 'title' ] . '</strong></label>';
						
						// Get the categories first
						$args = array( 'taxonomy' => 'works_category', 'hide_empty' => '0' );
						$categories = get_categories( $args ); 
						
						$selected_cats = explode( ",", $meta_box_value );
						
						echo '<ul style="margin-top: 5px;">';

						// Loop through each category
						foreach ($categories as $category) {
														
							foreach ($selected_cats as $selected_cat) {
        	           			if($selected_cat == $category->cat_ID){ $checked = 'checked="checked"'; break; } else { $checked = ""; }
		            	    }
							
			                echo '<li><input style="width: 20px;" type="checkbox" name="' . $meta_box[ 'name' ] . '[]" value="' . $category->cat_ID . '" ' . $checked . ' />&nbsp;' . $category->name . '</li>';
						}
						
						echo '</ul>';
						break;
				}

				echo 	'<p>' . $meta_box[ 'description' ] . '</p>';
				echo '</div>';
			}
		}
	}
	
	echo '</div>';
}

function create_meta_box() {
global $theme_name;
if ( function_exists('add_meta_box') ) {
	


		$screens =  array('people', 'services', 'sectors', 'financialevents', 'office', 'page', 'post', 'csr', 'publications', 'careers');
	foreach ( $screens as $screen ) {
		add_meta_box( 'new_meta_boxes_all','Global Settings', 'new_meta_boxes_all', $screen, 'normal');
	}
	
	foreach ( $screens as $screen ) {
		add_meta_box( 'new_meta_boxes_all','Global Settings', 'new_meta_boxes_all', $screen, 'normal');
	}
	foreach ( array('people', 'office') as $where ) {
		add_meta_box( 'new_meta_boxes_vcard','Vcard Settings', 'new_meta_boxes_vcard', $where, 'normal');
	}
	
	
		add_meta_box( 'new_meta_boxes_people','Personal Settings', 'new_meta_boxes_people', 'people', 'normal');
		add_meta_box( 'new_meta_boxes_careers','Career Settings', 'new_meta_boxes_careers', 'careers', 'normal');
		add_meta_box( 'new_meta_boxes_office','Office Settings', 'new_meta_boxes_office', 'office', 'normal');
		add_meta_box( 'new_meta_boxes_publication','Publications Settings', 'new_meta_boxes_publication', 'publications', 'normal');
				add_meta_box( 'new_meta_boxes_formidable_entries','Personal Details', 'new_meta_boxes_formidable_entries', 'formidable-entries', 'normal');


}







}
	

function save_postdata( $post_id ) {
	

	if ( !wp_verify_nonce( $_POST['nonce'], basename(__FILE__)) ) {
		return $post_id;
	}
	
	if ( wp_is_post_revision( $post_id ) or wp_is_post_autosave( $post_id ) )
		return $post_id;
		
	global $post, $new_meta_boxes;

	foreach($new_meta_boxes as $meta_box) {
		
		if ( $meta_box['type'] != 'title)' ) {
		
			if ( 'page' == $_POST['post_type'] ) {
				if ( !current_user_can( 'edit_page', $post_id ))
					return $post_id;
			} else {
				if ( !current_user_can( 'edit_post', $post_id ))
					return $post_id;
			}
			
			if ($meta_box['type'] == 'multiupload') { $data = $_POST[$meta_box['name']]; }
			elseif ( is_array($_POST[$meta_box['name']]) ) {
				
				foreach($_POST[$meta_box['name']] as $cat){
					$cats .= $cat . ",";
				}
				$data = substr($cats, 0, -1);
			}
			else { $data = $_POST[$meta_box['name']]; }			
	
			if(get_post_meta($post_id, $meta_box['name']) == "")
				add_post_meta($post_id, $meta_box['name'], $data, true);
			elseif($data != get_post_meta($post_id, $meta_box['name'], true))
				update_post_meta($post_id, $meta_box['name'], $data);
			elseif($data == "")
				delete_post_meta($post_id, $meta_box['name'], get_post_meta($post_id, $meta_box['name'], true));
				
		}
	}
}
add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');?>