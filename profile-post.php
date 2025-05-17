<?php
include_once 'headers.php'
    ?>
<title><?php echo $_SESSION['name']; ?> (@<?php echo $_SESSION['username']; ?>)</title>

<!-- The Modal -->
<div class="modal" id="edit-user">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Profile</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data" id="edit-user-form">
                    <input type="hidden" id="edit_username_check" value="0">
                    <input type="hidden" id="edit_email_check" value="0">
                    <div class="edit_cover_pic_div">
                        <div class="covers" id="cover_edit"></div>
                        <label for="edit-cover-pic">
                            <div class="edit-icon"><img src="images/camera.png" alt="" height="50px">
                            </div>
                        </label>
                    </div>
                    <div class="edit_profile_pic_div" style="position: relative;">
                        <img src="" alt="" style="border-radius: 50%; height: 120px" class="profile_pics">
                        <label for="edit-profile-pic">
                            <div>
                                <img src="images/camera.png" alt="" class="myeditpic">
                            </div>
                        </label>
                    </div>

                    <div class="form-group" style="margin-top: 100px;"><br>
                        <span id="err-profile" class="error"></span><br>
                        <span id="err-cover" class="error"></span><br>
                        <label for="edit-name">Name</label>
                        <input type="text" class="form-control" id="edit-name" aria-describedby="nameHelp"
                            placeholder="Enter Name" name="edit-name" maxlength="15">
                        <span id="err-editname" class="error"></span>
                        <span class="length name-span">15</span>
                    </div>
                    <div class="form-group">
                        <label for="edit-username">Username</label>
                        <input type="text" class="form-control" id="edit-username" aria-describedby="usernameHelp"
                            placeholder="Enter Username" name="edit-username" maxlength="15">
                        <span id="err-editusername" class="error"></span>
                        <span class="length username-span">15</span>
                    </div>
                    <div class="form-group">
                        <label for="edit-email">Email</label>
                        <input type="email" class="form-control" id="edit-email" placeholder="Enter Email"
                            name="edit-email">
                        <span id="err-editemail" class="error"></span>
                    </div>
                    <div class="form-group">
                        <label for="edit-bio">Bio</label>
                        <input type="text" class="form-control" id="edit-bio" placeholder="Enter Bio" name="edit-bio"
                            maxlength="150">
                        <span class="length bio-span">150</span>
                    </div>
                    <div class="form-group">
                        <label for="edit-dob">Date of birth</label>
                        <input type="date" class="form-control" id="edit-dob" name="edit-dob">
                        <span id="err-editdob" class="error"></span>
                    </div>
                    <div class="form-group" style="display: none;">
                        <label for="edit-profile-pic">Profile Image</label>
                        <input type="file" class="form-control" id="edit-profile-pic" name="edit-profile-pic"
                            accept="image/png, image/jpeg, image/jpg, image/avif, image/gif">
                    </div>
                    <div class="form-group" style="display: none;">
                        <label for="edit-cover-pic">Cover Image</label>
                        <input type="file" class="form-control" id="edit-cover-pic" name="edit-cover-pic"
                            accept="image/png, image/jpeg, image/jpg, image/avif, image/gif">
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-dark text-white" data-dismiss="modal"
                    onclick="edit_user()">Save</button>
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--------------------Delete Post Modal--------------------->
<div class="modal" id="deleteModal">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
                <ul class="model-ul">
                    <li onclick="delete_post()">
                        <i class="fa-solid fa-trash text-danger"></i>
                        <a href="#" class="text-danger" id="delete-modal">Delete</a>
                    </li>
                    <li>
                        <img src="images/pin.png" alt="" height="20px">
                        <a href="#">Pin to your profile</a>
                    </li>
                    <li>
                        <img src="images/comment.png" alt="" height="20px">
                        <a href="#">Change who can reply</a>
                    </li>
                    <li>
                        <img src="images/graph.png" alt="" height="20px">
                        <a href="#">View post engagements</a>
                    </li>
                    <li>
                        <img src="images/link.png" alt="" height="20px">
                        <a href="#">Embed post</a>
                    </li>
                    <li>
                        <img src="images/graph.png" alt="" height="20px">
                        <a href="#">View post analytics</a>
                    </li>
                    <li>
                        <img src="images/marketing.png" alt="" height="20px">
                        <a href="#">Request community notes</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>



<!--------------------Comment Modal--------------------->
<div class="modal" id="comment-modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="" id="comment_form">
                    <div class="parent_div">
                        <div class="comment_profile_pic">
                            <img src="images/profile_pic.png" alt="" height="40px" style="border-radius: 50%;"
                                class="comment_dp">
                        </div>
                        <div class="comment_user">
                            <p>
                                <span class="comment_name"></span>
                                <span class="comment_username"></span>
                            </p>
                        </div>
                    </div>
                    <div>
                        <input type="text" name="comment_input" id="comment_input" placeholder="Post your reply"
                            maxlength="500">
                        <span class="comment_span">500</span>
                        <p class="comment-err-msg"></p>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="">
                <button type="submit" class="comment_reply_btn">Reply</button>
            </div>
        </div>
    </div>
</div>



<div class="profile">
    <div class="profile-name">
        <p>
            <span class="pro-name"></span><br>
            <span class="count"></span>
            <span class="post-posts"></span>
        </p>
    </div>
    <div class="cover">
        <!-- Cover image or background -->
    </div>
    <div class="profile-pic">
        <img src="" alt="" style="border-radius: 50%;" class="profile_pics" height="100px" width="100px">
    </div>

    <div class="edit-btn">
        <a href="#" class="edit" onclick="edit_profile()">Edit Profile</a>
    </div>
    <div class="profile-data">
        <p>
            <span class="pro-name"></span>
            <span><br>@<span class="username"></span></span>
        </p>
        <p class="bio"></p>
        <p>
            <img src="images/calendar.png" alt="" height="20px"> Joined
            <span class="joined"></span>
        </p>
        <p>
            <span>
                <a href="see_following.php" class="following see_following">15</a>
                <a href="see_following.php" class="see_following">Following</a>
            </span>
            <a href="see_followers.php" class="follower see_followers">1</a>
            <a href="see_followers.php" class="followers see_followers">Follower</a>
        </p>
    </div>
    <!-- </div> -->


    <!-- Adding class to active element -->
    <script>
        $(document).ready(function () {
            $("#profile").addClass("active_class");
        });
    </script>