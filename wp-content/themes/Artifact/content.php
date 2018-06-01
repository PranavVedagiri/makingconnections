<?php
/**
 * @package artifacat
 */
?>

<div class="blogitem"><a href="<?php the_permalink(); ?>" class="blogitemlink">
	<div class="blogoverlay fade">
		<div class="bloginfo">
			<h2 class="bloghead"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<p class="blogmeta">
				<?php
				$categories = get_the_category();
				$categories = array_slice( $categories, 0, 2 );
				$separator = ' / ';
				$output = '';
				if ( $categories ) {
					foreach ( $categories as $category ) {
						$output .= '<a href="' . get_category_link( $category->term_id ) . '">' . $category->cat_name . '</a>' . $separator;
					}
					echo substr( $output, 0, -3);
				}
				?>
			</p>
		</div>
	</div></a>
	<?php the_post_thumbnail(); ?>
    <?php if ( has_post_thumbnail() ) {
the_post_thumbnail( 'post-page', array( 'class' => '' ) );
} else { ?>
<img src="<?php bloginfo('template_directory'); ?>/img/defaultimage.png" alt="<?php the_title(); ?>" />
<?php } ?>
</a></div><!-- End .blogitem -->
