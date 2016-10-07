<?php
function get_tax_navigation( $taxonomy = 'category', $direction = '' ) 
{
    // Make sure we are on a taxonomy term/category/tag archive page, if not, bail
    if ( 'category' === $taxonomy ) {
        if ( !is_category() )
            return false;
    } elseif ( 'post_tag' === $taxonomy ) {
        if ( !is_tag() )
            return false;
    } else {
        if ( !is_tax( $taxonomy ) )
            return false;
    }

    // Make sure the taxonomy is valid and sanitize the taxonomy
    if (    'category' !== $taxonomy 
       || 'post_tag' !== $taxonomy
       ) {
        $taxonomy = filter_var( $taxonomy, FILTER_SANITIZE_STRING );
    if ( !$taxonomy )
        return false;

    if ( !taxonomy_exists( $taxonomy ) )
        return false;
}

    // Get the current term object
$current_term = get_term( $GLOBALS['wp_the_query']->get_queried_object() );

    // Get all the terms ordered by slug 
$terms = get_terms( $taxonomy, ['orderby' => 'slug'] );

    // Make sure we have terms before we continue
if ( !$terms ) 
    return false;

    // Because empty terms stuffs around with array keys, lets reset them
$terms = array_values( $terms );

    // Lets get all the term id's from the array of term objects
$term_ids = wp_list_pluck( $terms, 'term_id' );

    /**
     * We now need to locate the position of the current term amongs the $term_ids array. \
     * This way, we can now know which terms are adjacent to the current one
     */
    $current_term_position = array_search( $current_term->term_id, $term_ids );

    // Set default variables to hold the next and previous terms
    $previous_term = '';
    $next_term     = '';

    // Get the previous term
    if (    'previous' === $direction 
       || !$direction
       ) {
        if ( 0 === $current_term_position ) {
            $previous_term = $terms[intval( count( $term_ids ) - 1 )];
        } else {
            $previous_term = $terms[$current_term_position - 1];
        }
    }

    // Get the next term
    if (    'next' === $direction
       || !$direction
       ) {
        if ( intval( count( $term_ids ) - 1 ) === $current_term_position ) {
            $next_term = $terms[0];
        } else {
            $next_term = $terms[$current_term_position + 1];
        }
    }

    $link = [];
    // Build the links
    if ( $previous_term ) 
        $link[] = ' La région <a href="' . esc_url( get_term_link( $previous_term ) ) . '">' . $previous_term->name . '</a>';

    if ( $next_term ) 
        $link[] = 'La région <a href="' . esc_url( get_term_link( $next_term ) ) . '">' . $next_term->name . '</a>';

    return implode( ' ...|... ', $link );
}
?>