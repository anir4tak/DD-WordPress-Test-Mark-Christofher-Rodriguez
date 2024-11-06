<?php
/*
Template Name: Deer Tests
*/

get_header();

// Custom query to fetch Deer Tests posts
$args = array(
    'post_type' => 'deer_tests',
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => -1
);
$deer_tests_query = new WP_Query($args);
?>
<div class="deer-tests-container">
    <?php if ($deer_tests_query->have_posts()) : ?>
        <?php while ($deer_tests_query->have_posts()) : $deer_tests_query->the_post(); ?>
            <div class="deer-test-item">
                <h2><?php the_title(); ?></h2>
                <div><?php the_field('description'); ?></div>
                <div>
                    <strong>Start Date:</strong> <?php the_field('start_date'); ?><br>
                    <strong>End Date:</strong> <?php the_field('end_date'); ?><br>
                </div>
                <div>
                    <?php $image = get_field('cover_image'); ?>
                    <?php if ($image) : ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    <?php endif; ?>
                </div>
                <div>
                    <a href="<?php the_field('application_link'); ?>"><?php the_field('application_link'); ?></a>
                </div>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p>No Deer Tests found.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
