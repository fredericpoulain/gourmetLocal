<?php
get_header();
?>
<div class="single-banner">
    <h1><?php the_title(); ?></h1>
</div>
<div class="containerPageSingle">
    <?php
    if (have_posts()):
        while (have_posts()):
            the_post();
            get_template_part('template-parts/content', 'single');
            
            // Inclure les commentaires et le formulaire de commentaire
            if (comments_open() || get_comments_number()):
                comments_template();
            endif;
        endwhile;
    endif;
    ?>
</div>
<?php
get_footer();
?>
