<!-- pHp section -->
<?php 

require"class/attendenceClass.php";
$db=new Attendence();
$session=$db->getSession();
$totalSessionNumber=count($session);

if(isset($_POST['session'])&&isset($_POST['submit']))
{
  $selectedSsession=$_POST['session'];
  $param1=array($selectedSsession);
  $StudentDetails=$db->getStudentDetails($param1);
  $studentNumber=count($StudentDetails);
  $param2=array($selectedSsession);
   $totalClassNumber=$db->getClassNumber($param2);
   $totalClassNumber=$totalClassNumber[0]['COUNT(*)'];
   $present=$db->getAttendencePercentage($param2);
  
   
  
}







?>






<!-- end php section -->








<?php require"include/header.php"; ?>

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
                   <label  class="col-sm-11 col-form-label"></label>
                  <div class="col-sm-1">
                    <button type="submit" name="submit" class="btn btn-primary active" >Next</button>
                  </div>
                </div>
              </form> 
  <br>
  <?php if(isset($StudentDetails)){ ?>
   <input style="margin-left:1000px; margin-bottom: 20px; height: 30px;"  type="text" id="myInput" onkeyup="myFunction()" placeholder="Search data" title="Type in a name">
  
         <table class="table table-hover " id="table">
  <thead>
    <tr class="header">
      <th scope="col">Serial</th>
      <th scope="col">Roll</th>
      <th scope="col">Name</th>
      <th scope="col">Comitted Class</th>
      <th scope="col">Present Class</th>
      <th scope="col">Percentage</th>

    </tr>
  </thead>
  <tbody>
    <?php for ($i=0; $i <$studentNumber ; $i++) { 
      # code...
    ?>
    <tr>
      <th scope="row"><?php echo $i+1; ?></th>
      <td><?php echo $StudentDetails[$i]['roll']; ?></td>
      <td><?php echo $StudentDetails[$i]['name']; ?></td>
      <td><?php  echo $totalClassNumber;  ?></td>
      <td><?php echo $present[$StudentDetails[$i]['roll']]  ?></td>
      <?php $percentage=ceil(($present[$StudentDetails[$i]['roll']]/$totalClassNumber)*100) ?>
      <td><?php echo $percentage." % " ?></td>
      
    </tr>
<?php }?>
      
  </tbody>
</table>
<?php }
else{


  ?>

  <div class="alert alert-danger" role="alert">
  There is not any data according to your input
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
  <script type="text/javascript">
    </script>
    <div id="site_info">
      
    </div>
     <script src="js/search.js"></script>
</body>
</html>
