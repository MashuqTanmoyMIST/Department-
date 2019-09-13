<!-- pHp section -->
<?php 
session_start();
require"class/classTestClass.php";
$db=new classTest();

if(isset($_SESSION['selectedSsessionForCT']) && isset($_SESSION['yearCT']) && isset($_SESSION['termCT']))
{
  $param1=array($_SESSION['selectedSsessionForCT']);
 $StudentDetails=$db->getStudentDetails($param1);
 $studentNumber=count($StudentDetails);
 $param2=array($_SESSION['yearCT'],$_SESSION['termCT'],"1");
 $subject=$db->getSubject($param2);
$countSubject=count($subject);

if(empty($_POST['roll']) && empty($_POST['courseCode']) && empty($_POST['mark'])&& !isset($_POST['submit']))
 {echo "data thus thas!!";}

  else
{
  $roll=$_POST['roll'];
  $courseCode=$_POST['courseCode'];
  $mark=$_POST['mark'];
  $numberOfClassTest=$_POST['numberOfClassTest'];
  $param3=array($mark,$roll,$courseCode);
  $result=$db->updateCTMark($param3,$numberOfClassTest);
  header("location:update-ct-mark.php");
  exit;
 
  unset($_SESSION['selectedSsessionForCT'],$_SESSION['yearCT'],$_SESSION['termCT']);
}


}
?>


<?php require"include/header.php"; ?>

<body>
    <div class="container_12">
        <?php require"include/adminHeader.php";
        require"include/sidebar.php";
         ?>
        
        <div class="grid_10">
    
            <div class="box round first grid">
                <h2 style='text-align: center ;color : blue;'>WELCOME TO CLASS TEST MARKS MANAGEMENT SYSTEM</h2>
                <div class="block">               
                 
       <form action="" method="POST" name="form">
              
          <div class="form-group row">
          <label  class="col-sm-2 col-form-label">Subject Name</label>
             <div class="col-sm-4">
            <select class="custom-select" name="courseCode" required>
              <option selected disabled="">Choose...</option>
              <?php for($i=0;$i<$countSubject;$i++){
                ?>
              <option value="<?php echo $subject[$i]['courseCode'] ?>"><?php echo $subject[$i]['courseName'] ?></option>
          <?php } ?>
            </select>
          </div>
        </div>


             <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Class Test</label>
             <div class="col-sm-4">
            <select class="custom-select" name="numberOfClassTest"  required="">
            <option selected disabled="">Choose...</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
            
          </select>
          </div>
        </div>
        

              <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Roll</label>
             <div class="col-sm-4">
            <select class="custom-select" name="roll"  required="">
            <option selected disabled="">Choose...</option>
          <?php 
          if(isset($studentNumber))
             for ($i=0; $i <$studentNumber ; $i++) { 
              # code...
            ?>
            
              <option   value="<?php echo $StudentDetails[$i]['roll']; ?>"><?php echo $StudentDetails[$i]['roll']; ?></option>
              
        <?php }?>
         </select>
          </div>
            </div>
            
           <div class="form-group row">
            <label  class="col-sm-2 col-form-label">Input Mark</label>
            <div class="col-sm-4">
              <input class="form-control" type="number" placeholder="Enter CT Mark"  name="mark" />
            </div>
          </div>
           
          
          <div class="form-group row">
            <label  class="col-sm-2 col-form-label"></label>
            <div class="col-sm-4">
              <button type="submit" value="submit"  name="submit" onclick="return mess();" class="btn btn-primary">Update</button>
            </div>
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
    <script type="text/javascript">
    function mess()
    {
      alert("Data inserted Successfully");
      return true;
    }

    </script>
</body>
</html>
