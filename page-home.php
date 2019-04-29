<?php 

/** 
Template Name: Home Template 
**/ 

?>

<?php get_header(); ?>

<div id="home" class="main-container">
     <div class="main wrapper clearfix">
          <div id="contentwrapper">
               <article>
                    <section> 
          						<div id="slider clearfix"> 
          						  <!-- Start Slider-->
          						  <?php echo get_new_royalslider(1); ?>
          						  <!-- End Slider --> 
          						</div> 				 
                      <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?> 
                       
                        <div id="content">
                          <div id="content-image">

                            <?php if ( has_post_thumbnail() ) {
                            ?>
                              <a href="<?php the_field('featured_image_link'); ?>" target="_blank"><?php the_post_thumbnail(); ?></a>
                            <?php  
                            } 
                            ?> 
                            <a href="<?php the_field('featured_image_link'); ?>" target="_blank"><?php the_field('featured_image_link_text'); ?></a> 

                          </div>  
                          <div id="content-header">  
                            <h1><?php the_field('title'); ?></h1>
                            <h2><?php the_field('subtitle'); ?></h2>
                          </div> 
                        </div> 
                        <div id="content-body">  
                            <?php the_content(); ?>                        
                              
                            <p>  
                              <a class="button" href="<?php the_field('button_1_link'); ?>" target="_blank"><?php the_field('button_1_link_text'); ?></a> 
                              </p>                         
                          </div>
                        <?php endwhile; ?>  
                      <?php endif; ?>       
                    </section>
               </article>
          </div>
     </div>
</div>

<?php get_footer(); ?>