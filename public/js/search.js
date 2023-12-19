
function showTab(tabId) {
    var tabContents = document.getElementsByClassName('search-bar');
    for (var i = 0; i < tabContents.length; i++) {
      tabContents[i].style.display = 'none';
    }
  
    document.getElementById(tabId).style.display = 'block';
  }
  