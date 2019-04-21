
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fichier[]" multiple="multiple"/>
    <input type="submit" name="submit" value="Send" />
</form>


<?php
    $listFiles = scandir('uploads/');
        foreach ($listFiles as $value){
            if ($value != '.' && $value != '..') { ?>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="uploads/<?= $value; ?>" alt="image">
                        <div class="caption">
                            <h3><?= $value; ?></h3>
                            <form method="POST" action="delete.php">
                                <input type="hidden" name="image" value="<?= $value; ?>">
                                <button type="submit" name="delete" class="btn btn-warning">Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                }
                }
            ?>
            </div>
        </div>




    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>