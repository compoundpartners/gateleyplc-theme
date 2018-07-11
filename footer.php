<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gateley-plc
 */

?>
</div>
<!-- #content -->
<div id="footer" class="site-footer vertical-height">
     <div class="container">
          <div class="row">

          <?php for ($x = 1; $x <= get_theme_mod("footer_cols_count"); $x++) {
			echo "<div class='vc_col-md-". (12/get_theme_mod("footer_cols_count")) ."'>";
 dynamic_sidebar( 'footer-sidebar-'.$x );
 echo "</div>";
		}?>
          </div>
     </div>
</div>
<footer id="copyright" class="site-info-footer small-vertical-height">
     <div class="container">
     <div class="row">
          <div class="site-info vc_col-md-12">
               <p class="copyright">Copyright &copy; by <?php echo get_theme_mod("copyright_text");?>. All Rights Reserved.</p>
          </div>
          <!-- .site-info -->
     </div></div>
</footer>
<!-- #colophon -->
</div>
<!-- #page -->
</article>

<?php wp_footer();
?>
<?php $allpages= get_option('allpage'); ?>
<?php $allpagesxhome= get_option('allpagexhome'); ?>
<?php
if(!empty($allpages)) {
echo $allpages;
}
if(!empty($allpagesxhome) && !is_front_page()) {
echo $allpagesxhome;
}
?>
</body></html>
