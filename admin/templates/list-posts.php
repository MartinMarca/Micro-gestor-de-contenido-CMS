<?php
if (isset($_GET['delete-post'])) {
  $id = $_GET['delete-post'];
  if (!check_hash('delete-post-' . $id, $_GET['hash'])) {//controla hash generado en url
    die('Hackeando, no?');
  }
  delete_post($id);
  redirect_to('admin?action=list-posts');
  die();
}
$all_posts = get_all_posts();
?>
  <?php require(__DIR__ . '/../../templates/header.php'); ?>

  <?php if(isset($_GET['success'])):  ?>
    <div class="success">El post ha sido creado</div>
  <?php endif; ?>

  <table>
    <?php foreach($all_posts as $post): ?>
      <tr>
        <td><?php echo $post['title']; ?></td>
        <td><a href="<?php echo SITE_URL . '/admin?action=list-posts&delete-post=' . $post['id'] ?>&hash=<?php echo generate_hash('delete-post-' . $post['id']); ?>">Eliminar post</a></td>
      </tr>
    <?php endforeach; ?>
  </table>
  <?php require(__DIR__ . '/../../templates/footer.php'); ?>
<?php
