

       
       @extends('admin.layouts.app')
       @section('head-tag')
       <title>ادمین | اسلاید</title>
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
                                    <h4 class="card-title">اسلاید</h4>
                                    <span><a href="<?= route("admin.slide.create") ?>" class="btn btn-success">ایجاد</a></span>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">

                                        <div class="">
                                            <table class="table zero-configuration">
                                                
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                    <th>عنوان</th>
                                                    <th>لینک</th>
                                                    <th>آدرس</th>
                                                    <th>مبلغ</th>
                                                    <th>تصویر</th>
                                                    <th style="min-width: 16rem; text-align: left;">تنظیمات</th>
                                                </tr>
                                            </thead>
                                                <tbody>
                                                    <?php $numberPlus = 1; foreach ($slides as $slide) { ?>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1"><?= $numberPlus?></td>
                                                        <td><?= $slide->title ?></td>
                                                        <td><?= $slide->url ?></td>
                                                        <td><?= $slide->address ?></td>
                                                        <td><?= $slide->amount ?> تومان</td>
                                                        <td><img style="width: 90px;" src="<?= asset($slide->image) ?>" alt=""></td>
                                                        <td style="min-width: 16rem; text-align: left;">
                                                            <a href="<?= route('admin.slide.edit',[$slide->id]) ?>" class="btn btn-info waves-effect waves-light">ویرایش</a>
                                                            <form class="d-inline" action="<?= route('admin.slide.delete',[$slide->id]) ?>" method="post">
                                                                <input type="hidden" name="_method" value="delete">
                                                                <button type="submit" class="btn btn-danger waves-effect waves-light">حذف</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <?php $numberPlus++; } ?>

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