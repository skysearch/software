	
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="author" content="www.frebsite.nl" />
        <meta content="width=1000px initial-scale=1.0 maximum-scale=2.0 user-scalable=yes" name="viewport" />

        <meta name="description" content="Learn how to use the dragOpen add-on and how it can help to create app look-alike menus and webapps." />
        <title>jQuery.mmenu dragOpen add-on</title>

        <link type="images/ico" rel="shortcus icon" href="/favicon.ico" />
        <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Pacifico" />
        <link type="text/css" rel="stylesheet" href="/css/normalize.css" />
        <link type="text/css" rel="stylesheet" href="/css/layout.css" />
        <link type="text/css" rel="stylesheet" href="/mmenu/css/jquery.mmenu.all.css" />
        <link type="text/css" rel="stylesheet" href="/mmenu/css/extensions/jquery.mmenu.widescreen.css" media="all and (min-width: 1430px)" />
        <link type="text/css" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" />

        <script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="/js/layout.js"></script>
        <script type="text/javascript" src="/mmenu/js/jquery.mmenu.min.all.js"></script>
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(["_setAccount", "UA-5722599-15"]);
            _gaq.push(["_trackPageview"]);

            (function () {
                var dd = document.domain,
                        io = "indexOf";

                if (dd[io]("frebsite.nl") == -1 && dd[io]("localhost") == -1)
                {
                    alert("Please do not copy my Google Analytics code!");
                    window.location.href = "http://www.youtube.com/watch?v=dQw4w9WgXcQ";
                }
                else
                {
                    var ga = document.createElement("script");
                    ga.type = "text/javascript";
                    ga.async = true;
                    ga.src = ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js";

                    var s = document.getElementsByTagName("script")[0];
                    s.parentNode.insertBefore(ga, s);
                }
            })();
        </script>
    </head>
    <body>
        <div id="page">
            <a id="hamburger" class="FixedTop" href="#menu"><span></span></a>
            <div class="wrapper">
                <h1>Drag open</h1>
                <p>To enable the menu to be opened by a dragging gesture,<br />
                    include the <a href="http://hammerjs.github.io/" target="_blank">Hammer library</a>, the "dragOpen" add-on .js and .css files and use the <code>dragOpen</code> options:</p>


                <pre>
&lt;head&gt;
   &lt;script src=&quot;path/to/hammer.min.js&quot; type=&quot;text/javascript&quot;&gt;&lt;/script&gt;
   &lt;script src=&quot;path/to/jquery.js&quot; type=&quot;text/javascript&quot;&gt;&lt;/script&gt;
   &lt;script src=&quot;path/to/jquery.mmenu.min.js&quot; type=&quot;text/javascript&quot;&gt;&lt;/script&gt;
   &lt;script src=&quot;path/to/jquery.mmenu.dragopen.min.js&quot; type=&quot;text/javascript&quot;&gt;&lt;/script&gt;
   &lt;link href=&quot;path/to/jquery.mmenu.css&quot; type=&quot;text/css&quot; rel=&quot;stylesheet&quot; /&gt;
   &lt;link href=&quot;path/to/jquery.mmenu.dragopen.css&quot; type=&quot;text/css&quot; rel=&quot;stylesheet&quot; /&gt;
   &lt;script type=&quot;text/javascript&quot;&gt;
      $(document).ready(function() {
         $(&quot;#my-menu&quot;).mmenu({
            dragOpen: {
               // drag open options
            }
         });
      });
   &lt;/script&gt;
