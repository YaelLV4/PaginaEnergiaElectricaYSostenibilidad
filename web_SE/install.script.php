<?php
/**
 * @version   $Id: install.script.php 59786 2013-06-20 17:00:35Z btowles $
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - ${copyright_year} RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

/**
 *
 */
class PlgSystemRocketLauncherInstallerScript
{
	/**
	 * @param $type
	 * @param $parent
	 *
	 * @return bool
	 */
	public function preflight($type, $parent)
	{
		JError::raiseWarning(100, 'The RocketLauncher package should not be installed into an existing Joomla instance. It is a stand-alone Joomla installation.');
		return false;
	}
}
