<?php
/**
 * Search Form template
 *
 * @package CONEXI
 * @author Template Path
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}
?>
<div class="sidebar-search">
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="searchform custom">
		<div class="form-group">
			<input type="search"  name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Search Here...', 'conexi' ); ?>" />
			<button type="submit"><i class="fa fa-search"></i></button>
		</div>
	</form>
</div>
