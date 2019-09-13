<?php require"include/header.php"; ?>
<?php 

require"class/classTestClass.php";
$db=new classTest();


if(isset($_SESSION['selectedSsessionForCT']) && isset($_SESSION['yearCT']) && isset($_SESSION['termCT']))
{
  echo $_SESSION['selectedSsessionForCT'];
 
 $param2=array($_SESSION['yearCT'],$_SESSION['termCT']);
 $subject=$db->getSubjectView($param2);
$countSubject=count($subject);

if(isset($_POST['courseCode']) && isset($_POST['submit']))
{
   $courseCode=$_POST['courseCode'];
  $param=array($_SESSION['selectedSsessionForCT'],$courseCode);
  echo $courseCode;
  $CT_1=$db->getCT1mark($param); 
  $CT_2=$db->getCT2mark($param);
  $CT_3=$db->getCT3mark($param);
  $param=array($_SESSION['selectedSsessionForCT']);
  $StudentDetails=$db->getStudentDetails($param);
 
  $studentNumber=count($StudentDetails);
}


}


?>






<!-- end php section -->










<body>
    <div class="container_12">
        <?php require"include/adminHeader.php";
        require"include/sidebar.php";
         ?>
        
        <div class="grid_10">
    
            <div class="box round first grid">
                <h2 style='text-align: center; color : blue;'> WELCOME TO CLASS TEST MANAGEMENT SYSTEM</h2>
             <div class="block">  

               <form action="" method="POST">
                <div class="form-group row">
                  <label  class="col-sm-2 col-form-label">Select Subject</label>
                  <div class="col-sm-10">
                   <select class="custom-select" name="courseCode"  required="">
                  <option selected disabled="">Choose...</option>
                  <?php for($i=0;$i<$countSubject;$i++){ ?>
                  <option value="<?php echo $subject[$i]['courseCode'] ?>"><?php echo $subject[$i]['courseName']; ?></option>
                  
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
      <th scope="col">CT 1</th>
      <th scope="col">CT 2</th>
      <th scope="col">CT 3</th>
      <th scope="col">Obtained Mark</th>
       <th scope="col">Teacher Name</th>

    </tr>
  </thead>
  <tbody>
    <?php for ($i=0; $i <$studentNumber ; $i++) { 
       $ctMark1=0;
        $ctMark2=0;
        $ctMark3=0;
       for($j=0;$j<$studentNumber;$j++)
       {
        if(isset($CT_1[$j]['roll']))
        if($StudentDetails[$i]['roll']==$CT_1[$j]['roll'])
       {
        $ctMark1=$CT_1[$j]['mark_1'];
        break;
       }
     }
     for($j=0;$j<$studentNumber;$j++){
      if(isset($CT_2[$j]['roll']))
      {
        if($StudentDetails[$j]['roll']==$CT_2[$j]['roll'])
       {
        $ctMark2=$CT_2[$j]['mark_2'];
        break;
       }
     }
   }
     for($j=0;$j<$studentNumber;$j++){
      if(isset($CT_3[$j]['roll']))
      {
        if($StudentDetails[$j]['roll']==$CT_3[$j]['roll'])
       {
        $ctMark3=$CT_3[$j]['mark_3'];
        break;
       }
     }
       }
       $bestOne=max($ctMark1,$ctMark2,$ctMark3);
       if($bestOne==$ctMark1)
       {
        $besttwo=max($ctMark2,$ctMark3);
       }
       if($bestOne==$ctMark2)
       {
        $besttwo=max($ctMark1,$ctMark3);
       }
       if($bestOne==$ctMark3)
       {
        $besttwo=max($ctMark1,$ctMark2);
       }
       $obtainedMark=ceil(($bestOne+$besttwo)/2);

    ?>
    <tr>
      <th scope="row"><?php echo $i+1; ?></th>
      <td><?php echo $StudentDetails[$i]['roll']; ?></td>
      <td><?php echo $StudentDetails[$i]['name']; ?></td>
      <td><?php echo $ctMark1;   ?></td>
      <td><?php echo $ctMark2;  ?></td>
      <td><?php echo $ctMark3; ?></td>
      <td><?php echo $obtainedMark; ?></td>
      
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
  
    <div id="site_info">
     
    </div>
     <script src="js/search.js"></script>
</body>
</html>
