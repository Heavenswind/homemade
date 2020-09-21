
<h1>Cook Profile</h1>

    
    <?php foreach ($cooks as $cook): ?>
    <h1> <?php echo $cook['Cook']['first_name']; ?></h1>
    <?php endforeach; ?>
    <?php unset($cook); ?>