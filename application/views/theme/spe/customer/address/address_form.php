<div class="container content-container mb-5">
    
    <h4 class="mt-5 mb-5">Tambah Alamat</h4>
    <?php alert_html() ?>

    <form class="needs-validation was-validated" novalidate="" method="post" action="<?=base_url('customer/address/form_action')?>">
        <input type="hidden" name="id" id="id" value="<?=($address_data->id) ? $address_data->id : '';?>">
    <h5>Kontak</h5>
    <div class="row">
        <div class="col-md-12 mb-3">
        <label for="fullName">Nama Lengkap</label>
        <input type="text" class="form-control" id="fullName" placeholder="" required="" name="full_name" value="<?=($address_data->full_name) ? $address_data->full_name : '';?>">
        <div class="invalid-feedback">
            Valid name is required.
        </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="address2">Nomor Telepon </label>
        <input type="number" class="form-control" id="address2" placeholder="0895xxxx" required="" name="phone" value="<?=($address_data->phone) ? $address_data->phone : '';?>">
    </div>

    <hr>
    <h5>Alamat</h5>
    <div class="mb-3">
        <label for="address">Alamat Lengkap</label>
        <!-- <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="" name="address"> -->
        <textarea class="form-control" name="address" id="address" cols="30" rows="5" required=""><?=($address_data->address) ? $address_data->address : '';?></textarea>
        <div class="invalid-feedback">
        Please enter your address.
        </div>
    </div>

    <!-- <div class="row">
        <div class="col-md-5 mb-3">
        <label for="country">Country</label>
        <select class="custom-select d-block w-100" id="country" required="">
            <option value="">Choose...</option>
            <option>United States</option>
        </select>
        <div class="invalid-feedback">
            Please select a valid country.
        </div>
        </div>
        <div class="col-md-4 mb-3">
        <label for="state">State</label>
        <select class="custom-select d-block w-100" id="state" required="">
            <option value="">Choose...</option>
            <option>California</option>
        </select>
        <div class="invalid-feedback">
            Please provide a valid state.
        </div>
        </div>
        <div class="col-md-3 mb-3">
        <label for="zip">Zip</label>
        <input type="text" class="form-control" id="zip" placeholder="" required="">
        <div class="invalid-feedback">
            Zip code required.
        </div>
        </div>
    </div> -->
    <hr class="mb-4">
    <button class="btn btn-primary btn-lg btn-block" type="submit">Simpan</button>
    </form>
</div>