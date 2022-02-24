<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" aria-labelledby="signupmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupmodalLabel">Signup for iDiscuss Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="signupform">
                    <form action="/forum/partials/_handelsignup.php" method="post">
                        <div class="mb-3 ">
                            <label for="username" class="form-label">Email</label>
                            <input type="email" maxlength="16" class="form-control" id="signemail" name="signupemail"
                                aria-describedby="emailHelp">

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="cpassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="cpassword" name="cpassword">
                                <div id="emailHelp" class="form-text">Make sure password is same</div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Sign UP</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>