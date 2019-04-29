<?php
/*
Template Name: Website Highlights Template
*/
?>

<?php get_header(); ?>

<div class="main-container page-annual-highlights">
    <div class="main wrapper clearfix">
        <div id="contentwrapper">
            <article>
                <section>
                    <div class="table-header">
                        <span class="title"><h3><?php the_title(); ?></h3></span>
                    </div>            
                    <?php if (have_posts()) : ?>

	                    <?php while (have_posts()) : the_post(); ?>

		                    <div class="table">     
		                    <table cellspacing="0" cellpadding="0" border="0" align="left">
		                        <thead>
		                            <tr class="header-row">
		                                <th><strong><?=the_field('column_1_title'); ?></strong></th>
		                                <th><strong><?=the_field('column_2_title'); ?></strong></th>
		                            </tr>
		                        </thead>
		                        <tbody>		       
					                <?php
				                    $contents = get_field('contents');

				                    $posttype = get_field('row_type_name'); 

				                   	$previous_pdf_title = get_field('previous_pdf_title');
                            		$previous_pdf_link = get_field('previous_pdf_link');

				                    if(!empty($contents)) {
				                        foreach($contents as $content) { 
				                    ?>
				                        <tr>
				                            <td><strong><?=$content['month']; ?></strong></td>
				                            <td><?=$content['on_the_website']; ?></td>              
				                        </tr>   
				                    <?php  
				                        }    
				                    }                                        
					                ?>                                          
							   </tbody>
							</table>   
							</div> 
							<?php if($previous_pdf_title) { ?>   
				                <div class="table-footer">
				                    <span class="pdf-link"><a href="<?=$previous_pdf_link;?>" target="_blank"><img src="/wp-content/themes/efamk/images/PDFlogo.png" alt="pdf" class="PDF_LogoLink"><?=$previous_pdf_title;?></a></span>
				                </div>
				            <? } ?>  	
	                    <?php endwhile; ?>              
                    <?php endif; ?>
	                 
                </section>
            </article>
        </div>
    </div>
</div>

<?php get_footer(); ?>