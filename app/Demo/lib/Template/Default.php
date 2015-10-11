<? /* @var $this \Demo\Widget\WidgetAbstract */ ?>
<?= \Pecee\UI\Site::GetInstance()->getDocType(); ?>
<html>
	<head>
		<?= $this->printHeader(); ?>
	</head>
	<body>
		<?= $this->getContentHtml(); ?>
	</body>
</html>