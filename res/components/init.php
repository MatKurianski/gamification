<?php
	session_start();
    $userCd = $_SESSION['cd_membro'];
    $userQuery = $sys->listarMembros($userCd);
    if(!empty($userQuery)){
        $user = $userQuery->fetch_object();
    }