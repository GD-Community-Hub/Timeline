$.ajax({
    url: "/js-data.json",
    success: function (data) {
        setTimeout(function () {
            const elements = document.getElementsByClassName("vis-item-content");

            for (let i = 0; i < elements.length; i++) {
                var originalContent = elements[i].innerHTML;
                var slug = data[i].slug;

                var newContent = "<a href='articles/" + slug + ".html'>" + originalContent + "</a>";

                elements[i].innerHTML = newContent;
            }
        }, 500);
    },
    error: function (err) {
        console.log('Error', err);
        if (err.status === 0) {
            alert('Failed to load data.json.\nPlease run this example on a server.');
        }
        else {
            alert('Failed to load data.json.');
        }
    }
});