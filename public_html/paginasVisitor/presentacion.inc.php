<!-- Subhead
================================================== -->
<div class="slider-holder">
    <div class="container">
        <div class="shell">
            <div class="hero-unit">
                <h1>Hello, world!</h1>
                <p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
                <p><a href="#" class="btn btn-primary">Learn more &raquo;</a></p>
            </div>
        </div>
    </div>
</div>

<!-- Docs nav
    ================================================== -->
<div class="container" data-spy="scroll" data-target=".bs-docs-sidebar">

    <div class="row">
        <div class="span3 bs-docs-sidebar">
            <ul class="nav nav-list bs-docs-sidenav ">
                <li><a href="#dropdowns"><i class="icon-chevron-right"></i> Dropdowns</a></li>
                <li><a href="#buttonGroups"><i class="icon-chevron-right"></i> Button groups</a></li>
                <li><a href="#buttonDropdowns"><i class="icon-chevron-right"></i> Button dropdowns</a></li>
                <li><a href="#navs"><i class="icon-chevron-right"></i> Navs</a></li>
            </ul>
        </div>

        <div class="span9">

            <!-- Dropdowns
            ================================================== -->
            <section id="dropdowns">
                <div class="page-header">
                    <h1>Dropdown menus</h1>
                </div>

                <h2>Example</h2>
                <p>Toggleable, contextual menu for displaying lists of links. Made interactive with the <a href="./javascript.html#dropdowns">dropdown JavaScript plugin</a>.</p>
                <div class="bs-docs-example">
                    <div class="dropdown clearfix">
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
                            <li><a tabindex="-1" href="#">Action</a></li>
                            <li><a tabindex="-1" href="#">Another action</a></li>
                            <li><a tabindex="-1" href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" href="#">Separated link</a></li>
                        </ul>
                    </div>
                </div>
               
                <h2>Markup</h2>
                <p>Looking at just the dropdown menu, here's the required HTML. You need to wrap the dropdown's trigger and the dropdown menu within <code>.dropdown</code>, or another element that declares <code>position: relative;</code>. Then just create the menu.</p>

                               <h2>Options</h2>
                <p>Align menus to the right and add include additional levels of dropdowns.</p>

                <h3>Aligning the menus</h3>
                <p>Add <code>.pull-right</code> to a <code>.dropdown-menu</code> to right align the dropdown menu.</p>
               
            </section>


            <!-- Button Groups
            ================================================== -->
            <section id="buttonGroups">
                <div class="page-header">
                    <h1>Button groups</h1>
                </div>

                <h2>Examples</h2>
                <p>Two basic options, along with two more specific variations.</p>

                <h3>Single button group</h3>
                <p>Wrap a series of buttons with <code>.btn</code> in <code>.btn-group</code>.</p>
                                
                <h3>Vertical button groups</h3>
                <p>Make a set of buttons appear vertically stacked rather than horizontally.</p>
                <div class="bs-docs-example">
                    <div class="btn-group btn-group-vertical">
                        <button type="button" class="btn"><i class="icon-align-left"></i></button>
                        <button type="button" class="btn"><i class="icon-align-center"></i></button>
                        <button type="button" class="btn"><i class="icon-align-right"></i></button>
                        <button type="button" class="btn"><i class="icon-align-justify"></i></button>
                    </div>
                </div>
                


                <hr class="bs-docs-separator">


                <h4>Checkbox and radio flavors</h4>
                <p>Button groups can also function as radios, where only one button may be active, or checkboxes, where any number of buttons may be active. View <a href="./javascript.html#buttons">the JavaScript docs</a> for that.</p>

                <h4>Dropdowns in button groups</h4>
            </section>



            <!-- Split button dropdowns
            ================================================== -->
            <section id="buttonDropdowns">
                <div class="page-header">
                    <h1>Button dropdown menus</h1>
                </div>


                <h2>Overview and examples</h2>
                <p>Use any button to trigger a dropdown menu by placing it within a <code>.btn-group</code> and providing the proper menu markup.</p>
                             

                <h3>Works with all button sizes</h3>
                <p>Button dropdowns work at any size:  <code>.btn-large</code>, <code>.btn-small</code>, or <code>.btn-mini</code>.</p>
                
                <h3>Requires JavaScript</h3>
                <p>Button dropdowns require the <a href="./javascript.html#dropdowns">Bootstrap dropdown plugin</a> to function.</p>
                <p>In some cases&mdash;like mobile&mdash;dropdown menus will extend outside the viewport. You need to resolve the alignment manually or with custom JavaScript.</p>


                <hr class="bs-docs-separator">


                <h2>Split button dropdowns</h2>
                <p>Building on the button group styles and markup, we can easily create a split button. Split buttons feature a standard action on the left and a dropdown toggle on the right with contextual links.</p>
                
            </section>



            <!-- Nav, Tabs, & Pills
            ================================================== -->
            <section id="navs">
                <div class="page-header">
                    <h1>Nav: tabs, pills, and lists</small></h1>
                </div>

                <h2>Lightweight defaults <small>Same markup, different classes</small></h2>
                <p>All nav components here&mdash;tabs, pills, and lists&mdash;<strong>share the same base markup and styles</strong> through the <code>.nav</code> class.</p>

                <h3>Basic tabs</h3>
                <p>Take a regular <code>&lt;ul&gt;</code> of links and add <code>.nav-tabs</code>:</p>
                
                
                <h3>Disabled state</h3>
                <p>For any nav component (tabs, pills, or list), add <code>.disabled</code> for <strong>gray links and no hover effects</strong>. Links will remain clickable, however, unless you remove the <code>href</code> attribute. Alternatively, you could implement custom JavaScript to prevent those clicks.</p>
               
               
                <h3>Component alignment</h3>
                <p>To align nav links, use the <code>.pull-left</code> or <code>.pull-right</code> utility classes. Both classes will add a CSS float in the specified direction.</p>


                <hr class="bs-docs-separator">


                <h2>Stackable</h2>
                <p>As tabs and pills are horizontal by default, just add a second class, <code>.nav-stacked</code>, to make them appear vertically stacked.</p>

                <h3>Stacked tabs</h3>
                

                <hr class="bs-docs-separator">


                <h2>Dropdowns</h2>
                <p>Add dropdown menus with a little extra HTML and the <a href="./javascript.html#dropdowns">dropdowns JavaScript plugin</a>.</p>

                <h3>Tabs with dropdowns</h3>
                
                <hr class="bs-docs-separator">


                <h2>Nav lists</h2>
                <p>A simple and easy way to build groups of nav links with optional headers. They're best used in sidebars like the Finder in OS X.</p>

                <h3>Example nav list</h3>
                <p>Take a list of links and add <code>class="nav nav-list"</code>:</p>
                
                <h4>Fade in tabs</h4>
                <p>To make tabs fade in, add <code>.fade</code> to each <code>.tab-pane</code>.</p>

                <h4>Requires jQuery plugin</h4>
                <p>All tabbable tabs are powered by our lightweight jQuery plugin. Read more about how to bring tabbable tabs to life <a href="./javascript.html#tabs">on the JavaScript docs page</a>.</p>

                <h3>Tabbable in any direction</h3>

                <h4>Tabs on the bottom</h4>
                <p>Flip the order of the HTML and add a class to put tabs on the bottom.</p>
                
            </section>
        </div>
    </div>
</div>