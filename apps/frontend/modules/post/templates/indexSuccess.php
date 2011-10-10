<h1>Blog posts</h1>
<table>
  <tr>
    <th>Id</th>
    <th>Title</th>
    <th>Actions</th>
    <th>CreatedAt</th>
  </tr>
 
  <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->
 
  <?php foreach ($posts as $post): ?>
  <tr>
    <td><?php echo $post->getId() ?></td>
    <td>
      <?php echo link_to($post->getTitle(), 'post/edit?id=' . $post->getId()) ?>
    </td>
    <td>
      <?php echo link_to('編集', 'post/edit?id=' . $post->getId()) ?>
      <?php echo link_to('削除', 'post/delete?id=' . $post->getId(),
                         array('confirm'=>'id=' . $post->getId() . 'のデータを削除してもよろしいですか？')) ?>
    </td>
    <td><?php echo $post->getCreatedAt() ?></td>
  </tr>
  <?php endforeach; ?>
 
</table>
<?php echo link_to('新規追加', 'post/new') ?>
<?php if ($flash = $sf_user->getFlash('info')): ?>
<?php echo $flash ?>
<?php endif ?>
