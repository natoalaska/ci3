            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="" method="post">
                        <div class="input-group">                      
                            <input name="search" type="text" class="form-control">
                            <span class="input-group-btn">
                                <button name="submit" class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.input-group -->
                </div>
                
                <!-- Login -->
                <div class="well">
                    <h4>Login</h4>
                    <form action="auth/login" method="post">
                        <div class="form-group">
                            <input name="username" type="text" class="form-control" placeholder="Username">
                        </div>
                        <div class="input-group">
                            <input name="password" type="password" class="form-control" placeholder="Password">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" name="login" type="submit">Login</button>
                            </span>
                        </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <?php
                                $i = 0;
                                foreach($categories as $row) {
                                    if($i % 2 == 0) {
                                        $title = $row->title;
                                        $id = $row->id;
                                        echo "<li><a href='".site_url('?category='.$id)."'>{$title}</a></li>";
                                    }
                                    $i++;
                                }
                                ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <?php
                                $i = 0;
                                foreach($categories as $row) {
                                    if($i % 2 != 0) {
                                        $title = $row->title;
                                        $id = $row->id;
                                        echo "<li><a href='".site_url('?category='.$id)."'>{$title}</a></li>";
                                    }
                                    $i++;
                                }
                                ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>