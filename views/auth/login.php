<?php include("layouts/header.php"); ?>
<div class="container my-5 pt-5 ">
    <div class="col-sm-6 col-10 mx-auto border rounded-3">
        <div class="p-5 card-body bg-light rounded-4">
            <div class="row px-sm-3">
                <h2 class="fw-bold text-center"> Ismail Store</h2>
            </div>

            <div class="row p-sm-3">
                <form method="POST" action="proses.php?aksi=login">
                    <div class="mb-3">
                        <label for="username" class="form-label ">Username</label>
                        <input type="text" class="form-control " id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control " id="password" name="password">
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-outline-dark">Masuk</button>
                        <a href="register.php" class="btn btn-outline-secondary">Daftar</a>
                    </div>

                </form>
            </div>
        </div>

    </div>

</div>

<?php include("layouts/footer.php"); ?>