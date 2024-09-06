<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" role="dialog" aria-labelledby="signupmodalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupmodal
    Label">Signup for RT-coder's cafe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="partials/handlesignup.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" aria-describedby="emailHelp"
                            name="username" placeholder="Enter username" Required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email"
                            placeholder="Enter email" Required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter Password"
                            name="password" Required>
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password:</label>
                        <input type="password" class="form-control" id="cpassword" placeholder="Enter Confirm Password"
                            name="cpassword" Required>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>