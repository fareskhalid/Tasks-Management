<?php include views_path('layout/header.php') ?>

<div class="container">
    <div class="login m-auto" style="max-width: 600px;">
        <h1 class="text-center mt-3">Create a new account</h1>
        <?php if(isset($error_message)): ?>
            <div class="alert alert-danger">
                <?= $error_message ?>
            </div>
        <?php endif ?>
        <form action="/register" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" value="<?= $username ?? '' ?>" class="form-control" id="username" required>
            </div>
            <div class="mb-3">
                <label for="email1" class="form-label">Email address</label>
                <input type="email" name="email" value="<?= $email ?? '' ?>" class="form-control" id="email1" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Create Account</button>
            <a href="/login" class="d-block mt-3">Already have an account?</a>
        </form>
    </div>
</div>

<?php include views_path('layout/footer.php') ?>