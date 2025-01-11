<?php
function upload_foto($File){
    $uploadOk = 1;
    $hasil = array();
    $message = '';
 
    // File properties:
    $FileName = $File['name'];
    $TmpLocation = $File['tmp_name'];
    $FileSize = $File['size'];

    // Figure out what kind of file this is:
    $FileExt = explode('.', $FileName);
    $FileExt = strtolower(end($FileExt));

    // Allowed files:
    $Allowed = array('jpg', 'png', 'gif', 'jpeg');  

    // Check file size
    if ($FileSize > 500000) {
        $message .= "Sorry, your file is too large, max 500KB. ";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if(!in_array($FileExt, $Allowed)){
        $message .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed. ";
        $uploadOk = 0; 
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message .= "Sorry, your file was not uploaded. ";
        $hasil['status'] = false; 
    } else {
        // Create new filename:
        $NewName = date("YmdHis") . '.' . $FileExt;
        $UploadDestination = "img/" . $NewName; 

        // Cek apakah file sudah ada
        if (file_exists($UploadDestination)) {
            // Hapus file lama jika sudah ada
            unlink($UploadDestination);
        }

        // Upload file dan menggantikan file lama jika sudah ada
        if (move_uploaded_file($TmpLocation, $UploadDestination)) {
            // Koneksi ke database
            $conn = new mysqli("localhost", "username", "password", "jaeminverse"); // Ganti dengan kredensial database kamu

            // Cek koneksi
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Query untuk memasukkan path file ke database
            // Gantilah `images_table` dengan nama tabel yang sesuai di database kamu
            $sql = "INSERT INTO user (foto) VALUES ('$UploadDestination')";  // kolom image_path bertipe TEXT

            if ($conn->query($sql) === TRUE) {
                $message .= "File has been uploaded and path saved to database!";
                $hasil['status'] = true; 
            } else {
                $message .= "Error saving to database: " . $conn->error;
                $hasil['status'] = false; 
            }

            // Menutup koneksi database
            $conn->close();
        } else {
            $message .= "Sorry, there was an error uploading your file. ";
            $hasil['status'] = false; 
        }
    }
    
    $hasil['message'] = $message; 
    return $hasil;
}
?>
