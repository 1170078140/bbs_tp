(function() {
	$(function() {
		var editor, mobileToolbar, toolbar;
		toolbar = ['title', 'bold', 'italic', 'underline', 'strikethrough', 'color', '|', 'ol', 'ul', 'blockquote', 'code', 'table', '|', 'link', 'hr', '|', 'indent', 'outdent', 'emoji'];

		return editor = new Simditor({
		textarea: $('#editor'),
		toolbar: toolbar,
		pasteImage: false,
		emoji: {
				imagePath: 'images/emoji/'
			}
		});
	});
}).call(this);