&lt;/head&gt;
                </pre>
                <h4>Options for the "dragOpen" add-on</h4>


                <table class="table" cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <tr>
                            <td width="1%">&nbsp;</td>
                            <td width="21%">Option</td>
                            <td width="20%">Default value</td>
                            <td width="15%">Datatype</td>
                            <td width="43%">Description</td>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td><sup>1</sup></td>
                            <td colspan="4">See the description.</td>
                        </tr>
                        <tr>
                            <td><sup>2</sup></td>
                            <td colspan="4">If the option is a String, it will be used as a jQuery selector.</td>
                        </tr>
                    </tfoot>					
                    <tbody>
                        <tr>
                            <td></td>
                            <td colspan="2">dragOpen</td>
                            <td><em>Object</em></td>
                            <td>A map of the <code>dragOpen</code> options.</td>
                        </tr>
                        <tr class="sub-start">
                            <td></td>
                            <td colspan="4">{</td>
                        </tr>
                        <tr class="sub">
                            <td></td>
                            <td>open</td>
                            <td><code>false</code></td>
                            <td><em>Boolean</em></td>
                            <td>Whether or not the menu should open when dragging the page.<br />
                                <em>Tip:</em> Hammer.js enables dragging on touch and desktop devices. If you only want to enable dragging the menu open on touchscreens, test for <code>"ontouchstart" in window.document</code>.</td>
                        </tr>
                        <tr class="sub">
                            <td></td>
                            <td>pageNode</td>
                            <td><code>null</code> <sup>1</sup></td>
                            <td><em>jQuery</em> <sup>2</sup></td>
                            <td>The node on which the user can drag to open the menu.<br />
                                If omitted, the entire page is used.</td>
                        </tr>
                        <tr class="sub">
                            <td></td>
                            <td>threshold</td>
                            <td><code>50</code></td>
                            <td><em>Number</em></td>
                            <td>The minimum amount of pixels to drag before actually opening the menu, less than 50 is not advised.</td>
                        </tr>
                        <tr class="sub">
                            <td></td>
                            <td>maxStartPos</td>
                            <td><code>100</code></td>
                            <td><em>Number</em></td>
                            <td>The maximum x-position to start dragging the page.</td>
                        </tr>
                        <tr class="sub-end">
                            <td></td>
                            <td colspan="4">}</td>
                        </tr>
                        <tr class="datatype">
                            <td colspan="3"></td>
                            <td><em>Boolean</em></td>
                            <td><code>true</code> or <code>false</code> for the <code>dragOpen.open</code> option.</td>
                        </tr>
                    </tbody>
                </table>
                <h4>Configuration for the "dragOpen" add-on</h4>


                <table class="table" cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <tr>
                            <td width="1%">&nbsp;</td>
                            <td width="21%">Option</td>
                            <td width="20%">Default value</td>
                            <td width="15%">Datatype</td>
                            <td width="43%">Description</td>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td><sup>1</sup></td>
                            <td colspan="4">The value should match the associated CSS value.</td>
                        </tr>
                    </tfoot>					
                    <tbody>
                        <tr>
                            <td></td>
                            <td colspan="2">dragOpen</td>
                            <td><em>Object</em></td>
                            <td>A map of the <code>dragOpen</code> options.</td>
                        </tr>
                        <tr class="sub-start">
                            <td></td>
                            <td colspan="4">{</td>
                        </tr>
                        <tr class="sub">
                            <td></td>
                            <td>width</td>
                            <td></td>
                            <td><em>Object</em></td>
                            <td>A map of the <code>dragOpen.width</code> options.</td>
                        </tr>
                        <tr class="sub">
                            <td></td>
                            <td>width.perc</td>
                            <td><code>0.8</code> <sup>1</sup></td>
                            <td><em>Number</em></td>
                            <td>The width of the menu as a percentage. From 0.0 (fully hidden) to 1.0 (fully opened).</td>
                        </tr>
                        <tr class="sub">
                            <td></td>
                            <td>width.min</td>
                            <td><code>140</code> <sup>1</sup></td>
                            <td><em>Number</em></td>
                            <td>The minimum width of the menu.</td>
                        </tr>
                        <tr class="sub">
                            <td></td>
                            <td>width.max</td>
                            <td><code>440</code> <sup>1</sup></td>
                            <td><em>Number</em></td>
                            <td>The maximum width of the menu.</td>
                        </tr>
                        <tr class="sub">
                            <td></td>
                            <td>height</td>
                            <td></td>
                            <td><em>Object</em></td>
                            <td>A map of the <code>dragOpen.height</code> options.</td>
                        </tr>
                        <tr class="sub">
                            <td></td>
                            <td>height.perc</td>
                            <td><code>0.8</code> <sup>1</sup></td>
                            <td><em>Number</em></td>
                            <td>The height of the menu as a percentage. From 0.0 (fully hidden) to 1.0 (fully opened).</td>
                        </tr>
                        <tr class="sub">
                            <td></td>
                            <td>width.min</td>
                            <td><code>140</code> <sup>1</sup></td>
                            <td><em>Number</em></td>
                            <td>The minimum height of the menu.</td>
                        </tr>
                        <tr class="sub">
                            <td></td>
                            <td>width.max</td>
                            <td><code>880</code> <sup>1</sup></td>
                            <td><em>Number</em></td>
                            <td>The maximum height of the menu.</td>
                        </tr>
                        <tr class="sub-end">
                            <td></td>
                            <td colspan="4">}</td>
                        </tr>
                    </tbody>
                </table>
                <h4>SCSS variables for the "dragOpen" add-on</h4>
                <p>The "dragOpen" add-on has no SCSS variables.</p>

                <p class="next"><strong>Next add-on:</strong><br />
                    <a href="fixed-elements.html" class="btn">Fixed elements</a></p>

            </div>



        </div>
        <nav id="menu">
            <ul>
                <li><a href="/"><i class="fa fa-home"></i> &nbsp; Home</a></li>
                <li><a href="/examples.html"><i class="fa fa-code"></i> &nbsp; Examples</a></li>
                <li><a href="/playground.html"><i class="fa fa-puzzle-piece"></i> &nbsp; Playground</a></li>
                <li>
                    <span><i class="fa fa-graduation-cap"></i> &nbsp; Tutorial</span>
                    <div>
                        <p>This tutorial guides you through the first steps of creating an app look-alike sliding menu for your website and webapp.</p>
                        <ul>
                            <li><a href="/tutorial">Getting started</a></li>
                            <li><a href="/tutorial/setting-up-the-html.html">Setting up the html</a></li>
                            <li><a href="/tutorial/fire-the-plugin.html">Fire the plugin</a></li>
                            <li><a href="/tutorial/open-and-close-the-menu.html">Open and close the menu</a></li>
                            <li><a href="/tutorial/styling-lists.html">Styling lists</a></li>
                            <li><a href="/tutorial/learn-more.html">Learn more</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <span><i class="fa fa-file-text-o"></i> &nbsp; Documentation</span>
                    <ul>
                        <li>
                            <span>Options</span>
                            <ul>
                                <li><a href="/documentation/options">Options</a></li>
                                <li><a href="/documentation/options/configuration.html">Configuration</a></li>
                            </ul>
                        </li>
                        <li><a href="/documentation/custom-events.html">Custom events</a></li>
                        <li>
                            <span>Extensions</span>
                            <div>
                                <p>With these extensions, you can easily extend the look and feel of your menu.</p>
                                <ul>
                                    <li><a href="/documentation/extensions">Introduction</a></li>
                                    <li><a href="/documentation/extensions/effects.html">Effects</a></li>
                                    <li><a href="/documentation/extensions/fullscreen.html">Fullscreen</a></li>
                                    <li><a href="/documentation/extensions/iconbar.html">Iconbar</a></li>
                                    <li><a href="/documentation/extensions/positioning.html">Positioning</a></li>
                                    <li><a href="/documentation/extensions/themes.html">Themes</a></li>
                                    <li><a href="/documentation/extensions/widescreen.html">Widescreen</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <span>Add-ons</span>
                            <div>
                                <p>With these add-ons, you can easily add additional behavior to your menu.</p>
                                <ul>
                                    <li><a href="/documentation/addons">Introduction</a></li>
                                    <li><a href="/documentation/addons/buttonbars.html">Buttonbars</a></li>
                                    <li><a href="/documentation/addons/counters.html">Counters</a></li>
                                    <li class="Selected"><a href="/documentation/addons/drag-open.html">Drag open</a></li>
                                    <li><a href="/documentation/addons/fixed-elements.html">Fixed elements</a></li>
                                    <li><a href="/documentation/addons/footer.html">Footer</a></li>
                                    <li><a href="/documentation/addons/header.html">Header</a></li>
                                    <li><a href="/documentation/addons/labels.html">Labels</a></li>
                                    <li><a href="/documentation/addons/off-canvas.html">Off-canvas</a></li>
                                    <li><a href="/documentation/addons/searchfield.html">Searchfield</a></li>
                                    <li><a href="/documentation/addons/toggles.html">Toggles</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <span>Custom CSS</span>
                            <div>
                                <p>With the usage of SCSS, you can easily create customized .css files for your menu.</p>
                                <ul>
                                    <li><a href="/documentation/custom-css">Introduction</a></li>
                                    <li><a href="/documentation/custom-css/override-variables.html">Override variable values</a></li>
                                    <li><a href="/documentation/custom-css/concatenate-files.html">Concatenate .css files</a></li>
                                    <li><a href="/documentation/custom-css/custom-colors.html">Custom colors</a></li>
                                    <li><a href="/documentation/custom-css/custom-sizes.html">Custom sizes</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="/documentation/changelog.html">Changelog</a></li>
                    </ul>
                </li>
                <li><a href="/on-and-off-canvas.html"><i class="fa fa-arrows-h"></i> &nbsp; On- and off-canvas</a></li>
                <li><a href="/download.html"><i class="fa fa-download"></i> &nbsp; Download &amp; License information</a></li>
                <li>
                    <span><i class="fa fa-support"></i> &nbsp; Support</span>
                    <ul>
                        <li><a href="/support/tips-and-tricks.html">Tips and tricks</a></li>
                        <li><a href="/support/problem-solving.html">Problem solving</a></li>
                        <li><a href="/support/contact.html">Contact</a></li>
                    </ul>
                </li>
                <li><a href="https://github.com/BeSite/jQuery.mmenu" target="_blank"><i class="fa fa-github"></i> &nbsp; Fork me on GitHub</a></li>
                <li id="donate">
                    <p>The jQuery.mmenu plugin is created as donationware,<br />
                        if you are going to use it in a commercial project, please donate.</p>
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" name="donate">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="A8GPDD776Z8DJ">
                        <input type="image" src="/img/donate-btn.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.paypalobjects.com/nl_NL/i/scr/pixel.gif" width="1" height="1">
                    </form>
                </li>
            </ul>
        </nav>
    </body>
</html>