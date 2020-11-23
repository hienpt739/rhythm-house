<?php 
  // delete, update, insert
  function dbManipulation($sql) {
      $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASE);
      if($conn->conn_error) {
          die('Không thể kết nối database, Lỗi: ' . $conn->conn_error);
      }
      if(!$conn->query($sql)) {
          echo 'không thể thực hiện query, Lỗi: '. $conn->error . '<br>';
      }
      $conn->close();
  }

  // select
  function dbSelect($sql) {
      $conn =  new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASE);
      if($conn->conn_error) {
          die('Không thể kết nối database, Lỗi: ' . $conn->conn_error);
      }
      $result = $conn->query($sql);
      $conn->close();
      if(!$result) {
          echo 'không thể thực hiện query, Lỗi: ' . $conn->error . '<br>';
      } else {
          
          $data = [];
          while ($row = $result->fetch_array()) {
              array_push($data, $row);
          }
          return $data;
      }
  }
