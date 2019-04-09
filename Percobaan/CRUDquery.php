<?php

$conn = new mysqli("localhost", "root", "", "crud") OR die("Error: " . mysqli_error($conn));

session_start();


if (isset($_POST['save'])) {
    if(!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $iQuery = "INSERT INTO account(username, password) values(?, ?)";

        $stmt = $conn->prepare($iQuery);
        $stmt->bind_param("ss", $username, $password);
        if ($stmt->execute()) {
            $_SESSION['msg'] = "Data berhasil disimpan ya ^_^ Thankyou";
            $_SESSION['alert'] = "alert alert-success";
        }
        $stmt->close();
        $stmt->close();
    }
    else {
          $_SESSION['msg'] = "Username atau Password ngga boleh kosong ya sayang, cukup hatiku aja yang kosong";
          $_SESSION['alert'] = "alert alert-warning";

    }
    header ("location: index.php");
  }
  #Delete Selected Data
  if(isset($_POST['delete'])) {
      $id = $_POST['delete'];

      $dQuery = "DELETE FROM account WHERE id = ?";
      $stmt = $conn->prepare($dQuery);
      $stmt->bind_param('i', $id);
      if ($stmt->execute()) {
          $_SESSION['msg'] = "Data berhasil dihapus ya gengs";
          $_SESSION['alert'] = "alert alert-danger";
      }
      $stmt->close();
      $conn->close();
      header("location: index.php");
  }

  # Update Data
  if (isset($_POST['edit'])) {
      if (!empty($_POST['username']) && !empty($_POST['password'])) {
          $username =  $_POST['username'];
          $password =  $_POST['password'];
          $id = $_POST['edit'];

          $uQuery = "UPDATE account SET username = ?, password = ? WHERE id = ?";

          $stmt = $conn->prepare($uQuery);
          $stmt->bind_param('ssi', $username, $password, $id);

          if ($stmt->execute()) {
              $_SESSION['msg'] = "Data sudah berhasil di update ya sayang";
              $_SESSION['alert'] = "alert alert-warning";
          }
          $stmt->close();
          $conn->close();
      }
      else {
              $_SESSION['msg'] = "Username atau Password ngga boleh kosong ya sayang, cukup hatiku aja yang kosong";
              $_SESSION['alert'] = "alert alert-warning";
      }
      header("location: index.php");
  }

 ?>
