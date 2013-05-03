<?php 
/* Template Name: Static Style Guide */
?>

<?php get_header(); ?>
<div class="wrapper">
	<main>
		<!-- PRIMARY ACTION BUTTON -->
		<!-- @TODO  this markup needs some work -->
		<div class="submit-resource">
			<a href="#" class="primary button">
				<i class="icon-plus"></i><span class="button-text">Submit resource</span>
			</a>
		</div>

		<?php //@TODO  put the loop here ?>

		<h1>Use H1 for page titles</h1>
		<h2>Helper Classes</h2>
		<dl>
				<dt>cf</dt>
				<dd>clearfix. use if a parent element collapses around its floating children <br />
					ex: &lt;div class=&quot;cf&quot;&gt;</dd>

				<dt>clear</dt>
				<dd>For pushing elements below previously floated children in a pinch. applies clear:both to the element<br />
					ex:  &lt;h2 class=&quot;clear&quot;&gt;</dd>

				<dt>alignleft</dt>
				<dd>for pushing content images, figures, or inputs to the left, with content flowing around it. adds float:left and a suitable margin to the element<br />
					ex:  &lt;img class=&quot;alignleft&quot;&gt;
				</dd>

				<dt>alignright</dt>
				<dd>for pushing content images, figures, or inputs to the right, with content flowing around it. adds float:right and a suitable margin to the element<br />
					ex:  &lt;img class=&quot;alignright&quot;&gt;
				</dd>

				<dt>aligncenter</dt>
				<dd>for centering text/images/figures. no float.<br />
					ex:  &lt;img class=&quot;aligncenter&quot;&gt;
				</dd>

				<dt>grid-XX</dt>
				<dd>see the ==grid flag in style.css for all the grid classes. apply to 
				&lt;div&gt; tags to form sub-columns within &lt;main&gt;
				<br />
				ex:  &lt;div class=&quot;grid-one-quarter&quot;&gt;</dd>

				<dt>hidden</dt>
				<dd>applies display:none and visibility:hidden. try not to overuse this one. consider removing markup if the element is unwanted. combine with JS for show/hide stuff
				<br />
				ex:  &lt;div class=&quot;hidden&quot;&gt;</dd>

				<dt>visuallyhidden or screen-reader-text</dt>
				<dd>Hide only visually, but have it available for screenreaders
				<br />
				ex:  &lt;label class=&quot;visuallyhidden&quot;&gt;</dd>

				
		</dl>
		<h2>Example Tiles:</h2>

		<!-- STANDARD IMAGE TILES -->
		<div class="tiles-list cf">
			<!-- put a multiple .tile boxes in the .tiles-list div. use the loop --> 

			<article class="tile cf graphic-design hentry @TODO  PUT WORDPRESS POST_CLASS HERE">
				<div class="resource-image thumbnail">
					<a href="PERMALINK">
						<img src="http://placekitten.com/352/198" alt="TITLE" />
					</a>
					<div class="category-icon"> <a href="CATEGORY ARCHIVE"><i class="icon-magic"></i></a> </div>
					<div class="popularity"><a href="#"><i class="icon-heart"></i></a> 9999</div>
				</div>
				<a href="PERMALINK"><h3 class="entry-title">TITLE OF RESOURCE</h3></a>
				<div class="postmeta"> <span class="username"><a href="#">AUTHOR</a></span> |
					<time datetime="2012-02-17" class="time-ago">a long time ago</time>
				</div>
			</article>

			


		</div>
		<!-- search div is just here as a stand-in for body_class.  -->
		<div class="search cf">
			<h2>Search Results:</h2>
			<!-- ONE SEARCH RESULT -->
			<article class="tile cf graphic-design hentry @TODO  PUT WORDPRESS POST_CLASS HERE">
				<div class="resource-image thumbnail"> <img src="http://placekitten.com/352/198" alt="TITLE"/>
					<div class="category-icon"> <i class="icon-magic"></i> </div>
					<div class="popularity"><a href="#"><i class="icon-heart"></i></a> 9999</div>
				</div>
				<h3 class="entry-title">TITLE OF RESOURCE</h3>
				<p class="entry-content">Short description of resource</p>

				<div class="postmeta"> 
					TAGS
					<span class="username"> <a href="#">AUTHOR</a></span> |
					<time datetime="2012-02-17" class="time-ago">a long time ago</time>
				</div>
			</article>
		</div><!-- end .search example... do not use this div -->

		<h2>Forms and baby grid</h2>
		<form class="cf">
			<div class="grid-full">
				<div class="alert"><i class="icon-info-sign"></i> 
					&lt;div class=&quot;alert&quot;&gt;&lt;i class=&quot;icon-info-sign&quot;&gt;&lt;/i&gt; text here&lt;/div&gt;
				</div>
				<div class="alert success"><i class="icon-ok-sign"></i> 
					&lt;div class=&quot;alert success&quot;&gt;&lt;i class=&quot;icon-ok-sign&quot;&gt;&lt;/i&gt; success text&lt;/div&gt;
				</div>
				<div class="alert error"><i class="icon-remove-sign"></i> 
					&lt;div class=&quot;alert error&quot;&gt;&lt;i class=&quot;icon-remove-sign&quot;&gt;&lt;/i&gt; error text here&lt;/div&gt;
				</div>
				<label for="important-field">Important Field</label>
				<input id="my_id1" required type="text" placeholder="Required and Important goes full width" />
			</div>
			<div class="grid-half">
				<label for="important_field">Email</label>
				<input type="email" id="my_id2" placeholder="html5 email field" name="important_field" />
				<label for="my_phone" >Phone Number</label>
				<input type="tel" id="my_id3" placeholder="html5 tel field" name="my_phone" />
				<label><input type="radio" id="my_id4" name="my_radio" />Wrap Labels around radios</label>
				<label><input type="checkbox" id="my_id5" name="my_check" />and checkboxes</label>
			</div>
			<div class="grid-half">
				<?php //@TODO  come up with a more elegant solution for this label ?>
				<label>This is a label just for balance.</label>

				<div class="hint">.hint class. use for hints alongside inputs. use a span if inline, div if block </div> 

				<a class="button facebook" href="#">Facebook</a>
				<br />
				<a class="button twitter" href="#">Twitter</a>
			</div>
			<div class="grid-full">

				<input type="submit" value="class=&quot;primary solid&quot;" class="primary solid" />
				<input type="submit" value="class=&quot;alignright&quot;" class="alignright" />
				
			</div>
		</form>

		<h2>Text and Misc Tags</h2>
		<p>

			paragraph Bacon ipsum dolor sit amet biltong pig shankle jerky doner. Fatback ground round chicken drumstick cow sirloin turducken ham hock tongue jowl tri-tip short ribs leberkas. <a href="#">Tail beef ribs</a> drumstick, salami pork belly filet mignon spare ribs frankfurter ham hock rump chicken chuck pork. Tri-tip hamburger shoulder kielbasa bacon. Fatback andouille pastrami frankfurter shankle chicken. Ground round beef pork loin short ribs short loin shank. Shankle andouille fatback chuck, tongue ground round swine sausage leberkas pork tail ham hock <a href="#">biltong sirloin</a>.
		</p>
		<p>

			Sirloin tenderloin capicola doner, beef corned beef strip steak. Shoulder bresaola turkey chicken, venison hamburger ground round pork ham hock flank pork belly salami biltong meatloaf. Meatloaf venison bacon turducken. Capicola spare ribs pancetta bresaola, biltong short loin sausage shoulder tenderloin corned beef andouille.
		</p>
		<ul>
			<li>List Example</li>
			<li>List Example</li>
			<li>Sirloin <a href="#">tenderloin capicola</a> doner, beef corned beef strip steak.</li>
			<li>List Example</li>
		</ul>
		<blockquote>
		  <p>Capicola spare ribs pancetta bresaola, biltong short loin sausage shoulder tenderloin corned beef andouille.</p>
		  <footer>— Crazy person</footer>
	  </blockquote>

	 

	
	  <h2>Paragraph Alignment Tests</h2>
	  <h3>Default Paragraph</h3>
	  Lorem Ipsum is <a href="http://wordpress.org">simply dummy</a> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type speci<a href="http://wordpress.org">men book. It has survived not only fi</a>ve centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

	  <h3>Left align</h3>

	  <p style="text-align: left;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Sed odio nibh, tincidunt adipiscing, pretium nec, tincidunt id, enim. Fusce scelerisque nunc vitae nisl. Quisque quis urna in velit dictum pellentesque. Vivamus a quam. Curabitur eu tortor id turpis tristique adipiscing. Morbi blandit. Maecenas vel est. Nunc aliquam, orci at accumsan commodo, libero nibh euismod augue, a ullamcorper velit dui et purus. Aenean volutpat, ipsum ac imperdiet fermentum, dui dui suscipit arcu, vitae dictum purus diam ac ligula. Praesent enim nunc, pretium eget, tincidunt in, semper at, mauris. Etiam nec ligula. Aenean purus pede, sagittis at, blandit a, dignissim nec, elit. Etiam nunc. Praesent molestie consectetuer leo. Etiam blandit leo mollis velit. Aenean varius. Maecenas in magna nec justo ornare feugiat. Mauris elit. Nunc volutpat lectus fermentum nibh.</p>

	  <h3>Center Align</h3>
	  <p style="text-align: center;">Aenean a turpis eu augue luctus vulputate. Ut nonummy arcu in est. Nulla facilisi. Fusce at est sollicitudin pede gravida luctus. Sed ut dolor non nulla luctus aliquam. Phasellus sodales dapibus turpis. Nulla malesuada. In sed quam. Donec sollicitudin convallis nisl. Donec nunc. Suspendisse malesuada libero in nisi. Etiam vitae metus non arcu gravida tincidunt. Duis accumsan purus et orci. Curabitur volutpat. Nulla quis purus id enim dapibus malesuada. Nam egestas luctus arcu. Praesent iaculis massa.</p>

	  <h3>Right Align</h3>
	  <p style="text-align: right;">Aenean tempor, risus nec eleifend tristique, sem orci aliquam urna, eget iaculis tortor mauris ut lorem. Aenean eu tellus. Sed at mauris at nisl ultricies lobortis. Vivamus lacinia, lorem vel congue facilisis, leo leo sodales leo, vitae euismod velit ante a ligula. Vivamus sit amet turpis ut eros molestie porttitor. Nam erat lacus, auctor vel, dictum a, suscipit sed, orci. Quisque est lorem, facilisis consequat, sagittis a, ullamcorper at, ante. Nullam ultricies gravida dui. Nunc mauris. Quisque neque. Quisque eu sem.</p>

	  <h3>Justified</h3>
	  <p style="text-align: justify;">Vivamus volutpat, arcu sed venenatis consequat, nulla pede blandit neque, quis ultrices ligula mauris ut leo. Proin iaculis. Pellentesque vulputate magna at lectus. Etiam semper aliquet lectus. Nullam turpis. Vivamus sed lacus. Integer metus arcu, adipiscing sed, vehicula et, vulputate sit amet, massa. Sed lobortis tempus lectus. In lacus. Duis nibh. Donec molestie libero ut neque. In sollicitudin aliquam felis. Sed molestie libero ac mi. Curabitur magna nunc, feugiat sed, sodales vitae, pretium a, leo. Sed ut ante. Integer turpis ante, facilisis sed, dignissim vitae, consectetuer sed, dui. Sed ultricies.</p>
	  
	  <h1>Header one</h1>
	  <h2>Header two</h2>
	  <h3>Header three</h3>
	  <h4>Header four</h4>
	  <h5>Header five</h5>
	  <h6>Header six</h6>

	 
		<h2>Table Layout Test</h2>
		<table class="statsDay">
			<tbody>
				<tr>
					<th>Title</th>
					<th class="views">Views</th>
					<th></th>
				</tr>
				<tr class="alternate">
					<td class="label"><a href="http://wpthemetestdata.wordpress.com/about/">About Test User</a></td>
					<td class="views">1</td>
					<td class="more">More</td>
				</tr>
				<tr>
					<td class="label"><a href="http://wpthemetestdata.wordpress.com/">260</a></td>
					<td class="views">1</td>
					<td class="more">More</td>
				</tr>
				<tr class="alternate">
					<td class="label"><a href="http://wpthemetestdata.wordpress.com/archives/">Archives</a></td>
					<td class="views">1</td>
					<td class="more">More</td>
				</tr>
				<tr>
					<td class="label"><a href="http://wpthemetestdata.wordpress.com/">235</a></td>
					<td class="views">1</td>
					<td class="more">More</td>
				</tr>
			</tbody>
		</table>
		<h2>List Type Tests</h2>
		<h3>Definition List</h3>
		<dl><dt>Definition List Title</dt><dd>This is a definition list division.</dd><dt>Definition</dt><dd>An exact statement or description of the nature, scope, or meaning of something: <em>our definition of what constitutes poetry.</em></dd><dt>Gallery</dt><dd>A feature introduced with WordPress 2.5, that is specifically an exposition of images attached to a post. In that same vein, an upload is "attached to a post" when you upload it while editing a post.</dd><dt>Gravatar</dt><dd>A globally recognized avatar (a graphic image or picture that represents a user). A gravatar is associated with an email address, and is maintained by the Gravatar.com service. Using this service, a blog owner can configure their blog so that a user's gravatar is displayed along with their comments.</dd></dl>
		<h3>Unordered List (Nested)</h3>
		<ul>
			<li>List item one
				<ul>
					<li>List item one
						<ul>
							<li>List item one</li>
							<li>List item two</li>
							<li>List item three</li>
							<li>List item four</li>
						</ul>
					</li>
					<li>List item two</li>
					<li>List item three</li>
					<li>List item four</li>
				</ul>
			</li>
			<li>List item two</li>
			<li>List item three</li>
			<li>List item four</li>
		</ul>
		<h3>Ordered List</h3>
		<ol>
			<li>List item one
				<ol>
					<li>List item one
						<ol>
							<li>List item one</li>
							<li>List item two</li>
							<li>List item three</li>
							<li>List item four</li>
						</ol>
					</li>
					<li>List item two</li>
					<li>List item three</li>
					<li>List item four</li>
				</ol>
			</li>
			<li>List item two</li>
			<li>List item three</li>
			<li>List item four</li>
		</ol>
		<h2>HTML Element Tag Tests</h2>
		<p>All other HTML tags listed in the <a href="http://en.support.wordpress.com/code/">FAQ</a>:</p>

		Here is the address for Automattic, using the <code>&lt;address&gt;</code> tag:
		
				<address>355 1st Street Suite 202
					San Francisco, CA 94105
					United States</address>This is an example of <a href="http://example.com">an <code>&lt;anchor&gt;</code></a> (otherwise known as a link). This <abbr title="abbreviation">abbr.</abbr> is an example of an &lt;abbr&gt; tag in the middle of a sentence. Here is a <acronym title="three-letter acronym">TLA</acronym> showing off the <code>&lt;acronym&gt;</code> tag. What, you want to see <big>some over-sized text</big> using the <code>&lt;big&gt;</code> tag? Can you <cite>cite a reference</cite> for that, using the <code>&lt;cite&gt;</code> tag? Have you noticed that all of the tag names are displayed <code>in code-form</code>, using the <code>&lt;code&gt;</code> tag? Similarly, I could <kbd>emulate keyboard text</kbd>, using the <code>&lt;kbd&gt;</code> text tag, or <tt>emulate teletype text</tt> using the <code>&lt;tt&gt;</code> tag.

			<p>Oh no! I wrote something incorrectly. <del>I'd better delete it</del>, using the <code>&lt;del&gt;</code> tag. I could alternately <span style="text-decoration: line-through;">strike something out</span> using the <code>&lt;strike&gt;</code> tag, or strike something out using the <code>&lt;s&gt;</code> tag. <em>So many choices</em>, which I emphasize using the <code>&lt;em&gt;</code> tag. Just to clarify, <ins>this is some inserted text</ins>, that I'll highlight using the <code>&lt;ins&gt;</code> tag.</p>

			<p>Need to display completely unformatted text, such as a large block of code? Use the <code>&lt;pre&gt;</code> tag, which lets you display:</p>
			<pre>#container {
				float: left;
				margin: 0 -240px 0 0;
				width: 100%;
			}</pre>
			<p>Want to quote the WordPress tagline <q>Code is Poetry</q>? Use the <code>&lt;q&gt;</code> tag to add quotes around it. <strong>This is strong text</strong> (otherwise known as bold), using the <code>&lt;strong&gt;</code> tag.</p>

			<p>Need to write H<sub>2</sub>O or E = MC<sup>2</sup>? You may find great use for <sub>subscripting</sub> text using the <code>&lt;sub&gt;</code> tag, or for <sup>superscripting</sup> text using the <code>&lt;sup&gt;</code> tag. Need to call out a <var>variable</var>? Use the <code>&lt;var&gt;</code> tag.</p>

			<h2>Div and Span Tests</h2>
			<div>
				<p>
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
				<div class="myclass"><strong>This is a div with "myclass" class, inside of another div, using the <code>&lt;div&gt;</code> tag.</strong></div>
				Sed odio nibh, tincidunt adipiscing, pretium nec, tincidunt id, enim. Fusce scelerisque nunc vitae nisl.</p>

			</div>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. <span><strong>This is a span inside of a paragraph, using the <code>&lt;span&gt;</code> tag.</strong></span> Sed odio nibh, tincidunt adipiscing, pretium nec, tincidunt id, enim. Fusce scelerisque nunc vitae nisl.</p>

		</main>

		<?php get_sidebar(); ?>

	</div> <!-- close .wrapper -->

<?php get_footer(); ?>
