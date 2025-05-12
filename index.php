<?php
include_once 'headers.php'
    ?>
<title>Home / X</title>

<div class="middle">
    <div class="ul" style="width: 40%; position: fixed;">
        <ul class="">
            <li>
                <a href="index.php" class="hover">
                    <span style="border-bottom: 3px solid deepskyblue; padding-bottom: 10px">
                        For you
                    </span>
                </a>
            </li>
            <li>
                <a href="following.php" class="hover">Following</a>
            </li>
        </ul>
    </div>
    <?php
    include_once 'index-post.php';
    ?>
    <div class="for_you_post"></div>
</div>

<?php
include_once 'footers.php';
?>
<script>
    $(document).ready(function () {
        show_foryou_post();
    });
</script>