<?php
    include '_dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['createItem'])) {
        $name = $_POST["name"];
        $description = $_POST["description"];
        $categoryId = $_POST["categoryId"];
        $price = $_POST["price"];
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
                $image_name ="Food_".rand(000,999).'.'.$ext; //e.g. Food_Category_834.jpg


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
        $sql = "INSERT INTO `food` (`foodName`, `foodPrice`, `foodDesc`, `foodImg`, `foodCategorieId`, `foodPubDate`) VALUES ('$name', '$price', '$description', '$image_name', '$categoryId', current_timestamp())";   
        $result = mysqli_query($conn, $sql);
        $foodId = $conn->insert_id;
        if($result) {
                    echo "<script>alert('Thêm món ăn thành công');
                            window.location=document.referrer;
                        </script>";
            }
            else{
                echo '<script>alert("Thêm món ăn thất bại");
                    </script>';
            }
        }

    
    if(isset($_POST['removeItem'])) {
        $foodId = $_POST["foodId"];
        $image_name = $_POST["image_name"];
        $sql = "DELETE FROM `food` WHERE `foodId`='$foodId'";   
        $result = mysqli_query($conn, $sql);
        $filename = $_SERVER['DOCUMENT_ROOT']."/project_php_orderfood/img/$image_name";
        if ($result){
            if (file_exists($filename)) {
                unlink($filename);
            }
            echo "<script>alert('Xóa thành công');
                window.location=document.referrer;
            </script>";
        }
        else {
            echo "<script>alert('Xóa thất bại ');
            window.location=document.referrer;
            </script>";
        }
    }

    if(isset($_POST['updateItemPhoto']))
    {
       //echo"clicked";
       //1. Get all the values from our form 
       $foodId = $_POST["foodId"];
       $current_image = $_POST['current_image'];
       //2.Updating new image if selected 
       //Check whether the image is selected or not 
       
       if(isset($_FILES['itemimage']['name']))
       {
           //Get the image details
           $image_name = $_FILES['itemimage']['name'];

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
               $image_name ="Food_".rand(000,999).'.'.$ext; //e.g. Food_Category_834.jpg


               $source_path = $_FILES['itemimage']['tmp_name'];

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
       $sql2="UPDATE `food` SET
               foodImg = '$image_name'
               WHERE foodId='$foodId'
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


    if(isset($_POST['updateItem'])) {
        $foodId = $_POST["foodId"];
        $foodName = $_POST["name"];
        $foodDesc = $_POST["desc"];
        $foodPrice = $_POST["price"];
        $foodCategorieId = $_POST["catId"];

        $sql = "UPDATE `food` SET `foodName`='$foodName', `foodPrice`='$foodPrice', `foodDesc`='$foodDesc', `foodCategorieId`='$foodCategorieId' WHERE `foodId`='$foodId'";   
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
}
?>