<?php


require"class/resourceClass.php";
$db=new resourceClass();
$courseCode=$_GET['courseCode'];
$param=array($courseCode);
$resource=$db->viewResource($param);
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
                  <h2 style="color:green;text-align: center">Uploaded Resources</h2> 
                    <br>
<input style="margin-left:1000px; margin-bottom: 20px; height: 30px;"  type="text" id="myInput" onkeyup="myFunction()" placeholder="Search data" title="Type in a name">

                    <table class="table table-hover " id="table">
                     <thead>
                      <tr class="header">
                     
                      <th scope="col">Teacher Name</th>
                      <th scope="col">Title</th>
                      <th scope="col">Resource</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php for($i=0;$i<count($resource);$i++){ ?>
                    <tr>
                      
                      <td>Mark</td>
                      <td><?php echo $resource[$i]['title']; ?></td>
                      <td><a href="<?php echo $resource[$i]['resource'] ?>">View File</a></td>
                    </tr>
                     <?php } ?>
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
    