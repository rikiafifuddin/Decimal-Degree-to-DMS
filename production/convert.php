<?php
 if(isset($_POST['LtoDMS'])){

    $SLatitude2 = $_POST['SLatitude'];
    setcookie('SLatitude2', $SLatitude2);
        $SLatitude = abs($SLatitude2);
    $SLongitude2 = $_POST['SLongitude'];
    setcookie('SLongitude2', $SLongitude2);
        $SLongitude = abs($SLongitude2);
    $DLatitude2 = $_POST['DLatitude'];
    setcookie('DLatitude2', $DLatitude2);
        $DLatitude = abs($DLatitude2);
    $DLongitude2 = $_POST['DLongitude'];
    setcookie('DLongitude2', $DLongitude2);
        $DLongitude = abs($DLongitude2);
    
    //DMS Start Latitude
    $D_SLatitude = intVAL($SLatitude);
    $M_SLatitude = ($SLatitude - $D_SLatitude)*60;
        $M_SLatitude2 = intVAL($M_SLatitude);
    $S_SLatitude = number_format((($M_SLatitude - $M_SLatitude2)*60),2);
    if ($SLatitude2>0){
        $Direction_SLatitude = "N";}
    else{
        $Direction_SLatitude = "S";}

    //DMS Start Longitude
    $D_SLongitude = intVAL($SLongitude);
    $M_SLongitude = ($SLongitude - $D_SLongitude)*60;
        $M_SLongitude2 = intVAL($M_SLongitude);
    $S_SLongitude = number_format((($M_SLongitude - $M_SLongitude2)*60),2);
    if ($SLongitude2>0){
        $Direction_SLongitude = "E";}
    else{
        $Direction_SLongitude = "W";}

    //DMS Destination Latitude
    $D_DLatitude = intVAL($DLatitude);
    $M_DLatitude = ($DLatitude - $D_DLatitude)*60;
        $M_DLatitude2 = intVAL($M_DLatitude);
    $S_DLatitude = number_format((($M_DLatitude - $M_DLatitude2)*60),2);
    if ($DLatitude2>0){
        $Direction_DLatitude = "N";}
    else{
        $Direction_DLatitude = "S";}

    //DMS Destination Longitude
    $D_DLongitude = intVAL($DLongitude);
    $M_DLongitude = ($DLongitude - $D_DLongitude)*60;
        $M_DLongitude2 = intVAL($M_DLongitude);
    $S_DLongitude = number_format((($M_DLongitude - $M_DLongitude2)*60),2);
    if ($DLongitude2>0){
        $Direction_DLongitude = "E";}
    else{
        $Direction_DLongitude = "W";}
    
    //DMS OUTPUT
    $DMS_SLatitude = "$D_SLatitude"."° ". "$M_SLatitude2"."' ". "$S_SLatitude"."''  "."$Direction_SLatitude" ;
    $DMS_SLongitude = "$D_SLongitude"."° ". "$M_SLongitude2"."' ". "$S_SLongitude"."''  "."$Direction_SLongitude";
    $DMS_DLatitude = "$D_DLatitude"."° "."$M_DLatitude2"."' ". "$S_DLatitude". "'' ". "$Direction_DLatitude";
    $DMS_DLongitude = "$D_DLongitude". "° ". "$M_DLongitude2". "' ". "$S_DLongitude". "'' ". "$Direction_DLongitude";
    
    setcookie('DMS_SLatitude', $DMS_SLatitude);
    setcookie('DMS_SLongitude', $DMS_SLongitude);
    setcookie('DMS_DLatitude', $DMS_DLatitude);
    setcookie('DMS_DLongitude', $DMS_DLongitude);

    //Distance Between Two Latitude Longitude
        //preprocess value For calculatiom
        $LatStart = deg2rad($SLatitude2);
        $LongStart = deg2rad($SLongitude2);
        $LatDestination = deg2rad($DLatitude2);
        $LongDestination = deg2rad($DLongitude2);

        //Using Haversin Formula = distance=radius(arccos(cos(φ1)cos(φ2)cos(θ1-θ2)+sin(φ1)sin(φ2))
        $MinEarthradius = 6356.752;
        $MaxEarthradius =6378.137; //based on wiki "Earth radius" R varies from 6356.752 km at the poles to 6378.137 km at the equator. we use 2 radius to calculate distance so we have minimum and maximum distance.
        $Theta = $LongDestination - $LongStart;
        $MinDistance = $MinEarthradius *(acos(cos($LatDestination)*cos($LatStart)*cos($Theta) + sin($LatStart)*sin($LatDestination)));
        $MaxDistance = $MaxEarthradius *(acos(cos($LatDestination)*cos($LatStart)*cos($Theta) + sin($LatStart)*sin($LatDestination)));
        setcookie('MinDistance', $MinDistance);
        setcookie('MaxDistance', $MaxDistance);

        //echo $_COOKIE['MinDistance'];
        //echo $_COOKIE['MaxDistance'];
    header("location: index1.php");
 }
?>