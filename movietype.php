<?php
extract($_GET);
require("connection.php");
//echo $q;
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
$a=$db->prepare("SELECT * FROM movies");
$a->execute();
$result=$a->fetchAll(PDO::FETCH_ASSOC);

$t=0;
foreach($result as $row){
    
$cat=$row['cat'];
$parts=explode(',',$cat);

    for($i=0; $i<count($parts);$i++){
        if($parts[$i]==$q){?>

          
          <article class="style<?php echo $t;?>">
              <span class="image">
            <img src="<?php echo $row['src']; ?>">
            </span>
                <a href="moviedetails.php?mid=<?php echo $row['mid'];?>">
                <h3><?php echo $row['h2']; ?></h3>
                    <div class="content">
                    <p><?php echo $row['cat']."<br/>".$row['releasedate']."<br/>".$row['agerestriction']."<br/>".$row['runtime']."<br/>"; ?></p>
                    </div>
                      </a>
              
            </article>
          
          
<?php $t++;   }
    }
    
}

?>