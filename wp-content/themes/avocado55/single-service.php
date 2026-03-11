<?php
get_header();

if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();

    if ( have_rows( 'page_content' ) ) {
        while ( have_rows( 'page_content' ) ) {
          the_row();

          $block_name = strtolower( str_replace( '_', '-', get_row_layout() ) );
          get_template_part('blocks/' . $block_name);
        }
    }
  }
}

get_footer();
