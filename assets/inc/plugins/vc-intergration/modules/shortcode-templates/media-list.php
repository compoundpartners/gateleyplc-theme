<?php

  $output .='<div class="media media-'.get_post_type().' '.get_post_type().' white '.$displaytype.'  media-'.get_the_ID().'  matchHeight">';

  if($popuplink =='yes') {
    $link = "#".get_post_type()."-".get_the_ID(); $linkclass= "open-popup-link";
  } else {
    $link = get_the_permalink();
  }

  $output .='<a  href="'.$link.'"  class="media-left '.$linkclass.'">';

  if ($featuredimg == 'date') {
    $output .="<div class='date-block-default media-object mt5'><span class='day'>".date('d', strtotime(get_the_date())).'</span>';
    $output .= "<span class='month'>".date('M', strtotime(get_the_date())).'</span></div>';
  } elseif(has_post_thumbnail()) {
    $output .=get_the_post_thumbnail($post->ID, "medium", array('class' => 'media-object invisible'));
  }
  else {
    $output .="<img class='media-object matchHeight invisible' src='".home_url()."/wp-content/plugins/js_composer/assets/vc/no_image.png' >";
    $GLOBALS['styles'] .= ".media-".get_post_type().".media-".get_the_ID()." .media-left{ background:url(".home_url()."/wp-content/plugins/js_composer/assets/vc/no_image.png); background-size:cover;  background-position:center center;}";
  }

  $output .='</a>';

  if ($featuredimg == 'date') {
    $bodyclass .= ' date-media ';
  }

  $output .='<div class="media-body '.$bodyclass.'">';

  $output .='<a  href="'.$link.'" class="'.$linkclass.'" >';

  $output .= '<h3 class="media-heading level">'.$thetitle.'</h3>';

  if ('people' == get_post_type() || 'office' == get_post_type()) {
    $output .='<h5>'.get_post_meta($post->ID, '_jobRole', true).'</h5></a>';

    if($showcontent == 'yes') {
      $output .='<ul class="contact-list">';
      $terms = wp_get_post_terms($post->ID, 'gateley_plc_us_location', array("fields" => "names"));

      if ('people' == get_post_type() && !empty($terms))    {
        $output .=' <li><strong>Location.</strong> ';

        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
          $looping = 1;
          $countingterms = count($terms);

          foreach ( $terms as $term ) {
            $output .= $term;

            if( $countingterms  > 1) {
              $output .=', ';
            }

            $looping++;
          }
        }

        $output .='</li>';

      } elseif ('office' == get_post_type()) {

        $output .= ' <li><strong>Address.</strong>';
        $output .= get_post_meta(get_the_ID(), '_personaddress', true).'<br>';

        if(!empty(get_post_meta(get_the_ID(), '_personaddressstreet', true))) $output .=get_post_meta(get_the_ID(), '_personaddressstreet', true).'<br>';
        if(!empty(get_post_meta(get_the_ID(), '_personaddresscity', true))) $output .= get_post_meta(get_the_ID(), '_personaddresscity', true).'<br>';
        if(!empty(get_post_meta(get_the_ID(), '_personaddressstate', true))) $output .= get_post_meta(get_the_ID(), '_personaddressstate', true).'<br>';
        if(!empty(get_post_meta(get_the_ID(), '_personaddresspc', true))) $output .= get_post_meta(get_the_ID(), '_personaddresspc', true).'<br>';
        if(!empty(get_post_meta(get_the_ID(), '_personaddresscountry', true))) $output .=  get_post_meta(get_the_ID(), '_personaddresscountry', true);

        $output .= '</li>';
      }

      if( get_post_meta($post->ID, '_personNumber', true)) {
        $output .=' <li><strong>Telephone.</strong>';
        $output .= get_post_meta($post->ID, '_personNumber', true) .'</li>';
      }

      if(get_post_meta($post->ID, '_personEmail', true)) {
        $output .= '<li>';
        $output .= ' <strong>Email.</strong> ';
        $output .= '<a href="mailto:'. get_post_meta($post->ID, '_personEmail', true).'">'.get_the_title().'</a>';
        $output .= '  </li>';
      }

      $output .= '</ul>';
    }
  }

  if($showcontent == 'yes') {

    if(get_post_type() == 'talking-trainees' || get_post_type() == 'housebuilder-markets' || get_post_type() == 'talking-matters' || get_post_type() == 'corporate-deals') {
      $exerpt = strip_tags( get_post_field( 'post_excerpt', get_the_ID() ));
    } else {
      $exerpt = strip_tags( get_post_meta( get_the_ID(), '_Overview', true ));
    }

    if(is_numeric($truncate)) {
      $output .= truncate( $exerpt, $truncate);
    } else {
      $output .= truncate( $exerpt, 70);
    }

  }

  $output .='</a>';

  if(get_post_type() == 'post' || get_post_type() == 'talking-trainees' || get_post_type() == 'housebuilder-markets' || get_post_type() == 'talking-matters' || get_post_type() == 'corporate-deals') {
    $output .='<br><a href="'.get_the_permalink().'"><strong>';
    $output .='Read More';
    $output .='</strong></a>';
  }

  if($postmeta== 'yes') {
    $output .= '<div class="post-meta mt10"><div class="dropdown">';
    $output .= '<button class="btn btn-link dropdown-toggle" type="button" id="ShareMenu-'.$count.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">';
    $output .= '<i class="icon icon-share"></i> Share';
    $output .= '</button>';
    $output .= '<ul class="dropdown-menu social-dropdown-menu" aria-labelledby="ShareMenu-'.$count.'">';

    global $post; $orignaltitle = get_the_title();

    $prefix = get_bloginfo('name') . ' - ';

    $thetitle =  $prefix.$orignaltitle;

    $hashtags = $thetitle;

    $output .= '<li class="email">';
    $output .= '<a href="mailto:?subject='.str_replace(' ', '%20', $thetitle).'&amp;body='. str_replace(' ', '%20', $thetitle).':%0D'.get_the_permalink().'"><span class="icon-mail"> </span> <span class="sr-only">email</span> </a> </li>';
    $output .= '<li class="facebook"> <a href="https://www.facebook.com/sharer/sharer.php?u='.get_the_permalink().'" class="popup" target="_blank"> <span class="icon-social-facebook"> </span> <span class="sr-only">facebook</span> </a> </li>';
    $output.= '<li class="linkedin"> <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url='. get_the_permalink().'&amp;title='.str_replace(' ', '%20', $thetitle).'" class="popup" target="_blank"> <span class="icon-social-linkedin"></span> <span class="sr-only">linkedin</span> </a> </li>';
    $output.= '<li class="twitter"> <a href="http://twitter.com/home?status='.str_replace(' ', '%20', $thetitle).'%20'.get_the_permalink().'" data-hashtags="'.$hashtags.'" class="popup" target="_blank"> <span class="icon-social-twitter"> </span> <span class="sr-only">twitter</span> </a> </li>';
    $output .= '<li class="googleplus"> <a href="https://plus.google.com/share?url='.str_replace(' ', '%20', $thetitle).'%20'.get_the_permalink().'" class="popup" target="_blank"> <span class="icon-social-google-plus"> </span> <span class="sr-only">google+</span> </a> </li>';

    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

    $output .= '<li class="pinterest"><a href="http://pinterest.com/pin/create/button/?url='.get_the_permalink().'&amp;media='.$url.'&amp;description='.str_replace(' ', '%20', $thetitle).'%20'.get_the_permalink().'" target="_blank"> <span class="icon-social-pinterest"> </span> <span class="sr-only">pinterest</span> </a> </li>';
    $output .= '</ul></div>';
    $output .= '</a><i class="icon icon-eye"></i>'.(my_get_post_views());

    if(get_option('themetype') == 'blog') {
      $output .='<i class="icon icon-comment"></i>'.get_comments_number()." Comment<small>(s)</small></div>";
    }

    $output .="</div>";
  }


  $output .='</div>';
  $output .='</div>';

  if (isset($GLOBALS['styles'])) {
    $GLOBALS['styles'] = $GLOBALS['styles'];
  } else {
    $GLOBALS['styles'] = '';
  }

  $colour = get_post_meta($post->ID, '_pagecolour', true);

  if (!empty($colour)){
    $GLOBALS['styles'] .= ".thumbnail.thumbnail-".get_the_ID(). " .caption{ background:".$colour."; background:".hex2rgba($colour, 0.8)."}";
    $GLOBALS['styles'] .= ".thumbnail.thumbnail-".get_the_ID(). " a:hover .caption{ background:".$colour."; background:".hex2rgba($colour, 0.5)."}";
  } else {
    $addclass=  'no-col-set';
  }
?>
