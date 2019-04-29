<?php

/** 
Template Name: Audience Template 
**/

?>

<?php get_header(); ?>

<div id="audience" class="main-container">
    <div class="main wrapper clearfix">
        <div id="contentwrapper">
           <article>
              <section>                    

      						<?php if (have_posts()) : ?>
        					   <?php while (have_posts()) : the_post(); ?>
        				
                        <div class="content">
                          <div class="content-left">
                            <?php the_field('left_content'); ?>                        
                          </div>
                          <div class="content-mobile">  
                             <?php the_field('mobile_content'); ?>                                                                              
                          </div> 
                            <div class="clearfix">
                            <?php if  (the_field('button_1_link')) { ?>
                            <p class="button-fix">
                              <a class="button" href="<?php the_field('button_1_link'); ?>" target="_blank"><?php the_field('button_1_link_text'); ?></a> 
                            </p>
                            <? } ?>
                            </div>  
                        </div>	

        						  <?php endwhile; ?>
      						<?php endif; ?>
  					   </section>
  				  </article>
  			</div>
	 </div>	
</div>     
<?php get_footer(); ?>