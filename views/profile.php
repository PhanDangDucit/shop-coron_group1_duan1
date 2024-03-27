<?php
    require_once "models/user_model.php";
    $user = lay_tat_ca_thong_tin_cua_mot_user($user_id);
    $contact = lay_thong_tin_lien_lac_cua_user($user_id);
    $contact_default = lay_thong_tin_lien_lac_mac_dinh($user_id)['contact_id'];
?>


<!-- UI -->
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img
              src="<?=$user['avatar']?>" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;"
            >
            <h5 class="my-3"><?=$user['fullname']?></h5>
            <div class="d-flex justify-content-center mb-2">
              <button type="button" class="btn btn-primary">Follow</button>
              <button type="button" class="btn btn-outline-primary ms-1">Message</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <?php
                foreach ($contact as $item) {;
            ?>
              <?php
                if($item['contact_id'] == $contact_default) {
              ?>
                <h3>Địa chỉ dùng giao hàng</h3>
              <?php } else { ?>
                <h4>Địa chỉ bổ sung</h4>
              <?php }?>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?=$item['email']?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                      <p class="text-muted mb-0"><?=$item['phone']?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Address</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0"><?=$item['address']?></p>
                </div>
              </div>
              <hr>
            <?php }?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card mb-12 mb-md-0">
              <div class="card-body">
                <h3 class="mb-4">
                  <span class="me-1">Xem đơn hàng của bạn</span> 
                </h3>
                <a href="index.php?page=view_order" class="btn btn-primary">View</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>