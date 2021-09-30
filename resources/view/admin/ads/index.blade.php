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
                            <h4 class="card-title">آگهی</h4>
                            <span><a href="<?= route("admin.ads.create") ?>" class="btn btn-success">ایجاد</a></span>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">

                                <div class="">
                                    <table class="table zero-configuration">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>عنوان</th>
                                            <th>دسته</th>
                                            <th>آدرس</th>
                                            <th>تصویر</th>
                                            <th>مشخصات</th>
                                            <th>تگ</th>
                                            <th>کاربر</th>
                                            <th style="width: 22rem;">تنظیمات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($ads as $advertise) { ?>
                                        <tr>
                                            <td><?= $advertise->id ?></td>
                                            <td><?= $advertise->title ?></td>
                                            <td><?= $advertise->category()->name ?></td>
                                            <td><?= $advertise->address ?></td>
                                            <td><img style="width: 90px;" src="<?= asset($advertise->image) ?>" alt=""></td>
                                            <td>
                                                <ul>
                                                    <li>floor : <?= $advertise->floor ?></li>
                                                    <li>year : <?= $advertise->year ?></li>
                                                    <li>storeroom : <?= $advertise->storeroom ?></li>
                                                    <li>balcony : <?= $advertise->balcony ?></li>
                                                    <li>area : <?= $advertise->area ?></li>
                                                    <li>room : <?= $advertise->room ?></li>
                                                    <li>toilet : <?= $advertise->toilet ?></li>
                                                    <li>parking : <?= $advertise->parking ?></li>
                                                </ul>
                                            </td>
                                            <td><?= $advertise->tag ?></td>
                                            <td><?= fullUsername($advertise->user()) ?></td>
                                            <td style="width: 22rem;">
                                                <a href="<?= route('admin.ads.gallery', ['id' => $advertise->id]) ?>" class="btn btn-warning">گالری</a>
                                                <a href="<?= route('admin.ads.edit', ['id' => $advertise->id]) ?>" class="btn btn-info">ویرایش</a>
                                                <form class="d-inline" action="<?= route('admin.ads.delete', ['id' => $advertise->id]) ?>" method="post">
                                                    <input type="hidden" name="_method" value="delete">
                                                    <button type="submit" class="btn btn-danger">حذف</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ Zero configuration table -->
    </div>

@endsection