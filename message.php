<?php
include_once 'headers.php';
?>
<title>Message / X</title>

<div class="message">
    <div class="message-fix">
        <p><span class="mesg">Messagess</span>
            <a href="#"><i class="fa-solid fa-gear msg-setting"></i></a>
            <a href="#"><i class="fa-solid fa-envelope msg-setting" style="margin-left: 20px"></i></a>
        </p>
        <div class="explore-search-div">
            <i class="fa-solid fa-magnifying-glass"></i><input type="text" class="explore-search-input"
                name="footer-search-input" placeholder="Search Direct Messages">
        </div>
    </div>
    <p style="margin-top: 120px; padding: 0 20px;">Messages</p>
</div>
<?php
include_once 'footers.php';
?>

<!-- Adding class to active element -->
<script>
    $(document).ready(function () {
        $("#message").addClass("active_class");
    });
</script>