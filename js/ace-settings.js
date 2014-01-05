var langTools = ace.require("ace/ext/language_tools");
var editor = ace.edit("editor");
editor.setOptions({enableBasicAutocompletion: true});
editor.setTheme("ace/theme/twilight");
editor.session.setMode("ace/mode/java");
var ifyCompleter = {
    getCompletions: function(editor, session, pos, prefix, callback) {
        $.getJSON(
      	    "./api/completer.php" + (prefix.length === 0 ? "" : "?prefix=" + prefix),
      	    function(wordList) {
      		callback(null, wordList.map(function(ea) {
      		    return {name: ea.word, value: ea.word, score: ea.score, meta: "if{y}"}
                }));
      	    });
    }
}
langTools.addCompleter(ifyCompleter);