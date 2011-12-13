<?php
/**
 * Credit Count Element
 *
 * Displays the number of credits for the current user
 *
 * PHP versions 5
 *
 * Zuha(tm) : Business Management Applications (http://zuha.com)
 * Copyright 2009-2010, Zuha Foundation Inc. (http://zuhafoundation.org)
 *
 * Licensed under GPL v3 License
 * Must retain the above copyright notice and release modifications publicly.
 *
 * @copyright     Copyright 2009-2010, Zuha Foundation Inc. (http://zuha.com)
 * @link          http://zuha.com Zuha™ Project
 * @package       zuha
 * @subpackage    zuha.app.plugins.counts.views.elements
 * @since         Zuha(tm) v 0.0.1
 * @license       GPL v3 License (http://www.gnu.org/licenses/gpl.html) and Future Versions
 */
?>
<?php 
// this should be at the top of every element created with format __ELEMENT_PLUGIN_ELEMENTNAME_instanceNumber.
// it allows a database driven way of configuring elements, and having multiple instances of that configuration.
	if(!empty($instance) && defined('__ELEMENT_CREDITS_COUNT_'.$instance)) {
		extract(unserialize(constant('__ELEMENT_CREDITS_COUNT_'.$instance)));
	} else if (defined('__ELEMENT_CREDITS_COUNT')) {
		extract(unserialize(__ELEMENT_CREDITS_COUNT));
	}
// set up the config vars
	$sessionUserId = $this->Session->read('Auth.User.id');
	
 	$count = (!empty($sessionUserId) ? $this->requestAction('/credits/credits/count/'.$sessionUserId) : null);
?>

<span class="currentUserCreditCount"><?php echo $count; ?></span>