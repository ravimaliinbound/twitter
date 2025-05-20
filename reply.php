<?php
include_once 'headers.php';
?>
<div class="middle">
    <div class="user_d">
        <h3 class="post_d">Reply</h3>
    </div>
    <div class="user_comment">
    
    </div>
</div>

<?php
include_once 'footers.php';
?>


<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['id'] = $id;
}
$id = $_SESSION['id'];
?>
<script>
    function comments_details(id) {
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: { 'action': 'comment_details', 'id': id },
            success: function (data) {
            console.log(data)
                if (data) {
                     $(".user_comment").html(data)
                } 
            }
        });
    }
    $(document).ready(function () {
        var id = '<?php echo $id; ?>';
        comments_details(id);
    });
</script>