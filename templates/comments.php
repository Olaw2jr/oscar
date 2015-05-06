<?php
if (post_password_required()) {
  return;
}
?>

<div id="comments">

  <?php if (have_comments()) : ?>
  <h3>
    <?php
      printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'sage' ), number_format_i18n( get_comments_number() ), get_the_title() );
    ?>
  </h3>
  <ol class="commentlist">
    <?php wp_list_comments('type=comment&callback=Roots\Sage\Extras\sage_comments'); ?>
  </ol><!-- /.commentlist -->

  <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
      <nav>
        <ul class="pager">
          <?php if (get_previous_comments_link()) : ?>
            <li class="previous"><?php previous_comments_link(__('&larr; Older comments', 'sage')); ?></li>
          <?php endif; ?>
          <?php if (get_next_comments_link()) : ?>
            <li class="next"><?php next_comments_link(__('Newer comments &rarr;', 'sage')); ?></li>
          <?php endif; ?>
        </ul>
      </nav>
    <?php endif; ?>
  <?php endif; // have_comments() ?>

  <?php if (!comments_open() && get_comments_number() != '0' && post_type_supports(get_post_type(), 'comments')) : ?>
    <div class="alert alert-warning">
      <?php _e('Comments are closed.', 'sage'); ?>
    </div>
  <?php endif; ?>

</div><!-- /#comments -->

<div class="comment-form-wrapper">
  <?php comment_form(); ?>
</div><!-- /.comment-form-wrapper -->
