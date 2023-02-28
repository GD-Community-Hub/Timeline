<<<<<<< Updated upstream
$.ajax({
  url: "/js-data.json",
  success: function (data) {
    const elements = document.getElementsByClassName("vis-item-content");

    for (let i = 0; i < elements.length; i++) {
      var originalContent = elements[i].innerHTML;
      var slug = data[i].slug;

      var newContent =
        "<a href='articles/" + slug + ".html'>" + originalContent + "</a>";

      elements[i].innerHTML = newContent;
    }
  },
  error: function (err) {
    console.log("Error", err);
    if (err.status === 0) {
      alert("Failed to load data.json.\nPlease run  on a server.");
    } else {
      alert("Failed to load js-data.json.");
    }
  },
});
=======
//$.ajax({
//  url: "/js-data.json",
//  success: function (data) {
//      const elements = document.getElementsByClassName("vis-item-content");
//  
//      for (let i = 0; i < elements.length; i++) {
//        var originalContent = elements[i].innerHTML;
//        console.log(originalContent);
//        var slug = data[i].slug;
//  
//        var newContent =
//          "<a href='articles/" + slug + ".html'>" + originalContent + "</a>";
//  
//        elements[i].innerHTML = newContent;
//      }
//  },
//  error: function (err) {
//    console.log("Error", err);
//    if (err.status === 0) {
//      alert("Failed to load data.json.\nPlease run  on a server.");
//    } else {
//      alert("Failed to load js-data.json.");
//    }
//  },
//});
>>>>>>> Stashed changes
