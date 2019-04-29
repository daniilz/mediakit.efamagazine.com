<?php

/*

Template Name: Print Highlights Template

*/

?>

<?php get_header(); ?>
     
<div class="main-container page-editorial-cal">
    <div class="main wrapper clearfix">
        <div id="contentwrapper">
            <article>
                <section>
                    <?php 
                    if(get_field('current_pdf_title')) {   
                    ?>
                        <div class="pdfs-container float-right">
                            <span class="pdf-link"><a href="<?=get_field('current_pdf_link');?>" target="_blank"><img src="/wp-content/themes/efamk/images/PDFlogo.png" alt="pdf" class="PDF_LogoLink"><?=get_field('current_pdf_title');?></a></span>
                        </div>
              
                    <?
                        } 
                    ?>   
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
                                <th><strong><?=the_field('column_3_title'); ?></strong></th>
                                <th><strong><?=the_field('column_4_title'); ?></strong></th>
                                <th><strong><?=the_field('column_5_title'); ?></strong></th>
                            </tr>
                        </thead>
                        <tbody>       
                            <?php
                            $print_highlights = get_field('print_highlights');

                            $posttype = get_field('row_type_name'); 
                            $previous_pdf_title = get_field('previous_pdf_title');
                            $previous_pdf_link = get_field('previous_pdf_link');
                            $bottom_content_left = get_field('bottom_content_left');
                            $bottom_content_right = get_field('bottom_content_right');

                           
                            if(!empty($print_highlights)) {
                                foreach($print_highlights as $print_highlight) { 
                            ?>
                                <tr>
                                    <td><strong><?=$print_highlight['issue']; ?></strong></td>
                                    <td><?=$print_highlight['ad_close']; ?></td>
                                    <td><?=$print_highlight['materials_close']; ?></td>
                                    <td><?=$print_highlight['featured_content']; ?></td>
                                    <td><?=$print_highlight['show_distribution']; ?></td>             
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

                <div class="content-bottom-left">
                <p>
                    <?=$bottom_content_left;?>
                </p>
                </div>
                <div class="content-bottom-right">
                <p>
                    <?=$bottom_content_right;?>
                </p>
                </div> 
                </section>
            </article>
        </div>
    </div>
</div>

<?php get_footer(); ?>