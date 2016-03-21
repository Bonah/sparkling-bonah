<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package sparkling
 */
?>
		</div><!-- close .row -->
	</div><!-- close .container -->
</div><!-- close .site-content -->

	<div id="footer-area">
		<div class="container footer-inner">
			<div class="row">
				<?php get_sidebar( 'footer' ); ?>
			</div>
		</div>

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info container">
				<div class="row">
					<?php if( of_get_option('footer_social') ) sparkling_social_icons(); ?>
					<nav role="navigation" class="col-md-6">
						<?php sparkling_footer_links(); ?>
					</nav>
					<div class="copyright col-md-6">
						<?php echo of_get_option( 'custom_footer_text', 'sparkling' ); ?>
						<?php sparkling_footer_info(); ?>
					</div>
				</div>
			</div><!-- .site-info -->
			<div class="scroll-to-top"><i class="fa fa-angle-up"></i></div><!-- .scroll-to-top -->
		</footer><!-- #colophon -->
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
   // code here
function nativeSelector() {
    var elements = document.querySelectorAll("body, body *");
    var results = [];
    var child;
    for(var i = 0; i < elements.length; i++) {
        child = elements[i].childNodes[0];
        if(elements[i].hasChildNodes() && child.nodeType == 3) {
            results.push(child);
        }
    }
    return results;
}

var textnodes = nativeSelector(),
    _nv22;
for (var i = 0, len = textnodes.length; i<len; i++){
    _nv22 = textnodes[i].nodeValue;
    textnodes[i].nodeValue = _nv22.replace(/0/g,'۰');
}
var textnodes = nativeSelector(),
    _nv23;
for (var i = 0, len = textnodes.length; i<len; i++){
    _nv23 = textnodes[i].nodeValue;
    textnodes[i].nodeValue = _nv23.replace(/1/g,'۱');
}
var textnodes = nativeSelector(),
    _nv24;
for (var i = 0, len = textnodes.length; i<len; i++){
    _nv24 = textnodes[i].nodeValue;
    textnodes[i].nodeValue = _nv24.replace(/2/g,'۲');
}
var textnodes = nativeSelector(),
    _nv25;
for (var i = 0, len = textnodes.length; i<len; i++){
    _nv25 = textnodes[i].nodeValue;
    textnodes[i].nodeValue = _nv25.replace(/3/g,'۳');
}
var textnodes = nativeSelector(),
    _nv26;
for (var i = 0, len = textnodes.length; i<len; i++){
    _nv26 = textnodes[i].nodeValue;
    textnodes[i].nodeValue = _nv26.replace(/4/g,'٤');
}
var textnodes = nativeSelector(),
    _nv27;
for (var i = 0, len = textnodes.length; i<len; i++){
    _nv27 = textnodes[i].nodeValue;
    textnodes[i].nodeValue = _nv27.replace(/5/g,'٥');
}
var textnodes = nativeSelector(),
    _nv28;
for (var i = 0, len = textnodes.length; i<len; i++){
    _nv28 = textnodes[i].nodeValue;
    textnodes[i].nodeValue = _nv28.replace(/6/g,'٦');
}
var textnodes = nativeSelector(),
    _nv29;
for (var i = 0, len = textnodes.length; i<len; i++){
    _nv29 = textnodes[i].nodeValue;
    textnodes[i].nodeValue = _nv29.replace(/7/g,'٧');
}
var textnodes = nativeSelector(),
    _nv30;
for (var i = 0, len = textnodes.length; i<len; i++){
    _nv30 = textnodes[i].nodeValue;
    textnodes[i].nodeValue = _nv30.replace(/8/g,'۸');
}
var textnodes = nativeSelector(),
    _nv31;
for (var i = 0, len = textnodes.length; i<len; i++){
    _nv31 = textnodes[i].nodeValue;
    textnodes[i].nodeValue = _nv31.replace(/9/g,'۹');
}
</script>

</body>
</html>