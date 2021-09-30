@extends('admin.layouts.app')
@section('head-tag')
<title>ادمین | پست ها</title>
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
                                    <h4 class="card-title">اخبار</h4>
                                    <span><a href="<?= route('admin.post.create') ?>" class="btn btn-success">ایجاد</a></span>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">

                                        <div class="">
                                                <table class=" table
                                            zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>عنوان</th>
                                                    <th>دسته</th>
                                                    <th>نویسنده</th>
                                                    <th>تصویر</th>
                                                    <th style="min-width: 16rem; text-align: left;">تنظیمات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php ?>

                                                <?php $numberPlus = 1; foreach ($posts as $post) { ?>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1"><?= $numberPlus ?></td>
                                                    <td><?= $post->title ?></td>
                                                    <td><?= $post->category()->name ?></td>
                                                    <td><?= fullUsername($post->user()) ?></td>
                                                    <td>
                                                        <img style="width: 90px;" src="<?= asset($post->image ) ?>" alt="">
                                                    </td>
                                                    <td style="min-width: 16rem; text-align: left;">
                                                        <?php if($post->status == 0){ ?>
                                                        <form class="d-inline" action="<?= route('admin.post.statusChange', [$post->id]) ?>" method="post">
                                                            <input type="hidden" name="_method" value="put">
                                                            <button type="submit"
                                                            class="btn btn-danger waves-effect waves-light">غیرفعال</button>
                                                        </form>
                                                        <?php }else{ ?>
                                                            
                                                            <form class="d-inline" action="<?= route('admin.post.statusChange', [$post->id]) ?>" method="post">
                                                                <input type="hidden" name="_method" value="put">
                                                                <button type="submit"
                                                                class="btn btn-success waves-effect waves-light">فعال</button>
                                                            </form>

                                                        <?php } ?>
                                                        <a href="<?= route('admin.post.edit', [$post->id]) ?>" class="btn btn-info waves-effect waves-light">ویرایش</a>
                                                        <form class="d-inline" action="<?= route('admin.post.delete', [$post->id]) ?>" method="post">
                                                            <input type="hidden" name="_method" value="delete">
                                                            <button type="submit"
                                                                class="btn btn-danger waves-effect waves-light">حذف</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php $numberPlus++;} ?>
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


        </div>
    </div>
    <!-- END: Content-->


@endsection
