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

// Load the tNG classes
require_once('../../../includes/tng/tNG.inc.php');

// Load the KT_back class
require_once('../../../includes/nxt/KT_back.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../../../");

// Make unified connection variable
$conn_baglanti = new KT_connection($baglanti, $database_baglanti);

// Start trigger
$formValidation = new tNG_FormValidation();
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
$ins_kategori = new tNG_multipleInsert($conn_baglanti);
$tNGs->addTransaction($ins_kategori);
// Register triggers
$ins_kategori->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_kategori->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_kategori->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../../includes/nxt/back.php");
// Add columns
$ins_kategori->setTable("kategori");
$ins_kategori->addColumn("katadi", "STRING_TYPE", "POST", "katadi");
$ins_kategori->setPrimaryKey("katid", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_kategori = new tNG_multipleUpdate($conn_baglanti);
$tNGs->addTransaction($upd_kategori);
// Register triggers
$upd_kategori->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_kategori->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_kategori->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../../includes/nxt/back.php");
// Add columns
$upd_kategori->setTable("kategori");
$upd_kategori->addColumn("katadi", "STRING_TYPE", "POST", "katadi");
$upd_kategori->setPrimaryKey("katid", "NUMERIC_TYPE", "GET", "katid");

// Make an instance of the transaction object
$del_kategori = new tNG_multipleDelete($conn_baglanti);
$tNGs->addTransaction($del_kategori);
// Register triggers
$del_kategori->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_kategori->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../../includes/nxt/back.php");
// Add columns
$del_kategori->setTable("kategori");
$del_kategori->setPrimaryKey("katid", "NUMERIC_TYPE", "GET", "katid");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rskategori = $tNGs->getRecordset("kategori");
$row_rskategori = mysql_fetch_assoc($rskategori);
$totalRows_rskategori = mysql_num_rows($rskategori);
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
<?php echo $tNGs->displayValidationRules();?>
<script src="../../../includes/nxt/scripts/form.js" type="text/javascript"></script>
<script src="../../../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: true,
  show_as_grid: true,
  merge_down_value: true
}
</script>
</head>

<body>
<?php
	echo $tNGs->getErrorMsg();
?>
<div class="KT_tng">
  <h1>
    Kategori Yöneticisi</h1><a href="icerik-duz.php?no_new=1">İçerik Ekle</a> - <a href="liste.php">İçerik Yöneticisi</a>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rskategori > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="katadi_<?php echo $cnt1; ?>">Katadi:</label></td>
            <td><input type="text" name="katadi_<?php echo $cnt1; ?>" id="katadi_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rskategori['katadi']); ?>" size="32" maxlength="250" />
              <?php echo $tNGs->displayFieldHint("katadi");?> <?php echo $tNGs->displayFieldError("kategori", "katadi", $cnt1); ?></td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_kategori_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rskategori['kt_pk_kategori']); ?>" />
        <?php } while ($row_rskategori = mysql_fetch_assoc($rskategori)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['katid'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <div class="KT_operations">
              <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'katid')" />
            </div>
            <input type="submit" name="KT_Update1" value="<?php echo NXT_getResource("Update_FB"); ?>" />
            <input type="submit" name="KT_Delete1" value="<?php echo NXT_getResource("Delete_FB"); ?>" onclick="return confirm('<?php echo NXT_getResource("Are you sure?"); ?>');" />
            <?php }
      // endif Conditional region1
      ?>
          <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="return UNI_navigateCancel(event, '../../../includes/nxt/back.php')" />
        </div>
      </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>
</body>
</html>