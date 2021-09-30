@extends('app.layouts.app')

@section('head-tag')
<title>آکهی ها</title>
@endsection

@section('content')

<div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">خانه</a></span> <span>آگهی ها</span></p>
                <h1 class="mb-3 bread">آگهی ها</h1>
            </div>
        </div>
    </div>
</div>



<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <?php foreach(paginate($ads, 8) as $advertise) { ?>
            <div class="col-md-4 ftco-animate">
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
                        <p><?= html(substr($advertise->description, 0, 30 )) ?></p>
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
     <?= paginateView($ads, 8) ?>
    </div>
</section>




@endsection
