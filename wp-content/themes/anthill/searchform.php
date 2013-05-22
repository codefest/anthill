<?php
/**
 * Custom search form based on wordpress default 
 * Supports custom icon button 
 *
 * @package WordPress
 * @subpackage Anthill
 * @since Anthill 0.1
 * @TODO edit icon to match new custom icon solution
 * @TODO ver 2: fancify with 'dropdown' filtering for search type -mc
 */
?>
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div><label class="screen-reader-text" for="s">Search for:</label>
        <input type="text" value="" name="s" id="s" /><button type="submit" class="button primary" id="searchsubmit">
                <i class="icon-search"></i><span class="screen-reader-text"> Search</span>
        </button>
    </div>
</form>