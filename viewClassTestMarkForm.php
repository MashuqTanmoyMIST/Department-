<!-- pHp section -->
<?php require"include/header.php"; ?>
<?php 

require"class/classTestClass.php";
$db=new classTest();
$session=$db->getSession();
$totalSessionNumber=count($session);

if(isset($_POST['session'])&&isset($_POST['year'])&&isset($_POST['term']) && isset($_POST['submit']))
{
  $selectedSsession=$_POST['session'];
  $year=$_POST['year'];
  $term=$_POST['term'];
  $_SESSION['selectedSsessionForCT']=$selectedSsession;
  $_SESSION['yearCT']=$year;
  $_SESSION['termCT']=$term;
echo $_SESSION['selectedSsessionForCT'];

   header("location:viewClassTestMark.php");
}



?>













<!-- End Php Section -->






<body>
    <div class="container_12">
        <?php require"include/adminHeader.php";
        require"include/sidebar.php";
         ?>
        
        <div class="grid_10">
    
            <div class="box round first grid ">
                <h2 style='text-align: center;color : blue;'> WELCOME TO CLASS TEST MANAGEMENT SYSTEM</h2>
                <div class="block">               
                 

     <form action="" method="POST">
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Session</label>
    <div class="col-sm-10">
     <select class="custom-select" name="session"  required="">
    <option selected disabled="">Choose...</option>
    <?php for($i=0;$i<$totalSessionNumber;$i++){ ?>
    <option value="<?php echo $session[$i]['session'] ?>"><?php echo $session[$i]['session'];?></option>
    <?php } ?>
  </select>
    </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Year</label>
    <div class="col-sm-4">
     <select class="custom-select" name="year"  required="">
    <option selected disabled="">Choose...</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
    <option value="4">Four</option>
  </select>
    </div>
    <label for="inputEmail3" class="col-sm-2 col-form-label">Term</label>
    <div class="col-sm-4">
     <select class="custom-select" name="term"  required="">
    <option selected disabled="">Choose...</option>
    <option value="1">One</option>
    <option value="2">Two</option>
  </select>
    </div>
  </div>

  <div class="form-group row">
    <label  class="col-sm-11 col-form-label"></label>
    <div class="col-sm-1">
      <button type="submit" name="submit" class="btn btn-primary active" >Next</button>
    </div>
</form> 










                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    <div id="site_info">
       
    </div>
</body>
</html>
