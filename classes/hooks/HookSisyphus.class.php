<?php
/*
 * Copyright © 2011 Sergey Marin
 *
 * Плагин Sisyphus: защита данных в HTML формах с помощью jQuery плагина Sisyphus.js
 * Автор: Sergey Marin
 * Профиль: http://livestreet.ru/profile/HangGlider/
 * Сайт: http://sergeymarin.com
 *
 * jQuery плагин Sisyphus:
 * Автор: Alexander Kaupanin
 * Email: kaupanin@gmail.com
 * Сайт: https://github.com/simsalabim/sisyphus
 *
 * GNU General Public License, version 2:
 * http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 */

class PluginSisyphus_HookSisyphus extends Hook {

    protected  $aActions = array();

    public function RegisterHook() {
        $aActions = Config::Get('plugin.sisyphus.actions');

        //Вставка контролов публикации и удаления в форму редактирования топика
        foreach($aActions as $sActionName => $aHookAction) {
            $this->AddHook("action_init_action".strtolower($sActionName)."_before", "HookTopicShow", __CLASS__);
        }
        // информация о плагине
        $this->AddHook("template_copyright", "HookPluginNotice", __CLASS__);
    }

    public function HookTopicShow() {
        $aActions = Config::Get('plugin.sisyphus.actions');
        $currentAction = Router::getInstance()->GetAction();
        $currentEvent = Router::getInstance()->GetActionEvent();

        if ($this->_CheckCurrentActionEvent()) {
           $this->Viewer_AppendScript(Plugin::GetTemplateWebPath(__CLASS__).'js/starter.js');
        }
    }

	public function HookPluginNotice() {
		if ($this->_CheckCurrentActionEvent()) {
			return '<div>HTML form protected with <a href="http://sergeymarin.com#sisyphus">Sisyphus Plugin</a></div>';
        }
	}

    protected function _CheckCurrentActionEvent() {
        $aActions = Config::Get('plugin.sisyphus.actions');
        $currentAction = Router::getInstance()->GetAction();
        $currentEvent = Router::getInstance()->GetActionEvent();

        return (isset($aActions[$currentAction]) && $aActions[$currentAction]==$currentEvent);
    }

}