<?php
include_once 'headers.php'
    ?>
<div class="middle">
    <h4 class="follow_user">Ravi Mali</h4>
    <div class="ul_list">
        <ul>
            <a href="see_followers.php">
                <li>
                    <span>Followers</span>
                </li>
            </a>
            <a href="#">
                <li>
                    <span class="follow_active" style="color: black; font-weight: 500">Following</span>
                </li>
            </a>
        </ul>
    </div>
    <div class="following_list">
        
    </div>
</div>

<script>
    $(document).ready(function(){
        show_following();
    });
</script>