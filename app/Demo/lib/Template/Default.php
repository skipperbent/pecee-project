<? /* @var $this \Demo\Widget\SiteAbstract */ ?>
<?= $this->getSite()->getDocType(); ?>
<html>
	<head>
		<?= $this->printHeader(); ?>
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?= url('home'); ?>">Pecee</a>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<?= $this->mainMenu; ?>
				</div><!--/.nav-collapse -->
			</div>
		</nav>

		<div class="container">
			<div class="starter-template">
				<?= $this->getContentHtml(); ?>
			</div>
		</div>

		<footer>
            <div class="container">
                <?= $this->form()->selectStart('lang', ['da_dk' => 'Dansk', 'en_gb' => 'English'], $this->getLanguage())->addAttribute('onchange', 'top.location.href=\''. url('home') .'?lang=\' + this[selectedIndex].value;'); ?>
            </div>
        </footer>
	</body>
</html>