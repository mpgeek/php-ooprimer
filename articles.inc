<?php
/**
 * @file articles.inc
 *		By including this file, we are pretending a db_query happened, and we
 * 		have the query result in an associative array.
 */

function getArticleData() {
	$article_data = array();

	$article_data[0]['title'] = 'Teletubbies, Yo!';
	$article_data[0]['body'] = 'Do you see any Teletubbies in here? Do you see a slender plastic tag clipped to my shirt with my name printed on it? Do you see a little Asian child with a blank expression on his face sitting outside on a mechanical helicopter that shakes when you put quarters in it? No? Well, that\'s what you see at a toy store. And you must think you\'re in a toy store, because you\'re here shopping for an infant named Jeb.';

	$article_data[1]['title'] = 'Tech Nine';
	$article_data[1]['body'] = 'Now that there is the Tec-9, a crappy spray gun from South Miami. This gun is advertised as the most popular gun in American crime. Do you believe that shit? It actually says that in the little book that comes with it: the most popular gun in American crime. Like they\'re actually proud of that shit.';

	$article_data[2]['title'] = 'Ice, Man.';
	$article_data[2]['body'] = 'You think water moves fast? You should see ice. It moves like it has a mind. Like it knows it killed the world once and got a taste for murder. After the avalanche, it took us a week to climb out. Now, I don\'t know exactly when we turned on each other, but I know that seven of us survived the slide... and only five made it out. Now we took an oath, that I\'m breaking now. We said we\'d say it was the snow that killed the other two, but it wasn\'t. Nature is lethal but it doesn\'t hold a candle to man.';

	return $article_data;
}

?>
