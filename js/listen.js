function replace() {
    setTimeout(function () {
        const elements = document.getElementsByClassName("vis-item-content");

        for (let i = 0; i < elements.length; i++) {
            var originalContent = elements[i].innerHTML;

            var newContent = "<a href='articles/" + originalContent + ".html'>" + originalContent + "</a>";

            elements[i].innerHTML = newContent;
        }
    }, 500);
};

window.onload = replace();