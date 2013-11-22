<?php get_header(); ?>
<section class="content">
	<section class="content-main post-single" role="main">
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			<article class="post article" id="post-<?php the_ID(); ?>" <?php post_class('article clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				<header class="article-header">
					<h1 class="article-title" title="<?php the_title_attribute(); ?>" itemprop="headline">
						<?php the_title(); ?>
					</h1>
					<aside class="article-byline vcard">
						<?php spring_posted_on(); ?>
					</aside>
				</header>
				<section class="article-content clearfix"  itemprop="articleBody">
					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					}
					the_content();
					?>
				</section>
				<footer class="article-footer">
					<section class="article-categories">
						Categories: <?php the_category(', '); ?>
					</section>
					<section class="article-tags">
						<?php the_tags( __( '<span class="tags-title">Tags:</span> ', 'spring_theme' ), ', ', '' ); ?>
					</section>
				</footer>
				<section class="comments">
					<?php comments_template( '/comments.php' ); ?>
				</section>
			</article>
			<nav class="paginated-posts">
				<?php wp_link_pages(); ?>
			</nav>
		<?php endwhile; ?>
		<?php else : ?>
			<article class="post-404">
				<header class="article-header">
					<h1 class="article-title">
						<?php _e( 'Oops! Post not found.', 'spring_theme' ); ?>
					</h1>
				</header>
				<section class="article-content clearfix">
					<?php _e( 'Something has gone very, very, VERY wrong. Can you make sure you clicked on the right thing?', 'spring_theme' ); ?>
				</section>
				<footer class="article-footer">
					<p>
						<?php _e( 'You\'ve gotten this error message from the sidebar.php file in the template.', 'spring_theme' ); ?>
					</p>
				</footer>
			</article>
		<?php endif; ?>
	</section>
	<?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>