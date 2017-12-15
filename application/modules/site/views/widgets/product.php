<?php foreach ($products as $product): ?>
    <!-- PRODUTO -->
    <li class="product-item col-xs-6 col-sm-4">
        <div class="flip-image">
            <div class="pic"><img src="<?= base_url('assets/img/products/'.$product->cover) ?>" class="img-responsive" alt=""></div>
            <div class="flip-back">
                <a href="<?= base_url('produto/'.$product->slug) ?>" class="btn-addcart">Visualizar</a>
            </div>
        </div>
        <div class="product-meta centro">
            <a href="<?= base_url('produto/'.$product->slug) ?>">
                <div class="name"><?= $product->title ?></div>
            </a>
        </div>
    </li>
    <!-- FIM PRODUTO -->
<?php endforeach ?>