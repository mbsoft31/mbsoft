$(document).ready((event) => {
  var x = document.querySelectorAll("*[data-toggle='collapse']");
  x.forEach ( (element) => {
    $(element).on('click', (event) => {
      let target = $($(event.target).attr('data-target'))
      let toggle = $(event.target).attr('data-toggle')
      let value = $(event.target).attr('data-value')
      target.toggleClass(value)
    })
  });
})