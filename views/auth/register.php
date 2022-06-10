<?php include("layouts/header.php"); ?>
<div class="container my-5 pt-5 ">
    <div class="col-sm-6 col-10 mx-auto border rounded-3">

        <div class="p-5 card-body bg-light rounded-4">
            <div class="row px-sm-3">
                <h2 class="fw-bold text-center"> Form Registrasi</h2>
            </div>

            <div class="row p-md-3">
                <form method="POST" action="proses.php?aksi=register">
                    <div class="row">
                    <div class="col-md-12 mb-3">
                            <label for="name" class="form-label ">Nama Lengkap</label>
                            <input type="text" class="form-control " id="name" name="name" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="username" class="form-label ">Username</label>
                            <input type="text" class="form-control " id="username" name="username" required>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6 mb-3">
                            <label for="gender" class="form-label ">Nama Lengkap</label>
                            <select class="form-select" aria-label="Default select example" id="gender" name="gender" required>
                                <option>-- Pilih --</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">No. Handphone</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="email" class="form-label ">Email</label>
                            <input type="email" class="form-control " id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <textarea class="form-control" id="address" rows="2" name="address"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="password1" class="form-label">Buat Password</label>
                            <input type="password" class="form-control " id="password1" name="password1" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password2" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control " id="password2" name="password2" required>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-outline-dark">Daftar</button>
                    </div>

                </form>
            </div>
        </div>

    </div>

</div>

<?php include("layouts/footer.php"); ?>