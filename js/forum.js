$('.ortic-forum-edit, .ortic-forum-edit-cancel').on('click', function (event) {
  event.preventDefault();
  var parent = $(event.target).parent().parent();

  parent.find('.ortic-forum-message-edit, .ortic-forum-message-text, .ortic-forum-edit-cancel, .ortic-forum-edit').toggle();

  //if edit was clicked
  if(event.currentTarget.className == 'ortic-forum-edit') {
    var mde = new SimpleMDE({ element: parent.find('.ortic-forum-message-edit-text')[0]});
    parent.data("mde", mde);
  } else { // cancel clicked
    parent.data("mde").toTextArea();
    parent.data("mde","");
  } 
});

$('.ortic-forum-delete').on('click', function (event) {
  event.preventDefault();
  if (confirm('Are you sure you want to delete this message?')) {
    window.location.href = $(this).attr('href');
  }
});