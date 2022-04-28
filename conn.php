<?php
    $sql = "create DATABASE if not EXISTS mydb;
    CREATE TABLE if not exists `mydb`.`members` ( `id` INT NOT NULL AUTO_INCREMENT ,
     `name` VARCHAR(100) NOT NULL , `faculty` VARCHAR(100) NOT NULL , `email` VARCHAR(100) NOT NULL ,
      `password` VARCHAR(100) NOT NULL , `image_id` VARCHAR(100) NOT NULL , `phone` VARCHAR(10) NOT NULL ,
      `member_id` VARCHAR(10) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";

    $res = mysqli_multi_query(mysqli_connect("localhost", "root", ""), $sql);

    $conn = mysqli_connect("localhost", "root","", "mydb");

?>