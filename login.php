<?php include('includes/header.php'); ?>

<div class="container vh-95">
    <div class=" justify-content-center">
        <div class="col-md-12">
            <h2 class="text-center my-4">Login</h2>
            <form action="../cinema/controleurs/logingControl.php" method="post" class="text-center">
                <div class="form-group text-center">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group text-center">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                </div>
                <div class="form-group form-check text-center">
                    <input type="checkbox" class="form-check-input" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>

</html>