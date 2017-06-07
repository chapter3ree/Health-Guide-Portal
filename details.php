<?php 
include("inc/data.php");
include("inc/functions.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    if (isset($catalog[$id])) {
        $item = $catalog[$id];
    }
}

if (!isset($item)) {
    header("location:catalog.php");
    exit;
}
$pageTitle = $item["title"];
$section = null;

include("inc/header.php"); ?>

<div class="section page">

    <div class="wrapper">
        
        <div class="breadcrumbs">
            <a href="catalog.php">Full Catalog</a>
            &gt; <a href="catalog.php?cat=<?php echo strtolower($item["category"]); ?>">
            <?php echo $item["category"]; ?></a>
            &gt; <?php echo $item["title"]; ?>
        </div>
        
        <div class="media-picture">
    
        <span>
            <img src="<?php echo $item["img"]; ?>" alt="<?php echo $item["title"]; ?>" />
        </span>
            
        </div>
        
        <div class="media-details">
        
            <h1><?php echo $item["title"]; ?></h1>
            <table>
            
                <tr>
                    <th>Category</th>
                    <td><?php echo $item["category"]; ?></td>
                </tr>
                <tr>
                    <th>Nutrient</th>
                    <td><?php echo $item["Nutrient"]; ?></td>
                </tr>
                <tr>
                    <th>Type</th>
                    <td><?php echo $item["Type"]; ?></td>
                </tr>
                <tr>
                    <th>Calories</th>
                    <td><?php echo $item["Calories"]; ?></td>
                </tr>
                
            </table>
        
        </div>
    
    </div>

</div>

<footer>
      <?php
      include 'inc/footer.php';
      ?>
	</footer>