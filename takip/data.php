<?php
	session_start();
	ob_start();
	include_once('config.php');
	
		if(!isset($_SESSION["login"])){
    header("location: login.php");
}
	
	if (isset($_POST["id"])){
		$id=$_POST["id"];
	
	$dizi=array();
	$sorgu=mysql_query("select * from ilce where IL_ID='$id' ");
	$geridon="";
	while($row=mysql_fetch_array($sorgu)){
		$geridon.='<option value="'.$row["ILCE_ID"].'">'.$row["ILCE_ADI"].'</option>';
	}
	$dizi["basari"]=$geridon;
	echo json_encode($dizi);
	}
	
	
	
	
	if (isset($_POST["mah"])){
		$mah=$_POST["mah"];
	
	$dizi=array();
	$sorgu=mysql_query("select * from mahalle_koy where ILCE_ID='$mah' ");
	$geridon="";
	while($row=mysql_fetch_array($sorgu)){
		$geridon.='<option value="'.$row["MAH_ID"].'">'.$row["MAHALLE_ADI"].'</option>';
		
	}
	$dizi["basari"]=$geridon;
	echo json_encode($dizi);
	}
	
	
	
	if (isset($_POST["sahip"])){
		$sahip=$_POST["sahip"];
	
	$dizi=array();
	$sorgu=mysql_query("select * from rehber where ids='$sahip' ");
	$geridon="";
	while($row=mysql_fetch_array($sorgu)){
		$geridon.=$row["tel"];
		
	}
	//$row = mysql_fetch_assoc($sorgu);
		//$geridon=$row["tel"];
	//echo json_encode($geridon);
	$dizi["basari"]=$geridon;
	echo json_encode($dizi);
	}
	
	
	
	
	/*if (isset($_POST["mahh"])){
		$mahh=$_POST["mahh"];
	
	$dizi=array();
	$sorgu=mysql_query("select * from mahalle_koy where ILCE_ID='$mahh' ");
	$geridon="";
	while($row=mysql_fetch_array($sorgu)){
		$geridon.=' <tr>
                          <td>#</td>
                          <td>
                            <a>'.$row["MAHALLE_ADI"].'</a>
                            <br />
                            <small>Created 01.01.2015</small>
                          </td>
                          <td>
                            <ul class="list-inline">
                              <li>
                                <img src="images/user.png" class="avatar" alt="Avatar">
                              </li>
                              
                            </ul>
                          </td>
                          <td class="project_progress">
                            <div class="progress progress_sm">
                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="57"></div>
                            </div>
                            <small>57% Complete</small>
                          </td>
                          <td>
                            <button type="button" class="btn btn-success btn-xs">Success</button>
                          </td>
                          <td>
                            <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                          </td>
                        </tr>';
		
	}
	$dizi["basari"]=$geridon;
	echo json_encode($dizi);
	}*/
	
	
	
		
		
	
	
?>