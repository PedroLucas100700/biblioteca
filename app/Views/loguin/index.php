    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9 mt-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image align-content-center ">  
                                    <img class="rounded mx-5 d-block img-thumbnail "src="<?=base_url('assets/img/logolivro.jpg')?>" alt="Bootstrap" width="400" height="400">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>

                                    <?php if (session()->has('error')): ?>
                                    <div class="alert alert-danger">
                                        <?= session()->get('error') ?>
                                    </div>
                                    <?php endif; ?>

                                    <?=form_open('Login/authenticate')?>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="email" name="email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." value="<?php echo old('email'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="password" class="form-control form-control-user" aria-describedby="basic-default-password" id="senha" name="senha">
                                                <span class="input-group-text cursor-pointer" id="basic-default-password" onclick="mostrarSenha()" role="button">
                                                    <i class="bi bi-eye-fill"  id="btn-senha"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Entrar</button>
                                        <hr>
                                    <?=form_close()?>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>