<script>
var bestPictures = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
 // url points to a json file that contains an array of country names, see
  // https://github.com/twitter/typeahead.js/blob/gh-pages/data/countries.json
 // prefetch: '../data/films/post_1960.json',
  //remote: {
  //  url: '../data/films/queries/%QUERY.json',
  //  wildcard: '%QUERY'
  }
});

$('#remote .typeahead').typeahead(null, {
  name: 'best-pictures',
  display: 'value',
  source: bestPictures,
  remote: '/SignUpG.php?query=%QUERY' // you can change anything but %QUERY
});

</script>