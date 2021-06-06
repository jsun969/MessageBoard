const $ = mdui.$;

if (localStorage.getItem('name')) {
  $('.userInfoInput').prop('value', index => localStorage.getItem(index ? 'email' : 'name'));
}

let colorIndex = localStorage.getItem('color') ? +localStorage.getItem('color') : 4;
const color = ['red', 'pink', 'purple', 'deep-purple', 'indigo', 'teal', 'brown', 'blue-grey'];
$('body').addClass(`mdui-theme-primary-${color[colorIndex]} mdui-theme-accent-pink`);

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

$('#color').on('click', () => {
  colorIndex = colorIndex === 7 ? 0 : colorIndex + 1;
  $('body').removeClass().addClass(`mdui-theme-primary-${color[colorIndex]} mdui-theme-accent-pink`);
  localStorage.setItem('color', colorIndex);
});
