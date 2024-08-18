


<?php
get_header();
?>

<div class="archive-banner"><h1>Nos recettes</h1></div>
<div class="containerPageArchive">
    
    <div class="recipe-cards-container">
        <?php
        if (have_posts()):
            while (have_posts()): the_post(); ?>
                <div class="recipe-card">
                    <a href="<?php the_permalink(); ?>">
                        <div class="recipe-card-image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium'); ?>
                            <?php endif; ?>
                        </div>
                        <div class="recipe-card-content">
                            <h2 class="recipe-card-title"><?php the_title(); ?></h2>
                            <div class="recipe-card-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endwhile;
            the_posts_navigation();
        else:
            echo '<p>Aucune recette trouvée.</p>';
        endif;
        ?>
    </div>
</div>
<?php
get_footer();
?>




