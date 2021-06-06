const $ = mdui.$;

if (localStorage.getItem('name')) {
  $('.userInfoInput').prop('value', index => localStorage.getItem(index ? 'email' : 'name'));
}

let userInfoTmp = [];
$('#isAnonymous').on('click', () => {
  $('.userInfoInput').prop({
    'disabled': $('#isAnonymous').prop('checked'),
    'value': (index, oldValue) => {
      if ($('#isAnonymous').prop('checked')) {
        userInfoTmp[index] = oldValue;
        return '';
      } else {
        return userInfoTmp[index];
      }
    }
  });
  mdui.updateTextFields($('.userInfo'));
});

$('#submit').on('click', () => {
  if (!$('#isAnonymous').prop('checked')) {
    $('.userInfoInput').prop('value', (index, oldValue) => {
      localStorage.setItem(index ? 'email' : 'name', oldValue);
    });
  }
});

$('#reset').on('click', () => {
  localStorage.removeItem('name');
  localStorage.removeItem('email');
});
