<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=admin.home
[END_COT_EXT]
==================== */

 /**
 * [SEDBY] Admin Charts Plugin
 *
 * @package admincharts
 * @author Dmitri Beliavski
 * @copyright (c) 2023 seditio.by
 */

defined('COT_CODE') or die('Wrong URL.');

include_once cot_incfile('admincharts', 'plug', 'resources');
include_once cot_langfile('admincharts', 'plug');

Cot::$db->registerTable('stats');
$db_stats = Cot::$db->stats;

global $Ls;

$period_days = 20;
$period_days_str = cot_declension($period_days, $Ls['Days']);

$period_months = 6;
$period_months_str = cot_declension($period_months, $Ls['Months']);

// Hits Chart

$defaultTimeZone = !empty(Cot::$cfg['defaulttimezone']) ? Cot::$cfg['defaulttimezone'] : 'UTC';
$timeZone = new \DateTimeZone($defaultTimeZone);
$startDate = new \DateTimeImmutable('-' . $period_days . ' days', $timeZone);
$start = $startDate->format('Y-m-d');

$res_days = Cot::$db->query("SELECT * FROM $db_stats WHERE stat_name LIKE '20%' AND stat_name > '{$start}' ORDER BY stat_name ASC LIMIT $period_days");

$dates_days = $visits_days = '';

foreach ($res_days as $row) {
  (!empty($dates_days)) && $dates_days .= ",";
  (!empty($visits_days)) && $visits_days .= ",";
  $dates_days .= date("d.m", strtotime($row['stat_name']));
  $visits_days .= $row['stat_value'];
}

$res_months = Cot::$db->query("SELECT * FROM $db_stats WHERE stat_name LIKE '20%' ORDER BY stat_name DESC");

if ($sql->rowCount() > 0) {
  $hits_m = [];
  foreach ($res_months as $row) {
    $hm = mb_substr($row['stat_name'], 5, 2);
    if (!isset($hits_m[$hm])) {
      $hits_m[$hm] = 0;
    }
    $hits_m[$hm] += $row['stat_value'];
  }
  $hits_m = array_reverse(array_slice($hits_m, 0, $period_months, true), true);

  $visits_months = implode(",", array_values($hits_m));

  $dates_months = '';
  foreach (array_keys($hits_m) as $row) {
    !empty($dates_months) && $dates_months .= ",";
    $dates_months .= $L['ac_' . $row];
  }
}

// Metas fill out chart

// Pages
$res_p1 = Cot::$db->query("SELECT COUNT(*) FROM $db_pages WHERE (page_metatitle != '' OR page_metadesc != '') AND page_state = 0")->fetchColumn();
$res_p2 = Cot::$db->query("SELECT COUNT(*) FROM $db_pages WHERE (page_metatitle = '' OR page_metadesc = '') AND page_state = 0")->fetchColumn();
$metas_pages = $res_p1 . ',' . $res_p2;

// Structure
// $res_s1 = Cot::$db->query("SELECT COUNT(DISTINCT(config_subcat)) FROM $db_config WHERE config_owner = 'module' AND config_subcat != '__default' AND config_name LIKE 'meta%' AND config_value != ''")->fetchColumn();
$res_s1 = Cot::$db->query("SELECT COUNT(DISTINCT(config_subcat)) FROM $db_config WHERE config_name LIKE 'meta%' AND config_value != ''")->fetchColumn();
$res_s2 = Cot::$db->query("SELECT COUNT(*) FROM $db_structure")->fetchColumn();
$res_s2 = $res_s2 - $res_s1;

$metas_structure = $res_s1 . ',' . $res_s2;
$colors = "rgb(117,183,152);rgb(234,134,143)";

// Output to TPL-tag

$tt = new XTemplate(cot_tplfile('admincharts', 'plug'));
$tt->parse('MAIN');
$charts = $tt->text('MAIN');
$t->assign('ADMIN_HOME_CHARTS', $charts);
