<?php
if(!isset($_GET['tag']))
{
    header('location: index.php');
    die();
}
if(isset($_POST['order']))
{
    $order=$_POST['order'];
}
else
{
    $order=0;
}
$tag=trim(htmlspecialchars($_GET['tag']));
$pageTitle= 'Browse For '.$tag;
$stylesheets =["css/search.css","css/browse.css"];
require_once dirname(__FILE__,2).'/templates/header.php';
require_once dirname(__FILE__, 2) . '/modules/book_identification/BookRepository.php';
require_once dirname(__FILE__, 2) . '/modules/book_identification/TagsRepository.php';
$bookRepository = new BookRepository();
$tagsRepository = new TagsRepository();
$isbn=$tagsRepository->find(['tag'=>$tag]);
?>

<link href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css" rel="stylesheet"/>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.js"></script>

<div class="content">
    <?php 
    if(!$isbn)
    {
       require dirname(__FILE__, 2) . '/templates/no-results.php';
       echo '<a class="center back--btn" href="index.php"> back to homepage </a>';
            }
    else {        
        ?>
    <div class="bar">
        <h2> <?=$tag ?> Books </h2>
    </div>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>cover</th>
                <th>title</th>
                <th>author</th>
                <th>rating</th>
                <th>publisher</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($isbn as $i){
                $book=$bookRepository->find(['isbn'=>($i->isbn)]);
            ?>
            <tr>
                <td> <img src= <?= $book->image?>/></td>
                <td> <?= $book->title?></td>
                <td> <?= $book->author?></td>
                <td> <?= $book->rating?>
                <div>
                    <?php 
                    require dirname(__FILE__,2).'/templates/rating-static-percentage.php';
                    ?>
                </div>
            </td>
                <td> <?= $book->publisher?></td>
                
            </tr> <?php }; ?>
        </tbody>

    </table> <?php } ?>
    </div>
<script type="text/javascript">
    $(document).ready(function(){
        $('table').DataTable({
            ordering:true,
        });

    })
</script>
<? 
    require_once dirname(__FILE__,2).'/templates/footer.php';
?>
