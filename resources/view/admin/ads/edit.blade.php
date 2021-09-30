@extends('admin.layouts.app')


@section('head-tag')
    <title>ادمین / آگهی</title>
@endsection


@section('content')
    <div class="content-header row">

    </div>
    <div class="content-body">

        <!-- Zero configuration table -->
        <section id="basic-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">ویرایش</h4>
                            <span><a href="<?= route("admin.ads.index") ?>" class="btn btn-success">بازگشت</a></span>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">

                                <form class="row" action="<?= route("admin.ads.update",[$advertise->id]) ?>" method="post" enctype="multipart/form-data">

                                    <input type="hidden" name="_method" value="put">
                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <label for="title">عنوان</label>
                                            <input value="<?= oldOrValue('title', $advertise->title) ?>" name="title" type="text" id="title" class="form-control <?= errorClass('title') ?>" placeholder="عنوان ...">
                                            <?= errorText('title') ?>
                                        </fieldset>
                                    </div>



                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <label for="image">تصویر</label>
                                            <input name="image" type="file" id="image" class="form-control-file <?= errorClass('image') ?>">
                                        </fieldset>
                                        <?= errorText('image') ?>
                                    </div>

                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <label for="address">آدرس</label>
                                            <input value="<?= oldOrValue('address', $advertise->address) ?>" name="address" type="text" id="address" class="form-control <?= errorClass('address') ?>" placeholder="آدرس ...">
                                            <?= errorText('address') ?>
                                        </fieldset>
                                    </div>


                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <label for="floor">کف</label>
                                            <input value="<?= oldOrValue('floor', $advertise->floor) ?>" name="floor" type="text" id="floor" class="form-control <?= errorClass('floor') ?>" placeholder="کف ...">
                                            <?= errorText('floor') ?>
                                        </fieldset>
                                    </div>


                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <label for="year">سال ساخت</label>
                                            <input value="<?= oldOrValue('year', $advertise->year) ?>" name="year" type="text" id="year" class="form-control <?= errorClass('year') ?>" placeholder="سال ساخت ...">
                                            <?= errorText('year') ?>
                                        </fieldset>
                                    </div>


                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <label for="amount">قیمت</label>
                                            <input value="<?= oldOrValue('amount', $advertise->amount) ?>" name="amount" type="text" id="amount" class="form-control <?= errorClass('amount') ?>" placeholder="قیمت ...">
                                            <?= errorText('amount') ?>
                                        </fieldset>
                                    </div>


                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <label for="area">متراژ</label>
                                            <input value="<?= oldOrValue('area', $advertise->area) ?>" name="area" type="text" id="area" class="form-control <?= errorClass('area') ?>" placeholder="سال ساخت ...">
                                            <?= errorText('area') ?>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <label for="room">اتاق</label>
                                            <input value="<?= oldOrValue('room', $advertise->room) ?>" name="room" type="text" id="room" class="form-control <?= errorClass('room') ?>" placeholder="سال ساخت ...">
                                            <?= errorText('room') ?>
                                        </fieldset>
                                    </div>


                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <label for="tag">تگ</label>
                                            <input value="<?= oldOrValue('tag', $advertise->tag) ?>" name="tag" type="text" id="tag" class="form-control <?= errorClass('tag') ?>" placeholder="تگ ...">
                                            <?= errorText('tag') ?>
                                        </fieldset>
                                    </div>


                                    <div class="col-md-12">
                                        <section class="form-group">
                                            <label for="description">متن</label>
                                            <textarea class="form-control <?= errorClass('description') ?>" id="description" rows="5" name="description" placeholder="متن ..."><?= oldOrValue('description', $advertise->description) ?></textarea>
                                            <?= errorText('description') ?>
                                        </section>
                                    </div>


                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <div class="form-group">
                                                <label for="storeroom">انبار</label>
                                                <select name="storeroom" class="select2 form-control <?= errorClass('storeroom') ?>">
                                                    <option value="0" <?= oldOrValue('storeroom',$advertise->storeroom) == 0 ? 'selected' : '' ?>>ندارد</option>
                                                    <option value="1" <?= oldOrValue('storeroom',$advertise->storeroom) == 1 ? 'selected' : '' ?>>دارد</option>
                                                </select>
                                                <?= errorText('storeroom') ?>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <div class="form-group">
                                                <label for="balcony">بالکن</label>
                                                <select name="balcony" class="select2 form-control <?= errorClass('balcony') ?>">
                                                    <option value="0" <?= oldOrValue('balcony', $advertise->balcony) == 0 ? 'selected' : '' ?>>ندارد</option>
                                                    <option value="1" <?= oldOrValue('balcony', $advertise->balcony) == 1 ? 'selected' : '' ?>>دارد</option>
                                                </select>
                                                <?= errorText('balcony') ?>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <div class="form-group">
                                                <label for="toilet">توالت</label>
                                                <select name="toilet" class="select2 form-control <?= errorClass('toilet') ?>">
                                                    <option value="ایرانی" <?= oldOrValue('toilet', $advertise->toilet) == 'ایرانی' ? 'selected' : '' ?>>ایرانی</option>
                                                    <option value="فرنگی" <?= oldOrValue('toilet', $advertise->toilet) == 'فرنگی' ? 'selected' : '' ?>>فرنگی</option>
                                                    <option value="ایرانی و فرنگی" <?= oldOrValue('toilet', $advertise->toilet) == 'ایرانی و فرنگی' ? 'selected' : '' ?>>ایرانی و فرنگی</option>
                                                </select>
                                                <?= errorText('toilet') ?>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <div class="form-group">
                                                <label for="sell_status">نوع آگهی</label>
                                                <select name="sell_status" class="select2 form-control <?= errorClass('sell_status') ?>">
                                                    <option value="0"  <?= oldOrValue('sell_status', $advertise->sell_status) == 0 ? 'selected' : '' ?>>خرید</option>
                                                    <option value="1"  <?= oldOrValue('sell_status', $advertise->sell_status) == 0 ? 'selected' : '' ?>>اجاره</option>
                                                </select>
                                                <?= errorText('sell_status') ?>
                                            </div>
                                        </fieldset>
                                    </div>


                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <div class="form-group">
                                                <label for="type">نوع ملک</label>
                                                <select name="type" class="select2 form-control <?= errorClass('type') ?>">
                                                    <option value="0" <?= oldOrValue('type', $advertise->type) == 0 ? 'selected' : '' ?>>آپارتمان</option>
                                                    <option value="1" <?= oldOrValue('type', $advertise->type) == 1 ? 'selected' : '' ?>>ویلایی</option>
                                                    <option value="2" <?= oldOrValue('type', $advertise->type) == 2 ? 'selected' : '' ?>>زمین</option>
                                                    <option value="3" <?= oldOrValue('type', $advertise->type) == 3 ? 'selected' : '' ?>>سوله</option>
                                                </select>
                                                <?= errorText('type') ?>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <div class="form-group">
                                                <label for="parking">پارکینگ</label>
                                                <select name="parking" class="select2 form-control <?= errorClass('parking') ?>">
                                                    <option value="0" <?= oldOrValue('parking', $advertise->parking) == 0 ? 'selected' : '' ?>>ندارد</option>
                                                    <option value="1" <?= oldOrValue('parking', $advertise->parking) == 1 ? 'selected' : '' ?>>دارد</option>
                                                </select>
                                                <?= errorText('parking') ?>
                                            </div>
                                        </fieldset>
                                    </div>


                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <div class="form-group">
                                                <label for="cat_id">دسته</label>
                                                <select name="cat_id" class="select2 form-control <?= errorClass('cat_id') ?>">
                                                    <?php foreach ($categories as $categorySelect) { ?>
                                                    <option value="<?= $categorySelect->id ?>" <?= oldOrValue('cat_id', $advertise->cat_id) == $categorySelect->id ? 'selected' : '' ?>><?= $categorySelect->name ?></option>
                                                    <?php } ?>
                                                </select>
                                                <?= errorText('cat_id') ?>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-6">
                                        <section class="form-group">
                                            <button type="submit" class="btn btn-primary">ویرایش</button>
                                        </section>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('script')
    <script src="<?= asset('ckeditor/ckeditor.js'); ?>"></script>
    <script type="text/javascript">
        CKEDITOR.replace( 'description' );
    </script>
@endsection
