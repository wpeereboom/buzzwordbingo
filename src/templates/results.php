The final results of the BuzzWord Bingo !!

NR | SCORE | Url
<?php foreach($result as $key => $row) : ?>
<?php echo $key + 1; ?> | <?php echo $row['score']; ?> | <?php echo $row['name']; ?>

<?php endforeach; ?>