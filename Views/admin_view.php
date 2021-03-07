<?php
// The about page view
require_once("view.php");

class AdminView extends View{

  function __construct($controller, $model){

    parent::__construct($controller, $model);
      $this->controller = $controller;
      $this->model = $model;
    }

    public function content(){
      $template_html = '';
      // if($this->sql->isAdmin()){
        ob_start();
        include(URL.'/Template/adminLoop.html');
        $template_html = ob_get_contents();
        ob_end_clean();
      // } else{
      //   echo '<script>window.location.href = "/";</script>';
      // }
      return $template_html;
    }

    public function uploadImage(){
      if(isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["fileToUpload"]["name"];
        $filetype = $_FILES["fileToUpload"]["type"];
        $filesize = $_FILES["fileToUpload"]["size"];

        $ImageFolder = URL.'/Images/products/';

        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

        if(in_array($filetype, $allowed)){
          if(!file_exists($ImageFolder . $filename)){
              move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $ImageFolder . $filename);
          }
        }
        return $filename;
      }
    }

    public function add(){
      if( (!empty($_POST) && !empty($_POST['productName'])) && empty( $this->sql->getItem('productArray',$_POST['productName']) ) ) {
        $name = $this->uploadImage();

        if(empty($name )){
          $name = 'placeholder.png';
        }

        if( isset($_POST["productOnSale"]) ){
          $checked = 'true';
        }

        $newProduct = ['name' => $_POST["productName"],
                       'image'   => $name,
                       'price' => $_POST["productPrice"],
                       'sale_price' => $_POST["productSalePrice"],
                       'on_sale' => $checked,
                       'category' => $_POST["productCategory"]
                     ];

          $this->sql->insertItem('productArray', $newProduct);

          echo '<script>
                $( document ).ready(function() {
                  var text = "<span>Added Item Successfully</span>";
                  $(".newProduct").prepend(text);
                });
                </script>';
        }
    else if((!empty($_POST) && !empty($_POST['productName']))){
      echo '<script>
            $( document ).ready(function() {
              var text = "<p>Issue Creating Product</p>";
              $(".newProduct").prepend(text);
            });
            </script>';
          }
    }

    public function singleFormGen($product){

      $checked = $this->is_true($product['on_sale']) ? 'checked' : '';

      $output = '<form  class="adminSingleProduct remove" action="" method="post" enctype="multipart/form-data">';
      $output .= '<input type="hidden" name="productRemove" value="productRemove">';
      $output .= '<input type="hidden" name="orginalProductName" value="'.$product['name'].'">';
      $output .= '<span class="itemRemove"><i class="far fa-times-circle"></i>';
      $output .= '<input class="button" type="submit" value="REMOVE PRODUCT">';
      $output .= '</span>';
      $output .= '</form>';

      $output .= '<form  class="adminSingleProduct" action="" method="post" enctype="multipart/form-data">';
      $output .= '<input type="hidden" name="productChange" value="productChange">';
      $output .= '<label for="productName">Product Name:</label>';
      $output .= '<input type="hidden" name="orginalProductName" value="'.$product['name'].'">';
      $output .= '<input type="text" id="productName" name="productName" value="'.$product['name'].'">';

      $output .= '<label for="productImage">Product Image:</label>';

      $output .= '<div class="img_container">';
        $output .= '<div class="inner img">';
        $output .= '<img src="../../Images/products/'.$product['image'].'">';
        $output .= '</div>';
        $output .= '<div class="inner imgEdit">';
        $output .= '<input type="file" name="fileToUpload" id="fileToUpload">';
        $output .= '<p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>';
        $output .= '</div>';
      $output .= '</div>';


      $output .= '<label for="productPrice">Price:</label>';
      $output .= '<input type="text" id="productPrice" name="productPrice" value="'.$product['price'].'">';

      $output .= '<label for="productSalePrice">Sale Price:</label>';
      $output .= '<input type="text" id="productSalePrice" name="productSalePrice" value="'.$product['sale_price'].'">';

      $output .= '<div class="formContainer">';
      $output .= '<label for="productOnSale">On Sale:</label>';
      $output .= '<input type="checkbox" id="productOnSale" name="productOnSale" '.$checked.'>';
      $output .= '</div>';

      $output .= '<label for="productCategory">Category:</label>';
      $output .= '<input type="text" id="productCategory" name="productCategory" value="'.$product['category'].'">';

      $output .= '<div class="formControl">';
      $output .= '<span class="close button">Cancel</span>';
      $output .= '<input class="button" type="submit" value="Submit">';
      $output .= '</div>';
      $output .= '</form>';
      return $output;
    }

    public function singleFormGenEmpty(){

      $output = '<form  class="adminSingleProduct newProduct" action="" method="post" enctype="multipart/form-data">';
      $output .= '<input type="hidden" name="productAdd" value="productAdd">';

      $output .= '<div>';
      $output .= '<label for="productName">Product Name:</label>';
      $output .= '<input type="text" id="productName" name="productName" value="">';
      $output .= '</div>';

      $output .= '<div>';
      $output .= '<label for="productImage">Product Image:</label>';

      $output .= '<div class="img_container">';
      $output .= '<div class="inner img">';
      $output .= '</div>';
      $output .= '<div class="inner imgEdit">';
      $output .= '<input type="file" name="fileToUpload" id="fileToUpload">';
      $output .= '<p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>';
      $output .= '</div>';
      $output .= '</div>';
      $output .= '</div>';
      $output .= '<div>';
      $output .= '<label for="productPrice">Price:</label>';
      $output .= '<input type="text" id="productPrice" name="productPrice" value="">';
      $output .= '</div>';
      $output .= '<div>';
      $output .= '<label for="productSalePrice">Sale Price:</label>';
      $output .= '<input type="text" id="productSalePrice" name="productSalePrice" value="">';
      $output .= '</div>';
      $output .= '<div class="formContainer">';
      $output .= '<label for="productOnSale">On Sale:</label>';
      $output .= '<input type="checkbox" id="productOnSale" name="productOnSale">';
      $output .= '</div>';
      $output .= '<div>';
      $output .= '<label for="productCategory">Category:</label>';
      $output .= '<input type="text" id="productCategory" name="productCategory" value="">';
      $output .= '</div>';
      $output .= '<div class="formControl">';
      $output .= '<input class="button" type="submit" value="Submit">';
      $output .= '</div>';
      $output .= '</form>';
      return $output;
    }

    public function adminLoop(){
      if(!empty($_POST) && isset($_POST['productRemove'])){
        $this->sql->deleteItem('productArray', $_POST['orginalProductName']);
      }
      if(!empty($_POST) && isset($_POST['productChange'])){
        $name = $this->uploadImage();

        $this->sql->updateItem( 'productArray', $_POST['orginalProductName'], 'name', $_POST['productName']);
        $this->sql->updateItem( 'productArray', $_POST['orginalProductName'], 'price', $_POST['productPrice']);
        $this->sql->updateItem( 'productArray', $_POST['orginalProductName'], 'sale_price', $_POST['productSalePrice']);
        $this->sql->updateItem( 'productArray', $_POST['orginalProductName'], 'category', $_POST['productCategory']);

        if(isset($_POST['productOnSale'])){
          $this->sql->updateItem( 'productArray', $_POST['orginalProductName'], 'on_sale', 'true');
        } else{
          $this->sql->updateItem( 'productArray', $_POST['orginalProductName'], 'on_sale', 'false');
        }
        if(!empty($name)){
          $this->sql->updateItem( 'productArray', $_POST['orginalProductName'], 'image', $name);
        }
      }

      $output = '';
      foreach($_SESSION['productArray'] as $product){
        $output .= '<article>';
        $output .= '<div class="img"><div style="background-image: url(../../Images/products/'.$product['image'].');"></div>';
        $output .= '<div class="content">';
        $output .= '<p class="productTitle">'.$product['name'].'</p>';
        $output .= '<span class="button edit">Edit</span>';
        $output .= '<div class="productLightbox">';
        $output .= $this->singleFormGen($product);
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</article>';
      }
        return $output;
    }
}
