<html>
  <head>

    <title>Image upload</title>
    <style>
    img{
      width: 100px;
      height: 100px;
    }
    </style>
    </head>
  <body>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image"><input type="submit" value="upload">
    </form>
    <?php
      //connect to database
      mysql_connect("localhost","root","") or die(mysql_error());
      mysql_select_db("products") or die(mysql_error());

      //file properties
       $file = $_FILES ['image'] ['tmp_name'];

      if(!isset($file))
        echo "Please select your Product";
      else{

        $image = addslashes(file_get_contents ($_FILES ['image'] ['tmp_name']));
        $image_name = addslashes($_FILES ['image'] ['name']);
        $image_size = getimagesize($_FILES ['image'] ['tmp_name']);

        if($image_size == FALSE)
          echo "Its not an Image.";
        else{
          if (!$insert = mysql_query("INSERT INTO store VALUES ('','$image_name','$image')"))
            echo "Problem uploading Product.";
          else{
            $lastid = mysql_insert_id();
            echo "Product Uploaded <p />Your product is:<p /><img src=get.php?id=$lastid>";

          }


        }


      }
     ?>
  </body>

</html>
