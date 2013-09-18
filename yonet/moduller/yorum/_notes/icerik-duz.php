<?php require_once('../../../Connections/baglanti.php'); ?>
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

//Start Restrict Access To Page
$restrict = new tNG_RestrictAccess($conn_baglanti, "../../../");
//Grand Levels: Any
$restrict->Execute();
//End Restrict Access To Page

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("katid", true, "numeric", "", "", "", "");
$formValidation->addField("baslik", true, "text", "", "", "", "");
$formValidation->addField("icerik", true, "text", "", "", "", "");
$formValidation->addField("tarih", true, "text", "", "", "", "");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_DeleteFolder trigger
//remove this line if you want to edit the code by hand 
function Trigger_DeleteFolder(&$tNG) {
  $deleteObj = new tNG_DeleteFolder($tNG);
  $deleteObj->setBaseFolder("../../../images/");
  $deleteObj->setFolder("haber");
  return $deleteObj->Execute();
}
//end Trigger_DeleteFolder trigger

// Start Multiple Image Upload Object
$multipleImageUpload = new tNG_MImageUpload("../../../", "KT_Upload2", "baglanti");
$multipleImageUpload->setPrimaryKey("id", "{rsicerik.id}");
$multipleImageUpload->setBaseFolder("../../../images/");
$multipleImageUpload->setFolder("haber");
$multipleImageUpload->setMaxSize(500);
$multipleImageUpload->setMaxFiles(200);
$multipleImageUpload->setAllowedExtensions("bmp, jpg, jpeg, gif, png");
// End Multiple Image Upload Object

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../header/");
  $deleteObj->setDbFieldName("arkaplan");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("arkaplan");
  $uploadObj->setDbFieldName("arkaplan");
  $uploadObj->setFolder("../../../header/");
  $uploadObj->setResize("true", 700, 300);
  $uploadObj->setMaxSize(500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

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

mysql_select_db($database_baglanti, $baglanti);
$query_Recordset2 = "SELECT katadi, katid FROM kategori ORDER BY katadi";
$Recordset2 = mysql_query($query_Recordset2, $baglanti) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

// Make an insert transaction instance
$ins_icerik = new tNG_multipleInsert($conn_baglanti);
$tNGs->addTransaction($ins_icerik);
// Register triggers
$ins_icerik->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_icerik->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_icerik->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../../includes/nxt/back.php");
$ins_icerik->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$ins_icerik->registerTrigger("AFTER", "Trigger_MultipleUploadRename", 90, $multipleImageUpload);
// Add columns
$ins_icerik->setTable("icerik");
$ins_icerik->addColumn("katid", "NUMERIC_TYPE", "POST", "katid");
$ins_icerik->addColumn("baslik", "STRING_TYPE", "POST", "baslik");
$ins_icerik->addColumn("ozet", "STRING_TYPE", "POST", "ozet");
$ins_icerik->addColumn("icerik", "STRING_TYPE", "POST", "icerik");
$ins_icerik->addColumn("yazar", "STRING_TYPE", "POST", "yazar");
$ins_icerik->addColumn("tarih", "STRING_TYPE", "POST", "tarih");
$ins_icerik->addColumn("arkaplan", "FILE_TYPE", "FILES", "arkaplan");
$ins_icerik->addColumn("slidegos", "CHECKBOX_1_0_TYPE", "POST", "slidegos", "0");
$ins_icerik->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_icerik = new tNG_multipleUpdate($conn_baglanti);
$tNGs->addTransaction($upd_icerik);
// Register triggers
$upd_icerik->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_icerik->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_icerik->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../../includes/nxt/back.php");
$upd_icerik->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$upd_icerik->registerTrigger("AFTER", "Trigger_MultipleUploadRename", 90, $multipleImageUpload);
// Add columns
$upd_icerik->setTable("icerik");
$upd_icerik->addColumn("katid", "NUMERIC_TYPE", "POST", "katid");
$upd_icerik->addColumn("baslik", "STRING_TYPE", "POST", "baslik");
$upd_icerik->addColumn("ozet", "STRING_TYPE", "POST", "ozet");
$upd_icerik->addColumn("icerik", "STRING_TYPE", "POST", "icerik");
$upd_icerik->addColumn("yazar", "STRING_TYPE", "POST", "yazar");
$upd_icerik->addColumn("tarih", "STRING_TYPE", "POST", "tarih");
$upd_icerik->addColumn("arkaplan", "FILE_TYPE", "FILES", "arkaplan");
$upd_icerik->addColumn("slidegos", "CHECKBOX_1_0_TYPE", "POST", "slidegos");
$upd_icerik->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_icerik = new tNG_multipleDelete($conn_baglanti);
$tNGs->addTransaction($del_icerik);
// Register triggers
$del_icerik->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_icerik->registerTrigger("END", "Trigger_Default_Redirect", 99, "../../../includes/nxt/back.php");
$del_icerik->registerTrigger("AFTER", "Trigger_FileDelete", 98);
$del_icerik->registerTrigger("AFTER", "Trigger_DeleteFolder", 99);
// Add columns
$del_icerik->setTable("icerik");
$del_icerik->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsicerik = $tNGs->getRecordset("icerik");
$row_rsicerik = mysql_fetch_assoc($rsicerik);
$totalRows_rsicerik = mysql_num_rows($rsicerik);
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
<?=$editor;?>
</head>

<body>
<?php
	echo $tNGs->getErrorMsg();
?>
<div class="KT_tng">
  <h1>
    İçerik Yönetimi</h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <a target="_blank" onclick="<?php echo $multipleImageUpload->getUploadAction(); ?>" href="<?php echo $multipleImageUpload->getUploadLink(); ?>">Resim Yükle</a>
        <input type="hidden" name="<?php echo $multipleImageUpload->getUploadReference(); ?>" value="1" />
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rsicerik > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="katid_<?php echo $cnt1; ?>">Katid:</label></td>
            <td><select name="katid_<?php echo $cnt1; ?>" id="katid_<?php echo $cnt1; ?>">
              <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
              <?php 
do {  
?>
              <option value="<?php echo $row_Recordset2['katid']?>"<?php if (!(strcmp($row_Recordset2['katid'], $row_rsicerik['katid']))) {echo "SELECTED";} ?>><?php echo $row_Recordset2['katadi']?></option>
              <?php
} while ($row_Recordset2 = mysql_fetch_assoc($Recordset2));
  $rows = mysql_num_rows($Recordset2);
  if($rows > 0) {
      mysql_data_seek($Recordset2, 0);
	  $row_Recordset2 = mysql_fetch_assoc($Recordset2);
  }
?>
            </select>
              <?php echo $tNGs->displayFieldError("icerik", "katid", $cnt1); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="baslik_<?php echo $cnt1; ?>">Baslik:</label></td>
            <td><input type="text" name="baslik_<?php echo $cnt1; ?>" id="baslik_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsicerik['baslik']); ?>" size="32" maxlength="250" />
              <?php echo $tNGs->displayFieldHint("baslik");?> <?php echo $tNGs->displayFieldError("icerik", "baslik", $cnt1); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="ozet_<?php echo $cnt1; ?>">Ozet:</label></td>
            <td><textarea name="ozet_<?php echo $cnt1; ?>" id="ozet_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rsicerik['ozet']); ?></textarea>
              <?php echo $tNGs->displayFieldHint("ozet");?> <?php echo $tNGs->displayFieldError("icerik", "ozet", $cnt1); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="icerik_<?php echo $cnt1; ?>">Icerik:</label></td>
            <td><textarea name="icerik_<?php echo $cnt1; ?>" id="icerik_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rsicerik['icerik']); ?></textarea>
              <?php echo $tNGs->displayFieldHint("icerik");?> <?php echo $tNGs->displayFieldError("icerik", "icerik", $cnt1); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="yazar_<?php echo $cnt1; ?>">Yazar:</label></td>
            <td><input type="text" name="yazar_<?php echo $cnt1; ?>" id="yazar_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsicerik['yazar']); ?>" size="32" maxlength="250" />
              <?php echo $tNGs->displayFieldHint("yazar");?> <?php echo $tNGs->displayFieldError("icerik", "yazar", $cnt1); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="tarih_<?php echo $cnt1; ?>">Tarih:</label></td>
            <td><input type="text" name="tarih_<?php echo $cnt1; ?>" id="tarih_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsicerik['tarih']); ?>" size="32" maxlength="250" />
              <?php echo $tNGs->displayFieldHint("tarih");?> <?php echo $tNGs->displayFieldError("icerik", "tarih", $cnt1); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="arkaplan_<?php echo $cnt1; ?>">Arkaplan:</label></td>
            <td><input type="file" name="arkaplan_<?php echo $cnt1; ?>" id="arkaplan_<?php echo $cnt1; ?>" size="32" />
              <?php echo $tNGs->displayFieldError("icerik", "arkaplan", $cnt1); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="slidegos_<?php echo $cnt1; ?>">Slidegos:</label></td>
            <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rsicerik['slidegos']),"1"))) {echo "checked";} ?> type="checkbox" name="slidegos_<?php echo $cnt1; ?>" id="slidegos_<?php echo $cnt1; ?>" value="1" />
              <?php echo $tNGs->displayFieldError("icerik", "slidegos", $cnt1); ?></td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_icerik_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsicerik['kt_pk_icerik']); ?>" />
        <?php } while ($row_rsicerik = mysql_fetch_assoc($rsicerik)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['id'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <div class="KT_operations">
              <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'id')" />
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
<?php
mysql_free_result($Recordset2);
?>
