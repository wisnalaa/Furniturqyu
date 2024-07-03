<?php
    $koneksi = mysqli_connect("localhost","root","","dbmebel");

   //menambah barang baru
   if (isset($_POST["addnewproduct"])) {
    $name = $_POST["name"];
    $desk = $_POST["desk"];
    $color = $_POST["color"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];

    $addtotable = mysqli_query($koneksi,"INSERT INTO product (name, color, price, desk, quantity) VALUES ('$name','$color', '$price', '$desk', '$quantity')");
    if ($addtotable) {
        header("location: index.php");
    } else {
        echo 'gagal cihuy';
        header('location: index.php');
    }
   }


            // Update Product
            if (isset($_POST['updateproduct'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $description = $_POST['desk'];
                $quantity = $_POST['quantity'];
                $price = $_POST['price'];
                $color = $_POST['color'];
                $image = $_FILES['image']['name'];

                if ($image) {
                    $target = "Images/".basename($image);
                    move_uploaded_file($_FILES['image']['tmp_name'], $target);
                    $sql = "UPDATE products SET name='$name', description='$description', quantity='$quantity', price='$price', color='$color', image='$image' WHERE id=$id";
                } else {
                    $sql = "UPDATE products SET name='$name', description='$description', quantity='$quantity', price='$price', color='$color' WHERE id=$id";
                }

                if ($koneksi->query($sql) === TRUE) {
                    echo "<script>alert('Product updated successfully');</script>";
                } else {
                    echo "Error updating product: " . $koneksi->error;
                }
            }

            // Delete Product
            if (isset($_POST['deleteproduct'])) {
                $id_product = $_POST['id_product'];
                $sql = "DELETE FROM `product` WHERE `product`.`id_product` = ?";
                $stmt = $koneksi->prepare($sql);
                $stmt->bind_param("i", $id_product);

                if ($stmt->execute()) {
                    echo "Product deleted successfully";
                } else {
                    echo "Error deleting product: " . $stmt->error;
                }
                exit; 
            }

        // Fetch Products
        $sql = "SELECT * FROM product";
        $result = $koneksi->query($sql);
        ?>
