<?php
    $conn = mysqli_connect("localhost","phpmyadmin","Rusan@98");
    $database = mysqli_select_db($conn, "pariyojana");

    $sql ="CREATE TABLE IF NOT EXISTS users
        (id SERIAL PRIMARY KEY     NOT NULL ,
        user_fname           CHAR(50),
        user_email         CHAR(50),
        user_pass           CHAR(50),
        role            CHAR(20),
        college         CHAR(150),
        verify          CHAR(10));";

    $sql_co = "CREATE TABLE IF NOT EXISTS admin
        (id SERIAL PRIMARY KEY     NOT NULL ,
        user_fname           CHAR(50),
        user_email         CHAR(50),
        user_pass           CHAR(50),
        college         CHAR(150));";

    $sql_project1 = "CREATE TABLE IF NOT EXISTS project1
        (id SERIAL PRIMARY KEY     NOT NULL ,
        email                   CHAR(50), 
        email_name              CHAR(50), 
        mem1_email              CHAR(50), 
        mem1_name               CHAR(50), 
        mem2_email              CHAR(50), 
        mem2_name               CHAR(50), 
        proposal                CHAR(50),
        mid                     CHAR(50), 
        final                   CHAR(50),
        sup_email               CHAR(50), 
        sup_name                CHAR(50),
        college                 CHAR(50));"; 

    $sql_project2 = "CREATE TABLE IF NOT EXISTS project2
        (id SERIAL PRIMARY KEY     NOT NULL ,
        email                   CHAR(50), 
        email_name              CHAR(50), 
        mem1_email              CHAR(50), 
        mem1_name               CHAR(50), 
        mem2_email              CHAR(50), 
        mem2_name               CHAR(50), 
        proposal                CHAR(50),
        mid                     CHAR(50), 
        final                   CHAR(50),
        sup_email               CHAR(50), 
        sup_name                CHAR(50),
        college                 CHAR(50));"; 
        
    $sql_project3 = "CREATE TABLE IF NOT EXISTS project3
        (id SERIAL PRIMARY KEY     NOT NULL ,
        email                   CHAR(50), 
        email_name              CHAR(50), 
        mem1_email              CHAR(50), 
        mem1_name               CHAR(50), 
        mem2_email              CHAR(50), 
        mem2_name               CHAR(50), 
        proposal                CHAR(50),
        mid                     CHAR(50), 
        final                   CHAR(50),
        sup_email               CHAR(50), 
        sup_name                CHAR(50),
        college                 CHAR(50));"; 
        
    $sql_document = "CREATE TABLE IF NOT EXISTS document
        (id SERIAL PRIMARY KEY     NOT NULL,
        title                      CHAR(50), 
        lang                       CHAR(50), 
        project_no                 INT, 
        project_type               CHAR(50), 
        def_type                   CHAR(50),
        location                   CHAR(50))";

    $sql_marksheet = "CREATE TABLE IF NOT EXISTS marksheet
        (id SERIAL PRIMARY KEY     NOT NULL ,
        mem1_marks                 CHAR(50), 
        mem2_marks                 CHAR(50), 
        mem3_marks                 CHAR(50), 
        project_no                 INT, 
        project_type               CHAR(50), 
        def_type                   CHAR(50))";

    $sql_statement = "CREATE TABLE IF NOT EXISTS statement
        (id SERIAL PRIMARY KEY     NOT NULL,
        proposal_statement         CHAR(50), 
        mid_statement              CHAR(50), 
        final_statement            CHAR(50), 
        project_no                 INT, 
        project_type               CHAR(50))";

    $sql_chat = "CREATE TABLE IF NOT EXISTS comment
        (id SERIAL PRIMARY KEY     NOT NULL ,
        EMAIL                      CHAR(50),
        user_name                  CHAR(50),
        project_no                 INT,
        project_type               CHAR(50),
        comment                    CHAR(50),
        role                       CHAR(50))";

    $sql_notice = "CREATE TABLE IF NOT EXISTS notice
        (id SERIAL PRIMARY KEY     NOT NULL ,
        admin_no                   CHAR(50),
        college                    CHAR(50),
        heading                    CHAR(50),
        notice                     CHAR(150))";

    $sql_notification = "CREATE TABLE IF NOT EXISTS notificat
        (id SERIAL PRIMARY KEY     NOT NULL ,
        EMAIL_NOTE                 CHAR(50),
        notify                     CHAR(50),
        project_type               CHAR(50),
        status_note                CHAR(50),
        sender                     CHAR(50))";

    $blog = "CREATE TABLE IF NOT EXISTS blogs
        (id SERIAL PRIMARY KEY     NOT NULL ,
        admin_no                   CHAR(50),
        college                    CHAR(50),
        blog                       CHAR(150),
        role                       CHAR(50),
        user_name                  CHAR(50))";

    if(!$conn) 
    {
        echo "<script>console.log('Error : Unable to open database')</script>";
    } 
    else 
    {
        echo "<script>console.log('Opened database successfully')</script>";
    }

    $ret = mysqli_query($conn, $sql);
    if(!$ret)
    {
        echo"<script>console.log('Failed Create Db')</script>";
    }
    else
    {
        echo"<script>console.log('Success Create Db')</script>";
    }

    $ret_co = mysqli_query($conn, $sql_co);
    if(!$ret_co)
    {
        echo"<script>console.log('Failed Create Db CO')</script>";
    }
    else
    {
        echo"<script>console.log('Success Create Db CO')</script>";
    }


    $ret_p1 = mysqli_query($conn, $sql_project1);
    if(!$ret_p1)
    {
        echo"<script>console.log('Failed Create Db project1')</script>";
    }
    else
    {
        echo"<script>console.log('Success Create Db project1')</script>";
    }
    $ret_p2 = mysqli_query($conn, $sql_project2);
    if(!$ret_p2)
    {
        echo"<script>console.log('Failed Create Db project2')</script>";
    }
    else
    {
        echo"<script>console.log('Success Create Db project2')</script>";
    }
    $ret_p3 = mysqli_query($conn, $sql_project3);
    if(!$ret_p3)
    {
        echo"<script>console.log('Failed Create Db project3')</script>";
    }
    else
    {
        echo"<script>console.log('Success Create Db project3')</script>";
    }

    $ret_g = mysqli_query($conn, $sql_group);
    if(!$ret_g)
    {
        echo"<script>console.log('Failed Create Db group')</script>";
    }
    else
    {
        echo"<script>console.log('Success Create Db group')</script>";
    }

    $ret_mark = mysqli_query($conn, $sql_marksheet);
    if(!$ret_mark)
    {
        echo"<script>console.log('Failed Create Db marks')</script>";
    }
    else
    {
        echo"<script>console.log('Success Create Db marks')</script>";
    }

    $ret_chat = mysqli_query($conn, $sql_chat);
    if(!$ret_chat)
    {
        echo"<script>console.log('Failed Create Db chat')</script>";
    }
    else
    {
        echo"<script>console.log('Success Create Db chat')</script>";
    }
    $ret_notice = mysqli_query($conn, $sql_notice);
    if(!$ret_notice)
    {
        echo"<script>console.log('Failed Create Db notice')</script>";
    }
    else
    {
        echo"<script>console.log('Success Create Db notice')</script>";
    }
    $ret_notify = mysqli_query($conn, $sql_notification);
    if(!$ret_notify)
    {
        echo"<script>console.log('Failed Create Db notify')</script>";
    }
    else
    {
        echo"<script>console.log('Success Create Db notify')</script>";
    }

    $ret_document = mysqli_query($conn, $sql_document);
    if(!$ret_document)
    {
        echo"<script>console.log('Failed Create Db document')</script>";
    }
    else
    {
        echo"<script>console.log('Success Create Db document')</script>";
    }

    $ret_statement = mysqli_query($conn, $sql_statement);
    if(!$ret_statement)
    {
        echo"<script>console.log('Failed Create Db statement')</script>";
    }
    else
    {
        echo"<script>console.log('Success Create Db statement')</script>";
    }

    $ret_blog = mysqli_query($conn, $blog);
    if(!$ret_blog)
    {
        echo"<script>console.log('Failed Create Db blog')</script>";
    }
    else
    {
        echo"<script>console.log('Success Create Db blog')</script>";
    }
?>