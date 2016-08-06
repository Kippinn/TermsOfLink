<?php if (!defined('APPLICATION')) exit();

// Terms of link addon init.
$PluginInfo['TermsOfLink'] = array(
   'Description' => "This plugin add Terms of service link at the footer of all pages.",
   'Version' => '1.3',
   'Author' => "Kube17",
   'AuthorEmail' => 'bobbamac@hotmail.fr',
   'AuthorUrl' => "http://kube17.tk",
   'License' => "GNU GPLv2"
);

class TermsOfLink extends Gdn_Plugin {

    public function __construct() {
        // WHAT's THE HELL IS THAT?
    }


    public function Base_Render_Before($Sender) {
        if (InSection('Dashboard')) return;
        
        //GET THE CONFIGURATION VALUES
        $TOS = t('TermsOfService');
        $TOSUrl = Gdn::Config('Garden.TermsOfService', '#');
        
        // ADD CONTENT TO ASSET
        $Content = '<div><center><a id="TermsOfService" class="Popup" target="terms" href="'.$TOSUrl.'">'.$TOS.'</a></center></div>';
        $Sender->addAsset('Foot', $Content, 'TermsOfServiceLink');
    }
    
}
