<form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email" value="<?php echo $d['email']; ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="username" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $d['username']; ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $d['nama']; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
            <?php if ($d['alamat'] == "") {
                echo "<p class='alert alert-danger'>Alamat belum diatur</p>";
            }
            ?>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $d['alamat']; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="no_hp" class="col-sm-2 col-form-label">No HP</label>
        <div class="col-sm-10">
            <?php if ($d['no_hp'] == "") {
                echo "<p class='alert alert-danger'>Nomer HP belum diatur</p>";
            }
            ?>
            <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $d['no_hp']; ?>">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2">Foto</div>
        <div class="col-sm-10">
            <div class="row">
                <div class="col-sm-3">
                    <img src="../assets/img/user/<?php echo $d['gambar_user']; ?>" class="img-thumbnail" id="uploadPreview" style="width: 150px; height: 150px;"><br>
                </div>
                <div class="col-sm-9">
                    <div class="custom-file">
                        <input class="custom-file-input" id="uploadImage" type="file" accept=".jpg, .png" name="foto_user" onchange="PreviewImage();" />
                        <label class="custom-file-label" for="image">Pilih foto</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="id_user" value="<?php echo $d['id_user']; ?>">
    <input type="hidden" name="foto_lama" value="<?php echo $d['gambar_user']; ?>">
    <div class="form-group row justify-content-end">
        <div class="col-sm-10">
            <button type="submit" name="edit" class="btn btn-primary">Edit</button>
        </div>
    </div>


</form>