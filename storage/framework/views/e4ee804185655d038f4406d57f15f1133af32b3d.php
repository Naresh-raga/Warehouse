<?php $__env->startSection('content'); ?>
<section class="contact-section reg-section mrt-100 mrb-100">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="cleint-tab" data-bs-toggle="tab" data-bs-target="#cleint" type="button" role="tab" aria-controls="cleint" aria-selected="true">
                            <i class="fas fa-user"></i>&nbsp; Client Registration
                          </button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="warehouse-tab" data-bs-toggle="tab" data-bs-target="#warehouse" type="button" role="tab" aria-controls="warehouse" aria-selected="false">
                            <i class="fas fa-city"></i>&nbsp; Warehouse Registration
                          </button>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="cleint" role="tabpanel" aria-labelledby="cleint-tab">
                            <div class="signup-content reg-form">
                                <div class="signup-form">
                                    <h2 class="form-title">Client Registration</h2>
                                    <form method="POST" class="login-form" id="login-form" action="<?php echo e(route('register')); ?>">
                                    <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <label for="company_name"><i class="far fa-user"></i></label>
                                            <input type="text" name="company_name" required id="company_name" placeholder="Comapany Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="mobile"><i class="fas fa-phone-alt"></i></label>
                                            <input type="text" name="mobile" required id="mobile" placeholder="Mobile">
                                        </div>
                                        <div class="form-group w-100">
                                            <label for="address" class="add_ress"><i class="fas fa-map-marker-alt"></i></label>
                                            <textarea name="address" id="address" required placeholder="Address"></textarea>
                                        </div>
                                        <div class="form-group w-100">
                                            <label for="email"><i class="fas fa-envelope"></i></label>
                                            <input type="email" required name="email" id="email" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="state"><i class="fas fa-flag"></i></label>
                                            <input type="text" name="state" required id="state" placeholder="State">
                                        </div>
                                        <div class="form-group">
                                            <label for="city"><i class="fas fa-city"></i></label>
                                            <input type="text" name="city" required id="city" placeholder="City">
                                        </div>
                                        <div class="form-group">
                                            <label for="pincode"><i class="fas fa-map-marked-alt"></i></label>
                                            <input type="text" name="pincode"  required id="pincode" placeholder="Pincode">
                                        </div>
                                        <div class="form-group">
                                            <label for="name"><i class="fas fa-user"></i></label>
                                            <input type="text" name="name" id="name" required placeholder="Your Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="pan"><i class="fas fa-address-card"></i></label>
                                            <input type="text" name="pan" id="pan" required placeholder="Pan No">
                                        </div>
                                        <div class="form-group">
                                            <label for="gst"><i class="fas fa-certificate"></i></label>
                                            <input type="text" name="gst" id="gst" required placeholder="GST No">
                                        </div>
                                        <div class="form-group">
                                            <label for="adhar"><i class="fas fa-id-card"></i></label>
                                            <input type="text" name="adhar" id="adhar" required placeholder="Adhar No">
                                        </div>
                                        <div class="form-group">
                                            <label for="password"><i class="fas fa-lock"></i></label>
                                            <input type="password" name="password" id="password" required placeholder="Your Password">
                                        </div>
                                        <!-- <div class="form-group w-100">
                                            <label for="yourlocation"><i class="fas fa-location-arrow"></i></label>
                                            <input type="text" name="yourlocation" id="yourlocation" placeholder="Your Location">
                                        </div>
                                        <div class="form-group">
                                            <label for="latitude"><i class="fas fa-map"></i></label>
                                            <input type="text" name="latitude" id="latitude" placeholder="Latitude">
                                        </div>
                                        <div class="form-group">
                                            <label for="longitude"><i class="fas fa-map"></i></label>
                                            <input type="text" name="longitude" id="longitude" placeholder="Longitude">
                                        </div> -->
                                        <div class="form-group form-button">
                                            <button type="submit" value="submit" name class="btn-main">
                                                <span>Register</span>
                                            </button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="warehouse" role="tabpanel" aria-labelledby="warehouse-tab">
                            <div class="signup-content reg-form">
                                <div class="signup-form">
                                    <h2 class="form-title">Warehouse Registration</h2>
                                    <form method="POST" class="login-form" id="login-form">
                                        <div class="form-group">
                                            <label for="warehouse-name"><i class="far fa-user"></i></label>
                                            <input type="text" name="warehouse-name" id="warehouse-name" placeholder="Warehouse Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone"><i class="fas fa-phone-alt"></i></label>
                                            <input type="text" name="phone" id="phone" placeholder="Phone">
                                        </div>
                                        <div class="form-group w-100">
                                            <label for="address" class="add_ress"><i class="fas fa-map-marker-alt"></i></label>
                                            <textarea name="address" id="address" placeholder="Address"></textarea>
                                        </div>
                                        <div class="form-group w-100">
                                            <label for="state"><i class="fas fa-flag"></i></label>
                                            <input type="text" name="state" id="state" placeholder="State">
                                        </div>
                                        <div class="form-group">
                                            <label for="city"><i class="fas fa-city"></i></label>
                                            <input type="text" name="city" id="city" placeholder="City">
                                        </div>
                                        <div class="form-group">
                                            <label for="pincode"><i class="fas fa-map-marked-alt"></i></label>
                                            <input type="text" name="pincode" id="pincode" placeholder="Pincode">
                                        </div>
                                        <div class="form-group">
                                            <label for="latitude"><i class="fas fa-map"></i></label>
                                            <input type="text" name="latitude" id="latitude" placeholder="Latitude">
                                        </div>
                                        <div class="form-group">
                                            <label for="longitude"><i class="fas fa-map"></i></label>
                                            <input type="text" name="longitude" id="longitude" placeholder="Longitude">
                                        </div>
                                        <div class="form-group form-button">
                                            <button type="submit" value="submit" name class="btn-main">
                                                <span>Register</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\wms\resources\views/auth/register.blade.php ENDPATH**/ ?>