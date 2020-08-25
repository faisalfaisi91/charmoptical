<?php

/**
 * The blog template file.
 *
 * @package flatsome
 */

get_header();

?>
<div class="container">
	<div id="content" class="blog-wrapper blog-archive page-wrapper">
		<?php get_template_part('template-parts/posts/layout', get_theme_mod('blog_layout', 'right-sidebar')); ?>
	</div>
</div>

<?php get_footer(); ?>