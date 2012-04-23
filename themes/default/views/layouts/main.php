
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta charset="utf-8"/>

	<title><?php echo Yii::app()->name ?></title>
	<meta name="description" content=""/>
	<meta name="author" content=""/>

	<!-- mobile viewport optimisation -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- stylesheets -->
	<?php echo CHtml::cssFile(Yii::app()->theme->baseUrl . '/css/styles.css')?>

	<!--[if lte IE 7]>
	<?php echo CHtml::cssFile(Yii::app()->theme->baseUrl . '/css/yaml/core/iehacks.min.css')?>
	<![endif]-->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->


</head>
<body>
	<ul class="ym-skiplinks">
		<li><a class="ym-skip" href="#nav">Skip to navigation (Press Enter)</a></li>
		<li><a class="ym-skip" href="#main">Skip to main content (Press Enter)</a></li>
	</ul>
	<header>
		<div class="ym-wrapper">
			<div class="ym-wbox">
				<div id="logo">
					<h1><?php echo CHtml::encode(Yii::app()->name); ?></h1>
				</div>
			</div>
		</div>
	</header>
	<nav class="ym-hlist">
		<div class="ym-wrapper">
			<div class="ym-hlist">
				<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Home', 'url'=>array('/site/index')),
						array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
						array('label'=>'Contact', 'url'=>array('/site/contact')),
						array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
					),
				)); ?>
				<form class="ym-searchform">
					<input class="ym-searchfield" type="search" placeholder="Search..." />
					<input class="ym-searchbutton" type="submit" value="Search" />
				</form>
			</div>
		</div>
	</nav>
	<div id="main">
		<div class="ym-wrapper">
			<div class="ym-wbox">
				<?php if(isset($this->breadcrumbs)):?>
				<?php $this->widget('zii.widgets.CBreadcrumbs', array(
					'links'=>$this->breadcrumbs,
				)); ?><!-- breadcrumbs -->
				<?php endif?>
				<?php echo $content; ?>
			</div>
		</div>
	</div>
	<footer>
		<div class="ym-wrapper">
			<div class="ym-wbox">
				<p>© Company 2011 &ndash; Layout based on <a href="http://www.yaml.de">YAML</a></p>
			</div>
		</div>
	</footer>
</body>
</html>
