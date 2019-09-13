<?php require"include/header.php"; ?>
<!-- pHp section -->
<?php 

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
  print_r($roll);
  $numberOfClassTest=$_POST['numberOfClassTest'];
  
  $date=date("d/m/Y");
  $param3=array("1",$courseCode,$_SESSION['selectedSsessionForCT'],$date);
  $result=$db->inputCTMarks($param3,$numberOfClassTest,$roll,$mark);
  header("location:takeClassTestMark.php");
  exit;
 
 // unset($_SESSION['selectedSsessionForCT'],$_SESSION['yearCT'],$$_SESSION['termCT']);
}


}
?>




<body>
    <div class="container_12">
        <?php require"include/adminHeader.php";
        require"include/sidebar.php";
         ?>
        
        <div class="grid_10">
    
            <div class="box round first grid">
                <h2 style='text-align: center;'>WELCOME TO CLASS TEST MARKS MANAGEMENT SYSTEM</h2>
                <div class="block">               
                 
       <form action="" method="POST" name="form">

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
          <label  class="col-sm-2 col-form-label" style="text-align:right;">Subject Name</label>
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

          <table class="table table-hover">
          <thead >
            <tr>
              <th scope="col">SL</th>
              <th scope="col">Roll</th>
              <th scope="col">Name</th>
              <th scope="col" style="text-align: center;">Marks</th>
            </tr>
          </thead>
          <tbody>
        <tbody>
          <?php 
          if(isset($studentNumber))
             for ($i=0; $i <$studentNumber ; $i++) { 
              # code...
            ?>
            <tr>
              <th scope="row"><?php echo $i+1; ?></th>
              <td><?php echo $StudentDetails[$i]['roll']; ?></td>
              <input type="hidden" name="roll[]" value="<?php echo $StudentDetails[$i]['roll']; ?>">
              <td><?php echo $StudentDetails[$i]['name']; ?></td>
              <td>
              <input class="form-control" type="number" name="mark[]" required="" >
            
              </td>
              
            </tr>
        <?php }?>
            
          </tbody>
           
          </table>
          <div class="form-group row">
            <label  class="col-sm-11 col-form-label"></label>
            <div class="col-sm-1">
              <button type="submit" value="submit"  name="submit" onclick="return mess();" class="btn btn-primary">Submit</button>
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
