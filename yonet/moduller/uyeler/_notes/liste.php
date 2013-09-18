<?php require_once('../../../Connections/baglanti.php'); ?>
<?php
// Load the tNG classes
require_once('../../../includes/tng/tNG.inc.php');

// Make unified connection variable
$conn_baglanti = new KT_connection($baglanti, $database_baglanti);

//Start Restrict Access To Page
$restrict = new tNG_RestrictAccess($conn_baglanti, "../");
//Grand Levels: Any
$restrict->Execute();
//End Restrict Access To Page
?>
<?php
// Load the common classes
require_once('../../../includes/common/KT_common.php');

// Load the required classes
require_once('../../../includes/tfi/TFI.php');
require_once('../../../includes/tso/TSO.php');
require_once('../../../includes/nav/NAV.php');

// Make unified connection variable
$conn_baglanti = new KT_connection($baglanti, $database_baglanti);

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

// Filter
$tfi_listicerik3 = new TFI_TableFilter($conn_baglanti, "tfi_listicerik3");
$tfi_listicerik3->addColumn("kategori.katid", "NUMERIC_TYPE", "katid", "=");
$tfi_listicerik3->addColumn("icerik.baslik", "STRING_TYPE", "baslik", "%");
$tfi_listicerik3->addColumn("icerik.yazar", "STRING_TYPE", "yazar", "%");
$tfi_listicerik3->addColumn("icerik.tarih", "STRING_TYPE", "tarih", "%");
$tfi_listicerik3->Execute();

// Sorter
$tso_listicerik3 = new TSO_TableSorter("rsicerik1", "tso_listicerik3");
$tso_listicerik3->addColumn("kategori.katadi");
$tso_listicerik3->addColumn("icerik.baslik");
$tso_listicerik3->addColumn("icerik.yazar");
$tso_listicerik3->addColumn("icerik.tarih");
$tso_listicerik3->setDefault("icerik.id DESC");
$tso_listicerik3->Execute();

// Navigation
$nav_listicerik3 = new NAV_Regular("nav_listicerik3", "rsicerik1", "../../../", $_SERVER['PHP_SELF'], 20);

mysql_select_db($database_baglanti, $baglanti);
$query_Recordset1 = "SELECT katadi, katid FROM kategori ORDER BY katadi";
$Recordset1 = mysql_query($query_Recordset1, $baglanti) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_baglanti, $baglanti);
$query_Recordset2 = "SELECT katadi, katid FROM kategori ORDER BY katadi";
$Recordset2 = mysql_query($query_Recordset2, $baglanti) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

//NeXTenesio3 Special List Recordset
$maxRows_rsicerik1 = $_SESSION['max_rows_nav_listicerik3'];
$pageNum_rsicerik1 = 0;
if (isset($_GET['pageNum_rsicerik1'])) {
  $pageNum_rsicerik1 = $_GET['pageNum_rsicerik1'];
}
$startRow_rsicerik1 = $pageNum_rsicerik1 * $maxRows_rsicerik1;

// Defining List Recordset variable
$NXTFilter_rsicerik1 = "1=1";
if (isset($_SESSION['filter_tfi_listicerik3'])) {
  $NXTFilter_rsicerik1 = $_SESSION['filter_tfi_listicerik3'];
}
// Defining List Recordset variable
$NXTSort_rsicerik1 = "icerik.id DESC";
if (isset($_SESSION['sorter_tso_listicerik3'])) {
  $NXTSort_rsicerik1 = $_SESSION['sorter_tso_listicerik3'];
}
mysql_select_db($database_baglanti, $baglanti);

$query_rsicerik1 = "SELECT kategori.katadi AS katid, icerik.baslik, icerik.yazar, icerik.tarih, icerik.slidegos, icerik.id FROM icerik LEFT JOIN kategori ON icerik.katid = kategori.katid WHERE {$NXTFilter_rsicerik1} ORDER BY {$NXTSort_rsicerik1}";
$query_limit_rsicerik1 = sprintf("%s LIMIT %d, %d", $query_rsicerik1, $startRow_rsicerik1, $maxRows_rsicerik1);
$rsicerik1 = mysql_query($query_limit_rsicerik1, $baglanti) or die(mysql_error());
$row_rsicerik1 = mysql_fetch_assoc($rsicerik1);

if (isset($_GET['totalRows_rsicerik1'])) {
  $totalRows_rsicerik1 = $_GET['totalRows_rsicerik1'];
} else {
  $all_rsicerik1 = mysql_query($query_rsicerik1);
  $totalRows_rsicerik1 = mysql_num_rows($all_rsicerik1);
}
$totalPages_rsicerik1 = ceil($totalRows_rsicerik1/$maxRows_rsicerik1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listicerik3->checkBoundries();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../../../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../../../includes/common/js/base.js" type="text/javascript"></script>
<script src="../../../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../../../includes/skins/style.js" type="text/javascript"></script>
<script src="../../../includes/nxt/scripts/list.js" type="text/javascript"></script>
<script src="../../../includes/nxt/scripts/list.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_LIST_SETTINGS = {
  duplicate_buttons: true,
  duplicate_navigation: true,
  row_effects: true,
  show_as_buttons: true,
  record_counter: true
}
</script>
<style type="text/css">
  /* Dynamic List row settings */
  .KT_col_katid {width:140px; overflow:hidden;}
  .KT_col_baslik {width:140px; overflow:hidden;}
  .KT_col_yazar {width:140px; overflow:hidden;}
  .KT_col_tarih {width:140px; overflow:hidden;}
</style>
</head>

