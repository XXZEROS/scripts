<script type="text/javascript">
function openKCFinder2(field) {
    window.KCFinder = {
        callBack: function(url) {
            field.value = url;
            window.KCFinder = null;
        }
    };
    window.open('up/browse.php?type=image&lang=tr&dir=back/public', 'kcfinder_textbox',
        'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
        'resizable=1, scrollbars=0, width=800, height=600'
    );
}
</script>
<?
 include("Connections/baglanti.php");
 
 if($_SESSION['uyeid']<3 or $_SESSION['uyeid']=="61" ) { 

 if($_POST['ekle']=="ok") {
	 echo "<br>----eklendi amıık";
	 
	 $degistir = mysql_query("UPDATE arka SET back='".$_POST['resim']."' WHERE i='1'"); 
	 
	 }
 
 
 $menuler2 = mysql_query ("select * from arka where i='1'");
while ($d = mysql_fetch_array($menuler2))  {  
?>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <th scope="col"><img src="http://www.asuitiraf.com<?=$d['back'];?>" width="500" height="315"></th>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="5">
      <tr>
        <th scope="col">Resim seç:</th>
        <th scope="col"><form name="form1" method="post" action="">
          <input name="resim" type="text" id="resim"  onclick="openKCFinder2(this)"
    value="<?=$d['back'];?>" style="width:300px;cursor:pointer"><input name="ekle" type="hidden" value="ok"><input name="Submit" type="submit" value="Kaydet">
        </form></th>
      </tr>
    </table></td>
  </tr>
</table>

<?	
} } else { echo "sektir lan";} ?>