<?php
    include '_dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['createCategory'])) {
        $name = $_POST["name"];
        $desc = $_POST["desc"];
        if(isset($_FILES['image']['name']))
        {
            //upload the image 
            //To upload image we need image name, source path and destination path
            $image_name = $_FILES['image']['name'];

            //UPload the image only if image is selected
            if($image_name !="")    
            {
                //Auto rename our image
                //Get the Extension of our image (jpg,png, gif, etc) e.g. "specialfood1.jpg"
                $tmp=explode('.', $image_name);
                $ext = end($tmp);
                
                //Rename the image 
                $image_name ="Food_category_".rand(000,999).'.'.$ext; //e.g. Food_Category_834.jpg


                $source_path = $_FILES['image']['tmp_name'];

                $destination_path = $_SERVER['DOCUMENT_ROOT']."/project_php_orderfood/img/$image_name";
                
                // finally upload the image
                $upload = move_uploaded_file($source_path, $destination_path);
                
            }
                else
            {
                //Don't upload image and set the image_name value as blank
                $image_name = "";
            }
        }
        $sql = "INSERT INTO `categories` (`categorieName`, `categorieDesc`,`image_name`, `categorieCreateDate`) VALUES ('$name', '$desc','$image_name', current_timestamp())";   
        $result = mysqli_query($conn, $sql);
        $catId = $conn->insert_id;
        if($result) {
                    echo "<script>alert('Thêm thành công');
                            window.location=document.referrer;
                        </script>";
            }
            else{
                echo '<script>alert("Thêm thất bại");
                    </script>';
            }
        }
    }
    if(isset($_POST['removeCategory'])) {
        $catId = $_POST["catId"];
        $image_name = $_POST["image_name"];
        $sql = "DELETE FROM `categories` WHERE `categorieId`='$catId'";   
        $filename = $_SERVER['DOCUMENT_ROOT']."/project_php_orderfood/img/".$image_name."";
        $result = mysqli_query($conn, $sql);
        if ($result){
            if (file_exists($filename)) {
                unlink($filename);
            }
            echo "<script>alert('Xóa thành công');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('Xóa thất bại');
                window.location=document.referrer;
                </script>";
        }
    }
    if(isset($_POST['updateCategory'])) {
        $catId = $_POST["catId"];
        $catName = $_POST["name"];
        $catDesc = $_POST["desc"];

        $sql = "UPDATE `categories` SET `categorieName`='$catName', `categorieDesc`='$catDesc' WHERE `categorieId`='$catId'";   
        $result = mysqli_query($conn, $sql);
        if ($result){
            echo "<script>alert('Cập nhật thành công');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('Cập nhật thất bại');
                window.location=document.referrer;
                </script>";
        }
    }

    if(isset($_POST['updateCatPhoto']))
    {
       //echo"clicked";
       //1. Get all the values from our form 
       $catId = $_POST["catId"];
       $current_image = $_POST['current_image'];
       //2.Updating new image if selected 
       //Check whether the image is selected or not 
       
       if(isset($_FILES['catimage']['name']))
       {
           //Get the image details
           $image_name = $_FILES['catimage']['name'];

           //Check whether the image is available or not 
           if($image_name != "")
           {
               //image available

               //A. Uploads the new image 

               //Auto rename our image
               //Get the Extension of our image (jpg,png, gif, etc) e.g. "specialfood1.jpg"
               $tmp=explode('.', $image_name);
                $ext = end($tmp);

               //Rename the image 
               $image_name ="Food_category_".rand(000,999).'.'.$ext; //e.g. Food_Category_834.jpg


               $source_path = $_FILES['catimage']['tmp_name'];

               $destination_path = $_SERVER['DOCUMENT_ROOT']."/project_php_orderfood/img/$image_name";

               // finally upload the image
               $upload = move_uploaded_file($source_path, $destination_path);

               //Check whether the image is uploaded or not 
               //And if the image is not upload then we will stop the process and redirect with error message
               if($upload == false){
                   //Set message
                   echo '<script>alert("Không thể tải ảnh lên.");
                   window.location=document.referrer;
                   </script>';
               }

               //B. remove the current image if available
               if($current_image != ""){
                   $remove_path = $_SERVER['DOCUMENT_ROOT']."/project_php_orderfood/img/$current_image";
               
                   $remove = unlink($remove_path);

                   //Check whether the image is removed or not 
                   //if failed to remove then display message and stop the process
                   if($remove == false)
                   {
                        echo '<script>alert("Cập nhật thất bại");
                        window.location=document.referrer;
                        </script>';
                   }
               }
               
           }
           else
           {
               $image_name = $current_image;
           }
       }
       else
       {
           $image_name = $current_image;
       }
       //3. Update the database category with message
       $sql2="UPDATE `categories` SET
               image_name = '$image_name'
               WHERE categorieId='$catId'
       ";
    //    echo $current_image;
    //    echo $sql2;
    //    die();
       //Execute the query
       $res2 = mysqli_query($conn, $sql2);
       //4.Redirect to manage category with message
       //Check whether executed or not 
       if($res2==true)
       {
            echo "<script>alert('Cập nhật ảnh thành công');
            window.location=document.referrer;
            </script>";
       }
       else
       {
                echo "<script>alert('Cập nhật ảnh thất bại');
                window.location=document.referrer;
                </script>";
       }
    }         

?>