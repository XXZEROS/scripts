<?php require_once('../../../Connections/baglanti.php'); ?>
<?php
// Load the tNG classes
require_once('../../../includes/tng/tNG.inc.php');

// Make unified connection variable
$conn_baglanti = new KT_connection($baglanti, $database_baglanti);

//Start Restrict Access To Page
$restrict = new tNG_RestrictAccess($conn_baglanti, "../../../");
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
$tfi_listkategori2 = new TFI_TableFilter($conn_baglanti, "tfi_listkategori2");
$tfi_listkategori2->addColumn("kategori.katadi", "STRING_TYPE", "katadi", "%");
$tfi_listkategori2->addColumn("kategori.katid", "NUMERIC_TYPE", "katid", "=");
$tfi_listkategori2->Execute();

// Sorter
$tso_listkategori2 = new TSO_TableSorter("rskategori1", "tso_listkategori2");
$tso_listkategori2->addColumn("kategori.katadi");
$tso_listkategori2->addColumn("kategori.katid");
$tso_listkategori2->setDefault("kategori.katid DESC");
$tso_listkategori2->Execute();

// Navigation
$nav_listkategori2 = new NAV_Regular("nav_listkategori2", "rskategori1", "../../../", $_SERVER['PHP_SELF'], 20);

//NeXTenesio3 Special List Recordset
$maxRows_rskategori1 = $_SESSION['max_rows_nav_listkategori2'];
$pageNum_rskategori1 = 0;
if (isset($_GET['pageNum_rskategori1'])) {
  $pageNum_rskategori1 = $_GET['pageNum_rskategori1'];
}
$startRow_rskategori1 = $pageNum_rskategori1 * $maxRows_rskategori1;

// Defining List Recordset variable
$NXTFilter_rskategori1 = "1=1";
if (isset($_SESSION['filter_tfi_listkategori2'])) {
  $NXTFilter_rskategori1 = $_SESSION['filter_tfi_listkategori2'];
}
// Defining List Recordset variable
$NXTSort_rskategori1 = "kategori.katid DESC";
if (isset($_SESSION['sorter_tso_listkategori2'])) {
  $NXTSort_rskategori1 = $_SESSION['sorter_tso_listkategori2'];
}
mysql_select_db($database_baglanti, $baglanti);

$query_rskategori1 = "SELECT kategori.katadi, kategori.katid FROM kategori WHERE {$NXTFilter_rskategori1} ORDER BY {$NXTSort_rskategori1}";
$query_limit_rskategori1 = sprintf("%s LIMIT %d, %d", $query_rskategori1, $startRow_rskategori1, $maxRows_rskategori1);
$rskategori1 = mysql_query($query_limit_rskategori1, $baglanti) or die(mysql_error());
$row_rskategori1 = mysql_fetch_assoc($rskategori1);

if (isset($_GET['totalRows_rskategori1'])) {
  $totalRows_rskategori1 = $_GET['totalRows_rskategori1'];
} else {
  $all_rskategori1 = mysql_query($query_rskategori1);
  $totalRows_rskategori1 = mysql_num_rows($all_rskategori1);
}
$totalPages_rskategori1 = ceil($totalRows_rskategori1/$maxRows_rskategori1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listkategori2->checkBoundries();
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
  .KT_col_katadi {width:140px; overflow:hidden;}
  .KT_col_katid {width:140px; overflow:hidden;}
</style>
</head>

<body>
<div class="KT_tng" id="listkategori2">
  <h1> Kategori Y&ouml;neticisi
  </h1>
  <a href="icerik-duz.php?no_new=1">i&ccedil;erik Ekle</a> - <a href="liste.php">i&ccedil;erik Y&ouml;neticisi</a>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listkategori2->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
        <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listkategori2'] == 1) {
?>
          <?php echo $_SESSION['default_max_rows_nav_listkategori2']; ?>
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
  if (@$_SESSION['has_filter_tfi_listkategori2'] == 1) {
?>
          <a href="<?php echo $tfi_listkategori2->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
          <?php 
  // else Conditional region2
  } else { ?>
          <a href="<?php echo $tfi_listkategori2->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
          <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="katadi" class="KT_sorter KT_col_katadi <?php echo $tso_listkategori2->getSortIcon('kategori.katadi'); ?>"> <a href="<?php echo $tso_listkategori2->getSortLink('kategori.katadi'); ?>">Katadi</a></th>
            <th id="katid" class="KT_sorter KT_col_katid <?php echo $tso_listkategori2->getSortIcon('kategori.katid'); ?>"> <a href="<?php echo $tso_listkategori2->getSortLink('kategori.katid'); ?>">Katid</a></th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listkategori2'] == 1) {
?>
            <tr class="KT_row_filter">
              <td>&nbsp;</td>
              <td><input type="text" name="tfi_listkategori2_katadi" id="tfi_listkategori2_katadi" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listkategori2_katadi']); ?>" size="20" maxlength="250" /></td>
              <td><input type="text" name="tfi_listkategori2_katid" id="tfi_listkategori2_katid" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listkategori2_katid']); ?>" size="20" maxlength="100" /></td>
              <td><input type="submit" name="tfi_listkategori2" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
            </tr>
            <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rskategori1 == 0) { // Show if recordset empty ?>
            <tr>
              <td colspan="4"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
            </tr>
            <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rskategori1 > 0) { // Show if recordset not empty ?>
            <?php do { ?>
              <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                <td><input type="checkbox" name="kt_pk_kategori" class="id_checkbox" value="<?php echo $row_rskategori1['katid']; ?>" />
                  <input type="hidden" name="katid" class="id_field" value="<?php echo $row_rskategori1['katid']; ?>" /></td>
                <td><div class="KT_col_katadi"><?php echo KT_FormatForList($row_rskategori1['katadi'], 20); ?></div></td>
                <td><div class="KT_col_katid"><?php echo KT_FormatForList($row_rskategori1['katid'], 20); ?></div></td>
                <td><a class="KT_edit_link" href="kat-duz.php?katid=<?php echo $row_rskategori1['katid']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a></td>
              </tr>
              <?php } while ($row_rskategori1 = mysql_fetch_assoc($rskategori1)); ?>
            <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listkategori2->Prepare();
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
        <a class="" href="kat-duz.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a></div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rskategori1);
?>
