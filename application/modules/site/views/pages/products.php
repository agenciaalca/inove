<div class="section-subbanner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="caption text-uppercase"><?= $title ?></div>
            </div>
        </div>
    </div>
</div>

<div class="container top20 bot20">
    <div class="row">
        <div class="col-md-4 bot20">
            <div class="widget">
                <div class="titulo linha">Subcategorias</div>
                <ul class="list-style group-list">
                    <?php foreach ($children_categories as $subcategory): ?>
                        <li><a href="<?= base_url('produtos/'.$subcategory->slug_category.'/'.$subcategory->slug) ?>" class="second-text-color"><i class="fa fa-caret-right"></i> <?= $subcategory->title ?></a></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>

        <div class="col-md-8">
            <div class="titulo linha">Produtos</div>

            <div class="product-box">
                <ul class="products row">
                    <?= $products ?>
                    <div class="append"></div>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="loading"></div>