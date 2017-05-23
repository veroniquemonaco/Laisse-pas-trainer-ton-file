<body>

<div class="container">
    <div class="row">

        <?php
        $dir = 'upload/';
        $files = scandir($dir,1);
        $max = count($files);

        for($i=0;$i<$max-2;$i++){
       echo'
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="'.$dir.$files[$i].'"/>
                <div class="caption">
                    <h3>'.$files[$i].'</h3>
                    <p><a href="delete.php?id='.$files[$i].'" class="btn btn-primary" role="button">Delete</a></p>
                </div>
            </div>
        </div>';

        }
    ?>
    </div>
</div>
</body>

