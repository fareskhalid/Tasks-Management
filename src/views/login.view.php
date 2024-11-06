<?php include views_path('layout/header.php') ?>

<div class="container">
    <div class="login m-auto" style="max-width: 600px;">
        <h1 class="text-center mt-3">Login to your account</h1>
        <?php if(isset($error_message)): ?>
            <div class="alert alert-danger">
                <?= $error_message ?>
            </div>
        <?php endif ?>
        <form action="/login" method="post">
            <div class="mb-3">
                <label for="email1" class="form-label">Email address</label>
                <input type="email" name="email" value="<?= $email ?? ''?>" class="form-control" id="email1" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember_me">
                <label class="form-check-label" for="remember_me">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
            <a href="/register" class="d-block mt-3">Create a new account?</a>
        </form>
    </div>
</div>

<?php include views_path('layout/footer.php') ?>