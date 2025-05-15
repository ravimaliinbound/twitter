<?php
include_once 'headers.php'
    ?>
<div class="middle">
    <h4 class="follow_user">Ravi Mali</h4>
    <div class="ul_list">
        <ul>
            <a href="#">
                <li>
                    <span class="follow_active" style="color: black; font-weight: 500">Followers</span>
                </li>
            </a>
            <a href="see_following.php">
                <li>
                    <span>Following</span>
                </li>
            </a>
        </ul>
    </div>
    <div class="followers_list">
        
    </div>


</div>


<script>
    $(document).ready(function () {
        show_followers();
    });
</script>