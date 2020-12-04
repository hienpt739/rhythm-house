<?php 
  // delete, update, insert
  function dbManipulation($sql) {
    $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASE);
    $conn->query($sql);
    $conn->close();
  }

  // select mutiple 
  function dbSelect($sql) {
    $conn =  new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASE);
    $result = $conn->query($sql);
    $conn->close();
    $data = [];
    while ($row = $result->fetch_array()) {
        array_push($data, $row);
    }
    return $data;
  }

  // select single
  function dbSelectSingle($sql) {
    $conn =  new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASE);
    $result = $conn->query($sql);
    $conn->close();
    return $result->fetch_array();
  }

 