<?php makeVcard(get_the_title(),get_bloginfo('name'), get_post_meta($post->ID, '_jobRole', true), get_post_meta($post->ID, '_personEmail', true), get_post_meta($post->ID, '_personNumber', true), get_post_meta($post->ID, '_personFax', true), get_post_meta($post->ID, '_personMobile', true));