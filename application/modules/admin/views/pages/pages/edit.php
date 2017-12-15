<form action="<?= base_url('painel/paginas/update') ?>">
	<?php if(getModuleCategoryStatus('pages')): ?>
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label for="">Título da página</label>
					<input type="text" name="title" class="form-control" value="<?= $page->title ?>">
				</div>
			</div>
		</div>
		<style>
			.select2{font-family:'FontAwesome'!important;}
			.select2-results__option{font-family:'FontAwesome'!important;}
		</style>
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label for="icon">Ícone</label>
					<select name="icon" class="form-control">
						<option  ></option>
						<option <?= $page->icon=='glass' ? ' selected="selected"' : ''; ?> value="glass">&#xf000; glass</option>
						<option <?= $page->icon=='music' ? ' selected="selected"' : ''; ?> value="music">&#xf001; music</option>
						<option <?= $page->icon=='search' ? ' selected="selected"' : ''; ?> value="search">&#xf002; search </option>
						<option <?= $page->icon=='envelope-alt' ? ' selected="selected"' : ''; ?> value="envelope-alt">&#xf003; envelope-alt </option>
						<option <?= $page->icon=='heart' ? ' selected="selected"' : ''; ?> value="heart">&#xf004; heart</option>
						<option <?= $page->icon=='star' ? ' selected="selected"' : ''; ?> value="star">&#xf005; star </option>
						<option <?= $page->icon=='star-empty' ? ' selected="selected"' : ''; ?> value="star-empty">&#xf006; star-empty </option>
						<option <?= $page->icon=='user' ? ' selected="selected"' : ''; ?> value="user">&#xf007; user </option>
						<option <?= $page->icon=='film' ? ' selected="selected"' : ''; ?> value="film">&#xf008; film </option>
						<option <?= $page->icon=='th-large' ? ' selected="selected"' : ''; ?> value="th-large">&#xf009; th-large </option>
						<option <?= $page->icon=='th' ? ' selected="selected"' : ''; ?> value="th">&#xf00a; th </option>
						<option <?= $page->icon=='th-list' ? ' selected="selected"' : ''; ?> value="th-list">&#xf00b; th-list</option>
						<option <?= $page->icon=='ok' ? ' selected="selected"' : ''; ?> value="ok">&#xf00c; ok </option>
						<option <?= $page->icon=='remove' ? ' selected="selected"' : ''; ?> value="remove">&#xf00d; remove </option>
						<option <?= $page->icon=='zoom-in' ? ' selected="selected"' : ''; ?> value="zoom-in">&#xf00e; zoom-in</option>
						<option <?= $page->icon=='zoom-out' ? ' selected="selected"' : ''; ?> value="zoom-out">&#xf010; zoom-out </option>
						<option <?= $page->icon=='off' ? ' selected="selected"' : ''; ?> value="off">&#xf011; off</option>
						<option <?= $page->icon=='signal' ? ' selected="selected"' : ''; ?> value="signal">&#xf012; signal </option>
						<option <?= $page->icon=='cog' ? ' selected="selected"' : ''; ?> value="cog">&#xf013; cog</option>
						<option <?= $page->icon=='trash' ? ' selected="selected"' : ''; ?> value="trash">&#xf014; trash</option>
						<option <?= $page->icon=='home' ? ' selected="selected"' : ''; ?> value="home">&#xf015; home </option>
						<option <?= $page->icon=='file-alt' ? ' selected="selected"' : ''; ?> value="file-alt">&#xf016; file-alt </option>
						<option <?= $page->icon=='time' ? ' selected="selected"' : ''; ?> value="time">&#xf017; time </option>
						<option <?= $page->icon=='road' ? ' selected="selected"' : ''; ?> value="road">&#xf018; road </option>
						<option <?= $page->icon=='download-alt' ? ' selected="selected"' : ''; ?> value="download-alt">&#xf019; download-alt </option>
						<option <?= $page->icon=='download' ? ' selected="selected"' : ''; ?> value="download">&#xf01a; download </option>
						<option <?= $page->icon=='upload' ? ' selected="selected"' : ''; ?> value="upload">&#xf01b; upload </option>
						<option <?= $page->icon=='inbox' ? ' selected="selected"' : ''; ?> value="inbox">&#xf01c; inbox</option>
						<option <?= $page->icon=='play-circle' ? ' selected="selected"' : ''; ?> value="play-circle">&#xf01d; play-circle</option>
						<option <?= $page->icon=='repeat' ? ' selected="selected"' : ''; ?> value="repeat">&#xf01e; repeat </option>
						<option <?= $page->icon=='refresh' ? ' selected="selected"' : ''; ?> value="refresh">&#xf021; refresh</option>
						<option <?= $page->icon=='list-alt' ? ' selected="selected"' : ''; ?> value="list-alt">&#xf022; list-alt </option>
						<option <?= $page->icon=='lock' ? ' selected="selected"' : ''; ?> value="lock">&#xf023; lock </option>
						<option <?= $page->icon=='flag' ? ' selected="selected"' : ''; ?> value="flag">&#xf024; flag </option>
						<option <?= $page->icon=='headphones' ? ' selected="selected"' : ''; ?> value="headphones">&#xf025; headphones </option>
						<option <?= $page->icon=='volume-off' ? ' selected="selected"' : ''; ?> value="volume-off">&#xf026; volume-off </option>
						<option <?= $page->icon=='volume-down' ? ' selected="selected"' : ''; ?> value="volume-down">&#xf027; volume-down</option>
						<option <?= $page->icon=='volume-up' ? ' selected="selected"' : ''; ?> value="volume-up">&#xf028; volume-up</option>
						<option <?= $page->icon=='qrcode' ? ' selected="selected"' : ''; ?> value="qrcode">&#xf029; qrcode </option>
						<option <?= $page->icon=='barcode' ? ' selected="selected"' : ''; ?> value="barcode">&#xf02a; barcode</option>
						<option <?= $page->icon=='tag' ? ' selected="selected"' : ''; ?> value="tag">&#xf02b; tag</option>
						<option <?= $page->icon=='tags' ? ' selected="selected"' : ''; ?> value="tags">&#xf02c; tags </option>
						<option <?= $page->icon=='book' ? ' selected="selected"' : ''; ?> value="book">&#xf02d; book </option>
						<option <?= $page->icon=='bookmark' ? ' selected="selected"' : ''; ?> value="bookmark">&#xf02e; bookmark </option>
						<option <?= $page->icon=='print' ? ' selected="selected"' : ''; ?> value="print">&#xf02f; print</option>
						<option <?= $page->icon=='camera' ? ' selected="selected"' : ''; ?> value="camera">&#xf030; camera </option>
						<option <?= $page->icon=='font' ? ' selected="selected"' : ''; ?> value="font">&#xf031; font </option>
						<option <?= $page->icon=='bold' ? ' selected="selected"' : ''; ?> value="bold">&#xf032; bold </option>
						<option <?= $page->icon=='italic' ? ' selected="selected"' : ''; ?> value="italic">&#xf033; italic </option>
						<option <?= $page->icon=='text-height' ? ' selected="selected"' : ''; ?> value="text-height">&#xf034; text-height</option>
						<option <?= $page->icon=='text-width' ? ' selected="selected"' : ''; ?> value="text-width">&#xf035; text-width </option>
						<option <?= $page->icon=='align-left' ? ' selected="selected"' : ''; ?> value="align-left">&#xf036; align-left </option>
						<option <?= $page->icon=='align-center' ? ' selected="selected"' : ''; ?> value="align-center">&#xf037; align-center </option>
						<option <?= $page->icon=='align-right' ? ' selected="selected"' : ''; ?> value="align-right">&#xf038; align-right</option>
						<option <?= $page->icon=='align-justify' ? ' selected="selected"' : ''; ?> value="align-justify">&#xf039; align-justify</option>
						<option <?= $page->icon=='list' ? ' selected="selected"' : ''; ?> value="list">&#xf03a; list </option>
						<option <?= $page->icon=='indent-left' ? ' selected="selected"' : ''; ?> value="indent-left">&#xf03b; indent-left</option>
						<option <?= $page->icon=='indent-right' ? ' selected="selected"' : ''; ?> value="indent-right">&#xf03c; indent-right </option>
						<option <?= $page->icon=='facetime-video' ? ' selected="selected"' : ''; ?> value="facetime-video">&#xf03d; facetime-video </option>
						<option <?= $page->icon=='picture' ? ' selected="selected"' : ''; ?> value="picture">&#xf03e; picture</option>
						<option <?= $page->icon=='pencil' ? ' selected="selected"' : ''; ?> value="pencil">&#xf040; pencil </option>
						<option <?= $page->icon=='map-marker' ? ' selected="selected"' : ''; ?> value="map-marker">&#xf041; map-marker </option>
						<option <?= $page->icon=='adjust' ? ' selected="selected"' : ''; ?> value="adjust">&#xf042; adjust </option>
						<option <?= $page->icon=='tint' ? ' selected="selected"' : ''; ?> value="tint">&#xf043; tint </option>
						<option <?= $page->icon=='edit' ? ' selected="selected"' : ''; ?> value="edit">&#xf044; edit </option>
						<option <?= $page->icon=='share' ? ' selected="selected"' : ''; ?> value="share">&#xf045; share</option>
						<option <?= $page->icon=='check' ? ' selected="selected"' : ''; ?> value="check">&#xf046; check</option>
						<option <?= $page->icon=='move' ? ' selected="selected"' : ''; ?> value="move">&#xf047; move </option>
						<option <?= $page->icon=='step-backward' ? ' selected="selected"' : ''; ?> value="step-backward">&#xf048; step-backward</option>
						<option <?= $page->icon=='fast-backward' ? ' selected="selected"' : ''; ?> value="fast-backward">&#xf049; fast-backward</option>
						<option <?= $page->icon=='backward' ? ' selected="selected"' : ''; ?> value="backward">&#xf04a; backward </option>
						<option <?= $page->icon=='play' ? ' selected="selected"' : ''; ?> value="play">&#xf04b; play </option>
						<option <?= $page->icon=='pause' ? ' selected="selected"' : ''; ?> value="pause">&#xf04c; pause</option>
						<option <?= $page->icon=='stop' ? ' selected="selected"' : ''; ?> value="stop">&#xf04d; stop </option>
						<option <?= $page->icon=='forward' ? ' selected="selected"' : ''; ?> value="forward">&#xf04e; forward</option>
						<option <?= $page->icon=='fast-forward' ? ' selected="selected"' : ''; ?> value="fast-forward">&#xf050; fast-forward </option>
						<option <?= $page->icon=='step-forward' ? ' selected="selected"' : ''; ?> value="step-forward">&#xf051; step-forward </option>
						<option <?= $page->icon=='eject' ? ' selected="selected"' : ''; ?> value="eject">&#xf052; eject</option>
						<option <?= $page->icon=='chevron-left' ? ' selected="selected"' : ''; ?> value="chevron-left">&#xf053; chevron-left </option>
						<option <?= $page->icon=='chevron-right' ? ' selected="selected"' : ''; ?> value="chevron-right">&#xf054; chevron-right</option>
						<option <?= $page->icon=='plus-sign' ? ' selected="selected"' : ''; ?> value="plus-sign">&#xf055; plus-sign</option>
						<option <?= $page->icon=='minus-sign' ? ' selected="selected"' : ''; ?> value="minus-sign">&#xf056; minus-sign </option>
						<option <?= $page->icon=='remove-sign' ? ' selected="selected"' : ''; ?> value="remove-sign">&#xf057; remove-sign</option>
						<option <?= $page->icon=='ok-sign' ? ' selected="selected"' : ''; ?> value="ok-sign">&#xf058; ok-sign</option>
						<option <?= $page->icon=='question-sign' ? ' selected="selected"' : ''; ?> value="question-sign">&#xf059; question-sign</option>
						<option <?= $page->icon=='info-sign' ? ' selected="selected"' : ''; ?> value="info-sign">&#xf05a; info-sign</option>
						<option <?= $page->icon=='screenshot' ? ' selected="selected"' : ''; ?> value="screenshot">&#xf05b; screenshot </option>
						<option <?= $page->icon=='remove-circle' ? ' selected="selected"' : ''; ?> value="remove-circle">&#xf05c; remove-circle</option>
						<option <?= $page->icon=='ok-circle' ? ' selected="selected"' : ''; ?> value="ok-circle">&#xf05d; ok-circle</option>
						<option <?= $page->icon=='ban-circle' ? ' selected="selected"' : ''; ?> value="ban-circle">&#xf05e; ban-circle </option>
						<option <?= $page->icon=='arrow-left' ? ' selected="selected"' : ''; ?> value="arrow-left">&#xf060; arrow-left </option>
						<option <?= $page->icon=='arrow-right' ? ' selected="selected"' : ''; ?> value="arrow-right">&#xf061; arrow-right</option>
						<option <?= $page->icon=='arrow-up' ? ' selected="selected"' : ''; ?> value="arrow-up">&#xf062; arrow-up </option>
						<option <?= $page->icon=='arrow-down' ? ' selected="selected"' : ''; ?> value="arrow-down">&#xf063; arrow-down </option>
						<option <?= $page->icon=='share-alt' ? ' selected="selected"' : ''; ?> value="share-alt">&#xf064; share-alt</option>
						<option <?= $page->icon=='resize-full' ? ' selected="selected"' : ''; ?> value="resize-full">&#xf065; resize-full</option>
						<option <?= $page->icon=='resize-small' ? ' selected="selected"' : ''; ?> value="resize-small">&#xf066; resize-small </option>
						<option <?= $page->icon=='plus' ? ' selected="selected"' : ''; ?> value="plus">&#xf067; plus </option>
						<option <?= $page->icon=='minus' ? ' selected="selected"' : ''; ?> value="minus">&#xf068; minus</option>
						<option <?= $page->icon=='asterisk' ? ' selected="selected"' : ''; ?> value="asterisk">&#xf069; asterisk </option>
						<option <?= $page->icon=='exclamation-sign' ? ' selected="selected"' : ''; ?> value="exclamation-sign">&#xf06a; exclamation-sign </option>
						<option <?= $page->icon=='gift' ? ' selected="selected"' : ''; ?> value="gift">&#xf06b; gift </option>
						<option <?= $page->icon=='leaf' ? ' selected="selected"' : ''; ?> value="leaf">&#xf06c; leaf </option>
						<option <?= $page->icon=='fire' ? ' selected="selected"' : ''; ?> value="fire">&#xf06d; fire </option>
						<option <?= $page->icon=='eye-open' ? ' selected="selected"' : ''; ?> value="eye-open">&#xf06e; eye-open </option>
						<option <?= $page->icon=='eye-close' ? ' selected="selected"' : ''; ?> value="eye-close">&#xf070; eye-close</option>
						<option <?= $page->icon=='warning-sign' ? ' selected="selected"' : ''; ?> value="warning-sign">&#xf071; warning-sign </option>
						<option <?= $page->icon=='plane' ? ' selected="selected"' : ''; ?> value="plane">&#xf072; plane</option>
						<option <?= $page->icon=='calendar' ? ' selected="selected"' : ''; ?> value="calendar">&#xf073; calendar </option>
						<option <?= $page->icon=='random' ? ' selected="selected"' : ''; ?> value="random">&#xf074; random </option>
						<option <?= $page->icon=='comment' ? ' selected="selected"' : ''; ?> value="comment">&#xf075; comment</option>
						<option <?= $page->icon=='magnet' ? ' selected="selected"' : ''; ?> value="magnet">&#xf076; magnet </option>
						<option <?= $page->icon=='chevron-up' ? ' selected="selected"' : ''; ?> value="chevron-up">&#xf077; chevron-up </option>
						<option <?= $page->icon=='chevron-down' ? ' selected="selected"' : ''; ?> value="chevron-down">&#xf078; chevron-down </option>
						<option <?= $page->icon=='retweet' ? ' selected="selected"' : ''; ?> value="retweet">&#xf079; retweet</option>
						<option <?= $page->icon=='shopping-cart' ? ' selected="selected"' : ''; ?> value="shopping-cart">&#xf07a; shopping-cart</option>
						<option <?= $page->icon=='folder-close' ? ' selected="selected"' : ''; ?> value="folder-close">&#xf07b; folder-close </option>
						<option <?= $page->icon=='folder-open' ? ' selected="selected"' : ''; ?> value="folder-open">&#xf07c; folder-open</option>
						<option <?= $page->icon=='resize-vertical' ? ' selected="selected"' : ''; ?> value="resize-vertical">&#xf07d; resize-vertical</option>
						<option <?= $page->icon=='resize-horizontal' ? ' selected="selected"' : ''; ?> value="resize-horizontal">&#xf07e; resize-horizontal</option>
						<option <?= $page->icon=='bar-chart' ? ' selected="selected"' : ''; ?> value="bar-chart">&#xf080; bar-chart</option>
						<option <?= $page->icon=='twitter-sign' ? ' selected="selected"' : ''; ?> value="twitter-sign">&#xf081; twitter-sign </option>
						<option <?= $page->icon=='facebook-sign' ? ' selected="selected"' : ''; ?> value="facebook-sign">&#xf082; facebook-sign</option>
						<option <?= $page->icon=='camera-retro' ? ' selected="selected"' : ''; ?> value="camera-retro">&#xf083; camera-retro </option>
						<option <?= $page->icon=='key' ? ' selected="selected"' : ''; ?> value="key">&#xf084; key</option>
						<option <?= $page->icon=='cogs' ? ' selected="selected"' : ''; ?> value="cogs">&#xf085; cogs </option>
						<option <?= $page->icon=='comments' ? ' selected="selected"' : ''; ?> value="comments">&#xf086; comments </option>
						<option <?= $page->icon=='thumbs-up-alt' ? ' selected="selected"' : ''; ?> value="thumbs-up-alt">&#xf087; thumbs-up-alt</option>
						<option <?= $page->icon=='thumbs-down-alt' ? ' selected="selected"' : ''; ?> value="thumbs-down-alt">&#xf088; thumbs-down-alt</option>
						<option <?= $page->icon=='star-half' ? ' selected="selected"' : ''; ?> value="star-half">&#xf089; star-half</option>
						<option <?= $page->icon=='heart-empty' ? ' selected="selected"' : ''; ?> value="heart-empty">&#xf08a; heart-empty</option>
						<option <?= $page->icon=='signout' ? ' selected="selected"' : ''; ?> value="signout">&#xf08b; signout</option>
						<option <?= $page->icon=='linkedin-sign' ? ' selected="selected"' : ''; ?> value="linkedin-sign">&#xf08c; linkedin-sign</option>
						<option <?= $page->icon=='pushpin' ? ' selected="selected"' : ''; ?> value="pushpin">&#xf08d; pushpin</option>
						<option <?= $page->icon=='external-link' ? ' selected="selected"' : ''; ?> value="external-link">&#xf08e; external-link</option>
						<option <?= $page->icon=='signin' ? ' selected="selected"' : ''; ?> value="signin">&#xf090; signin </option>
						<option <?= $page->icon=='trophy' ? ' selected="selected"' : ''; ?> value="trophy">&#xf091; trophy </option>
						<option <?= $page->icon=='github-sign' ? ' selected="selected"' : ''; ?> value="github-sign">&#xf092; github-sign</option>
						<option <?= $page->icon=='upload-alt' ? ' selected="selected"' : ''; ?> value="upload-alt">&#xf093; upload-alt </option>
						<option <?= $page->icon=='lemon' ? ' selected="selected"' : ''; ?> value="lemon">&#xf094; lemon</option>
						<option <?= $page->icon=='phone' ? ' selected="selected"' : ''; ?> value="phone">&#xf095; phone</option>
						<option <?= $page->icon=='check-empty' ? ' selected="selected"' : ''; ?> value="check-empty">&#xf096; check-empty</option>
						<option <?= $page->icon=='bookmark-empty' ? ' selected="selected"' : ''; ?> value="bookmark-empty">&#xf097; bookmark-empty </option>
						<option <?= $page->icon=='phone-sign' ? ' selected="selected"' : ''; ?> value="phone-sign">&#xf098; phone-sign </option>
						<option <?= $page->icon=='twitter' ? ' selected="selected"' : ''; ?> value="twitter">&#xf099; twitter</option>
						<option <?= $page->icon=='facebook' ? ' selected="selected"' : ''; ?> value="facebook">&#xf09a; facebook </option>
						<option <?= $page->icon=='github' ? ' selected="selected"' : ''; ?> value="github">&#xf09b; github </option>
						<option <?= $page->icon=='unlock' ? ' selected="selected"' : ''; ?> value="unlock">&#xf09c; unlock </option>
						<option <?= $page->icon=='credit-card' ? ' selected="selected"' : ''; ?> value="credit-card">&#xf09d; credit-card</option>
						<option <?= $page->icon=='rss' ? ' selected="selected"' : ''; ?> value="rss">&#xf09e; rss</option>
						<option <?= $page->icon=='hdd' ? ' selected="selected"' : ''; ?> value="hdd">&#xf0a0; hdd</option>
						<option <?= $page->icon=='bullhorn' ? ' selected="selected"' : ''; ?> value="bullhorn">&#xf0a1; bullhorn </option>
						<option <?= $page->icon=='bell' ? ' selected="selected"' : ''; ?> value="bell">&#xf0a2; bell </option>
						<option <?= $page->icon=='certificate' ? ' selected="selected"' : ''; ?> value="certificate">&#xf0a3; certificate</option>
						<option <?= $page->icon=='hand-right' ? ' selected="selected"' : ''; ?> value="hand-right">&#xf0a4; hand-right </option>
						<option <?= $page->icon=='hand-left' ? ' selected="selected"' : ''; ?> value="hand-left">&#xf0a5; hand-left</option>
						<option <?= $page->icon=='hand-up' ? ' selected="selected"' : ''; ?> value="hand-up">&#xf0a6; hand-up</option>
						<option <?= $page->icon=='hand-down' ? ' selected="selected"' : ''; ?> value="hand-down">&#xf0a7; hand-down</option>
						<option <?= $page->icon=='circle-arrow-left' ? ' selected="selected"' : ''; ?> value="circle-arrow-left">&#xf0a8; circle-arrow-left</option>
						<option <?= $page->icon=='circle-arrow-right' ? ' selected="selected"' : ''; ?> value="circle-arrow-right">&#xf0a9; circle-arrow-right </option>
						<option <?= $page->icon=='circle-arrow-up' ? ' selected="selected"' : ''; ?> value="circle-arrow-up">&#xf0aa; circle-arrow-up</option>
						<option <?= $page->icon=='circle-arrow-down' ? ' selected="selected"' : ''; ?> value="circle-arrow-down">&#xf0ab; circle-arrow-down</option>
						<option <?= $page->icon=='globe' ? ' selected="selected"' : ''; ?> value="globe">&#xf0ac; globe</option>
						<option <?= $page->icon=='wrench' ? ' selected="selected"' : ''; ?> value="wrench">&#xf0ad; wrench </option>
						<option <?= $page->icon=='tasks' ? ' selected="selected"' : ''; ?> value="tasks">&#xf0ae; tasks</option>
						<option <?= $page->icon=='filter' ? ' selected="selected"' : ''; ?> value="filter">&#xf0b0; filter </option>
						<option <?= $page->icon=='briefcase' ? ' selected="selected"' : ''; ?> value="briefcase">&#xf0b1; briefcase</option>
						<option <?= $page->icon=='fullscreen' ? ' selected="selected"' : ''; ?> value="fullscreen">&#xf0b2; fullscreen </option>
						<option <?= $page->icon=='group' ? ' selected="selected"' : ''; ?> value="group">&#xf0c0; group</option>
						<option <?= $page->icon=='link' ? ' selected="selected"' : ''; ?> value="link">&#xf0c1; link </option>
						<option <?= $page->icon=='cloud' ? ' selected="selected"' : ''; ?> value="cloud">&#xf0c2; cloud</option>
						<option <?= $page->icon=='beaker' ? ' selected="selected"' : ''; ?> value="beaker">&#xf0c3; beaker </option>
						<option <?= $page->icon=='cut' ? ' selected="selected"' : ''; ?> value="cut">&#xf0c4; cut</option>
						<option <?= $page->icon=='copy' ? ' selected="selected"' : ''; ?> value="copy">&#xf0c5; copy </option>
						<option <?= $page->icon=='paper-clip' ? ' selected="selected"' : ''; ?> value="paper-clip">&#xf0c6; paper-clip </option>
						<option <?= $page->icon=='save' ? ' selected="selected"' : ''; ?> value="save">&#xf0c7; save </option>
						<option <?= $page->icon=='sign-blank' ? ' selected="selected"' : ''; ?> value="sign-blank">&#xf0c8; sign-blank </option>
						<option <?= $page->icon=='reorder' ? ' selected="selected"' : ''; ?> value="reorder">&#xf0c9; reorder</option>
						<option <?= $page->icon=='list-ul' ? ' selected="selected"' : ''; ?> value="list-ul">&#xf0ca; list-ul</option>
						<option <?= $page->icon=='list-ol' ? ' selected="selected"' : ''; ?> value="list-ol">&#xf0cb; list-ol</option>
						<option <?= $page->icon=='strikethrough' ? ' selected="selected"' : ''; ?> value="strikethrough">&#xf0cc; strikethrough</option>
						<option <?= $page->icon=='underline' ? ' selected="selected"' : ''; ?> value="underline">&#xf0cd; underline</option>
						<option <?= $page->icon=='table' ? ' selected="selected"' : ''; ?> value="table">&#xf0ce; table</option>
						<option <?= $page->icon=='magic' ? ' selected="selected"' : ''; ?> value="magic">&#xf0d0; magic</option>
						<option <?= $page->icon=='truck' ? ' selected="selected"' : ''; ?> value="truck">&#xf0d1; truck</option>
						<option <?= $page->icon=='pinterest' ? ' selected="selected"' : ''; ?> value="pinterest">&#xf0d2; pinterest</option>
						<option <?= $page->icon=='pinterest-sign' ? ' selected="selected"' : ''; ?> value="pinterest-sign">&#xf0d3; pinterest-sign </option>
						<option <?= $page->icon=='google-plus-sign' ? ' selected="selected"' : ''; ?> value="google-plus-sign">&#xf0d4; google-plus-sign </option>
						<option <?= $page->icon=='google-plus' ? ' selected="selected"' : ''; ?> value="google-plus">&#xf0d5; google-plus</option>
						<option <?= $page->icon=='money' ? ' selected="selected"' : ''; ?> value="money">&#xf0d6; money</option>
						<option <?= $page->icon=='caret-down' ? ' selected="selected"' : ''; ?> value="caret-down">&#xf0d7; caret-down </option>
						<option <?= $page->icon=='caret-up' ? ' selected="selected"' : ''; ?> value="caret-up">&#xf0d8; caret-up </option>
						<option <?= $page->icon=='caret-left' ? ' selected="selected"' : ''; ?> value="caret-left">&#xf0d9; caret-left </option>
						<option <?= $page->icon=='caret-right' ? ' selected="selected"' : ''; ?> value="caret-right">&#xf0da; caret-right</option>
						<option <?= $page->icon=='columns' ? ' selected="selected"' : ''; ?> value="columns">&#xf0db; columns</option>
						<option <?= $page->icon=='sort' ? ' selected="selected"' : ''; ?> value="sort">&#xf0dc; sort </option>
						<option <?= $page->icon=='sort-down' ? ' selected="selected"' : ''; ?> value="sort-down">&#xf0dd; sort-down</option>
						<option <?= $page->icon=='sort-up' ? ' selected="selected"' : ''; ?> value="sort-up">&#xf0de; sort-up</option>
						<option <?= $page->icon=='envelope' ? ' selected="selected"' : ''; ?> value="envelope">&#xf0e0; envelope </option>
						<option <?= $page->icon=='linkedin' ? ' selected="selected"' : ''; ?> value="linkedin">&#xf0e1; linkedin </option>
						<option <?= $page->icon=='undo' ? ' selected="selected"' : ''; ?> value="undo">&#xf0e2; undo </option>
						<option <?= $page->icon=='legal' ? ' selected="selected"' : ''; ?> value="legal">&#xf0e3; legal</option>
						<option <?= $page->icon=='dashboard' ? ' selected="selected"' : ''; ?> value="dashboard">&#xf0e4; dashboard</option>
						<option <?= $page->icon=='comment-alt' ? ' selected="selected"' : ''; ?> value="comment-alt">&#xf0e5; comment-alt</option>
						<option <?= $page->icon=='comments-alt' ? ' selected="selected"' : ''; ?> value="comments-alt">&#xf0e6; comments-alt </option>
						<option <?= $page->icon=='bolt' ? ' selected="selected"' : ''; ?> value="bolt">&#xf0e7; bolt </option>
						<option <?= $page->icon=='sitemap' ? ' selected="selected"' : ''; ?> value="sitemap">&#xf0e8; sitemap</option>
						<option <?= $page->icon=='umbrella' ? ' selected="selected"' : ''; ?> value="umbrella">&#xf0e9; umbrella </option>
						<option <?= $page->icon=='paste' ? ' selected="selected"' : ''; ?> value="paste">&#xf0ea; paste</option>
						<option <?= $page->icon=='lightbulb' ? ' selected="selected"' : ''; ?> value="lightbulb">&#xf0eb; lightbulb</option>
						<option <?= $page->icon=='exchange' ? ' selected="selected"' : ''; ?> value="exchange">&#xf0ec; exchange </option>
						<option <?= $page->icon=='cloud-download' ? ' selected="selected"' : ''; ?> value="cloud-download">&#xf0ed; cloud-download </option>
						<option <?= $page->icon=='cloud-upload' ? ' selected="selected"' : ''; ?> value="cloud-upload">&#xf0ee; cloud-upload </option>
						<option <?= $page->icon=='user-md' ? ' selected="selected"' : ''; ?> value="user-md">&#xf0f0; user-md</option>
						<option <?= $page->icon=='stethoscope' ? ' selected="selected"' : ''; ?> value="stethoscope">&#xf0f1; stethoscope</option>
						<option <?= $page->icon=='suitcase' ? ' selected="selected"' : ''; ?> value="suitcase">&#xf0f2; suitcase </option>
						<option <?= $page->icon=='bell-alt' ? ' selected="selected"' : ''; ?> value="bell-alt">&#xf0f3; bell-alt </option>
						<option <?= $page->icon=='coffee' ? ' selected="selected"' : ''; ?> value="coffee">&#xf0f4; coffee </option>
						<option <?= $page->icon=='food' ? ' selected="selected"' : ''; ?> value="food">&#xf0f5; food </option>
						<option <?= $page->icon=='file-text-alt' ? ' selected="selected"' : ''; ?> value="file-text-alt">&#xf0f6; file-text-alt</option>
						<option <?= $page->icon=='building' ? ' selected="selected"' : ''; ?> value="building">&#xf0f7; building </option>
						<option <?= $page->icon=='hospital' ? ' selected="selected"' : ''; ?> value="hospital">&#xf0f8; hospital </option>
						<option <?= $page->icon=='ambulance' ? ' selected="selected"' : ''; ?> value="ambulance">&#xf0f9; ambulance</option>
						<option <?= $page->icon=='medkit' ? ' selected="selected"' : ''; ?> value="medkit">&#xf0fa; medkit </option>
						<option <?= $page->icon=='fighter-jet' ? ' selected="selected"' : ''; ?> value="fighter-jet">&#xf0fb; fighter-jet</option>
						<option <?= $page->icon=='beer' ? ' selected="selected"' : ''; ?> value="beer">&#xf0fc; beer </option>
						<option <?= $page->icon=='h-sign' ? ' selected="selected"' : ''; ?> value="h-sign">&#xf0fd; h-sign </option>
						<option <?= $page->icon=='plus-sign-alt' ? ' selected="selected"' : ''; ?> value="plus-sign-alt">&#xf0fe; plus-sign-alt</option>
						<option <?= $page->icon=='double-angle-left' ? ' selected="selected"' : ''; ?> value="double-angle-left">&#xf100; double-angle-left</option>
						<option <?= $page->icon=='double-angle-right' ? ' selected="selected"' : ''; ?> value="double-angle-right">&#xf101; double-angle-right </option>
						<option <?= $page->icon=='double-angle-up' ? ' selected="selected"' : ''; ?> value="double-angle-up">&#xf102; double-angle-up</option>
						<option <?= $page->icon=='double-angle-down' ? ' selected="selected"' : ''; ?> value="double-angle-down">&#xf103; double-angle-down</option>
						<option <?= $page->icon=='angle-left' ? ' selected="selected"' : ''; ?> value="angle-left">&#xf104; angle-left </option>
						<option <?= $page->icon=='angle-right' ? ' selected="selected"' : ''; ?> value="angle-right">&#xf105; angle-right</option>
						<option <?= $page->icon=='angle-up' ? ' selected="selected"' : ''; ?> value="angle-up">&#xf106; angle-up </option>
						<option <?= $page->icon=='angle-down' ? ' selected="selected"' : ''; ?> value="angle-down">&#xf107; angle-down </option>
						<option <?= $page->icon=='desktop' ? ' selected="selected"' : ''; ?> value="desktop">&#xf108; desktop</option>
						<option <?= $page->icon=='laptop' ? ' selected="selected"' : ''; ?> value="laptop">&#xf109; laptop </option>
						<option <?= $page->icon=='tablet' ? ' selected="selected"' : ''; ?> value="tablet">&#xf10a; tablet </option>
						<option <?= $page->icon=='mobile-phone' ? ' selected="selected"' : ''; ?> value="mobile-phone">&#xf10b; mobile-phone </option>
						<option <?= $page->icon=='circle-blank' ? ' selected="selected"' : ''; ?> value="circle-blank">&#xf10c; circle-blank </option>
						<option <?= $page->icon=='quote-left' ? ' selected="selected"' : ''; ?> value="quote-left">&#xf10d; quote-left </option>
						<option <?= $page->icon=='quote-right' ? ' selected="selected"' : ''; ?> value="quote-right">&#xf10e; quote-right</option>
						<option <?= $page->icon=='spinner' ? ' selected="selected"' : ''; ?> value="spinner">&#xf110; spinner</option>
						<option <?= $page->icon=='circle' ? ' selected="selected"' : ''; ?> value="circle">&#xf111; circle </option>
						<option <?= $page->icon=='reply' ? ' selected="selected"' : ''; ?> value="reply">&#xf112; reply</option>
						<option <?= $page->icon=='github-alt' ? ' selected="selected"' : ''; ?> value="github-alt">&#xf113; github-alt </option>
						<option <?= $page->icon=='folder-close-alt' ? ' selected="selected"' : ''; ?> value="folder-close-alt">&#xf114; folder-close-alt </option>
						<option <?= $page->icon=='folder-open-alt' ? ' selected="selected"' : ''; ?> value="folder-open-alt">&#xf115; folder-open-alt</option>
						<option <?= $page->icon=='expand-alt' ? ' selected="selected"' : ''; ?> value="expand-alt">&#xf116; expand-alt </option>
						<option <?= $page->icon=='collapse-alt' ? ' selected="selected"' : ''; ?> value="collapse-alt">&#xf117; collapse-alt </option>
						<option <?= $page->icon=='smile' ? ' selected="selected"' : ''; ?> value="smile">&#xf118; smile</option>
						<option <?= $page->icon=='frown' ? ' selected="selected"' : ''; ?> value="frown">&#xf119; frown</option>
						<option <?= $page->icon=='meh' ? ' selected="selected"' : ''; ?> value="meh">&#xf11a; meh</option>
						<option <?= $page->icon=='gamepad' ? ' selected="selected"' : ''; ?> value="gamepad">&#xf11b; gamepad</option>
						<option <?= $page->icon=='keyboard' ? ' selected="selected"' : ''; ?> value="keyboard">&#xf11c; keyboard </option>
						<option <?= $page->icon=='flag-alt' ? ' selected="selected"' : ''; ?> value="flag-alt">&#xf11d; flag-alt </option>
						<option <?= $page->icon=='flag-checkered' ? ' selected="selected"' : ''; ?> value="flag-checkered">&#xf11e; flag-checkered </option>
						<option <?= $page->icon=='terminal' ? ' selected="selected"' : ''; ?> value="terminal">&#xf120; terminal </option>
						<option <?= $page->icon=='code' ? ' selected="selected"' : ''; ?> value="code">&#xf121; code </option>
						<option <?= $page->icon=='reply-all' ? ' selected="selected"' : ''; ?> value="reply-all">&#xf122; reply-all</option>
						<option <?= $page->icon=='mail-reply-all' ? ' selected="selected"' : ''; ?> value="mail-reply-all">&#xf122; mail-reply-all </option>
						<option <?= $page->icon=='star-half-empty' ? ' selected="selected"' : ''; ?> value="star-half-empty">&#xf123; star-half-empty</option>
						<option <?= $page->icon=='location-arrow' ? ' selected="selected"' : ''; ?> value="location-arrow">&#xf124; location-arrow </option>
						<option <?= $page->icon=='crop' ? ' selected="selected"' : ''; ?> value="crop">&#xf125; crop </option>
						<option <?= $page->icon=='code-fork' ? ' selected="selected"' : ''; ?> value="code-fork">&#xf126; code-fork</option>
						<option <?= $page->icon=='unlink' ? ' selected="selected"' : ''; ?> value="unlink">&#xf127; unlink </option>
						<option <?= $page->icon=='question' ? ' selected="selected"' : ''; ?> value="question">&#xf128; question </option>
						<option <?= $page->icon=='info' ? ' selected="selected"' : ''; ?> value="info">&#xf129; info </option>
						<option <?= $page->icon=='exclamation' ? ' selected="selected"' : ''; ?> value="exclamation">&#xf12a; exclamation</option>
						<option <?= $page->icon=='superscript' ? ' selected="selected"' : ''; ?> value="superscript">&#xf12b; superscript</option>
						<option <?= $page->icon=='subscript' ? ' selected="selected"' : ''; ?> value="subscript">&#xf12c; subscript</option>
						<option <?= $page->icon=='eraser' ? ' selected="selected"' : ''; ?> value="eraser">&#xf12d; eraser </option>
						<option <?= $page->icon=='puzzle-piece' ? ' selected="selected"' : ''; ?> value="puzzle-piece">&#xf12e; puzzle-piece </option>
						<option <?= $page->icon=='microphone' ? ' selected="selected"' : ''; ?> value="microphone">&#xf130; microphone </option>
						<option <?= $page->icon=='microphone-off' ? ' selected="selected"' : ''; ?> value="microphone-off">&#xf131; microphone-off </option>
						<option <?= $page->icon=='shield' ? ' selected="selected"' : ''; ?> value="shield">&#xf132; shield </option>
						<option <?= $page->icon=='calendar-empty' ? ' selected="selected"' : ''; ?> value="calendar-empty">&#xf133; calendar-empty </option>
						<option <?= $page->icon=='fire-extinguisher' ? ' selected="selected"' : ''; ?> value="fire-extinguisher">&#xf134; fire-extinguisher</option>
						<option <?= $page->icon=='rocket' ? ' selected="selected"' : ''; ?> value="rocket">&#xf135; rocket </option>
						<option <?= $page->icon=='maxcdn' ? ' selected="selected"' : ''; ?> value="maxcdn">&#xf136; maxcdn </option>
						<option <?= $page->icon=='chevron-sign-left' ? ' selected="selected"' : ''; ?> value="chevron-sign-left">&#xf137; chevron-sign-left</option>
						<option <?= $page->icon=='chevron-sign-right' ? ' selected="selected"' : ''; ?> value="chevron-sign-right">&#xf138; chevron-sign-right </option>
						<option <?= $page->icon=='chevron-sign-up' ? ' selected="selected"' : ''; ?> value="chevron-sign-up">&#xf139; chevron-sign-up</option>
						<option <?= $page->icon=='chevron-sign-down' ? ' selected="selected"' : ''; ?> value="chevron-sign-down">&#xf13a; chevron-sign-down</option>
						<option <?= $page->icon=='html5' ? ' selected="selected"' : ''; ?> value="html5">&#xf13b; html5</option>
						<option <?= $page->icon=='css3' ? ' selected="selected"' : ''; ?> value="css3">&#xf13c; css3 </option>
						<option <?= $page->icon=='anchor' ? ' selected="selected"' : ''; ?> value="anchor">&#xf13d; anchor </option>
						<option <?= $page->icon=='unlock-alt' ? ' selected="selected"' : ''; ?> value="unlock-alt">&#xf13e; unlock-alt </option>
						<option <?= $page->icon=='bullseye' ? ' selected="selected"' : ''; ?> value="bullseye">&#xf140; bullseye </option>
						<option <?= $page->icon=='ellipsis-horizontal' ? ' selected="selected"' : ''; ?> value="ellipsis-horizontal">&#xf141; ellipsis-horizontal</option>
						<option <?= $page->icon=='ellipsis-vertical' ? ' selected="selected"' : ''; ?> value="ellipsis-vertical">&#xf142; ellipsis-vertical</option>
						<option <?= $page->icon=='rss-sign' ? ' selected="selected"' : ''; ?> value="rss-sign">&#xf143; rss-sign </option>
						<option <?= $page->icon=='play-sign' ? ' selected="selected"' : ''; ?> value="play-sign">&#xf144; play-sign</option>
						<option <?= $page->icon=='ticket' ? ' selected="selected"' : ''; ?> value="ticket">&#xf145; ticket </option>
						<option <?= $page->icon=='minus-sign-alt' ? ' selected="selected"' : ''; ?> value="minus-sign-alt">&#xf146; minus-sign-alt </option>
						<option <?= $page->icon=='check-minus' ? ' selected="selected"' : ''; ?> value="check-minus">&#xf147; check-minus</option>
						<option <?= $page->icon=='level-up' ? ' selected="selected"' : ''; ?> value="level-up">&#xf148; level-up </option>
						<option <?= $page->icon=='level-down' ? ' selected="selected"' : ''; ?> value="level-down">&#xf149; level-down </option>
						<option <?= $page->icon=='check-sign' ? ' selected="selected"' : ''; ?> value="check-sign">&#xf14a; check-sign </option>
						<option <?= $page->icon=='edit-sign' ? ' selected="selected"' : ''; ?> value="edit-sign">&#xf14b; edit-sign</option>
						<option <?= $page->icon=='external-link-sign' ? ' selected="selected"' : ''; ?> value="external-link-sign">&#xf14c; external-link-sign </option>
						<option <?= $page->icon=='share-sign' ? ' selected="selected"' : ''; ?> value="share-sign">&#xf14d; share-sign </option>
						<option <?= $page->icon=='compass' ? ' selected="selected"' : ''; ?> value="compass">&#xf14e; compass</option>
						<option <?= $page->icon=='collapse' ? ' selected="selected"' : ''; ?> value="collapse">&#xf150; collapse </option>
						<option <?= $page->icon=='collapse-top' ? ' selected="selected"' : ''; ?> value="collapse-top">&#xf151; collapse-top </option>
						<option <?= $page->icon=='expand' ? ' selected="selected"' : ''; ?> value="expand">&#xf152; expand </option>
						<option <?= $page->icon=='eur' ? ' selected="selected"' : ''; ?> value="eur">&#xf153; eur</option>
						<option <?= $page->icon=='gbp' ? ' selected="selected"' : ''; ?> value="gbp">&#xf154; gbp</option>
						<option <?= $page->icon=='usd' ? ' selected="selected"' : ''; ?> value="usd">&#xf155; usd</option>
						<option <?= $page->icon=='inr' ? ' selected="selected"' : ''; ?> value="inr">&#xf156; inr</option>
						<option <?= $page->icon=='jpy' ? ' selected="selected"' : ''; ?> value="jpy">&#xf157; jpy</option>
						<option <?= $page->icon=='cny' ? ' selected="selected"' : ''; ?> value="cny">&#xf158; cny</option>
						<option <?= $page->icon=='krw' ? ' selected="selected"' : ''; ?> value="krw">&#xf159; krw</option>
						<option <?= $page->icon=='btc' ? ' selected="selected"' : ''; ?> value="btc">&#xf15a; btc</option>
						<option <?= $page->icon=='file' ? ' selected="selected"' : ''; ?> value="file">&#xf15b; file </option>
						<option <?= $page->icon=='file-text' ? ' selected="selected"' : ''; ?> value="file-text">&#xf15c; file-text</option>
						<option <?= $page->icon=='sort-by-alphabet' ? ' selected="selected"' : ''; ?> value="sort-by-alphabet">&#xf15d; sort-by-alphabet </option>
						<option <?= $page->icon=='sort-by-alphabet-alt' ? ' selected="selected"' : ''; ?> value="sort-by-alphabet-alt">&#xf15e; sort-by-alphabet-alt </option>
						<option <?= $page->icon=='sort-by-attributes' ? ' selected="selected"' : ''; ?> value="sort-by-attributes">&#xf160; sort-by-attributes </option>
						<option <?= $page->icon=='sort-by-attributes-alt' ? ' selected="selected"' : ''; ?> value="sort-by-attributes-alt">&#xf161; sort-by-attributes-alt </option>
						<option <?= $page->icon=='sort-by-order' ? ' selected="selected"' : ''; ?> value="sort-by-order">&#xf162; sort-by-order</option>
						<option <?= $page->icon=='sort-by-order-alt' ? ' selected="selected"' : ''; ?> value="sort-by-order-alt">&#xf163; sort-by-order-alt</option>
						<option <?= $page->icon=='thumbs-up' ? ' selected="selected"' : ''; ?> value="thumbs-up">&#xf164; thumbs-up</option>
						<option <?= $page->icon=='thumbs-down' ? ' selected="selected"' : ''; ?> value="thumbs-down">&#xf165; thumbs-down</option>
						<option <?= $page->icon=='youtube-sign' ? ' selected="selected"' : ''; ?> value="youtube-sign">&#xf166; youtube-sign </option>
						<option <?= $page->icon=='youtube' ? ' selected="selected"' : ''; ?> value="youtube">&#xf167; youtube</option>
						<option <?= $page->icon=='xing' ? ' selected="selected"' : ''; ?> value="xing">&#xf168; xing </option>
						<option <?= $page->icon=='xing-sign' ? ' selected="selected"' : ''; ?> value="xing-sign">&#xf169; xing-sign</option>
						<option <?= $page->icon=='youtube-play' ? ' selected="selected"' : ''; ?> value="youtube-play">&#xf16a; youtube-play </option>
						<option <?= $page->icon=='dropbox' ? ' selected="selected"' : ''; ?> value="dropbox">&#xf16b; dropbox</option>
						<option <?= $page->icon=='stackexchange' ? ' selected="selected"' : ''; ?> value="stackexchange">&#xf16c; stackexchange</option>
						<option <?= $page->icon=='instagram' ? ' selected="selected"' : ''; ?> value="instagram">&#xf16d; instagram</option>
						<option <?= $page->icon=='flickr' ? ' selected="selected"' : ''; ?> value="flickr">&#xf16e; flickr </option>
						<option <?= $page->icon=='adn' ? ' selected="selected"' : ''; ?> value="adn">&#xf170; adn</option>
						<option <?= $page->icon=='bitbucket' ? ' selected="selected"' : ''; ?> value="bitbucket">&#xf171; bitbucket</option>
						<option <?= $page->icon=='bitbucket-sign' ? ' selected="selected"' : ''; ?> value="bitbucket-sign">&#xf172; bitbucket-sign </option>
						<option <?= $page->icon=='tumblr' ? ' selected="selected"' : ''; ?> value="tumblr">&#xf173; tumblr </option>
						<option <?= $page->icon=='tumblr-sign' ? ' selected="selected"' : ''; ?> value="tumblr-sign">&#xf174; tumblr-sign</option>
						<option <?= $page->icon=='long-arrow-down' ? ' selected="selected"' : ''; ?> value="long-arrow-down">&#xf175; long-arrow-down</option>
						<option <?= $page->icon=='long-arrow-up' ? ' selected="selected"' : ''; ?> value="long-arrow-up">&#xf176; long-arrow-up</option>
						<option <?= $page->icon=='long-arrow-left' ? ' selected="selected"' : ''; ?> value="long-arrow-left">&#xf177; long-arrow-left</option>
						<option <?= $page->icon=='long-arrow-right' ? ' selected="selected"' : ''; ?> value="long-arrow-right">&#xf178; long-arrow-right </option>
						<option <?= $page->icon=='apple' ? ' selected="selected"' : ''; ?> value="apple">&#xf179; apple</option>
						<option <?= $page->icon=='windows' ? ' selected="selected"' : ''; ?> value="windows">&#xf17a; windows</option>
						<option <?= $page->icon=='android' ? ' selected="selected"' : ''; ?> value="android">&#xf17b; android</option>
						<option <?= $page->icon=='linux' ? ' selected="selected"' : ''; ?> value="linux">&#xf17c; linux</option>
						<option <?= $page->icon=='dribbble' ? ' selected="selected"' : ''; ?> value="dribbble">&#xf17d; dribbble </option>
						<option <?= $page->icon=='skype' ? ' selected="selected"' : ''; ?> value="skype">&#xf17e; skype</option>
						<option <?= $page->icon=='foursquare' ? ' selected="selected"' : ''; ?> value="foursquare">&#xf180; foursquare </option>
						<option <?= $page->icon=='trello' ? ' selected="selected"' : ''; ?> value="trello">&#xf181; trello </option>
						<option <?= $page->icon=='female' ? ' selected="selected"' : ''; ?> value="female">&#xf182; female </option>
						<option <?= $page->icon=='male' ? ' selected="selected"' : ''; ?> value="male">&#xf183; male </option>
						<option <?= $page->icon=='gittip' ? ' selected="selected"' : ''; ?> value="gittip">&#xf184; gittip </option>
						<option <?= $page->icon=='sun' ? ' selected="selected"' : ''; ?> value="sun">&#xf185; sun</option>
						<option <?= $page->icon=='moon' ? ' selected="selected"' : ''; ?> value="moon">&#xf186; moon </option>
						<option <?= $page->icon=='archive' ? ' selected="selected"' : ''; ?> value="archive">&#xf187; archive</option>
						<option <?= $page->icon=='bug' ? ' selected="selected"' : ''; ?> value="bug">&#xf188; bug</option>
						<option <?= $page->icon=='vk' ? ' selected="selected"' : ''; ?> value="vk">&#xf189; vk </option>
						<option <?= $page->icon=='weibo' ? ' selected="selected"' : ''; ?> value="weibo">&#xf18a; weibo</option>
						<option <?= $page->icon=='renren' ? ' selected="selected"' : ''; ?> value="renren">&#xf18b; renren </option>
					</select>
				</div>
			</div>
		</div>
	<?php endif ?>
	<input type="hidden" name="slug" value="<?= $page->slug ?>">
	<textarea name="content" id="summernote" class="form-control" ><?= $page->content ?></textarea>
	<div class="row">
		<div class="col-sm-12">
			<div class="form-group">
				<button type="submit" class="btn btn-success waves-effect waves-light">
					<span class="btn-label"><i class="fa fa-check"></i></span>Salvar
				</button> 
				<a href="<?= $this->agent->referrer() ?>" class="btn btn-danger waves-effect waves-light">Cancelar</a>
			</div>
		</div>
	</div>
</form>