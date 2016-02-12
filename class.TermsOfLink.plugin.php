<?php if (!defined('APPLICATION')) exit();
/*
Copyright 2008, 2014 Vanilla Forums Inc.
This file is part of Garden.
Garden is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
Garden is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
You should have received a copy of the GNU General Public License along with Garden.  If not, see <http://www.gnu.org/licenses/>.
Contact Vanilla Forums Inc. at support [at] vanillaforums [dot] com
*/

$PluginInfo['TermsOfLink'] = array(
   'Description' => "This plugin add Terms of service link at the footer of all pages.",
   'Version' => '1.2',
   'Author' => "Kube17",
   'AuthorEmail' => 'loic@kube17.fr',
   'AuthorUrl' => "http://kube17.fr",
   'License' => "GNU GLP2"
);

class TermsOfLink extends Gdn_Plugin {

	public function __construct() {
		
	}


	public function Base_Render_Before($Sender) {
		if (InSection('Dashboard')) return;
		
		//GET THE CONFIGURATION VALUES
		$TOS = T('TermsOfService');
		$TOSUrl = Gdn::Config('Garden.TermsOfService', '#');
		
		// ADD CONTENT TO ASSET
		$Content = '<div><center><a id="TermsOfService" class="Popup" target="terms" href="'.$TOSUrl.'">'.$TOS.'</a></center></div>';
		$Sender->addAsset('Foot', $Content, 'TermsOfServiceLink');
	}
	
}
