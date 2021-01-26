<?php

/*
 *
 This file is part of the Modifications plugin.

 Order plugin is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 Stevenes Donato; either version 2 of the License, or
 (at your option) any later version.

 Order plugin is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with GLPI; along with itilcategorygroups. If not, see <http://www.gnu.org/licenses/>.
 --------------------------------------------------------------------------
 @package   loginselectentity
 @author    Cleber Anderson
 @copyright Copyright (c) 2021 Cleber Anderson
 @license   GPLv3
            http://www.gnu.org/licenses/gpl.txt
 @link      https://github.com/stdonato/glpi-modifications
 @link      http://www.glpi-project.org/
 @since     2018
 --------------------------------------------------------------------------
 */

/**
 * @name plugin_loginselectentity_install
 * @access public
 * @return boolean
 */

function plugin_init_loginselectentity() {
  
   global $PLUGIN_HOOKS, $LANG ;
	
	$PLUGIN_HOOKS['csrf_compliant']['loginselectentity'] = true;         
   
   $plugin = new Plugin();
   if ($plugin->isInstalled('loginselectentity') && $plugin->isActivated('loginselectentity')) {

	   Plugin::registerClass('PluginMod', [
	      'addtabon' => ['Config']
	   ]);
	             
	   $PLUGIN_HOOKS['config_page']['loginselectentity'] = 'config.php';
	   $PLUGIN_HOOKS['add_javascript']['loginselectentity'][] = "scripts/stats.js";
	   $PLUGIN_HOOKS['add_javascript']['loginselectentity'][] = "scripts/ind.js";
 	   include('install.php');                     
 	}  
 	
 	if ($plugin->isInstalled('loginselectentity') && !$plugin->isActivated('loginselectentity')) {
		 	include('uninstall.php'); 
 	}
 	
}


function plugin_version_loginselectentity(){
	global $DB, $LANG;

	return array('name'			   => __('GLPI Select Entity Login'),
					'version' 			=> '1.0.0',
					'author'			   => '<a href="mailto:cadomingos.die@gmail.com"> Cleber Anderson </b> </a>',
					'license'		 	=> 'GPLv2+',
					'homepage'			=> 'https://github.com/CaDomingos/glpi-selectloginentity',
					'minGlpiVersion'	=> '9.4.0');
}

function plugin_loginselectentity_check_prerequisites(){
     if (GLPI_VERSION >= '9.5.0'){   	
	         return true;	     	         
     } 
     else {
         echo "GLPI version not compatible need >= 9.3.0";
     }
}


function plugin_loginselectentity_check_config($verbose=false){
	if ($verbose) {
		echo 'Installed / not configured';
	}
	return true;
}


?>
