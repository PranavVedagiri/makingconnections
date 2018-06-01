<?php
/**
 * @package artifact
 */
?>

	<div id="content">
		<a href="#comments" class="commentlink">
			<div class="postcomments"><i class="fa fa-comment"></i><span><?php echo get_comments_number(); ?></span>
			</div>
		</a>

		<h2 class="post-title"><?php the_title(); ?></h2>

		<p class="post-category">
			<?php
			$categories = get_the_category();
			$separator = ' / ';
			$output = '';
			if ( $categories ) {
				foreach ( $categories as $category ) {
					$output .= '<a href="' . get_category_link( $category->term_id ) . '">' . $category->cat_name . '</a>' . $separator;
				}
				echo substr( $output, 0, -3 );
			}
			?>
		</p>

		<?php
		the_post_thumbnail( 'post-page', array( 'class' => 'mainimage' ) );
		the_content();
		?>

		<div id="bottommeta">
			<?php
			the_date();
			echo '<br>';
			the_tags( __('Tags: ', 'artifact'), '  ', '' );
			?>
		</div>
		<!-- End #bottommeta -->

	</div><!-- End #content -->