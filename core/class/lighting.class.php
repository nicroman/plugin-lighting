<?php

/* This file is a plugin to handle "lighting".
 *
 * A lighting object has basically 5 actions:
 *    on   (to force light on)
 *    off  (to force light off)
 *    auto (to put the lighting in auto-mode)
 *    auto_on (to set it as "on" automatically)
 *    auto_off (to se it as "off" automatically)
 * 
 * Additionnaly the lighting object has 3 states:
 *    state  (the current light state)
 *    auto_state  (the state defined with automated modes)
 *    mode   (either "force_on","force_off" or "auto")
 *    
 * Each lighting object can have "children". In that case, action commands are
 * automatically dispatched to all children.
 * When a child enters the "auto" mode, the parents are checked for "full auto children" and may move to "auto" as well.
 * 
 * A lighting object can have a timer defined. In that case, auto_on will start the timer, and auto_off will automatically be called after that time.
 * In that case, actions are slightly different:
 *    on will force light on with no timer.
 *    off will force light off, removing any timer
 *    auto will start timer if the object was on.
 *    auto_on will light on (if object is auto) and start timer.
 *    auto_off will light off (if object is auto) and remove timer.
 *
 *
 *
 */

/* * ***************************Includes********************************* */
require_once dirname(__FILE__) . '/../../../../core/php/core.inc.php';

class lighting extends eqLogic {
    /*     * *************************Attributs****************************** */



    /*     * ***********************Methode static*************************** */

    /*
     * Fonction exécutée automatiquement toutes les minutes par Jeedom
      public static function cron() {

      }
     */


    /*
     * Fonction exécutée automatiquement toutes les heures par Jeedom
      public static function cronHourly() {

      }
     */

    /*
     * Fonction exécutée automatiquement tous les jours par Jeedom
      public static function cronDayly() {

      }
     */



    /*     * *********************Méthodes d'instance************************* */

    public function preInsert() {
        
    }

    public function postInsert() {
        
    }

    public function preSave() {
        
    }

    public function postSave() {
        log::add('lighting','debug','postSave');
      
        /*$onCmd = $this->getCmd(null,'on');
        if (!is_object($onCmd)) {
          $onCmd = new lightingCmd();
		  $onCmd->setName(__('On', __FILE__));
          $onCmd->setLogicalId('on');
          $onCmd->setType('action');
          $onCmd->setSubType('other');
          $onCmd->setEqLogic_id($this->getId());
          $onCmd->setIsVisible(1);
          $onCmd->save();
        }
      
        $offCmd = $this->getCmd(null,'off');
        if (!is_object($offCmd)) {
          $offCmd = new lightingCmd();
		  $offCmd->setName(__('Off', __FILE__));
          $offCmd->setLogicalId('off');
          $offCmd->setType('action');
          $offCmd->setSubType('other');
          $offCmd->setEqLogic_id($this->getId());
          $offCmd->setIsVisible(1);
          $offCmd->save();
        }
      
        $autoCmd = $this->getCmd(null,'auto');
        if (!is_object($autoCmd)) {
          $autoCmd = new lightingCmd();
		  $autoCmd->setName(__('Auto', __FILE__));
          $autoCmd->setLogicalId('auto');
          $autoCmd->setType('action');
          $autoCmd->setSubType('other');
          $autoCmd->setEqLogic_id($this->getId());
          $autoCmd->setIsVisible(0);
          $autoCmd->save();
        }

      
        $autoOnCmd = $this->getCmd(null,'auto_on');
        if (!is_object($autoOnCmd)) {
          $autoOnCmd = new lightingCmd();
          $autoOnCmd->setName(__('Auto On', __FILE__));
          $autoOnCmd->setLogicalId('auto_on');
          $autoOnCmd->setType('action');
          $autoOnCmd->setSubType('other');
          $autoOnCmd->setEqLogic_id($this->getId());
          $autoOnCmd->setIsVisible(0);
          $autoOnCmd->save();
        }
      
        $autoOffCmd = $this->getCmd(null,'auto_off');
        if (!is_object($autoOffCmd)) {
          $autoOffCmd = new lightingCmd();
          $autoOffCmd->setName(__('Auto Off', __FILE__));
          $autoOffCmd->setLogicalId('auto_off');
          $autoOffCmd->setType('action');
          $autoOffCmd->setSubType('other');
          $autoOffCmd->setEqLogic_id($this->getId());
          $autoOffCmd->setIsVisible(0);
          $autoOffCmd->save();
        }

        $state = $this->getCmd(null, 'state');
        if (!is_object($state)) {
			$state = new lightingCmd();
        	$state->setIsVisible(0);
      		$state->setName(__('Etat',__FILE__));
      		$state->setLogicalId('state');
        	$state->setType('info');
        	$state->setSubType('binary');
        	$state->setEqLogic_id($this->getId());
        	$state->save();
        }

        $state = $this->getCmd(null, 'auto_state');
        if (!is_object($state)) {
			$state = new lightingCmd();
        	$state->setIsVisible(0);
      		$state->setName(__('Etat Mode Auto',__FILE__));
      		$state->setLogicalId('auto_state');
        	$state->setType('info');
        	$state->setSubType('binary');
        	$state->setEqLogic_id($this->getId());
        	$state->save();
        }

        $mode = $this->getCmd(null, 'mode');
        if (!is_object($mode)) {
			$mode = new lightingCmd();
        	$mode->setIsVisible(0);
      		$mode->setName(__('Mode',__FILE__));
      		$mode->setLogicalId('mode');
        	$mode->setType('info');
        	$mode->setSubType('string');
        	$mode->setEqLogic_id($this->getId());
        	$mode->save();
        }*/
    }

    public function preUpdate() {
        
    }

    public function postUpdate() {
        
    }

    public function preRemove() {
        // we also need to remove this as parent from all children
        /*
           for ($eqChild : getChildren()) {
                $eqChild->removeParent($this->getId());
           }
        */
        
       // and remove this from children in all parents
       /*
           for ($eqParent : getChildren()) {
                $eqParent->removeChild($this->getId());
           }
       */       
    }

    public function postRemove() {
        
    }
  
    public function prepareCommands() {

      
    }


    /*     * *********************Commandes************************* */

 
    public function doOn($_fromParent = false) {
    }
  
    public function doOff($_fromParent = false) {
    }
  
    // Moves the object in "automated" mode.  
    public function doAuto($_fromParent = false) {
    }
  
    // Called manually (or from parent dispatch)
    // Will start a timer if needed to automatically call doAutoOff
    public function doAutoOn($_fromParent = false) {
    }
  
    // Called manually, from parent dispatch, or automatically if a timer is defined after auto_on
    public function doAutoOff($_fromParent = false) {
      
    }

    /*
     * Non obligatoire mais permet de modifier l'affichage du widget si vous en avez besoin
      public function toHtml($_version = 'dashboard') {

      }
     */

    /*     * **********************Getteur Setteur*************************** */
    public function getMode() {
    }
  
    public function getState() {
    }
  
    public function getAutoState() {
    }
}

class lightingCmd extends cmd {
    /*     * *************************Attributs****************************** */


    /*     * ***********************Methode static*************************** */


    /*     * *********************Methode d'instance************************* */

    /*
     * Non obligatoire permet de demander de ne pas supprimer les commandes même si elles ne sont pas dans la nouvelle configuration de l'équipement envoyé en JS
      public function dontRemoveCmd() {
      return true;
      }
     */

    public function execute($_options = array()) {
      
      // 
        
    }

    /*     * **********************Getteur Setteur*************************** */
}

?>
