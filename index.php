<!doctype html>
<html lang="en">
  <head>
    <title>currency Exchange by phpbootstrap.com</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
  </head>
<body style="padding-top:200px;background:#22A7F0">
<div class="container col-lg-7 col-sm-12">
<?php $xml=simplexml_load_file("http://www.ecb.int/stats/eurofxref/eurofxref-daily.xml") or die("Error: Cannot create object");?>
<?php echo "<h6 style='color:#fff'>Last Update : ".$xml->Cube->Cube['time'] . "</span><br><br>";?>
	<div class="row">
		<div class="col-lg-5 col-sm-12">
			<div class="input-group mb-3">
              <div class="input-group-prepend">
                  <input type="number" min="0" class="form-control" value="1.0" id="input1">
              </div>
               <select class="custom-select" id="c1">
               	<option value="1">EUR</option>
                  <?php
                    for ($i=0; $i < sizeof($xml->Cube->Cube->Cube) ; $i++) { 
                    	echo '<option value="'.$xml->Cube->Cube->Cube[$i]['rate'].'">'.$xml->Cube->Cube->Cube[$i]['currency'].'</option>';
                    }
                  ?>
               </select>
            </div>
		</div>
		<div class="col-lg-2 col-sm-12 text-center" style="font-size: 25px"><b><i class="fa fa-exchange"></i></b></div>
		<div class="col-lg-5 col-sm-12">
			<div class="input-group mb-3">
              <div class="input-group-prepend">
                  <input type="number" class="form-control" id="input2" value="1.0" readonly>
              </div>
               <select class="custom-select" id="c2">
               	<option value="1">EUR</option>
                  <?php
                    for ($i=0; $i < sizeof($xml->Cube->Cube->Cube) ; $i++) { 
                    	echo '<option value="'.$xml->Cube->Cube->Cube[$i]['rate'].'">'.$xml->Cube->Cube->Cube[$i]['currency'].'</option>';
                    }
                  ?>
               </select>
            </div>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script type="text/javascript">
  function change(){
    var number=parseFloat($('#input1').val());
     var rate=parseFloat($('#c1').val());
     var rate1=parseFloat($('#c2').val());
     $('#input2').val(number/rate*rate1);
  }
  $('#input1,#input2,#c1,#c2').on('input',function(e){
     change();
  });
</script>
 </body>
</html>