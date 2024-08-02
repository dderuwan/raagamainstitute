function sindec() {
  showContent('form1');
}

function sincuri() {
  showContent('form2');
}

function sinreview() {
  showContent('form3');
}

function sinfaq() {
  showContent('form4');
}

function showContent(formId) {
  var forms = ['form1', 'form2', 'form3', 'form4'];
  forms.forEach(function(id) {
      document.getElementById(id).style.display = id === formId ? 'block' : 'none';
  });
}
