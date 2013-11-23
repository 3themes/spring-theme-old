<?php

    // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
        <section class="warning"><?php _e( 'This post is password protected. If you would like to contribute to the conversation, please sign in.', 'spring_theme' ); ?></section>
        <?php return;
    }
?>

<!-- COMMENTS TEMPLATE -->
<?php if ( have_comments() ) : ?>
    <h2 class="comment-title">
        <?php printf( _nx( 'There is <span>1</span> comment.', 'There are <span>%1s</span> comments.', get_comments_number(), 'comments title', 'spring_theme' ), number_format_i18n( get_comments_number() ) ); ?>
    </h2>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <nav class="comment-nav" role="navigation">
            <div class="comment-nav-previous">
                <?php previous_comments_link() ?>
            </div>
            <div class="comment-nav-next">
                <?php next_comments_link() ?>
            </div>
        </nav>
    <?php endif; ?>

    <ol class="comment-list">
        <?php wp_list_comments(); ?>
    </ol>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <nav class="comment-nav" role="navigation">
            <div class="comment-nav-previous">
                <?php previous_comments_link() ?>
            </div>
            <div class="comment-nav-next">
                <?php next_comments_link() ?>
            </div>
        </nav>
    <?php endif; ?>

<?php endif; ?>

<?php comment_form(); ?>