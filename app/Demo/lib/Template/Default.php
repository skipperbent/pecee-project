<? /* @var $this \Demo\Widget\WidgetAbstract */ ?>
<?= \Pecee\UI\Site::GetInstance()->getDocType(); ?>
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
					<a class="navbar-brand" href="<?= url('ControllerDefault@index'); ?>">Project name</a>
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

		</div><!-- /.container -->
	</body>
</html>