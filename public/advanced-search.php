<?php
require_once dirname(__FILE__, 2) . '/config/config.php';
require_once MODULES_PATH . '/autoloader.php';

$pageTitle = 'Advanced Search';
$stylesheets = [
    "https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css",
    "css/advanced-search.css",
    "css/search.css"
];

require TEMPLATES_PATH . '/header.php';

$bookRepository = new BookRepository();
$tagsRepository = new TagsRepository();

$title = trim($_GET['title'] ?? '');
$author = trim($_GET['author'] ?? '');
$tags = $_GET['tags'] ?? [];
$rating = $_GET['rating'] ?? '';
$publisher = trim($_GET['publisher'] ?? '');
$order = $_GET['order'] ?? '';

$allTags = $tagsRepository->getAllTags();
?>
<h2>Advanced Search</h2>
<div class="advanced-search-form" style="font-family:Script MT Bold;">
    <form action="advanced-search.php" method="get">
        <div class="container">
            <div class="row">
                <div class="col input-group">
                    <label class="input-group-text" for="title">title</label>
                    <input class="form-control" type="text" name="title">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="author">author</label>
                    <input class="form-control" type="text" name="author">
                </div>
                <div class="col input-group">
                    <label class="input-group-text" for="author">publisher</label>
                    <input class="form-control" type="text" name="publisher">
                </div>
            </div>
            <div class="row">
                <div class="input-group col">
                    <label class="input-group-text" for="tags">tags</label>
                    <select class="selectpicker" name="tags[]" multiple="multiple">
                        <option value="" selected disabled hidden>Choose here</option>
                        <?php
                        foreach ($allTags as $tag) { ?>
                            <option value="<?= $tag->tag ?>"><?= $tag->tag ?></option>
                        <?php  }; ?>
                    </select>
                </div>
                <div class="input-group col">
                    <label class="input-group-text" for="rating">Rating </label>
                    <select name="rating" class="selectpicker" id="">
                        <option value="" selected disabled hidden>Choose here</option>
                        <option value="4">very good 4+</option>
                        <option value="3">good 3+</option>
                        <option value="2">acceptable 2+</option>
                        <option value="1">meh 1+</option>
                        <option value="0">bad &lt;1</option>
                    </select>
                </div>
                <div class="input-group col">
                    <label class="input-group-text" for="Order By">Order By </label>
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

<?php
if (!$author && !$title && !$publisher && !$tags && !$rating && !$order) {
    require TEMPLATES_PATH . '/no-results.php';
} else {
    $books = $bookRepository->advancedSearch($title, $author, $publisher, $tags, $rating, $order);
    if (!$books) {
        require TEMPLATES_PATH . '/no-results.php';
    } else {
?>
        <div class="content books-content" style="margin-top: 30px;">
            <div class="grid-container">
                <?php
                foreach ($books as $book) {
                    require TEMPLATES_PATH . '/book-item.php';
                } ?>
            </div>
        </div>
<?php
    }
}

$scripts = [
    "https://code.jquery.com/jquery-3.5.1.slim.min.js",
    "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js",
    "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"
];

require TEMPLATES_PATH . '/footer.php';
