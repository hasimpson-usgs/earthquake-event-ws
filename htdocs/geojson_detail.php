<?php
	$TITLE = 'GeoJSON Detail Format';
	$STYLESHEETS = 'css/feedPages.css,css/format.css';
	include_once $_SERVER['DOCUMENT_ROOT'] . '/template/template.inc.php';
	include_once 'inc/terms.inc.php';
	include_once('../conf/feed.inc.php');
	$format = 'geojson';
?>

<div id="feed-format">

		<h3>Description</h3>
		<p>
			GeoJSON Detail output includes detailed information about a single earthquake.
			This matches the <a href="geojson.php">GeoJSON Summary output for a single feature</a>,
			and includes an additional property "products", with additional information from all
			contributors to an event.
		</p>
		<p>
			Links to GeoJSON Detail feeds are included in <a href="geojson.php">GeoJSON Summary</a> feeds as the feature property "detail".
		</p>

		<h3>Usage</h3>

		<p>
			GeoJSON is intended to be used as a programatic interface for applications.
		</p>

		<h3>Output</h3>
<code class="geojson">{
	type: "Feature",
	properties: {
		<a href='glossary.php#mag'>mag</a>: Decimal,
		<a href='glossary.php#place'>place</a>: String,
		<a href='glossary.php#time'>time</a>: Long Integer,
		<a href='glossary.php#updated'>updated</a>: Long Integer,
		<a href='glossary.php#tz'>tz</a>: Integer,
		<a href='glossary.php#url'>url</a>: String,
		<a href='glossary.php#felt'>felt</a>:Integer,
		<a href='glossary.php#cdi'>cdi</a>: Decimal,
		<a href='glossary.php#mmi'>mmi</a>: Decimal,
		<a href='glossary.php#alert'>alert</a>: String,
		<a href='glossary.php#status(review)'>status</a>: String,
		<a href='glossary.php#tsunami'>tsunami</a>: Integer,
		<a href='glossary.php#sig'>sig</a>:Integer,
		<a href='glossary.php#net'>net</a>: String,
		<a href='glossary.php#code'>code</a>: String,
		<a href='glossary.php#ids'>ids</a>: String,
		<a href='glossary.php#sources'>sources</a>: String,
		<a href='glossary.php#types'>types</a>: String,
		<a href='glossary.php#nst'>nst</a>: Integer,
		<a href='glossary.php#dmin'>dmin</a>: Decimal,
		<a href='glossary.php#rms'>rms</a>: Decimal,
		<a href='glossary.php#gap'>gap</a>: Decimal,
		<a href='glossary.php#magType'>magType</a>: String,
		<a href="glossary.php#type">type</a>: String,
		products: {
			<a href="glossary.php#productType">&lt;productType&gt;</a>: [
				{
					<a href="glossary.php#product_id">id</a>: String,
					<a href="glossary.php#product_id">type</a>: String,
					<a href="glossary.php#product_id">code</a>: String,
					<a href="glossary.php#product_id">source</a>: String,
					<a href="glossary.php#product_id">updateTime</a>: Integer,
					<a href="glossary.php#product_status">status</a>: String,
					properties: {
						<a href="glossary.php#product_propertyName">&lt;key&gt;</a>: String,
						...
					},
					<a href="glossary.php#preferredWeight">preferredWeight</a>: Integer,
					contents: {
						<a href="glossary.php#product_content">&lt;path&gt;</a>: {
							<a href="glossary.php#product_content">contentType</a>: String,
							<a href="glossary.php#product_content">lastModified</a>: Long Integer,
							<a href="glossary.php#product_content">length</a>: Integer,
							<a href="glossary.php#product_content">url</a>: String
						},
						...
					}
				},
				...
			],
			...
		}
	},
	geometry: {
		type: "Point",
		coordinates: [
			<a href='glossary.php#longitude'>longitude</a>,
			<a href='glossary.php#latitude'>latitude</a>,
			<a href='glossary.php#depth'>depth</a>
		]
	},
	<a href='glossary.php#id'>id</a>: String
}
</code>


</div>