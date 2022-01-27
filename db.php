<?php
$dbcon=pg_connect("host=ec2-52-201-106-191.compute-1.amazonaws.com port=5432 dbname=d82qvr4te0m26l user=fygvqnraxyxvyd password=1a59f4b409192a0de292d8bac0159c633100ae60844298f23a77b1995cdce011");
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
      PROJECT_TYPE            CHAR(50),
      PROJECT_DEF_TYPE        CHAR(50),
      PROJECT_TITLE           CHAR(50),
      LANGUAGE_USED           CHAR(50),
      PR_DOCUMENT             CHAR(50),
      PR_STATUS               CHAR(50),
      GROUP_ID        INT   NOT NULL,
      COL_ID          INT   NOT NULL);"; 

$sql_group= "CREATE TABLE IF NOT EXISTS GROUPS
      (ID SERIAL PRIMARY KEY     NOT NULL ,
      U1_ID         INT NOT NULL,
      V1              CHAR(50),
      U2_ID         INT NOT NULL,
      V2              CHAR(50),
      U3_ID         INT NOT NULL,
      V3              CHAR(50),
      U4_ID         INT NOT NULL,
      V4              CHAR(50),
      SUP_ID        INT NOT NULL);";

$sql_marksheet = "CREATE TABLE IF NOT EXISTS MARKSHEET
        (ID SERIAL PRIMARY KEY     NOT NULL ,
        GROUP_ID    INT     NOT NULL,
        U1_MARK     INT     NOT NULL,
        U2_MARK     INT     NOT NULL,
        U3_MARK     INT     NOT NULL,
        U4_MARK     INT     NOT NULL,
        REMARKS      CHAR(100))";

$sql_chat = "CREATE TABLE IF NOT EXISTS CHAT
        (ID SERIAL PRIMARY KEY     NOT NULL ,
        GROUP_ID    INT     NOT NULL,
        U_ID        INT     NOT NULL,
        MSG         CHAR(150))";

$sql_notice = "CREATE TABLE IF NOT EXISTS NOTICE
        (ID SERIAL PRIMARY KEY     NOT NULL ,
        COL_ID    INT     NOT NULL,
        NOTICE         CHAR(150),
        STATUS_READ    CHAR(50))";

$sql_notification = "CREATE TABLE IF NOT EXISTS NOTIFY_USER
        (ID SERIAL PRIMARY KEY     NOT NULL ,
        U_ID    INT     NOT NULL,
        NOTIFY         CHAR(150),
        STATUS_READ    CHAR(50))";

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

$ret_mark = pg_query($dbcon, $sql_marksheet);
if(!$ret_mark)
{
    echo"<script>console.log('Failed Create Db marks')</script>";
}
else
{
    echo"<script>console.log('Success Create Db marks')</script>";
}

$ret_chat = pg_query($dbcon, $sql_chat);
if(!$ret_chat)
{
    echo"<script>console.log('Failed Create Db chat')</script>";
}
else
{
    echo"<script>console.log('Success Create Db chat')</script>";
}
$ret_notice = pg_query($dbcon, $sql_notice);
if(!$ret_notice)
{
    echo"<script>console.log('Failed Create Db notice')</script>";
}
else
{
    echo"<script>console.log('Success Create Db notice')</script>";
}
$ret_notify = pg_query($dbcon, $sql_notification);
if(!$ret_notify)
{
    echo"<script>console.log('Failed Create Db notify')</script>";
}
else
{
    echo"<script>console.log('Success Create Db notify')</script>";
}

?>
