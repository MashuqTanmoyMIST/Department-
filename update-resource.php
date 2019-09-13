<!-- pHp section -->
<?php 
require"class/resourceClass.php";
$db=new resourceClass();
if(isset($_GET['courseCode']) && isset($_GET['id']))
{
$id=$_GET['id'];
$courseCode=$_GET['courseCode'];
$param=array($id);
$title=$db->getResourceForTitle($param);

}

//Upload file;
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $permited  = array('pdf', 'pptx', 'png', 'jpeg','ppt','doc');
    $file_name = $_FILES['resource']['name'];
    $file_size = $_FILES['resource']['size'];
    $file_temp = $_FILES['resource']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_resource = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_resource = "resources/".$unique_resource;

    if (empty($file_name)) {
     echo "<span class='error'>Please Select any Image !</span>";
    }
    elseif (in_array($file_ext, $permited) === false) {
     echo "<span class='error'>You can upload only:-"
     .implode(', ', $permited)."</span>";
    } else{
    move_uploaded_file($file_temp, $uploaded_resource);
    echo $uploaded_resource;
   
    $newTitle=$_POST['title'];
    $resource=$uploaded_resource;
   echo $newTitle,$resource,$id,$courseCode;

    $param2=array($newTitle,$resource,$id,$courseCode);
    $result=$db->updateResource($param2);
    header("location:update-resource.php");
     exit;
    }
   }




//ending upload






?>


<?php require"include/header.php"; ?>

<body>
    <div class="container_12">
        <?php require"include/adminHeader.php";
        require"include/sidebar.php";
         ?>
        
        <div class="grid_10">
    
            <div class="box round first grid">
                <h2 style='text-align: center;'> COURSE RESOURCES </h2>
                <div class="block">               
                 
       <form action="" method="POST" name="form" enctype="multipart/form-data">
              
          


             <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Tilte</label>
             <div class="col-sm-4">
            <textarea name="title" class="form-control" placeholder="<?php if(!empty($title)){ echo $title[0]['title']; } ?>" ></textarea>
          </div>
        </div>
        

              <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Upload Your File</label>
             <div class="col-sm-4">
            <input type="FILE" name="resource" />
          </div>
            </div>
            
           
           
          
          <div class="form-group row">
            <label  class="col-sm-2 col-form-label"></label>
            <div class="col-sm-4">
              <button type="submit" value="submit"  name="submit"  class="btn btn-primary">Update</button>
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
      alert("File uploaded Successfully");
      return true;
    }

    </script>
</body>
</html>