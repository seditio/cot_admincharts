<?php
/**
* [SEDBY] Admin Charts Plugin
*
* @package admincharts
* @author Dmitri Beliavski
* @copyright (c) 2023 seditio.by
*/

defined('COT_CODE') or die('Wrong URL');

// Resources::linkFileFooter($cfg['plugins_dir'].'/admincharts/js/resize-observer.umd.min.js', 'js');

Resources::linkFileFooter($cfg['plugins_dir'].'/admincharts/js/chart.umd.min.js', 'js', 70);
Resources::linkFileFooter($cfg['plugins_dir'].'/admincharts/js/mycharts.js', 'js', 71);

Resources::linkFileFooter($cfg['plugins_dir'].'/admincharts/css/admincharts.css', 'css');
