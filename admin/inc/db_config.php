<?php

$hname = 'localhost';
$uname = 'root';
$pass = '';
$db = 'hotel_serene';

$con = mysqli_connect($hname,$uname,$pass,$db);

if(!$con){
    die("Can't connect to database".mysqli_connect_error());
}


function filteration($data)
{
    foreach($data as $key => $value)//every name , pass that are given will be checked by foreach loop, then return data
    {
        $data[$key] = trim($value);//extra space not allow,filter them and don't shoe them
        $data[$key] = stripslashes($value);//backslashes not allow,,filter them and don't shoe them
        $data[$key] = htmlspecialchars($value);//no special char allow,,filter them and don't shoe them
        $data[$key] = strip_tags($value);//any link,anchor tag not allow as admin name,pass for all

    }
    return $data;
}


function selectAll($table)
{

    $con=$GLOBALS['con'];
    $res=mysqli_query($con,"SELECT * FROM $table");
    return $res;
}

function select($sql,$values,$datatypes)
{
    $con = $GLOBALS['con'];    //make con variable global
    if($stmt = mysqli_prepare($con,$sql))
    {
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);//splat operator(...) means for make values dynamic.Values are unknown,one or many. Param for make query parameter bind??
        if(mysqli_stmt_execute($stmt))//stmt variable make all variables bind
        {
            $res = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            return $res;

        }
        else{
            mysqli_stmt_close($stmt);
            die("Query can't be executed - Select function error");
        }
    }

    else{
        die("Query can't be prepared- Select function error");
    }
}


function update($sql,$values,$datatypes)
{
    $con = $GLOBALS['con'];//make con variable global
    if($stmt = mysqli_prepare($con,$sql))
    {
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);//splat operator(...) means for make values dynamic.Values are unknown,one or many. Param for make query parameter bind??
        if(mysqli_stmt_execute($stmt))//stmt variable make all variables bind
        {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;

        }
        else{
            mysqli_stmt_close($stmt);
            die("Query can't be executed - Select function error");
        }
    }

    else{
        die("Query can't be prepared- Select function error");
    }
}



function insert($sql,$values,$datatypes)
{
    $con = $GLOBALS['con'];//make con variable global
    if($stmt = mysqli_prepare($con,$sql))
    {
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);//splat operator(...) means for make values dynamic.Values are unknown,one or many. Param for make query parameter bind??
        if(mysqli_stmt_execute($stmt))//stmt variable make all variables bind
        {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;

        }
        else{
            mysqli_stmt_close($stmt);
            die("Query can't be executed -Insert");
        }
    }

    else{
        die("Query can't be prepared-Insert");
    }
}

function delete($sql,$values,$datatypes)
{
    $con = $GLOBALS['con'];//make con variable global
    if($stmt = mysqli_prepare($con,$sql))
    {
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);//splat operator(...) means for make values dynamic.Values are unknown,one or many. Param for make query parameter bind??
        if(mysqli_stmt_execute($stmt))//stmt variable make all variables bind
        {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;

        }
        else{
            mysqli_stmt_close($stmt);
            die("Query can't be executed - Select function error");
        }
    }

    else{
        die("Query can't be prepared- Select function error");
    }
}

?>