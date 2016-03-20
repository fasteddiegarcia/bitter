'use strict';

$.ajax('/subbreddits', {
	type: 'GET',
	success: function(post) {
		var string = "";
		_.each(post, function(post) {
			console.log(subbreddit);
			string += post.name;
			string += ' ';
		});
		$('#content').text(string);
	}
});
