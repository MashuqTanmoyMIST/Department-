<!-- pHp section -->
<?php require"include/header.php"; ?>

<?php 

require"class/attendenceClass.php";
$db=new Attendence();

//if(!empty(Session::get("selectedSsession")) && !empty(Session::get("year")) && !empty(Session::get("term")))
{
  $param1=array(Session::get("selectedSsession"));
 $StudentDetails=$db->getStudentDetails($param1);
 $studentNumber=count($StudentDetails);
 $param2=array(session::get("year"),Session::get("term"),"1");
 $subject=$db->getSubject($param2);
$countSubject=count($subject);

if(isset($_POST['present']) && isset($_POST['courseCode']))
{
  $present=$_POST['present'];
  $courseCode=$_POST['courseCode'];
  $element=count($present);
  $present=implode(',',$present);
  
  $date=date("d/m/Y");
  echo $courseCode;




$param3=array($present,$courseCode,Session::get("selectedSsession"),"1",$date);
$result=$db->attendenceData($param3);

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
                <h2 style='text-align: center;'> WELCOME TO ONLINE ATTENDENCE SYSTEM</h2>
                <div class="block">               
                 

                 <form action="" method="POST">

     <div class="form-group row">
      <label  class="col-sm-2 col-form-label">Class Number</label>
     <div class="col-sm-4">
      <select class="custom-select" name="year"  required="">
    <option selected disabled="">Choose...</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
    <option value="4">Four</option>
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
      <th scope="col" style="text-align: center;">Attendence</th>
    </tr>
  </thead>
  <tbody>
<tbody>
    <?php for ($i=0; $i <$studentNumber ; $i++) { 
      # code...
    ?>
    <tr>
      <th scope="row"><?php echo $i+1; ?></th>
      <td><?php echo $StudentDetails[$i]['roll']; ?></td>
      <td><?php echo $StudentDetails[$i]['name']; ?></td>
      <td>
        <div class="input-group-text">
      <input type="checkbox" name="present[]" value='<?php echo $StudentDetails[$i]['roll']; ?>' >&nbsp &nbsp PRESENT
    </div>
      </td>
      
    </tr>
<?php }?>
    
  </tbody>
   
  </table>
  <div class="form-group row">
    <label  class="col-sm-11 col-form-label"></label>
    <div class="col-sm-1">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>


<?php 
if(isset($result))
{
  ?>
  <div class="alert alert-success" role="alert">
  <h4 style="text-align: center;">Data is inserted successfully</h4>
</div>
<?php 
}

else
{
?>
<div class="alert alert-danger" role="alert">
  <h4 style="text-align: center;">Please enter the attendence</h4>
</div>

<?php
}
?>








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
