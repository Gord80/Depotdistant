<?php
$lines = file("../../assets/files/liens.txt");
  ?>
  <?php foreach ($lines as $line_num => $line): ?>
    <p>
      Ligne <?= ++$line_num; ?>: <?= htmlspecialchars($line); ?>
    </p>
  <?php endforeach; ?>

