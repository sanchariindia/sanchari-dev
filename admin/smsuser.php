<?php
include_once("include/header.php");
 include_once("include/menu.php");
?>
<script>
	function countchar(){
	var maxLength = 160;
	$('#smscount').keyup(function() {
	  var textlen = maxLength - $(this).val().length;
	  $('#rchars').html(textlen);
	}); 
	}
	function countcharHindi(){
	var maxLength = 70;
	$('#transliterateDiv').keyup(function() {
	  var textlen = maxLength - $(this).val().length;
	  $('#rcharsHindi').html(textlen);
	}); 
	}
</script>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("elements", "1", {
            packages: "transliteration"
          });
      function onLoad() {
        var options = {
            sourceLanguage:
                google.elements.transliteration.LanguageCode.ENGLISH,
            destinationLanguage:
                [google.elements.transliteration.LanguageCode.HINDI],
            shortcutKey: 'ctrl+g',
            transliterationEnabled: true
        };
 
        var control =
            new google.elements.transliteration.TransliterationControl(options);
 
        // Enable transliteration in the editable elements with id
        // 'transliterateDiv'.
        control.makeTransliteratable(['transliterateDiv']);
        // control.makeTransliteratable(['transliterateDiv2']);
      }
      google.setOnLoadCallback(onLoad);
    </script>

  <div class="content-wrapper">
<div class="alert alert-success">
  <?php
if(isset($_SESSION['msg']) && $_SESSION['msg']!='')
{ 
	echo $_SESSION["msg"];$_SESSION["msg"]='';
}else{
	echo $_SESSION["e_msg"]; $_SESSION["e_msg"]='';
}?>
</div>
     
	<section class="content-header">
      <h1>Sent <small></small></h1> 
      <ol class="breadcrumb">
		  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	 	  <li class="active">Dashboard</li>
	   </ol>
	</section>
    <section class="content">
	<div class="row">
    
        		<div class="col-md-12">
            	<div class="box box-primary">
                            <div class="box-header with-border">
                              <h3 class="box-title">Sent SMS</h3>
                            </div>
                <div class="box-body">
                
                <form id="frm" name="frm" action="action/smsuser_submit.php" method="post" />
                

    <div class="control-group" id="">
    <div class="form-group">
    <label class="col-sm-3 control-label">Enter SMS</label>
    </div>
    <div class="col-sm-9">
	<textarea type="text" id="smscount" name="sms" onkeyup="countchar()" maxlength="160" class="form-control"  placeholder="SMS"></textarea> 
    <span id="rchars">160</span> Character(s) Remaining
    </div>
</div>
    <p>&nbsp;</p>
    <div class="control-group" id="">
    <div class="form-group">
    <label class="col-sm-3 control-label">Enter SMS In Hindi</label>
    </div>
    <div class="col-sm-9">
	<textarea type="text" id="transliterateDiv" onkeyup="countcharHindi()" maxlength="70" name="sms_hindi" class="form-control" placeholder="SMS"></textarea> 
        <span id="rcharsHindi">70</span> Character(s) Remaining

    </div>
</div>



<table id="employee1" class="table table-striped table-bordered">
<thead>
<tr>
<th>S.No</th>
<th>Name</th>
<th>Email</th>
<th>Mobile Number</th>
<th><input type="checkbox" name="" onclick="selectAll(this)" value="" /></th>
</tr>
</thead>
<tbody>
<?php 
$s=1; 
$db->where("status",1);
$rs = $db->get($tblUser);
foreach($rs as $row){  
?> 
<tr>
<td><?php echo $s;?></td> 
<td><?php echo $row["name"];?></td>  
<td><?php echo $row["email"];?></td> 
<td><?php echo $row["mobile"];?></td> 
<td><input type="checkbox" id="sms_number" value="<?php echo $row["mobile"];?>" name="sms_number[]" /></td> 
</tr>
<?php $s++;}?> 
</tbody> 
</table>


<div class="control-group" id="">
<div align="center" class="col-sm-12">
<input type="submit" id="submit" name="submit" class="btn btn-primary" value="Submit"/>
</div> 
    
</div>                   

            		</div>
                            
                </form>        
                </div>
                </div>
       

</div>
</section>
</div>
<script language="JavaScript">
	function selectAll(source) {
	checkboxes = document.getElementsByName('sms_number[]');
		for(var i in checkboxes)
			checkboxes[i].checked = source.checked;
	}
</script>        
<?php include_once("include/footer.php");?>