<?php
include_once 'headers.php'
    ?>
<title>Bookmarks / X</title>

<div class="bookmark">
    <div class="bookmark-fix">
        <p><span class="mesg">Bookmarks</span></p>
        <div class="explore-search-div">
            <i class="fa-solid fa-magnifying-glass"></i><input type="text" class="explore-search-input"
                name="footer-search-input" placeholder="Search Bookmarks">
        </div>
    </div>
    <h2 class="save-post">Save posts for later</h2>
    <p class="bookmark-msg">
        Bookmark posts to easily find them again in the future.
    </p>
</div>

<?php
include_once 'footers.php';
?>

<!-- Adding class to active element -->
<script>
    $(document).ready(function () {
        $("#bookmark").addClass("active_class");
    });
</script>