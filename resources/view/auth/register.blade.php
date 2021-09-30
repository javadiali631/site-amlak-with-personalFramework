@extends('admin.layouts.page')

@section('head-tag')
<title>صفحه ثبت نام</title>
<link rel="stylesheet" href="<?= asset('admin-assets/css-rtl/pages/authentication.css') ?>">
@endsection


@section('content')
<div class="content-header row">
</div>
<div class="content-body">
    <section class="row flexbox-container">
        <div class="col-xl-8 col-10 d-flex justify-content-center">
            <div class="card bg-authentication rounded-0 mb-0">
                <div class="row m-0">
                    <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                        <img src="admin-assets/images/pages/register.jpg" alt="branding logo">
                    </div>
                    <div class="col-lg-6 col-12 p-0">
                        <div class="card rounded-0 mb-0 p-2">
                            <div class="card-header pt-50 pb-1">
                                <div class="card-title">
                                    <h4 class="mb-0">ایجاد حساب کاربری</h4>
                                </div>
                            </div>
                            <p class="px-2">برای ایجاد حساب اطلاعات زیر را وارد کنید</p>
                          
                            <?php if(errorExists()) { ?>
                            <div class="alert alert-danger">
                                <ul style="list-style-type:none">
                                <?php foreach(allErrors() as $error) { ?>
                                    <li>
                                     <?= $error ?>
                                    </li>
                                    <?php } ?>
                                  
                                </ul>
                            </div>
                            <?php } ?>
                        
                            <div class="card-content">
                                <div class="card-body pt-0">
                                    <form action="<?= route('auth.register') ?>" method="post" enctype="multipart/form-data">
                                        <div class="form-label-group">
                                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="نام" required>
                                            <label for="first_name">نام</label>
                                        </div>
                                        <div class="form-label-group">
                                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="نام خانوادگی" required>
                                            <label for="last_name">نام خانوادگی</label>
                                        </div>
                                        <div class="form-label-group">
                                            <input type="email" name="email" id="email" class="form-control" placeholder="ایمیل" required>
                                            <label for="email">ایمیل</label>
                                        </div>
                                        <div class="form-label-group">
                                            <input type="file" name="avatar" id="avatar" class="form-control" required>
                                            <label for="avatar">تصویر پروفایل</label>
                                        </div>
                                        <div class="form-label-group">
                                            <input type="password" name="password" id="password" class="form-control" placeholder="کلمه عبور" required>
                                            <label for="password">کلمه عبور</label>
                                        </div>
                                        <div class="form-label-group">
                                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" required>
                                            <label for="confirm_password">تکرار کلمه عبور</label>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <fieldset class="checkbox">
                                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                                        <input type="checkbox" checked>
                                                        <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                        </span>
                                                        <span class=""> قوانین و مقررات را پذیرفته ام</span>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <a href="" class="btn btn-outline-primary float-left btn-inline mb-50">ورود</a>
                                        <button type="submit" class="btn btn-primary float-right btn-inline mb-50">ثبت اطلاعات</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection