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


    <?php foreach ($tips as $tip): ?>
        <!-- inicio dica -->
        <div class="dica linha">
            <div class="row">
                <div class="col-md-1">
                    <div class="dataDica">
                        <div class="diaDica"><?= date('d', strtotime($tip->created_at)) ?></div>
                        <div class="mesDica"><?= strtoupper(strftime('%b', strtotime($tip->created_at))) ?></div>
                    </div>
                </div>

                <div class="col-md-11">
                    <div class="titulo top10"><a href="<?= base_url('dica/'.$tip->slug) ?>"><?= $tip->title ?></a></div>
                </div>
            </div>
        </div>
        <!-- fim dica -->

        <hr>
    <?php endforeach ?>
    

</div>