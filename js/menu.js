const toggleNav = () => {
  document.body.dataset.nav = document.body.dataset.nav === "true" ? "false" : "true";
  var element = document.querySelector('main:nth-of-type(1)');
  element.classList.toggle("hidden-overflow");
}