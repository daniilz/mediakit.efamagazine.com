<?php
/*
Template Name: Digital Specs & Rates Template
*/
?>

<?php get_header(); ?>


<div class="main-container" id="page-digital-specs-rates">

    <div class="main wrapper clearfix">

        <div id="contentwrapper">

            <article>

                <section> 
                    <div id="content">
                        <div class="content-left">
                          <div id="content-header">  
                            <h1><?=the_field('top_content_title'); ?> </h1>
                          </div>                       
                          <div id="content-body">
                             <?=the_field('top_content_text'); ?> 
                             <?php
                                $digital_plans = get_field('digital_plans');
                             ?>                                            
                          </div> 
                        </div>  
                        <div class="content-right">
                          <div class="pdfs-container">
                              <span class="pdf-link"><a href="<?=the_field('pdf_1_link');?>" target="_blank"><img src="/wp-content/themes/efamk/images/PDFlogo.png" alt="pdf" class="PDF_LogoLink"><span class="pdf"><?=the_field('pdf_1_title');?></span></a></span>
                              <span class="pdf-link pdf-link-2"><a href="<?=the_field('pdf_2_link');?>" target="_blank"><img src="/wp-content/themes/efamk/images/PDFlogo.png" alt="pdf" class="PDF_LogoLink"><span class="pdf"><?=the_field('pdf_2_title');?></span></a></span>
                          </div>
                          <div class="top-content-right">
                            <?=the_field('top_content_right'); ?>
                          </div>  
                        </div>  
                    </div> 
                    <div class="table-header">
                        <span class="title"><h3><?=the_field('table_header'); ?></h3></span>

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
                                <th><strong><?=the_field('column_6_title'); ?></strong></th>
                                <th><strong><?=the_field('column_7_title'); ?></strong></th>
                                <th><strong><?=the_field('column_8_title'); ?></strong></th>
                                <th><strong><?=the_field('column_9_title'); ?></strong></th>
                                <!--th><strong><?=the_field('column_10_title'); ?></strong></th-->
                            </tr>
                        </thead>
                        <tbody>
      
                    <?php
                    $posttype = get_field('row_type_name'); 

                    $bottom_content = get_field('bottom_content');

                    if (!empty($digital_plans)) {
                        foreach($digital_plans as $digital_plan) {
                    ?>
                            <tr>
                                <td><?=$digital_plan['size']; ?></td>
                                <td><?=$digital_plan['expanded_size']; ?></td>
                                <td><?=$digital_plan['file_size']; ?></td>
                                <td><?=$digital_plan['subload_field']; ?></td>
                                <td><?=$digital_plan['max_hosts_requests']; ?></td>
                                <td><?=$digital_plan['animation_length']; ?></td>
                                <td><?=$digital_plan['fps']; ?></td>
                                <td><?=$digital_plan['z-index']; ?></td>
                                <td><?=$digital_plan['max_cpu_usage']; ?></td>
                                <!--td><?php if($digital_plan['sample'] != "" ) { echo '<a href="' . $digital_plan["sample"] . '" target="_blank">view</a>'; } else echo "--"; ?></td-->
                            </tr>   
                    <?php  
                        }
                    }                                            
                    ?>

                       </tbody>
                    </table>
                    </div>   

                    <?php endwhile; ?>
               
                        <?php endif; ?>
                        <div class="table-footer">     
                            <p>
                                <?=$bottom_content;?>
                            </p>
                        </div> 

                    </section>

            </article>
            </div>
        </div>

    </div>

    <?php get_footer(); ?>