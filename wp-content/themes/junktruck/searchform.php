<?php
/**
 * The template for displaying search form.
 *
 * @package JunkTruck
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label></label>
	<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'junktruck' ) ?></span>
	<input type="search" class="search-form__field" placeholder="<?php echo esc_attr_x( 'Enter keyword search', 'placeholder', 'junktruck' ) ?>" value="<?php echo get_search_query(); ?>" name="s">
	<button type="submit" class="search-form__submit"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 118.783 118.783" xml:space="preserve"><path d="M115.97,101.597L88.661,74.286c4.64-7.387,7.333-16.118,7.333-25.488c0-26.509-21.49-47.996-47.998-47.996 S0,22.289,0,48.798c0,26.51,21.487,47.995,47.996,47.995c10.197,0,19.642-3.188,27.414-8.605l26.984,26.986 c1.875,1.873,4.333,2.806,6.788,2.806c2.458,0,4.913-0.933,6.791-2.806C119.72,111.423,119.72,105.347,115.97,101.597z M47.996,81.243c-17.917,0-32.443-14.525-32.443-32.443s14.526-32.444,32.443-32.444c17.918,0,32.443,14.526,32.443,32.444 S65.914,81.243,47.996,81.243z"/></svg></button>
</form>