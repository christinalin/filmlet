<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>


<!-- Homepage post -->
<?php if ( is_home() ) : ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>
		style="background:url('<?php the_post_thumbnail_url(); ?>') center / contain no-repeat">

		<div class="post_banner">
				<div class="post_banner_column_left">
					<div class="post_thumb_container">
					<a href="<?php the_permalink(); ?>">
					<?php
					  $mykey_values = get_post_custom_values( 'post_logo' );
					  foreach ( $mykey_values as $key => $value ) {
								echo "<img class='post_logo_img' src='/wp-content/themes/filmlet/assets/images/" . $value.  ".png' />";
					  }

					?>
					</a>
				</div>
				</div> <!-- post_banner_column_left -->

				<div class="post_banner_column_right">
				<header class="entry-header">
					<?php
					if ( 'post' === get_post_type() ) {
							if ( ! is_single() ) {
								// twentyseventeen_edit_link();
							};
					};

					if ( is_single() ) {
						the_title( '<h1 class="entry-title">', '</h1>' );
					} elseif ( is_front_page() && is_home() ) {
						the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
					} else {
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					}
					?>
				</header><!-- .entry-header -->


				<div class="entry-content">
					<?php

						$mykey_values = get_post_custom_values( 'post_subtext' );
						foreach ( $mykey_values as $key => $value ) {
							echo  $value;
						}

					?>
				</div><!-- .entry-content -->
			</div> <!-- post_banner_column_right -->

		</div> <!-- post_banner -->
	</article><!-- #post-## -->


<!--  not the Home Page -->
<?php else : ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php

		  $mykey_values = get_post_custom_values( 'post_logo' );
		  foreach ( $mykey_values as $key => $value ) {
				echo "<img class='post_logo' src='/wp-content/themes/filmlet/assets/images/" . $value.  ".png' />";
		  }

		?>	<?php
		if ( is_sticky() && is_home() ) :
			echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
		endif;
		?>




		<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
			<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
				</a>
			</div><!-- .post-thumbnail -->
		<?php endif; ?>

		<header class="entry-header">
			<?php
			if ( 'post' === get_post_type() ) {
					if ( ! is_single() ) {
						// twentyseventeen_edit_link();
					};
			};

			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} elseif ( is_front_page() && is_home() ) {
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
			?>
		</header><!-- .entry-header -->


		<div class="entry-content">
			<?php

				$mykey_values = get_post_custom_values( 'post_subtext' );
				foreach ( $mykey_values as $key => $value ) {
					echo  $value;
				}

			?>
		</div><!-- .entry-content -->

		<?php
		if ( is_single() ) {
			twentyseventeen_entry_footer();
		}
		?>

	</article><!-- #post-## -->
<?php endif; ?>
