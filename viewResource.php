<?php


require"class/resourceClass.php";
$db=new resourceClass();
$subject=$db->getSubject();
$numberOfSubject=count($subject);
?>




<?php require"include/header.php"; ?>

<body>
    <div class="container_12">
        <?php require"include/adminHeader.php";
        require"include/sidebar.php";
         ?>
        
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2 style='text-align: center; color : blue ;'> Course Materials</h2>
                <div class="block">               
           <div class="row">
                  <div class="col-sm-6">

              <div class="list-group">
                <?php for($i=0;$i<$numberOfSubject;$i++)
                { 
                if($i%2==0){  
                 ?>
              <a href="view-resource-page.php?courseCode=<?php echo $subject[$i]['courseCode'] ?>" class="list-group-item list-group-item-action "><?php echo $subject[$i]['courseName']; ?></a>
            <?php }} ?>
              
              </div>
                </div>
                   <div class="col-sm-6">

              <div class="list-group">
                <?php for($i=1;$i<$numberOfSubject;$i++)
                { if($i%2!=0){

                ?>
              <a href="view-resource-page.php?courseCode=<?php echo $subject[$i]['courseCode'] ?>" class="list-group-item list-group-item-action ">  <?php echo $subject[$i]['courseName']; ?> </a>
              <?php }} ?>
              
              </div>
              </div>

           </div>


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
