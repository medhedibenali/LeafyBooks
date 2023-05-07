<?php
    $pageTitle= 'Advanced Search';
    $stylesheets =["https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css","css/search.css","css/advanced-search.css"];
    $scripts = ["https://code.jquery.com/jquery-3.5.1.slim.min.js","https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js","https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"];
    require_once dirname(__FILE__,2).'/templates/header.php';
    require_once dirname(__FILE__, 2) . '/modules/autoloader.php';
    require_once dirname(__FILE__, 2) . '/modules/book_identification/BookRepository.php';
    require_once dirname(__FILE__, 2) . '/modules/book_identification/TagsRepository.php';
    $bookRepository = new BookRepository();
    $tagsRepository = new TagsRepository();
    $title = $_GET['title'] ?? '';
    $author = $_GET['author'] ?? '';
    $tags = $_GET['tags'] ?? [];
    $rating = $_GET['rating'] ?? '';
    $title = trim($title);
    $author = trim($author);
    $publisher = trim($_GET['publisher'] ?? '');
    $order=$_GET['order'] ?? '';
    $allTags=$tagsRepository->getAllTags();
?>
<h2>Advanced Search</h2>
<div class="advanced-search-form" style="font-family:Script MT Bold;">
    <form action="advanced-search.php" method="get">
        <div class="container">
        <div class="row">
            <div class="col input-group">
                <label class ="input-group-text" for="title">title</label>
               <input class="form-control" type="text" name="title" >
            </div>
            <div class="col input-group">
               <label class ="input-group-text" for="author">author</label>
                <input class="form-control" type="text" name="author" > 
            </div>
            <div class="col input-group">
               <label class ="input-group-text" for="author">publisher</label>
                <input class="form-control" type="text" name="publisher" > 
            </div>
        </div>
        <div class="row">
            <div class="input-group col">
                <label  class ="input-group-text"for="tags">tags</label>
                <select class="selectpicker" name="tags[]" multiple="multiple">
                <option value="" selected disabled hidden>Choose here</option>
                    <?php
                    foreach($allTags as $tag){ ?>
                        <option value="<?=$tag->tag?>"><?=$tag->tag?></option>
                   <?php  };?>
                    </select>
            </div>
            <div class="input-group col">
                <label class ="input-group-text" for="rating">Rating </label>
                <select name="rating" class="selectpicker" id="">
                <option value="" selected disabled hidden>Choose here</option>
                    <option value="4">very good 4+</option>
                    <option value="3">good 3+</option>
                    <option value="2">acceptable 2+</option>
                    <option value="1">meh 1+</option>
                    <option value="0">bad <1</option>
                </select>
            </div>
            <div class="input-group col">
                <label class ="input-group-text" for="Order By">Order By </label>
                <select name="order" class="selectpicker" id="">
                <option value="" selected disabled hidden>Choose here</option>
                    <option value="1">A -> Z</option>
                    <option value="2">Z -> A</option>
                    <option value="3">Rating DESC</option>
                    <option value="4">Rating ASC</option>
                </select>
            </div>
        </div>
        </div> 
        <div class="right">
            <button class="btn btn-search" type="submit">Search</button>
        </div>
    </form>
</div>
<div class="results">
    <?php 
        if(!$author && !$title && !$publisher && !$tags && !$rating && !$order){
            require_once dirname(__FILE__,2).'/templates/no-results.php';
        }
        else{
            $books=$bookRepository->advancedSearch($title,$author,$publisher,$tags,$rating,$order);
            if(!$books){
                require_once dirname(__FILE__,2).'/templates/no-results.php';
            }
            else{
                require_once dirname(__FILE__,2).'/templates/book-content-results.php';
                echo "</div>";
            }
        }
    ?>

</div>
<?php 
    require_once dirname(__FILE__,2).'/templates/footer.php';