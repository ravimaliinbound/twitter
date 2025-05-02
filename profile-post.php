<?php
include_once 'headers.php'
    ?>
<title><?php echo $_SESSION['name']; ?> (@<?php echo $_SESSION['username']; ?>)</title>

<!-- Edit Modal -->
<div id="edit-user" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="margin-left: -100px">&times;</button>
                <div style="margin-left: -100px">
                    <h4>Edit Profile</h4>
                </div>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="edit-name">Name</label>
                        <input type="text" class="form-control" id="edit-name" aria-describedby="nameHelp"
                            placeholder="Enter Name" name="edit-name">
                    </div>
                    <div class="form-group">
                        <label for="edit-username">Username</label>
                        <input type="text" class="form-control" id="edit-username" aria-describedby="usernameHelp"
                            placeholder="Enter Username" name="edit-username">
                    </div>
                    <div class="form-group">
                        <label for="edit-email">Email</label>
                        <input type="email" class="form-control" id="edit-email" placeholder="Enter Email" name="edit-email">
                    </div>
                    <div class="form-group">
                        <label for="edit-bio">Bio</label>
                        <input type="text" class="form-control" id="edit-bio" placeholder="Enter Bio" name="edit-bio">
                    </div>
                    <div class="form-group">
                        <label for="edit-dob">Date of birth</label>
                        <input type="date" class="form-control" id="edit-dob" name="edit-dob">
                    </div>
                    <div class="form-group">
                        <label for="edit-profile-pic">Profile Image</label>
                        <input type="file" class="form-control" id="edit-profile-pic">
                    </div>
                    <div class="form-group">
                        <label for="edit-cover-pic">Cover Image</label>
                        <input type="file" class="form-control" id="edit-cover-pic">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<div class="profile">
    <div class="profile-name">
        <p><span class="pro-name"></span><br>0 posts</p>
    </div>
    <div class="cover">
        <!-- Cover image or background -->
        <!-- <img src="images/background.PNG" alt="" height="100%" width="100%"> -->
    </div>
    <div class="profile-pic">
        <!-- <p class="profile-fname"><?php echo $_SESSION['firstname'] ?></p> -->
        <img src="images/profile_pic.png" alt="" height="100%" style="border-radius: 50%;">
    </div>
    <div>
        <a href="#" class="edit" data-toggle="modal" data-target="#edit-user" onclick="edit_profile()">Edit Profile</a>
    </div>
    <div class="profile-data">
        <p>
            <span class="pro-name"></span>

            <span><br>@
                <span class="username"></span>
            </span>
        </p>
        <p class="bio"></p>
        <p>
            <img src="images/calendar.png" alt="" height="20px"> Joined
            <span class="joined"></span>
        </p>
        <p>
            <span>
                <span class="following">15</span> Following
            </span>
            <span class="follower">1</span>
            <span>Follower</span>
        </p>
    </div>
    <!-- </div> -->


    <!-- Adding class to active element -->
    <script>
        $(document).ready(function () {
            $("#profile").addClass("active_class");
        });
    </script>