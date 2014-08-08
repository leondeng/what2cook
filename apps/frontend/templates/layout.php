<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php echo content_tag('title', 'What2Cook - '.sfContext::getInstance()->getResponse()->getTitle()); ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <!-- <div id="Background"></div>
    <div class="clear"></div>
    <div id="HeaderBand"></div> -->
    <div id="Wrapper">
      <div id="Header">
        <?php include_partial('global/header'); ?>
      </div>
      <div class="clear"></div>
      <div id="FlashMessages">
        <?php include_partial('global/flashMessages'); ?>
      </div>
      <div id="PageContent">
        <?php echo $sf_content ?>
      </div>
    </div>
    <?php include_partial('global/footer'); ?>
  </body>
</html>
