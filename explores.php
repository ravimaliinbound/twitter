<?php
include_once 'headers.php';
?>
<title>Explore / X</title>
<div class="explore">
    <div class="explore-fix">
        <div class="exp d-flex">
            <div class="explore-search-div">
                <i class="fa-solid fa-magnifying-glass"></i><input type="text" class="explore-search-input"
                    name="footer-search-input" placeholder="Search">
            </div>
            <div class="explore-setting">
                <a href="#"><i class="fa-solid fa-gear"></i></a>
            </div>
        </div>







        <!-- Adding class to active element -->
        <script>
            $(document).ready(function () {
                $("#explore").addClass("active_class");
            });
        </script>