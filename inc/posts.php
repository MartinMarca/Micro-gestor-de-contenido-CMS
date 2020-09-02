<?php
  function get_all_posts(){
    global $app_db;
    $result = $app_db->query("SELECT * FROM posts");// no controla si el nro de posts es exesivamente grande
    return $app_db->fetch_all($result);
  }

  function insert_post($title,$excerpt,$content){
    global $app_db;

    $published_on = date('Y-m-d H:i:s');

    $title = $app_db->real_escape_string($title);
    $excerpt = $app_db->real_escape_string($excerpt);//no permite inyección SQL
    $content = $app_db->real_escape_string($content);

    $query = "INSERT INTO posts
    (title, excerpt, content, published_on)
    VALUES ('$title','$excerpt','$content','$published_on')";

    $result = $app_db->query($query);
  }

  function get_post($post_id){
    global $app_db;

    $post_id = intval($post_id); //convierte a un nro en caso de inyección SQL

    $query = "SELECT * FROM posts WHERE id =" . $post_id;
    $result = $app_db->query($query);

    return $app_db->fetch_assoc($result);
  }

  function delete_post($id){
    global $app_db;
    $id = intval($id); //convierte a un nro en caso de inyección SQL

    $result = $app_db->query("DELETE FROM posts WHERE id = $id");
  }
