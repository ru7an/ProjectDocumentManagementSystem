<?php
$dbcon=pg_connect("host=localhost port=5432 dbname=pariyojana user=rusan password=rusan@98");
$sql ="CREATE TABLE IF NOT EXISTS USERSS
      (ID SERIAL PRIMARY KEY     NOT NULL ,
      USERNAME           CHAR(50),
      USER_EMAIL         CHAR(50),
      USER_PASS           CHAR(50),
      ROLE            CHAR(20),
      COLLEGE         CHAR(150),
      VERIFY          CHAR(10));";

$sql_co = "CREATE TABLE IF NOT EXISTS USERC
      (ID SERIAL PRIMARY KEY     NOT NULL ,
      USERNAME           CHAR(50),
      USER_EMAIL         CHAR(50),
      USER_PASS           CHAR(50),
      COLLEGE         CHAR(150),
      LOGO            CHAR(150),
      DOCX            CHAR(150),
      VERIFY          CHAR(10));";

$sql_project = "CREATE TABLE IF NOT EXISTS PROJECT
      (ID SERIAL PRIMARY KEY     NOT NULL ,
      PROJECT_TYPE           CHAR(50),
      PROJECT_TITLE           CHAR(50),
      LANGUAGE_USED         CHAR(50),
      GROUP_ID        INT   NOT NULL);"; 

$sql_group= "CREATE TABLE IF NOT EXISTS GROUPS
      (ID SERIAL PRIMARY KEY     NOT NULL ,
      U1           CHAR(50),
      V1           CHAR(50),
      U2           CHAR(50),
      V2           CHAR(50),
      U3           CHAR(50),
      V3           CHAR(50));";

if(!$dbcon) 
{
    echo "<script>console.log('Error : Unable to open database')</script>";
} 
else 
{
    echo "<script>console.log('Opened database successfully')</script>";
}

$ret = pg_query($dbcon, $sql);
if(!$ret)
{
    echo"<script>console.log('Failed Create Db')</script>";
}
else
{
    echo"<script>console.log('Success Create Db')</script>";
}

$ret_co = pg_query($dbcon, $sql_co);
if(!$ret_co)
{
    echo"<script>console.log('Failed Create Db CO')</script>";
}
else
{
    echo"<script>console.log('Success Create Db CO')</script>";
}


$ret_p = pg_query($dbcon, $sql_project);
if(!$ret_p)
{
    echo"<script>console.log('Failed Create Db project')</script>";
}
else
{
    echo"<script>console.log('Success Create Db project')</script>";
}

$ret_g = pg_query($dbcon, $sql_group);
if(!$ret_g)
{
    echo"<script>console.log('Failed Create Db group')</script>";
}
else
{
    echo"<script>console.log('Success Create Db group')</script>";
}

?>
