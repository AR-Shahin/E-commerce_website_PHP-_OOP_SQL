
<!--state overview start-->
<div class="row state-overview">
    <div class="col-lg-3 col-sm-6">
        <section class="card">
            <div class="symbol terques">
                <i class="fa fa-archive"></i>
            </div>
            <div class="value">
                <h1 class="count">
                    <?= \App\classes\Product::countAllProduct()?>
                </h1>
                <p>Total Product</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="card">
            <div class="symbol red">
                <i class=" fa  fa-bullhorn"></i>
            </div>
            <div class="value">
                <h1 class=" count2">
                    <?=\App\classes\Order::countNewOrder()?>
                </h1>
                <p>Incoming Order</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="card">
            <div class="symbol yellow">
                <i class="fa  fa-asterisk"></i>
            </div>
            <div class="value">
                <h1 class=" count3">
                    <?=\App\classes\Product::countAllProductQuantity()?>
                </h1>
                <p>Total Products</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="card">
            <div class="symbol blue">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="value">
                <h1 class=" count4">
                    9                </h1>
                <p>Active Post</p>
            </div>
        </section>
    </div>
</div>

<!--state overview end-->
<div class="row">
    <div class="col-lg-6">
        <section class="card">
            <header class="card-header">

            </header>
            <div class="card-body text-center">
                <img src="img/download%20(1).png" alt="" class="img-fluid">
            </div>
        </section>
    </div>
    <div class="col-lg-6">
        <section class="card">
            <header class="card-header">

            </header>
            <div class="card-body text-center">
                <img src="img/download%20(3).png" alt="" class="img-fluid">
            </div>
        </section>
    </div>
</div>

