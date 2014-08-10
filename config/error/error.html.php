<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php $path = sfConfig::get('sf_relative_url_root', preg_replace('#/[^/]+\.php5?$#', '', isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : (isset($_SERVER['ORIG_SCRIPT_NAME']) ? $_SERVER['ORIG_SCRIPT_NAME'] : '')))?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>What to Cook - Internal Error</title>
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="stylesheet" type="text/css" media="screen"
	href="<?php echo $path ?>/css/layout.css" />
</head>
<body>
	<div id="Wrapper">
		<div id="Header">
			<div class="tc">
				<h1>What to cook for dinner today?</h1>
			</div>
		</div>
		<div class="clear"></div>
		<div id="PageContent">
			<div>
				<h1 class="hspace">Oops! Something unexpected has happened.</h1>
			</div>
			<div class="term_404">
				<p>
					Go <a href="/">Homepage</a> for now.
				</p>
			</div>
		</div>
	</div>
	<div id="Footer" class="tl"></div>

</body>
</html>
