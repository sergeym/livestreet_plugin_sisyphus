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

$config = array();

/**
 * Массив пар экшен - эвент, к формам которых будет подключен Sisyphus
 */
$config['actions'] = array(
    'topic' => 'add',
    'question' => 'add',
    'link' => 'add',
    'photoset' => 'add',
    'blog' => 'add',
);

return $config;