<body>
<div class="KT_tng" id="listicerik3">
  <h1> İ&ccedil;erik Y&ouml;neticisi
  </h1><a href="kat-duz.php?no_new=1">Kategori Ekle</a> - <a href="kat.php">Kategori Y&ouml;neticisi</a>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listicerik3->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
        <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listicerik3'] == 1) {
?>
          <?php echo $_SESSION['default_max_rows_nav_listicerik3']; ?>
          <?php 
  // else Conditional region1
  } else { ?>
          <?php echo NXT_getResource("all"); ?>
          <?php } 
  // endif Conditional region1
?>
<?php echo NXT_getResource("records"); ?></a> &nbsp;
        &nbsp;
        <?php 
  // Show IF Conditional region2
  if (@$_SESSION['has_filter_tfi_listicerik3'] == 1) {
?>
          <a href="<?php echo $tfi_listicerik3->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
          <?php 
  // else Conditional region2
  } else { ?>
          <a href="<?php echo $tfi_listicerik3->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
          <?php } 
  // endif Conditional region2
?>
      </div>
      <table width="120%" cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th width="43"> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th width="140" class="KT_sorter KT_col_katid <?php echo $tso_listicerik3->getSortIcon('kategori.katadi'); ?>" id="katid"> <a href="<?php echo $tso_listicerik3->getSortLink('kategori.katadi'); ?>">Katid</a></th>
            <th width="140" class="KT_sorter KT_col_baslik <?php echo $tso_listicerik3->getSortIcon('icerik.baslik'); ?>" id="baslik"> <a href="<?php echo $tso_listicerik3->getSortLink('icerik.baslik'); ?>">Baslik</a></th>
            <th width="140" class="KT_sorter KT_col_yazar <?php echo $tso_listicerik3->getSortIcon('icerik.yazar'); ?>" id="yazar"> <a href="<?php echo $tso_listicerik3->getSortLink('icerik.yazar'); ?>">Yazar</a></th>
            <th width="168" class="KT_sorter KT_col_tarih <?php echo $tso_listicerik3->getSortIcon('icerik.tarih'); ?>" id="tarih"> <a href="<?php echo $tso_listicerik3->getSortLink('icerik.tarih'); ?>">Tarih</a></th>
            <th width="221">&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listicerik3'] == 1) {
?>
            <tr class="KT_row_filter">
              <td>&nbsp;</td>
              <td><select name="tfi_listicerik3_katid" id="tfi_listicerik3_katid">
                <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listicerik3_katid']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
                <?php
do {  
?>
                <option value="<?php echo $row_Recordset2['katid']?>"<?php if (!(strcmp($row_Recordset2['katid'], @$_SESSION['tfi_listicerik3_katid']))) {echo "SELECTED";} ?>><?php echo $row_Recordset2['katadi']?></option>
                <?php
} while ($row_Recordset2 = mysql_fetch_assoc($Recordset2));
  $rows = mysql_num_rows($Recordset2);
  if($rows > 0) {
      mysql_data_seek($Recordset2, 0);
	  $row_Recordset2 = mysql_fetch_assoc($Recordset2);
  }
?>
              </select></td>
              <td><input type="text" name="tfi_listicerik3_baslik" id="tfi_listicerik3_baslik" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listicerik3_baslik']); ?>" size="20" maxlength="250" /></td>
              <td><input type="text" name="tfi_listicerik3_yazar" id="tfi_listicerik3_yazar" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listicerik3_yazar']); ?>" size="20" maxlength="250" /></td>
              <td><input type="text" name="tfi_listicerik3_tarih" id="tfi_listicerik3_tarih" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listicerik3_tarih']); ?>" size="20" maxlength="250" /></td>
              <td><input type="submit" name="tfi_listicerik3" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
            </tr>
            <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rsicerik1 == 0) { // Show if recordset empty ?>
            <tr>
              <td colspan="6"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
            </tr>
            <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rsicerik1 > 0) { // Show if recordset not empty ?>
            <?php do { ?>
              <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                <td><input type="checkbox" name="kt_pk_icerik" class="id_checkbox" value="<?php echo $row_rsicerik1['id']; ?>" />
                  <input type="hidden" name="id" class="id_field" value="<?php echo $row_rsicerik1['id']; ?>" /></td>
                <td><div class="KT_col_katid"><?php echo KT_FormatForList($row_rsicerik1['katid'], 20); ?></div></td>
                <td><div class="KT_col_baslik"><?php echo KT_FormatForList($row_rsicerik1['baslik'], 20); ?></div></td>
                <td><div class="KT_col_yazar"><?php echo KT_FormatForList($row_rsicerik1['yazar'], 20); ?></div></td>
                <td><div class="KT_col_tarih"><?php echo KT_FormatForList($row_rsicerik1['tarih'], 20); ?></div></td>
                <td bgcolor="#000000"><a class="KT_edit_link" href="icerik-duz.php?id=<?php echo $row_rsicerik1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a></td>
              </tr>
              <?php } while ($row_rsicerik1 = mysql_fetch_assoc($rsicerik1)); ?>
            <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listicerik3->Prepare();
            require("../../../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
        </div>
      </div>
      <div class="KT_bottombuttons">
        <div class="KT_operations"> <a class="KT_edit_op_link" href="#" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("edit_all"); ?></a> <a class="KT_delete_op_link" href="#" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("delete_all"); ?></a></div>
        <span>&nbsp;</span>
        <select name="no_new" id="no_new">
          <option value="1">1</option>
          <option value="3">3</option>
          <option value="6">6</option>
        </select>
        <a class="" href="icerik-duz.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a></div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);

mysql_free_result($rsicerik1);
?>
