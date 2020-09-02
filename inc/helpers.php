<?php

function redirect_to($path){
  header('Location:' . SITE_URL . '/' . $path);
  die();
}

function generate_hash($action){
  return md5($action);//genera una cadena a partir del id para impedir el borrado de un post
}

function check_hash($action, $hash){
  if (generate_hash($action) === $hash) { //controla que el hash sea igual al action
    return true;
  }
  return false;
}

function is_logged_in(){
  $is_user_logged_id = (isset($_SESSION['user']) && $_SESSION['user'] === ADMIN_USER );
  return $is_user_logged_id;
}

function login($username, $password){
  if ($username === ADMIN_USER && $password === ADMIN_PASS ) {
		$_SESSION['user'] = ADMIN_USER;
    return true;
	}
  return false;
}

function logout(){
  unset($_SESSION['user']);
  redirect_to('index.php');
  session_destroy();
}
