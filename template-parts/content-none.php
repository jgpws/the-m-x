<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_M.X.
 */

?>

<section class="no-results not-found jgd-grid">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'the-m-x' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<?php
				'<p>' . wp_kses( 
					sprintf(
					/* translators: %1$s: Link to new post in WordPress, %2$s: closing </a> tag */
					esc_html__( 'Ready to publish your first post?', 'the-m-x' ) . '%1$s' . esc_html__( 'Get started here', 'the-m-x' ) . '%2$s', '<a href="' . esc_url( admin_url( 'post-new.php' ) ) . '">', '</a>' ), 
				array( 
					'a' => array( 
						'href' => array(), 
					), 
				)
			) . '</p>';

		elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'the-m-x' ); ?></p>
			<?php
				get_search_form();

		else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'the-m-x' ); ?></p>
			<?php
				get_search_form();

		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
