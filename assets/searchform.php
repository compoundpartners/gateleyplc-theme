<?php 
$idnumber = get_the_ID() . "-" . rand(); echo '<form method="get" id="searchform-'.$idnumber.'" class="searchform form-inline" action="' . home_url( '/' ) . '" >
	 <div class="form-group"><label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search" class="form-control input-lg"/>
	</div>
	<!--<input type="hidden" value="1" name="sentence" /> --> <button type="submit" class="btn 
	btn-link"><em class="icon-search"></em> <span class="sr-only">Search</span></button>
	</form>';
?>