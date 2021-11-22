
<?php 
require __DIR__. './../Utils/Data-authors.php';
?>

<main id="wrappers">

<?php foreach($dataAuthorsList as $authorsId => $authorsData): // dump($authorsData);?>

<div class="author_1">
    <h3 class="authors_names"><?php echo $authorsData->getName(); ?></h3>
    
        <div class="authors_pictures">
            <!--assets/images/Hirokazu_yasuhara_gdc_2018.jpg-->
            <img class= "yasuhara" src="<?= $authorsData->getPicture()?>" alt="Author's pictures">
        </div>

        <div class="author_description">
        <article class="author_description_lorem"><?= $authorsData->getBiography()?></article>
        </div>
</div>
<?php endforeach; ?>  

<div><img src="assets/images/les_trois.png" width="360px"  alt="Sonic page authors"></div>

</main>
