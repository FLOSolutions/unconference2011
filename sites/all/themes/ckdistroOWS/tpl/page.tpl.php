<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
<head>
<title><?php print $head_title; ?></title>
  <?php print $head; ?>
  <?php print $styles; ?>
  <link rel="stylesheet" href="/ckdistroBETABasic/sites/all/themes/ckdistroOWS/css/fonts.css" type="text/css" charset="utf-8" />
  <?php print $scripts; ?>
  <!--[if lte IE 6]><link type="text/css" rel="stylesheet" media="all" href="<?php print $base_path.$directory; ?>/css/ie6.css" /><![endif]-->
  <!--[if IE 7]><link type="text/css" rel="stylesheet" media="all" href="<?php print $base_path.$directory; ?>/css/ie7.css" /><![endif]-->
  <!--[if gte IE 7]><link type="text/css" rel="stylesheet" media="all" href="<?php print $base_path.$directory; ?>/css/ie8.css" /><![endif]-->

</head>
<body id="ckdistro">
<div id="mainbody">
        
		<div id="toolbox">
            <?php print $toolbox; ?>
          </div>
        
		<div id="top">
	    <?php print $top; ?>
        </div>		

	<div id="header">
		<?php if ($logo): ?><a href="<?php print $base_path ?>"><img src="<?php print $logo; ?>" alt="" id="logo" /></a><?php endif; ?>
		<?php if ($title_text): ?><h1<?php if ($logo): ?> class="break"<?php endif; ?>><?php print $title_text; ?></h1><?php endif; ?>
	</div>
	 <div id="menubar">
	 	  <?php print $menubar; ?>
        </div>
	   
	   <div id="menu-bar">
            <?php if ($menu_region): ?>
              <?php print $menu_region; ?>
            <?php elseif (isset($primary_links)): {
              print ckdistroOWS_primary($primary_links);
            } ?>
            <?php endif; ?>
          </div>
        	
<?php if ($title): ?> 
	<div id="pagebar">
		<?php print $breadcrumb; ?>
		<?php print $pagebar; ?>
		<?php print $tabs; ?>
		</div>
	<?php endif; ?>
	
	<?php if ($messages): ?>
	<div id="statusbar">
		<?php print $messages; ?>
	</div>
	<?php endif; ?>
	
	<div id="content">
			<?php if ($sidebar): ?>
			<div id="maincol">
			<h1><?php print $title; ?></h1>
				<?php print $topcontent; ?>
				<?php print $content; ?>
				<?php print $breadcrumb; ?>
			</div>
			<div id="sidecol">
			    <?php print $topsidebar; ?>
				<?php print $sidebar; ?>
			</div>
		<?php else: ?>
			<h1><?php print $title; ?></h1>
				<?php print $topcontent; ?>
  		        <?php print $content; ?>
  		        <?php print $breadcrumb; ?>
		<?php endif; ?>	
		</div> <!--[end of mainbody] -->
		
	</div>
		<div id="footer-wrapper">
			    <div id="topfooter">	
				<?php print $topfooter; ?>
				</div>

		    <div id="footer">			
			    <p class="author-message"><?php print $footer; ?></p>
			</div>
			</div>
			
    <!--[if lte IE 6]>
    	<script type="text/javascript" src="<?php print $base_path.$directory; ?>/js/supersleight.plugin.js"></script>
    	<script type="text/javascript">
    	$('body').supersleight({shim: '<?php print $base_path.$directory; ?>/img/x.gif'});
    	</script>
    <![endif]-->	
<?php print $closure; ?>
</body>
</html>