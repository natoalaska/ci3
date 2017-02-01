                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            User
                            <small>Author</small>
                        </h1>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" value="<?php echo isset($user[0]->username)?$user[0]->username:'';?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="firstName">First Name</label>
                                <input type="text" name="firstName" id="firstName" value="<?php echo isset($user[0]->firstName)?$user[0]->firstName:'';?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input type="text" name="lastName" id="lastName" value="<?php echo isset($user[0]->lastName)?$user[0]->lastName:'';?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" value="<?php echo isset($user[0]->email)?$user[0]->email:'';?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="">Select Role</option>
                                    <option value="admin" <?php echo isset($user) && $user[0]->role=='admin'?'selected':'';?>>Admin</option>
                                    <option value="subscriber" <?php echo isset($user) && $user[0]->role=='subscriber'?'selected':'';?>>Subscriber</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="add_edit" value="<?php echo isset($post)?'Update':'Publish'; ?> Post" class="form-control btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->