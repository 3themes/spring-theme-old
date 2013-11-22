<?php get_header(); ?>
	<section class="content">
		<section class="content-main post-list" role="main">
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('article clearfix'); ?> role="article">
					<header class="article-header">
						<h1 class="article-title">
							<a class="article-title-link" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h1>
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
							Categories: <?php the_category(', '); ?>
						</section>
						<section class="article-tags">
							<?php the_tags('<span class="tags-title">Tags:</span> ', ', ', ''); ?>
						</section>
					</footer>
					<hr class="article-hr" />
				</article>
			<?php endwhile; ?>
				<nav class="wp-prev-next">
					<div class="prev-link">
						<?php echo get_next_posts_link('&laquo; Older Entries') ?>
					</div>
					<div class="next-link">
						<?php echo previous_posts_link('Newer Entries &raquo;') ?>
					</div>
				</nav>
				<?php wp_link_pages(); ?>
			<?php else : ?>
				<article class="post-404">
					<header class="article-header">
						<h1 class="article-title">
							Oops! Post not found.
						</h1>
					</header>
					<section class="article-content">
						Something has gone very, very, VERY wrong. Can you make sure you clicked on the right thing?
					</section>
					<footer class="article-footer">
						<p>
							You've gotten this error message from the index.php file in the template.
						</p>
					</footer>
				</article>
			<?php endif; ?>
		</section>
		<?php get_sidebar(); ?>
	</section>
<?php get_footer(); ?>