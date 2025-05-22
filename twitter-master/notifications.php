<?php
include_once 'headers.php';
?>
<title>Notifications / X</title>
<div class="notification">
    <div class="notification-fix">
        <p class="notify">Notifications</p>



        <script>
            $(document).ready(function () {
                $.ajax({
                    url: 'action.php',
                    type: 'post',
                    data: {
                        'action': 'mark_read'
                    },
                    success: function (data) {
                        $("#notifDot").css('display', 'none'); // Make notifications mark as read
                    }
                })
                $("#notification").addClass("active_class"); // Add active class
            });
        </script>