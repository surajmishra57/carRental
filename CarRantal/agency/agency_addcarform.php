<div class="container">
    <div class="row mt-5">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form class="row g-3 shadow-lg p-3 mb-5 bg-white rounded" enctype="multipart/form-data" method="post"
                actioin="">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label"><i class="fa-solid fa-car-side"></i> Vehical
                        Model</label>
                    <input type="text" class="form-control" id="inputEmail4" name="v_model" required>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label"><i class="fa-solid fa-input-numeric"></i> Vehical
                        Number</label>
                    <input type="text" class="form-control" id="inputPassword4" name="v_number" required>
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label"><i class="fa-solid fa-person-seat-reclined"></i> Seting
                        capacity</label>
                    <input type="number" class="form-control" id="inputAddress" name="v_capacity" min="1" required>
                </div>
                <div class="col-12">
                    <label for="inputAddress2" class="form-label"><i class="fa-solid fa-indian-rupee-sign"></i> Rent Per
                        day</label>
                    <input type="number" class="form-control" id="inputAddress2" name="v_rent" min="1" required>
                </div>

                <div class="col-12">
                    <label for="inputAddress2" class="form-label"><i class="fa-solid fa-camera"></i> Vehical
                        Image</label>
                    <input type="file" class="form-control" id="inputAddress2 " name="v_image">
                </div>


                <div class="col-12">
                    <button type="submit" class="btn btn-success" name="v_save">Save</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </form>
            <div class="text-center"><a href="./agency_carstore.php" class="btn btn-success  shadow-sm "> Back </a>
            </div>
        </div>
    </div>
    <div class="col-sm-3"></div>
</div>
</div>