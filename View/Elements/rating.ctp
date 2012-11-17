<?php

if (empty($rating)) {
	echo __('Be the first to rate!');
} else {
	echo str_repeat('<div class="ui-stars-star ui-stars-star-on"><a title=""></a></div>', $rating);
}
?>
