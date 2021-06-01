const $ = mdui.$;

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
