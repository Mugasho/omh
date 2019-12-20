<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/4/2019
 * Time: 12:02 AM
 */

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-primary">
                       <a href="<?php echo BASE_PATH .'hw/' ?>"
                                       class="btn btn-primary"><i class="icon icon-list-ordered"></i> Health
                    workers </a>
            </div>
            <form  method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-lg-6">
                            <label for="surname">Surname</label>
                            <input type="text" class="form-control" id="surname" name="surname" required="required">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="names">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="names">Other Names</label>
                            <input type="text" class="form-control" id="other_names" name="other_names">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="title">Title</label>
                            <select class="form-control" id="title" name="title">
                                <option value="">--select title--</option>
                                <option>Dr</option>
                                <option>Mr</option>
                                <option>Mrs</option>
                                <option>Miss</option>
                                <option>Prof</option>
                                <option>Rev</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="reg_no">RegNo</label>
                            <input type="text" class="form-control" id="reg_no" name="reg_no" required="required">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="status">Nationality</label>
                            <select class="form-control" id="nationality" name="nationality"  >
                                <option value="">--select nationality--</option>
                                <option>Uganda</option>
                                <option>Kenya</option>

                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="address">Address</label>
                            <input id="address" name="address" class="form-control">
                        </div>

                        <div class="form-group col-lg-6">
                            <label>Upload profile image</label>
                            <input type="file" class="form-input-styled" name="profile_pic" id="profile_pic" data-fouc="">
                            <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                        </div>

                    </div>

                    <h6 class="font-weight-semibold mb-3">Login Details </h6>
                    <div class="mb-3">
                        <div class="content-divider text-muted">
                            <span class="px-2"><i class="icon-circle-down2"></i></span>
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group col-lg-6">
                            <label for="email">email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary "> <i class="icon-floppy-disk"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
