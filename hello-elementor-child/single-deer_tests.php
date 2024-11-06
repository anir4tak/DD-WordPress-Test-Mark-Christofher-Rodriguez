<?php
if (get_post_type() !== 'deer_tests') {
    wp_redirect(home_url());
    exit;
}

get_header();

$button = get_field('application_link');
// Start the loop to display content
if (have_posts()) : while (have_posts()) : the_post();
?>
    <div class="single-deer-test">
        <h1><?php the_title(); ?></h1>
        
        <div class="deer-test-meta">
            <strong>Start Date:</strong> <?php the_field('start_date'); ?><br>
            <strong>End Date:</strong> <?php the_field('end_date'); ?><br>
        </div>
        
        <div class="deer-test-flex">
            <div class="deer-test-image">
                <?php $image = get_field('cover_image'); ?>
                <?php if ($image) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                <?php endif; ?>
            </div>
            
             <div class="deer-test-content"> 
                <div class="deer-test-description">
                    <?php the_field('description'); ?>
                </div>

                <div class="deer-test-application-link">
                    <a href="<?= $button['url'] ?>"><?= $button['title'] ?></a>
                </div>
             </div>       

        </div>


    </div>
    
    <div class="post-navigation">
        <?php previous_post_link('%link', 'Previous'); ?> | <?php next_post_link('%link', 'Next'); ?>
    </div>

<?php
// End the loop
endwhile; endif;

get_footer();
