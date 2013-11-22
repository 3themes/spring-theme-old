<?php get_header(); ?>
	<section class="content">
		<section class="content-main post-list" role="main">
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('article clearfix'); ?> role="article">
					<header class="article-header">
						<h1 class="article-title">
							<a class="article-title-link" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h1>
						<aside class="article-byline vcard">
							<?php spring_posted_on(); ?>
						</aside>
					</header>
					<main class="article-content clearfix">
						<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail();
						}
						the_content();
						?>
					</main>
					<footer class="article-footer">
						<section class="article-categories">
							<?php _e( 'Categories:', 'spring_theme' ); ?> <?php the_category( ', ' ); ?>
						</section>
						<section class="article-tags">
							<?php the_tags( __( '<span class="tags-title">Tags:</span> ', 'spring_theme' ), ', ', '' ); ?>
						</section>
					</footer>
					<hr class="article-hr" />
				</article>
			<?php endwhile; ?>
				<nav class="wp-prev-next">
					<div class="prev-link">
						<?php echo get_next_posts_link( __( '&laquo; Older Entries', 'spring_theme' ) ) ?>
					</div>
					<div class="next-link">
						<?php echo previous_posts_link( __( 'Newer Entries &raquo;', 'spring_theme' ) ) ?>
					</div>
				</nav>
				<?php wp_link_pages(); ?>
			<?php else : ?>
				<article class="post-404">
					<header class="article-header">
						<h1 class="article-title">
							<?php _e( 'Oops! Post not found.', 'spring_theme' ); ?>
						</h1>
					</header>
					<section class="article-content">
						<?php _e( 'Something has gone very, very, VERY wrong. Can you make sure you clicked on the right thing?', 'spring_theme' ); ?>
					</section>
					<footer class="article-footer">
						<p>
							<?php _e( 'You\'ve gotten this error message from the index.php file in the template.', 'spring_theme' ); ?>
						</p>
					</footer>
				</article>
			<?php endif; ?>
		</section>
		<?php get_sidebar(); ?>
	</section>
<?php get_footer(); ?>