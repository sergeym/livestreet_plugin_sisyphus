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

function PluginSisyphus_init_callback() {
    jQuery('#topic_text, #blog_description').parents('form').sisyphus();
}

function PluginSisyphus_jquery_load_callback() {
    var script = document.createElement('script');
    script.type = "text/javascript";
    script.async = true;
    script.src = DIR_WEB_ROOT + '/plugins/sisyphus/templates/skin/default/js/sisyphus/sisyphus.min.js';
    script.onload = function() { PluginSisyphus_init_callback() };
    script.onreadystatechange = function() {
        if (script.readyState == 'complete'){
            PluginSisyphus_init_callback();
            // clean up for IE and Opera
            script.onload = null;
            script.onreadystatechange = null;
        }else if(script.readyState == 'loaded'){
            eval(script);
            PluginSisyphus_init_callback();
            // clean up for IE and Opera
            script.onload = null;
            script.onreadystatechange = null;
        }
    }
    var head = document.getElementsByTagName('head')[0];
    head.appendChild(script);
}

(function(){
    if (typeof(jQuery)=='undefined') {
        var script = document.createElement('script');
        script.type = "text/javascript";
        script.async = true;
        script.src = DIR_WEB_ROOT + '/plugins/sisyphus/templates/skin/default/js/jquery/jquery-1.6.4.min.js';
        script.onload = function() { PluginSisyphus_jquery_load_callback() };
        script.onreadystatechange = function() {
            if (script.readyState == 'complete'){
                PluginSisyphus_jquery_load_callback();
                // clean up for IE and Opera
                script.onload = null;
                script.onreadystatechange = null;
            }else if(script.readyState == 'loaded'){
                eval(script);
                PluginSisyphus_jquery_load_callback();
                // clean up for IE and Opera
                script.onload = null;
                script.onreadystatechange = null;
            }
        }
        var head = document.getElementsByTagName('head')[0];
        head.appendChild(script);
    } else {
        PluginSisyphus_jquery_load_callback();
    }
})();