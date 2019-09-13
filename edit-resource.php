<?php


require"class/resourceClass.php";
$db=new resourceClass();
$param=array("1");
$resource=$db->getResourceForEdit($param);
?>




<?php require"include/header.php"; ?>

<body>
    <div class="container_12">
        <?php require"include/adminHeader.php";
        require"include/sidebar.php";
         ?>
        
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2> Dashbord</h2>
                <div class="block">               
                  Welcome admin panel 
                  <input style="margin-left:1000px; margin-bottom: 20px; height: 30px;"  type="text" id="myInput" onkeyup="myFunction()" placeholder="Search data" title="Type in a name">

                  <div class="block">  
                   <table class="table table-hover " id="table">
                     <thead>
                      <tr class="header">
                     
                      <th scope="col">Course Name</th>
                      <th scope="col">Title</th>
                      <th scope="col">Resource</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
          <
            <?php
             for($i=0;$i<count($resource);$i++){ 
              ?>
              <td><?php
               $param2=array($resource[$i]['courseCode']);

                  $courseName=$db->getSubjectName($param2);
                  echo $courseName[0]['courseName'];


               ?></td>
              <td><?php echo $resource[$i]['title']?></td>
              <td><a href="<?php echo $resource[$i]['resource'] ?>">View File</a></td>
            
              <td><a href="update-resource.php?courseCode=<?php echo $resource[$i]['courseCode'] ?> & id=<?php echo $resource[$i]['id'] ?>">Update</a> || <a href="">Delete</a></td>
            </tr>
            <?php
          }?>
          
          </tbody>
        </table>
  

  



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
