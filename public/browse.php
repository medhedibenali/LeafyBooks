<?php
if(!isset($_GET['tag']))
{
    header('location: index.php');
    die();
}
$tag=trim(htmlspecialchars($_GET['tag']));
$pageTitle= 'Browse For '.$tag;
$stylesheets =["css/search.css",
"css/browse.css"];

require_once dirname(__FILE__,2).'/templates/header.php';
require_once dirname(__FILE__, 2) . '/modules/book_identification/BookRepository.php';
require_once dirname(__FILE__, 2) . '/modules/book_identification/TagsRepository.php';
require_once dirname(__FILE__, 2) . '/modules/author/AuthorRepository.php';
$bookRepository = new BookRepository();
$tagsRepository = new TagsRepository();
$authorRepository = new AuthorRepository();
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
                $author=$authorRepository->find(['id'=>($book->author)]);
            ?>
            <tr>
                <td> <img src= <?= $book->image?>/></td>
                <td> <?= $book->title?></td>
                <td> <?= "$author->first_name $author->last_name"?></td>
                <td> <?= $book->rating?>
                <div>
                    <?php 
                    $percentage= $book->rating *20;
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
<?php
    require_once dirname(__FILE__,2).'/templates/footer.php';
?>
