@extends('app.layouts.app')

@section('title')
<title>پست ها</title>
@endsection

@section('content')

<div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= route('home.index') ?>">خانه</a></span> <span> دسته بندی</span></p>
                <h1 class="mb-3 bread"> دسته بندی ها</h1>
            </div>
        </div>
    </div>
</div>



<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">پیشنهادات ویژه</span>
                <h2> <?= $category->name ?></h2>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php foreach(paginate($ads, 4) as $advertise) { ?>
            <div class="col-md-3 ftco-animate">
                <div class="properties">
                    <a href="<?= route('home.ads', [$advertise->id]) ?>" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url('<?= asset($advertise->image) ?>');">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-search2"></span>
                        </div>
                    </a>
                    <div class="text p-3">
                        <span class="status <?= $advertise->sellStatus() == 'خرید' ? 'sale' : 'rent' ?>"><?= $advertise->sellStatus() ?></span>
                        <div class="d-flex">
                            <div class="one">
                                <h3><a href="<?= route('home.ads', [$advertise->id]) ?>"><?= $advertise->title ?></a></h3>
                                <p><?= $advertise->type() ?></p>
                            </div>
                            <div class="two">
                                <span class="price"><?= $advertise->amount ?></span>
                            </div>
                        </div>
                        <p><?= html(substr($advertise->description, 0, 40 )) ?></p>
                        <hr>
                        <p class="bottom-area d-flex">
                            <span><i class="flaticon-selection"></i> ۲۹۰ متر</span>
                            <span class="ml-auto"><i class="flaticon-bathtub"></i> ۳</span>
                            <span><i class="flaticon-bed"></i> ۳</span>
                        </p>
                    </div>
                </div>
            </div>
            <?php } ?>
      
     
  
        </div>
     <?= paginateView($ads, 4) ?>
    </div>
</section>



<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">بلاگ ها</span>
                <h2> <?= $category->name ?></h2>
            </div>
        </div>
    <div class="container">
        <div class="row d-flex">
            <?php foreach (paginate($posts, 4) as $post) { ?>
      <div class="col-md-3 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
                    <a href="<?= route('home.post', [$post->id]) ?>" class="block-20" style="background-image: url('<?= asset($post->image) ?>');">
                    </a>
                    <div class="text mt-3 d-block">
                        <h3 class="heading mt-3"><a href="<?= route('home.post', [$post->id]) ?>"><?= $post->title ?></a></h3>
                        <div class="meta mb-3">
                            <div><a href="#"><?= \Morilog\Jalali\Jalalian::forge($post->created_at)->format('%B %d، %Y') ?></a></div>
                            <div><a href="#"><?= $post->user()->first_name . ' ' . $post->user()->last_name ?></a></div>
                        </div>
                    </div>
                </div>
      </div>
      <?php } ?>
    </div>
    <?= paginateView($posts, 4) ?>
</section>
    


@endsection
